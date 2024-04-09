<?php
require("../config/commandes.php");

if (isset($_POST['valider_modification'])) {
    if (isset($_POST['name'], $_POST['price'], $_POST['quantite'], $_POST['category'], $_POST['description'], $_GET['id'])) {
        if (!empty($_POST['name']) && !empty($_POST['price']) && !empty($_POST['quantite']) && !empty($_POST['category']) && !empty($_POST['description']) && !empty($_GET['id'])) {
            $id = $_GET['id'];
            $nom = htmlspecialchars(strip_tags($_POST['name']));
            $prix = htmlspecialchars(strip_tags($_POST['price']));
            $quantite = htmlspecialchars(strip_tags($_POST['quantite']));
            $categorie = htmlspecialchars(strip_tags($_POST['category']));
            $desc = htmlspecialchars(strip_tags($_POST['description']));

            require("../connection.php"); 

            try {
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
                    $image_temp = $_FILES['image']['tmp_name'];
                    $image_name = $_FILES['image']['name'];
                    move_uploaded_file($image_temp, "../images/" . $image_name);
                    $stmt = $pdo->prepare("UPDATE products SET image = ?, name = ?, price = ?, quantite = ?, category = ?, description = ? WHERE id = ?");
                    $stmt->execute([$image_name, $nom, $prix, $quantite, $categorie, $desc, $id]);
                } else {

                    $stmt = $pdo->prepare("UPDATE products SET name = ?, price = ?, quantite = ?, category = ?, description = ? WHERE id = ?");
                    $stmt->execute([$nom, $prix, $quantite, $categorie, $desc, $id]);
                }
                header("Location: ../admin/home.php"); 
                exit;
            } catch (PDOException $e) {
                echo "Erreur lors de la modification du produit: " . $e->getMessage();
            }
        }
    }
}
?>
