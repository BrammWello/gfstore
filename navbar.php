<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="home.php">Gift Card Store</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact Us</a>
                </li>
            </ul>
            <!-- Cart button and info -->
            <div class="cart-button row align-items-center">
                <button class="btn btn-primary col-auto" onclick="viewCart()">
                    Show Cart <span id="cartCount" class="cart-count">0</span>
                </button>
                <div class="cart-info col text-end">
                    Total: $<span id="cartTotal">0.00</span>
                </div>
            </div>
            <!-- Logout button -->
            <a href="scripts/logout.php" class="btn btn-danger">Logout</a>
        </div>
    </div>
</nav>
