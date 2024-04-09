<?php

require("../connection.php"); // Include the connection file

function ajouter($name, $description, $price, $image, $category, $quantite, $pdo)
{
    $stmt = $pdo->prepare("INSERT INTO products (name, description, price, image, category, quantite) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$name, $description, $price, $image, $category, $quantite]);
}

function modifier($name, $description, $price, $image, $category, $quantite, $id, $pdo)
{
    $stmt = $pdo->prepare("UPDATE products SET name = ?, description = ?, price = ?, image = ?, category = ?, quantite = ?  WHERE id = ?");
    $stmt->execute([$name, $description, $price, $image, $category, $quantite, $id]);
}

function supprimer($id, $pdo)
{
    // Fetch the image name
    $stmt = $pdo->prepare("SELECT image FROM products WHERE id=?");
    $stmt->execute([$id]);
    $row = $stmt->fetch();

    // Delete the image file from the uploads folder
    if ($row && file_exists('../images/' . $row['image'])) {
        unlink('../images/' . $row['image']);
    }

    // Delete the record from the database
    $stmt = $pdo->prepare("DELETE FROM products WHERE id=?");
    $stmt->execute([$id]);
}


function supprimer2($id, $pdo)
{
    $stmt = $pdo->prepare("DELETE FROM users WHERE id=?");
    $stmt->execute([$id]);
}

function afficher($pdo)
{
    $stmt = $pdo->query("SELECT * FROM products ORDER BY id DESC");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>
