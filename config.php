<?php
// Database Configuration
// Update these values with your hosting provider's credentials
$db_host = '********'; // ⚠️ TODO: Update with MySQL Hostname from Control Panel
$db_user = '******';
$db_pass = '******';
$db_name = '******'; // ⚠️ TODO: Configuration required: Check exact DB name in Control Panel

// Enable error reporting for debugging (Remove in production if security is a concern)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$db_host = '*******88'; // ⚠️ TODO: REPLACE WITH ACTUAL HOSTNAME (e.g. sql100.infinityfree.com)
$db_user = '*******';
$db_pass = '********';
$db_name = '*********'; // Confirmed by user

$connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$connection) {
    // This will print the error clearly
    die("Database Connection Failed: " . mysqli_connect_error());
}
?>
