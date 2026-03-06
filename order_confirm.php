<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit();
}

$user_id = (int)$_SESSION['user_id'];

/* ✅ Get latest order from DB for this user */
$stmt = $conn->prepare("SELECT id, name, address, payment, total, created_at, status
                        FROM orders 
                        WHERE user_id = ? 
                        ORDER BY id DESC 
                        LIMIT 1");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$order = $stmt->get_result()->fetch_assoc();
$stmt->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Order Confirmed</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">

<?php if ($order): ?>
  <div class="alert alert-success p-4">
    <h2 class="mb-3">✅ Order Confirmed</h2>

    <p>Thank you, <strong><?php echo htmlspecialchars($order['name']); ?></strong>!</p>
    <p>Your order has been placed successfully.</p>

    <hr>

    <p><strong>Order ID:</strong> <?php echo (int)$order['id']; ?></p>
    <p><strong>Status:</strong> <?php echo htmlspecialchars($order['status'] ?? 'Pending'); ?></p>
    <p><strong>Payment Method:</strong> <?php echo htmlspecialchars($order['payment']); ?></p>
    <p><strong>Total Paid:</strong> ₹<?php echo number_format((float)$order['total']); ?></p>
    <p><strong>Delivery Address:</strong><br><?php echo nl2br(htmlspecialchars($order['address'])); ?></p>

    <div class="mt-4 d-flex gap-2">
      <a href="home.php" class="btn btn-primary">⬅️ Continue Shopping</a>
      <a href="order_history.php" class="btn btn-secondary">📦 View Past Orders</a>
    </div>
  </div>
<?php else: ?>
  <div class="alert alert-warning">
    No recent order found.
    <a href="home.php">Go to Home</a>
  </div>
<?php endif; ?>

</div>
</body>
</html>