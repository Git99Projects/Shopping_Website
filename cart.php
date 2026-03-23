<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = (int)$_SESSION['user_id'];

/* USER-WISE cart */
if (!isset($_SESSION['cart']) || !is_array($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
if (!isset($_SESSION['cart'][$user_id]) || !is_array($_SESSION['cart'][$user_id])) {
    $_SESSION['cart'][$user_id] = [];
}
$cart = &$_SESSION['cart'][$user_id];

/* USER-WISE delivery fees */
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
  background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
  font-family: 'Segoe UI', sans-serif;
}

/* Glass Container */
.container-box {
  max-width: 1100px;
  margin: auto;
  padding: 30px;
  border-radius: 20px;

  background: rgba(255,255,255,0.08);
  backdrop-filter: blur(15px);

  border: 1px solid rgba(255,255,255,0.2);
  box-shadow: 0 15px 40px rgba(0,0,0,0.4);

  color: white;
}

/* Heading */
.cart-title {
  color: white;
  font-weight: 700;
}

/* Table */
.table {
  color: white;
  border-radius: 10px;
  overflow: hidden;
}

.table thead {
  background: linear-gradient(135deg, #00c6ff, #0072ff);
}

.table tbody tr {
  background: rgba(255,255,255,0.05);
  transition: 0.3s;
}

.table tbody tr:hover {
  background: rgba(0,198,255,0.15);
  
}

/* Table cells */
.table td, .table th {
  border-color: rgba(255,255,255,0.1);
}

/* Image */
img {
  border-radius: 8px;
  transition: 0.3s;
}

img:hover {
  transform: scale(1.1);
  box-shadow: 0 0 15px rgba(0,198,255,0.6);
}

/* Buttons */
.btn-danger {
  background: linear-gradient(135deg, #ff4d4d, #cc0000);
  border: none;
  border-radius: 20px;
  transition: 0.3s;
}

.btn-danger:hover {
  transform: scale(1.1);
  box-shadow: 0 0 10px rgba(255,0,0,0.7);
}

.btn-success {
  background: linear-gradient(135deg, #00c851, #007e33);
  border: none;
  border-radius: 20px;
}

.btn-secondary {
  background: linear-gradient(135deg, #00c6ff, #0072ff);
  border: none;
  border-radius: 20px;
}

/* Alert */
.alert {
  background: rgba(255,255,0,0.1);
  border-left: 4px solid yellow;
  color: #fff;
}


/* ========================= */
/* 💻 LAPTOP VIEW */
/* ========================= */
@media (min-width: 992px) {
  .container-box {
    max-width: 1200px;
  }
}
input[type="checkbox"] {
  transform: scale(1.2);
  accent-color: #00c6ff;
}
/* All main buttons smooth effect */
.btn {
  transition: all 0.3s ease;
}

/* Continue Shopping (secondary) */
.btn-secondary:hover {
  transform: scale(1.08);
  box-shadow: 0 0 15px rgba(0,198,255,0.7);
}

/* Proceed to Buy (success) */
.btn-success:hover {
  transform: scale(1.08);
  box-shadow: 0 0 15px rgba(0,255,100,0.7);
}
/* ========================= */
/* 🔥 UNIVERSAL RESPONSIVE FIX */
/* ========================= */

.container-box {
  width: 100%;
  max-width: 1100px;
}

/* Table scroll fix */
.table-responsive {
  overflow-x: auto;
}

/* ========================= */
/* 📱 MOBILE (0–576px) */
/* ========================= */
@media (max-width: 576px) {

  .container-box {
    padding: 12px;
  }

  .cart-title {
    font-size: 18px;
    text-align: center;
  }

  /* ✅ Table scroll instead of break */
  .table {
    min-width: 750px;   /* 🔥 important */
    font-size: 12px;
  }

  .table td, .table th {
    white-space: nowrap;
  }

  img {
    width: 50px;
    height: 50px;
  }

  .btn {
    font-size: 12px;
    padding: 5px 10px;
  }

  .d-flex {
    flex-direction: column;
    gap: 10px;
  }
}

/* ========================= */
/* 📱 TABLET */
/* ========================= */
@media (min-width: 577px) and (max-width: 991px) {

  .container-box {
    max-width: 95%;
    padding: 20px;
  }

  .table {
    font-size: 13px;
  }
}

/* ========================= */
/* 💻 LAPTOP */
/* ========================= */
@media (min-width: 992px) {

  .container-box {
    max-width: 1200px;
  }

  .table {
    font-size: 14px;
  }
}
  </style>
</head>
<body>
<div class="container mt-5">
  <div class="container-box">
    <a href="home.php" class="btn btn-secondary mb-3">⬅️ Back</a>
    <h2 class="mb-4 cart-title">🛒 Your Shopping Cart</h2>

    <?php if (!empty($cart)): ?>
      <form action="checkout.php?type=cart" method="POST">
        <div class="table-responsive">
          <table class="table table-bordered align-middle">
            <thead class="table-info">
              <tr>
                <th class="select-col">
                  <input type="checkbox" id="select_all">
                </th>
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
                  $delivery = isset($delivery_fees[$id]) ? (float)$delivery_fees[$id] : 0;
                  $total = ($price * $qty) + $delivery;
                  $grand_total += $total;
              ?>
                <tr>
                  <td>
                    <input
                      type="checkbox"
                      name="selected_items[]"
                      value="<?php echo htmlspecialchars((string)$id); ?>"
                      class="item-checkbox"
                    >
                  </td>
                  <td>
                    <img
                      src="image/<?php echo htmlspecialchars($item['image'] ?? ''); ?>"
                      width="70"
                      height="70"
                      alt="<?php echo htmlspecialchars($item['name'] ?? 'Product'); ?>"
                    >
                  </td>
                  <td><?php echo htmlspecialchars($item['name'] ?? ''); ?></td>
                  <td>₹<?php echo number_format($price, 2); ?></td>
                  <td><?php echo $qty; ?></td>
                  <td>₹<?php echo number_format($delivery, 2); ?></td>
                  <td><strong>₹<?php echo number_format($total, 2); ?></strong></td>
                  <td>
                    <a href="remove_cart.php?id=<?php echo urlencode((string)$id); ?>" class="btn btn-danger btn-sm">
                      Remove
                    </a>
                  </td>
                </tr>
              <?php endforeach; ?>

              <tr>
                <td colspan="6" class="text-end"><strong>Grand Total:</strong></td>
                <td colspan="2"><strong>₹<?php echo number_format($grand_total, 2); ?></strong></td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="d-flex justify-content-between mt-3">
          <a href="home.php" class="btn btn-secondary">⬅️ Continue Shopping</a>
          <button type="submit" class="btn btn-success">✅ Proceed to Buy </button>
        </div>
      </form>
    <?php else: ?>
      <div class="alert alert-warning">
        Your cart is empty. <a href="home.php">Shop now</a>
      </div>
    <?php endif; ?>
  </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
  const selectAll = document.getElementById("select_all");
  const itemCheckboxes = document.querySelectorAll(".item-checkbox");

  if (selectAll) {
    selectAll.addEventListener("change", function () {
      itemCheckboxes.forEach(function (checkbox) {
        checkbox.checked = selectAll.checked;
      });
    });
  }
});
</script>
</body>
</html>