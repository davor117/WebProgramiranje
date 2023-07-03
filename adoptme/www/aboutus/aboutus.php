<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=BIZ UDPGothic' rel='stylesheet'>
    <link rel="stylesheet" href="aboutus.css">
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
                session_start();
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
    
    <!--Hero section-->

    <div class="hero">
        <img src="/images/aboutus-hero.jpg" alt="hero-image" id="hero-image">
        <div class="overlay">
            <h1 id="hero-heading">About Us</h1>
        </div>    
    </div>

    <!--Message bar-->

    <div class="message">
        <p id="message-text">Learn something about our wonderfull story.</p>
    </div>

    <!--Message bar-->
    
    <div class="container">
        <h2 id="our-mission">Our mission</h2>
        <p style="font-size: 20px;">
            Our mission at adoptME is to find loving homes for every pet in need. 
            We believe that every animal deserves a second chance, regardless of their breed, age, 
            or health status. Through our commitment to responsible adoption practices, we strive to 
            match each pet with the perfect family and provide ongoing support to ensure a successful 
            transition. Our team of dedicated volunteers and staff work tirelessly to provide quality 
            care for each animal in our care, including necessary medical treatment, socialization, and training. 
            By raising awareness about the benefits of pet adoption and promoting responsible pet ownership, 
            we aim to make a positive impact on our local community and beyond.
        </p>
    </div>

    <!--Our adopters-->

    <h2>What our adopters say?</h2>
    <div class="container">
        <div class="row" id="client1">
            <div class="col-md-5 col-sm-12" id="client-pic-section">
                <img src="au-images/client1.jpg" alt="adopter-picture" id="pic-client">
                <h3 id="client-name">Mark Smith</h3>
                <p id="client-role-parag">adopter</p>
            </div>
            <div class="col-md-7 col-sm-12">
                <p style="font-size: 20px; margin-top: 30px;">
                I can't imagine life without my furry companion! Adopting from adoptME was the best decision I've ever made.
                The staff were incredibly helpful and matched me with a pet that was the perfect fit for my lifestyle. My pet brings so much joy 
                and laughter into my life, and I feel good knowing that I've given an animal in need a loving home.
                </p>
            </div>
            <div class="row" id="client2">
                <div class="col-md-7 col-sm-12">
                    <p style="font-size: 20px; margin-top: 30px; margin-left: 10px; margin-right: 10px;">
                    I never knew how much love a pet could bring into my life until I adopted from adoptME. My furry friend 
                    has become such an important part of my family, and I'm grateful every day for the joy and companionship they provide. Adopting 
                    a pet is truly a life-changing experience, and I'm so thankful to have given an animal in need a second chance at a happy life.
                    </p>
                </div>
                <div class="col-md-5 col-sm-12" id="client-pic-section">
                    <img src="au-images/client2.jpg" alt="adopter-picture" id="pic-client">
                    <h3 id="client-name">Jamar Johnson</h3>
                    <p id="client-role-parag">adopter</p>
            </div>
        </div>
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

    <!--Footer-->

    <footer>
        <img src="au-images/fb-logo.png" alt="fb-logo" id="social-logo">
        <img src="au-images/insta-logo.png" alt="insta-logo" id="social-logo">
        <img src="au-images/twitter-logo.png" alt="twitter-logo" id="social-logo">
        <p style="margin: 0px; color: white; padding-bottom: 5px;">Copyright © 2023 DaksDesign. All rights reserved.</p>
    </footer>

<script src="aboutus.js">

</script>    
</body>
</html>