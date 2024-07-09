<?php
// Database connection
$conn = new mysqli('localhost', 'root','', 'database_name');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $confirm_password = password_hash($_POST['confirm_password'], PASSWORD_DEFAULT);

    // Check if passwords match
    if ($password != $confirm_password) {
        echo "Passwords do not match.";
        exit;
    }

    // Check if email and mobile number are unique
    $query = "SELECT * FROM users WHERE email = '$email' OR mobile = '$mobile'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        echo "Email or mobile number already exists.";
        exit;
    }

    // Check if profile picture is uploaded and within size limit
    $profile_picture = $_FILES['profile_picture'];
    $max_size = 2 * 1024 * 1024; // 2MB
    $allowed_extensions = ['png', 'jpg', 'avif', 'webp'];

    if ($profile_picture['error'] == UPLOAD_ERR_OK && $profile_picture['size'] <= $max_size) {
        $extension = strtolower(pathinfo($profile_picture['name'], PATHINFO_EXTENSION));
        if (in_array($extension, $allowed_extensions)) {
            $new_name = uniqid() . '.' . $extension;
            $destination = 'uploads/' . $new_name;
            if (move_uploaded_file($profile_picture['tmp_name'], $destination)) {
                $query = "INSERT INTO users (username, email, mobile, password, profile_picture) VALUES ('$username', '$email', '$mobile', '$password', '$new_name')";
                mysqli_query($conn, $query);
                echo "Sign up successful.";
                exit;
            } else {
                echo "Error uploading profile picture.";
                exit;
            }
        } else {
            echo "Invalid profile picture format.";
            exit;
        }
    } else {
        echo "Profile picture must be a png, jpg, avif, or webp file and within 2MB size limit.";
        exit;
    }
}
?>