<?php
session_start();
include 'db.php';

$alert = ""; // For displaying error message above form

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST["email"];
  $password = $_POST["password"];

  $stmt = $conn->prepare("SELECT password FROM users WHERE email = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt->store_result();

  if ($stmt->num_rows > 0) {
    $stmt->bind_result($hashed_password);
    $stmt->fetch();

    if (password_verify($password, $hashed_password)) {
      $_SESSION['user_email'] = $email;
      header("Location: home.php");
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
  background: url('image/log.jpg') no-repeat center center fixed;
  background-size: cover;
  color: white;
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  margin: 0;
  font-family: Arial, sans-serif;
}

/* Glass Login Box */
.form-box {
  background: rgba(49, 48, 48, 0.45);   /* transparent dark */
  backdrop-filter: blur(5px);      /* blur effect */
  -webkit-backdrop-filter: blur(10px);
  padding: 40px;
  border-radius: 16px;
  width: 100%;
  max-width: 420px;                 /* normal login size */
  box-shadow: 0 0 30px rgba(115, 109, 109, 0.6);
  border: 1px solid rgba(255, 255, 255, 0.1);

  /* 👇 ADD GLOW HERE */
  box-shadow:
    -10px 0 20px rgba(255, 0, 150, 0.6),
     10px 0 20px rgba(0, 255, 255, 0.6);
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



  </style>
</head>
<body>

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
          <p style="font-size: 28px;">Login </p>
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

        <div class="row mb-4">
          <div class="col-md-6 d-flex justify-content-center">
            <div class="form-check mb-3 mb-md-0">
              <input class="form-check-input" type="checkbox" id="loginCheck" checked />
              <label class="form-check-label" for="loginCheck">Remember me </label>
            </div>
          </div>
          <div class="col-md-6 d-flex justify-content-center">
            <a href="#">Forgot password?</a>
          </div>
        </div>

        <button type="submit" class="btn btn-light btn-block mb-4">Sign in</button>

        <div class="text-center">
          <p>Not a member? <a href="ragister.php" data-mdb-toggle="pill">Register</a></p>
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


<!-- FISH START -->
<div id="fish" style="
width:660px;
position:fixed;
top:0;
left:0;
pointer-events:none;
z-index:9999;"></div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.12.2/lottie.min.js"></script>

<script>
var animation = lottie.loadAnimation({
 container: document.getElementById("fish"),
 renderer:"svg",
 loop:true,
 autoplay:true,
 path:"fish.json"
});

let fish = document.getElementById("fish");

let x = window.innerWidth/2;
let y = window.innerHeight/2;

document.addEventListener("mousemove", e=>{

 let dx = e.clientX - x;
 let dy = e.clientY - y;

 x += dx * 0.08;
 y += dy * 0.08;

 fish.style.transform = dx < 0 ? "scaleX(-1)" : "scaleX(1)";

 fish.style.left = x + "px";
 fish.style.top = y + "px";
});
</script>
<!-- FISH END -->


</body>
</html>
