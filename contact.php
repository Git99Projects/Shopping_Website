<?php
session_start();
include 'db.php';

$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = trim($_POST["name"] ?? "");
    $email   = trim($_POST["email"] ?? "");
    $subject = trim($_POST["subject"] ?? "");
    $message = trim($_POST["message"] ?? "");

    // Link complaint to logged-in user (if logged in)
    $user_id = $_SESSION['user_id'] ?? null;

    // If logged in, force correct email
    if (isset($_SESSION['user_email']) && $_SESSION['user_email'] !== "") {
        $email = $_SESSION['user_email'];
    }

    $stmt = $conn->prepare("INSERT INTO complaints (user_id, name, email, subject, message) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issss", $user_id, $name, $email, $subject, $message);

    if ($stmt->execute()) {
        $safeName = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
        $success = "<div class='alert alert-success mt-3'>✅ Hi <strong>$safeName</strong>, your message has been sent successfully.</div>";
        $_POST = []; // optional reset
    } else {
        $success = "<div class='alert alert-danger mt-3'>❌ Failed to send message. Please try again.</div>";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Contact Us - Online Supermarket</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <style>

    body {
  /* background: linear-gradient(135deg, #0f2027, #203a43, #2c5364); */
  background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
  font-family: 'Segoe UI', sans-serif;
}

/* 🔥 Glass Effect Container */
.contact-wrapper {
  max-width: 800px;
  margin: 40px auto;
  padding: 40px;
  border-radius: 20px;

  /* 🔥 Glass Effect */
  background: rgba(255, 255, 255, 0.08);
  backdrop-filter: blur(15px);
  -webkit-backdrop-filter: blur(15px);

  /* Border + Glow */
  border: 1px solid rgba(255, 255, 255, 0.2);

  /* Shadow */
  box-shadow: 0 15px 40px rgba(0,0,0,0.4);

  color: white;
  transition: all 0.3s ease;
}
.contact-wrapper:hover {
  transform: translateY(-6px) scale(1.01);
  box-shadow: 0 20px 50px rgba(0,0,0,0.6);
}

.contact-wrapper:hover {
  transform: translateY(-5px);
}

/* Heading */
.contact-wrapper h2 {
  font-weight: 700;
  letter-spacing: 1px;
  color: #ffffff;
}

/* Labels */
.form-label {
  color: #ddd;
  font-weight: 500;
}

.form-label i {
  color: #00e5ff;
}

/* 🔥 Premium Inputs */
.form-control {
  background: rgba(255,255,255,0.1);
  border: none;
  color: white;
  border-radius: 10px;
  padding: 12px;
  transition: 0.3s;
}

.form-control::placeholder {
  color: #ccc;
}

.form-control:focus {
  background: rgba(255,255,255,0.15);
  border: 1px solid #00e5ff;
  box-shadow: 0 0 10px rgba(0,229,255,0.5);
  color: white;
}

.form-control {
  transition: all 0.3s ease;
  border: 1px solid transparent;
}

/* 🟢 Hover effect (cursor le jane par) */
/* .form-control:hover {
  border: 1px solid #00e5ff;
  box-shadow: 0 0 12px rgba(0,229,255,0.5);
  background: rgba(255,255,255,0.12);
  transform: scale(1.02);
} */

/* 🔵 Focus effect (click karne par aur strong) */
.form-control:focus {
  border: 1px solid #00c6ff;
  box-shadow: 0 0 18px rgba(0,198,255,0.8);
  background: rgba(255,255,255,0.18);
}
.form-control:hover {
  border: 1px solid transparent;
  background: linear-gradient(#111, #2e2d2dff) padding-box,
              linear-gradient(135deg, #00e5ff, #0072ff) border-box;
  box-shadow: 0 0 15px rgba(0,229,255,0.6);
  transform: scale(1.02);
}
/* 🔥 Premium Button */
.btn-submit {
  background: linear-gradient(135deg, #00c6ff, #0072ff);
  border: none;
  padding: 12px;
  font-weight: bold;
  border-radius: 30px;
  transition: 0.3s;
}

.btn-submit:hover {
  background: linear-gradient(135deg, #0072ff, #00c6ff);
  transform: scale(1.05);
  box-shadow: 0 5px 20px rgba(0,114,255,0.6);
}

/* Navbar upgrade */
.navbar {
  backdrop-filter: blur(10px);
  background: rgba(0,0,0,0.6) !important;
}

/* Contact info */
.contact-info {
  font-size: 14px;
  color: #ddd;
}

.contact-info i {
  color: #00e5ff;
}

/* Alerts */
.alert {
  border-radius: 10px;
}

/* Mobile */
@media (max-width: 768px) {
  .contact-wrapper {
    margin: 20px;
    padding: 25px;
  }
}
.navbar-brand img {
      width: 40px;
      margin-right: 10px;
    }
/* All main buttons smooth effect */
.btn {
  transition: all 0.3s ease;
}

/* Continue Shopping (secondary) */
.btn-secondary:hover {
  transform: scale(1.08);
  box-shadow: 0 0 15px rgba(0,198,255,0.7);
}

/* Proceed to Buy (success) */
.btn-success:hover {
  transform: scale(1.08);
  box-shadow: 0 0 15px rgba(0,255,100,0.7);
}
    
  </style>
</head>
<body>

<!-- ✅ Navbar with Complain Box -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid px-4">
    <a class="navbar-brand d-flex align-items-center" href="home.php">
      <img src="image/logo.png" alt="Logo"> <span><b>SuperMarket</b></span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
      <div class="navbar-nav ">
        <a class="nav-link btn btn-warning text-white px-3 ms-2" href="home.php">🏠 Home</a>
        <a class="nav-link btn btn-warning text-white px-3 ms-2" href="cart.php">🛒 Cart</a>
        <a class="nav-link btn btn-warning text-white px-3 ms-2" href="contact.php">📞 Contact</a>
        <a class="nav-link btn btn-warning text-white px-3 ms-2" href="complain.php">📮 Complain List</a>
      </div>
    </div>
  </div>
</nav>

<!-- ✅ Contact Form -->
<div class="container contact-wrapper">
<a href="home.php" class="btn btn-secondary">⬅️ Back</a>
  <h2 class="text-center mb-4"><i class="fa-solid fa-envelope-circle-check text-info me-2"></i>Contact Us</h2>
  <?php echo $success; ?>
  <form method="POST" action="">
    <div class="mb-3">
      <label class="form-label"><i class="fa-solid fa-user"></i> Full Name</label>
      <input type="text" name="name" class="form-control" required placeholder="Your name">
    </div>

    <div class="mb-3">
      <label class="form-label"><i class="fa-solid fa-envelope"></i> Email Address</label>
      <input type="email" name="email" class="form-control" required placeholder="your@email.com">
    </div>

    <div class="mb-3">
      <label class="form-label"><i class="fa-solid fa-heading"></i> Subject</label>
      <input type="text" name="subject" class="form-control" required placeholder="Subject of your message">
    </div>

    <div class="mb-3">
      <label class="form-label"><i class="fa-solid fa-comment-dots"></i> Your Message</label>
      <textarea name="message" class="form-control" rows="5" required placeholder="Type your message here..."></textarea>
    </div>

    <div class="d-grid">
      <button type="submit" class="btn btn-submit"><i class="fa-solid fa-paper-plane"></i> Send Message</button>
    </div>
  </form>

  <div class="contact-info text-center mt-4">
    <p><i class="fa-solid fa-phone"></i> <b>Call us:</b> +91 89798XXXXX</p>
    <p><i class="fa-solid fa-location-dot"></i> <b>Address:</b> SuperMarket Lane, Kosi kalan (Mathura), India</p>
    <p><i class="fa-solid fa-clock"></i> <b>Support:</b> Mon–Sat | 9 AM – 6 PM</p>
    <p><i class="fa-solid fa-clock"></i> <b>Mail:</b> kumardeepak884488@gmail.com </p>
    <p><i class="fa-solid fa-clock"></i> <b>Mail:</b> manojgola184@gmail.com </p>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
