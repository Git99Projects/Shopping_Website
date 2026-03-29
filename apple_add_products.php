<?php
include 'auth_admin.php';
include 'db.php';
$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['product_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $mrp = $_POST['mrp'];
    $image = $_FILES['image']['name'];
    $brand = 'Apple';

    $target_dir = "image/";
    $target_file = $target_dir . basename($image);

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $stmt = $conn->prepare("INSERT INTO apple_products (name, description, price, mrp, image, brand) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssddss", $name, $description, $price, $mrp, $image, $brand);
        $stmt->execute();

        $message = "<div class='alert alert-success text-center'> Product added successfully!</div>";
    } else {
        $message = "<div class='alert alert-danger text-center'>❌ Image upload failed.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Add Apple Product</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
   body {
    margin: 0;
    min-height: 100vh;
    background: #0f2027;
    position: relative;
    overflow-x: hidden; /* sirf horizontal scroll band */
}

/* Glow circles */
body::before,
body::after {
    content: "";
    position: fixed; /* IMPORTANT change */
    width: 400px;
    height: 400px;
    border-radius: 50%;
    filter: blur(120px);
    opacity: 0.5;
    z-index: -1; /* content ke piche rahe */
}

/* Blue Glow */
body::before {
    background: #00d4ff;
    top: -100px;
    left: -100px;
}

/* Purple Glow */
body::after {
    background: #8e2de2;
    bottom: -100px;
    right: -100px;
}

/* Glass Card */
.card {
    border-radius: 20px;
    backdrop-filter: blur(15px);
    background: rgba(255,255,255,0.08);
    border: 1px solid rgba(255,255,255,0.2);
    box-shadow: 0 8px 32px rgba(0,0,0,0.4);
    color: #fff;
}

/* Inputs */
.form-control {
     background: rgba(255,255,255,0.1);
    border: 1px solid rgba(255,255,255,0.2);
    color: #fff;
    border-radius: 12px;
    transition: all 0.3s ease;
}

/* Hover + Cursor Effect */
.form-control:hover {
    transform: scale(1.03);
    border: 1px solid #00d4ff;
}

.form-control:focus {
    transform: scale(1.05);
    background: rgba(255,255,255,0.2);
    border: 1px solid #00d4ff;
    box-shadow: 0 0 10px rgba(0,212,255,0.5);
    color: #fff;
}

/* Labels */
.form-label {
    font-weight: 600;
    letter-spacing: 0.5px;
    background: linear-gradient(45deg, #00d4ff, #ffffff);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}
/* Smooth feel */
input, textarea {
    transition: all 0.3s ease;
}
/* Buttons */
.btn-primary {
    background: linear-gradient(45deg, #00d4ff, #0072ff);
    border: none;
    border-radius: 10px;
    transition: 0.3s;
}

.btn-primary:hover {
    transform: scale(1.05);
    box-shadow: 0 5px 20px rgba(0,212,255,0.5);
}

.btn-secondary {
    background: rgba(255,255,255,0.2);
    border: none;
    border-radius: 10px;
}

.btn-secondary:hover {
    background: rgba(255,255,255,0.35);
}

/* Title */
.title {
    font-weight: bold;
    background: linear-gradient(45deg,#00d4ff,#fff);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

/* Alert */
.alert {
    border-radius: 10px;
}

/* File input fix */
input[type="file"] {
    color: #fff;
}
/* Placeholder Styling */
::placeholder {
    color: rgba(255, 255, 255, 0.7);
    font-size: 14px;
}

::-webkit-input-placeholder {
    color: rgba(255, 255, 255, 0.7);
}

:-ms-input-placeholder {
    color: rgba(255, 255, 255, 0.7);
}

/* Focus par thoda dim */
.form-control:focus::placeholder {
    color: rgba(255, 255, 255, 0.4);
}
.btn-primary {
    position: relative;
    overflow: hidden;
}

.btn-primary::after {
    content: "";
    position: absolute;
    width: 300%;
    height: 300%;
    top: 50%;
    left: 50%;
    background: rgba(255,255,255,0.2);
    transition: 0.6s;
    transform: translate(-50%, -50%) scale(0);
    border-radius: 50%;
}

.btn-primary:active::after {
    transform: translate(-50%, -50%) scale(1);
}

/* =========================
   MOBILE (<= 576px)
========================= */
@media (max-width: 576px) {

    .card {
        padding: 20px !important;
        border-radius: 15px;
    }

    h3 {
        font-size: 20px;
    }

    .form-control {
        font-size: 14px;
        padding: 10px;
    }

    .btn {
        font-size: 14px;
        padding: 10px;
    }

    /* Reduce spacing */
    .container {
        padding: 10px;
    }
}

/* =========================
   TABLET (577px - 991px)
========================= */
@media (max-width: 991px) {

    .card {
        max-width: 90% !important;
    }

    h3 {
        font-size: 24px;
    }
}

/* =========================
   LAPTOP / DESKTOP (>= 992px)
========================= */
@media (min-width: 992px) {

    .card {
        max-width: 700px;
        padding: 30px;
    }

    h3 {
        font-size: 28px;
    }
}
/* Smooth scroll */
html {
    scroll-behavior: smooth;
}

/* Better tap feel */
button, input, textarea {
    -webkit-tap-highlight-color: transparent;
}
  </style>
</head>
<body>
<div class="container d-flex justify-content-center align-items-start pt-5 pb-5">
  <div class="card p-4 w-100  form-wrapper" style="max-width: 800px;">
  <h3 class="text-center mb-4 form-label">Add Apple Product</h3>
    <?php echo $message; ?>
    <form method="POST" enctype="multipart/form-data">
      <div class="mb-3">
        <label class="form-label">Product Name</label>
        <input type="text" name="product_name" class="form-control" placeholder="Enter product name..." required>
      </div>

      <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control" rows="3" placeholder="Write product description..." required></textarea>
      </div>

      <div class="mb-3">
        <label class="form-label">Selling Price (₹)</label>
        <input type="number" name="price" class="form-control" placeholder="Enter selling price..." step="1" required>
      </div>

      <div class="mb-3">
        <label class="form-label">MRP (₹)</label>
        <input type="number" name="mrp" class="form-control"  placeholder="Enter MRP..." step="1" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Product Image</label>
        <input type="file" name="image" class="form-control" accept="image/*" onchange="previewImage(event)"  required>
        <img id="preview" style="width:20%; margin-top:10px; border-radius:10px; display:none;">
      </div>

      <div class="d-grid gap-3 mt-3">
        <button type="submit" class="btn btn-primary">🚀 Add Product</button>
        <a href="apple.php" class="btn btn-secondary">← Back to Apple Page</a>
      </div>
    </form>
  </div>
</div>
<script>
function previewImage(event) {
    const img = document.getElementById('preview');
    img.src = URL.createObjectURL(event.target.files[0]);
    img.style.display = "block";
}
</script>
</body>
</html>
