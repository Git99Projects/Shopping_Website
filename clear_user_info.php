<?php
session_start();

if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit();
}

$user_id = (int)$_SESSION['user_id'];

/* Clear ONLY this user's saved address */
unset($_SESSION['user_info'][$user_id]);

header("Location: checkout.php");
exit();