<?php
include 'db.php';

$search = isset($_GET['search']) ? trim($_GET['search']) : '';

if (empty($search)) {
    header("Location: home.php");
    exit();
}

// Convert full search string to lowercase and escaped
$search_term = "%" . strtolower($conn->real_escape_string($search)) . "%";

// Break search into keywords
$keywords = array_filter(explode(" ", strtolower($search)));

// List of tables and their corresponding PHP page
$brand_tables = [
    'apple' => 'products',
    'samsung' => 'sum_products',
    'oneplus' => 'oneplus_products',
    'xiaomi' => 'xiaomi_products',
    'hp' => 'hp_products',
    'dell' => 'dell_products',
    'macbook' => 'macbook_products',
    'boat' => 'boat_products',
    'boult' => 'boult_products',
    'oneplusbud' => 'oneplusbud_products'
];

// 🔍 Step 1: Try full phrase search first
foreach ($brand_tables as $brand => $table) {
    $stmt = $conn->prepare("SELECT id FROM `$table` WHERE LOWER(name) LIKE ? OR LOWER(description) LIKE ? LIMIT 1");
    $stmt->bind_param("ss", $search_term, $search_term);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        $id = $row['id'];
        header("Location: {$brand}.php?highlight_id=$id");
        exit();
    }
}

// 🔁 Step 2: Try keyword-based search if full search fails
foreach ($keywords as $word) {
    $partial_term = "%" . $conn->real_escape_string($word) . "%";
    
    foreach ($brand_tables as $brand => $table) {
        $stmt = $conn->prepare("SELECT id FROM `$table` WHERE LOWER(name) LIKE ? OR LOWER(description) LIKE ? LIMIT 1");
        $stmt->bind_param("ss", $partial_term, $partial_term);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            $id = $row['id'];
            header("Location: {$brand}.php?highlight_id=$id");
            exit();
        }
    }
}

// ❌ Not found anywhere
header("Location: home.php?notfound=1");
exit();
?>
