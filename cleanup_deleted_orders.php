<?php
include 'db.php';

$res = $conn->query("
    SELECT id
    FROM orders
    WHERE deleted_by_user = 1
      AND deleted_at IS NOT NULL
      AND deleted_at <= NOW() - INTERVAL 30 DAY
");

while ($row = $res->fetch_assoc()) {
    $order_id = (int)$row['id'];

    $stmt1 = $conn->prepare("DELETE FROM order_items WHERE order_id = ?");
    $stmt1->bind_param("i", $order_id);
    $stmt1->execute();
    $stmt1->close();

    $stmt2 = $conn->prepare("DELETE FROM orders WHERE id = ?");
    $stmt2->bind_param("i", $order_id);
    $stmt2->execute();
    $stmt2->close();
}

echo "Cleanup completed.";