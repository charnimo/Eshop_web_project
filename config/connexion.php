<?php

$host = 'localhost';
$dbname = 'eshopweb'; // Le nom de ta base de données
$username = 'root'; // Ton nom d'utilisateur MySQL
$password = ''; // Ton mot de passe MySQL

// Connexion à la base de données
$conn = new mysqli($host, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Définir le jeu de caractères à utf8 si nécessaire
if (!$conn->set_charset("utf8")) {
    printf("Erreur lors du chargement du jeu de caractères utf8 : %s\n", $conn->error);
    exit();
}

// Code supplémentaire peut être ajouté ici

?>
