<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        .carousel-item {
            height: 100vh;
            min-height: 300px;
            background: no-repeat center center scroll;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
        .carousel-caption {
            bottom: 270px;
        }
        .carousel-caption h5 {
            color: bisque;
            font-size: 45px;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-top: 25px;
        }
        .carousel-caption p {
            color: bisque;
            width: 75%;
            margin: auto;
            font-size: 18px;
            line-height: 1.9;
        }
        .navbar-light .navbar-brand {
            color: #fff;
            font-size: 25px;
            text-transform: uppercase;
            font-weight: bold;
            letter-spacing: 2px;
        }
        .navbar-light .navbar-nav .active > .nav-link,
        .navbar-light .navbar-nav .nav-link.active,
        .navbar-light .navbar-nav .nav-link.show,
        .navbar-light .navbar-nav .show > .nav-link {
            color: #fff;
        }
        .navbar-light .navbar-nav .nav-link {
            color: #fff;
        }
        .navbar-toggler {
            background: #fff;
        }
        .navbar-nav {
            text-align: center;
        }
        .nav-link {
            padding: .2rem 1rem;
        }
        .nav-link.active,
        .nav-link:focus {
            color: #fff;
        }
        .navbar-toggler {
            padding: 1px 5px;
            font-size: 18px;
            line-height: 0.3;
        }
        .navbar-light .navbar-nav .nav-link:focus,
        .navbar-light .navbar-nav .nav-link:hover {
            color: #fff;
        }
        /* ignore the code below */
        .link-area {
            position: fixed;
            bottom: 20px;
            left: 20px;
            padding: 15px;
            border-radius: 40px;
            background: tomato;
        }
        .link-area a {
            text-decoration: none;
            color: #fff;
            font-size: 25px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">Mouri</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/homepage.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/products.php">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contact.html">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <ol class="carousel-indicators">
        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active" style="background-image: url('https://ispace.kz/blog/wp-content/uploads/2023/09/7-1024x480.png')">
            <div class="carousel-caption d-none d-md-block">
                <h5>IPhone 15 Pro Max </h5>
                <p>highest quality materials.</p>
            </div>
        </div>
        <div class="carousel-item" style="background-image: url('assets/imgs/u0ovnahd2jkdrql7-0_0_desktop_0_1X.webp')">
            <div class="carousel-caption d-none d-md-block">
            </div>
        </div>
        <div class="carousel-item" style="background-image: url('assets/imgs/cgw4pbfm1adr7cf9-0_0_desktop_0_1X.webp')">
            <div class="carousel-caption d-none d-md-block">
                <h5>Nouvelle Gamme pc Tuff</h5>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </a>
</div>
<!--- ignore the code below-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
