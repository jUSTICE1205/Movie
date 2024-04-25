<?php
session_start();

// Check if email and password are set and password is not empty
if (isset($_POST['email'], $_POST['password']) && $_POST['password'] !== '') {
    include 'dbConnect.php';

    // Sanitize input data
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    // Check if email is valid
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Form Validation
        $query = "SELECT * FROM users WHERE email= :email";
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->execute();

        if ($statement->rowCount() === 1) {
            $user = $statement->fetch();

            $user_email = $user['email'];
            $user_password = $user['password'];

            if (password_verify($password, $user_password)) {
                $_SESSION['user_email'] = $user_email;
                header("Location: ./index.php");
                exit;
            } else {
                $errorMessage = "Incorrect Email or password";
            }
        } else {
            $errorMessage = "Incorrect Email or password";
        }
    } else {
        $errorMessage = "Invalid email format";
    }

    // Redirect to login page with error message
    header("Location: ./login.php?error=$errorMessage");
    exit;
}
?>