<?php
require("../config/commandes.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];
    supprimer($id, $pdo);
}

header("Location: ../admin/home.php"); 
exit;
?>
