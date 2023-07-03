<?php
session_start();
require_once "../db-config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=BIZ UDPGothic' rel='stylesheet'>
    <link rel="stylesheet" href="adoptaPet.css">
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

    <!--Make a post-->

    <div class="hero">
        <img src="/adoptaPet/aap-images/hero-background.jpg" alt="hero-image" id="hero-image">
        <div class="overlay">
            <h1 id="hero-heading">Make a post</h1>
            <?php
            if(isset($_SESSION['username'])) {
                echo '<p style="font-size: 20px; color: white;">You have logged-in. Click on the <b>"MAKE A POST"</b> button and fill out our short form.</p>';
                echo '<a href="/adoptaPet/make-post.html"><button id="post-maker-btn">MAKE A POST</button></a>';
            } else {
                echo '<p style="font-size: 20px; color: white;">Welcome to our pet adoption page. <br>To make a post please<b> log in or register.</b></p>';
            }
            ?>
        </div>
    </div>

    <!--Message bar-->

    <div class="message">
        <p id="message-text">You can't change a dog's past, but you can rewrite the future!</p>
    </div>

    <!--Heading-->

    <h2 style="color: black; text-align: center; font-weight: bolder; margin-bottom: 50px; margin-top: 50px; font-size: 40px;">Pets for adoption</h2>

    <!--Search section-->

    <div class="search">
        <input type="text" placeholder="Enter a pet type(dog or cat)" name="searchbar" id="search-bar">
        <button id="search-btn">Search</button>
    </div>

    <!--Posts-->
<div class="container">
    <div class="row" id="pets">
        <?php
        // Get the pet posts from the database
        $sql = "SELECT * FROM pets where status != 'inactive'";
        $result = $conn->query($sql);

        $count = 1;

        if ($result->num_rows > 0) {
            // Output the pet posts
            while($row = $result->fetch_assoc()) {
                $uniqueId = 'pet-'.$count;
                $count++;
                echo "<div class='col-lg-4 col-md-6' id='$uniqueId'>";
                echo "<a href='dynamic-page.php?pet_id=" . $row['id'] . "'>";
                echo "<div class='pet post'>";
                echo "<h3>" . $row['pet_name'] . "</h3>";
                echo "<p><span id='about-pet'>Age: " . $row['pet_age'] . "</span></p>";
                echo "<p><span id='about-pet'>Type: " . $row['pet_type'] . "</span></p>";
                echo "<p><span id='about-pet'>Breed: " . $row['pet_breed'] . "</span></p>";
                echo "<p id='pet-description'><span style='font-weight: bolder'>Description:<br> " . $row['pet_description'] . "</span></p>";
                $imageData = $row['pet_image'];
                $encodedImage = base64_encode($imageData);
                $imgSrc = 'data:image/jpeg;base64,' . $encodedImage;
                echo "<img src='" . $imgSrc . "' id='pet-db-image'>";
                echo "</div>";
                echo "</a>";
                echo "</div>";
            }
        } else {
            echo "No pet posts found";
        }
        ?>
    </div>
</div>

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
          $sql = "SELECT role FROM users WHERE username = ?";
          $stmt = $conn->prepare($sql);
          $stmt->bind_param("s", $_SESSION['username']);
          $stmt->execute();
          $result = $stmt->get_result();
          $row = $result->fetch_assoc();

          // Output the user role
          if ($row['role'] == 1) {
            echo '<a href="/admin/admin-panel.php"><p style="text-align: center; color: red;">Click to access admin panel</p></a>';
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
<script src="/admin/admin.js">

</script>      
</body>
</html>
