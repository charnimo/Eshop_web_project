<?php session_start();
include "navbar1.php" ?>
<!doctype html>
<html lang="en" data-bs-theme="auto">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Home</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/product/">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
          .container {
  max-width: 960px;
}

.icon-link > .bi {
  width: .75em;
  height: .75em;
}

/*
 * Custom translucent site header
 */

.site-header {
  background-color: rgba(0, 0, 0, .85);
  -webkit-backdrop-filter: saturate(180%) blur(20px);
  backdrop-filter: saturate(180%) blur(20px);
}
.site-header a {
  color: #8e8e8e;
  transition: color .15s ease-in-out;
}
.site-header a:hover {
  color: #fff;
  text-decoration: none;
}

/*
 * Dummy devices (replace them with your own or something else entirely!)
 */

.product-device {
  position: absolute;
  right: 10%;
  bottom: -30%;
  width: 300px;
  height: 540px;
  background-color: #333;
  border-radius: 21px;
  transform: rotate(30deg);
}

.product-device::before {
  position: absolute;
  top: 10%;
  right: 10px;
  bottom: 10%;
  left: 10px;
  content: "";
  background-color: rgba(255, 255, 255, .1);
  border-radius: 5px;
}

.product-device-2 {
  top: -25%;
  right: auto;
  bottom: 0;
  left: 5%;
  background-color: #e5e5e5;
}


/*
 * Extra utilities
 */

.flex-equal > * {
  flex: 1;
}
@media (min-width: 768px) {
  .flex-md-equal > * {
    flex: 1;
  }
}

      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
      }

      .bd-mode-toggle {
        z-index: 1500;
      }

      .bd-mode-toggle .dropdown-menu .active .bi {
        display: block !important;
      }
      .carousel-item img {
    transition: transform 0.3s ease;
}
.carousel-item img:hover {
    transform: scale(1.1);
}
.image-container {
    transition: transform 0.3s ease;
}

.image-container:hover {
    transform: scale(1.1);
}
.product-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .product-item {
        width: calc(33.33% - 20px);
        margin-bottom: 20px;
        padding: 10px;
        box-sizing: border-box;
        text-align: center;
        position: relative; 
    }

    .product-image {
        width: 100%;
        height: 300px;
        background-size: cover;
        background-position: center;
        border: 3px solid #ccc;
        border-radius: 10px;
        margin-bottom: 10px;
        transition: filter 0.3s; 
    }

    .product-item:hover .product-image {
        filter: brightness(0.8)
    }

    .product-info {
        position: absolute; 
        top: 50%; 
        left: 50%; 
        transform: translate(-50%, -50%); 
        opacity: 0; 
        background-color: rgba(0, 0, 0, 0.7); 
        padding: 10px; 
        border-radius: 10px; 
        color: white; 
        width: 90%; 
        transition: opacity 0.3s; 
    }

    .product-item:hover .product-info {
        opacity: 1; 
        box-shadow: 2px 2px 20px rgba(0, 0, 1, 1); 
    }
    .text-bg-dark {
        position: relative;
        overflow: hidden;
        transition: filter 0.3s;
    }

    .text-bg-dark {
        position: relative;
        overflow: hidden;
        transition: filter 0.3s;
    }

    .text-bg-dark:hover {
        filter: brightness(0.8);
    }

    .text-bg-dark .bg-body-tertiary {
        transition: transform 0.3s, width 0.3s, height 0.3s;
    }

    .text-bg-dark:hover .bg-body-tertiary {
        transform: translateY(-10px);
        width: 90%;
        height: 550px;
    }

    .text-bg-dark .product-info {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        opacity: 0;
        background-color: rgba(0, 0, 0, 0.7);
        padding: 10px;
        border-radius: 10px;
        color: white;
        width: 90%;
        transition: opacity 0.3s;
    }

    .text-bg-dark:hover .product-info {
        opacity: 1;
        box-shadow: 2px 2px 20px rgba(0, 0, 1, 1);
    }
    .bg-body-tertiary {
        position: relative;
        overflow: hidden;
        transition: filter 0.3s;
    }

    .bg-body-tertiary {
        position: relative;
        overflow: hidden;
        transition: filter 0.3s;
    }

    .bg-body-tertiary:hover {
        filter: brightness(0.8);
    }

    .bg-body-tertiary .bg-body-tertiary {
        transition: transform 0.3s, width 0.3s, height 0.3s;
    }

    .bg-body-tertiary:hover .bg-body-tertiary {
        transform: translateY(-10px);
        width: 90%;
        height: 550px;
    }

    .bg-body-tertiary .product-info {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        opacity: 0;
        background-color: rgba(0, 0, 0, 0.7);
        padding: 10px;
        border-radius: 10px;
        color: white;
        width: 90%;
        transition: opacity 0.3s;
    }

    .bg-body-tertiary:hover .product-info {
        opacity: 1;
        box-shadow: 2px 2px 20px rgba(0, 0, 1, 1);
    }
    
    .text-bg-warning {
        position: relative;
        overflow: hidden;
        transition: filter 0.3s;
    }

    .text-bg-warning {
        position: relative;
        overflow: hidden;
        transition: filter 0.3s;
    }

    .text-bg-warning:hover {
        filter: brightness(0.8);
    }

    .text-bg-warning {
        transition: transform 0.3s, width 0.3s, height 0.3s;
    }

    .text-bg-warning:hover .bg-body-tertiary {
        transform: translateY(-10px);
        width: 90%;
        height: 550px;
    }

    .text-bg-warning .product-info {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        opacity: 0;
        background-color: rgba(0, 0, 0, 0.7);
        padding: 10px;
        border-radius: 10px;
        color: white;
        width: 90%;
        transition: opacity 0.3s;
    }

    .text-bg-warning:hover .product-info {
        opacity: 1;
        box-shadow: 2px 2px 20px rgba(0, 0, 1, 1);
    }
    body, html {
    margin: 0;
    padding: 0;
    height: 100%;
  }
  
  .container2 {
    width: 100%;
    height: 100%;
    background-color:brown;
    position: relative;
    overflow: hidden;
  }
  
  .image {
    position: absolute;
    width: 115%;
    height: 115%;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    transition: transform 0s;
  }

  .image.resized {
    width: 100%;
    height: 100%;
    transform: translate(-50%, -50%) scale(1.2);
  }
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

    </style>

    <!-- Custom styles for this template -->
    <link href="product.css" rel="stylesheet">
