<?php
session_start();
include 'db.php';

$delete_mode = (
    isset($_GET['delete_mode']) &&
    $_GET['delete_mode'] == '1' &&
    isset($_SESSION['role']) &&
    $_SESSION['role'] === 'admin'
);

$highlight_id = isset($_GET['highlight_id']) ? $_GET['highlight_id'] : null;

// Handle Add to Cart (✅ USER-WISE)
if (isset($_GET['add_to_cart'])) {

    // ✅ Require login before add to cart
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit();
    }

    $user_id = (int)$_SESSION['user_id'];

    // ✅ Ensure user cart exists
    if (!isset($_SESSION['cart']) || !is_array($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    if (!isset($_SESSION['cart'][$user_id]) || !is_array($_SESSION['cart'][$user_id])) {
        $_SESSION['cart'][$user_id] = [];
    }

    // ✅ Ensure delivery fees user-wise
    if (!isset($_SESSION['delivery_fees']) || !is_array($_SESSION['delivery_fees'])) {
        $_SESSION['delivery_fees'] = [];
    }
    if (!isset($_SESSION['delivery_fees'][$user_id]) || !is_array($_SESSION['delivery_fees'][$user_id])) {
        $_SESSION['delivery_fees'][$user_id] = [];
    }

    $product_key = 'apple_' . (int)$_GET['add_to_cart'];

    // ✅ If already in cart, increase qty
    if (isset($_SESSION['cart'][$user_id][$product_key])) {
        $_SESSION['cart'][$user_id][$product_key]['quantity'] += 1;
    } else {
        $raw_id = (int)str_replace('apple_', '', $product_key);

       $stmt = $conn->prepare("SELECT * FROM apple_products WHERE id = ? AND deleted_by_admin = 0");
        $stmt->bind_param("i", $raw_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            $product = $result->fetch_assoc();

            $_SESSION['cart'][$user_id][$product_key] = [
                "name" => $product['name'],
                "price" => (float)$product['price'],
                "image" => $product['image'],
                "quantity" => 1
            ];

            // ✅ set delivery fee for this product (user-wise)
            $_SESSION['delivery_fees'][$user_id][$product_key] = rand(10, 100);
        }
        $stmt->close();
    }

    // Redirect condition based on whether it's "Buy Now"
    if (isset($_GET['buy_now']) && $_GET['buy_now'] == 1) {
        header("Location: cart.php");
    } else {
        header("Location: apple.php");
    }
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Online Super Market - Apple</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">


    <style>
  @media (max-width: 991px){

.products-section_2nav{
overflow: visible !important;
}

.dropdown-menu{
position: absolute !important;
z-index: 99999 !important;
}

}
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

    background-image: url("https://4kwallpapers.com/images/wallpapers/thick-forest-3840x2160-14776.jpg");
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
}

.dropdown-menu-custom .dropdown-item,
.dropdown-glass .dropdown-item{
color: white;
}

.dropdown-menu-custom .dropdown-item:hover,
.dropdown-glass .dropdown-item:hover{
background: rgba(255,255,255,0.2);
color: #ff1493;
}


.navbar.bg-info{
position: relative;
z-index: 10000000;

}
@media (max-width: 768px){
.card-body{
min-height:220px;   /* height kam ya jyada kar sakte ho */
width:70%;     /* card ke andar full width */
padding:10px;
overflow:auto;
margin: 0 auto;
text-align: center;
transition: all 0.3s ease;
}
}
.products-section{
    background: rgba(234, 212, 212, 0.46);
    backdrop-filter: blur(10px);
    padding: 15px;
    border-radius: 20px;
}
.products-section_2nav{
    background: rgba(233, 218, 218, 0.38);
    backdrop-filter: blur(10px);
    padding: 5px;
    border-radius: 20px;
}

</style>

<style>
  .second-nav{
position: relative;
z-index: 9999;
}
        
    .navbar {
   background: rgba(100, 184, 209, 0.53) !important;
    backdrop-filter: blur(1px);
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
     overflow: hidden;
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
    border-radius: 12px;
    border: 1px solid rgba(255,255,255,0.2);
    box-shadow: 0 8px 25px rgba(0,0,0,0.2);
    padding: 8px;
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
      background: transparent !important;
    color: #2020e7ff !important;
    font-weight: bold;
    text-shadow: 0 0 6px #e6dfdfff, 0 0 12px #314180ff;
    transition: 0.3s ease;
    border-radius: 8px;
}

/* Glass Dropdown */
.dropdown-glass {
    background: rgba(152, 137, 137, 0.81) !important;
    backdrop-filter: blur(12px);
    border-radius: 10px;
    border: 1px solid rgba(255,255,255,0.3);
    box-shadow: 0 8px 25px rgba(0,0,0,0.2);
    z-index: 999999;
    position: absolute;
}


.dropdown-glass .dropdown-item {
    background: transparent !important;
    transition: 0.3s ease;
    color: white;
transition: 0.3s;
}

.dropdown-glass .dropdown-item:hover {
    background: rgba(255,255,255,0.2) !important;
    transform: scale(1.05);
    z-index: 99999 !important;
    color: red;
background: rgba(255,255,255,0.15);
}

@media (max-width: 991px) {

    .second-nav .navbar-nav {
        flex-direction: row !important;
        justify-content: center;
        gap: 20px;
    }

}
/* 🔥 Big Premium Checkbox */
.product-checkbox{
  width: 22px;
  height: 22px;
  cursor: pointer;
  accent-color: #00c6ff;
  transform: scale(1.3);
}

/* Checkbox container */
.checkbox-box{
  position: absolute;
  top: 10px;
  right: 10px;
  z-index: 10;
}

/* Card clickable effect */
.product-card{
  position: relative;
  cursor: pointer;
}

/* Selected effect */
.product-card.selected{
  border: 2px solid #00c6ff !important;
  box-shadow: 0 0 20px rgba(0,198,255,0.7);
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
<!-- DESKTOP NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-light d-none d-lg-flex">
  <div class="container-fluid">

    <!-- Logo -->
    <a href="home.php" class="nav-glow">
      <img src="image/logo.png" width="45">
    </a>

    <div class="collapse navbar-collapse show">

      <!-- Left Links -->
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a href="<?php echo $delete_mode ? 'apple.php?delete_mode=1' : 'apple.php'; ?>"class="nav-link nav-glow" >Home</a>
        </li>
        <?php if (($_SESSION['role'] ?? '') === 'admin'): ?>
          <li class="nav-item"><a class="nav-link nav-glow" href="admin_dashboard.php">Admin</a></li>
         <?php endif; ?>
        <li class="nav-item">
          <a class="nav-link nav-glow" href="contact.php">Contact</a>
        </li>
        <?php if (isset($_SESSION['user_id'])): ?>
        <li class="nav-item">
          <a class="nav-link nav-glow" href="login.php">Logout</a>
        </li>
         <?php else: ?>
        <li class="nav-item">
          <a class="nav-link nav-glow" href="ragister.php">Register</a>
        </li>
        <?php endif; ?>
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
          <i class="fa-solid fa-cart-shopping fa-2x" ></i>
          <sup>
            <?php
              $user_id = $_SESSION['user_id'] ?? null;
              if ($user_id && isset($_SESSION['cart'][$user_id])) {
                echo array_sum(array_column($_SESSION['cart'][$user_id], 'quantity'));
             } else {
               echo 0;
             }
          ?>
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

  <ul class="dropdown-menu dropdown-glass">
    <li><a href="<?php echo $delete_mode ? 'apple.php?delete_mode=1' : 'apple.php'; ?>" class="dropdown-item nav-glow" >Home</a></li>
    <?php if (($_SESSION['role'] ?? '') === 'admin'): ?>
         <li><a class="dropdown-item nav-glow" href="admin_dashboard.php">Admin</a></li>
         <?php endif; ?>
    <li><a class="dropdown-item nav-glow" href="contact.php">Contact</a></li>
    <?php if (isset($_SESSION['user_id'])): ?>
    <li><a class="dropdown-item nav-glow" href="login.php">Logout</a></li>
     <?php else: ?>
    <li><a class="dropdown-item nav-glow" href="ragister.php">Register</a></li>
     <?php endif; ?>
    <li><a class="dropdown-item nav-glow" href="complain.php">Complain List</a></li>
    <li><a class="dropdown-item nav-glow" href="order_history.php">Orders</a></li>
  
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
          <i class="fa-solid fa-cart-shopping fa-2x"></i>
          <sup>
            <?php
$user_id = $_SESSION['user_id'] ?? null;
if ($user_id && isset($_SESSION['cart'][$user_id])) {
    echo array_sum(array_column($_SESSION['cart'][$user_id], 'quantity'));
} else {
    echo 0;
}
?>
          </sup>
        </a>

</nav>

<!-- SECOND NAVBAR -->
<nav class="navbar navbar-expand-lg second-nav py-2">
  <div class="container-fluid justify-content-center">

    <ul class="navbar-nav products-section_2nav">

    <!-- Profile (ONLY ONE ICON) -->
      <div class="dropdown">
        <a class="btn btn-info dropdown-toggle text-dark fw-bold nav-glow dropdown-custom" href="#"
           role="button" data-bs-toggle="dropdown">
          <i class="fa-solid fa-circle-user fs-4"></i>
        </a>

        <ul class="dropdown-menu dropdown-glass">
          <?php if (isset($_SESSION['user_id'])): ?>
            <li><a class="dropdown-item nav-glow" href="profile.php">My Profile</a></li>
            <li><a class="dropdown-item nav-glow" href="order_history.php">My Orders</a></li>
            <li><a class="dropdown-item nav-glow" href="complain.php">My Complaints</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item text-danger" href="logout.php">Logout</a></li>
          <?php else: ?>
            <li><a class="dropdown-item nav-glow" href="login.php">Login</a></li>
            <li><a class="dropdown-item nav-glow" href="register.php">Register</a></li>
          <?php endif; ?>
        </ul>
      </div>
      <!-- Mobiles Dropdown -->
      <li class="nav-item dropdown mx-3">
        <a class="nav-link dropdown-toggle nav-glow fw-bold"
           href="#"
           role="button"
           data-bs-toggle="dropdown">
          Mobiles
        </a>
        <ul class="dropdown-menu dropdown-glass">
          <li><a href="<?php echo $delete_mode ? 'apple.php?delete_mode=1' : 'apple.php'; ?>"class="dropdown-item nav-glow" >Apple</a></li>
          <li><a href="<?php echo $delete_mode ? 'samsung.php?delete_mode=1' : 'samsung.php'; ?>" class="dropdown-item nav-glow" >Samsung</a></li>
          <li><a href="<?php echo $delete_mode ? 'xiaomi.php?delete_mode=1' : 'xiaomi.php'; ?>" class="dropdown-item nav-glow" >Xiaomi</a></li>
          <li><a href="<?php echo $delete_mode ? 'oneplus.php?delete_mode=1' : 'oneplus.php'; ?>" class="dropdown-item nav-glow" >OnePlus</a></li>
          
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
          <li><a href="<?php echo $delete_mode ? 'hp.php?delete_mode=1' : 'hp.php'; ?>" class="dropdown-item nav-glow" >HP</a></li>
          <li><a href="<?php echo $delete_mode ? 'dell.php?delete_mode=1' : 'dell.php'; ?>" class="dropdown-item nav-glow" >Dell</a></li>
          <li><a href="<?php echo $delete_mode ? 'macbook.php?delete_mode=1' : 'macbook.php'; ?>" class="dropdown-item nav-glow" >MacBook</a></li>
      
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
          <li><a href="<?php echo $delete_mode ? 'boat.php?delete_mode=1' : 'boat.php'; ?>" class="dropdown-item nav-glow" >boAT</a></li>
          <li><a href="<?php echo $delete_mode ? 'oneplus.php?delete_mode=1' : 'oneplus.php'; ?>" class="dropdown-item nav-glow" >OnePlus</a></li>
          <li><a href="<?php echo $delete_mode ? 'boult.php?delete_mode=1' : 'boult.php'; ?>" class="dropdown-item nav-glow" >Boult</a></li>
      
        </ul>
      </li>

    </ul>

  </div>
</nav>
<!-- Products delete Section  -->
<?php if ($delete_mode): ?>
  <div class="container my-3">
  <form id="bulkDeleteForm" method="POST" action="delete_selected_products.php">
  <input type="hidden" name="selected_ids" id="selected_ids">
  <input type="hidden" name="table" value="apple_products">
  <input type="hidden" name="redirect_page" value="apple.php">
      <div class="d-flex justify-content-between align-items-center bg-light p-3 rounded shadow-sm">
        <div>
          <strong>Admin Delete Mode</strong> |
          Selected: <span id="selectedCount">0</span>
        </div>

        <div class="d-flex gap-2">
          <button type="button" class="btn btn-outline-primary btn-sm" onclick="toggleAllProducts(true)">Select All</button>
          <button type="button" class="btn btn-outline-secondary btn-sm" onclick="toggleAllProducts(false)">Unselect All</button>

          <button type="submit" id="deleteSelectedBtn" class="btn btn-danger btn-sm" style="display:none;"
            onclick="return confirm('Are you sure you want to delete selected products?');">
            Delete Selected
          </button>
        </div>
      </div>
    </form>
  </div>
<?php endif; ?>
<br>

<!-- Products Section -->
<div class="row px-1">
    <div class="col-md-10 col-md-10 px-3">
        <div class="row px-1 py-1">
            <?php
         $query = "SELECT * FROM apple_products WHERE brand = 'Apple' AND deleted_by_admin = 0";
            $result = $conn->query($query);
            while ($row = $result->fetch_assoc()):
            ?>
            <div class="col-12 col-md-3 mb-4">
               <div class="card h-100 product-card <?php if ($highlight_id == $row['id']) echo 'border border-warning border-3'; ?>">

                  <?php if ($delete_mode): ?>
                   <div class="checkbox-box">
                   <input type="checkbox"
                    class="product-checkbox"
                    value="<?php echo (int)$row['id']; ?>"
                    onchange="updateSelectedProducts()">
               </div>
             <?php endif; ?>
                  <img src="image/<?php echo htmlspecialchars($row['image']); ?>" class="product-img mx-auto d-block" alt="<?php echo htmlspecialchars($row['name']); ?>">

                    <div class="card-body products-section">
                        <h5 class="card-title product-name">
    <?php echo htmlspecialchars($row['name']); ?>
</h5>
<?php
$fullDesc = htmlspecialchars($row['description']);
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
                            (<?php echo (int)round(100 - ($row['price'] / ($row['mrp'] ?: 1) * 100)); ?>% off)
                        </h6>
                         <?php if (!$delete_mode): ?>
  <a href="apple.php?add_to_cart=<?php echo (int)$row['id']; ?>" 
   class="btn btn-info btn-hover">
   Add to Cart
</a>

<a href="apple.php?add_to_cart=<?php echo (int)$row['id']; ?>&buy_now=1" 
   class="btn btn-success btn-hover">
   Buy Now
</a>
<?php endif; ?>
                      </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
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
<?php if ($delete_mode): ?>
<script>
function getProductCheckboxes() {
  return document.querySelectorAll('.product-checkbox');
}

function updateSelectedProducts() {
  const checkboxes = getProductCheckboxes();
  const selected = [];

  checkboxes.forEach(cb => {
    if (cb.checked) {
      selected.push(cb.value);
    }
  });

  document.getElementById('selectedCount').textContent = selected.length;
  document.getElementById('selected_ids').value = selected.join(',');
  document.getElementById('deleteSelectedBtn').style.display = selected.length > 0 ? 'inline-block' : 'none';
}

function toggleAllProducts(state) {
  const checkboxes = getProductCheckboxes();
  checkboxes.forEach(cb => cb.checked = state);
  updateSelectedProducts();
}
</script>
<?php endif; ?>
</body>
</html>
