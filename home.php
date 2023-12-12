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
    <?php include 'navbar.php'; ?>
    <div class="container">
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
                            <button class="btn btn-primary btn-block btn-add-to-cart" data-itemid="<?php echo $row['id']; ?>">
                                Add to Cart
                            </button>
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

<script>
    // Array to store cart items
    let cartItems = [];

    // Function to handle "Add to Cart" button click
    async function addToCart(itemId) {
        try {
            // Fetch item details from the server based on the item ID
            const response = await fetch(`scripts/get_item_details.php?id=${itemId}`);
            const itemDetails = await response.json();

            // Add item to the cart array
            cartItems.push(itemDetails);

            // Update the cart information
            updateCartInfo();

            // Log the cart items to the console (you can remove this in production)
            console.log('Cart Items:', cartItems);
        } catch (error) {
            console.error('Error fetching item details:', error);
        }
    }

    // Function to update the cart information
    function updateCartInfo() {
        // Get the cart info elements
        const cartCountElement = document.getElementById('cartCount');
        const cartTotalElement = document.getElementById('cartTotal');

        // Update the cart count and total
        cartCountElement.innerText = cartItems.length;
        cartTotalElement.innerText = calculateTotalPrice(cartItems);
    }

    // Function to calculate the total price of items in the cart
    function calculateTotalPrice(cart) {
        // Calculate the total price based on the actual item prices
        return cart.reduce((total, item) => total + parseFloat(item.itemPrice), 0).toFixed(2);
    }

    // Attach click event to all "Add to Cart" buttons
    document.addEventListener('DOMContentLoaded', function () {
        const addToCartButtons = document.querySelectorAll('.btn-add-to-cart');
        addToCartButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                // Get the item ID from the data-itemid attribute
                const itemId = this.getAttribute('data-itemid');

                // Call the addToCart function with the item ID
                addToCart(itemId);
            });
        });
    });

    function viewCart() {
        // Convert the cartItems array to a JSON string
        const cartItemsJSON = JSON.stringify(cartItems);

        // Create a form dynamically
        const form = document.createElement('form');
        form.method = 'post';
        form.action = 'view_cart.php';

        // Create an input field to hold the cartItems JSON
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'cartItems';
        input.value = cartItemsJSON;

        // Add the input field to the form
        form.appendChild(input);

        // Add the form to the document and submit it
        document.body.appendChild(form);
        form.submit();
    }
</script>

    


    

    <!-- Modal for cart content -->
    <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cartModalLabel">Shopping Cart</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Cart content goes here -->
                    <!-- You can dynamically generate cart item details based on the items in the cart array -->
                    <p>Cart is empty.</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
