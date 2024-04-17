<?php
session_start();
include 'dbConnect.php';


$name = $_POST['name'];
$comment = $_POST['comment'];
$movie_id = $_GET['id'];

$query = "INSERT INTO comments (name, comment, movie_id) values (:name, :comment, :movie_id)";
$statement = $db->prepare($query);
$statement->bindValue(':name', $name);
$statement->bindValue(':comment', $comment);
$statement->bindValue(':movie_id', $movie_id);

$statement->execute();

header("Location: http://localhost:81/movie/moviedetail.php?id={$_GET['id']}");

