<?php
session_start();
include 'config.php';

header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Unauthorized access.']);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $booking_id = isset($_POST['booking_id']) ? mysqli_real_escape_string($connection, $_POST['booking_id']) : '';
    $new_status = isset($_POST['status']) ? mysqli_real_escape_string($connection, $_POST['status']) : '';

    if (empty($booking_id) || empty($new_status)) {
        echo json_encode(['success' => false, 'message' => 'Missing required data.']);
        exit();
    }

    // Update the booking status
    $query = "UPDATE book_form SET status = '$new_status' WHERE id = '$booking_id'";

    if (mysqli_query($connection, $query)) {
        echo json_encode(['success' => true, 'booking_id' => $booking_id, 'message' => 'Status updated successfully.']);
    }
    else {
        echo json_encode(['success' => false, 'message' => 'Database error: ' . mysqli_error($connection)]);
    }
}
else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
?>
