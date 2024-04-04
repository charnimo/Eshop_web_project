<?php

require("../config/commandes.php");

// Traitement de l'ajout de produit
if (isset($_POST['valider'])) {
    if (isset($_FILES['image']['name'], $_POST['name'], $_POST['description'], $_POST['price'], $_POST['category'])) {
        $image_name = $_FILES['image']['name'];
        $image_temp = $_FILES['image']['tmp_name'];

        // Vérifier si aucune erreur lors de l'envoi du fichier
        if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
            // Déplacer le fichier téléchargé vers le dossier de destination
            if (move_uploaded_file($image_temp, "../images/" . $image_name)) {
                // Récupérer les autres données du formulaire
                $nom = htmlspecialchars(strip_tags($_POST['name']));
                $desc = htmlspecialchars(strip_tags($_POST['description']));
                $prix = htmlspecialchars(strip_tags($_POST['price']));
                $categorie = htmlspecialchars(strip_tags($_POST['category']));
                // Supposons que la quantité ne provient pas du formulaire, on la met à 0 par défaut
                $quantite = 0;

                // Ajouter le produit avec le chemin de l'image
                ajouter($nom, $desc, $prix, $image_name, $quantite, $categorie);

                // Rafraîchissement de la page après l'ajout
                header("Location: home.php");
                exit;
            } else {
                echo "Erreur lors du déplacement du fichier.";
            }
        } else {
            echo "Erreur lors du téléchargement de l'image.";
        }
    } else {
        echo "Tous les champs du formulaire doivent être remplis.";
    }
}

// Récupérer les produits
$Produits = afficher();

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

    <!-- Ajout de vos styles CSS personnalisés -->
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
    background-color:black; /* Couleur de fond de la sidebar */
    padding-top: 70px; /* Ajustement pour compenser la navbar */
    height: 100vh; /* Hauteur de la sidebar */
    position: fixed; /* Pour rester fixe même en faisant défiler */
    top: 0;
    left: 0;
    width: 250px; /* Largeur de la sidebar */
    overflow-y: auto; /* Permettre le défilement vertical si nécessaire */
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
    max-width: 100%; /* Limite la largeur de l'image à 100% de la largeur du conteneur */
    max-height: 200px; /* Limite la hauteur de l'image à 400 pixels */
}
.col-divider {
    border-right: 1px solid #ccc; /* Ajoute une bordure à droite */
}


    </style>
</head>
<body>
    <main>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">SHOP</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="homepage.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="products.php">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cart.php">Cart</a>
                </li>
                <?php
                if (isset($_SESSION['admin']) || isset($_SESSION['user'])) {
                    echo '<li class="nav-item">
                    <a class="nav-link" href="/Eshop_web_project/logout.php">Logout</a>
                </li>';
                } else {
                    echo '<li class="nav-item">
                    <a class="nav-link" href="/Eshop_web_project/login.php">Login</a>
                    </li>';
                }
                ?>
            </ul>
            <div id="user-status" class="ml-3">
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
        </div>
    </div>
</nav>

        <div class="wrapper expanded">
            <!-- Sidebar -->
            <aside id="sidebar">
    <div class="h-100">
        
        <!-- Sidebar Navigation -->
        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Tools & Components
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link">
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

            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#auth"
                    aria-expanded="false" aria-controls="auth">
                    <i class="fa-regular fa-user pe-2"></i>
                    Auth
                </a>
                <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">Login</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">Register</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-header">
                Multi Level Nav
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#multi"
                    aria-expanded="false" aria-controls="multi">
                    <i class="fa-solid fa-share-nodes pe-2"></i>
                    Multi Level
                </a>
                <ul id="multi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse"
                            data-bs-target="#multi-two" aria-expanded="false" aria-controls="multi-two">
                            Two Links
                        </a>
                        <ul id="multi-two" class="sidebar-dropdown list-unstyled collapse">
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">Link 1</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">Link 2</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</aside>




<main>
    <!-- Contenu principal -->
    <div class="main">
        <!-- Contenu de la page d'accueil -->
        <main class="content px-3 py-2">
            <!-- Conteneur des boutons avec une marge supérieure plus importante -->
            <div class="mt-5">
                <!-- Bouton Ajouter un nouveau produit -->
                <button type="button" class="btn btn-success text-left" data-bs-toggle="modal" data-bs-target="#ajouterProduitModal">
                    <i class="fas fa-plus"></i> Ajouter un produit
                </button>

                <!-- Bouton tri -->
                <div class="dropdown d-inline-block ms-2">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fas fa-sort-amount-up-alt"></i> Sort
    </button>
    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton" style="background-color: #f8f9fa;">
        <li><a class="dropdown-item" href="#" id="prixCroissant"><i class="fas fa-sort-amount-up"></i> Price ascending</a></li>
        <li><a class="dropdown-item" href="#" id="prixDécroissant"><i class="fas fa-sort-amount-down"></i> Price descending</a></li>
    </ul>
</div>


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
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php foreach($Produits as $produit): ?>
                <div class="col" data-categorie="<?= $produit['category'] ?>"  data-prix="<?= $produit['price'] ?>">
                    <div class="card shadow-lg h-100 rounded-4">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div style="text-align: center;">
                                <h5 class="card-title" style="font-family: 'Times New Roman', Times, serif; font-weight: bold;"><?= $produit['name'] ?></h5>
                                <!-- Assurez-vous que le chemin de l'image est correct -->
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
                                <button type="button" class="btn btn-sm btn-danger" onclick="supprimerProduit(<?= $produit['id'] ?>)">
                                    <i class="fas fa-trash-alt"></i> 
                                </button>
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

<!-- Modals pour afficher la description complète et modifier le produit -->
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
                            <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
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

</main>
            </div>
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

$(document).ready(function() {
    $('.filter-category').click(function() {
        var category = $(this).data('category'); // Utilisation de data-category
        $('.row .col').each(function() {
            var productCategory = $(this).data('category');
            if (category === 'Tous les produits' || productCategory === category) { // Vérification de la catégorie sélectionnée
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });
});
$(document).ready(function() {
    $('.dropdown-item').click(function() {
        var order = $(this).attr('id');
        if (order === 'prixCroissant') {
            trierProduits('ascending');
        } else if (order === 'prixDécroissant') {
            trierProduits('descending');
        }
    });
});

function trierProduits(order) {
    var $produits = $('.row .col').get();
    $produits.sort(function(a, b) {
        var priceA = parseFloat($(a).data('prix'));
        var priceB = parseFloat($(b).data('prix'));
        if (order === 'ascending') {
            return priceA - priceB;
        } else {
            return priceB - priceA;
        }
    });
    $.each($produits, function(index, element) {
        $('.row').append(element);
    });
}







</script>
    
</body>
</html>