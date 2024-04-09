<?php
require("../config/commandes.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];
    supprimer2($id, $pdo);
}

header("Location: ../admin/dashboard.php");
exit;
?>
