<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Payment</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }

        .payment-form {
            max-width: 400px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="container">
        <h2 class="text-center mb-4">Payment</h2>
        <div class="payment-form">
            <form>
                <div class="form-group">
                    <label for="cardNumber">Card Number</label>
                    <input type="text" class="form-control" id="cardNumber" placeholder="Enter card number">
                </div>
                <div class="form-group">
                    <label for="expirationDate">Expiration Date</label>
                    <input type="text" class="form-control" id="expirationDate" placeholder="MM/YY">
                </div>
                <div class="form-group">
                    <label for="cvv">CVV</label>
                    <input type="text" class="form-control" id="cvv" placeholder="Enter CVV">
                </div>
                <div class="form-group">
                    <label for="cardHolderName">Cardholder Name</label>
                    <input type="text" class="form-control" id="cardHolderName" placeholder="Enter cardholder name">
                </div>
                <button type="button" class="btn btn-primary btn-block" onclick="placeOrder()">Place Order</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    function placeOrder() {
        // Display an alert
        alert("Order placed successfully");

        window.location.href = 'home.php';
    }
</script>
</body>
</html>
