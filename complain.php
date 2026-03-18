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
      background: linear-gradient(to right,rgb(57, 107, 184),rgb(4, 53, 10));
      font-family: 'Segoe UI', sans-serif;
    }
    .navbar {
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .container {
      margin-top: 40px;
      background:rgb(69, 106, 207);
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }
    h2 {
      color: #004085;
      font-weight: 700;
    }
    .badge-count {
      font-size: 14px;
      background-color: #ffc107;
      color: #000;
      padding: 5px 10px;
      border-radius: 20px;
    }
    .table thead {
      background-color: #007bff;
      color: white;
    }
    .table td, .table th {
      vertical-align: middle;
      word-break: break-word;
    }
    .table-responsive {
      max-height: 500px;
      overflow-y: auto;
    }
    .footer {
      margin-top: 60px;
      padding: 20px;
      background:rgb(16, 112, 35);
      color: white;
      text-align: center;
      font-size: 14px;
      border-radius: 0 0 12px 12px;
    }
    @media (max-width: 768px) {
      .container {
        margin-top: 10px;
        padding: 20px;
      }
    }
    .navbar-brand img {
  width: 40px;
  margin-right: 10px;
}

.btn-danger {
  white-space: nowrap;
  min-width: 90px;
}
.hide-id{
  display: none;
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
     <?php
       $stmt = $conn->prepare("SELECT * FROM complaints WHERE user_id = ? AND deleted_by_user = 0 ORDER BY created_at DESC");
       $stmt->bind_param("i", $user_id);
       $stmt->execute();
       $result = $stmt->get_result();
        if ($result && $result->num_rows > 0):
          while ($row = $result->fetch_assoc()):
      ?>
        <tr>
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
          <td colspan="6" class="text-center text-muted">No complaints found.</td>
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
