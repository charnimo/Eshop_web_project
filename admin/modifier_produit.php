<?php
require("../config/commandes.php");

if (isset($_POST['valider_modification'])) {
    if (isset($_POST['name']) && isset($_POST['price']) && isset($_POST['quantite']) && isset($_POST['category']) && isset($_POST['description']) && isset($_GET['id'])) {
        if (!empty($_POST['name']) && !empty($_POST['price']) && !empty($_POST['quantite']) && !empty($_POST['category']) && !empty($_POST['description']) && !empty($_GET['id'])) {
            $id = $_GET['id'];
            $nom = htmlspecialchars(strip_tags($_POST['name']));
            $prix = htmlspecialchars(strip_tags($_POST['price']));
            $quantite = htmlspecialchars(strip_tags($_POST['quantite']));
            $categorie = htmlspecialchars(strip_tags($_POST['category']));
            $desc = htmlspecialchars(strip_tags($_POST['description']));

            // Modification du produit
            require("../config/connexion.php"); // Inclure le fichier de connexion

            // Vérifier si une nouvelle image a été téléchargée
            if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $image_temp = $_FILES['image']['tmp_name'];
                $image_name = $_FILES['image']['name'];
                // Déplacer le fichier téléchargé vers le dossier de destination
                move_uploaded_file($image_temp, "../images/" . $image_name);
                // Mettre à jour le chemin de l'image dans la base de données
                $stmt = $conn->prepare("UPDATE products SET image = ?, name = ?, price = ?, quantite = ?, category = ?, description = ? WHERE id = ?");
                $stmt->bind_param("ssdsssi", $image_name, $nom, $prix, $quantite, $categorie, $desc, $id);
            } else {
                // Si aucune nouvelle image n'a été téléchargée, mettre à jour les autres champs sans changer l'image
                $stmt = $conn->prepare("UPDATE products SET name = ?, price = ?, quantite = ?, category = ?, description = ? WHERE id = ?");
                $stmt->bind_param("ssdssi", $nom, $prix, $quantite, $categorie, $desc, $id);
            }

            if ($stmt->execute()) {
                // Rafraîchissement de la page après la modification
                header("Location: ../admin/home.php"); // Redirection vers le bon chemin
                exit;
            } else {
                echo "Erreur lors de la modification du produit.";
            }
        }
    }
}
?>
