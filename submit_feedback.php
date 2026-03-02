<?php
error_reporting(0);
session_start();
include 'config.php';

header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'User not logged in.']);
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $booking_id = isset($_POST['booking_id']) ? intval($_POST['booking_id']) : 0;
    $rating = isset($_POST['rating']) ? intval($_POST['rating']) : 0;
    $comment = isset($_POST['comment']) ? mysqli_real_escape_string($connection, $_POST['comment']) : '';

    if ($booking_id <= 0 || $rating < 1 || $rating > 5) {
        echo json_encode(['success' => false, 'message' => 'Invalid data. Please provide a rating.']);
        exit();
    }

    // Check if review already exists
    $check_q = "SELECT id FROM reviews WHERE booking_id = '$booking_id' AND user_id = '$user_id'";
    $check_res = mysqli_query($connection, $check_q);
    if (mysqli_num_rows($check_res) > 0) {
        echo json_encode(['success' => false, 'message' => 'You have already reviewed this trip.']);
        exit();
    }

    $q = "INSERT INTO reviews (user_id, booking_id, rating, comment) VALUES ('$user_id', '$booking_id', '$rating', '$comment')";
    if (mysqli_query($connection, $q)) {
        echo json_encode(['success' => true, 'message' => 'Feedback submitted successfully!']);
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
            if (mysqli_query($connection, $q)) {
                echo json_encode(['success' => true, 'message' => 'Feedback submitted successfully!']);
                exit();
            }
        }
        echo json_encode(['success' => false, 'message' => 'Database error: ' . mysqli_error($connection)]);
    }
    exit();
}
else {
    echo json_encode(['success' => false, 'message' => 'Invalid request.']);
    exit();
}
?>
