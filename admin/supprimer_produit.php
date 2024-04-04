<?php
require("../config/commandes.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    supprimer($id);
}

header("Location: ../admin/home.php"); // Correction ici : rediriger vers le bon chemin
exit;
?>
