<?php
include 'auth_admin.php';
include 'db.php';

// List of all tables to check
$tables = [
    'home_products',
    'apple_products',
    'sum_products',
    'xiaomi_products',
    'oneplus_products',
    'hp_products',
    'dell_products',
    'macbook_products',
    'boat_products',
    'oneplusbud_products',
    'boult_products'
];

$queries = [];
$result = false;

foreach ($tables as $table) {
    $checkTable = $conn->query("SHOW TABLES LIKE '$table'");

    if ($checkTable && $checkTable->num_rows > 0) {
        $queries[] = "SELECT id, name, price, image, '$table' AS table_name
                      FROM $table
                      WHERE deleted_by_admin = 1";
    }
}

if (!empty($queries)) {
    $final_query = implode(" UNION ALL ", $queries) . " ORDER BY id DESC";
    $result = $conn->query($final_query);

    if (!$result) {
        die("SQL Error: " . $conn->error);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Restore Products</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <style>
    body {
      background: #f8f9fa;
    }
    .page-box {
      background: #fff;
      border-radius: 12px;
      padding: 25px;
      margin-top: 30px;
      margin-bottom: 30px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.08);
    }
    .product-img {
      width: 70px;
      height: 70px;
      object-fit: contain;
      border-radius: 8px;
      border: 1px solid #ddd;
      background: #fff;
    }
    .table th, .table td {
      text-align: center;
      vertical-align: middle;
    }
    #restoreBtn {
      display: none;
    }
    .hide-id{
    display:none;
}
  </style>
</head>
<body>

<div class="container">
  <div class="page-box">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2 class="m-0"><i class="fa-solid fa-rotate-left text-success me-2"></i>Restore Deleted Products</h2>
      <a href="admin_dashboard.php" class="btn btn-secondary">⬅️ Back</a>
    </div>

    <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
      <div class="alert alert-success">Products restored successfully.</div>
    <?php endif; ?>

    <form method="POST" action="restore_selected_products.php" onsubmit="return confirmRestore();">
      <input type="hidden" name="selected_ids" id="selected_ids">

      <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
        <div>
          <button type="button" class="btn btn-outline-primary btn-sm" onclick="toggleAll(true)">Select All</button>
          <button type="button" class="btn btn-outline-secondary btn-sm" onclick="toggleAll(false)">Unselect All</button>
        </div>

        <div class="d-flex align-items-center gap-2">
          <span class="fw-bold">Selected: <span id="selectedCount">0</span></span>
          <button type="submit" id="restoreBtn" class="btn btn-success btn-sm">
            <i class="fa-solid fa-rotate-left me-1"></i> Restore Selected
          </button>
        </div>
      </div>

      <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
          <thead class="table-dark">
            <tr>
              <th><input type="checkbox" id="mainCheckbox" onclick="handleMainCheckbox(this)"></th>
              <th class="hide-id">ID</th>
              <th>Image</th>
              <th>Name</th>
              <th>Price</th>
              <th>Table</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($result && $result->num_rows > 0): ?>
              <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                  <td>
                    <input type="checkbox"
                           class="product-checkbox"
                           value="<?php echo $row['table_name'] . ':' . (int)$row['id']; ?>"
                           onchange="updateSelected()">
                  </td>
                  <td><?php echo (int)$row['id']; ?></td>
                  <td>
                    <?php if (!empty($row['image'])): ?>
                      <img src="image/<?php echo htmlspecialchars($row['image']); ?>" class="product-img" alt="">
                    <?php else: ?>
                      No Image
                    <?php endif; ?>
                  </td>
                  <td><?php echo htmlspecialchars($row['name'] ?? ''); ?></td>
                  <td>₹<?php echo number_format((float)($row['price'] ?? 0), 2); ?></td>
                  <td><?php echo htmlspecialchars($row['table_name'] ?? ''); ?></td>
                </tr>
              <?php endwhile; ?>
            <?php else: ?>
              <tr>
                <td colspan="6" class="text-center text-muted">No deleted products found.</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </form>
  </div>
</div>

<script>
function getCheckboxes() {
  return document.querySelectorAll('.product-checkbox');
}

function updateSelected() {
  const checkboxes = getCheckboxes();
  const selected = [];

  checkboxes.forEach(cb => {
    if (cb.checked) selected.push(cb.value);
  });

  document.getElementById('selectedCount').textContent = selected.length;
  document.getElementById('selected_ids').value = selected.join(',');
  document.getElementById('restoreBtn').style.display = selected.length > 0 ? 'inline-block' : 'none';

  const main = document.getElementById('mainCheckbox');
  main.checked = (checkboxes.length > 0 && selected.length === checkboxes.length);
}

function toggleAll(state) {
  const checkboxes = getCheckboxes();
  checkboxes.forEach(cb => cb.checked = state);
  updateSelected();
}

function handleMainCheckbox(source) {
  toggleAll(source.checked);
}

function confirmRestore() {
  const count = parseInt(document.getElementById('selectedCount').textContent, 10);
  if (count === 0) {
    alert('Please select at least one product.');
    return false;
  }
  return confirm('Are you sure you want to restore selected products?');
}
</script>

</body>
</html>