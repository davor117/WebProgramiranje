<?php
require_once "../db-config.php";

// Get the form data
$pet_name = $_POST['pet_name'];
$pet_age = $_POST['pet_age'];
$pet_type = $_POST['pet_type'];
$pet_breed = $_POST['pet_breed'];
$pet_description = $_POST['pet_description'];
$pet_image = addslashes(file_get_contents($_FILES['pet_image']['tmp_name']));
$email = $_POST['email'];

// Save the form data to the database
$sql = "INSERT INTO pets (pet_name, pet_age, pet_type, pet_breed, pet_description, pet_image, email) VALUES ('$pet_name', '$pet_age', '$pet_type', '$pet_breed', '$pet_description', '$pet_image', '$email')";
if ($conn->query($sql) === TRUE) {
    echo "New pet post created successfully<br>";
    echo '<a href="/adoptaPet/adoptaPet.php">back to adopt a pet</a>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
