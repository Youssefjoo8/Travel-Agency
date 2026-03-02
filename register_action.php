<?php
session_start();
include 'config.php';

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = mysqli_real_escape_string($connection, $_POST['full_name']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $phone_number = mysqli_real_escape_string($connection, $_POST['phone_number']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if (empty($full_name) || empty($email) || empty($phone_number) || empty($password) || empty($confirm_password)) {
        echo json_encode(['success' => false, 'message' => 'Please fill in all fields.']);
        exit();
    }

    if ($password !== $confirm_password) {
        echo json_encode(['success' => false, 'message' => 'Passwords do not match.']);
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
    $user_type = 'user'; // Hardcoded as 'user' as requested

    $insert_query = "INSERT INTO users (full_name, email, phone, password, user_type) VALUES ('$full_name', '$email', '$phone_number', '$hashed_password', '$user_type')";

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
