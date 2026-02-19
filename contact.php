<?php
include 'db.php';  // database connection
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = htmlspecialchars(trim($_POST["name"]));
    $email   = htmlspecialchars(trim($_POST["email"]));
    $subject = htmlspecialchars(trim($_POST["subject"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    // Insert into complaints table
    $stmt = $conn->prepare("INSERT INTO complaints (name, email, subject, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $subject, $message);
    if ($stmt->execute()) {
        $success = "<div class='alert alert-success mt-3'>✅ Hi <strong>$name</strong>, your message has been sent successfully.</div>";
    } else {
        $success = "<div class='alert alert-danger mt-3'>❌ Failed to send message. Please try again.</div>";
    }
}

$success = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = htmlspecialchars(trim($_POST["name"]));
    $email   = htmlspecialchars(trim($_POST["email"]));
    $subject = htmlspecialchars(trim($_POST["subject"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    $success = "<div class='alert alert-success mt-3'>✅ Hi <strong>$name</strong>, your message has been sent successfully. We’ll get back to you shortly!</div>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Contact Us - Online Supermarket</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, rgb(17, 45, 201), rgb(37, 180, 32));
      font-family: 'Segoe UI', sans-serif;
    }

    .navbar-brand img {
      width: 40px;
      margin-right: 10px;
    }

    .contact-wrapper {
      max-width: 800px;
      margin: 20px auto;
      background: white;
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
    }

    .contact-wrapper h2 {
      color: #232f3e;
      font-weight: bold;
    }

    .form-label i {
      color: #007185;
      margin-right: 8px;
    }

    .btn-submit {
      background-color: #ff9900;
      color: white;
      font-weight: bold;
      border: none;
    }

    .btn-submit:hover {
      background-color: #e68a00;
    }

    .form-control:focus {
      border-color: #007185;
      box-shadow: 0 0 0 0.2rem rgba(0, 113, 133, 0.25);
    }

    .contact-info {
      font-size: 14px;
      margin-top: 20px;
      color: #444;
    }

    .alert {
      font-size: 16px;
    }

    @media (max-width: 768px) {
      .contact-wrapper {
        margin: 20px;
        padding: 25px;
      }
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
        <a class="nav-link active" href="home.php">🏠 Home</a>
        <a class="nav-link active" href="cart.php">🛒 Cart</a>
        <a class="nav-link active" href="contact.php">📞 Contact</a>
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
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
