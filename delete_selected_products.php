<?php
include 'auth_admin.php';
include 'db.php';

$allowed_tables = [
    'home_products',
    'apple_products',
    'sum_products',
    'xiaomi_products',
    'oneplus_products',
    'hp_products',
    'dell_products',
    'macbook_products',
    'boat_products',
    'oneplusbud_products',
    'boult_products'
];

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: admin_dashboard.php");
    exit();
}

$selected_ids = $_POST['selected_ids'] ?? '';
$table = $_POST['table'] ?? '';
$redirect_page = $_POST['redirect_page'] ?? 'admin_dashboard.php';

if (!in_array($table, $allowed_tables, true)) {
    header("Location: admin_dashboard.php");
    exit();
}

$ids_array = array_filter(array_map('intval', explode(',', $selected_ids)));

if (count($ids_array) === 0) {
    header("Location: " . $redirect_page . "?delete_mode=1");
    exit();
}

$placeholders = implode(',', array_fill(0, count($ids_array), '?'));
$types = str_repeat('i', count($ids_array));

$sql = "UPDATE $table
        SET deleted_by_admin = 1
        WHERE id IN ($placeholders)";

$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param($types, ...$ids_array);
    $stmt->execute();
    $stmt->close();
}

header("Location: " . $redirect_page . "?delete_mode=1&success=1");
exit();
?>
