<?php

//ebda session hatta ken user 7at password ghalta (y)
session_start(); 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["signin"])) {
    include 'connection.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE name='$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        //la hash la wedhni
        if ($password == $row['password']) {
            $_SESSION['username'] = $username;

            header("Location: index.html");
            exit;
        } else {
            //to change add error message
            echo "Incorrect password!";
        }
    } else {
        //kif kif add error message
        echo "User not found!";
    }

    mysqli_close($conn);
}
?>
