<?php
if (isset($_POST['addproduct'])) {
    // Retrieving form data
    $productName = $_POST['productName'];
    $productDescription = $_POST['productDescription'];
    $productPrice = $_POST['productPrice'];

    // Handling file upload
    $targetDirectory = "uploads/"; // Change this to your desired directory
    $targetFile = $targetDirectory . basename($_FILES["productImage"]["name"]);

    if (move_uploaded_file($_FILES["productImage"]["tmp_name"], $targetFile)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["productImage"]["name"])). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

    // Now you can process the form data and perform database operations as needed
}
?>
