<?php
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Unauthorized']);
    exit();
}

include 'config.php';

$user_id = $_SESSION['user_id'];
$booking_id = isset($_POST['booking_id']) ? mysqli_real_escape_string($connection, $_POST['booking_id']) : '';
$rating = isset($_POST['rating']) ? (int)$_POST['rating'] : 0;
$comment = isset($_POST['comment']) ? mysqli_real_escape_string($connection, trim($_POST['comment'])) : '';

if (empty($booking_id) || $rating < 1 || $rating > 5) {
    echo json_encode(['success' => false, 'message' => 'Invalid data provided. Please select a star rating.']);
    exit();
}

// Check if review already exists
$check_query = "SELECT id FROM reviews WHERE booking_id = '$booking_id' AND user_id = '$user_id'";
$check_res = mysqli_query($connection, $check_query);

if (mysqli_num_rows($check_res) > 0) {
    echo json_encode(['success' => false, 'message' => 'You have already submitted a review for this trip.']);
    exit();
}

// Insert new review
$insert_query = "INSERT INTO reviews (user_id, booking_id, rating, comment) VALUES ('$user_id', '$booking_id', '$rating', '$comment')";

if (mysqli_query($connection, $insert_query)) {
    echo json_encode(['success' => true, 'message' => 'Thank you for your feedback!']);
}
else {
    // If table doesn't exist, create it on the fly and try again
    if (mysqli_errno($connection) == 1146) {
        $create_table = "CREATE TABLE IF NOT EXISTS `reviews` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `user_id` int(11) NOT NULL,
            `booking_id` int(11) NOT NULL,
            `rating` int(1) NOT NULL,
            `comment` text DEFAULT NULL,
            `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
            PRIMARY KEY (`id`)
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

        mysqli_query($connection, $create_table);

        // Retry insert
        if (mysqli_query($connection, $insert_query)) {
            echo json_encode(['success' => true, 'message' => 'Thank you for your feedback!']);
            exit();
        }
    }

    echo json_encode(['success' => false, 'message' => 'Failed to submit review. Database error.']);
}
?>
