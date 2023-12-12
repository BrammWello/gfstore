<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Home</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }

        .card {
            max-width: 200px; /* Set the maximum width for consistent card size */
            margin: 10px;
        }

        .card-img-top {
            max-height: 150px; /* Set the maximum height for consistent image size */
            object-fit: cover; /* Ensure the image retains its aspect ratio within the container */
        }

        .btn-add-to-cart {
            cursor: pointer;
        }

        .cart-button {
            position: relative;
        }

        .cart-count {
            position: absolute;
            top: -10px;
            left: -10px;
            background-color: red;
            color: white;
            border-radius: 50%;
            padding: 5px 8px;
            font-size: 12px;
        }

        .cart-info {
            margin-right: 15px;
            color: white;
        }
    </style>
</head>
<body>

    <div class="container">
        <a href="adminpage.php" class="btn btn-primary">Go back to dashboard</a>
        <h2 class="text-center mb-4">Product Catalog</h2>
        <div class="row" id="productRow">
            <?php
            // Include the database connection file
            include 'scripts/dbconnect.php';

            // Fetch product data from the database
            $sql = "SELECT * FROM products";
            $result = $conn->query($sql);

            // Loop through the product data
            while ($row = $result->fetch_assoc()) {
                ?>
                <div class="col-md-3">
                    <div class="card">
                        <img src="<?php echo $row['itemImage']; ?>" class="card-img-top" alt="Product Image">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['itemName']; ?></h5>
                            <p class="card-text"><?php echo $row['itemDescription']; ?></p>
                            <p class="card-text">Price: $<?php echo $row['itemPrice']; ?></p>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>


   <!-- Bootstrap JS and dependencies (optional) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>
