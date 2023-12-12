<?php
// Include the database connection file
include 'dbconnect.php';

// Check if the item ID is provided in the request
if (isset($_GET['id'])) {
    // Sanitize and get the item ID
    $itemId = $conn->real_escape_string($_GET['id']);

    // Fetch item details from the database based on the item ID
    $sql = "SELECT * FROM products WHERE id = '$itemId'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Item found, return details as JSON
        $itemDetails = $result->fetch_assoc();
        echo json_encode($itemDetails);
    } else {
        // Item not found
        echo json_encode(['error' => 'Item not found']);
    }
} else {
    // Item ID not provided
    echo json_encode(['error' => 'Item ID not provided']);
}

// Close the database connection
$conn->close();
?>
