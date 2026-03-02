<?php
session_start();
include 'config.php';

header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Unauthorized']);
    exit();
}

$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['booking_id'])) {
    echo json_encode(['success' => false, 'message' => 'Booking ID is required']);
    exit();
}

$booking_id = mysqli_real_escape_string($connection, $data['booking_id']);
$user_email = '';

// verify user owns the booking
$user_id = $_SESSION['user_id'];
$q = "SELECT email FROM users WHERE id = '$user_id'";
$res = mysqli_query($connection, $q);
if ($res && mysqli_num_rows($res) > 0) {
    $user_data = mysqli_fetch_assoc($res);
    $user_email = $user_data['email'];
}
else {
    echo json_encode(['success' => false, 'message' => 'User not found']);
    exit();
}

// verify booking belongs to user
$bq = "SELECT id FROM book_form WHERE id = '$booking_id' AND email = '$user_email'";
$bres = mysqli_query($connection, $bq);

if ($bres && mysqli_num_rows($bres) > 0) {
    // update status
    $uq = "UPDATE book_form SET status = 'Cancelled' WHERE id = '$booking_id'";
    if (mysqli_query($connection, $uq)) {
        echo json_encode(['success' => true, 'message' => 'Booking cancelled successfully']);
    }
    else {
        echo json_encode(['success' => false, 'message' => 'Database error']);
    }
}
else {
    echo json_encode(['success' => false, 'message' => 'Booking not found or not owned by user']);
}

?>
