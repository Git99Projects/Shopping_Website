<?php
declare(strict_types=1);

/**
 * cleanup_deleted_complaints.php
 *
 * Safest flexible version for deployment:
 * - checks DB connection
 * - uses prepared statements
 * - uses a transaction
 * - logs real errors to server logs
 * - shows only safe messages publicly
 * - optional secret key protection
 */

ini_set('display_errors', '0');
error_reporting(E_ALL);

include 'db.php';

/* ---------- OPTIONAL SECURITY KEY ---------- */
/* Change this to a long random string before deployment */
$cleanupKey = 'CHANGE_THIS_TO_A_LONG_RANDOM_SECRET_KEY';

/* Allow CLI runs without key, require key for browser access */
$isCli = (PHP_SAPI === 'cli');
if (!$isCli) {
    $providedKey = $_GET['key'] ?? '';
    if (!hash_equals($cleanupKey, $providedKey)) {
        http_response_code(403);
        exit('Forbidden');
    }
}

/* ---------- DB CONNECTION CHECK ---------- */
if (!isset($conn) || !($conn instanceof mysqli)) {
    error_log('Complaint cleanup failed: $conn is not a valid mysqli connection.');
    http_response_code(500);
    exit('Cleanup failed.');
}

if ($conn->connect_error) {
    error_log('Complaint cleanup DB connection failed: ' . $conn->connect_error);
    http_response_code(500);
    exit('Cleanup failed.');
}

try {
    /* Recommended charset */
    $conn->set_charset('utf8mb4');

    /* Start transaction */
    $conn->begin_transaction();

    /* Delete only complaints hidden by user for 30+ days */
    $sql = "
        DELETE FROM complaints
        WHERE deleted_by_user = ?
          AND deleted_at IS NOT NULL
          AND deleted_at <= DATE_SUB(NOW(), INTERVAL 30 DAY)
    ";

    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        throw new Exception('Prepare failed: ' . $conn->error);
    }

    $deletedByUser = 1;
    if (!$stmt->bind_param('i', $deletedByUser)) {
        throw new Exception('Bind failed: ' . $stmt->error);
    }

    if (!$stmt->execute()) {
        throw new Exception('Execute failed: ' . $stmt->error);
    }

    $deletedRows = $stmt->affected_rows;
    $stmt->close();

    $conn->commit();

    if ($isCli) {
        echo "Complaint cleanup completed successfully. Deleted rows: {$deletedRows}" . PHP_EOL;
    } else {
        echo "Complaint cleanup completed successfully. Deleted rows: {$deletedRows}";
    }
} catch (Throwable $e) {
    if ($conn->errno === 0) {
        /* no-op, just keeping structure clean */
    }

    try {
        $conn->rollback();
    } catch (Throwable $rollbackError) {
        error_log('Complaint cleanup rollback failed: ' . $rollbackError->getMessage());
    }

    error_log('Complaint cleanup error: ' . $e->getMessage());
    http_response_code(500);
    exit('Cleanup failed.');
} finally {
    if (isset($conn) && $conn instanceof mysqli) {
        $conn->close();
    }
}