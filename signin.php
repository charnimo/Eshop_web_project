<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["signin"])) {
    include 'connection.php';
    include 'User.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        $user = new User($pdo);
        $userData = $user->getUserByUsername($username);

        if ($userData && password_verify($password, $userData['password'])) {
            if ($userData['id'] == 0) {
                $_SESSION['admin'] = 1;
            } else {
                $_SESSION['user'] = $userData['name'];
            }
            header("Location: index.php");
            exit(); 
        } else {
            echo "Incorrect username or password";
        }
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $pdo = null;
}
?>