</head>
<body>
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
<svg xmlns="http://www.w3.org/2000/svg" class="d-none">
    <!-- Your SVG symbols -->
    <symbol id="check2" viewBox="0 0 16 16">
        <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
      </symbol>
      <symbol id="circle-half" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"/>
      </symbol>
      <symbol id="moon-stars-fill" viewBox="0 0 16 16">
        <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"/>
        <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"/>
      </symbol>
      <symbol id="sun-fill" viewBox="0 0 16 16">
        <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
      </symbol>
</svg>

  


<div class="d-md-flex flex-md-equal w-100 my-md-3 ps-md-3">
    <div class="text-bg-dark me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
      <div class="my-3 py-3">
        <h2 class="display-5">Pro Art Display</h2>
        <p class="lead">Tout l'esseciel pour les pro.</p>
      </div>
      <div class="bg-body-tertiary shadow-sm mx-auto" style="width: 80%; height: 500px; border-radius: 21px 21px 0 0; background-image: url('assets/imgs/rog.webp'); background-size: cover; background-position: center;"></div>
      <div class="product-info">
                    <h3>View more</h3>
                </div>
    </div>
    <div class="text-bg-warning me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
      <div class="my-3 py-3">
        <h2 class="display-5">IPhone 15 Pro Max</h2>
        <p class="lead">Titane.Si robuste.Si leger.Si pro</p>
      </div>
      <div class="bg-body-tertiary shadow-sm mx-auto" style="width: 80%; height: 500px; border-radius: 21px 21px 0 0; background-image: url('assets/imgs/iphone_15pro__3nx4u28gc026_large.jpg'); background-size: 300px; background-position: center;"></div>
      <div class="product-info">
                    <h3>View more</h3>
                </div>
    </div>
  </div>
<div class="d-md-flex flex-md-equal w-100 my-md-3 ps-md-3">
<div class="bg-body-tertiary me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
      <div class="my-3 py-3">
        <h2 class="display-5">Lave-vaisselle en pose libre</h2>
        <p class="lead">Surveillance simple et intuitive de l'état.</p>
      </div>
      <div class="bg-body-tertiary shadow-sm mx-auto" style="width: 80%; height: 500px; border-radius: 21px 21px 0 0; background-image: url('assets/imgs/lave\ vaisselle.jpg'); background-size: cover; background-position: center;"></div>
      <div class="product-info">
                    <h3>View more</h3>
                </div>
    </div>
    <div class="text-bg-dark me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
      <div class="my-3 py-3">
        <h2 class="display-5">Buds S23 FE</h2>
        <p class="lead">Entrez dans l'univers Galaxy S.</p>
      </div>
      <div class="bg-body-tertiary shadow-sm mx-auto" style="width: 80%; height: 500px; border-radius: 21px 21px 0 0; background-image: url('assets/imgs/Tab-S8-Ultra-14.jpg'); background-size: cover; background-position: center;"></div>
      <div class="product-info">
                    <h3>View more</h3>
                </div>
    </div>
  </div>
  <div class="d-md-flex flex-md-equal w-100 my-md-3 ps-md-3">
    <div class="text-bg-dark me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
      <div class="my-3 py-3">
        <h2 class="display-5">L'Univers Gaming</h2>
        <p class="lead">Notre Nouvelle Gamme.</p>
      </div>
      <div class="bg-body-tertiary shadow-sm mx-auto" style="width: 80%; height: 500px; border-radius: 21px 21px 0 0; background-image: url('assets/imgs/performanceImg.jpg'); background-size: cover; background-position: center;"></div>
      <div class="product-info">
                    <h3>View more</h3>
                </div>
    </div>
    <div class="text-bg-warning me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
      <div class="my-3 py-3">
        <h2 class="display-5">talfza</h2>
        <p class="lead">bla bla bla</p>
      </div>
      <div class="bg-body-tertiary shadow-sm mx-auto" style="width: 80%; height: 500px; border-radius: 21px 21px 0 0; background-image: url('assets/imgs/Sony_Gear_up_for_the_game.jpg'); background-size: cover; background-position: center;"></div>
      <div class="product-info">
                    <h3>View more</h3>
                </div>
    </div>
  </div>
  <div class="container2">
  <img class="image" src="assets/imgs/samsung.webp"  alt="Sample Image">
  </div>





