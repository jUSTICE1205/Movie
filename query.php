<?php
function get_all_movies($db)
{
    $query = "SELECT * FROM movies";
    $statement = $db->prepare($query);
    $statement->execute();

    if ($statement->rowCount() > 0) {
        $movies = $statement->fetchAll();
    } else {
        $movies = 0;
    }

    return $movies;
}
function get_movie($db, $id)
{
    // Use single quotes for string literals in SQL queries
    $query = "SELECT * FROM movies WHERE id = $id";

    // Prepare and execute the query
    $statement = $db->prepare($query);
    $statement->execute();

    // Check if any rows were returned
    if ($statement->rowCount() > 0) {
        // Fetch all rows as an associative array
        $movie = $statement->fetchAll(PDO::FETCH_ASSOC);
    } else {
        // No rows found, set $movie to a default value
        $movie = 0;
    }

    // Return the movie data
    return $movie;
}

function get_comments($db, $id)
{
    // Use single quotes for string literals in SQL queries
    $query = "SELECT * FROM comments WHERE movie_id = $id";

    // Prepare and execute the query
    $statement = $db->prepare($query);
    $statement->execute();

    // Check if any rows were returned
    if ($statement->rowCount() > 0) {
        // Fetch all rows as an associative array
        $movieComments = $statement->fetchAll(PDO::FETCH_ASSOC);
    } else {
        // No rows found, set $movie to a default value
        $movieComments = 0;
    }

    // Return the movie data
    return $movieComments;
}