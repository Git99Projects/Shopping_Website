<?php
session_start();
include 'db.php';

$step = 1;

// STEP 1 → SEND OTP
if (isset($_POST['send_otp'])) {

  $user_input = trim($_POST['user_input']);

  // 🔍 Check email ya mobile
  if (filter_var($user_input, FILTER_VALIDATE_EMAIL)) {

    // 📧 EMAIL CASE
    $res = $conn->query("SELECT * FROM users WHERE email='$user_input'");

    if ($res->num_rows > 0) {
      $row = $res->fetch_assoc();

      $_SESSION['reset_type'] = 'email';
      $_SESSION['reset_value'] = $user_input;
      $_SESSION['admin_email'] = $row['email'];

    } else {
      $error = "❌ Email not found";
    }

  } else {

    // 📱 MOBILE CASE (ADMIN ONLY)
    $res = $conn->query("SELECT * FROM users WHERE mobile='$user_input' AND role='admin'");

    if ($res->num_rows > 0) {
      $row = $res->fetch_assoc();

      $_SESSION['reset_type'] = 'mobile';
      $_SESSION['reset_value'] = $user_input;
      $_SESSION['admin_email'] = $row['email'];

    } else {
      $error = "❌ Invalid mobile (Admin only)";
    }
  }

  // 👉 Agar user mil gaya to OTP generate karo
  if (!isset($error)) {

    $otp = rand(100000, 999999);
    $expiry = date("Y-m-d H:i:s", strtotime("+5 minutes"));

    $value = $_SESSION['reset_value'];

    $conn->query("
      INSERT INTO password_resets (mobile, otp, expires_at)
      VALUES ('$value', '$otp', '$expiry')
    ");

    $_SESSION['show_otp'] = $otp;
    $_SESSION['otp_time'] = time();

    $step = 2;
  }
}

// STEP 2 → VERIFY OTP
if (isset($_POST['verify_otp'])) {

  $value = $_SESSION['reset_value'];
  $otp = $_POST['otp'];

  $res = $conn->query("
    SELECT * FROM password_resets 
    WHERE mobile='$value' 
    ORDER BY id DESC LIMIT 1
  ");

  $row = $res->fetch_assoc();

  if ($row && $row['otp'] == $otp && strtotime($row['expires_at']) > time()) {
   // 🔥 OTP delete (yahi add karna hai)
    $conn->query("DELETE FROM password_resets WHERE mobile='$value'");

    $step = 3;

} else {
  // ❌ wrong OTP → new OTP generate
    $value = $_SESSION['reset_value'];

    // 🔥 old OTP delete
    $conn->query("DELETE FROM password_resets WHERE mobile='$value'");

    // 🔥 new OTP generate
    $newOtp = rand(100000, 999999);
    $expiry = date("Y-m-d H:i:s", strtotime("+2 minutes"));

    $conn->query("
      INSERT INTO password_resets (mobile, otp, expires_at)
      VALUES ('$value', '$newOtp', '$expiry')
    ");

    // 🔥 session update
    $_SESSION['show_otp'] = $newOtp;
    $_SESSION['otp_time'] = time();

    $error = "❌ Invalid OTP!";
    $step = 2;
}
}

// STEP 3 → RESET PASSWORD
if (isset($_POST['reset_pass'])) {

  $value = $_SESSION['reset_value'];
  $pass = $_POST['password'];
  $confirm = $_POST['confirm_password'];

  if ($pass !== $confirm) {
    $error = "❌ Passwords do not match!";
    $step = 3;
  } else {

    $hashed = password_hash($pass, PASSWORD_DEFAULT);

    if ($_SESSION['reset_type'] == 'email') {

    $conn->query("UPDATE users SET password='$hashed' WHERE email='$value'");

} else {

    $conn->query("UPDATE users SET password='$hashed' WHERE mobile='$value' AND role='admin'");
}

    $conn->query("DELETE FROM password_resets WHERE mobile='$value'");

    unset($_SESSION['reset_value']);
    unset($_SESSION['reset_type']);
    unset($_SESSION['show_otp']);
    unset($_SESSION['admin_email']);
    

    $success = "✅ Password updated successfully!";
    $step = 1;
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Forgot Password</title>

  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.min.css" rel="stylesheet"/>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.min.js"></script>

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet"/>

<style>

body {
 margin:0;
 font-family: Arial, sans-serif;
 min-height:100vh;
 display:flex;
 justify-content:center;
 align-items:center;
 color:white;
 overflow:hidden;
}

/* video background */
.video-bg{
 position:fixed;
 right:0;
 bottom:0;
 min-width:100%;
 min-height:100%;
 object-fit:cover;
 z-index:-1;
}

/* glass box */
.form-box{
 position:relative;
 padding:40px;
 width:100%;
 max-width:420px;
 border-radius:20px;

 background:rgba(155,82,82,0.08);
 backdrop-filter:blur(20px);

 border:1px solid rgba(255,255,255,0.25);

 box-shadow:
 0 10px 40px rgba(0,0,0,0.6),
 0 0 20px rgba(0,170,255,0.3);

 transition:0.4s;
}

/* hover */
.form-box:hover{
 transform:translateY(-5px);
}

/* title */
.title{
 font-size:28px;
 font-weight:600;
 color:#00aaff;
 text-align:center;
 margin-bottom:20px;
}

/* input */
.form-control{
 background:rgba(255,255,255,0.08)!important;
 border:1px solid rgba(255,255,255,0.2);
 color:white!important;
 border-radius:10px;
}

/* focus */
.form-control:focus{
 background:rgba(0,170,255,0.12)!important;
 border-color:#00aaff;
 box-shadow:0 0 10px #00aaff;
}

/* button */
.btn-custom{
 background:linear-gradient(45deg,#ff00cc,#3333ff);
 border:none;
 color:white;
 font-weight:bold;
 border-radius:10px;
}

.btn-custom:hover{
 box-shadow:0 0 20px #ff00cc;
}

/* link */
.back-link{
 display:block;
 text-align:center;
 margin-top:15px;
 color:#ccc;
}

.back-link:hover{
 color:#00ffff;
}
/* LABEL SAME AS LOGIN */
.form-label{
  color:#00aaff;
  font-weight:530;
  letter-spacing:0.5px;
  transition:0.3s;
}

/* LABEL HOVER GLOW */
.form-label:hover{
  color:#00c3ff;
  text-shadow:
  0 0 5px #00aaff,
  0 0 10px #00aaff;
}

/* INPUT FIELD SAME */
.form-control{
  background:rgba(255,255,255,0.08) !important;
  border:1px solid rgba(255,255,255,0.2);
  color:white !important;
  border-radius:10px;
  transition:0.3s ease;
}

/* INPUT HOVER EFFECT */
.form-control:hover{
  transform:scale(1.05);
  border-color:#00aaff;

  box-shadow:
  0 0 5px #00aaff,
  0 0 10px rgba(0,170,255,0.7);

  background:rgba(0,170,255,0.08);
}

/* INPUT FOCUS EFFECT */
.form-control:focus{
  color:white !important;
  background:rgba(0,170,255,0.12) !important;
  border-color:#00aaff;

  box-shadow:
  0 0 8px #00aaff,
  0 0 15px rgba(0,170,255,0.9);

  outline:none;
}

/* PLACEHOLDER SAME STYLE */
.form-control::placeholder{
  color: rgba(255,255,255,0.6);
}
.form-label span {
  color:#00ffff;
  font-weight:bold;
  margin-left:5px;
}
</style>
</head>

<body>

<!-- video -->
<video autoplay muted loop class="video-bg">
  <source src="image/animation.mp4" type="video/mp4">
</video>

<div class="form-box">

  <div class="title">Admin Forgot Password</div>

  <?php if (!empty($error)) echo "<p style='color:red; text-align:center;'>$error</p>"; ?>
  <?php if (!empty($success)) echo "<p style='color:lightgreen; text-align:center;'>$success</p>"; ?>

  <form method="POST">

    <!-- STEP 1 -->
    <?php if ($step == 1): ?>
      <div class="mb-4">
        <label class="form-label">Mobile Number or Email</label>
        <input type="text" name="user_input" class="form-control" placeholder="Enter Mobile or Email" required>
      </div>

      <button type="submit" name="send_otp" class="btn btn-custom w-100">SEND OTP</button>
    <?php endif; ?>

    <!-- STEP 2 -->
    <?php if ($step == 2): ?>
      <div class="mb-4">
       <div style="margin-bottom:10px;">

  <!-- 🔥 OTP LINE WITH TIMER -->
   <div class="form-label" style="margin-bottom:5px;">
  Reset for <span><?php echo $_SESSION['admin_email']; ?></span>
</div>
  <div style="display:flex; justify-content:space-between; align-items:center;">
    <label class="form-label" style="margin:0;">
      Enter OTP : 
      <span><?php echo $_SESSION['show_otp']; ?></span>
    </label>

    <div style="font-size:14px; color:#00ffff;">
      ⏳ <span id="timer">02:00</span>
    </div>

  </div>

</div>

        <input type="text" name="otp" class="form-control" placeholder="Enter OTP" required>
      </div>

      <button type="submit" name="verify_otp" class="btn btn-custom w-100">VERIFY OTP</button>
    <?php endif; ?>

    <!-- STEP 3 -->
<?php if ($step == 3): ?>

<label class="form-label">
  Set Password <span><?php echo $_SESSION['admin_email']; ?></span><br>
  Set New Password
</label>

<!-- 🔐 New Password -->
<div class="mb-3" style="position:relative;">
  <input type="password" id="pass1" name="password" class="form-control" placeholder="New Password" required>

  <span onclick="togglePassword('pass1', this)" 
        style="position:absolute; right:12px; top:50%; transform:translateY(-50%); cursor:pointer;">
    👁️
  </span>
</div>

<!-- 🔐 Confirm Password -->
<div class="mb-3" style="position:relative;">
  <input type="password" id="pass2" name="confirm_password" class="form-control" placeholder="Confirm Password" required>

  <span onclick="togglePassword('pass2', this)" 
        style="position:absolute; right:12px; top:50%; transform:translateY(-50%); cursor:pointer;">
    👁️
  </span>
</div>

<button type="submit" name="reset_pass" class="btn btn-custom w-100">
  UPDATE PASSWORD
</button>

<?php endif; ?>

  </form>

  <a href="login.php" class="back-link">⬅ Back to Login</a>

</div>
<script>
let timeLeft = 120;

const timer = document.getElementById("timer");

if (timer) {
  const countdown = setInterval(() => {

    let minutes = Math.floor(timeLeft / 60);
    let seconds = timeLeft % 60;

    seconds = seconds < 10 ? "0" + seconds : seconds;

    timer.textContent = minutes + ":" + seconds;

    timeLeft--;

    if (timeLeft < 0) {
      clearInterval(countdown);
      timer.textContent = "Expired";
       // 🔥 PAGE REFRESH
      location.reload();
    }

  }, 1000);
}
</script>
<script>
function togglePassword(id, el) {
  const input = document.getElementById(id);

  if (input.type === "password") {
    input.type = "text";
    el.textContent = "🙈";
  } else {
    input.type = "password";
    el.textContent = "👁️";
  }
}
</script>
</body>
</html>
