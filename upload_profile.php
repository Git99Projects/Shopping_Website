<?php
session_start();
include 'db.php';

// 🔥 session check
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['profile_image'])) {

    $file = $_FILES['profile_image'];

    // 🔥 file selected or not
    if ($file['error'] !== 0) {
        header("Location: profile.php?msg=error");
        exit();
    }

   $allowed_ext = ['jpg','jpeg','png','webp','gif','bmp'];
$allowed_mime = [
    'image/jpeg',
    'image/png',
    'image/webp',
    'image/gif',
    'image/bmp'
];

$ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
$mime = mime_content_type($file['tmp_name']);

if (!in_array($ext, $allowed_ext) || !in_array($mime, $allowed_mime)) {
    header("Location: profile.php?msg=invalid");
    exit();
}

    // 🔥 unique filename
    $filename = "user_" . $user_id . "_" . time() . "." . $ext;
    $target = "uploads/" . $filename;

    if (move_uploaded_file($file['tmp_name'], $target)) {

        $stmt = $conn->prepare("UPDATE users SET profile_image=? WHERE id=?");
        $stmt->bind_param("si", $filename, $user_id);
        $stmt->execute();

        header("Location: profile.php?msg=imgsuccess");
        exit();

    } else {
        header("Location: profile.php?msg=error");
        exit();
    }
}
?>