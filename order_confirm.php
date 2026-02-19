<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Order Confirmation</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
  <h2 class="text-success">✅ Order Confirmed</h2>
  <p>Thank you, <strong><?php echo htmlspecialchars($_SESSION['user_info']['name']); ?></strong>!</p>
  <p>Your order has been placed successfully.</p>
  <a href="apple.php" class="btn btn-primary">⬅️ Continue Shopping</a>
  <a href="order_history.php" class="btn btn-secondary">📦 View Past Orders</a>
</div>
</body>
</html>
