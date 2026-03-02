<?php
session_start();
session_unset();
session_destroy();
$redirect = "pages/en/home.php";
if (isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], '/ar/') !== false) {
    $redirect = "pages/ar/home arabic.php";
}
header("Location: " . $redirect);
exit();
?>
