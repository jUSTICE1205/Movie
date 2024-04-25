<?php
include 'dbConnect.php';

$display = filter_input(INPUT_POST, 'display', FILTER_VALIDATE_INT);
$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

if ($display !== false && $id !== false) {
    $query = "UPDATE comments SET display=:display WHERE id=:id";
    $statement = $db->prepare($query);
    $statement->bindValue(':display', $display);
    $statement->bindValue(':id', $id);
    $statement->execute();
    header("Location: http://localhost:81/movie/commentAdmin.php");
    exit;
} else {
    echo "Invalid display or comment id.";
}
?>