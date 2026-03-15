<?php
session_start();
include 'db.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
  header("Location: login.php");
  exit();
}

$order_id = (int)($_POST['order_id'] ?? 0);
$status   = $_POST['status'] ?? '';

$allowed = ['Pending','Shipped','Delivered','Cancelled'];

if ($order_id > 0 && in_array($status, $allowed, true)) {
  $stmt = $conn->prepare("UPDATE orders SET status = ? WHERE id = ?");
  $stmt->bind_param("si", $status, $order_id);
  $stmt->execute();
  $stmt->close();
}

header("Location: admin_dashboard.php");
exit();