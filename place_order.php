<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  $payment = $_POST['payment'];

  // Save user info
  $_SESSION['user_info'] = [
    'name' => $name,
    'email' => $email,
    'phone' => $phone,
    'address' => $address,
    'payment' => $payment
  ];

  // Prepare order
  $order = [
    'user' => $_SESSION['user_info'],
    'items' => [],
    'total' => 0,
    'timestamp' => date("Y-m-d H:i:s")
  ];

  foreach ($_SESSION['cart'] as $id => $item) {
    $delivery = $_SESSION['delivery_fees'][$id] ?? rand(10, 100);
    $total = ($item['price'] * $item['quantity']) + $delivery;

    $order['items'][] = [
      'id' => $id,
      'name' => $item['name'],
      'price' => $item['price'],
      'quantity' => $item['quantity'],
      'image' => $item['image'],
      'delivery' => $delivery,
      'total' => $total
    ];

    $order['total'] += $total;
  }

  // Save to order history
  if (!isset($_SESSION['order_history'])) {
    $_SESSION['order_history'] = [];
  }
  $_SESSION['order_history'][] = $order;

  // Clear cart & delivery fees
  unset($_SESSION['cart']);
  unset($_SESSION['delivery_fees']);

  // Redirect to confirmation
  header("Location: order_confirm.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Order Placed</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
  <div class="alert alert-success">
    <h2>🎉 Order Placed Successfully!</h2>
    <p>Thank you <strong><?php echo htmlspecialchars($name); ?></strong> for your order.</p>
    <p>Delivery Address: <?php echo nl2br(htmlspecialchars($address)); ?></p>
    <p>Payment Method: <strong><?php echo htmlspecialchars($payment); ?></strong></p>
    <a href="home.php" class="btn btn-primary">Continue Shopping</a>
  </div>
</div>
</body>
</html>
