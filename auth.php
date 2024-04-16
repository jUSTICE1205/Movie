<?php
session_start();

if (isset($_POST['email']) && isset($_POST['password']) && $_POST['password'] !== '') {
    include 'dbConnect.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    // Form Validation

    $query = "SELECT * FROM users WHERE email= :email";
    //the PDO::prepare function returns a PDOStatement object
    $statement = $db->prepare($query);

    // Bind the :id parameter in the query to the previously
    // sanitized $id specifying a type of INT.
    $statement->bindValue(':email', $email);
    // Then execute the prepared statement.
    $statement->execute();

    if ($statement->rowCount() === 1) {
        $user = $statement->fetch();

        $user_email = $user['email'];
        $user_password = $user['password'];

        if (!password_verify($password, $user_password)) {
            $_SESSION['user_email'] = $user_email;
            header("Location: ./index.php");
        } else {
            $errorMessage = "Incorrect Email or password";
            header("Location: ./login.php?error=$errorMessage");
        }
    } else {
        $errorMessage = "Incorrect Email or password";
        header("Location: ./login.php?error=$errorMessage");
    }
}