<?php
include 'dbConnect.php';

if (isset($_POST['id'])) {
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    if ($id !== false) {
        $query = "DELETE FROM comments WHERE id=:id";
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        if ($statement->execute()) {
            header("Location: http://localhost:81/movie/commentAdmin.php");
            exit;
        } else {
            echo "Error deleting comment.";
        }
    } else {
        echo "Invalid comment id.";
    }
} else {
    echo "Comment id is missing.";
}
?>