<?php
// Include the database connection file
include 'dbconnect.php';

// Process the form data when the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs to prevent SQL injection
    $name = $conn->real_escape_string($_POST['name']);
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']); // No hashing

    // Check if username and email are unique
    $checkUnique = "SELECT * FROM admins WHERE username = '$username' OR email = '$email'";
    $result = $conn->query($checkUnique);

    if ($result->num_rows > 0) {
        // Display an error if username or email already exist
        echo "Error: Username or email is already taken. Please choose a different one.";
    } else {
        // SQL query to insert user data into the database
        $insertQuery = "INSERT INTO admins (name, username, email, password) VALUES ('$name', '$username', '$email', '$password')";

        // Execute the query
        if ($conn->query($insertQuery) === TRUE) {
            // Redirect to login.php after successful signup
            header("Location: ../loginadmin.php");
            exit();
        } else {
            echo "Error: " . $insertQuery . "<br>" . $conn->error;
        }
    }
}

// Close the database connection
$conn->close();
?>
