<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = (int)$_SESSION['user_id'];
$order_id = (int)($_GET['id'] ?? 0);

if ($order_id > 0) {

    $stmt = $conn->prepare("UPDATE orders 
                            SET status = 'Cancelled' 
                            WHERE id = ? AND user_id = ? AND status = 'Pending'");

    $stmt->bind_param("ii", $order_id, $user_id);
    $stmt->execute();
    $stmt->close();
}

header("Location: order_history.php");
exit();