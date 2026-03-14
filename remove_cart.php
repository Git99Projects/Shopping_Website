<?php
session_start();

if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit();
}

$user_id = (int)$_SESSION['user_id'];
$id = $_GET['id'] ?? '';

if (isset($_SESSION['cart'][$user_id][$id])) {
  unset($_SESSION['cart'][$user_id][$id]);
}
if (isset($_SESSION['delivery_fees'][$user_id][$id])) {
  unset($_SESSION['delivery_fees'][$user_id][$id]);
}

header("Location: cart.php");
exit();