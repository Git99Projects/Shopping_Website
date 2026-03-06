<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (!isset($_GET['id'])) {
    header("Location: complain.php");
    exit();
}

$complaint_id = (int) $_GET['id'];
$user_id = $_SESSION['user_id'];

// Delete only if complaint belongs to logged-in user
$stmt = $conn->prepare("DELETE FROM complaints WHERE id = ? AND user_id = ?");
$stmt->bind_param("ii", $complaint_id, $user_id);
$stmt->execute();
$stmt->close();

header("Location: complain.php");
exit();
