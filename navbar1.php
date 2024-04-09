<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        

        .navbar {
    position: fixed; 
    top: 0; 
    width: 100%; 
    z-index: 1000;
    background-color: black; 
    
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
            transition:  0.3s;
        }
        .navbar-toggler {
            background: #fff;
        }
        .navbar-nav {
            text-align: center;
            margin-top: 5px;
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
        }
        .navbar-light .navbar-nav .nav-link:focus,
        .navbar-light .navbar-nav .nav-link:hover {
            color:bisque;
        }
        .navbar-light  .navbar-brand:hover {
            color:bisque;
        }

        #user-status {
            color: white;
        }
       .navbar:hover {
            transform:inherit;
        }
        
        
        
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">SHOP</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/Eshop_web_project/index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Eshop_web_project/client/user.php">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Eshop_web_project/contact.php">Contact</a>
                </li>
                <?php
                if(!isset($_SESSION['admin'])) {
                echo '<li class="nav-item">';
                    echo '<a class="nav-link" href="/Eshop_web_project/client/cart.php">Cart</a>';
                echo "</li>";
                }
                
            if (isset($_SESSION['admin']) || isset($_SESSION['user'])) {
                echo '<li class="nav-item">
                <a class="nav-link" href="/Eshop_web_project/logout.php">Logout</a> </li>';
            } else {
                echo '<li class="nav-item">
                <a class="nav-link" href="/Eshop_web_project/login.php">Login</a>
                </li>';
            }
            ?>
                <div id="user-status" style="margin-left: 100px;">
                <?php
                if (isset($_SESSION['admin'])) {
                    echo '<li class="nav-item"><a class="nav-link">Logged in as:  Admin </a></li>';
                    //echo "Logged in as:  Admin";
                } else if (isset($_SESSION['user'])) {
                    echo '<li class="nav-item"><a class="nav-link">Logged in as: '.$_SESSION['user']."</a></li>";
                   //echo "Logged in as:  " . $_SESSION['user'];                        
                } else {
                  echo '<li class="nav-item"><a class="nav-link">Not logged in</a></li>';
                    //echo "Not logged in";
                    }
                ?>
                </div>
            </ul>
        </div>
    </div>
</nav>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
