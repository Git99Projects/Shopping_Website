<?php
session_start();
include 'db.php';

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$stmt = $conn->prepare("SELECT first_name, last_name, email, created_at FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($first_name, $last_name, $email, $created_at);
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>User Profile</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
  background: linear-gradient(135deg,#0f2027,#203a43,#2c5364);
  font-family: 'Segoe UI', sans-serif;
  color: white;
}

/* Glass Card */
.profile-box {
  max-width: 500px;
  margin: 60px auto;
  padding: 30px;
  border-radius: 20px;

  background: rgba(255,255,255,0.08);
  backdrop-filter: blur(15px);

  border: 1px solid rgba(255,255,255,0.2);
  box-shadow: 0 15px 40px rgba(0,0,0,0.4);

  text-align: center;
}

/* Heading */
h2 {
  font-weight: 700;
}

/* Info text */
.profile-box p {
  font-size: 15px;
  margin: 10px 0;
}

/* Button */
.logout-btn {
  display: inline-block;
  margin-top: 15px;
  padding: 8px 20px;
  border-radius: 20px;

  background: linear-gradient(135deg,#ff4d4d,#cc0000);
  color: white;
  text-decoration: none;

  transition: 0.3s;
}

.logout-btn:hover {
  transform: scale(1.08);
  box-shadow: 0 0 12px rgba(255,0,0,0.7);
}

/* ========================= */
/* 📱 MOBILE FIX */
/* ========================= */
@media (max-width: 576px) {

  .profile-box {
    margin: 20px;
    padding: 20px;
  }

  h2 {
    font-size: 20px;
  }

  .profile-box p {
    font-size: 13px;
  }

  .logout-btn {
    width: 100%;
  }

}

/* ========================= */
/* 💻 LAPTOP */
/* ========================= */
@media (min-width: 992px) {
  .profile-box {
    max-width: 550px;
  }
}
form input {
  border-radius: 10px;
  border: none;
}

form input:focus {
  outline: none;
  box-shadow: 0 0 8px rgba(0,198,255,0.6);
}

.btn-success {
  border-radius: 20px;
}
</style>
</head>

<body>

<div class="profile-box">
<?php if(isset($_GET['msg'])): ?>
  <?php if($_GET['msg'] == 'success'): ?>
    <div class="alert alert-success">✅ Password changed successfully</div>
  <?php elseif($_GET['msg'] == 'error'): ?>
    <div class="alert alert-danger">❌ Something went wrong</div>
  <?php endif; ?>
<?php endif; ?>
<h2>Welcome <?php echo $first_name; ?> 👋</h2>

<p><strong>Full Name:</strong> <?php echo $first_name . " " . $last_name; ?></p>
<p><strong>Email:</strong> <?php echo $email; ?></p>
<p><strong>Joined On:</strong> <?php echo $created_at; ?></p>

<a href="logout.php" class="logout-btn">Logout</a>
<h4 class="mt-4">🔒 Change Password</h4>

<form method="POST" action="change_password.php">

  <div class="mb-2">
    <input type="password" name="current_password" 
           class="form-control" placeholder="Current Password" required>
  </div>

  <div class="mb-2">
    <input type="password" name="new_password" 
           class="form-control" placeholder="New Password" required>
  </div>

  <div class="mb-2">
    <input type="password" name="confirm_password" 
           class="form-control" placeholder="Confirm Password" required>
  </div>

  <button type="submit" class="btn btn-success w-100">
    Update Password
  </button>

</form>
</div>

</body>
</html>
