<?php
session_start();
include 'db.php';
$highlight_id = isset($_GET['highlight_id']) ? $_GET['highlight_id'] : null;


// Handle Add to Cart
if (isset($_GET['add_to_cart'])) {
    $product_id = 'dell_' . $_GET['add_to_cart'];
  
    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id]['quantity'] += 1;
    } else {
        $raw_id = str_replace('dell_', '', $product_id);
        $stmt = $conn->prepare("SELECT * FROM dell_products WHERE id = ?");
        $stmt->bind_param("i", $raw_id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $product = $result->fetch_assoc();
            $_SESSION['cart'][$product_id] = [
                "name" => $product['name'],
                "price" => $product['price'],
                "image" => $product['image'],
                "quantity" => 1,
                "delivery" => rand(10, 100)
            ];
        }
    }
  
    // 👇 Redirect condition based on whether it's "Buy Now"
    if (isset($_GET['buy_now']) && $_GET['buy_now'] == 1) {
        header("Location: cart.php"); // Buy Now → go to cart
    } else {
        header("Location: dell.php"); // Add to cart → stay on home
    }
    exit();
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Online Super Market - Dell</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
           body {
      background-color:rgb(255, 255, 255); /* Light blue */
    }
    .navbar {
    background-color:rgb(51, 217, 235); /* Indigo */
  }
  .product-card {
  background-color:rgb(207, 235, 243); /* Change this to your desired color */
}
    .product-img {
  width: 180px;
  height: 275px;
  object-fit: contain;
  display: block;
  margin: 0 auto; /* centers image horizontally */
     }
    </style>
</head>
<body>
<?php if (isset($_GET['notfound']) && $_GET['notfound'] == 1): ?>
  <!-- Modal -->
  <div class="modal fade" id="notFoundModal" tabindex="-1" aria-labelledby="notFoundModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="position: absolute; top: 50px; left: 50%; transform: translateX(-50%);">
      <div class="modal-content" style="background-color:rgb(243, 231, 231); color:rgb(47, 8, 8); border: 2px solidrgb(251, 249, 249);">
        <div class="modal-header">
          <h5 class="modal-title fw-bold" id="notFoundModalLabel">❌ Product Not Found</h5>
          <button type="button" class="btn-close" style="filter: invert(22%) sepia(80%) saturate(6165%) hue-rotate(356deg);" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          The product you searched for could not be found.
        </div>
      </div>
    </div>
  </div>

  <!-- Auto-show the modal -->
  <script>
    window.onload = function () {
      var notFoundModal = new bootstrap.Modal(document.getElementById('notFoundModal'));
      notFoundModal.show();
    };
  </script>
<?php endif; ?>
<div class="container-fluid p-0">

<!-- Header Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-info">
  <div class="container-fluid">
    <a href="home.php">
      <img src="image/logo.png" alt="logo" class="logo" width="45">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Left nav links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link active" href="home.php"><b>Home</b></a></li>
        <!-- <li class="nav-item"><a class="nav-link" href="insert_products.php">Admin</a></li> -->
        <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
        <li class="nav-item"><a class="nav-link" href="login.php">Logout</a></li>
        <li class="nav-item"><a class="nav-link" href="ragister.php">Register</a></li>
      </ul>
      
      <div class="mx-auto d-flex">
  <form class="d-flex me-3" method="GET" action="search_products.php">
    <input class="form-control me-1" type="search" name="search" placeholder="Search products" style="width: 400px;">
    <button class="btn btn-outline-light" type="submit" style="width: 80px;">
      <i class="fa fa-search fa-2x"></i>
    </button>
  </form>
</div>

      <!-- Search form + right items -->
      <div class="d-flex align-items-center">
       
      <a class="nav-link btn  text-blue px-3 ms-2" href="complain.php" style="color:rgb(46, 22, 202);"><b>📮</b> Complain List</a>
        <a class="nav-link " href="order_history.php">
          <i class="fa-solid fa-bag-shopping fa-2x me-1" style="color:rgb(50, 30, 181);"></i> Orders
        </a>
        <a class="nav-link  me-3" href="cart.php">
          <i class="fa-solid fa-cart-shopping fa-2x" style="color:rgb(53, 30, 200);"></i>
          <sup>
            <?php echo isset($_SESSION['cart']) ? array_sum(array_column($_SESSION['cart'], 'quantity')) : 0; ?>
          </sup>
        </a>
      </div>
    </div>
  </div>
