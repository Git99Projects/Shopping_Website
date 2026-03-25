<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 🔥 trim for safety
    $current_password = trim($_POST['current_password']);
    $new_password     = trim($_POST['new_password']);
    $confirm_password = trim($_POST['confirm_password']);

    // ✅ 1. New password match check
    if ($new_password !== $confirm_password || strlen($new_password) < 6) {
    header("Location: profile.php?msg=notmatch");
    exit();
}

    // ✅ 2. Get old password
    $stmt = $conn->prepare("SELECT password FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->bind_result($db_password);
    $stmt->fetch();
    $stmt->close();

    // ✅ 3. Verify current password
    if (!password_verify($current_password, $db_password)) {
        header("Location: profile.php?msg=wrong");
        exit();
    }

    // ✅ 4. Hash new password
    $new_hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    // ✅ 5. Update password
    $update = $conn->prepare("UPDATE users SET password = ? WHERE id = ?");
    $update->bind_param("si", $new_hashed_password, $user_id);

    if ($update->execute()) {
        header("Location: profile.php?msg=success");
    } else {
        header("Location: profile.php?msg=error");
    }

    $update->close();
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