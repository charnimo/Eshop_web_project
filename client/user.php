<?php
session_start();
    require('../navbar1.php');
    //admin bark yod5el lel products.php

    
    if (isset($_SESSION['user'])) 
    {
        //do nothing

    }
    else if(isset($_SESSION['admin'])  )
    {
        header("Location: ../admin/home.php");
        exit();
    }
    else
    {
        header("Location: ../forbidden.php");
        exit();
    }

require("../config/commandes.php");

$Produits = afficher($pdo);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <!-- Ajout des liens vers les fichiers CSS et JS -->
    <!-- Laissez vos liens vers Bootstrap ici -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>  
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <style>
       body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-repeat: no-repeat;
            background-position: center bottom;
            background-size: cover;
        }



/* Sidebar */
#sidebar {
    background-color:black; 
    padding-top: 70px; 
    height: 100vh; 
    position: fixed; 
    top: 0;
    left: 0;
    width: 250px; 
    overflow-y: auto; 
}

        .main {
            margin-left: 264px;
        }

        .content {
            padding: 20px;
            background-color: #f0f0f0;
        }

        .sidebar-logo {
            padding: 1.15rem 1.5rem;
        }

        .sidebar-logo a {
            color: #e9ecef;
            font-size: 1.25rem;
            font-weight: 600;
        }

        .sidebar-nav {
            padding: 0;
        }

        .sidebar-header {
            color: #e9ecef;
            font-size: .75rem;
            padding: 1.5rem 1.5rem .375rem;
        }

        a.sidebar-link {
            padding: .625rem 1.625rem;
            color: #e9ecef;
            position: relative;
            display: block;
            font-size: 1rem;
            text-decoration:none;
        }

        .sidebar-link[data-bs-toggle="collapse"]::after {
            border: solid;
            border-width: 0 .075rem .075rem 0;
            content: "";
            display: inline-block;
            padding: 2px;
            position: absolute;
            right: 1.5rem;
            top: 1.4rem;
            transform: rotate(-135deg);
            transition: all .2s ease-out;
        }

        .sidebar-link[data-bs-toggle="collapse"].collapsed::after {
            transform: rotate(45deg);
            transition: all .2s ease-out;
        }
        .product-image {
    max-width: 100%; 
    max-height: 200px; 
}
.col-divider {
    border-right: 1px solid #ccc; 
}


    </style>
</head>
<body>
    <main>


<div class="wrapper expanded">
            <!-- Sidebar -->
            <aside id="sidebar">
    <div class="h-100">
        
        <!-- Sidebar Navigation -->
        <ul class="sidebar-nav">
            <br><br><br>
            <li class="sidebar-header">
                Filter
            </li>
            
            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#categories"
                    aria-expanded="false" aria-controls="categories">
                    <i class="fa-regular fa-file-lines pe-2"></i>
                    Categories
                </a>
                <ul id="categories" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                <li class="sidebar-item">
                        <a href="#" class="sidebar-link filter-category" data-category="All">ALL</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link filter-category" data-category="pc">PC</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link filter-category" data-category="console">Console</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link filter-category" data-category="tv">TV</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link filter-category" data-category="electromenager">Electroménager</a>
                    </li>
                </ul>
            </li>

            
            
        </ul>
    </div>
</aside>
<!-- End of Sidebar -->

            <!-- Page Content -->
            <section class="main">
                <div class="content">
                        <div class="mt-5">
                            <!-- 

                            Doesn't workkkkkkkkkkkkkkkkk

                             <div class="dropdown d-inline-block ms-2">
                                 <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                  <i class="fas fa-sort-amount-up-alt"></i> Sort
                                 </button>
                                 <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                   <li><a class="dropdown-item" href="#" onclick="triProduits('desc')"><i class="fas fa-sort-amount-down"></i> Price descending</a></li>
                                   <li><a class="dropdown-item" href="#" onclick="triProduits('asc')"><i class="fas fa-sort-amount-up"></i> Price ascending</a></li>
                                </ul>
                             </div>
-->

                         </div>
                         

                    
<!-- Affichage des produits -->                      
<div class="album py-5 bg-body-tertiary">
    <div class="container" id="produitsContainer">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3" id="produitsRow">
            <?php foreach($Produits as $produit): ?>
                <div class="col" data-categorie="<?= $produit['category'] ?>"  data-prix="<?= $produit['price'] ?>">
                    <div class="card shadow-lg h-100 rounded-4">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div style="text-align: center;">
                                <h5 class="card-title" style="font-family: 'Times New Roman', Times, serif; font-weight: bold;"><?= $produit['name'] ?></h5>
                                
                                <img src="../images/<?= $produit['image'] ?>" class="img-fluid rounded" style="max-height: 150px;">
                            </div>
                            <p class="card-text"><?= substr($produit['description'], 0, 100); ?>...</p>
                            <div class="d-flex justify-content-start align-items-center mb-2">
                                
                                <button type="button" class="btn btn-sm btn-primary me-2" data-bs-toggle="modal" data-bs-target="#descriptionModal<?= $produit['id'] ?>">
                                    <i class="fas fa-eye"></i> 
                                </button>
                                <!-- Bouton avec une icône de panier -->
                                <form method="POST" action="../client/addtocart.php">
                                                <input type="hidden" name="product_name" value="<?php echo $produit['name']; ?>">
                                                <input type="hidden" name="product_price" value="<?php echo $produit['price']; ?>">
                                                <input type="hidden" name="product_image" value="<?php echo $produit['image']; ?>">
                                <button type="submit" name="addtocart" type="button" class="btn btn-sm btn-success">
                                    <i class="fas fa-shopping-cart"></i>
                                </button>
                                </form>
                            </div>
                            <small class="text-muted" style="font-weight: bold;"><?= $produit['price'] ?> TND</small>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>


<!-- Modals pour afficher la description complète et modifier le produit -->
<?php foreach($Produits as $produit): ?>
    <div class="modal fade" id="descriptionModal<?= $produit['id'] ?>" tabindex="-1" aria-labelledby="descriptionModalLabel<?= $produit['id'] ?>" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="descriptionModalLabel<?= $produit['id'] ?>">Description complète du produit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 col-divider">
                            <img src="../images/<?= $produit['image'] ?>" class="img-fluid mb-3" alt="<?= $produit['name'] ?>">
                        </div>
                        <div class="col-md-6">
                            <p><?= $produit['description'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
                   
                </div>
            </section>
            <!-- End Page Content -->
        </div>
    </main>

    <!-- Vos scripts JavaScript -->
    <!-- Laissez vos liens vers les fichiers JS ici -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

function triProduits(ordre) {
    var produits = document.querySelectorAll('.album .col');
    var produitsArray = Array.from(produits);

    produitsArray.sort(function(a, b) {
        var prixA = parseFloat(a.getAttribute('data-prix'));
        var prixB = parseFloat(b.getAttribute('data-prix'));

        if (ordre === 'asc') {
            return prixA - prixB;
        } else {
            return prixB - prixA;
        }
    });

    var container = document.getElementById('produitsRow');
    container.innerHTML = '';

    produitsArray.forEach(function(produit) {
        container.appendChild(produit);
    });
}

</script>
<script>
    
    function filterByCategory(category) {
        const productCards = document.querySelectorAll('.col[data-categorie]');
        productCards.forEach(card => {
            const categories = card.dataset.categorie.split(' ');
            if (category === 'All' || categories.includes(category)) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    }

    document.querySelectorAll('.filter-category').forEach(link => {
        link.addEventListener('click', function() {
            const category = this.dataset.category;
            filterByCategory(category);
        });
    });
</script>

</body>
</html>
