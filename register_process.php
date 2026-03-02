<?php
session_start();
include 'config.php';

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        echo json_encode(['success' => false, 'message' => 'Please fill in all fields.']);
        exit();
    }

    // Check if email already exists
    $check_query = "SELECT * FROM users WHERE email = '$email'";
    $check_result = mysqli_query($connection, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        echo json_encode(['success' => false, 'message' => 'Email already registered.']);
        exit();
    }

    // Hash password and insert user
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $user_type = 'user'; // Automatically assigned as 'user'

    $insert_query = "INSERT INTO users (email, password, user_type) VALUES ('$email', '$hashed_password', '$user_type')";

    if (mysqli_query($connection, $insert_query)) {
        $user_id = mysqli_insert_id($connection);

        // Auto-login after registration
        $_SESSION['user_id'] = $user_id;
        $_SESSION['email'] = $email;
        $_SESSION['user_type'] = $user_type;

        echo json_encode([
            'success' => true,
            'message' => 'Registration successful!',
            'redirect' => 'pages/en/home.php'
        ]);
        exit();
    }
    else {
        echo json_encode(['success' => false, 'message' => 'Registration failed: ' . mysqli_error($connection)]);
        exit();
    }
}
else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
    exit();
}
?>
