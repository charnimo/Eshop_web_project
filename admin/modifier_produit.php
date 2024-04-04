<?php
require("../config/commandes.php");

if (isset($_POST['valider_modification'])) {
    if (isset($_POST['name'], $_POST['price'], $_POST['quantite'], $_POST['category'], $_POST['description'], $_GET['id'])) {
        $id = $_GET['id'];
        $nom = htmlspecialchars($_POST['name']);
        $prix = floatval($_POST['price']);
        $quantite = intval($_POST['quantite']);
        $categorie = htmlspecialchars($_POST['category']);
        $desc = htmlspecialchars($_POST['description']);

        // Modification du produit
        require("../config/connexion.php"); // Inclure le fichier de connexion

        // Vérifier si un nouveau fichier a été téléchargé
        if (!empty($_FILES['image']['name'])) {
            // Un nouveau fichier a été téléchargé
            $image_temp = $_FILES['image']['tmp_name'];
            $image_name = basename($_FILES['image']['name']);
            // Déplacer le fichier téléchargé vers le dossier de destination
            if (move_uploaded_file($image_temp, "../images/" . $image_name)) {
                // Mettre à jour le chemin de la nouvelle image dans la base de données
                $stmt = $conn->prepare("UPDATE products SET image = ?, name = ?, price = ?, quantite = ?, category = ?, description = ? WHERE id = ?");
                $stmt->bind_param("ssdissi", $image_name, $nom, $prix, $quantite, $categorie, $desc, $id);
            } else {
                echo "Erreur lors du téléchargement de l'image.";
                exit;
            }
        } else {
            // Aucun nouveau fichier téléchargé, récupérer le nom de l'image existante depuis la base de données
            $stmt_image = $conn->prepare("SELECT image FROM products WHERE id = ?");
            $stmt_image->bind_param("i", $id);
            $stmt_image->execute();
            $result_image = $stmt_image->get_result();
            $row_image = $result_image->fetch_assoc();
            $image_name = $row_image['image'];

            // Mettre à jour les autres champs sans changer l'image
            $stmt = $conn->prepare("UPDATE products SET name = ?, price = ?, quantite = ?, category = ?, description = ? WHERE id = ?");
            $stmt->bind_param("ssdissi", $nom, $prix, $quantite, $categorie, $desc, $id);
        }

        if ($stmt->execute()) {
            // Afficher un message de confirmation
            echo "Produit modifié avec succès.";
            // Rafraîchissement de la page après la modification
            header("Location: ../admin/home.php"); // Redirection vers le bon chemin
            exit;
        } else {
            echo "Erreur lors de la modification du produit.";
        }
    }
}
?>
