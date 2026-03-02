<?php
include '../../config.php';
session_start();

if (isset($_POST['pay']) && isset($_SESSION['booking_id'])) {
    $booking_id = $_SESSION['booking_id'];

    // Mock success - update status to 'Paid'
    $update_status = "UPDATE `book_form` SET status = 'Paid' WHERE id = '$booking_id'";
    mysqli_query($connection, $update_status);

    unset($_SESSION['booking_id']); // Clear it after use

    $_SESSION['success_message'] = "Payment successful! Your booking is confirmed and status is 'Paid'.";
    header('location:book.php');
    exit();
}
else {
    header('location:book.php');
    exit();
}
?>
