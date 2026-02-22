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
      background-color: #2c2c2c; /* light black */
      color: white;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 0;
    }
    .form-box {
      background-color: #1e1e1e; /* darker container */
      padding: 30px;
      border-radius: 12px;
      width: 900%;
      max-width: 900px;
    }
    .nav-pills .nav-link.active {
      background-color: #0d6efd !important; /* keep active tab blue */
    }
    .alert-box {
  background-color: #3a1a1a;
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
    <li class="nav-item" role="presentation">
      <a class="nav-link active" id="tab-login" data-mdb-toggle="pill" href="login.php" role="tab"
        aria-controls="pills-login" aria-selected="true">Login</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link" id="tab-register" data-mdb-toggle="pill" href="ragister.php" role="tab"
        aria-controls="pills-register" aria-selected="false">Register</a>
    </li>
  </ul>
  <!-- Pills navs -->

  <!-- Pills content -->
  <div class="tab-content">
    <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
    <?php if (!empty($alert)) : ?>
            <div class="alert-box"><?php echo $alert; ?></div>
          <?php endif; ?>
      <form action="login.php" method="POST">
        <div class="text-center mb-3">
          <p>Login :</p>
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
              <label class="form-check-label" for="loginCheck">Remember me</label>
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

</body>
</html>
