<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <tite>Document</title>
    <link rel='stylesheet' href='https://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>

<script src='https://netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
<style>
    body{margin-top:20px;
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

<nav class="navbar navbar-expand-md bg-dark sticky-top border-bottom" data-bs-theme="dark">
  <div class="container">
    <a class="navbar-brand d-md-none" href="#">
      <svg class="bi" width="24" height="24"><use xlink:href="#aperture"/></svg>
      Aperture
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas" aria-controls="offcanvas" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvas" aria-labelledby="offcanvasLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasLabel">Aperture</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item mb-2"><a class="nav-link" href="/homepage.php"> <svg class="bi" width="24" height="24"><use xlink:href="#aperture"/></svg>
          </a></li>
          <li class="nav-item mb-2"><a class="nav-link" href="/homepage.php">Acceuil</a></li>
          <li class="nav-item mb-2"><a class="nav-link" href="/products.php">Product</a></li>
          <li class="nav-item mb-2"><a class="nav-link" href="/contact.html">Contact Us</a></li>
          <li class="nav-item mb-2"><a class="nav-link" href="/Checkout.php">
            <svg class="bi" width="24" height="24"><use xlink:href="#cart"/></svg>
          </a></li>
<li class="nav-server-side-login" style="display: flex; align-items: center; justify-content: space-between;">
    <?php
    if (isset($_SESSION['admin']) || isset($_SESSION['user']))   {
        echo '<a href="logout.php" class="nav-link text-light text-decoration-none btn btn-primary">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>';
    } else {
        echo '<a href="login.html" class="nav-link text-light text-decoration-none btn btn-primary">
                <i class="fas fa-user"></i> Login
              </a>';
    }
    ?>

    <div id="user-status" style="margin-left: 100px;">  
        <?php
        if (isset($_SESSION['admin'])) {
            echo "Logged in as:  Admin";
        } else if (isset($_SESSION['user'])) {
            echo "Logged in as:  " . $_SESSION['user'];
        } else {
            echo "Not logged in";
        }
        ?>
    </div>
</li>
    </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>

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
                <ul class="nav prod-cat">
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
                        <label>Brand</label>
                        <select class="form-control hasCustomSelect" style="-webkit-appearance: menulist-button; width: 231px; position: absolute; opacity: 0; height: 34px; font-size: 12px;">
                            <option>Wallmart</option>
                            <option>Catseye</option>
                            <option>Moonsoon</option>
                            <option>Textmart</option>
                        </select>
                        <span class="customSelect form-control" style="display: inline-block;"><span class="customSelectInner" style="width: 209px; display: inline-block;">Wallmart</span></span>
                    </div>
                    <div class="form-group">
                        <label>Color</label>
                        <select class="form-control hasCustomSelect" style="-webkit-appearance: menulist-button; width: 231px; position: absolute; opacity: 0; height: 34px; font-size: 12px;">
                            <option>White</option>
                            <option>Black</option>
                            <option>Red</option>
                            <option>Green</option>
                        </select>
                        <span class="customSelect form-control" style="display: inline-block;"><span class="customSelectInner" style="width: 209px; display: inline-block;">White</span></span>
                    </div>
                    <div class="form-group">
                        <label>Type</label>
                        <select class="form-control hasCustomSelect" style="-webkit-appearance: menulist-button; width: 231px; position: absolute; opacity: 0; height: 34px; font-size: 12px;">
                            <option>Small</option>
                            <option>Medium</option>
                            <option>Large</option>
                            <option>Extra Large</option>
                        </select>
                        <span class="customSelect form-control" style="display: inline-block;"><span class="customSelectInner" style="width: 209px; display: inline-block;">Small</span></span>
                    </div>
                    <button class="btn btn-primary" type="submit">Filter</button>
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

        <div class="row product-list">
            <div class="col-md-4">
                <section class="panel">
                    <div class="pro-img-box">
                        <img src="https://www.bootdey.com/image/250x220/FFB6C1/000000" alt="" />
                        <a href="#" class="adtocart">
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                    </div>

                    <div class="panel-body text-center">
                        <h4>
                            <a href="#" class="pro-title">
                                Leopard Shirt Dress
                            </a>
                        </h4>
                        <p class="price">$300.00</p>
                    </div>
                </section>
            </div>
            <div class="col-md-4">
                <section class="panel">
                    <div class="pro-img-box">
                        <img src="https://www.bootdey.com/image/250x220/6495ED/000000" alt="" />
                        <a href="#" class="adtocart">
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                    </div>

                    <div class="panel-body text-center">
                        <h4>
                            <a href="#" class="pro-title">
                                Leopard Shirt Dress
                            </a>
                        </h4>
                        <p class="price">$300.00</p>
                    </div>
                </section>
            </div>
            <div class="col-md-4">
                <section class="panel">
                    <div class="pro-img-box">
                        <img src="https://www.bootdey.com/image/250x220/FF7F50/000000" alt="" />
                        <a href="#" class="adtocart">
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                    </div>

                    <div class="panel-body text-center">
                        <h4>
                            <a href="#" class="pro-title">
                                Leopard Shirt Dress
                            </a>
                        </h4>
                        <p class="price">$300.00</p>
                    </div>
                </section>
            </div>
            <div class="col-md-4">
                <section class="panel">
                    <div class="pro-img-box">
                        <img src="https://www.bootdey.com/image/250x220/00BFFF/000000" alt="" />
                        <a href="#" class="adtocart">
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                    </div>

                    <div class="panel-body text-center">
                        <h4>
                            <a href="#" class="pro-title">
                                Leopard Shirt Dress
                            </a>
                        </h4>
                        <p class="price">$300.00</p>
                    </div>
                </section>
            </div>
            <div class="col-md-4">
                <section class="panel">
                    <div class="pro-img-box">
                        <img src="https://www.bootdey.com/image/250x220/00CED1/000000" alt="" />
                        <a href="#" class="adtocart">
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                    </div>

                    <div class="panel-body text-center">
                        <h4>
                            <a href="#" class="pro-title">
                                Leopard Shirt Dress
                            </a>
                        </h4>
                        <p class="price">$300.00</p>
                    </div>
                </section>
            </div>
            <div class="col-md-4">
                <section class="panel">
                    <div class="pro-img-box">
                        <img src="https://www.bootdey.com/image/250x220/9400D3/000000" alt="" />
                        <a href="#" class="adtocart">
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                    </div>

                    <div class="panel-body text-center">
                        <h4>
                            <a href="#" class="pro-title">
                                Leopard Shirt Dress
                            </a>
                        </h4>
                        <p class="price">$300.00</p>
                    </div>
                </section>
            </div>
            <div class="col-md-4">
                <section class="panel">
                    <div class="pro-img-box">
                        <img src="https://www.bootdey.com/image/250x220/FFD700/000000" alt="" />
                        <a href="#" class="adtocart">
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                    </div>

                    <div class="panel-body text-center">
                        <h4>
                            <a href="#" class="pro-title">
                                Leopard Shirt Dress
                            </a>
                        </h4>
                        <p class="price">$300.00</p>
                    </div>
                </section>
            </div>
            <div class="col-md-4">
                <section class="panel">
                    <div class="pro-img-box">
                        <img src="https://www.bootdey.com/image/250x220/ADD8E6/000000" alt="" />
                        <a href="#" class="adtocart">
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                    </div>

                    <div class="panel-body text-center">
                        <h4>
                            <a href="#" class="pro-title">
                                Leopard Shirt Dress
                            </a>
                        </h4>
                        <p class="price">$300.00</p>
                    </div>
                </section>
            </div>
            <div class="col-md-4">
                <section class="panel">
                    <div class="pro-img-box">
                        <img src="https://www.bootdey.com/image/250x220/20B2AA/000000" alt="" />
                        <a href="#" class="adtocart">
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                    </div>

                    <div class="panel-body text-center">
                        <h4>
                            <a href="#" class="pro-title">
                                Leopard Shirt Dress
                            </a>
                        </h4>
                        <p class="price">$300.00</p>
                    </div>
                </section>
            </div>
            <div class="col-md-4">
                <section class="panel">
                    <div class="pro-img-box">
                        <img src="https://www.bootdey.com/image/250x220/3CB371/000000" alt="" />
                        <a href="#" class="adtocart">
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                    </div>

                    <div class="panel-body text-center">
                        <h4>
                            <a href="#" class="pro-title">
                                Leopard Shirt Dress
                            </a>
                        </h4>
                        <p class="price">$300.00</p>
                    </div>
                </section>
            </div>
            <div class="col-md-4">
                <section class="panel">
                    <div class="pro-img-box">
                        <img src="https://www.bootdey.com/image/250x220/FFB6C1/000000" alt="" />
                        <a href="#" class="adtocart">
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                    </div>

                    <div class="panel-body text-center">
                        <h4>
                            <a href="#" class="pro-title">
                                Leopard Shirt Dress
                            </a>
                        </h4>
                        <p class="price">$300.00</p>
                    </div>
                </section>
            </div>
            <div class="col-md-4">
                <section class="panel">
                    <div class="pro-img-box">
                        <img src="https://www.bootdey.com/image/250x220/C71585/000000" alt="" />
                        <a href="#" class="adtocart">
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                    </div>

                    <div class="panel-body text-center">
                        <h4>
                            <a href="#" class="pro-title">
                                Leopard Shirt Dress
                            </a>
                        </h4>
                        <p class="price">$300.00</p>
                    </div>
                </section>
            </div>
            <div class="col-md-4">
                <section class="panel">
                    <div class="pro-img-box">
                        <img src="https://www.bootdey.com/image/250x220/191970/000000" alt="" />
                        <a href="#" class="adtocart">
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                    </div>

                    <div class="panel-body text-center">
                        <h4>
                            <a href="#" class="pro-title">
                                Leopard Shirt Dress
                            </a>
                        </h4>
                        <p class="price">$300.00</p>
                    </div>
                </section>
            </div>
            <div class="col-md-4">
                <section class="panel">
                    <div class="pro-img-box">
                        <img src="https://www.bootdey.com/image/250x220/87CEEB/000000" alt="" />
                        <a href="#" class="adtocart">
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                    </div>

                    <div class="panel-body text-center">
                        <h4>
                            <a href="#" class="pro-title">
                                Leopard Shirt Dress
                            </a>
                        </h4>
                        <p class="price">$300.00</p>
                    </div>
                </section>
            </div>
            <div class="col-md-4">
                <section class="panel">
                    <div class="pro-img-box">
                        <img src="https://www.bootdey.com/image/250x220/FFB6C1/000000" alt="" />
                        <a href="#" class="adtocart">
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                    </div>

                    <div class="panel-body text-center">
                        <h4>
                            <a href="#" class="pro-title">
                                Leopard Shirt Dress
                            </a>
                        </h4>
                        <p class="price">$300.00</p>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

</body>
</html>