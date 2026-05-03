<?php
session_start();
include 'db.php';
include 'user_profile_data.php';

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

    $product_key = 'xiaomi_' . (int)$_GET['add_to_cart'];

    // ✅ If already in cart, increase qty
    if (isset($_SESSION['cart'][$user_id][$product_key])) {
        $_SESSION['cart'][$user_id][$product_key]['quantity'] += 1;
    } else {
        $raw_id = (int)str_replace('xiaomi_', '', $product_key);

        $stmt = $conn->prepare("SELECT * FROM xiaomi_products WHERE id = ? AND deleted_by_admin = 0");
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

    // 👇 Redirect condition based on whether it's "Buy Now"
    if (isset($_GET['buy_now']) && $_GET['buy_now'] == 1) {
        header("Location: cart.php");
    } else {
        header("Location: xiaomi.php");
    }
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Online Super Market - xiaomi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    
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
        <?php if (($_SESSION['role'] ?? '') !== 'admin'): ?>
  <li class="nav-item">
    <a class="nav-link nav-glow" href="home.php">Home</a>
  </li>
<?php endif; ?>
        <?php if (($_SESSION['role'] ?? '') === 'admin'): ?>
          <li class="nav-item"><a class="nav-link nav-glow" href="admin_dashboard.php">Admin</a></li>
           <li class="nav-item">
          <a href="<?php echo $delete_mode ? 'home.php?delete_mode=1' : 'home.php'; ?>" class="nav-link nav-glow" >Home</a>
        </li>
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

  <!-- Profile (ONLY ONE ICON) -->
      <div class="dropdown">
        <a class="nav-link fw-bold nav-glow dropdown-custom" href="#"
           role="button" data-bs-toggle="dropdown">
          <?php if (!empty($profile_image)): ?>
    <img src="uploads/<?php echo $profile_image; ?>" class="profile-img">
<?php else: ?>
    <div class="nav-avatar">
        <?php echo strtoupper($first_name[0] ?? 'U'); ?>
    </div>
<?php endif; ?>
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

  <!-- Home Dropdown -->
  <div class="dropdown">
  <button class="btn btn-info dropdown-toggle text-dark fw-bold nav-glow dropdown-custom" data-bs-toggle="dropdown">
    Home
  </button>

  <ul class="dropdown-menu dropdown-glass">
<ul class="navbar-nav me-auto">
        <?php if (($_SESSION['role'] ?? '') !== 'admin'): ?>
  <li>
    <a class="dropdown-item nav-glow" href="home.php">Home</a>
  </li>
<?php endif; ?>
    <?php if (($_SESSION['role'] ?? '') === 'admin'): ?>
         <li><a class="dropdown-item nav-glow" href="admin_dashboard.php">Admin</a></li>
          <li>
          <a href="<?php echo $delete_mode ? 'home.php?delete_mode=1' : 'home.php'; ?>" class="dropdown-item nav-glow" >Home</a>
        </li>
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

    <!-- ✅ PROFILE (DESKTOP ONLY) -->
<li class="nav-item dropdown mx-3 profile-desktop">
  <a class="nav-link nav-glow fw-bold"
     href="#"
     role="button"
     data-bs-toggle="dropdown">

    <?php if (!empty($profile_image)): ?>
    <img src="uploads/<?php echo $profile_image; ?>" class="profile-img">
<?php else: ?>
    <div class="nav-avatar">
        <?php echo strtoupper($first_name[0] ?? 'U'); ?>
    </div>
<?php endif; ?>
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
</li>
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
          <li><a class="dropdown-item nav-glow" href="<?php echo $delete_mode ? 'hp.php?delete_mode=1' : 'hp.php'; ?>">HP</a></li>
          <li><a class="dropdown-item nav-glow" href="<?php echo $delete_mode ? 'dell.php?delete_mode=1' : 'dell.php'; ?>">Dell</a></li>
          <li><a class="dropdown-item nav-glow" href="<?php echo $delete_mode ? 'macbook.php?delete_mode=1' : 'macbook.php'; ?>">MacBook</a></li>
      
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
          <li><a class="dropdown-item nav-glow" href="<?php echo $delete_mode ? 'boat.php?delete_mode=1' : 'boat.php'; ?>">boAT</a></li>
          <li><a class="dropdown-item nav-glow" href="<?php echo $delete_mode ? 'oneplusbud.php?delete_mode=1' : 'oneplusbud  .php'; ?>">OnePlus</a></li>
          <li><a class="dropdown-item nav-glow" href="<?php echo $delete_mode ? 'boult.php?delete_mode=1' : 'boult.php'; ?>">Boult</a></li>
      
        </ul>
      </li>

    </ul>

  </div>
</nav>

<?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
  <div class="container mt-3">
    <div class="alert alert-success">Products deleted successfully.</div>
  </div>
<?php endif; ?>


<!-- Products delete Section -->
<?php if ($delete_mode): ?>
  <div class="container my-3">
    <form id="bulkDeleteForm" method="POST" action="delete_selected_products.php">
      <input type="hidden" name="selected_ids" id="selected_ids">
      <input type="hidden" name="table" value="xiaomi_products">
      <input type="hidden" name="redirect_page" value="xiaomi.php">

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

<!-- Products Section -->
<div class="row px-1">
    <div class="col-md-10 px-3">
        <div class="row px-4 py-4">
            <?php
            $query = "SELECT * FROM xiaomi_products WHERE brand = 'Xiaomi' AND deleted_by_admin = 0";
            $result = $conn->query($query);
            while ($row = $result->fetch_assoc()):
            ?>
            <div class="col-md-3 mb-4">
            <div class="card h-100 product-card <?php if ($highlight_id == $row['id']) echo 'border border-warning border-3'; ?>">

                    <?php if ($delete_mode): ?>
                      <div class="checkbox-box">
                        <input type="checkbox"
                               class="product-checkbox"
                               value="<?php echo (int)$row['id']; ?>"
                               onchange="updateSelectedProducts()">
                      </div>
                    <?php endif; ?>

                    <img src="image/<?php echo htmlspecialchars($row['image']); ?>" 
     class="product-img mx-auto d-block"
     style="cursor:pointer;"
     onclick="openImageModal(this.src)"
     alt="<?php echo htmlspecialchars($row['name']); ?>">
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
  <a href="xiaomi.php?add_to_cart=<?php echo (int)$row['id']; ?>" 
   class="btn btn-info btn-hover">
   Add to Cart
</a>

<a href="xiaomi.php?add_to_cart=<?php echo (int)$row['id']; ?>&buy_now=1" 
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
<div id="imageModal" class="image-modal">
    <span class="close-btn" onclick="closeImageModal()">&times;</span>
    <img id="modalImg">
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
<script>
function openImageModal(src) {
    document.getElementById("imageModal").style.display = "block";
    document.getElementById("modalImg").src = src;
}

function closeImageModal() {
    document.getElementById("imageModal").style.display = "none";
}

// Click outside to close
window.onclick = function(event) {
    let modal = document.getElementById("imageModal");
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
</body>
</html>