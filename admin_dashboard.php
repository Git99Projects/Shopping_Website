<?php
include 'auth_admin.php';
include 'db.php';
include 'user_profile_data.php';

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
  SELECT 
    o.id,
    o.user_id,
    o.total,
    o.payment,
    o.created_at,
    o.status,
    u.first_name,
    u.last_name,
    u.email,
    COUNT(oi.id) AS product_count
  FROM orders o
  JOIN users u ON u.id = o.user_id
  LEFT JOIN order_items oi ON oi.order_id = o.id
  GROUP BY o.id, o.user_id, o.total, o.payment, o.created_at, o.status, u.first_name, u.last_name, u.email
  ORDER BY o.id DESC
  LIMIT 10
";
$res = $conn->query($sqlOrders);
if ($res) {
  while ($row = $res->fetch_assoc()) {
    $recentOrders[] = $row;
  }
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
  while ($row = $res->fetch_assoc()) {
    $recentComplaints[] = $row;
  }
}

function e($s) {
  return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8');
}

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
    body{
background: linear-gradient(135deg,#0f2027,#203a43,#2c5364);
min-height:100vh;
color:white;
}
.navbar{
background:linear-gradient(45deg,#141e30,#243b55);
border-bottom:1px solid rgba(255,255,255,0.1);
}

.navbar-brand{
color:#00d4ff !important;
font-size:20px;
letter-spacing:1px;
}

    .card-custom{
background:rgba(255,255,255,0.08);
backdrop-filter:blur(15px);
border:1px solid rgba(255,255,255,0.2);
border-radius:16px;
box-shadow:
0 10px 30px rgba(0,0,0,0.4);

transition:0.3s;
}

.card-custom:hover{
transform:translateY(-6px);
box-shadow:
0 15px 40px rgba(0,0,0,0.6),
0 0 15px rgba(0,212,255,0.5);
}
.fa-users{
color:#00d4ff;
}

.fa-bag-shopping{
color:#00ff9c;
}

.fa-triangle-exclamation{
color:#ff4d6d;
}
.table{
background:rgba(255,255,255,0.05);
backdrop-filter:blur(10px);
color:white;
border-radius:12px;
overflow:hidden;
}

.table td,
.table th{
border-color:rgba(255,255,255,0.1);
border:none !important;
}
.table thead{
background:rgba(255,255,255,0.1);
color:white;
font-weight:600;

}
.table-hover tbody tr{
transition:0.2s;
border-bottom:1px solid rgba(255,255,255,0.08);
}
.table-hover tbody tr:hover{
background:rgba(0,212,255,0.15);
transition:0.2s;
transform:none;
box-shadow:none;
}
.table-bordered{
border:none;
}

/* table cells dark background */
.table tbody td{
background:rgba(186, 179, 179, 0.35);
color:white;
}

/* hover par thoda glow */
.table tbody tr:hover td{
background:rgba(97, 82, 82, 0.55);
}
.btn{
transition:0.3s;
}

.btn:hover{
transform:scale(1.05);
box-shadow:0 0 12px rgba(0,212,255,0.6);
}
.card-custom h5{
color:white;
}
.card-custom .fs-2{
color:#ffffff;
font-weight:700;

text-shadow:
0 0 5px rgba(0,212,255,0.7),
0 0 10px rgba(0,212,255,0.5);
}
    .muted {
      color:white;;
    }

    a {
      text-decoration: none;
    }

    .modal-body img {
      border-radius: 8px;
      object-fit: cover;
    }

.modal-content{
background:#1e2a38;
color:white;
border-radius:12px;
}

.modal-body{
background:#1e2a38;
color:white;
font-weight:500;
}
.modal-body table{
color:white;
background:rgba(255,255,255,0.05);
}

.modal-body table th{
background:rgba(0,212,255,0.15);
color:white;
}

.modal-body table td{
color:white !important;
}
/* Product name / price text */
.modal-body p,
.modal-body span{
color:white;
}

#orderProductsModalBody *{
color:white !important;
background-color:transparent !important;
}

.hide-id{
display:none;
}
/* Premium index badge */
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
/* 🔥 UNIVERSAL RESPONSIVE FIX */
/* ========================= */

/* Container safe */
.container {
  width: 100%;
}

/* Table scroll fix */
.table-responsive {
  overflow-x: auto;
}

/* ========================= */
/* 📱 MOBILE (0–576px) */
/* ========================= */
@media (max-width: 576px) {

  /* Navbar wrap */
  .navbar .d-flex {
    flex-wrap: wrap;
    gap: 8px;
    justify-content: center;
    text-align: center;
  }

  .navbar .btn {
    font-size: 12px;
    padding: 5px 10px;
  }

  /* Top buttons (Add/Delete/Restore) */
  .mb-4.d-flex {
    flex-direction: column;
    align-items: stretch;
  }

  .mb-4.d-flex .btn {
    width: 100%;
  }

  /* Cards text */
  .card-custom {
    padding: 12px !important;
  }

  .card-custom .fs-2 {
    font-size: 22px;
  }

  /* Table scroll instead of break */
  .table {
    min-width: 900px;   /* 🔥 main fix */
    font-size: 12px;
  }

  .table td, .table th {
    white-space: nowrap;
  }

  /* Form inside table */
  .table form {
    flex-direction: column;
    gap: 5px;
  }

  .form-select {
    font-size: 12px;
  }

  .btn-sm {
    font-size: 11px;
    padding: 4px 8px;
  }

  /* Modal responsive */
  .modal-dialog {
    margin: 10px;
  }

}

/* ========================= */
/* 📱 TABLET */
/* ========================= */
@media (min-width: 577px) and (max-width: 991px) {

  .table {
    min-width: 800px;
    font-size: 13px;
  }

  .card-custom .fs-2 {
    font-size: 26px;
  }

}

/* ========================= */
/* 💻 LAPTOP */
/* ========================= */
@media (min-width: 992px) {

  .table {
    font-size: 14px;
  }

}
/* 🔵 Nav Glow (same effect) */
.nav-glow {
    font-weight: bold;
    font-size: 16px;
    color: #2020e7ff;
    text-shadow: 0 0 6px #e6dfdfff, 0 0 12px #314180ff;
    transition: 0.3s ease;
}

.nav-glow:hover {
    color: #ff1493;
    transform: scale(1.08);
}

/* 🔵 Dropdown button */
.dropdown-custom {
    background: transparent !important;
    color: #2020e7ff !important;
    border-radius: 8px;
    transition: 0.3s ease;
}

.dropdown-custom:hover {
    background: rgba(255,255,255,0.2) !important;
    transform: scale(1.05);
}

/* 🔵 Dropdown menu (IMPORTANT for working) */
.dropdown-menu {
    background: rgba(152, 137, 137, 0.9) !important;
    backdrop-filter: blur(10px);
    border-radius: 10px;
    z-index: 9999;
}

.dropdown-menu .dropdown-item {
    color: white;
    transition: 0.3s;
}

.dropdown-menu .dropdown-item:hover {
    background: rgba(255,255,255,0.2);
    color: red;
}

/* 🔵 Profile Image */
.profile-img {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    border: 2px solid #00c6ff;
    cursor: pointer;
}

.profile-img:hover {
    transform: scale(1.1);
    box-shadow: 0 0 20px #00c6ff;
}

/* 🔵 Default Avatar */
.nav-avatar {
    width: 35px;
    height: 35px;
    border-radius: 50%;
    display:flex;
    align-items:center;
    justify-content:center;
    background: linear-gradient(135deg,#00c6ff,#0072ff);
    color: white;
    font-weight: bold;
    font-size: 14px;
    cursor: pointer;
}

.nav-avatar:hover {
    transform: scale(1.1);
    box-shadow: 0 0 15px #00c6ff;
}
#passwordBox {
  transition: all 0.3s ease;
}
/* 🔥 Premium Select */
.premium-select {
  background: rgba(181, 170, 170, 0.1);
  color: white;
  border-radius: 12px;
  border: 1px solid rgba(255,255,255,0.3);
  backdrop-filter: blur(10px);
  transition: 0.3s;
}

.premium-select:hover {
  box-shadow: 0 0 15px rgba(0,212,255,0.6);
}

.premium-select:focus {
  border-color: #00c6ff;
  box-shadow: 0 0 20px rgba(0,198,255,0.8);
}

/* option text fix */
.premium-select option {
  color: black;
}
.form-control {
  background: rgba(152, 129, 129, 0.14);
  color: white;
  border-radius: 10px;
  border: 1px solid rgba(255,255,255,0.3);
}

.form-control:focus {
  border-color: #00c6ff;
  box-shadow: 0 0 15px rgba(0,198,255,0.8);
}
.toast {
  background: linear-gradient(135deg,#00c6ff,#0072ff);
  border-radius: 12px;
  box-shadow: 0 0 20px rgba(0,198,255,0.7);
  font-weight: bold;
}
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
      <span class="navbar-brand">
        Hi, <?= e($_SESSION['first_name'] ?? 'Admin'); ?>
      </span>
      
      <!-- Profile (ONLY ONE ICON) -->
      <div class="dropdown">
        <a class="btn text-dark fw-bold nav-glow dropdown-custom" href="#"
           role="button" data-bs-toggle="dropdown">
          <?php if (!empty($profile_image)): ?>
    <img src="uploads/<?php echo $profile_image; ?>" class="profile-img">
<?php else: ?>
    <div class="nav-avatar">
        <?php echo strtoupper($first_name[0] ?? 'U'); ?>
    </div>
<?php endif; ?>
        </a>
        <ul class="dropdown-menu dropdown-glass">
          <?php if (isset($_SESSION['user_id'])): ?>
            <li><a class="dropdown-item nav-glow" href="profile.php">My Profile</a></li>
            <li><a class="dropdown-item nav-glow" href="order_history.php">Orders</a></li>
            <li><a class="dropdown-item nav-glow" href="complain.php">Complaints</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item text-danger" href="logout.php">Logout</a></li>
          <?php else: ?>
            <li><a class="dropdown-item nav-glow" href="login.php">Login</a></li>
            <li><a class="dropdown-item nav-glow" href="register.php">Register</a></li>
          <?php endif; ?>
        </ul>
      </div>
      <a href="home.php" class="btn btn-outline-primary btn-sm">Go to Site</a>
      <a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
    </div>
  </div>
</nav>

<div class="container py-4">

<?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
  <div class="mb-4 d-flex gap-2 flex-wrap">
    <a href="insert_products.php" class="btn btn-success">➕ Add Product</a>
    <a href="home.php?delete_mode=1" class="btn btn-danger">🗑️ Delete Product</a>
    <a href="restore_products.php" class="btn btn-warning">♻️ Restore Product</a>
    <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#changePasswordModal">
  🔑 User Change Password
</button>
<button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteUserModal">
  🗑️ Delete Users
</button>
</div>

<?php endif; ?>

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
      <table class="table table-bordered table-hover align-middle mb-0 ">
        <thead class="table-light">
          <tr>
            <th>No.</th>
            <th>Products</th>
            <th>User</th>
            <th>Email</th>
            <th>Total</th>
            <th>Payment</th>
            <th>Status</th>
            <th>Change Status</th>
            <th>Date</th>
            <th>View Products</th>
          </tr>
        </thead>
        <tbody>
        <?php if (count($recentOrders) === 0): ?>
          <tr>
            <td colspan="9" class="text-center text-muted">No orders found.</td>
          </tr>
        <?php else: ?>
          <?php $i = 1; foreach ($recentOrders as $o): ?>
            <tr>
              <td><span class="index-box"><?= $i++; ?></span></td>
              <td>
                <span class="badge bg-dark">
                  <?= (int)$o['product_count']; ?> item<?= ((int)$o['product_count'] !== 1 ? 's' : ''); ?>
                </span>
              </td>

              <td><?= e(trim(($o['first_name'] ?? '') . ' ' . ($o['last_name'] ?? ''))); ?></td>
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
                    $opts = ['Pending', 'Shipped', 'Delivered', 'Cancelled'];
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

              <td>
                <button
                  type="button"
                  class="btn btn-sm btn-info text-white view-products-btn"
                  data-order-id="<?= (int)$o['id']; ?>"
                  data-bs-toggle="modal"
                  data-bs-target="#orderProductsModal"
                >
                  View
                </button>
              </td>
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
      <table class="table table-bordered table-hover align-middle mb-0 complaints-table">
        <thead class="table-light">
          <tr>
            <th>No.</th>
            <th class="hide-id">#</th>
            <th>User</th>
            <th>Email</th>
            <th>Subject</th>
            <th>Message</th>
            <th>Date</th>
          </tr>
        </thead>
        <tbody>
        <?php if (count($recentComplaints) === 0): ?>
          <tr>
            <td colspan="6" class="text-center text-muted">No complaints found.</td>
          </tr>
        <?php else: ?>
          <?php $j = 1; foreach ($recentComplaints as $c): ?>
            <tr>
              <td><span class="index-box"><?= $j++; ?></span></td>
              <td class="hide-id"><?= e($c['id']); ?></td>
              <td><?= e(trim(($c['first_name'] ?? 'Guest') . ' ' . ($c['last_name'] ?? ''))); ?></td>
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

<!-- Order Products Modal -->
<div class="modal fade" id="orderProductsModal" tabindex="-1" aria-labelledby="orderProductsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Ordered Products</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="orderProductsModalBody">
        <div class="text-center py-4">
          <div class="spinner-border text-primary" role="status"></div>
          <div class="mt-2">Loading products...</div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Toast Popup -->
<div class="position-fixed top-0 end-0 p-3" style="z-index:9999">

  <div id="liveToast" class="toast align-items-center text-white border-0" role="alert">
    <div class="d-flex">

      <div class="toast-body" id="toastMessage">
        <!-- Message yaha aayega -->
      </div>

      <button type="button" class="btn-close btn-close-white me-2 m-auto"
              data-bs-dismiss="toast"></button>

    </div>
  </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {
  const modalBody = document.getElementById("orderProductsModalBody");
  const buttons = document.querySelectorAll(".view-products-btn");

  buttons.forEach(button => {
    button.addEventListener("click", function () {
      const orderId = this.getAttribute("data-order-id");

      modalBody.innerHTML = `
        <div class="text-center py-4">
          <div class="spinner-border text-primary" role="status"></div>
          <div class="mt-2">Loading products...</div>
        </div>
      `;

      fetch("get_order_products.php?order_id=" + encodeURIComponent(orderId))
        .then(response => response.text())
        .then(html => {
          modalBody.innerHTML = html;
        })
        .catch(error => {
          modalBody.innerHTML = `
            <div class="alert alert-danger">Failed to load ordered products.</div>
          `;
          console.error(error);
        });
    });
  });
});
</script>
<script>
function togglePasswordBox() {
  const box = document.getElementById("passwordBox");

  if (box.style.display === "none") {
    box.style.display = "block";
  } else {
    box.style.display = "none";
  }
}
</script>
<script>
document.addEventListener("DOMContentLoaded", function () {

  const urlParams = new URLSearchParams(window.location.search);
  const msg = urlParams.get("msg");

  if (msg) {
    const toastEl = document.getElementById("liveToast");
    const toastMsg = document.getElementById("toastMessage");

    if (msg === "passsuccess") {
      toastMsg.innerHTML = "✅ Password updated successfully";
      toastEl.style.background = "linear-gradient(135deg,#00ff9c,#00c6ff)";
    } 
    else if (msg === "error") {
      toastMsg.innerHTML = "⚠️ Failed to update password!";
      toastEl.style.background = "linear-gradient(135deg,#ff4d4d,#cc0000)";
    }
    else if (msg === "deleted") {
     toastMsg.innerHTML = "🗑️ Users deleted successfully";
     toastEl.style.background = "linear-gradient(135deg,#ff4d4d,#cc0000)";
     }

    const toast = new bootstrap.Toast(toastEl);
    toast.show();
    // 🔥 URL clean (optional)
    window.history.replaceState({}, document.title, window.location.pathname);
  }

});
</script>
<script>
function togglePassword(id, el) {
  const input = document.getElementById(id);
  const isHidden = input.type === "password";
  input.type = isHidden ? "text" : "password";
  el.textContent = isHidden ? "🙈" : "👁️";
}
</script>
<!-- 🔥 DELETE USER MODAL -->
<div class="modal fade" id="deleteUserModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Delete Users</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <form method="POST" action="delete_multiple_users.php">

        <div class="modal-body" style="max-height:300px; overflow:auto;">

          <?php
          $users = $conn->query("SELECT id, email FROM users WHERE role != 'admin'");
          while($u = $users->fetch_assoc()):
          ?>

          <div class="form-check mb-2">
            <input class="form-check-input" type="checkbox" name="user_ids[]" value="<?= $u['id']; ?>">
            <label class="form-check-label">
              <?= $u['email']; ?>
            </label>
          </div>

          <?php endwhile; ?>

        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-danger w-100">
            Delete Selected Users
          </button>
        </div>

      </form>

    </div>
  </div>
</div>
<!-- CHANGE PASSWORD MODAL -->
<div class="modal fade" id="changePasswordModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Change User Password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <form method="POST" action="admin_change_password.php">

        <div class="modal-body">

          <!-- Select User -->
          <select name="user_id" class="form-select mb-3" required>
            <option value="">Select User Email</option>

            <?php
            $users = $conn->query("SELECT id, email FROM users");
            while($u = $users->fetch_assoc()):
            ?>
              <option value="<?= $u['id']; ?>">
                <?= $u['email']; ?>
              </option>
            <?php endwhile; ?>
          </select>

          <!-- Password -->
          <div style="position:relative;">
            <input type="password" id="adminPassword" name="new_password" class="form-control" placeholder="New Password" required>

            <span onclick="togglePassword('adminPassword', this)" 
              style="position:absolute; right:10px; top:50%; transform:translateY(-50%); cursor:pointer;">
              👁️
            </span>
          </div>

        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-success w-100">
            Update Password
          </button>
        </div>

      </form>

    </div>
  </div>
</div>
</body>
</html>