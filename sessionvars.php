<?php
// Start the session
session_start();

// Assuming you have some session variables set

// Display all session variables
foreach ($_SESSION as $key => $value) {
    echo $key . " = " . $value . "<br>";
}
?>
