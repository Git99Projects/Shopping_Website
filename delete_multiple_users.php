<?php
include 'db.php';

if (isset($_POST['user_ids'])) {

  foreach ($_POST['user_ids'] as $id) {

    // 🔍 user role check
    $res = $conn->query("SELECT role FROM users WHERE id='$id'");
    $row = $res->fetch_assoc();

    // ❌ admin delete block
    if ($row && $row['role'] === 'admin') {
      continue;
    }

    // 🔥 1. order_items delete
    $conn->query("
      DELETE oi FROM order_items oi
      JOIN orders o ON oi.order_id = o.id
      WHERE o.user_id = '$id'
    ");

    // 🔥 2. orders delete
    $conn->query("DELETE FROM orders WHERE user_id='$id'");

    // 🔥 3. complaints delete
    $conn->query("DELETE FROM complaints WHERE user_id='$id'");

    // 🔥 4. user delete
    $conn->query("DELETE FROM users WHERE id='$id'");
  }

  header("Location: admin_dashboard.php?msg=deleted");
  exit();
}
?>