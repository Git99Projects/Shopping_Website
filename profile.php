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

<h2>Welcome <?php echo $first_name; ?> 👋</h2>
<p><strong>Full Name:</strong> <?php echo $first_name . " " . $last_name; ?></p>
<p><strong>Email:</strong> <?php echo $email; ?></p>
<p><strong>Joined On:</strong> <?php echo $created_at; ?></p>

<a href="logout.php">Logout</a>