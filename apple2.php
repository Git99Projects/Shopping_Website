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
overflow:hidden;
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

    </style>
    <!-- <style>
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
  width: 100%;
  max-width: 180px;
  height: auto;
  object-fit: contain;
  display: block;
  margin: 0 auto;
}
/* Tablet */
@media (max-width: 992px) {
  .product-img {
    max-width: 170px;
  }
}

/* Mobile */
@media (max-width: 576px) {
  .product-img {
    max-width: 140px;
  }
}
  
    </style> -->
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
         <?php if (($_SESSION['role'] ?? '') === 'admin'): ?>
         <li class="nav-item"><a class="nav-link" href="admin_dashboard.php">Admin</a></li>
         <?php endif; ?>
        <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
         <?php if (isset($_SESSION['user_id'])): ?>
         <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
         <?php else: ?>
          <li class="nav-item"><a class="nav-link" href="ragister.php">Register</a></li>
         <?php endif; ?>
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
         $query = "SELECT * FROM apple_products WHERE brand = 'Apple' AND deleted_by_admin = 0";
            $result = $conn->query($query);
            while ($row = $result->fetch_assoc()):
            ?>
            <div class="col-md-3 mb-4">
               <div class="card h-100 product-card <?php if ($highlight_id == $row['id']) echo 'border border-warning border-3'; ?>">

                  <?php if ($delete_mode): ?>
                   <div class="text-end p-2">
                   <input type="checkbox"
                    class="product-checkbox"
                    value="<?php echo (int)$row['id']; ?>"
                    onchange="updateSelectedProducts()">
               </div>
             <?php endif; ?>
                  <img src="image/<?php echo htmlspecialchars($row['image']); ?>" class="product-img mx-auto d-block" alt="<?php echo htmlspecialchars($row['name']); ?>">

                    <div class="card-body">
                     <h5 class="card-title"><?php echo htmlspecialchars($row['name']); ?></h5>
                      <p class="card-text"><?php echo htmlspecialchars($row['description']); ?></p>
                        <h4>₹<?php echo number_format($row['price']); ?></h4>
                        <h6>
                            M.R.P: ₹<s><?php echo number_format($row['mrp']); ?></s>
                           (<?php echo (int)round(100 - ($row['price'] / ($row['mrp'] ?: 1)) * 100); ?>% off)
                        </h6>
                        <?php if (!$delete_mode): ?>
                        <a href="apple.php?add_to_cart=<?php echo (int)$row['id']; ?>" class="btn btn-info">Add to Cart</a>
                        <a href="apple.php?add_to_cart=<?php echo (int)$row['id']; ?>&buy_now=1" class="btn btn-success">Buy Now</a>
                      <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="col-md-2 bg-secondary p-0">
      <ul class="navbar-nav text-center">
    <li class="nav-item bg-info">
        <a href="#" class="nav-link text-light"><h2>Mobiles</h2></a>
    </li>

    <li class="nav-item">
        <a href="<?php echo $delete_mode ? 'apple.php?delete_mode=1' : 'apple.php'; ?>" class="nav-link text-light">
            <h5>Apple</h5>
        </a>
    </li>

    <li class="nav-item">
        <a href="<?php echo $delete_mode ? 'samsung.php?delete_mode=1' : 'samsung.php'; ?>" class="nav-link text-light">
            <h5>Samsung</h5>
        </a>
    </li>

    <li class="nav-item">
        <a href="<?php echo $delete_mode ? 'xiaomi.php?delete_mode=1' : 'xiaomi.php'; ?>" class="nav-link text-light">
            <h5>Xiaomi</h5>
        </a>
    </li>

    <li class="nav-item">
        <a href="<?php echo $delete_mode ? 'oneplus.php?delete_mode=1' : 'oneplus.php'; ?>" class="nav-link text-light">
            <h5>OnePlus</h5>
        </a>
    </li>
</ul>


<ul class="navbar-nav text-center">
    <li class="nav-item bg-info">
        <a href="#" class="nav-link text-light"><h2>Laptops</h2></a>
    </li>

    <li class="nav-item">
        <a href="<?php echo $delete_mode ? 'hp.php?delete_mode=1' : 'hp.php'; ?>" class="nav-link text-light">
            <h5>HP</h5>
        </a>
    </li>

    <li class="nav-item">
        <a href="<?php echo $delete_mode ? 'dell.php?delete_mode=1' : 'dell.php'; ?>" class="nav-link text-light">
            <h5>DELL</h5>
        </a>
    </li>

    <li class="nav-item">
        <a href="<?php echo $delete_mode ? 'macbook.php?delete_mode=1' : 'macbook.php'; ?>" class="nav-link text-light">
            <h5>MacBook</h5>
        </a>
    </li>
</ul>


<ul class="navbar-nav text-center">
    <li class="nav-item bg-info">
        <a href="#" class="nav-link text-light"><h3>Headphones</h3></a>
    </li>

    <li class="nav-item">
        <a href="<?php echo $delete_mode ? 'boat.php?delete_mode=1' : 'boat.php'; ?>" class="nav-link text-light">
            <h5>boAT</h5>
        </a>
    </li>

    <li class="nav-item">
        <a href="<?php echo $delete_mode ? 'oneplusbud.php?delete_mode=1' : 'oneplusbud.php'; ?>" class="nav-link text-light">
            <h5>OnePlus</h5>
        </a>
    </li>

    <li class="nav-item">
        <a href="<?php echo $delete_mode ? 'boult.php?delete_mode=1' : 'boult.php'; ?>" class="nav-link text-light">
            <h5>Boult</h5>
        </a>
    </li>
</ul>
    </div>
</div>

<!-- Footer -->
<div class="bg-info p-3 text-center">
    <p>All rights reserved. Designed by <span style="color:blue;">Deepak Kumar Singh and Manoj</span></p>
</div>

</div>
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
