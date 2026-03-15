<?php
session_start();
include 'db.php';

$alert = ""; // For displaying error message above form

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST["email"];
  $password = $_POST["password"];
  $stmt = $conn->prepare("SELECT id, first_name, role, password FROM users WHERE email = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt->store_result();

  if ($stmt->num_rows > 0) {
    $stmt->bind_result($id, $first_name, $role, $hashed_password);
    $stmt->fetch();

    if (password_verify($password, $hashed_password)) {
     $_SESSION['user_id'] = $id;
     $_SESSION['user_email'] = $email;
     $_SESSION['first_name'] = $first_name;
     $_SESSION['role'] = $role;

if($role == 'admin'){
    header("Location: admin_dashboard.php");
} else {
    header("Location: home.php");
}
exit();
    } else {
      $alert = "❌ Invalid password.";
    }
  } else {
    $alert = "❌ Email not found.";
  }

  $stmt->close();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login Form</title>

  <!-- MDB 5 CDN -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.min.js"></script>

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />

  <!-- Full screen light black background -->
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
/* Background video */
.video-bg{
  position:fixed;
  right:0;
  bottom:0;
  min-width:100%;
  min-height:100%;
  object-fit:cover;
  z-index:-1;
}

/* Glass Login Box */
.form-box{
position:relative;
padding:40px;
width:100%;
max-width:420px;
border-radius:20px;

/* premium glass background */
background:rgba(155, 82, 82, 0.08);
backdrop-filter:blur(20px);
-webkit-backdrop-filter:blur(20px);

/* glass border */
border:1px solid rgba(255,255,255,0.25);

/* premium shadow */
box-shadow:
0 10px 40px rgba(0,0,0,0.6),
0 0 20px rgba(0,170,255,0.3);

/* smooth animation */
transition:0.4s;
overflow:hidden;
}


.form-box:hover{
box-shadow:
0 15px 50px rgba(0,0,0,0.7),
0 0 30px rgba(0,170,255,0.6);
transform:translateY(-5px);
}
/* Active tab */
.nav-pills .nav-link.active {
  background-color: #0d6efd !important;
}

/* Alert box */
.alert-box {
  background-color: rgba(247, 246, 246, 0.15);
  border: 1px solid #ff4d4d;
  color: #ff4d4d;
  padding: 10px;
  border-radius: 8px;
  margin-bottom: 20px;
  text-align: center;
}

.login-title{
font-size:28px;
font-weight:600;
color:#00aaff;   /* premium blue */
letter-spacing:1px;

text-shadow:
0 0 5px #00aaff,
0 0 10px #00aaff,
0 0 20px rgba(0,170,255,0.6);

transition:0.3s;
}

.login-title:hover{
color:#00d9ff;
text-shadow:
0 0 10px #00d9ff,
0 0 20px #00d9ff,
0 0 30px rgba(0,217,255,0.9);
}


.form-label{
color:#00aaff;              /* premium blue color */
font-weight:530;
letter-spacing:0.5px;
transition:0.3s;
}

/* hover par sirf glow ho, zoom na ho */
.form-label:hover{
color:#00c3ff;
text-shadow:
0 0 5px #00aaff,
0 0 10px #00aaff;
}
.form-control{
background:rgba(255,255,255,0.08) !important;
border:1px solid rgba(255,255,255,0.2);
color:white !important;
border-radius:10px;
transition:0.3s ease;
}

/* Cursor input box par aane par */
.form-control:hover{
transform:scale(1.05);
border-color:#00aaff;

box-shadow:
0 0 5px #00aaff,
0 0 10px rgba(0,170,255,0.7);

background:rgba(0,170,255,0.08);  /* blue glass background */
}

.form-control::placeholder{
color: rgba(255,255,255,0.6);   /* halka white */
}
/* Click / typing par aur strong glow */
.form-control:focus{
color:white !important;
background:rgba(0,170,255,0.12) !important;
border-color:#00aaff;

box-shadow:
0 0 8px #00aaff,
0 0 15px rgba(0,170,255,0.9);


outline:none;
}

a{
color:#ddd;
text-decoration:none;
transition:0.3s ease;
display:inline-block;
}

a:hover{
color:#00ffff;
text-shadow:
0 0 5px #00ffff,
0 0 10px #00ffff;
}
.form-check-label{
transition:0.3s;
display:inline-block;
}

.form-check-label:hover{
transform:scale(1.05);
color:#00ffff;
}
.btn-light{
background:linear-gradient(45deg,#ff00cc,#3333ff);
border:none;
color:white;
font-weight:bold;
border-radius:10px;
transition:0.3s;
}

.btn-light:hover{
transform:scale(1.05);
box-shadow:
0 0 10px #ff00cc,
0 0 20px #ff00cc,
0 0 40px #ff00cc;
}
.register-link{
color:#ddd;
text-decoration:none;
transition:0.3s;
display:inline-block;
}

.register-link:hover{
transform:scale(1.2);
color:#00ffff;
text-shadow:
0 0 5px #00ffff,
0 0 10px #00ffff;
}

.social-icons{
display:flex;
justify-content:center;
gap:30px;
margin-top:10px;
}

.social-icons a{
width:50px;
height:50px;
display:flex;
align-items:center;
justify-content:center;

border-radius:50%;
background:rgba(255,255,255,0.12);
backdrop-filter:blur(12px);
border:1px solid rgba(255,255,255,0.25);

transition:0.3s;
}

.social-icons a:hover{
transform:scale(1.2);
box-shadow:
0 0 10px #00aaff,
0 0 20px #00aaff;
}

.social-img{
width:38px;
height:38px;
object-fit:contain;
}
  </style>
</head>
<body>

<video autoplay muted loop class="video-bg">
  <source src="image/animation.mp4" type="video/mp4">
</video>
<div class="form-box">
  <!-- Pills navs -->
  <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">

  </ul>

  <!-- Pills content -->
  <div class="tab-content">
    <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
    <?php if (!empty($alert)) : ?>
            <div class="alert-box"><?php echo $alert; ?></div>
          <?php endif; ?>
      <form action="login.php" method="POST">
        <div class="text-center mb-3">
          <p  class="login-title">Login </p>
          <!-- <button type="button" class="btn btn-link btn-floating mx-1"><i class="fab fa-facebook-f"></i></button>
          <button type="button" class="btn btn-link btn-floating mx-1"><i class="fab fa-google"></i></button>
          <button type="button" class="btn btn-link btn-floating mx-1"><i class="fab fa-twitter"></i></button>
          <button type="button" class="btn btn-link btn-floating mx-1"><i class="fab fa-github"></i></button> -->
        </div>

        <!-- <p class="text-center">or:</p> -->

        <div class="mb-4">
        <label class="form-label" for="loginName">Email or username</label>
          <input type="email" name="email" id="loginName" class="form-control" required placeholder="Enter Email"/>
          
        </div>

        <div class="mb-4">
        <label class="form-label" for="loginPassword">Password</label>
          <input type="password" name="password" id="loginPassword" class="form-control" required placeholder="Enter Password"/>
          
        </div>

        <div class="d-flex justify-content-between align-items-center mb-4">

<div class="form-check">
<input class="form-check-input" type="checkbox" id="loginCheck" checked />
<label class="form-check-label" for="loginCheck">
Remember me
</label>
</div>

<a href="#" class="register-link">Forgot password?</a>

</div>

        <button type="submit" class="btn btn-light btn-block mb-4">Sign in</button>
<div class="social-icons">

<a href="#">
<img src="image/google.png" class="social-img" alt="Google">
</a>

<a href="#">
<img src="image/facebook.png" class="social-img" alt="Facebook">
</a>

<a href="#">
<img src="image/twitter.png" class="social-img" alt="Twitter">
</a>

<a href="#">
<img src="image/instagram.png" class="social-img" alt="Instagram">
</a>

</div><br>
        <div class="text-center">
          <p>Not a member? <a href="ragister.php" class="register-link" data-mdb-toggle="pill">Register</a></p>
        </div>
      </form>
    </div>

    <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
      <form>
        <div class="text-center mb-3">
          <p>Sign up with:</p>
          <button type="button" class="btn btn-link btn-floating mx-1"><i class="fab fa-facebook-f"></i></button>
          <button type="button" class="btn btn-link btn-floating mx-1"><i class="fab fa-google"></i></button>
          <button type="button" class="btn btn-link btn-floating mx-1"><i class="fab fa-twitter"></i></button>
          <button type="button" class="btn btn-link btn-floating mx-1"><i class="fab fa-github"></i></button>
        </div>

        <p class="text-center">or:</p>

        <div class="form-outline mb-4">
          <input type="text" id="registerName" class="form-control" required />
          <label class="form-label" for="registerName">Name</label>
        </div>

        <div class="form-outline mb-4">
          <input type="text" id="registerUsername" class="form-control" required />
          <label class="form-label" for="registerUsername">Username</label>
        </div>

        <div class="form-outline mb-4">
          <input type="email" id="registerEmail" class="form-control" required />
          <label class="form-label" for="registerEmail">Email</label>
        </div>

        <div class="form-outline mb-4">
          <input type="password" id="registerPassword" class="form-control" required />
          <label class="form-label" for="registerPassword">Password</label>
        </div>

        <div class="form-outline mb-4">
          <input type="password" id="registerRepeatPassword" class="form-control" required />
          <label class="form-label" for="registerRepeatPassword">Repeat password</label>
        </div>

        <div class="form-check d-flex justify-content-center mb-4">
          <input class="form-check-input me-2" type="checkbox" id="registerCheck" required />
          <label class="form-check-label" for="registerCheck">
            I have read and agree to the terms
          </label>
        </div>

        <button type="submit" class="btn btn-light btn-block mb-3">Sign up</button>
      </form>
    </div>
  </div>
</div>

</body>
</html>  