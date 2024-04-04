<?php
session_start();
if((!isset($_SESSION['user'])) && (!isset($_SESSION['admin'])) ){
    header("Location: forbidden.php");
}   

include "../navbar1.php";
?>

<!doctype html>
<html lang="en" data-bs-theme="auto">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Home</title>

    <link rel="stylesheet" href="/Eshop_web_project/assets/css/style3.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">


</head>
<body>
    
<div class="card">
    <div class="row">
        <div class="col-md-8 cart">
            <div class="title">
                <div class="row">
                    <div class="col"><h4><b>Shopping Cart</b></h4></div>
                    <!-- amount of items here zeyda na7itha -->
                    <div class="col align-self-center text-right text-muted"></div>
                </div>
            </div> 

            <?php if(isset($_SESSION["cart"]) && is_array($_SESSION["cart"])): ?>
                <?php foreach ($_SESSION["cart"] as $productName => $product): ?>
                <div class="row border-top border-bottom">
                    <div class="row main align-items-center">
                        <div class="col-2"><img class="img-fluid" src="<?php echo '../images/' . $product['image']; ?>"></div>
                        <div class="col">
                            <div class="row text-muted"><?php echo $productName; ?></div>
                            <!-- catergory here ken t7b -->
                            <div class="row"></div>
                        </div>
                        <div class="col">
                            <a href="#">-</a><span><?php echo $product['quantity']; ?></span><a href="#">+</a>
                        </div>
                        <div class="col">&dollar; <?php echo $product['price'] * $product['quantity']; ?> <span class="close">&#10005;</span></div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="row border-top border-bottom">
                    <div class="col text-center">Your cart is empty</div>
                </div>
            <?php endif; ?>

            <div class="back-to-shop"><a href="user.php"><i class="fas fa-arrow-left fa-lg"></i></a><span class="text-muted">Back to shop</span></div>


        </div>
        <div class="col-md-4 summary">
            <div><h5><b>Summary</b></h5></div>
            <hr>
            <?php if(isset($_SESSION["cart"]) && is_array($_SESSION["cart"])): ?>
                <div class="row">
                    <div class="col" style="padding-left:0;"><?php echo array_sum(array_column($_SESSION["cart"], 'quantity')); ?> items</div>
                    <div class="col text-right">&dollar; <?php echo array_sum(array_map(function($item) { return $item['price'] * $item['quantity']; }, $_SESSION["cart"])); ?></div>
                </div>
                <div class="row">
                    <div class="col" style="padding-left:0;">Delivery</div>
                    <div class="col text-right">&dollar; 5.00</div>
                </div>
            <?php else: ?>
                <div class="row">
                    <div class="col" style="padding-left:0;">0 items</div>
                    <div class="col text-right">&dollar; 0.00</div>
                </div>
            <?php endif; ?>
            
            <form>
                <p>SHIPPING</p>
                <select><option class="text-muted">Standard-Delivery- &dollar;5.00</option></select>
                <p>PROMO CODE</p>
                <input id="code" placeholder="Enter your code">
            </form>
            <?php if(isset($_SESSION["cart"]) && is_array($_SESSION["cart"])): ?>
                <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                    <div class="col">TOTAL PRICE</div>
                    <div class="col text-right">&dollar; <?php echo array_sum(array_map(function($item) { return $item['price'] * $item['quantity']; }, $_SESSION["cart"])) + 5.00; ?></div>
                </div>
            <?php endif; ?>
            <form method="POST" action="Checkout.php">
         <button name="checkout" class="btn btn-success">Checkout</button>
        </form>
        </div>
    </div>
</div>

</body>
<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-..." crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-..."></script>
<script src="../assets/js/color-modes.js"></script>
</html>
