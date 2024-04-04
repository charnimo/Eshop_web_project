<?php

require("connexion.php"); // Inclure le fichier de connexion

function ajouter($name, $description, $price, $image, $category, $quantite)
{
    global $conn; // Utiliser la connexion définie dans connexion.php

    $stmt = $conn->prepare("INSERT INTO products (name, description, price, image, category, quantite) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssdssi", $name, $description, $price, $image, $category, $quantite);
    $stmt->execute();
    $stmt->close();
}

function modifier($name, $description, $price, $image, $category, $quantite, $id)
{
    global $conn;

    $stmt = $conn->prepare("UPDATE products SET name = ?, description = ?, price = ?, image = ?, category = ?, quantite = ?  WHERE id = ?");
    $stmt->bind_param("ssdssii", $name, $description, $price, $image, $category, $quantite, $id);
    $stmt->execute();
    $stmt->close();
}

function supprimer($id)
{
    global $conn;

    $stmt = $conn->prepare("DELETE FROM products WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}

function afficher()
{
    global $conn;

    $result = $conn->query("SELECT * FROM products ORDER BY id DESC");
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    return $data;
}

?>
