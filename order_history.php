<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
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
  <h2>📦 Your Order History</h2>

  <?php if (!empty($_SESSION['order_history'])): ?>
    <?php foreach (array_reverse($_SESSION['order_history']) as $order): ?>
      <div class="card my-4">
        <div class="card-header bg-info text-white">
          <strong>Order Date:</strong> <?php echo $order['timestamp']; ?> |
          <strong>Payment:</strong> <?php echo htmlspecialchars($order['user']['payment']); ?>
        </div>
        <div class="card-body">
          <p><strong>Name:</strong> <?php echo htmlspecialchars($order['user']['name']); ?></p>
          <p><strong>Address:</strong> <?php echo nl2br(htmlspecialchars($order['user']['address'])); ?></p>

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
              <?php foreach ($order['items'] as $item): ?>
                <tr>
                  <td><img src="image/<?php echo htmlspecialchars($item['image']); ?>" width="60"></td>
                  <td><?php echo htmlspecialchars($item['name']); ?></td>
                  <td><?php echo $item['quantity']; ?></td>
                  <td>₹<?php echo number_format($item['price']); ?></td>
                  <td>₹<?php echo number_format($item['delivery']); ?></td>
                  <td>₹<?php echo number_format($item['total']); ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
            <tfoot>
              <tr>
                <td colspan="5" class="text-end"><strong>Total Paid:</strong></td>
                <td><strong>₹<?php echo number_format($order['total']); ?></strong></td>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    <?php endforeach; ?>
  <?php else: ?>
    <div class="alert alert-warning">No orders placed yet.</div>
  <?php endif; ?>

  <a href="home.php" class="btn btn-primary">⬅️ Back to Shop</a>
</div>
</body>
</html>
