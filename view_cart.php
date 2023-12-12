<?php
// Check if cartItems is set in the POST request
if (isset($_POST['cartItems'])) {
    // Retrieve and decode the cart items from the POST request
    $cartItems = json_decode($_POST['cartItems'], true);
} else {
    // If cartItems is not set, redirect to the home page
    header("Location: home.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>View Cart</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }

        .cart-item {
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
        }

        .totals {
            margin-top: 20px;
            font-weight: bold;
        }

        .proceed-to-payment {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="container">
        <h2 class="text-center mb-4">Shopping Cart</h2>
        <!-- Display cart items -->
        <?php foreach ($cartItems as $item): ?>
            <div class="cart-item">
                <h4><?php echo $item['itemName']; ?></h4>
                <p>Description: <?php echo $item['itemDescription']; ?></p>
                <p>Price: $<?php echo $item['itemPrice']; ?></p>
            </div>
        <?php endforeach; ?>

        <!-- Display totals, tax, and grand total -->
        <div class="totals">
            <p>Total Items: <?php echo count($cartItems); ?></p>
            <p>Subtotal: $<?php echo calculateSubtotal($cartItems); ?></p>
            <p>Tax (16%): $<?php echo calculateTax($cartItems); ?></p>
            <p>Grand Total: $<?php echo calculateGrandTotal($cartItems); ?></p>
        </div>

        <!-- Proceed to Payment button -->
        <div class="proceed-to-payment">
            <button class="btn btn-primary btn-block" onclick="window.location.href='payment.php'">Proceed to Payment</button>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Your existing scripts -->
    <script>
        // Your existing scripts here
    </script>
</body>
</html>

<?php
// Function to calculate the subtotal of cart items
function calculateSubtotal($cartItems) {
    return array_reduce($cartItems, function ($carry, $item) {
        return $carry + $item['itemPrice'];
    }, 0);
}

// Function to calculate the tax (16% of the subtotal)
function calculateTax($cartItems) {
    $subtotal = calculateSubtotal($cartItems);
    $taxRate = 0.16; // 16%
    return number_format($subtotal * $taxRate, 2);
}

// Function to calculate the grand total (subtotal + tax)
function calculateGrandTotal($cartItems) {
    $subtotal = calculateSubtotal($cartItems);
    $tax = calculateTax($cartItems);
    return number_format($subtotal + $tax, 2);
}
?>
