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

    // ✅ Ensure delivery fees user-wise (keep same behavior but separated)
    if (!isset($_SESSION['delivery_fees']) || !is_array($_SESSION['delivery_fees'])) {
        $_SESSION['delivery_fees'] = [];
    }
    if (!isset($_SESSION['delivery_fees'][$user_id]) || !is_array($_SESSION['delivery_fees'][$user_id])) {
        $_SESSION['delivery_fees'][$user_id] = [];
    }

    $product_key = 'samsung_' . (int)$_GET['add_to_cart'];

    // ✅ If already in cart, increase qty
    if (isset($_SESSION['cart'][$user_id][$product_key])) {
        $_SESSION['cart'][$user_id][$product_key]['quantity'] += 1;
    } else {
        $raw_id = (int)str_replace('samsung_', '', $product_key);

        $stmt = $conn->prepare("SELECT * FROM sum_products WHERE id = ? AND deleted_by_admin = 0");
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

            // ✅ delivery fee stored separately (user-wise)
            $_SESSION['delivery_fees'][$user_id][$product_key] = rand(10, 100);
        }
        $stmt->close();
    }

    // 👇 Redirect condition based on whether it's "Buy Now"
    if (isset($_GET['buy_now']) && $_GET['buy_now'] == 1) {
        header("Location: cart.php");
    } else {
        header("Location: samsung.php");
    }
    exit();
}

  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Online Super Market - Samsung</title>
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
      <div class="modal-content" style="background-color:rgb(243, 231, 231); color:rgb(47, 8, 8); border: 2px solid rgb(251, 249, 249);">
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
    <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
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
<br>

<?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
  <div class="container mt-3">
    <div class="alert alert-success">Products deleted successfully.</div>
  </div>
<?php endif; ?>

<!-- Second Navbar -->
<!-- <nav class="navbar navbar-expand-lg navbar-light bg-light p-0">
    <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link" href="index.php">Welcome Guest</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php">Logout</a></li>
    </ul>
</nav> -->

<!-- Products Section -->

<?php if ($delete_mode): ?>
  <div class="container my-3">
    <form id="bulkDeleteForm" method="POST" action="delete_selected_products.php">
      <input type="hidden" name="selected_ids" id="selected_ids">
      <input type="hidden" name="table" value="sum_products">
      <input type="hidden" name="redirect_page" value="samsung.php">

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

<div class="row px-1">
    <div class="col-md-10 px-3">
        <div class="row px-4 py-4">
            <?php
            $query = "SELECT * FROM sum_products WHERE brand = 'samsung' AND deleted_by_admin = 0";
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
                        <h4>₹<?php echo number_format((float)$row['price']); ?></h4>
                        <h6>
                            M.R.P: ₹<s><?php echo number_format((float)$row['mrp']); ?></s>
                            (<?php echo (int)round(100 - ($row['price'] / ($row['mrp'] ?: 1)) * 100); ?>% off)
                        </h6>

                        <?php if (!$delete_mode): ?>
                          <a href="samsung.php?add_to_cart=<?php echo (int)$row['id']; ?>" class="btn btn-info">Add to Cart</a>
                          <a href="samsung.php?add_to_cart=<?php echo (int)$row['id']; ?>&buy_now=1" class="btn btn-success">Buy Now</a>
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
