<?php
include 'auth_admin.php';
include 'db.php';

/* change table name / column names here if needed */
$result = $conn->query("SELECT * FROM products ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Manage Website Products</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

  <style>
    body {
      background: #f4f6f9;
      font-family: Arial, sans-serif;
    }
    .topbar {
      background: #0dcaf0;
      padding: 15px 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
    }
    .page-box {
      background: #fff;
      border-radius: 12px;
      padding: 25px;
      margin: 30px auto;
      box-shadow: 0 5px 15px rgba(0,0,0,0.08);
    }
    .product-img {
      width: 70px;
      height: 70px;
      object-fit: cover;
      border-radius: 8px;
      border: 1px solid #ddd;
    }
    .table th, .table td {
      text-align: center;
      vertical-align: middle;
    }
    #deleteSelectedBtn {
      display: none;
    }
  </style>
</head>
<body>

<div class="topbar">
  <h4 class="m-0"><i class="fa-solid fa-box me-2"></i>Delete Website Products</h4>

  <div class="d-flex gap-2 align-items-center">
    <span class="fw-bold">Selected: <span id="selectedCount">0</span></span>

    <form id="deleteFormTop" method="POST" action="delete_selected_products.php" class="m-0">
      <input type="hidden" name="selected_ids" id="selected_ids">
      <button type="submit" id="deleteSelectedBtn" class="btn btn-danger"
        onclick="return confirm('Are you sure you want to delete selected website products?');">
        <i class="fa-solid fa-trash me-1"></i> Delete Selected
      </button>
    </form>

    <a href="admin_dashboard.php" class="btn btn-secondary">⬅️ Back</a>
  </div>
</div>

<div class="container">
  <div class="page-box">

    <div class="mb-3 d-flex gap-2">
      <button type="button" class="btn btn-outline-primary btn-sm" onclick="toggleAll(true)">Select All</button>
      <button type="button" class="btn btn-outline-secondary btn-sm" onclick="toggleAll(false)">Unselect All</button>
    </div>

    <div class="table-responsive">
      <table class="table table-bordered table-hover">
        <thead class="table-dark">
          <tr>
            <th><input type="checkbox" id="mainCheckbox" onclick="handleMainCheckbox(this)"></th>
            <th>ID</th>
            <th>Image</th>
            <th>Product Name</th>
            <th>Price</th>
          </tr>
        </thead>
        <tbody>
          <?php if ($result && $result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
              <tr>
                <td>
                  <input type="checkbox"
                         class="product-checkbox"
                         value="<?php echo (int)$row['id']; ?>"
                         onchange="updateSelectedProducts()">
                </td>
                <td><?php echo (int)$row['id']; ?></td>
                <td>
                  <?php if (!empty($row['product_image'])): ?>
                    <img src="image/<?php echo htmlspecialchars($row['product_image']); ?>" class="product-img" alt="">
                  <?php else: ?>
                    No Image
                  <?php endif; ?>
                </td>
                <td><?php echo htmlspecialchars($row['product_name']); ?></td>
                <td>₹<?php echo number_format((float)$row['product_price'], 2); ?></td>
              </tr>
            <?php endwhile; ?>
          <?php else: ?>
            <tr>
              <td colspan="5" class="text-center text-muted">No products found.</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>

  </div>
</div>

<script>
function getCheckboxes() {
  return document.querySelectorAll('.product-checkbox');
}

function updateSelectedProducts() {
  const checkboxes = getCheckboxes();
  let selected = [];

  checkboxes.forEach(cb => {
    if (cb.checked) {
      selected.push(cb.value);
    }
  });

  document.getElementById('selectedCount').textContent = selected.length;
  document.getElementById('selected_ids').value = selected.join(',');
  document.getElementById('deleteSelectedBtn').style.display = selected.length > 0 ? 'inline-block' : 'none';

  const mainCheckbox = document.getElementById('mainCheckbox');
  mainCheckbox.checked = (checkboxes.length > 0 && selected.length === checkboxes.length);
}

function toggleAll(state) {
  const checkboxes = getCheckboxes();
  checkboxes.forEach(cb => cb.checked = state);
  updateSelectedProducts();
}

function handleMainCheckbox(source) {
  toggleAll(source.checked);
}
</script>

</body>
</html>