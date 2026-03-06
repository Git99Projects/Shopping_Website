<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit();
}

$user_id = (int)$_SESSION['user_id'];

/* ✅ Make cart USER-WISE */
if (!isset($_SESSION['cart']) || !is_array($_SESSION['cart'])) {
  $_SESSION['cart'] = [];
}
if (!isset($_SESSION['cart'][$user_id]) || !is_array($_SESSION['cart'][$user_id])) {
  $_SESSION['cart'][$user_id] = [];
}
$cart = &$_SESSION['cart'][$user_id];

/* ✅ Delivery fees USER-WISE */
if (!isset($_SESSION['delivery_fees']) || !is_array($_SESSION['delivery_fees'])) {
  $_SESSION['delivery_fees'] = [];
}
if (!isset($_SESSION['delivery_fees'][$user_id]) || !is_array($_SESSION['delivery_fees'][$user_id])) {
  $_SESSION['delivery_fees'][$user_id] = [];
}
$delivery_fees = &$_SESSION['delivery_fees'][$user_id];

/* Ensure delivery fee for every cart item */
foreach ($cart as $id => $item) {
  if (!isset($delivery_fees[$id]) || $delivery_fees[$id] <= 0) {
    $delivery_fees[$id] = rand(10, 100);
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Your Cart</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
 body {
  /* background-image: url('image/cart_image.webp'); Make sure this file exists and is high-res */
  background-size: cover;         /* or use 'contain' if you don’t want stretching */
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-position: center center; /* better than center top */
  background-color:rgb(208, 216, 211);     /* fallback for slow loading */
  background: linear-gradient(135deg, rgb(17, 45, 201), rgb(37, 180, 32));
  font-family: 'Segoe UI', sans-serif;
  image-rendering: auto;         /* ensures browser uses good scaling */
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}
body::before {
  content: "";
  position: fixed;
  top: 0; left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.3); /* Adjust darkness */
  z-index: -1;
}
  h2 {
    font-weight: bold;
    color: #343a40;
  }

  table {
    background:rgb(249, 242, 189);
    box-shadow: 0 0 10px rgba(78, 78, 78, 0.05);
    border-radius: 10px;
    overflow: hidden;
  }

  th, td {
    vertical-align: middle !important;
    text-align: center;
  }

  img {
    border-radius: 8px;
  }

  .btn-danger {
    background-color:rgb(234, 21, 42);
    border: none;
  }

  .btn-danger:hover {
    background-color: #c82333;
  }

  .btn-success {
    background-color:rgb(24, 138, 85);
    border: none;
  }

  .btn-success:hover {
    background-color:rgb(18, 100, 62);
  }

  .btn-secondary {
    background-color:rgb(9, 134, 243);
    border: none;
  }

  .btn-secondary:hover {
    background-color:rgb(48, 84, 110);
  }

  .alert {
    font-size: 18px;
    background-color: #fff3cd;
    color: #856404;
    border: 1px solid #ffeeba;
    border-radius: 8px;
  }

  .container {
    background: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(13, 13, 13, 0.1);
  }

  a {
    text-decoration: none;
  }

  .cart-title {
  text-align: center;
}
 .table-responsive{ 
  overflow-x:auto; 
}

</style>

</head>
<body>
<div class="container mt-5 ">
<a href="home.php" class="btn btn-secondary">⬅️ Back</a>
<h2 class="mb-4 cart-title">🛒 Your Shopping Cart</h2>

  <?php if (!empty($cart)): ?>
    <div class="table-responsive">
    <table class="table table-bordered">
      <thead class="table-info">
        <tr>
          <th>Image</th>
          <th>Product</th>
          <th>Price</th>
          <th>Qty</th>
          <th>Delivery</th>
          <th>Total</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $grand_total = 0;
         foreach ($cart as $id => $item):
           $qty = isset($item['quantity']) ? (int)$item['quantity'] : 1;
           $price = isset($item['price']) ? (float)$item['price'] : 0;
           $delivery = $delivery_fees[$id] ?? 0;
            $total = ($price * $qty) + $delivery;
            $grand_total += $total;
        ?>
          <tr>
            <td><img src="image/<?php echo htmlspecialchars($item['image']); ?>" width="70" height="70"></td>
            <td><?php echo htmlspecialchars($item['name']); ?></td>
            <td>₹<?php echo number_format($price); ?></td>
            <td><?php echo $qty; ?></td>
            <td>₹<?php echo number_format($delivery); ?></td>
            <td><strong>₹<?php echo number_format($total); ?></strong></td>
            <td><a href="remove_cart.php?id=<?php echo $id; ?>" class="btn btn-danger btn-sm">Remove</a></td>
          </tr>
        <?php endforeach; ?>
        <tr>
          <td colspan="5" class="text-end"><strong>Grand Total:</strong></td>
          <td colspan="2"><strong>₹<?php echo number_format($grand_total); ?></strong></td>
        </tr>
      </tbody>
    </table>
  </div> 

    <div class="d-flex justify-content-between">
      <a href="home.php" class="btn btn-secondary">⬅️ Continue Shopping</a>
      <a href="checkout.php" class="btn btn-success">✅ Proceed to Buy</a>
    </div>
  <?php else: ?>
    <div class="alert alert-warning">Your cart is empty. <a href="home.php">Shop now</a></div>
  <?php endif; ?>
</div>
</body>
</html>
