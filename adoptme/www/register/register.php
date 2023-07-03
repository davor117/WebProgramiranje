<?php
require_once "../db-config.php";
session_start();

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST["fullname"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);  //password hash with BCRYPT

    // Check if the username or email already exists in the database
    $sql = "SELECT * FROM users WHERE username='$username' OR email='$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // If the username or email already exists, display an error message
        echo "Username or email taken! Please enter a different one.";
    } else {
        // If the username and email are available, insert the user's information into the database
        $sql = "INSERT INTO users (fullname, username, email, password) VALUES ('$fullname', '$username', '$email', '$password')";

        if (mysqli_query($conn, $sql)) {
            // If the registration was successful, set a session variable and redirect to the index page
            $_SESSION["username"] = $username;
            header("Location: https://daks.stud.vts.su.ac.rs/index.php");
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}

mysqli_close($conn);
?> 
