<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=BIZ UDPGothic' rel='stylesheet'>
    <link rel="stylesheet" href="dynamic-page.css">
    <link rel="icon" href="/images/favicon.png">
    <title>About Us</title>
</head>
<body>

    <!--Navbar-->

    <div class="navbar">
        <div id="logo">
            <a href="/index.php"><img src="/images/logo.png" alt="logo" id="logo-img"></a>
        </div>
        <div id="list" style="text-align:center; padding:0px; margin: 0px;">
            <ul id="list-items" style="text-align:center; padding:0px; margin: 0px;">
                <il><a href="/aboutus/aboutus.php" id="items">about us</a></il>
                <il><a href="/adoptaPet/adoptaPet.php" id="items">adopt a pet</a></il>
                <il><a href="/tips/tips.php" id="items">care tips</a></il>
                <?php
                if(isset($_SESSION['username'])) {
                    echo '<il><a href="/user-profile.php" style="color: white; font-weight: bold; margin-right: 4px;">Hello, '.$_SESSION['username'].'</a></il>';
                    echo '<il><a href="/login/logout.php"><button id="btn">logout</button></a></il>';
                } else {
                    echo '<il><a href="/login/login.html"><button id="btn">login</button></a></il>';
                    echo '<il><a href="/register/register.html"><button id="btn">register</button></a></il>';
                }
                ?>
            </ul>
            <img src="/images/ham-menu.png" alt="ham-menu" id="hamburger-menu">
        </div>
    </div>

    <!--Hamburger-menu hidden-->

    <div class="hamburger-items">
    <ul id="list-items-hidden">
        <li style="list-style-type: none"><a href="/aboutus/aboutus.php" id="ham-items">about us</a></li><br>
        <li style="list-style-type: none"><a href="/adoptaPet/adoptaPet.php" id="ham-items">adopt a pet</a></li><br>
        <li style="list-style-type: none"><a href="/tips/tips.php" id="ham-items">care tips</a></li><br>
        <?php
        if(isset($_SESSION['username'])) {
            echo '<il><a href="/user-profile.php" style="color: white; font-weight: bold; margin-right: 4px;">Hello, '.$_SESSION['username'].'</a></il>';
            echo '<il><a href="/login/logout.php"><button id="btn">logout</button></a></il>';
        } else {
            
        }
        ?>
    </ul>
    </div>
<?php
// Get the pet ID from the query string
if (isset($_GET['pet_id'])) {
    $pet_id = $_GET['pet_id'];
} else {
    // If no pet ID was provided, redirect to the main page
    header('Location: index.php');
    exit();
}

require_once "../db-config.php";

// Get the pet post from the database
$sql = "SELECT * FROM pets WHERE id='$pet_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output the pet post
    $row = $result->fetch_assoc();
    echo "<div class='pet-details'><div>";
    echo "<h3>" . $row['pet_name'] . "</h3>";
    echo "<p><span id='about-pet'>Age:</span> " . $row['pet_age'] . "</p>";
    echo "<p><span id='about-pet'>Type:</span> " . $row['pet_type'] . "</p>";
    echo "<p><span id='about-pet'>Breed:</span> " . $row['pet_breed'] . "</p>";
    echo "<p><span id='about-pet'>Contact email:</span><a href='mailto:" . $row['email'] . "'> " . $row['email'] . "</a></p>";
    echo "<p id='pet-description'><span style='font-weight: bolder'>Description:</span><br> " . $row['pet_description'] . "</p>";
    echo "</div>";
    $imageData = $row['pet_image'];
    $encodedImage = base64_encode($imageData);
    $imgSrc = 'data:image/jpeg;base64,' . $encodedImage;
    echo "<img src='" . $imgSrc . "' id='pet-db-image'>";
    echo "</div>";
}
?>

<!--Newsletter-->

<div class="newsletter">
        <h2 style="color:black">Subscribe to our newsletter</h2>
        <p style="margin-left: 10px; margin-right: 10px; color: black;">Want to stay up to date with our work. Just enter your e-mail and let click the subscribe button. It's <span style="font-weight: bold;">that simple!</span></p>
        <form action="newsletter.php" method="POST">
            <input type="email" name="email" id="enter-email">
            <button onclick="subscribe()" id="subscribe-btn">Subscribe</button>
        </form>
        <p id="newsletter-thankyou"></p>
        <p id="list"></p>
    </div>

    <!--Admin panel-->

    <?php
        // Get the user role from the database
        if(isset($_SESSION['username'])) {
            $sql = "SELECT role FROM users WHERE username = '".$_SESSION['username']."'";
            $result = $conn->query($sql);
        
            if ($result->num_rows > 0) {
                // Output the user role
                while($row = $result->fetch_assoc()) {
                    // Check if user role is 1
                    if ($row['role'] == 1) {
                        echo '<a href="/admin/admin-panel.php"><p style="text-align: center; color: red;">Click to access admin panel</p></a>';
                    }
                }
            } else {
                // No user role found
            }
        }
    ?>
  
    <!--Footer-->

    <footer>
        <img src="aap-images/fb-logo.png" alt="fb-logo" id="social-logo">
        <img src="aap-images/insta-logo.png" alt="insta-logo" id="social-logo">
        <img src="aap-images/twitter-logo.png" alt="twitter-logo" id="social-logo">
        <p style="margin: 0px; color: white; padding-bottom: 5px;">Copyright © 2023 DaksDesign. All rights reserved.</p>
    </footer>

<script src="adoptaPet.js">

</script>    
</body>
</html>
