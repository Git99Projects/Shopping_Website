<?php
session_start();
unset($_SESSION['user_info']);
header("Location: checkout.php");
exit();
