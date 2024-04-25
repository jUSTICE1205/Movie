<?php
session_start();
include 'dbConnect.php';

if (isset($_POST['name'], $_POST['comment'], $_GET['id'])) {
    // Validate and sanitize input data
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_STRING);
    $movie_id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

    // Check if all inputs are valid
    if ($name !== false && $comment !== false && $movie_id !== false) {
        $query = "INSERT INTO comments (name, comment, movie_id) VALUES (:name, :comment, :movie_id)";
        $statement = $db->prepare($query);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':comment', $comment);
        $statement->bindValue(':movie_id', $movie_id);
        $statement->execute();

        header("Location: http://localhost:81/movie/moviedetail.php?id=$movie_id");
        exit;
    } else {
        echo "Invalid input data.";
    }
} else {
    echo "Required fields are missing.";
}
?>