<?php
// Include the database connection file
include 'dbconnect.php';

// Process the form data when the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs to prevent SQL injection
    $itemName = $conn->real_escape_string($_POST['itemName']);
    $itemDescription = $conn->real_escape_string($_POST['itemDescription']);
    $itemPrice = $conn->real_escape_string($_POST['itemPrice']);

    // File upload handling
    $targetDirectory = "../product_images/";
    
    // Get the file extension
    $imageFileType = strtolower(pathinfo($_FILES["itemImage"]["name"], PATHINFO_EXTENSION));

    // Generate a unique filename with the current timestamp
    $timestamp = time();
    $targetFile = $targetDirectory . $timestamp . "." . $imageFileType;

    $uploadOk = 1;

    // Check if the image file is a actual image or fake image
    $check = getimagesize($_FILES["itemImage"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "Error: File is not an image.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($targetFile)) {
        echo "Error: File already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["itemImage"]["size"] > 500000) {
        echo "Error: File is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    $allowedExtensions = array("jpg", "jpeg", "png", "gif");
    if (!in_array($imageFileType, $allowedExtensions)) {
        echo "Error: Only JPG, JPEG, PNG, and GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Error: File was not uploaded.";
    } else {
        // If everything is ok, try to upload file
        if (move_uploaded_file($_FILES["itemImage"]["tmp_name"], $targetFile)) {
            // Replace "../" with an empty string in the targetFile
            $targetFile = str_replace("../", "", $targetFile);

            // SQL query to insert item data into the database
            $sql = "INSERT INTO products (itemName, itemDescription, itemPrice, itemImage) VALUES ('$itemName', '$itemDescription', '$itemPrice', '$targetFile')";

            // Execute the query
            if ($conn->query($sql) === TRUE) {
                // Item added successfully, display alert and redirect back to the same page
                echo '<script>alert("Item added successfully!");</script>';
                echo '<script>window.location.href = "'.$_SERVER['HTTP_REFERER'].'";</script>';
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Error: There was an error uploading your file.";
        }
    }

}

// Close the database connection
$conn->close();
?>
