
<?php

$host = 'localhost';
$dbname = 'project1';//lezm nafs l esem fi phpmyadmin, w table esmha users, w table fih id, name, email, password
$username = 'root';
$password = '';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
