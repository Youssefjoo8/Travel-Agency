<?php
include 'config.php';

echo "<h2>Checking database configuration for Travel Agency...</h2>";

// Check if package column exists
$check_package = mysqli_query($connection, "SHOW COLUMNS FROM `book_form` LIKE 'package'");
if (mysqli_num_rows($check_package) == 0) {
    // Column doesn't exist, let's create it
    $add_package = "ALTER TABLE `book_form` ADD `package` VARCHAR(255) NULL AFTER `leaving`";
    if (mysqli_query($connection, $add_package)) {
        echo "<p style='color:green;'>Success: Added 'package' column to book_form table.</p>";
    }
    else {
        echo "<p style='color:red;'>Error adding 'package' column: " . mysqli_error($connection) . "</p>";
    }
}
else {
    echo "<p style='color:blue;'>Info: 'package' column already exists.</p>";
}

// Check if price column exists
$check_price = mysqli_query($connection, "SHOW COLUMNS FROM `book_form` LIKE 'price'");
if (mysqli_num_rows($check_price) == 0) {
    // Column doesn't exist, let's create it
    $add_price = "ALTER TABLE `book_form` ADD `price` VARCHAR(255) NULL AFTER `package`";
    if (mysqli_query($connection, $add_price)) {
        echo "<p style='color:green;'>Success: Added 'price' column to book_form table.</p>";
    }
    else {
        echo "<p style='color:red;'>Error adding 'price' column: " . mysqli_error($connection) . "</p>";
    }
}
else {
    echo "<p style='color:blue;'>Info: 'price' column already exists.</p>";
}

echo "<h3>Database check complete! Pricing tables are configured for book_form.</h3>";
?>
