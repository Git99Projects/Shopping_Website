<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = (int)$_SESSION['user_id'];
$complaint_id = (int)($_GET['id'] ?? 0);

if ($complaint_id > 0) {
    $stmt = $conn->prepare("
        UPDATE complaints
        SET deleted_by_user = 1,
            deleted_at = NOW()
        WHERE id = ? AND user_id = ?
    ");
    $stmt->bind_param("ii", $complaint_id, $user_id);
    $stmt->execute();
    $stmt->close();
}

header("Location: complain.php");
exit();