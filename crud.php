<?php
if (isset($_POST['addproduct'])) {
    //post data
    $productName = $_POST['productName'];
    $productDescription = $_POST['productDescription'];
    $productPrice = $_POST['productPrice'];
    
    $targetDirectory = "uploads/"; 
    $uploadedFileName = $_FILES["productImage"]["name"]; 
    $customFileName = $_POST['productName']; 
    $fileExtension = pathinfo($uploadedFileName, PATHINFO_EXTENSION);
    $targetFile = $targetDirectory . $customFileName . '_' . date("Y-m-d_His") . '.' . $fileExtension; 

    if (move_uploaded_file($_FILES["productImage"]["tmp_name"], $targetFile)) {

        include 'connection.php';

        $sql = "INSERT INTO produits (name, description, price, image) VALUES ('$productName', '$productDescription', '$productPrice', '$targetFile')";

        if (mysqli_query($conn, $sql)) {
            header("Location: products.php");
            exit; 
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
