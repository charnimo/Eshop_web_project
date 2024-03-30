<?php
session_start();
include "navbar.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user products</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/product/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f1f2f7;
        }

        /*panel*/
        .panel {
            border: none;
            box-shadow: none;
        }

        .panel-heading {
            border-color: #eff2f7;
            font-size: 16px;
            font-weight: 300;
        }

        .panel-title {
            color: #2A3542;
            font-size: 14px;
            font-weight: 400;
            margin-bottom: 0;
            margin-top: 0;
            font-family: 'Open Sans', sans-serif;
        }

        /*product list*/
        .prod-cat li a {
            border-bottom: 1px dashed #d9d9d9;
        }

        .prod-cat li a {
            color: #3b3b3b;
        }

        .prod-cat li ul {
            margin-left: 30px;
        }

        .prod-cat li ul li a {
            border-bottom: none;
        }

        .prod-cat li ul li a:hover,
        .prod-cat li ul li a:focus,
        .prod-cat li ul li.active a,
        .prod-cat li a:hover,
        .prod-cat li a:focus,
        .prod-cat li a.active {
            background: none;
            color: #ff7261;
        }

        .pro-lab {
            margin-right: 20px;
            font-weight: normal;
        }

        .pro-sort {
            padding-right: 20px;
            float: left;
        }

        .pro-page-list {
            margin: 5px 0 0 0;
        }

        .product-list img {
            width: 100%;
            border-radius: 4px 4px 0 0;
            -webkit-border-radius: 4px 4px 0 0;
        }

        .product-list .pro-img-box {
            position: relative;
        }

        .adtocart {
            background: #fc5959;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            -webkit-border-radius: 50%;
            color: #fff;
            display: inline-block;
            text-align: center;
            border: 3px solid #fff;
            left: 45%;
            bottom: -25px;
            position: absolute;
        }

        .adtocart i {
            color: #fff;
            font-size: 25px;
            line-height: 42px;
        }

        .pro-title {
            color: #5A5A5A;
            display: inline-block;
            margin-top: 20px;
            font-size: 16px;
        }

        .product-list .price {
            color: #fc5959;
            font-size: 15px;
        }

        .pro-img-details {
            margin-left: -15px;
        }

        .pro-img-details img {
            width: 100%;
        }

        .pro-d-title {
            font-size: 16px;
            margin-top: 0;
        }

        .product_meta {
            border-top: 1px solid #eee;
            border-bottom: 1px solid #eee;
            padding: 10px 0;
            margin: 15px 0;
        }

        .product_meta span {
            display: block;
            margin-bottom: 10px;
        }

        .product_meta a,
        .pro-price {
            color: #fc5959;
        }

        .pro-price,
        .amount-old {
            font-size: 18px;
            padding: 0 10px;
        }

        .amount-old {
            text-decoration: line-through;
        }

        .quantity {
            width: 120px;
        }

        .pro-img-list {
            margin: 10px 0 0 -15px;
            width: 100%;
            display: inline-block;
        }

        .pro-img-list a {
            float: left;
            margin-right: 10px;
            margin-bottom: 10px;
        }

        .pro-d-head {
            font-size: 18px;
            font-weight: 300;
        }

        .stylish-panel {
            border: 2px solid #333;
            border-radius: 5px;
            padding: 15px;
        }

        .stylish-input {
            border: none;
            border-bottom: 2px solid #333;
            border-radius: 0;
        }

        .stylish-heading {
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }

        .stylish-list {
            list-style: none;
            padding: 0;
        }

        .stylish-btn {
            color: #333;
            text-decoration: none;
        }

        .stylish-slider {
            background: #333;
        }

        .stylish-amount {
            color: #333;
            font-weight: bold;
        }

        .stylish-form {
            margin-top: 15px;
        }

        .stylish-h4 {
            font-size: 16px;
            color: #333;
        }

        .stylish-sort {
            color: #333;
            border: none;
            background: transparent;
        }
    </style>
</head>

