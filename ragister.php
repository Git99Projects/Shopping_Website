<?php
include 'db.php';

$alert = ""; // To store error or success message

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $first = $_POST["first_name"];
  $last = $_POST["last_name"];
  $email = $_POST["email"];
  $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

  // Check if email already exists
  $check = $conn->prepare("SELECT id FROM users WHERE email = ?");
  $check->bind_param("s", $email);
  $check->execute();
  $check->store_result();

  if ($check->num_rows > 0) {
    $alert = "<div class='alert-box'>❌ Email already exists. Please use a different email.</div>";
  } else {
    $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $first, $last, $email, $password);
  
    if ($stmt->execute()) {
      $alert = "<div class='success-box'>✅ Registration successful. <a href='login.html'>Login</a></div>";
      header("refresh:3;url=login.php");
    } else {
      $alert = "<div class='alert-box'>❌ Error: " . $stmt->error . "</div>";
    }
  
    $stmt->close();
  }
  
  $check->close();
}
?>

  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Sign Up Form</title>

    <!-- MDB CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.min.css" rel="stylesheet" />
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />

    <style>
    body {
  background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
  font-family: 'Segoe UI', sans-serif;
  min-height: 100vh;
  
  margin: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  overflow-x: hidden; /* 🔥 horizontal scroll fix */
}
section {
  width: 100%;
  max-width: 800px; /* laptop perfect */
  padding: 10px;
}

/* 🔥 Glass Card (same as first code) */
.card {
  width: 100%;
  max-width: 850px;
  margin: auto;
  padding: 15px;
  border-radius: 20px;

  background: rgba(255, 255, 255, 0.08);
  backdrop-filter: blur(15px);
  -webkit-backdrop-filter: blur(15px);

  border: 1px solid rgba(255, 255, 255, 0.2);

  box-shadow: 0 15px 40px rgba(0,0,0,0.4);

  color: white;
  transition: all 0.3s ease;
}

/* Hover effect like first code */
.card:hover {
  transform: translateY(-6px) scale(1.01);
  box-shadow: 0 20px 50px rgba(0,0,0,0.6);
}

/* Labels */
.form-label {
  color: #ddd;
  font-weight: 500;
}

/* 🔥 Inputs (same premium hover effect) */
.form-control {
  background: rgba(255,255,255,0.1);
  border: none;
  color: white;
  border-radius: 10px;
  padding: 12px;
  transition: all 0.3s ease;
}

/* Placeholder */
.form-control::placeholder {
  color: #ccc;
}

