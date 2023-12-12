<?php
// Include the database connection file
include 'dbconnect.php';

// Check if the item ID is provided in the URL
if (isset($_GET['id'])) {
    $itemId = $_GET['id'];

    // Prepare a SQL statement to delete the item
    $sql = "DELETE FROM products WHERE id = $itemId";

    // Execute the SQL statement
    if ($conn->query($sql) === TRUE) {
        // Item deleted successfully
        echo '<script>alert("Item deleted successfully!");</script>';
    } else {
        // Error in deleting the item
        echo '<script>alert("Error deleting item: ' . $conn->error . '");</script>';
    }

    // Close the database connection
    $conn->close();
} else {
    // Redirect to the delete_items.php page if no item ID is provided
    header('Location: ../delete.php');
    exit();
}

// Redirect back to the delete_items.php page
echo '<script>window.location.href = "../delete.php";</script>';
?>
