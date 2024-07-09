<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'database_name');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $username = $_POST['username'];
    // $email =  $_POST['email'];
    $password = $_POST['password'];

    // Check if email and password are correct
    $query = "SELECT * FROM users WHERE $username = 'username' ";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            header('Location: dashboard.php');
exit;
        } else {
            echo "Incorrect password.";
            exit;
        }
    } else {
        echo "Please provide correct detail";
        exit;
    }
}
?>