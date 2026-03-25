<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include 'db.php';

$profile_image = "";
$first_name = "";

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    $stmt = $conn->prepare("SELECT first_name, profile_image FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->bind_result($first_name, $profile_image);
    $stmt->fetch();
    $stmt->close();
}
?>