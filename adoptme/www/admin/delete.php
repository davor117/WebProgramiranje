<?php
require_once "../db-config.php";

// Get the ID of the pet post to delete
$id = $_POST['id'];

// Delete the pet post from the database
$sql = "DELETE FROM pets WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
    echo "Pet post deleted successfully<br>";
    echo '<a href="/admin/admin-panel.php"><p>Back to admin panel</p></a>';
} else {
    echo "Error deleting pet post: " . $conn->error;
}

$conn->close();
?>
