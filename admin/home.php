<?php session_start();
include "../navbar1.php" ;
if (!isset($_SESSION['admin'])) 
{
  header('location: ../forbidden.php');
}
?>

<?php

require("../config/commandes.php");

// add product
if (isset($_POST['valider'])) {
    if (isset($_FILES['image']['name'], $_POST['name'], $_POST['description'], $_POST['price'], $_POST['category'])) {
        $image_name = $_FILES['image']['name'];
        $image_temp = $_FILES['image']['tmp_name'];

        if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
            // upload
            if (move_uploaded_file($image_temp, "../images/" . $image_name)) {
                // params
                $nom = htmlspecialchars(strip_tags($_POST['name']));
                $desc = htmlspecialchars(strip_tags($_POST['description']));
                $prix = htmlspecialchars(strip_tags($_POST['price']));
                $categorie = htmlspecialchars(strip_tags($_POST['category']));
               
                $quantite = htmlspecialchars(strip_tags($_POST['quantite']));

                ajouter($nom,$desc, $prix,$image_name, $categorie,$quantite,$pdo);

                // refresh
                header("Location: home.php");
                exit;
            } else {
                echo "Error Moving.";
            }
        } else {
            echo "Error Loading";
        }
    } else {
        echo "Fill all fields";
    }
}
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

        .navbar {
    background-color: black;
}

.navbar-brand {
    color: #fff;
    font-size: 25px;
    text-transform: uppercase;
    font-weight: bold;
    letter-spacing: 2px;
}

.navbar-nav {
    text-align: center;
}

.navbar-nav .nav-link {
    color: #fff;
    padding: .5rem 1rem;
    transition: color 0.3s;
}

.navbar-nav .nav-link:hover,
.navbar-nav .nav-link:focus {
    color: bisque;
}

#user-status {
    color: white;
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
            <li class="sidebar-header">
                Options
            </li>
            <li class="sidebar-item">
                <a href="Dashboard.php" class="sidebar-link" >
                    <i class="fa-solid fa-list pe-2"></i>
                    Dashboard
                </a>
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
                <!-- Bouton Ajouter un nouveau produit -->
                <button type="button" class="btn btn-success text-left" data-bs-toggle="modal" data-bs-target="#ajouterProduitModal">
                    <i class="fas fa-plus"></i> Ajouter un produit
                </button>

<!-- Dropdown pour le tri des produits 

doesn't worrrrrrrrrrrrkkkkk 

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

<!-- Modal pour ajouter un nouveau produit -->
<div class="modal fade" id="ajouterProduitModal" tabindex="-1" aria-labelledby="ajouterProduitModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ajouterProduitModalLabel">Ajouter un nouveau produit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="image" class="form-label">L'image du produit</label>
                        <input type="file" class="form-control" id="image" name="image" required accept="image/*">
                    </div>
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom du produit</label>
                        <input type="text" class="form-control" id="nom" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="prix" class="form-label">Prix</label>
                        <input type="number" class="form-control" id="prix" name="price" required>
                    </div>
                    <div class="mb-3">
                        <label for="quantite" class="form-label">Quantité</label>
                        <input type="number" class="form-control" id="quantite" name="quantite" required>
                    </div>
                    <div class="mb-3">
                        <label for="categorie" class="form-label">Catégorie</label>
                        <select class="form-select" id="categorie" name="category" required>
                            <option value="pc">PC</option>
                            <option value="tv">TV</option>
                            <option value="console">Console</option>
                            <option value="electromenager">Électroménager</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="desc" class="form-label">Description</label>
                        <textarea class="form-control" id="desc" name="description" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" name="valider" class="btn btn-primary">Ajouter le produit</button>
                </div>
            </form>
        </div>
    </div>
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
                                <button type="button" class="btn btn-sm btn-warning me-2" data-bs-toggle="modal" data-bs-target="#modifierModal<?= $produit['id'] ?>">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                                <form action="supprimer_produit.php" method="POST" style="display: inline;">
                                    <input type="hidden" name="id" value="<?= $produit['id'] ?>">
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?');">
                                        <i class="fas fa-trash-alt"></i> 
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

<!-- Modifier Modal -->
<?php foreach($Produits as $produit): ?>
    <div class="modal fade" id="modifierModal<?= $produit['id'] ?>" tabindex="-1" aria-labelledby="modifierModalLabel<?= $produit['id'] ?>" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            
            <form method="post" action="modifier_produit.php?id=<?= $produit['id'] ?>" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modifierModalLabel<?= $produit['id'] ?>">Modifier le produit <?= $produit['name'] ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="image" class="form-label">Nouvelle image du produit</label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*" >
                        </div>
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom du produit</label>
                            <input type="text" class="form-control" id="nom" name="name" value="<?= $produit['name'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="prix" class="form-label">Prix</label>
                            <input type="number" class="form-control" id="prix" name="price" value="<?= $produit['price'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="quantite" class="form-label">Quantité</label>
                            <input type="number" class="form-control" id="quantite" name="quantite" value="<?= $produit['quantite'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="categorie" class="form-label">Catégorie</label>
                            <select class="form-select" id="categorie" name="category" required>
                                <option value="pc" <?php if($produit['category'] == 'pc') echo 'selected'; ?>>PC</option>
                                <option value="tv" <?php if($produit['category'] == 'tv') echo 'selected'; ?>>TV</option>
                                <option value="console" <?php if($produit['category'] == 'console') echo 'selected'; ?>>Console</option>
                                <option value="electromenager" <?php if($produit['category'] == 'electromenager') echo 'selected'; ?>>Électroménager</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="desc" class="form-label">Description</label>
                            <textarea class="form-control" id="desc" name="description" required><?= $produit['description'] ?></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        
                        <button type="submit" name="valider_modification" class="btn btn-primary">Enregistrer les modifications</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

</div>
            </section>
            <!-- End Page Content -->
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

function supprimerProduit(id) {
    if (confirm("Êtes-vous sûr de vouloir supprimer ce produit ?")) {
        fetch('supprimer_produit.php?id=' + id, {
            method: 'DELETE'
        })
        .then(response => {
            if (response.ok) {
                location.reload();
            } else {
                alert("Erreur lors de la suppression du produit.");
            }
        })
        .catch(error => {
            console.error('Erreur lors de la suppression du produit :', error);
            alert("Erreur lors de la suppression du produit.");
        });
    }
}
</script>

<script>

//sort (doesnt work here but works in client idk why)
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
    <!-- Add this script at the end of your HTML body -->
<script>
    // filetr
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