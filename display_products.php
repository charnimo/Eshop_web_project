<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-..."></script>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    .container-fluid {
        padding: 0;
        margin: 0;
    }

    .row {
        margin: 0;
    }

    /* Modal Body CSS */
    .modal-body {
        padding: 20px;
    }

    /* Product Image CSS */
    .product-image {
        width: 100%;
        height: auto;
        cursor: pointer;
        transition: transform .3s;
    }

    .product-image:hover {
        transform: scale(1.1);
    }

    /* Product Details CSS */
    .product-details {
        margin-top: 20px;
    }

    .product-card {
        transition: transform .3s;
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.15);
    }

    .product-card .card {
        border: none;
        border-radius: 5px;
    }

    .product-card .card-img-top {
        border-radius: 5px 5px 0 0;
    }

    .product-card .card-body {
        padding: 15px;
    }

    .product-card .card-title {
        margin-bottom: 5px;
        font-weight: 600;
    }

    .product-card .card-text {
        font-weight: 500;
        color: #4a4a4a;
    }

    /* Sidebar CSS */
    .sidebar {
        background-color: #f8f9fa;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    }

    .sidebar h4 {
        margin-bottom: 20px;
        font-weight: 600;
    }

    .category-list {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    .category-list li {
        margin-bottom: 10px;
    }

    .category-btn {
        background-color: transparent;
        border: none;
        color: #4a4a4a;
        padding: 0;
        font-size: 14px;
        transition: color .3s;
    }

    .category-btn:hover {
        color: #007bff;
    }

    .btn-sort {
        width: 100%;
        margin-bottom: 10px;
    }

    /* Adjustments for sidebar on the left */
    @media (min-width: 992px) {
        .sidebar {
            position: fixed;
            top: 100px;
            left: 0;
            height: calc(100vh - 70px);
            overflow-y: auto;
            width: 250px;
            z-index: 1000;
        }

        .col-md-9 {
            margin-left: 250px;
        }
    }
</style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="sidebar">
                    <h4>Filter by Category</h4>
                    <ul class="category-list">
                        <li><button class="btn btn-link category-btn" data-category="all">All</button></li>
                        <li><button class="btn btn-link category-btn" data-category="TV">TV</button></li>
                        <li><button class="btn btn-link category-btn" data-category="PC">PC</button></li>
                        <li><button class="btn btn-link category-btn" data-category="Electronics">Electronics</button></li>
                        <li><button class="btn btn-link category-btn" data-category="Consoles">Consoles</button></li>
                    </ul>

                    <h4>Sort by Price</h4>
                    <button class="btn btn-secondary btn-sort" id="sort-asc">Low to High</button>
                    <button class="btn btn-secondary btn-sort" id="sort-desc">High to Low</button>
                </div>
            </div>
            <div class="col-md-9">
                <div class="container">
                    
                    <div class="row" id="product-container">
                        <?php
                        include 'connection.php'; 

                        $sql = "SELECT * FROM products";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <div class="col-md-4 mb-4 product-card" data-category="<?php echo $row['category']; ?>">
                                    <div class="card">
                                        <img src="<?php echo $row['image']; ?>" class="card-img-top product-image" alt="<?php echo $row['name']; ?>" data-bs-toggle="modal" data-bs-target="#descriptionModal-<?php echo $row['id']; ?>">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $row['name']; ?></h5>
                                            <p class="card-text">Price: $<?php echo $row['price']; ?></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="descriptionModal-<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="descriptionModalLabel-<?php echo $row['id']; ?>" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="descriptionModalLabel-<?php echo $row['id']; ?>"><?php echo $row['name']; ?> - Description</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <img src="<?php echo $row['image']; ?>" class="img-fluid" alt="<?php echo $row['name']; ?>">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p><strong>Name:</strong> <?php echo $row['name']; ?></p>
                                                        <p><strong>Price:</strong> $<?php echo $row['price']; ?></p>
                                                        <p><strong>Description:</strong></p>
                                                        <p><?php echo $row['description']; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        } else {
                            echo "No products found";
                        }

                        mysqli_close($conn);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-..." crossorigin="anonymous"></script>
    <script>
    $(document).ready(function () {
        $('.category-btn').click(function () {
            var category = $(this).data('category');
            $('.product-card').removeClass('d-none');
            if (category !== 'all') {
                $('.product-card').not('[data-category="' + category + '"]').addClass('d-none');
            }
        });
        $('#sort-asc').click(function () {
            var products = $('.product-card').get();
            products.sort(function(a, b) {
                var priceA = parseFloat($(a).find('.card-text').text().replace('Price: $', ''));
                var priceB = parseFloat($(b).find('.card-text').text().replace('Price: $', ''));
                return priceA - priceB;
            });
            $('#product-container').empty(); 
            $.each(products, function(index, element) {
                $('#product-container').append(element);
            });
        });

        $('#sort-desc').click(function () {
            var products = $('.product-card').get();
            products.sort(function(a, b) {
                var priceA = parseFloat($(a).find('.card-text').text().replace('Price: $', ''));
                var priceB = parseFloat($(b).find('.card-text').text().replace('Price: $', ''));
                return priceB - priceA;
            });
            $('#product-container').empty();
            $.each(products, function(index, element) {
                $('#product-container').append(element);
            });
        });
    });
</script>

</body>
</html>
