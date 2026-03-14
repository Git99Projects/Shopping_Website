<?php
include 'auth_admin.php';
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['selected_ids'])) {
    $combined_ids = explode(',', $_POST['selected_ids']);
    
    // Allowed tables for security validation
    $allowed_tables = [
        'home_products', 'apple_products', 'sum_products', 'xiaomi_products', 
        'oneplus_products', 'hp_products', 'dell_products', 'macbook_products', 
        'boat_products', 'oneplusbud_products', 'boult_products'
    ];

    foreach ($combined_ids as $item) {
        // Split 'apple_products:5' into ['apple_products', '5']
        $parts = explode(':', $item);
        
        if (count($parts) === 2) {
            $table = $parts[0];
            $id = (int)$parts[1];

            // Validate table name against allowed list [cite: 34]
            if (in_array($table, $allowed_tables)) {
                $stmt = $conn->prepare("UPDATE $table SET deleted_by_admin = 0 WHERE id = ?");
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $stmt->close();
            }
        }
    }
    header("Location: restore_products.php?success=1");
    exit();
}