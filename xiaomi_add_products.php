<?php
include 'db.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['product_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $mrp = $_POST['mrp'];
    $image = $_FILES['image']['name'];
    $brand = 'Xiaomi';

    $target_dir = "image/";
    $target_file = $target_dir . basename($image);

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $stmt = $conn->prepare("INSERT INTO xiaomi_products (name, description, price, mrp, image, brand) VALUES (?, ?, ?, ?, ?, ?)");
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
  <title>Add Xiaomi Product</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background:rgb(15, 24, 34);
    }
    .card {
      border-radius: 1rem;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    .btn-primary {
      background-color: #007bff;
      border: none;
    }
    .btn-secondary {
      background-color:rgb(107, 100, 25);
      border: none;
    }
    .form-wrapper {
    background-color:rgb(137, 228, 102); /* Light background color */
  }
  </style>
</head>
<body>
<div class="container d-flex justify-content-center align-items-center vh-100">
  <div class="card p-4 w-100  form-wrapper" style="max-width: 800px;">
  <h3 class="text-center mb-4" style="color:rgb(18, 129, 227);">Add Xiaomi Product</h3>
    <?php echo $message; ?>
    <form method="POST" enctype="multipart/form-data">
      <div class="mb-3">
        <label class="form-label">Product Name</label>
        <input type="text" name="product_name" class="form-control" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control" rows="3" required></textarea>
      </div>

      <div class="mb-3">
        <label class="form-label">Selling Price (₹)</label>
        <input type="number" name="price" class="form-control" step="0.01" required>
      </div>

      <div class="mb-3">
        <label class="form-label">MRP (₹)</label>
        <input type="number" name="mrp" class="form-control" step="0.01" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Product Image</label>
        <input type="file" name="image" class="form-control" accept="image/*" required>
      </div>

      <div class="d-grid gap-2">
        <button type="submit" class="btn btn-primary">Add Product</button>
        <a href="xiaomi.php" class="btn btn-secondary">← Back to Xiaomi Page</a>
      </div>
    </form>
  </div>
</div>
</body>
</html>
