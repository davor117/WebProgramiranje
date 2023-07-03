<?php
require_once "../db-config.php";

// Get the ID of the pet post to deactivate
$id = $_POST['id'];

// Update the status of the pet post to 'inactive'
$sql = "UPDATE pets SET status='inactive' WHERE id=$id";
if ($conn->query($sql) === TRUE) {
    // Redirect back to the admin panel
    header("Location: admin-panel.php");
    exit();
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
