<?php
include 'auth_admin.php';
include 'db.php';

$order_id = (int)($_GET['order_id'] ?? 0);

if ($order_id <= 0) {
    die("Invalid order ID.");
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
    die("Order not found.");
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

function e($s) {
    return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Order Products</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-4">

  <a href="admin_dashboard.php" class="btn btn-secondary mb-3">⬅ Back to Dashboard</a>

  <div class="card shadow-sm mb-4">
    <div class="card-body">
      <h3 class="mb-3">Order #<?= (int)$order['id']; ?></h3>
      <p><strong>Name:</strong> <?= e($order['name']); ?></p>
      <p><strong>Email:</strong> <?= e($order['email']); ?></p>
      <p><strong>Phone:</strong> <?= e($order['phone']); ?></p>
      <p><strong>Address:</strong><br><?= nl2br(e($order['address'])); ?></p>
      <p><strong>Payment:</strong> <?= e($order['payment']); ?></p>
      <p><strong>Status:</strong> <?= e($order['status']); ?></p>
      <p><strong>Total:</strong> ₹<?= e(number_format((float)$order['total'], 2)); ?></p>
      <p><strong>Date:</strong> <?= e($order['created_at']); ?></p>
    </div>
  </div>

  <div class="card shadow-sm">
    <div class="card-body">
      <h4 class="mb-3">Ordered Products</h4>

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
    </div>
  </div>

</div>
</body>
</html>