<body>

    <div class="container bootdey">
        <div class="row">
            <div class="col-md-3">
                <section class="panel">
                    <header class="panel-heading stylish-heading">
                        Category
                    </header>
                    <div class="panel-body">
                        <ul class="nav prod-cat category-list stylish-list">
                            <li><button class="btn btn-link category-btn stylish-btn" data-category="all">All</button></li>
                            <li><button class="btn btn-link category-btn stylish-btn" data-category="TV">TV</button></li>
                            <li><button class="btn btn-link category-btn stylish-btn" data-category="PC">PC</button></li>
                            <li><button class="btn btn-link category-btn stylish-btn" data-category="Electronics">Electronics</button></li>
                            <li><button class="btn btn-link category-btn stylish-btn" data-category="Consoles">Consoles</button></li>
                        </ul>
                    </div>
                </section>
                <section class="panel">
                    <header class="panel-heading stylish-heading">
                        Price Range
                    </header>
                    <div class="panel-body sliders">
                        <div id="slider-range" class="slider stylish-slider"></div>
                        <div class="slider-info">
                            <span id="slider-range-amount" class="stylish-amount"></span>
                        </div>
                    </div>
                </section>
                <section class="panel">
                    <header class="panel-heading stylish-heading">
                        Filter
                    </header>
                    <div class="panel-body">
                        <form role="form product-form stylish-form">
                            <div class="form-group">
                                <h4 class="stylish-h4">Sort by Price</h4>
                                <button class="btn btn-secondary btn-sort stylish-sort" id="sort-asc">Low to High</button>
                                <button class="btn btn-secondary btn-sort stylish-sort" id="sort-desc">High to Low</button>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
            <div class="col-md-9">
                <section class="panel">
                    <div class="panel-body">
                        <div class="pull-right">
                            <ul class="pagination pagination-sm pro-page-list">
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">»</a></li>
                            </ul>
                        </div>
                    </div>
                </section>
                <div class="product-container">
                    <div class="row product-list">
                        <?php
                        include 'connection.php';

                        $sql = "SELECT * FROM products";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                                <div class="col-md-4 product-card" data-category="<?php echo $row['category']; ?>">
                                    <section class="panel">
                                        <div class="pro-img-box">
                                            <img src="<?php echo $row['image']; ?>" class="card-img-top product-image" alt="<?php echo $row['name']; ?>" data-bs-toggle="modal" data-bs-target="#descriptionModal-<?php echo $row['id']; ?>">
                                            <a href="#" class="adtocart">
                                                <i class="fa fa-shopping-cart"></i>
                                            </a>
                                        </div>

                                        <div class="panel-body text-center">
                                            <h4>
                                                <a href="#" class="pro-title">
                                                    <?php echo $row['name']; ?>
                                                </a>
                                            </h4>
                                            <p class="price">$<?php echo $row['price']; ?></p>
                                        </div>
                                    </section>
                                </div>
                                <div class="modal fade" id="descriptionModal-<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="descriptionModalLabel-<?php echo $row['id']; ?>" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="descriptionModalLabel-<?php echo $row['id']; ?>"><?php echo $row['name']; ?> - Description</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <img src="<?php echo $row['image']; ?>" class="img-fluid" alt="<?php echo $row['name']; ?>">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p><strong>Name:</strong> <?php echo $row['name']; ?></p>
                                                        <p><strong>Price:</strong> $<?php echo $row['price']; ?></p>
                                                        <p><strong>Description:</strong></p>
                                                        <p><?php echo $row['description']; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        } else {
                            echo "No products found";
                        }

                        mysqli_close($conn);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-..." crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.category-btn').click(function() {
                var category = $(this).data('category');
                $('.product-list .col-md-4').each(function() {
                    var productCategory = $(this).data('category');
                    if (category === 'all' || productCategory === category) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });

            $('#sort-asc').click(function(event) {
                event.preventDefault();
                var $wrapper = $('.product-list');
                var $products = $wrapper.find('.col-md-4');
                $products.sort(function(a, b) {
                    var priceA = parseFloat($(a).find('.price').text().replace('$', ''));
                    var priceB = parseFloat($(b).find('.price').text().replace('$', ''));
                    return priceA - priceB;
                });
                $wrapper.empty().append($products);
            });

            $('#sort-desc').click(function(event) {
                event.preventDefault();
                var $wrapper = $('.product-list');
                var $products = $wrapper.find('.col-md-4');
                $products.sort(function(a, b) {
                    var priceA = parseFloat($(a).find('.price').text().replace('$', ''));
                    var priceB = parseFloat($(b).find('.price').text().replace('$', ''));
                    return priceB - priceA;
                });
                $wrapper.empty().append($products);
            });
        });
    </script>

</body>

</html>
