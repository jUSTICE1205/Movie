<?php
// Allow requests from any origin
header("Access-Control-Allow-Origin: *");

// Allow specific headers and methods
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: POST");

// Handle form submission
// Include dbConnect.php for database connection
include 'dbConnect.php';

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

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