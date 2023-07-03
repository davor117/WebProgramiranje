<?php
require_once "../db-config.php";

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST["email"];

  // Check if the email is valid
  $sql = "SELECT * FROM users WHERE email = ?";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "s", $email);
  mysqli_stmt_execute($stmt);

  $result = mysqli_stmt_get_result($stmt);

  if (mysqli_num_rows($result) == 1) {
    // Generate a random token
    $token = bin2hex(random_bytes(50));
    $user_id = mysqli_fetch_assoc($result)["id"];
    $expiration = date("U") + 1800; // 30 minutes from now

    $sql = "INSERT INTO password_reset_tokens (user_id, token, expiry, email) VALUES (?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "isis", $user_id, $token, $expiration, $email);
    mysqli_stmt_execute($stmt);

    // Send email
    echo "Please check your email to reset your password.";
  }
  else {
    echo "Email not found.";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=BIZ UDPGothic' rel='stylesheet'>
    <link rel="stylesheet" href="forgotPassword.css">
    <link rel="icon" href="/images/favicon.png">
    <title>Forgot Password</title>
</head>
<body>
    <div class="forgot-pw">
        <h2>Reset password</h2>
        <form action="forgotPassword.php" method="POST">
            <input type="text" name="email" placeholder="Enter your email..." id="email-input" required><br>
            <button id="submit-btn">Submit email</button>
        </form>
    </div>
</body>
</html>
