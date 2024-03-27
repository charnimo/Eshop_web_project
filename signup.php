<?php

//apparament ywarrik l errors idk t7b na7i na7i
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["signup"])) {
    include 'connection.php';

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users (name, email, password) VALUES ('$username', '$email', '$password')";

    if (mysqli_query($conn, $sql)) {
        header("Location: login.html");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
    mysqli_close($conn);
}
?>
