<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit();
}

$user_id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Complaints - Online Supermarket</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <style>
   body {
  background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
  font-family: 'Segoe UI', sans-serif;
}

/* Navbar glass effect */
.navbar {
  backdrop-filter: blur(10px);
  background: rgba(0,0,0,0.6) !important;
  box-shadow: 0 5px 20px rgba(0,0,0,0.5);
}

/* 🔥 Glass Container */
.container {
  max-width: 1000px;
  margin: 40px auto;
  padding: 30px;
  border-radius: 20px;

  background: rgba(255, 255, 255, 0.08);
  backdrop-filter: blur(15px);

  border: 1px solid rgba(255,255,255,0.2);
  box-shadow: 0 15px 40px rgba(0,0,0,0.4);

  color: white;
  transition: 0.3s;
}

.container:hover {
  transform: translateY(-5px);
  box-shadow: 0 20px 50px rgba(0,0,0,0.6);
}

/* Heading */
h2 {
  color: #fff;
  font-weight: 700;
}

/* Badge */
.badge-count {
  background: linear-gradient(135deg, #ffc107, #ff9800);
  color: #000;
  padding: 6px 12px;
  border-radius: 20px;
  font-size: 13px;
}

/* 🔥 Table */
.table {
  color: white;
  border-radius: 10px;
  overflow: hidden;
}

.table thead {
  background: linear-gradient(135deg, #00c6ff, #0072ff);
  color: white;
}

.table tbody tr {
  background: rgba(255,255,255,0.05);
  transition: 0.3s;
}



/* Table cells */
.table td, .table th {
  vertical-align: middle;
  border-color: rgba(255,255,255,0.1);
}

/* Scroll table */
.table-responsive {
  max-height: 450px;
  overflow-y: auto;
  border-radius: 10px;
}

/* 🔥 Buttons */
.btn-danger {
  background: linear-gradient(135deg, #ff4d4d, #cc0000);
  border: none;
  border-radius: 20px;
  transition: 0.3s;
}

.btn-danger:hover {
  transform: scale(1.05);
  box-shadow: 0 0 10px rgba(255,0,0,0.7);
}

.btn-secondary {
  border-radius: 20px;
}

/* Footer */
.footer {
  margin-top: 50px;
  padding: 20px;
  background: rgba(0,0,0,0.6);
  backdrop-filter: blur(10px);
  color: white;
  text-align: center;
}

/* Mobile */
@media (max-width: 768px) {
  .container {
    margin: 20px;
    padding: 20px;
  }
}
    .navbar-brand img {
  width: 40px;
  margin-right: 10px;
}

.hide-id{
  display: none;
}

/* ========================= */
/* 📱 TABLET VIEW (577–991px) */
/* ========================= */
@media (min-width: 577px) and (max-width: 991px) {

  .container {
    max-width: 90%;
    padding: 25px;
  }

  h2 {
    font-size: 22px;
  }

  .table-responsive {
    max-height: 400px;
  }
}

/* ========================= */
/* 💻 LAPTOP VIEW (992px+) */
/* ========================= */
@media (min-width: 992px) {

  .container {
    max-width: 1100px; /* 👈 wide premium */
  }

  h2 {
    font-size: 26px;
  }

  .table td {
    font-size: 14px;
  }
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
/* 🔥 UNIVERSAL RESPONSIVE FIX */
/* ========================= */

.container {
  width: 100%;
  max-width: 1000px;
}

/* Table fix */
.table-responsive {
  overflow-x: auto;
}

/* ========================= */
/* 📱 MOBILE (0–576px) */
/* ========================= */
@media (max-width: 576px) {

  .container {
    margin: 10px;
    padding: 12px;
  }

  h2 {
    font-size: 18px;
    text-align: center;
  }

  .badge-count {
    display: block;
    margin-top: 8px;
  }

  /* ✅ Table scroll instead of break */
  .table {
    min-width: 700px;   /* 🔥 important */
    font-size: 12px;
  }

  .table td, .table th {
    white-space: nowrap;
  }

  /* Button fix */
  .btn-danger {
    font-size: 12px;
    padding: 5px 10px;
  }

  .navbar-nav .nav-link {
    margin: 5px 0;
  }
}

/* ========================= */
/* 📱 TABLET */
/* ========================= */
@media (min-width: 577px) and (max-width: 991px) {

  .container {
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

  .container {
    max-width: 1100px;
  }

  .table {
    font-size: 14px;
  }
}
  </style>
</head>
<body>

<!-- ✅ Navbar with Complain Box -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid px-4">
    <a class="navbar-brand d-flex align-items-center" href="home.php">
      <img src="image/logo.png" alt="Logo"> <span><b>SuperMarket</b></span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link btn btn-warning text-white px-3 ms-2" href="home.php">🏠 Home</a>
        <a class="nav-link btn btn-warning text-white px-3 ms-2" href="cart.php">🛒 Cart</a>
        <a class="nav-link btn btn-warning text-white px-3 ms-2" href="contact.php">📞 Contact</a>
        <a class="nav-link btn btn-warning text-white px-3 ms-2" href="complain.php">📮 Complain List</a>
      </div>
    </div>
  </div>
</nav>


<!-- Complaints Table -->
<div class="container">
<a href="home.php" class="btn btn-secondary">⬅️ Back</a>
  <h2 class="mb-4" align="center">
    <i class="fa-solid fa-comments text-warning me-2"></i>Customer Complaints
    <?php
   $stmtCount = $conn->prepare("SELECT COUNT(*) as total FROM complaints WHERE user_id = ?");
   $stmtCount->bind_param("i", $user_id);
   $stmtCount->execute();
   $countResult = $stmtCount->get_result()->fetch_assoc();
   echo "<span class='badge-count'>Total: {$countResult['total']}</span>";
   $stmtCount->close();
    ?>
  </h2>

  <div class="table-responsive">
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>No.</th>
          <th class="hide-id"><i class="fa-solid fa-hashtag"></i> ID</th>
          <th><i class="fa-solid fa-user"></i> Name</th>
          <th><i class="fa-solid fa-envelope"></i> Email</th>
          <th><i class="fa-solid fa-heading"></i> Subject</th>
          <th><i class="fa-solid fa-message"></i> Message</th>
          <th><i class="fa-solid fa-clock"></i> Date</th>
          <th><i class="fa-solid fa-gear"></i> Action</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; ?>
     <?php
       $stmt = $conn->prepare("SELECT * FROM complaints WHERE user_id = ? AND deleted_by_user = 0 ORDER BY created_at DESC");
       $stmt->bind_param("i", $user_id);
       $stmt->execute();
       $result = $stmt->get_result();
        if ($result && $result->num_rows > 0):
          while ($row = $result->fetch_assoc()):
      ?>
        <tr>
          <td><span class="index-box"><?php echo $i++; ?></span></td>
           <td class="hide-id"><?php echo $row['id']; ?></td>
           <td><?php echo htmlspecialchars($row['name']); ?></td>
           <td><?php echo htmlspecialchars($row['email']); ?></td>
           <td><?php echo htmlspecialchars($row['subject']); ?></td>
           <td><?php echo nl2br(htmlspecialchars($row['message'])); ?></td>
           <td><?php echo $row['created_at']; ?></td>
        <td>
        <a href="delete_complaint.php?id=<?php echo $row['id']; ?>" 
        class="btn btn-danger btn-sm text-nowrap"
        onclick="return confirm('Are you sure you want to delete this complaint?');">
      <i class="fa-solid fa-trash"></i> Delete
    </a>
  </td>
</tr>
        <?php 
        endwhile;
          $stmt->close();
        else:
         ?>
        <tr>
          <td colspan="8" class="text-center text-muted">No complaints found.</td>
        </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>

<div class="footer">
  &copy; <?php echo date('Y'); ?> Online Supermarket | All Rights Reserved by <span style="color: yellow; font-size: 15px;">Deepak kumar singh And Manoj</span>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