</nav>
<br>

<!-- Second Navbar -->
<!-- <nav class="navbar navbar-expand-lg navbar-light bg-light p-0">
    <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link" href="index.php">Welcome Guest</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php">Logout</a></li>
    </ul>
</nav> -->

<!-- Products Section -->
<div class="row px-1">
    <div class="col-md-10 px-3">
        <div class="row px-4 py-4">
            <?php
            $query = "SELECT * FROM dell_products WHERE brand = 'Dell'";
            $result = $conn->query($query);
            while ($row = $result->fetch_assoc()):
            ?>
            <div class="col-md-3 mb-4">
            <div class="card h-100 product-card<?php if ($highlight_id == $row['id']) echo 'border border-warning border-3'; ?>">
                    <img src="image/<?php echo $row['image']; ?>" class="product-img mx-auto d-block" alt="<?php echo $row['name']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['name']; ?></h5>
                        <p class="card-text"><?php echo $row['description']; ?></p>
                        <h4>₹<?php echo number_format($row['price']); ?></h4>
                        <h6>
                            M.R.P: ₹<s><?php echo number_format($row['mrp']); ?></s>
                            (<?php echo round(100 - ($row['price'] / $row['mrp']) * 100); ?>% off)
                        </h6>
                        <a href="dell.php?add_to_cart=<?php echo $row['id']; ?>" class="btn btn-info">Add to Cart</a>
                        <a href="dell.php?add_to_cart=<?php echo $row['id']; ?>&buy_now=1" class="btn btn-success">Buy Now</a>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="col-md-2 bg-secondary p-0">
        <ul class="navbar-nav text-center">
            <li class="nav-item bg-info"><a href="#" class="nav-link text-light"><h2>Mobiles</h2></a></li>
            <li class="nav-item"><a href="apple.php" class="nav-link text-light"><h5>Apple</h5></a></li>
            <li class="nav-item"><a href="samsung.php" class="nav-link text-light"><h5>Samsung</h5></a></li>
            <li class="nav-item"><a href="xiaomi.php" class="nav-link text-light"><h5>Xiaomi</h5></a></li>
            <li class="nav-item"><a href="oneplus.php" class="nav-link text-light"><h5>OnePlus</h5></a></li>
            <!-- <li class="nav-item"><a href="index1.php" class="nav-link text-light"><h5>Others</h5></a></li> -->
        </ul>
        <ul class="navbar-nav text-center">
            <li class="nav-item bg-info"><a href="#" class="nav-link text-light"><h2>Laptops</h2></a></li>
            <li class="nav-item"><a href="hp.php" class="nav-link text-light"><h5>HP</h5></a></li>
            <li class="nav-item"><a href="dell.php" class="nav-link text-light"><h5>DELL</h5></a></li>
            <li class="nav-item"><a href="macbook.php" class="nav-link text-light"><h5>MacBook</h5></a></li>
        </ul>
        <ul class="navbar-nav text-center">
            <li class="nav-item bg-info"><a href="#" class="nav-link text-light"><h3>Headphones</h3></a></li>
            <li class="nav-item"><a href="boat.php" class="nav-link text-light"><h5>boAT</h5></a></li>
            <li class="nav-item"><a href="oneplusbud.php" class="nav-link text-light"><h5>OnePlus</h5></a></li>
            <li class="nav-item"><a href="boult.php" class="nav-link text-light"><h5>Boult</h5></a></li>
        </ul>
    </div>
</div>

<!-- Footer -->
<div class="bg-info p-3 text-center">
    <p>All rights reserved. Designed by <span style="color:blue;">Deepak Kumar Singh and Manoj</span></p>
</div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