<footer class="container py-5">
  <div class="row">
   
    <div class="col-6 col-md">
      <h5>Features</h5>
      <ul class="list-unstyled text-small">
        <li><a class="link-secondary text-decoration-none" href="#">Web Project</a></li>

      </ul>
    </div>
    <div class="col-6 col-md">
      <h5>Resources</h5>
      <ul class="list-unstyled text-small">
        <li><a class="link-secondary text-decoration-none" href="#">GG</a></li>
      </ul>
    </div>

    <div class="col-6 col-md">
      <h5>About</h5>
      <ul class="list-unstyled text-small">
        <li><a class="link-secondary text-decoration-none" href="#">Team</a></li>

      </ul>
    </div>
  </div>
</footer>

<div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
    <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center"
            id="bd-theme"
            type="button"
            aria-expanded="false"
            data-bs-toggle="dropdown"
            aria-label="Toggle theme (auto)">
        <svg class="bi my-1 theme-icon-active" width="1em" height="1em"><use href="#circle-half"></use></svg>
        <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
    </button>
    <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
        <li>
            <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light" aria-pressed="false">
                <svg class="bi me-2 opacity-50" width="1em" height="1em"><use href="#sun-fill"></use></svg>
                Light
                <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
            </button>
        </li>
        <li>
            <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
                <svg class="bi me-2 opacity-50" width="1em" height="1em"><use href="#moon-stars-fill"></use></svg>
                Dark
                <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
            </button>
        </li>
        <li>
            <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto" aria-pressed="true">
                <svg class="bi me-2 opacity-50" width="1em" height="1em"><use href="#circle-half"></use></svg>
                Auto
                <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
            </button>
        </li>
    </ul>
</div>

<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-..." crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-..."></script>
<script src="../assets/js/color-modes.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const themeToggle = document.getElementById("bd-theme");
        const themeText = document.getElementById("bd-theme-text");

        const themeValue = localStorage.getItem("theme");
        if (themeValue) {
            document.documentElement.setAttribute("data-bs-theme", themeValue);
            if (themeValue === "dark") {
                themeText.textContent = "Dark";
            } else if (themeValue === "light") {
                themeText.textContent = "Light";
            }
        }

        themeToggle.addEventListener("click", function () {
            const currentTheme = document.documentElement.getAttribute("data-bs-theme");
            const newTheme = currentTheme === "dark" ? "light" : "dark";
            document.documentElement.setAttribute("data-bs-theme", newTheme);
            localStorage.setItem("theme", newTheme);
            if (newTheme === "dark") {
                themeText.textContent = "Dark";
            } else if (newTheme === "light") {
                themeText.textContent = "Light";
            }
        });
    });
</script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const container = document.querySelector(".container");

    container.addEventListener("mouseover", function () {
        container.style.transform = "translateY(-5px)";
    });

    container.addEventListener("mouseout", function () {
        container.style.transform = "translateY(0)";
    });
});
  const image = document.querySelector('.image');
  const container = document.querySelector('.container');
  let lastScrollTop = 1;

  window.addEventListener('scroll', () => {
    const scrollTop = window.scrollY;
    const containerHeight = container.offsetHeight;
    const imageHeight = image.offsetHeight;
    const maxScale = 1.1;

    if (scrollTop > lastScrollTop) {
      const scale =  ((scrollTop / containerHeight) * (maxScale - 1))/5;
      image.style.transform = `translate(-50%, -50%) scale(${scale})`;
    } else {
      const scale =  ((1 - scrollTop / containerHeight) * (maxScale - 1))/5;
      image.style.transform = `translate(-50%, -50%) scale(${scale})`;
    }

    
  });
  </script>
</body>
</html>
