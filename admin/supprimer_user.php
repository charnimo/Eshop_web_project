<?php
require("../config/commandes.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    supprimer2($id);
}

header("Location: ../admin/dashboard.php"); // Correction ici : rediriger vers le bon chemin
exit;
?>
