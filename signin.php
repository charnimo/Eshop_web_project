<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["signin"])) {
    include 'connection.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        //la hash la wedhni
        if ($row['id'] == 0) {
            //clear all old sessions:
            session_destroy();
            unset($_SESSION['admin']);
            unset($_SESSION['user']);
            session_start();
            $_SESSION['admin'] = 1;
            header("Location: homepage.php");
        } else {
            //clear all old sessions:
            session_destroy();
            unset($_SESSION['admin']);
            unset($_SESSION['user']);
            session_start();
            $_SESSION['user'] = $row['name'];
            header("Location: homepage.php");
        }
    } else {
        //kif kif add error message
        echo "User not found!";
    }

    mysqli_close($conn);
}
?>
