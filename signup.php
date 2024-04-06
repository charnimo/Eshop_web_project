<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["signup"])) {
    include 'connection.php';
    include 'User.php';

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = new User($conn);

    $existingUser = $user->getUserByUsername($username);
    if ($existingUser) {
        echo "User already exists";
    } else {
        $success = $user->createUser($username, $email, $password);
        if ($success) {
            header("Location: login.php");
        } else {
            echo "Error creating user";
        }
    }

    $conn->close();
}
?>