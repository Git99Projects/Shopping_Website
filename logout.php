<?php
session_start();

/* Only remove login data */
unset($_SESSION['user_id']);
unset($_SESSION['role']);

header("Location: login.php");
exit();