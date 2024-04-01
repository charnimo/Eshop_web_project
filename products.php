
<?php
    //admin bark yod5el lel products.php

    session_start();
    if (isset($_SESSION['admin'])) 
    {
        //do nothing

    }
    else if(isset($_SESSION['user'])  )
    {
        header("Location: userproduct.php");
        exit();
    }
    else
    {
        header("Location: forbidden.php");
        exit();
    }
    include 'navbar1.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminProducts</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-..." crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-..."></script>
</head>
<body style="padding-top: 40px;">
    <div class="container bg-light text-light p-3 rounded my-4">
        <div class="d-flex align-items-center justify-content-between">
        
            <h2>
                
            </h2>
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addproduct"><i class="fas fa-plus"></i></button>
        </div>
        
    </div>
    <div class=id="productList">
        <?php include 'display_products.php'; ?>
    </div>


    <div class="modal fade" id="addproduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form action="crud.php" method="post" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Product Name</span>
                            <input type="text" class="form-control" placeholder="Enter product name" aria-label="Product Name" name="productName">
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text">Product Description</span>
                            <textarea class="form-control" placeholder="Enter product description" aria-label="Product Description" name="productDescription"></textarea>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text">Product Price</span>
                            <input type="text" class="form-control" placeholder="Enter product price" aria-label="Product Price" min="1" name="productPrice">
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="productCategory">Product category</label>
                                <select class="form-select" id="productCategory" name="productCategory">
                                    <option value="TV">TV</option>
                                    <option value="PC">PC</option>
                                    <option value="Electronics">Electronics</option>
                                    <option value="Consoles">Consoles</option>
                                </select>
                        </div>


                        <div class="mb-3">
                            <label for="productImage" class="form-label">Product Image</label>
                            <div class="input-group">
                                <input type="file" class="form-control" id="productImage" aria-describedby="inputGroupFileAddon" name="productImage">
                                <label class="input-group-text" for="productImage">Upload</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="addproduct">ADD</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
    
    

</body>
</html>
