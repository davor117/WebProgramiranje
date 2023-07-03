<?php
    require_once "db-config.php";
    session_start();

    // Check if the user is logged in
    if(!isset($_SESSION['username'])) {
        header("Location: https://daks.stud.vts.su.ac.rs/login/login.html");
        exit;
    }

    // Check if the form has been submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $newUsername = $_POST["newUsername"];
        $newPassword = password_hash($_POST["newPassword"], PASSWORD_BCRYPT); // password hash with BCRYPT

        // Update the user's information in the database
        $sql = "UPDATE users SET username='$newUsername', password='$newPassword' WHERE username='{$_SESSION['username']}'";

        if (mysqli_query($conn, $sql)) {
            // If the update was successful, set the new session variable for the updated username and redirect to the index page
            $_SESSION["username"] = $newUsername;
            header("Location: https://daks.stud.vts.su.ac.rs/index.php");
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=BIZ UDPGothic' rel='stylesheet'>
    <link rel="stylesheet" href="user-profile.css">
    <link rel="icon" href="/images/favicon.png">
    <title>Login Now</title>
</head>
<body>
    <div class="changes">
    <h1>Change Your Profile</h1>
        <form method="POST">
            <label for="newUsername">New Username:</label>
            <input type="text" id="newUsername" name="newUsername" required><br><br>

            <label for="newPassword">New Password:</label>
            <input type="password" id="newPassword" name="newPassword" required><br><br>

            <a href="/index.php"><p>Back to home page</p></a>

            <input type="submit" value="Update" id="submit-btn">
        </form>
    </div>
</body>
</html>
