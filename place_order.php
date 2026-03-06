<?php
session_start();
include 'db.php';
if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}
$user_id = (int)$_SESSION['user_id'];

$cart = $_SESSION['cart'][$user_id] ?? [];
$delivery_fees = $_SESSION['delivery_fees'][$user_id] ?? [];

if (empty($cart)) {
  header("Location: home.php");
  exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
 $name    = trim($_POST['name'] ?? '');
 $email   = trim($_POST['email'] ?? '');
 $phone   = trim($_POST['phone'] ?? '');
 $address = trim($_POST['address'] ?? '');
 $payment = trim($_POST['payment'] ?? '');

if ($name === '' || $email === '' || $phone === '' || $address === '' || $payment === '') {
  header("Location: checkout.php?error=1");
  exit();
}

  // Save user info
  $_SESSION['user_info'][$user_id]  = [
    'name' => $name,
    'email' => $email,
    'phone' => $phone,
    'address' => $address,
    'payment' => $payment
  ];

  // Prepare order
  $order = [
    'user' => $_SESSION['user_info'][$user_id],
    'items' => [],
    'total' => 0,
    'timestamp' => date("Y-m-d H:i:s")
  ];

 foreach ($cart as $id => $item) {
    $delivery = $delivery_fees[$id] ?? rand(10, 100);

    $price = (float)($item['price'] ?? 0);
    $qty   = (int)($item['quantity'] ?? 1);
    $total = ($price * $qty) + (float)$delivery;

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


// Insert into orders table
$stmt = $conn->prepare("INSERT INTO orders (user_id, name, email, phone, address, payment, total) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("isssssd", $user_id, $name, $email, $phone, $address, $payment, $order['total']);
$stmt->execute();
$order_id = $stmt->insert_id;
$stmt->close();

// Insert each item into order_items table
$itemStmt = $conn->prepare("INSERT INTO order_items (order_id, product_key, product_name, price, quantity, image, delivery, line_total)
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

foreach ($order['items'] as $it) {
  $itemStmt->bind_param(
    "issdissd",
    $order_id,
    $it['id'],       // product_key like apple_1, samsung_2, etc.
    $it['name'],
    $it['price'],
    $it['quantity'],
    $it['image'],
    $it['delivery'],
    $it['total']
  );
  $itemStmt->execute();
}
$itemStmt->close();


  // Clear cart & delivery fees
unset($_SESSION['cart'][$user_id]);
unset($_SESSION['delivery_fees'][$user_id]);

  // Redirect to confirmation
  header("Location: order_confirm.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
