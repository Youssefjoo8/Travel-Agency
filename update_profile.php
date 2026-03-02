<?php
error_reporting(0);
session_start();
include 'config.php';

header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'User not logged in.']);
    exit();
}

$user_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $response = ['success' => false, 'message' => ''];
    $updates = [];

    // Handle profile image upload
    if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == UPLOAD_ERR_OK) {
        $upload_dir = 'images/profiles/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        $file_name = time() . '_' . basename($_FILES['profile_image']['name']);
        $target_file = $upload_dir . $file_name;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $valid_extensions = ['jpg', 'jpeg', 'png', 'gif'];
        if (in_array($imageFileType, $valid_extensions)) {
            if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $target_file)) {
                $updates[] = "Profile_image = '$target_file'";
            }
            else {
                $response['message'] = 'Error uploading image.';
                echo json_encode($response);
                exit();
            }
        }
        else {
            $response['message'] = 'Invalid file type. Only JPG, JPEG, PNG & GIF allowed.';
            echo json_encode($response);
            exit();
        }
    }

    // Handle full name update
    if (!empty($_POST['full_name'])) {
        $full_name = mysqli_real_escape_string($connection, $_POST['full_name']);
        $updates[] = "Full_name = '$full_name'";
        $_SESSION['user_name'] = $full_name; // update session
    }

    // Handle email update
    if (!empty($_POST['email'])) {
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $updates[] = "email = '$email'";
    }

    // Handle phone update
    if (isset($_POST['phone'])) {
        $phone = mysqli_real_escape_string($connection, $_POST['phone']);
        $updates[] = "phone = '$phone'";
    }

    // Handle password update
    if (!empty($_POST['password'])) {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $updates[] = "password = '$password'";
    }

    if (count($updates) > 0) {
        $query = "UPDATE users SET " . implode(', ', $updates) . " WHERE id = '$user_id'";
        if (mysqli_query($connection, $query)) {
            $response['success'] = true;
            $response['message'] = 'Profile updated successfully!';

            // fetch updated user data to return
            $q = "SELECT Full_name, Profile_image FROM users WHERE id = '$user_id'";
            $res = mysqli_query($connection, $q);
            if ($res) {
                $row = mysqli_fetch_assoc($res);
                $response['user'] = $row;
            }
        }
        else {
            $err = mysqli_error($connection);
            $response['message'] = 'Database error: ' . $err;
        }
    }
    else {
        $response['message'] = 'No changes provided.';
    }

    echo json_encode($response);
    exit();
}
else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
    exit();
}
?>
