<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }

        .card {
            margin: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add Item</h5>
                        <p class="card-text">Add a new item to the inventory.</p>
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addItemModal">Go to Add Item</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">View Items</h5>
                        <p class="card-text">View the list of all items in the inventory.</p>
                        <a href="viewitems.php" class="btn btn-primary">Go to View Items</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Delete Item</h5>
                        <p class="card-text">Delete an item from the inventory.</p>
                        <a href="delete.php" class="btn btn-primary">Go to Delete Item</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Item</h5>
                        <p class="card-text">Edit details of an existing item.</p>
                        <a href="scripts/logout.php" class="btn btn-danger">Log Out</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Item Modal -->
    <div class="modal fade" id="addItemModal" tabindex="-1" role="dialog" aria-labelledby="addItemModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addItemModalLabel">Add New Item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="scripts/add_item.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="itemName">Item Name</label>
                            <input type="text" class="form-control" id="itemName" name="itemName" required>
                        </div>
                        <div class="form-group">
                            <label for="itemDescription">Item Description</label>
                            <textarea class="form-control" id="itemDescription" name="itemDescription" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="itemPrice">Item Price</label>
                            <input type="number" class="form-control" id="itemPrice" name="itemPrice" step="0.01" required>
                        </div>
                        <div class="form-group">
                            <label for="itemImage">Item Image</label>
                            <input type="file" class="form-control-file" id="itemImage" name="itemImage" accept="image/*" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Add Item</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
