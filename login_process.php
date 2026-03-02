<?php
session_start();
include 'config.php';

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login_id = mysqli_real_escape_string($connection, $_POST['login_id'] ?? $_POST['email']);
    $password = $_POST['password'];

    if (empty($login_id) || empty($password)) {
        echo json_encode(['success' => false, 'message' => 'Please fill in all fields.']);
        exit();
    }

    $stmt = $connection->prepare("SELECT * FROM users WHERE email = ? OR phone = ?");
    $stmt->bind_param("ss", $login_id, $login_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['full_name'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['user_type'] = $user['user_type'];

            $redirect_url = 'pages/en/home.php';
            if ($user['user_type'] == 'admin') {
                $redirect_url = 'admin/dashboard.php';
            }

            echo json_encode([
                'success' => true,
                'user_type' => $user['user_type'],
                'redirect' => $redirect_url
            ]);
            exit();
        }
        else {
            echo json_encode(['success' => false, 'message' => 'Invalid password.']);
            exit();
        }
    }
    else {
        echo json_encode(['success' => false, 'message' => 'User not found.']);
        exit();
    }
}
else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
    exit();
}
?>
