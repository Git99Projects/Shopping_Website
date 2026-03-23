<?php
session_start();
include 'db.php';
if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}
$user_id = $_SESSION['user_id'];

// Fetch this user's orders from DB
$stmt = $conn->prepare("SELECT * FROM orders WHERE user_id = ? AND deleted_by_user = 0 ORDER BY id DESC");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$orders = $stmt->get_result();
$stmt->close();

// Prepare statement for order items
$itemStmt = $conn->prepare("SELECT * FROM order_items WHERE order_id = ? ORDER BY id ASC");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Order History</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
  background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
  font-family: 'Segoe UI', sans-serif;
}

/* 🔥 Glass Container */
.container {
  max-width: 1100px;
  margin: 40px auto;
  padding: 30px;
  border-radius: 20px;

  background: rgba(255, 255, 255, 0.08);
  backdrop-filter: blur(15px);

  border: 1px solid rgba(255,255,255,0.2);
  box-shadow: 0 15px 40px rgba(0,0,0,0.4);

  color: white;
}

/* Heading */
h2 {
  color: #fff;
  font-weight: 700;
  text-align: center;
}

/* 🔥 Order Card */
.card {
  border-radius: 15px;
  background: rgba(255,255,255,0.05);
  border: 1px solid rgba(255,255,255,0.1);
  box-shadow: 0 10px 25px rgba(0,0,0,0.3);
  transition: 0.3s;
}

.card:hover {
  transform: translateY(-5px);
  box-shadow: 0 15px 35px rgba(0,0,0,0.5);
}

