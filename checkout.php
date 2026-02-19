<?php
session_start();

// Redirect if cart is empty
if (empty($_SESSION['cart'])) {
  header("Location: cart.php");
  exit();
}

// Ensure delivery fees are set
if (!isset($_SESSION['delivery_fees'])) {
  $_SESSION['delivery_fees'] = [];
}
foreach ($_SESSION['cart'] as $id => $item) {
  if (!isset($_SESSION['delivery_fees'][$id]) || $_SESSION['delivery_fees'][$id] <= 0) {
    $_SESSION['delivery_fees'][$id] = rand(10, 100);
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Checkout</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
  body {
    background:rgb(60, 205, 47);
    font-family: 'Segoe UI', sans-serif;
  }

  .container {
    background: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
  }

  h2, h3, h4 {
    font-weight: bold;
    color: #343a40;
  }

  .list-group-item {
    background-color: #fff;
    border: 1px solid #dee2e6;
    border-radius: 8px;
    margin-bottom: 10px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.03);
  }

  .form-control {
    border-radius: 8px;
    border: 1px solidrgb(233, 242, 250);
    box-shadow: none;
  }

  .form-control:focus {
    border-color: #80bdff;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.25);
  }

  label {
    font-weight: 500;
    margin-bottom: 5px;
  }

  textarea.form-control {
    resize: none;
  }

  .btn-success {
    background-color: #198754;
    border: none;
    font-weight: bold;
  }

  .btn-success:hover {
    background-color: #157347;
  }

  .btn-warning {
    border: none;
  }

  .alert-success {
    border-radius: 10px;
    background-color: #d4edda;
    border: 1px solid #c3e6cb;
    color: #155724;
  }
</style>

</head>
<body>
  
<div class="container mt-4">
<a href="cart.php" class="btn btn-secondary">⬅️ Back</a>
  <h2 align="center">🛍 Proceed to Buy</h2>

  <?php
    $grand_total = 0;
    echo '<ul class="list-group mb-3">';
    foreach ($_SESSION['cart'] as $id => $item) {
      $price = $item['price'];
      $qty = $item['quantity'];
      $delivery = $_SESSION['delivery_fees'][$id];
      $subtotal = ($price * $qty) + $delivery;
      $grand_total += $subtotal;

      echo '<li class="list-group-item d-flex justify-content-between align-items-center">';
      echo htmlspecialchars($item['name']) . " (Qty: $qty)";
      echo "<span>₹" . number_format($price * $qty) . " + ₹" . number_format($delivery) . " delivery</span>";
      echo '</li>';
    }
    echo '</ul>';
  ?>

  <h4 class="text-success">Total Payable: ₹<?php echo number_format($grand_total); ?></h4>

  <h3 class="mt-4">🧾 Customer Information</h3>
  <form action="place_order.php" method="POST">

    <?php if (!empty($_SESSION['user_info'])): ?>
      <?php $u = $_SESSION['user_info']; ?>
      <div class="alert alert-success">
        <strong>Welcome back <?php echo htmlspecialchars($u['name']); ?>!</strong><br>
        Address already saved:
        <p><?php echo nl2br(htmlspecialchars($u['address'])); ?></p>
        <a href="clear_user_info.php" class="btn btn-warning btn-sm">Change Address</a>
      </div>

      <input type="hidden" name="name" value="<?php echo htmlspecialchars($u['name']); ?>">
      <input type="hidden" name="email" value="<?php echo htmlspecialchars($u['email']); ?>">
      <input type="hidden" name="phone" value="<?php echo htmlspecialchars($u['phone']); ?>">
      <input type="hidden" name="address" value="<?php echo htmlspecialchars($u['address']); ?>">

    <?php else: ?>
      <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Phone</label>
        <input type="text" name="phone" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Address</label>
        <textarea name="address" class="form-control" rows="3" required></textarea>
      </div>
    <?php endif; ?>

    <div class="mb-3">
      <label>Payment Method</label>
      <select name="payment" class="form-control" required>
        <option value="Cash on Delivery">Cash on Delivery</option>
        <option value="UPI">UPI</option>
        <option value="Net Banking">Net Banking</option>
        <option value="Credit/Debit Card">Credit/Debit Card</option>
      </select>
    </div>

    <button type="submit" class="btn btn-success">Confirm & Place Order</button>
  </form>
</div>
</body>
</html>
