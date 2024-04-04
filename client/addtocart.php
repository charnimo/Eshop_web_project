<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["addtocart"])) {
        $productName = $_POST["product_name"];
        $productPrice = $_POST["product_price"];
        $productImage = $_POST["product_image"];
        if(isset($_SESSION["cart"][$productName]) && is_array($_SESSION["cart"][$productName])) {
            $_SESSION["cart"][$productName]['quantity']++;
        } else {
            $_SESSION["cart"][$productName] = array(
                'price' => $productPrice,
                'quantity' => 1,
                'image' => $productImage
            );
        }
        header("Location: user.php");
        exit; 
    }
}
?>
