<?php

// Replace these values with your actual database credentials
$hostname = "localhost";
$username = "root";
$password = "";
$database = "giftcardstore";

// Create a database connection
$conn = new mysqli($hostname, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
