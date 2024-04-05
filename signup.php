<?php



if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["signup"])) {
    include 'connection.php';

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    //check if user exists
    $sql = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo "User already exists";
        exit;
    }
    else{
    $sql = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$password')";

    if (mysqli_query($conn, $sql)) {
        header("Location: login.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

    mysqli_close($conn);
}
?>
