<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=BIZ UDPGothic' rel='stylesheet'>
    <link rel="stylesheet" href="newsletter.css">
    <title>Thank you for subscribing!</title>
</head>
<body>  

<?php
    require_once "../db-config.php";

    // Check if the form has been submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Invalid email format";
        } else {
            // Insert the email address into the database
            $sql = "INSERT INTO newsletter (email) VALUES ('$email')";

            if (mysqli_query($conn, $sql)) {
                // If the insertion was successful, display a success message
                echo "Thank you for subscribing to our newsletter!";
            } else {
                // If the insertion failed, display an error message
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
    }
    }

    mysqli_close($conn);
?>
<br><br>
<a href="aboutus.php"><button id="btn">Go back</button></a>
</body>
</html>
