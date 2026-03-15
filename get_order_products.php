<?php
include 'auth_admin.php';
include 'db.php';

function e($s) {
    return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8');
}

$order_id = (int)($_GET['order_id'] ?? 0);

if ($order_id <= 0) {
    echo '<div class="alert alert-danger">Invalid order ID.</div>';
    exit();
}

$order = null;
$stmt = $conn->prepare("
    SELECT o.id, o.total, o.payment, o.status, o.created_at,
           o.name, o.email, o.phone, o.address
    FROM orders o
    WHERE o.id = ?
");
$stmt->bind_param("i", $order_id);
$stmt->execute();
$result = $stmt->get_result();
if ($result) {
    $order = $result->fetch_assoc();
}
$stmt->close();

if (!$order) {
    echo '<div class="alert alert-warning">Order not found.</div>';
    exit();
}

$items = [];
$stmt = $conn->prepare("
    SELECT product_name, price, quantity, image, delivery, line_total
    FROM order_items
    WHERE order_id = ?
");
$stmt->bind_param("i", $order_id);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $items[] = $row;
}
$stmt->close();
?>

<div class="mb-3">
  <h5 class="mb-3">Order #<?= (int)$order['id']; ?></h5>
  <div><strong>Name:</strong> <?= e($order['name']); ?></div>
  <div><strong>Email:</strong> <?= e($order['email']); ?></div>
  <div><strong>Phone:</strong> <?= e($order['phone']); ?></div>
  <div><strong>Payment:</strong> <?= e($order['payment']); ?></div>
  <div><strong>Status:</strong> <?= e($order['status']); ?></div>
  <div><strong>Total:</strong> ₹<?= e(number_format((float)$order['total'], 2)); ?></div>
  <div><strong>Date:</strong> <?= e($order['created_at']); ?></div>
  <div class="mt-2"><strong>Address:</strong><br><?= nl2br(e($order['address'])); ?></div>
</div>

<div class="table-responsive">
  <table class="table table-bordered align-middle">
    <thead class="table-light">
      <tr>
        <th>Image</th>
        <th>Product Name</th>
        <th>Price</th>
        <th>Qty</th>
        <th>Delivery</th>
        <th>Line Total</th>
      </tr>
    </thead>
    <tbody>
      <?php if (empty($items)): ?>
        <tr>
          <td colspan="6" class="text-center text-muted">No products found for this order.</td>
        </tr>
      <?php else: ?>
        <?php foreach ($items as $item): ?>
          <tr>
            <td>
              <?php if (!empty($item['image'])): ?>
                <img src="image/<?= e($item['image']); ?>" width="70" height="70" style="object-fit:cover;">
              <?php else: ?>
                No Image
              <?php endif; ?>
            </td>
            <td><?= e($item['product_name']); ?></td>
            <td>₹<?= e(number_format((float)$item['price'], 2)); ?></td>
            <td><?= (int)$item['quantity']; ?></td>
            <td>₹<?= e(number_format((float)$item['delivery'], 2)); ?></td>
            <td>₹<?= e(number_format((float)$item['line_total'], 2)); ?></td>
          </tr>
        <?php endforeach; ?>
      <?php endif; ?>
    </tbody>
  </table>
</div>