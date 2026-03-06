<?php
include 'auth_admin.php';
include 'db.php';

/* ---------- COUNTS ---------- */
$totalUsers = 0;
$totalOrders = 0;
$totalComplaints = 0;

$res = $conn->query("SELECT COUNT(*) AS total FROM users");
if ($res) $totalUsers = (int)$res->fetch_assoc()['total'];

$res = $conn->query("SELECT COUNT(*) AS total FROM orders");
if ($res) $totalOrders = (int)$res->fetch_assoc()['total'];

$res = $conn->query("SELECT COUNT(*) AS total FROM complaints");
if ($res) $totalComplaints = (int)$res->fetch_assoc()['total'];

/* ---------- RECENT ORDERS ---------- */
$recentOrders = [];
$sqlOrders = "
  SELECT o.id, o.user_id, o.total, o.payment, o.created_at,o.status,
         u.first_name, u.last_name, u.email
  FROM orders o
  JOIN users u ON u.id = o.user_id
  ORDER BY o.id DESC
  LIMIT 10
";
$res = $conn->query($sqlOrders);
if ($res) {
  while ($row = $res->fetch_assoc()) $recentOrders[] = $row;
}

/* ---------- RECENT COMPLAINTS ---------- */
$recentComplaints = [];
$sqlComplaints = "
  SELECT c.id, c.user_id, c.subject, c.message, c.created_at,
         u.first_name, u.last_name, u.email
  FROM complaints c
  LEFT JOIN users u ON u.id = c.user_id
  ORDER BY c.id DESC
  LIMIT 10
";
$res = $conn->query($sqlComplaints);
if ($res) {
  while ($row = $res->fetch_assoc()) $recentComplaints[] = $row;
}

function e($s) { return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); }
function statusBadge($status) {
  $s = strtolower(trim((string)$status));
  return match ($s) {
    'pending'   => 'warning',
    'shipped'   => 'info',
    'delivered' => 'success',
    'cancelled' => 'danger',
    default     => 'secondary',
  };
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Dashboard</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />

  <style>
    body { background:#f8f9fa; color:#000; }

    .card-custom { 
      background:#ffffff; 
      border:1px solid #dee2e6; 
      border-radius:12px;
    }

    .muted { color:#6c757d; }

    a { text-decoration:none; }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
  <div class="container-fluid">
    <span class="navbar-brand fw-bold">
      <i class="fa-solid fa-shield-halved me-2 text-primary"></i>
      Admin Dashboard
    </span>

    <div class="ms-auto d-flex align-items-center gap-3">
      <span class="text-muted">
        Hi, <?= e($_SESSION['first_name'] ?? 'Admin'); ?>
      </span>
      <a href="home.php" class="btn btn-outline-primary btn-sm">Go to Site</a>
      <a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
    </div>
  </div>
</nav>

<div class="container py-4">

  <!-- Top Stats -->
  <div class="row g-3 mb-4">
    <div class="col-12 col-md-4">
      <div class="card card-custom p-3 shadow-sm">
        <div class="d-flex align-items-center justify-content-between">
          <div>
            <div class="muted">Total Users</div>
            <div class="fs-2 fw-bold"><?= $totalUsers; ?></div>
          </div>
          <i class="fa-solid fa-users fs-1 text-primary"></i>
        </div>
      </div>
    </div>

    <div class="col-12 col-md-4">
      <div class="card card-custom p-3 shadow-sm">
        <div class="d-flex align-items-center justify-content-between">
          <div>
            <div class="muted">Total Orders</div>
            <div class="fs-2 fw-bold"><?= $totalOrders; ?></div>
          </div>
          <i class="fa-solid fa-bag-shopping fs-1 text-success"></i>
        </div>
      </div>
    </div>

    <div class="col-12 col-md-4">
      <div class="card card-custom p-3 shadow-sm">
        <div class="d-flex align-items-center justify-content-between">
          <div>
            <div class="muted">Total Complaints</div>
            <div class="fs-2 fw-bold"><?= $totalComplaints; ?></div>
          </div>
          <i class="fa-solid fa-triangle-exclamation fs-1 text-danger"></i>
        </div>
      </div>
    </div>
  </div>

  <!-- Recent Orders -->
  <div class="card card-custom p-3 mb-4 shadow-sm">
    <div class="d-flex align-items-center justify-content-between mb-3">
      <h5 class="m-0">Recent Orders</h5>
    </div>

    <div class="table-responsive">
      <table class="table table-bordered table-hover align-middle mb-0">
        <thead class="table-light">
          <tr>
            <th>#Order</th>
            <th>User</th>
            <th>Email</th>
            <th>Total</th>
            <th>Payment</th>
            <th>Status</th>
            <th>Change Status</th>
            <th>Date</th>
          </tr>
        </thead>
        <tbody>
        <?php if (count($recentOrders) === 0): ?>
         <tr><td colspan="8" class="text-center text-muted">No orders found.</td></tr>
        <?php else: ?>
          <?php foreach ($recentOrders as $o): ?>
            <tr>
             <td><?= e($o['id']); ?></td>
                 <td><?= e(trim(($o['first_name'] ?? '').' '.($o['last_name'] ?? ''))); ?></td>
                <td><?= e($o['email']); ?></td>
                 <td>₹<?= e(number_format((float)$o['total'], 2)); ?></td>
                 <td><?= e($o['payment']); ?></td>

              <td>
                  <span class="badge bg-<?= e(statusBadge($o['status'] ?? '')); ?>">
                  <?= e($o['status'] ?? 'Pending'); ?>
                     </span>
                </td>

                  <td style="min-width:180px;">
                      <form method="POST" action="update_order_status.php" class="d-flex gap-2">
                     <input type="hidden" name="order_id" value="<?= (int)$o['id']; ?>">

                     <select name="status" class="form-select form-select-sm">
                 <?php
                      $current = (string)($o['status'] ?? 'Pending');
                      $opts = ['Pending','Shipped','Delivered','Cancelled'];
                       foreach ($opts as $st):
                    ?>
                      <option value="<?= e($st); ?>" <?= ($current === $st ? 'selected' : ''); ?>>
                      <?= e($st); ?>
                   </option>
                 <?php endforeach; ?>
                   </select>

                  <button type="submit" class="btn btn-sm btn-primary">Update</button>
                    </form>
                    </td>

                    <td><?= e($o['created_at']); ?></td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Recent Complaints -->
  <div class="card card-custom p-3 shadow-sm">
    <div class="d-flex align-items-center justify-content-between mb-3">
      <h5 class="m-0">Recent Complaints</h5>
    </div>

    <div class="table-responsive">
      <table class="table table-bordered table-hover align-middle mb-0">
        <thead class="table-light">
          <tr>
            <th>#</th>
            <th>User</th>
            <th>Email</th>
            <th>Subject</th>
            <th>Message</th>
            <th>Date</th>
          </tr>
        </thead>
        <tbody>
        <?php if (count($recentComplaints) === 0): ?>
          <tr><td colspan="6" class="text-center text-muted">No complaints found.</td></tr>
        <?php else: ?>
          <?php foreach ($recentComplaints as $c): ?>
            <tr>
              <td><?= e($c['id']); ?></td>
              <td><?= e(trim(($c['first_name'] ?? 'Guest').' '.($c['last_name'] ?? ''))); ?></td>
              <td><?= e($c['email'] ?? ''); ?></td>
              <td><?= e($c['subject']); ?></td>
              <td><?= e(mb_strimwidth($c['message'], 0, 80, '...')); ?></td>
              <td><?= e($c['created_at']); ?></td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>