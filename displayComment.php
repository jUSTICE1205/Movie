<?php

include 'dbConnect.php';


$display = filter_input(INPUT_POST, 'display', FILTER_VALIDATE_INT);
$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);



// Build the parameterized SQL query and bind sanitized values to the parameters
$query = "UPDATE comments SET display=:display WHERE id=:id";
$statement = $db->prepare($query);

$statement->bindValue(':display', $display);
$statement->bindValue(':id', $id);

// Execute the INSERT prepared statement.
$statement->execute();
header("Location: http://localhost:81/movie/commentAdmin.php");
exit;