/* Header */
.card-header {
  background: linear-gradient(135deg, #00c6ff, #0072ff) !important;
  color: white;
  font-weight: 500;
  border-radius: 15px 15px 0 0;
}

/* Table */
.table {
  color: white;
}

.table thead {
  background: rgba(255,255,255,0.1);
}

.table td, .table th {
  border-color: rgba(255,255,255,0.1);
}

/* Table hover */
.table tbody tr:hover {
  background: rgba(0,198,255,0.15);
}

/* Buttons */
.btn-primary {
  background: linear-gradient(135deg, #00c6ff, #0072ff);
  border: none;
  border-radius: 20px;
}

.btn-warning {
  border-radius: 20px;
}

.btn-danger {
  border-radius: 20px;
}

/* Image */
img {
  border-radius: 8px;
}

/* Alert */
.alert {
  background: rgba(255,255,0,0.1);
  border-left: 4px solid yellow;
  color: #ffd;
}

/* ========================= */
/* 📱 MOBILE VIEW */
/* ========================= */


/* ========================= */
/* 💻 LAPTOP VIEW */
/* ========================= */
@media (min-width: 992px) {
  .container {
    max-width: 1200px;
  }
}
/* All main buttons smooth effect */
.btn {
  transition: all 0.3s ease;
}

/* Continue Shopping (secondary) */
.btn-primary:hover {
  transform: scale(1.08);
  box-shadow: 0 0 15px rgba(0,198,255,0.7);
}

/* Proceed to Buy (success) */
.btn-success:hover {
  transform: scale(1.08);
  box-shadow: 0 0 15px rgba(0,255,100,0.7);
}
/* 🔥 Premium index badge */
.index-box{
  display:inline-block;
  min-width:32px;
  padding:4px 8px;
  border-radius:8px;

  background:rgba(89, 93, 95, 0.43);
  color:white;
  font-weight:800;
  text-align:center;

  box-shadow:
    0 0 8px rgba(0,212,255,0.6),
    0 0 15px rgba(0,114,255,0.4);

  font-size:13px;
}
/* ========================= */
/* 🔥 RESPONSIVE FIX */
/* ========================= */

.container {
  width: 100%;
  max-width: 1100px;
}

/* Image auto resize */
img {
  max-width: 100%;
  height: auto;
}

/* ========================= */
/* 📱 MOBILE */
/* ========================= */
@media (max-width: 576px) {

  .container {
    margin: 10px;
    padding: 12px;
  }

  h2 {
    font-size: 18px;
  }

  .card-header {
    font-size: 12px;
    line-height: 1.6;
  }

  /* ✅ Table scroll instead of break */
  .table-responsive {
    overflow-x: auto;
  }

  .table {
    min-width: 600px;
    font-size: 12px;
  }

  img {
    width: 45px;
  }

  .btn {
    width: 100%;
    font-size: 12px;
    margin-top: 6px;
  }
}

/* ========================= */
/* 📱 TABLET */
/* ========================= */
@media (min-width: 577px) and (max-width: 991px) {

  .container {
    padding: 20px;
  }

  h2 {
    font-size: 22px;
  }

  .card-header {
    font-size: 14px;
  }

  .table {
    font-size: 13px;
  }
}

/* ========================= */
/* 💻 LAPTOP */
/* ========================= */
@media (min-width: 992px) {

  .container {
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
    <a href="home.php" class="btn btn-primary">⬅️ Back</a>

  <h2 class="mb-4">📦 Your Order History</h2>
<?php $i = 1; ?>
<?php if ($orders->num_rows > 0): ?>
  <?php while ($order = $orders->fetch_assoc()): ?>
    <div class="card my-4">
    <div class="card-header bg-info text-white">

<strong>No:</strong> 
<span class="index-box"><?php echo $i++; ?></span> |

<strong>Order ID:</strong> <?php echo (int)$order['id']; ?> |
  <strong>Order Date:</strong> <?php echo htmlspecialchars($order['created_at']); ?> |

  <?php $status = $order['status'] ?? 'Pending'; ?>

  <strong>Status:</strong>
  <span class="badge bg-<?php
    echo $status === 'Pending' ? 'warning' :
         ($status === 'Shipped' ? 'info' :
         ($status === 'Delivered' ? 'success' : 'danger'));
  ?>">
    <?php echo htmlspecialchars($status); ?>
  </span> |

  <?php if ($status === 'Pending'): ?>
    <a href="cancel_order.php?id=<?php echo (int)$order['id']; ?>"
       class="btn btn-warning btn-sm float-end ms-2 btn-success"
       onclick="return confirm('Are you sure you want to cancel this order?');">
       Cancel Order
    </a>

  <?php elseif ($status === 'Delivered' || $status === 'Cancelled'): ?>
    <a href="delete_order.php?id=<?php echo (int)$order['id']; ?>"
       class="btn btn-danger btn-sm float-end ms-2"
       onclick="return confirm('Are you sure you want to remove this order from your history?');">
       Delete
    </a>
  <?php endif; ?>

  <strong>Payment:</strong> <?php echo htmlspecialchars($order['payment']); ?>

</div>

      <div class="card-body">
        <p><strong>Name:</strong> <?php echo htmlspecialchars($order['name']); ?></p>
        <p><strong>Address:</strong> <?php echo nl2br(htmlspecialchars($order['address'])); ?></p>

        <div class="table-responsive">
        <table class="table table-bordered">
          <thead class="table-light">
            <tr>
              <th>No.</th>
              <th>Image</th>
              <th>Product</th>
              <th>Qty</th>
              <th>Price</th>
              <th>Delivery</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>

          <?php
            $oid = (int)$order['id'];
            $itemStmt->bind_param("i", $oid);
            $itemStmt->execute();
            $items = $itemStmt->get_result();
          ?>
<?php $j = 1; ?>
          <?php while ($item = $items->fetch_assoc()): ?>
            <tr>
              <td><span class="index-box"><?php echo $j++; ?></span></td>
              <td>
                <?php
                  // In DB we store image like: image/abc.png OR abc.png.
                  $img = $item['image'] ?? '';
                  if ($img !== '' && strpos($img, 'image/') !== 0) {
                    $img = 'image/' . $img;
                  }
                ?>
                <?php if ($img !== ''): ?>
                  <img src="<?php echo htmlspecialchars($img); ?>" width="60">
                <?php endif; ?>
              </td>

              <td><?php echo htmlspecialchars($item['product_name']); ?></td>
              <td><?php echo (int)$item['quantity']; ?></td>
              <td>₹<?php echo number_format((float)$item['price']); ?></td>
              <td>₹<?php echo number_format((float)$item['delivery']); ?></td>
              <td>₹<?php echo number_format((float)$item['line_total']); ?></td>
            </tr>
          <?php endwhile; ?>

          </tbody>

          <tfoot>
            <tr>
              <td colspan="5" class="text-end"><strong>Total Paid:</strong></td>
              <td><strong>₹<?php echo number_format((float)$order['total']); ?></strong></td>
            </tr>
          </tfoot>
        </table>
        </div>
      </div>
    </div>
  <?php endwhile; ?>

<?php else: ?>
  <div class="alert alert-warning">No orders placed yet.</div>
<?php endif; ?>

<?php $itemStmt->close(); ?>


</div>
</body>
</html>
