<?php
// Include the database connection file
include 'dbconnect.php';

// Start the session
session_start();

// Process the login form data when the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);

    // SQL query to check if the user exists
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Login successful
        // Set session variables
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['email'] = $row['email'];

        // Set a role variable (e.g., "customer")
        $_SESSION['role'] = "customer";

        // Redirect to the user's dashboard or home page
        header("Location: ../home.php");
        exit();
    } else {
        echo "Invalid username or password";
    }
}

// Close the database connection
$conn->close();
?>
