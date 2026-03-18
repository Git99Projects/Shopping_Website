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
      background-color:rgb(24, 73, 148);
      font-family: 'Segoe UI', sans-serif;
    }

    .container {
      background: #fff;
      padding: 30px;
      margin-top: 40px;
      margin-bottom: 40px;
      border-radius: 10px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    h2 {
      font-weight: bold;
      color: #343a40;
      margin-bottom: 30px;
    }

    .card {
      border-radius: 10px;
      box-shadow: 0 3px 10px rgba(0,0,0,0.05);
    }

    .card-header {
      font-size: 16px;
    }

    .table th, .table td {
      vertical-align: middle;
      text-align: center;
    }

    .btn-primary {
      background-color: #007bff;
      border: none;
      font-weight: 500;
    }

    .btn-primary:hover {
      background-color: #0069d9;
    }

    .alert {
      font-size: 18px;
      background-color: #fff3cd;
      color: #856404;
      border: 1px solid #ffeeba;
      border-radius: 8px;
    }

    img {
      border-radius: 8px;
    }
  </style>
</head>
<body>
<div class="container mt-5">
    <a href="home.php" class="btn btn-primary">⬅️ Back</a>

  <h2>📦 Your Order History</h2>

<?php if ($orders->num_rows > 0): ?>
  <?php while ($order = $orders->fetch_assoc()): ?>
    <div class="card my-4">
    <div class="card-header bg-info text-white">

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
       class="btn btn-warning btn-sm float-end ms-2"
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

        <table class="table table-bordered">
          <thead class="table-light">
            <tr>
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

          <?php while ($item = $items->fetch_assoc()): ?>
            <tr>
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
  <?php endwhile; ?>

<?php else: ?>
  <div class="alert alert-warning">No orders placed yet.</div>
<?php endif; ?>

<?php $itemStmt->close(); ?>


</div>
</body>
</html>
