<?php
session_start();
include 'db.php';
$highlight_id = isset($_GET['highlight_id']) ? $_GET['highlight_id'] : null;


// Handle Add to Cart
if (isset($_GET['add_to_cart'])) {

    $product_id = 'apple_' . $_GET['add_to_cart'];
  
    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id]['quantity'] += 1;
    } else {
        $raw_id = str_replace('apple_', '', $product_id);
        $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
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
        header("Location: apple.php"); // Add to cart → stay on home
    }
    exit();
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Super Market - Apple</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">

<style>
@font-face {
    font-family: 'JellyJam';
    src: url('JellyjampersonaluseBold-Rpjey.otf') format('opentype');
}

.apple-title {
    font-family: 'JellyJam';
    font-size: 25px;
    background: radial-gradient(circle at 30% 30%, #ff8080, #cc0000 60%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    text-shadow:
        0 3px 0 #990000,
        0 6px 8px rgba(0,0,0,0.4);
}

.custom-footer {
    background: rgba(255,255,255,0.1);
    backdrop-filter: blur(10px);
    color: white;
}
</style>

<style>
body {
    margin: auto;
    font-family: -apple-system, BlinkMacSystemFont, sans-serif;
    overflow-x: hidden;
background: linear-gradient(315deg, 
#667eea 0%, 
#764ba2 40%, 
#89f7fe 70%, 
#66a6ff 100%);

    animation: gradient 15s ease infinite;
    background-size: 400% 400%;
    background-attachment: fixed;
}

@keyframes gradient {
    0% { background-position: 0% 0%; }
    50% { background-position: 100% 100%; }
    100% { background-position: 0% 0%; }
}

.wave {
    background: rgb(255 255 255 / 25%);
    border-radius: 1000% 1000% 0 0;
    position: fixed;
    width: 200%;
    height: 12em;
    animation: wave 10s -3s linear infinite;
    transform: translate3d(0, 0, 0);
    opacity: 0.8;
    bottom: 0;
    left: 0;
    z-index: -1;
}

.wave:nth-of-type(2) {
    bottom: -1.25em;
    animation: wave 18s linear reverse infinite;
}

.wave:nth-of-type(3) {
    bottom: -2.5em;
    animation: wave 20s -1s reverse infinite;
}

@keyframes wave {
    0% { transform: translateX(0); }
    50% { transform: translateX(-50%); }
    100% { transform: translateX(0); }
}
</style>

<style>
         body {
      /* background-color:rgba(107, 207, 223, 1); Light blue */
    }
    .navbar {
    background-color:rgb(51, 217, 235); /* Indigo */
  }
  .product-card {
    background: transparent;
    backdrop-filter: blur(0px);
      transition: 0.3s ease;
    overflow: hidden;
}
    .product-img {
  width: 180px;
  height: 275px;
  object-fit: contain;
  display: block;
  margin: 0 auto; /* centers image horizontally */
  border-radius: 0px; 
  transition: transform 0.4s ease;
     }
.product-img:hover {
    transform: scale(1.1);
}
.product-card {
     overflow: visible;
}

.product-name {
    font-weight: bold;
    font-size: 18px;
    color: #4346f9ff;
    text-shadow: 0 0 8px #00ffff, 0 0 15px #0077ff;
    transition: 0.3s;
}

.product-name:hover {
    color: #f21ca0ff;
    transform: scale(1.05);
}

.nav-glow {
    font-weight: bold;
    font-size: 16px;
    color: #2020e7ff;   /* 🔵 Default Color */
    text-shadow: 0 0 6px #e6dfdfff, 0 0 12px #314180ff;
    transition: 0.3s ease;
}

.nav-glow:hover {
    color: #ff1493;   /* 🩷 Hover Color */
    transform: scale(1.08);
}


.brand-glow {
    font-weight: bold;
    color: #dfc6baff;   /* normal color */
    text-shadow: 0 0 6px #66ccff, 0 0 12px;
    transition: 0.3s ease;
}

.brand-glow:hover {
    color: #0c0c9cff;   /* hover color */
    transform: scale(1.08);
}


/* PRICE EFFECT */
.price-glow {
    font-weight: bold;
    color: #2d2dff;
    transition: 0.3s ease;
}

.price-glow:hover {
    color: #ff1493;
    transform: scale(1.1);
}

/* BUTTON EFFECT */
.btn-hover {
    transition: 0.3s ease;
}

.btn-hover:hover {
    transform: scale(1.08);
    box-shadow: 0 8px 20px rgba(0,0,0,0.3);
}

/* Dropdown transparent */
/* Glass Effect Dropdown */
.dropdown-menu-custom {
    background: rgba(255, 255, 255, 0.95) !important;
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    border-radius: 12px;
    border: 1px solid rgba(255,255,255,0.2);
    box-shadow: 0 8px 25px rgba(0,0,0,0.2);
    padding: 8px;

      opacity: 1 !important;
  visibility: visible !important;
  text-shadow: none !important;        
}

/* Keep nav-glow look */
.dropdown-custom {
    background: transparent !important;
    color: #2020e7ff !important;
    font-weight: bold;
    text-shadow: 0 0 6px #e6dfdfff, 0 0 12px #314180ff;
    transition: 0.3s ease;
    border-radius: 8px;
}

/* Hover effect */
.dropdown-custom:hover {
    color: #ff1493 !important;
    background: rgba(255,255,255,0.2) !important;
    transform: scale(1.05);
}

/* Premium Mobile Search */
/* Base Style */
.premium-search {
    display: flex;
    align-items: center;
    background: rgba(255, 255, 255, 0.20);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    border-radius: 30px;
    padding: 6px 12px;
    border: 2px solid rgba(255,255,255,0.6);
    box-shadow: 0 0 15px rgba(255,255,255,0.6);
    transition: 0.4s ease;
}

/* Mobile */
@media (max-width: 991px) {
    .premium-search {
        width: 150px;
    }
}

/* Laptop */
@media (min-width: 992px) {
    .premium-search {
        width: 380px;
    }
}

.premium-search input {
    border: none;
    background: transparent;
    outline: none;
    width: 100%;
    font-size: 15px;
    color: white;
    font-weight: 500;
}

.premium-search input::placeholder {
    color: rgba(255,255,255,0.8);
}

.premium-search button {
    border: none;
    background: transparent;
    color: white;
    font-size: 17px;
    cursor: pointer;
    transition: 0.3s ease;
}

/* Strong Hover Glow */
.premium-search:hover {
    box-shadow: 0 0 25px #00ffff, 0 0 40px #00aaff;
    border-color: #00ffff;
}

/* Focus Glow */
.premium-search:focus-within {
    box-shadow: 0 0 30px #ff1493, 0 0 50px #ff69b4;
    border-color: #ff1493;
}

/* Icon hover */
.premium-search button:hover {
    color: #ff1493;
    transform: scale(1.2);
}

/* Second Navbar Glass */
.second-nav {
    background: rgba(255,255,255,0.15);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
     position: relative;
    z-index: 9999;
}

/* Glass Dropdown */
.dropdown-glass {
    background: rgba(255,255,255,0.2) !important;
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    border-radius: 10px;
    border: 1px solid rgba(255,255,255,0.3);
    box-shadow: 0 8px 25px rgba(0,0,0,0.2);
     z-index: 10000 !important;
    position: absolute !important;
}

.dropdown-glass .dropdown-item {
    background: transparent !important;
    transition: 0.3s ease;

     color: #ffffff !important;          /* text visible on glass */
  opacity: 1 !important;
  visibility: visible !important;
  text-shadow: none !important; 
}

.dropdown-glass .dropdown-item:hover {
    background: rgba(255,255,255,0.2) !important;
    transform: scale(1.05);
    color: #ffffff !important;
}

@media (max-width: 991px) {

    .second-nav .navbar-nav {
        flex-direction: row !important;
        justify-content: center;
        gap: 20px;
    }

}

    </style>
</head>
<body>
<div>
    <div class="wave"></div>
    <div class="wave"></div>
    <div class="wave"></div>
</div>

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
<!-- DESKTOP NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-light bg-info d-none d-lg-flex">
  <div class="container-fluid">

    <!-- Logo -->
    <a href="home.php">
      <img src="image/logo.png" width="45">
    </a>
    

    <div class="collapse navbar-collapse show">

      <!-- Left Links -->
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link nav-glow" href="home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-glow" href="contact.php">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-glow" href="login.php">Logout</a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-glow" href="ragister.php">Register</a>
        </li>
      </ul>

      <!-- Search -->
      <form class="premium-search ms-2" method="GET" action="search_products.php">
    <input type="search" name="search" placeholder="Search..." required>
    <button type="submit">
        <i class="fa fa-search"></i>
    </button>
</form>

      <!-- Right Side -->
      <div class="d-flex align-items-center">

        <!-- Complain -->
        <a class="nav-link nav-glow me-2" href="complain.php">
          📮 Complain List
        </a>

        <!-- Orders -->
        <a class="nav-link nav-glow me-2" href="order_history.php">
          <i class="fa-solid fa-bag-shopping"></i> Orders
        </a>

        <!-- Cart -->
        <a class="nav-link nav-glow" href="cart.php">
          <i class="fa-solid fa-cart-shopping"></i>
          <sup>
            <?php echo isset($_SESSION['cart']) ? array_sum(array_column($_SESSION['cart'], 'quantity')) : 0; ?>
          </sup>
        </a>

      </div>

    </div>
  </div>
</nav>



<!-- MOBILE NAVBAR -->
<nav class="navbar bg-info d-flex d-lg-none px-3">

  <!-- Logo -->
  <a href="home.php">
    <img src="image/logo.png" width="40">
  </a>

  <!-- Home Dropdown -->
  <div class="dropdown">
  <button class="btn btn-info dropdown-toggle text-dark fw-bold nav-glow dropdown-custom" data-bs-toggle="dropdown">
    Home
  </button>

  <ul class="dropdown-menu dropdown-menu-custom">
    <li><a class="dropdown-item nav-glow dropdown-custom" href="home.php">Home</a></li>
    <li><a class="dropdown-item nav-glow dropdown-custom" href="contact.php">Contact</a></li>
    <li><a class="dropdown-item nav-glow dropdown-custom" href="login.php">Logout</a></li>
    <li><a class="dropdown-item nav-glow dropdown-custom" href="ragister.php">Register</a></li>
    <li><a class="dropdown-item nav-glow dropdown-custom" href="complain.php">Complain List</a></li>
    <li><a class="dropdown-item nav-glow dropdown-custom" href="order_history.php">Orders</a></li>
  
  </ul>
</div>

  <!-- Small Search -->
  <form class="premium-search ms-2" method="GET" action="search_products.php">
    <input type="search" name="search" placeholder="Search..." required>
    <button type="submit">
        <i class="fa fa-search"></i>
    </button>
</form>

  <!-- Cart Icon -->
  <a class="nav-link nav-glow" href="cart.php">
          <i class="fa-solid fa-cart-shopping fa-lg"></i>
          <sup>
            <?php echo isset($_SESSION['cart']) ? array_sum(array_column($_SESSION['cart'], 'quantity')) : 0; ?>
          </sup>
        </a>

</nav>

<!-- SECOND NAVBAR -->
<nav class="navbar navbar-expand-lg second-nav py-2">
  <div class="container-fluid justify-content-center">

    <ul class="navbar-nav">

      <!-- Mobiles Dropdown -->
      <li class="nav-item dropdown mx-3">
        <a class="nav-link dropdown-toggle nav-glow fw-bold"
           href="#"
           role="button"
           data-bs-toggle="dropdown">
          Mobiles
        </a>
        <ul class="dropdown-menu dropdown-glass">
          <li><a class="dropdown-item nav-glow" href="apple.php">Apple</a></li>
          <li><a class="dropdown-item nav-glow" href="samsung.php">Samsung</a></li>
          <li><a class="dropdown-item nav-glow" href="xiaomi.php">Xiaomi</a></li>
          <li><a class="dropdown-item nav-glow" href="oneplus.php">OnePlus</a></li>
          
        </ul>
      </li>

      <!-- Laptops Dropdown -->
      <li class="nav-item dropdown mx-3">
        <a class="nav-link dropdown-toggle nav-glow fw-bold"
           href="#"
           role="button"
           data-bs-toggle="dropdown">
          Laptops
        </a>
        <ul class="dropdown-menu dropdown-glass">
          <li><a class="dropdown-item nav-glow" href="hp.php">HP</a></li>
          <li><a class="dropdown-item nav-glow" href="dell.php">Dell</a></li>
          <li><a class="dropdown-item nav-glow" href="macbook.php">MacBook</a></li>
      
        </ul>
      </li>

      <!-- Headphones Dropdown -->
      <li class="nav-item dropdown mx-3">
        <a class="nav-link dropdown-toggle nav-glow fw-bold"
           href="#"
           role="button"
           data-bs-toggle="dropdown">
          Headphones
        </a>
        <ul class="dropdown-menu dropdown-glass">
          <li><a class="dropdown-item nav-glow" href="boat.php">boAT</a></li>
          <li><a class="dropdown-item nav-glow" href="oneplus.php">OnePlus</a></li>
          <li><a class="dropdown-item nav-glow" href="boult.php">Boult</a></li>
      
        </ul>
      </li>

    </ul>

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
    <div class="col-12 col-md-10 px-3">
        <div class="row px-1 py-1">
            <?php
            $query = "SELECT * FROM products WHERE brand = 'Apple'";
            $result = $conn->query($query);
            while ($row = $result->fetch_assoc()):
            ?>
            <div class="col-12 col-md-3 mb-4">
                <div class="card h-100 product-card <?php if ($highlight_id == $row['id']) echo 'border border-warning border-3'; ?>">
                    <img src="image/<?php echo $row['image']; ?>" class="product-img mx-auto d-block" alt="<?php echo $row['name']; ?>">
                    <div class="card-body">
                        <h5 class="card-title product-name">
    <?php echo $row['name']; ?>
</h5>
<?php
$fullDesc = $row['description'];
$shortDesc = substr($fullDesc, 0, 30);
?>

<p class="card-text">
    <span id="short_<?php echo $row['id']; ?>">
        <?php echo $shortDesc; ?>...
        <a href="javascript:void(0);" 
           onclick="toggleDesc(<?php echo $row['id']; ?>)" 
           style="color:blue; font-weight:bold;">More</a>
    </span>

    <span id="full_<?php echo $row['id']; ?>" style="display:none;">
        <?php echo $fullDesc; ?>
        <a href="javascript:void(0);" 
           onclick="toggleDesc(<?php echo $row['id']; ?>)" 
           style="color:red; font-weight:bold;">Less</a>
    </span>
</p>
                        <h4 class="price-glow">
                            ₹<?php echo number_format($row['price']); ?>
                          </h4>
                        <h6>
                            M.R.P: ₹<s><?php echo number_format($row['mrp']); ?></s>
                            (<?php echo round(100 - ($row['price'] / $row['mrp']) * 100); ?>% off)
                        </h6>
  <a href="apple.php?add_to_cart=<?php echo $row['id']; ?>" 
   class="btn btn-info btn-hover">
   Add to Cart
</a>

<a href="apple.php?add_to_cart=<?php echo $row['id']; ?>&buy_now=1" 
   class="btn btn-success btn-hover">
   Buy Now
</a>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>

    <!-- Sidebar -->
    <!-- <div class="col-md-2 ">
        <ul class="navbar-nav text-center">
            <li class="nav-item bg-info"><a href="#" class="nav-link text-light"><h2>Mobiles</h2></a></li>
            <li class="nav-item"><a href="apple.php" class="nav-link apple-title brand-glow">Apple</a></li>
            <li class="nav-item"><a href="samsung.php" class="nav-link apple-title brand-glow"><h5>Samsung</h5></a></li>
            <li class="nav-item"><a href="xiaomi.php" class="nav-link apple-title brand-glow"><h5>Xiaomi</h5></a></li>
            <li class="nav-item"><a href="oneplus.php" class="nav-link apple-title brand-glow"><h5>OnePlus</h5></a></li>
            
        </ul>
        <ul class="navbar-nav text-center">
            <li class="nav-item bg-info"><a href="#" class="nav-link text-light"><h2>Laptops</h2></a></li>
            <li class="nav-item"><a href="hp.php" class="nav-link brand-glow apple-title"><h5>HP</h5></a></li>
            <li class="nav-item"><a href="dell.php" class="nav-link brand-glow apple-title"><h5>DELL</h5></a></li>
            <li class="nav-item"><a href="macbook.php" class="nav-link brand-glow apple-title"><h5>MacBook</h5></a></li>
        </ul>
        <ul class="navbar-nav text-center">
            <li class="nav-item bg-info"><a href="#" class="nav-link text-light"><h3>Headphones</h3></a></li>
            <li class="nav-item"><a href="boat.php" class="nav-link brand-glow apple-title"><h5>boAT</h5></a></li>
            <li class="nav-item"><a href="oneplusbud.php" class="nav-link brand-glow apple-title"><h5>OnePlus</h5></a></li>
            <li class="nav-item"><a href="boult.php" class="nav-link brand-glow apple-title"><h5>Boult</h5></a></li>
        </ul>
    </div> -->
</div>

<!-- Footer -->
<div class="custom-footer p-3 text-center">
    <p>All rights reserved. Designed by <span style="color:blue;">Deepak Kumar Singh and Manoj</span></p>
</div>

</div>
<script>
function toggleDesc(id) {
    var shortText = document.getElementById("short_" + id);
    var fullText = document.getElementById("full_" + id);

    if (shortText.style.display === "none") {
        shortText.style.display = "inline";
        fullText.style.display = "none";
    } else {
        shortText.style.display = "none";
        fullText.style.display = "inline";
    }
}
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
