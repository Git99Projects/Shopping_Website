<?php
session_start();
include 'db.php';

// 🔒 Only admin allowed
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // 🔥 validation
    if (empty($_POST['user_id']) || empty($_POST['new_password'])) {
        header("Location: admin_dashboard.php?msg=error");
        exit();
    }

    $user_id = $_POST['user_id'];
    $new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

    // 🔍 check user exists
    $check = $conn->prepare("SELECT id FROM users WHERE id=?");
    $check->bind_param("i", $user_id);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows === 0) {
        header("Location: admin_dashboard.php?msg=error");
        exit();
    }

    // 🔐 update password
    $stmt = $conn->prepare("UPDATE users SET password=? WHERE id=?");
    $stmt->bind_param("si", $new_password, $user_id);

    if ($stmt->execute()) {
        header("Location: admin_dashboard.php?msg=passsuccess");
    } else {
        header("Location: admin_dashboard.php?msg=error");
    }
}
?>