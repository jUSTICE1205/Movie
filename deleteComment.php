<?php

include 'dbConnect.php';


$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);



// Build the parameterized SQL query and bind sanitized values to the parameters
$query = "DELETE FROM comments WHERE id=:id";
$statement = $db->prepare($query);

$statement->bindValue(':id', $id);

// Execute the INSERT prepared statement.
$statement->execute();
header("Location: http://localhost:81/movie/commentAdmin.php");
exit;
