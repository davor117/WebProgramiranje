<?php
require_once "../db-config.php";

session_start();

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Prepare the SQL statement with a parameterized query
    $sql = "SELECT * FROM users WHERE username=?";
    $stmt = mysqli_prepare($conn, $sql);
    
    // Bind parameters to the statement
    mysqli_stmt_bind_param($stmt, "s", $username);

    // Execute the statement
    mysqli_stmt_execute($stmt);

    // Get the result of the statement
    $result = mysqli_stmt_get_result($stmt);    

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $hashed_password = $row["password"];

        // Verify the password
        if (password_verify($password, $hashed_password)) {
            // If the password is correct, set a session variable and redirect to the index page
            $_SESSION["username"] = $username;
            header("Location: https://daks.stud.vts.su.ac.rs/index.php");
            exit;
        } else {
            // If the password is incorrect, display an error message and some debugging information
            echo "Incorrect password. Please try again.<br>";
            echo '<a href="/login/login.html">back to login</a>';
        }
    } else {
        // If the username is not found in the database, display an error
        echo "Username not found<br>";
        echo '<a href="/login/login.html">back to login</a>';
    }
}
?>
