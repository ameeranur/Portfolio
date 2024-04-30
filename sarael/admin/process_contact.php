<?php
include 'connection.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the 'txtMsg' key exists in $_POST array
    if (isset($_POST['txtMsg'])) {
        // Escape user inputs to prevent SQL injection
        $name = $conn->real_escape_string($_POST['txtName']);
        $email = $conn->real_escape_string($_POST['txtEmail']);
        $phone = $conn->real_escape_string($_POST['txtPhone']);
        $message = $conn->real_escape_string($_POST['txtMsg']);

        // Insert user inputs into database
        $sql = "INSERT INTO contact_section (name, email, phone, message) VALUES ('$name', '$email', '$phone', '$message')";

        
    } else {
        echo "Error: 'txtMsg' key is not set in the POST data.";
    }
}

// Close connection
$conn->close();
?>
