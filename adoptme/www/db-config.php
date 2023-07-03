<?php
// Connect to the database
$servername = "localhost";
$username = "daks";
$password = "2CRzcDQEYnsQJKz";
$dbname = "daks";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
