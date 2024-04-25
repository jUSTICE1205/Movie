<?php
// Allow requests from any origin
header("Access-Control-Allow-Origin: *");

// Allow specific headers and methods
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: POST");

// Handle form submission
// Include dbConnect.php for database connection
include 'dbConnect.php';

// Get and sanitize form data
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

// Validate email
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    // Prepare and execute the SQL query to insert data into the database
    $query = "INSERT INTO contact (name, email, message) VALUES (:name, :email, :message)";
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':message', $message);

    if ($statement->execute()) {
        // Data inserted successfully
        echo "Data inserted successfully";
    } else {
        // Error occurred while inserting data
        echo "Error inserting data";
    }
} else {
    // Invalid email format
    echo "Invalid email format";
}
?>