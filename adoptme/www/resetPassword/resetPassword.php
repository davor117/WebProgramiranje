<?php
require_once "../db-config.php";

// Check if the token is valid
if (!isset($_GET["token"]) || empty($_GET["token"])) {
  die("Token not found.");
}

$token = $_GET["token"];

$sql = "SELECT * FROM password_reset_tokens WHERE token = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $token);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) != 1) {
  die("Token not found.");
}

// Check if the token has expired
$expiry = mysqli_fetch_assoc($result)["expiry"];

if (date("U") > $expiry) {
  die("Token has expired.");
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $sql = "SELECT user_id FROM password_reset_tokens WHERE token = ?";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "s", $token);
  mysqli_stmt_execute($stmt);

  $result = mysqli_stmt_get_result($stmt);
  $user_id = mysqli_fetch_assoc($result)["user_id"];

  $password = password_hash($_POST["password"], PASSWORD_BCRYPT);

  $sql = "UPDATE users SET password = ? WHERE id = ?";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "si", $password, $user_id);
  mysqli_stmt_execute($stmt);

  $sql = "DELETE FROM password_reset_tokens WHERE token = ?";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "s", $token);
  mysqli_stmt_execute($stmt);

  echo "Password reset successfully.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=BIZ UDPGothic' rel='stylesheet'>
    <link rel="stylesheet" href="resetPassword.css">
    <link rel="icon" href="/images/favicon.png">
    <title>Reset Password</title>
</head>
<body>
    <div class="forgot-pw">
        <h2>Reset password</h2>
        <form action="resetPassword.php?token=<?php echo $token; ?>" method="POST">
            <input type="password" name="password" placeholder="Enter your new password..." id="password-input" required><br>
            <br>
            <button id="submit-btn">Submit</button>
        </form>
    </div>
</body>
</html>
