<?php
session_start();
include "navbar.php"
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


    <link rel='stylesheet' href='https://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>

<script src='https://netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
<style>
    body{
background:#f1f2f7;
}

/*panel*/
.panel {
    border: none;
    box-shadow: none;
}

.panel-heading {
    border-color:#eff2f7 ;
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

.prod-cat li a{
    border-bottom: 1px dashed #d9d9d9;
}

.prod-cat li a {
    color: #3b3b3b;
}

.prod-cat li ul {
    margin-left: 30px;
}

.prod-cat li ul li a{
    border-bottom:none;
}
.prod-cat li ul li a:hover,.prod-cat li ul li a:focus, .prod-cat li ul li.active a , .prod-cat li a:hover,.prod-cat li a:focus, .prod-cat li a.active{
    background: none;
    color: #ff7261;
}

.pro-lab{
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

.product-list img{
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

.adtocart i{
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
    color:#fc5959 ;
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
.product_meta a, .pro-price{
    color:#fc5959 ;
}

.pro-price, .amount-old {
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



</style>
</head>

<body>
<


<div class="container bootdey">
    <div class="col-md-3">
        <section class="panel">
            <div class="panel-body">
                <input type="text" placeholder="Keyword Search" class="form-control" />
            </div>
        </section>
        <section class="panel">
            <header class="panel-heading">
                Category
            </header>
            <div class="panel-body">
                <ul class="nav prod-cat category-list">
                <li><button class="btn btn-link category-btn" data-category="all">All</button></li>
                        <li><button class="btn btn-link category-btn" data-category="TV">TV</button></li>
                        <li><button class="btn btn-link category-btn" data-category="PC">PC</button></li>
                        <li><button class="btn btn-link category-btn" data-category="Electronics">Electronics</button></li>
                        <li><button class="btn btn-link category-btn" data-category="Consoles">Consoles</button></li>
                </ul>
            </div>
        </section>
        <section class="panel">
            <header class="panel-heading">
                Price Range
            </header>
            <div class="panel-body sliders">
                <div id="slider-range" class="slider"></div>
                <div class="slider-info">
                    <span id="slider-range-amount"></span>
                </div>
            </div>
        </section>
        <section class="panel">
            <header class="panel-heading">
                Filter
            </header>
            <div class="panel-body">
                <form role="form product-form">
                    <div class="form-group">
                    <h4>Sort by Price</h4>
                    <button class="btn btn-secondary btn-sort" id="sort-asc">Low to High</button>
                    <button class="btn btn-secondary btn-sort" id="sort-desc">High to Low</button>
                    </div>

                </form>
            </div>
        </section>
        <section class="panel">
           
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

    $sql = "SELECT * FROM produits";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
    ?>
            <div class="col-md-4" data-category="<?php echo $row['category']; ?>">
                <section class="panel">
                    <div class="pro-img-box">
                        <img src="<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>" />
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-..." crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        $('.category-btn').click(function(){
            var category = $(this).data('category'); 
            $('.product-list .col-md-4').each(function(){
                var productCategory = $(this).data('category'); 
                if(category === 'all' || productCategory === category){ 
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