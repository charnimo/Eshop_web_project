<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["signup"])) {
    include 'connection.php';
    include 'User.php';

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        $user = new User($pdo);

        $existingUser = $user->getUserByUsername($username);
        if ($existingUser) {
            echo "User already exists";
        } else {
            $success = $user->createUser($username, $email, $password);
            if ($success) {
                header("Location: login.php");
                exit(); 
            } else {
                echo "Error creating user";
            }
        }
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $pdo = null;
}
?>
