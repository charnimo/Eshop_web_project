<?php
session_start();
require('../connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["addtocart"])) {
        $productName = $_POST["product_name"];

        $stmt = $pdo->prepare("SELECT quantite FROM products WHERE name = ?");
        $stmt->execute([$productName]);
        $product = $stmt->fetch();

        if ($product && $product['quantite'] > 0) {
            $productPrice = $_POST["product_price"];
            $productImage = $_POST["product_image"];

            if(isset($_SESSION["cart"][$productName]) && is_array($_SESSION["cart"][$productName])) {
                if ($_SESSION["cart"][$productName]['quantity'] + 1 <= $product['quantite']) {
                    $_SESSION["cart"][$productName]['quantity']++;
                } else {
                    echo "Sorry, you cannot add more of this product to your cart. There are only {$product['quantite']} available.";
                    exit;
                }
            } else {
                $_SESSION["cart"][$productName] = array(
                    'price' => $productPrice,
                    'quantity' => 1,
                    'image' => $productImage
                );
            }
            header("Location: user.php");
            exit; 
        } else {
            echo "Sorry, this product is not available.";
        }
    }
}

?>
