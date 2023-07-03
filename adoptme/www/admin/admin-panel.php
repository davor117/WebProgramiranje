<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Admin Panel</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Type</th>
                    <th>Breed</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
<?php
  require_once "../db-config.php";

  // Get the pet posts from the database
  $sql = "SELECT * FROM pets";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // Output the pet posts
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['pet_name'] . "</td>";
        echo "<td>" . $row['pet_age'] . "</td>";
        echo "<td>" . $row['pet_type'] . "</td>";
        echo "<td>" . $row['pet_breed'] . "</td>";
        echo "<td>" . $row['pet_description'] . "</td>";
        echo "<td><img src='data:image/jpeg;base64," . base64_encode($row['pet_image']) . "' style='width:100px'></td>";

        $status = $row['status'];
        $buttonText = ($status == 'inactive') ? 'Activate' : 'Deactivate';
        $formAction = ($status == 'inactive') ? 'activate.php' : 'deactivate.php';

        echo "<td>";
        echo "<form method='post' action='$formAction'>";
        echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
        echo "<button type='submit' class='btn " . ($status == 'inactive' ? 'btn-success' : 'btn-warning') . "'>$buttonText</button>";
        echo "</form>";
        echo "</td>";

        echo "<td><form method='post' action='delete.php'><input type='hidden' name='id' value='" . $row['id'] . "'><button type='submit' class='btn btn-danger'>Delete</button></form></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='8'>No pet posts found</td></tr>";
}

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <a href="/adoptaPet/adoptaPet.php"><p style="text-align: center; color: red;">Back to adoptaPet page</p></a>
    
</body>
</html>
