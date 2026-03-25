<?php
session_start();
include 'db.php';

// 🔥 Only admin allowed
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $user_id = $_POST['user_id'];
    $new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("UPDATE users SET password=? WHERE id=?");
    $stmt->bind_param("si", $new_password, $user_id);

    if ($stmt->execute()) {
        header("Location: admin_dashboard.php?msg=passsuccess");
    } else {
        header("Location: admin_dashboard.php?msg=error");
    }
}
?>