/* Hover effect (🔥 main premium part) */
.form-control:hover {
  border: 1px solid transparent;
  background: linear-gradient(#111, #2e2d2d) padding-box,
              linear-gradient(135deg, #00e5ff, #0072ff) border-box;
  box-shadow: 0 0 15px rgba(0,229,255,0.6);
  transform: scale(1.02);
}

/* Focus effect */
.form-control:focus {
  border: 1px solid #00c6ff;
  box-shadow: 0 0 18px rgba(0,198,255,0.8);
  background: rgba(255,255,255,0.18);
  color: white;
}

/* Button (same style) */
.btn-light {
  background: linear-gradient(135deg, #00c6ff, #0072ff);
  border: none;
  padding: 12px;
  font-weight: bold;
  border-radius: 30px;
  transition: 0.3s;
  color: white;
}

.btn-light:hover {
  background: linear-gradient(135deg, #0072ff, #eaeff0ff);
  transform: scale(1.05);
  box-shadow: 0 5px 20px rgba(0,114,255,0.6);
}

/* Alerts upgrade */
.alert-box {
  background: rgba(255, 0, 0, 0.1);
  border-left: 4px solid red;
  color: #ff6b6b;
  padding: 10px;
  border-radius: 10px;
}

.success-box {
  background: rgba(0, 255, 0, 0.1);
  border-left: 4px solid lime;
  color: #00ff9d;
  padding: 10px;
  border-radius: 10px;
}

/* Nav Pills */
.nav-pills .nav-link {
  border-radius: 20px;
  color: #ccc;
}

.nav-pills .nav-link.active {
  background: linear-gradient(135deg, #00c6ff, #0072ff);
}

/* Mobile responsive (same feel) */
@media (max-width: 768px) {
  .card {
    margin: 0px auto;
    padding: 20px;
  }
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
.login-link{
color:#ddd;
text-decoration:none;
transition:0.3s;
display:inline-block;
}

.login-link:hover{
transform:scale(1.2);
color:#00ffff;
text-shadow:
0 0 5px #00ffff,
0 0 10px #00ffff;
}
.video-bg{
  position:fixed;
  right:0;
  bottom:0;
  min-width:100%;
  min-height:100%;
  object-fit:cover;
  z-index:-1;
}
@media (max-width: 576px) {

  section {
    max-width: 100%;
    padding: 10px;
  }

  .card {
    padding: 15px;
    border-radius: 15px;
  }

  h5 {
    font-size: 18px;
  }

  .form-control {
    font-size: 14px;
    padding: 10px;
  }

  .btn-light {
    width: 100%;
  }

  .social-icons {
    gap: 15px;
  }

  .social-icons a {
    width: 40px;
    height: 40px;
  }

  .social-img {
    width: 25px;
    height: 25px;
  }
}
@media (min-width: 577px) and (max-width: 991px) {
  section {
    max-width: 700px;
  }
}
@media (min-width: 992px) {
  section {
    max-width: 900px;
  }
}
    </style>
  </head>
  <body>
<video autoplay muted loop class="video-bg">
  <source src="image/animation.mp4" type="video/mp4">
</video>
  <!-- Section: Design Block --> 
  <section class="">
    <!-- Replace background image with color -->
    <!-- <div class="p-5" style="background-color:rgb(220, 24, 24); height: 300px;"></div> -->

    <div class="card form-container shadow-5-strong" backdrop-filter: blur(30px);">
      <div class="card-body py-5 px-md-5">

        <div class="row d-flex justify-content-center">
          <div class="col-12">
            
             <!-- Pills navs -->
  <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
    <li class="nav-item" role="presentation">
      <a class="nav-link btn-light" id="tab-login" data-mdb-toggle="pill" href="login.php" role="tab"
        aria-controls="pills-login" aria-selected="true">Login</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link btn-light" id="tab-register" data-mdb-toggle="pill" href="ragister.php" role="tab"
        aria-controls="pills-register" aria-selected="false">Register</a>
    </li>
  </ul>
  <!-- Pills navs -->
   
            <h5 class="fw-bold mb-4 text-center">Create Your Account 🚀</h5>
            

            <!-- Show alert message here -->
            <?php if (!empty($alert)) echo $alert; ?>


            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
              <!-- First and last name -->
              <div class="row">
                <div class="col-md-6 mb-4">
                  
                <label class="form-label text-white" for="form3Example1">First name</label>
                    <input type="text" name="first_name" id="form3Example1" class="form-control" required placeholder="Enter First Name"/>
                  
                </div>
                <div class="col-md-6 mb-4">
                <label class="form-label text-white" for="form3Example2">Last name</label>
                    <input type="text" name="last_name" id="form3Example2" class="form-control" required placeholder="Enter Last Name"/>
                  
                </div>
              </div>

              <!-- Email -->
              <div class="mb-4">
              <label class="form-label text-white" for="form3Example3">Email address</label>
                <input type="email" name="email" id="form3Example3" class="form-control" required placeholder="Enter Email Address" />
              </div>

              <!-- Password -->
              <div class="mb-4">
              <label class="form-label text-white" for="form3Example4">Password</label>
                <input type="password" name="password" id="form3Example4" class="form-control" required placeholder="Enter Password" />
              
              </div>

              <!-- Checkbox -->
              <!-- <div class="form-check d-flex justify-content-center mb-4">
                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example33" checked />
                <label class="form-check-label text-white" for="form2Example33">
                  Welcome Users 
                </label>
              </div> -->

              <!-- Submit button -->
              <button type="submit" class="btn btn-light btn-block mb-3">
  <i class="fas fa-user-plus"></i> Create Account
</button>
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
          <p>Already have an account? <a href="login.php" class="login-link" data-mdb-toggle="pill">Login</a></p>
        </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- MDB JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.min.js"></script>
  </body>
  </html>
