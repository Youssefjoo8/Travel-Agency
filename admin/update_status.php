<?php
include '../config.php';

if (isset($_POST['update'])) {
    $booking_id = $_POST['booking_id'];
    $status = $_POST['status'];

    $update_query = "UPDATE `book_form` SET status = '$status' WHERE id = '$booking_id'";
    mysqli_query($connection, $update_query);

    header('location:dashboard.php');
}
else {
    header('location:dashboard.php');
}
?>
