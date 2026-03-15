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
        background-color: #2c2c2c; /* light black background */
        color: white;
        margin: 0;
        padding: 0;
      }

      .card {
        background-color: #1e1e1e !important; /* darker card background */
      }
      
    /* Change input border and label color */
    .form-control {
      border: 1px solid #555 !important; /* light gray */
      background-color: #2c2c2c;
      color: white;
    }

    .form-control:focus {
      border-color: #0d6efd !important; /* optional blue focus */
      box-shadow: 0 0 0 0.1rem rgba(13, 110, 253, 0.25); /* MDB-like glow */
    }

    .form-label {
      color: #ccc;
    }
    .form-box {
      background-color: #1e1e1e; /* darker container */
      padding: 30px;
      border-radius: 12px;
      width: 100%;
      max-width: 500px;
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

.success-box {
    background-color: #1e3a1e;
    border: 1px solid #4dff4d;
    color: #4dff4d;
    padding: 10px;
    border-radius: 8px;
    margin-bottom: 20px;
    text-align: center;
  }

    </style>
  </head>
  <body>

  <!-- Section: Design Block --> 
  <section class="">
    <!-- Replace background image with color -->
    <!-- <div class="p-5" style="background-color:rgb(220, 24, 24); height: 300px;"></div> -->

    <div class="card mx-4 mx-md-5 shadow-5-strong" style="margin-top: 60px; backdrop-filter: blur(30px);">
      <div class="card-body py-5 px-md-5">

        <div class="row d-flex justify-content-center">
          <div class="col-lg-8">
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
            <h2 class="fw-bold mb-5 text-white" align="center">Ragister Now :</h2>

            <!-- Show alert message here -->
            <?php if (!empty($alert)) echo $alert; ?>


            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
              <!-- First and last name -->
              <div class="row">
                <div class="col-md-6 mb-4">
                  
                <label class="form-label text-white" for="form3Example1">First name</label>
                    <input type="text" name="first_name" id="form3Example1" class="form-control" required />
                  
                </div>
                <div class="col-md-6 mb-4">
                <label class="form-label text-white" for="form3Example2">Last name</label>
                    <input type="text" name="last_name" id="form3Example2" class="form-control" required />
                  
                </div>
              </div>

              <!-- Email -->
              <div class="mb-4">
              <label class="form-label text-white" for="form3Example3">Email address</label>
                <input type="email" name="email" id="form3Example3" class="form-control" required />
              </div>

              <!-- Password -->
              <div class="mb-4">
              <label class="form-label text-white" for="form3Example4">Password</label>
                <input type="password" name="password" id="form3Example4" class="form-control" required />
              
              </div>

              <!-- Checkbox -->
              <div class="form-check d-flex justify-content-center mb-4">
                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example33" checked />
                <label class="form-check-label text-white" for="form2Example33">
                  Welcome Users 
                </label>
              </div>

              <!-- Submit button -->
              <button type="submit" class="btn btn-light btn-block mb-4"><font size="3">Ragister</font></button>

              <!-- Social buttons
              <div class="text-center">
                <p>or sign up with:</p>
                <button type="button" class="btn btn-link btn-floating mx-1"><i class="fab fa-facebook-f"></i></button>
                <button type="button" class="btn btn-link btn-floating mx-1"><i class="fab fa-google"></i></button>
                <button type="button" class="btn btn-link btn-floating mx-1"><i class="fab fa-twitter"></i></button>
                <button type="button" class="btn btn-link btn-floating mx-1"><i class="fab fa-github"></i></button>
              </div> -->
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
