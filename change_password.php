<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $current = $_POST['current_password'];
    $new = $_POST['new_password'];
    $confirm = $_POST['confirm_password'];

    // Get current password from DB
    $stmt = $conn->prepare("SELECT password FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->bind_result($db_password);
    $stmt->fetch();
    $stmt->close();

    // Check current password
if (!password_verify($current, $db_password)) {
    $message = "❌ Current password incorrect!";
} elseif ($new !== $confirm) {
    $message = "❌ New passwords do not match!";
} else {

    $hashed = password_hash($new, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("UPDATE users SET password=? WHERE id=?");
    $stmt->bind_param("si", $hashed, $user_id);

    if ($stmt->execute()) {
        header("Location: profile.php?msg=success");
        exit();
    } else {
        header("Location: profile.php?msg=error");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Change Password</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark text-white">

<div class="container mt-5">
<div class="card p-4 bg-secondary">

<h3>🔐 Change Password</h3>

<?php if($message): ?>
<div class="alert alert-info mt-3"><?php echo $message; ?></div>
<?php endif; ?>

<form method="POST">

<div class="mb-3">
<label>Current Password</label>
<input type="password" name="current_password" class="form-control" required>
</div>

<div class="mb-3">
<label>New Password</label>
<input type="password" name="new_password" class="form-control" required>
</div>

<div class="mb-3">
<label>Confirm Password</label>
<input type="password" name="confirm_password" class="form-control" required>
</div>

<button class="btn btn-success">Update Password</button>

</form>

</div>
</div>

</body>
</html>