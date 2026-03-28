<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// 🔥 image fetch
$stmt = $conn->prepare("SELECT profile_image FROM users WHERE id=?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($image);
$stmt->fetch();
$stmt->close();

// 🔥 debug check
// echo $image; exit();

// 🔥 file delete
if (!empty($image)) {
    $filePath = "uploads/" . $image;

    if (file_exists($filePath)) {
        unlink($filePath);
    }
}

// 🔥 DB update
$stmt = $conn->prepare("UPDATE users SET profile_image=NULL WHERE id=?");
$stmt->bind_param("i", $user_id);

if ($stmt->execute()) {
    header("Location: profile.php?msg=removed");
    exit();
} else {
    echo "DB Error";
}
?>