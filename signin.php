<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["signin"])) {
    include 'connection.php';
    include 'User.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = new User($conn);
    $userData = $user->getUserByUsername($username);

    if ($userData && password_verify($password, $userData['password'])) {
        if ($userData['id'] == 0) {
            $_SESSION['admin'] = 1;
        } else {
            $_SESSION['user'] = $userData['name'];
        }
        header("Location: homepage.php");
    } else {
        echo "Incorrect username or password";
    }

    $conn->close();
}
?>
