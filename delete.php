<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Delete Items</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }

        .btn-delete {
            cursor: pointer;
        }
    </style>
</head>
<body>
    
    <div class="container">
        <a href="adminpage.php" class="btn btn-primary">Go back to dashboard</a>
        <h2 class="text-center mb-4">Delete Items</h2>

        <?php
        // Include the database connection file
        include 'scripts/dbconnect.php';

        // Fetch product data from the database
        $sql = "SELECT * FROM products";
        $result = $conn->query($sql);

        // Display a table with product data
        if ($result->num_rows > 0) {
            echo '<table class="table">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>ID</th>';
            echo '<th>Item Name</th>';
            echo '<th>Item Description</th>';
            echo '<th>Item Price</th>';
            echo '<th>Action</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row['id'] . '</td>';
                echo '<td>' . $row['itemName'] . '</td>';
                echo '<td>' . $row['itemDescription'] . '</td>';
                echo '<td>$' . $row['itemPrice'] . '</td>';
                echo '<td><button class="btn btn-danger btn-delete" data-itemid="' . $row['id'] . '">Delete</button></td>';
                echo '</tr>';
            }

            echo '</tbody>';
            echo '</table>';
        } else {
            echo '<p>No items found.</p>';
        }

        // Close the database connection
        $conn->close();
        ?>

        <!-- Bootstrap JS and dependencies (optional) -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

        <script>
            // Attach click event to all "Delete" buttons
            const deleteButtons = document.querySelectorAll('.btn-delete');
            deleteButtons.forEach(function (button) {
                button.addEventListener('click', function () {
                    // Get the item ID from the data-itemid attribute
                    const itemId = this.getAttribute('data-itemid');

                    // Redirect to the delete script with the item ID
                    window.location.href = 'scripts/delete_script.php?id=' + itemId;
                });
            });
        </script>
    </div>
</body>
</html>
