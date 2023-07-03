<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <link rel="icon" href="/images/favicon.png">
    <link href='https://fonts.googleapis.com/css?family=BIZ UDPGothic' rel='stylesheet'>
    <title>adoptME</title>
</head>
<body>

    <!--Navbar-->

    <div class="navbar">
        <div id="logo">
            <a href="index.php"><img src="images/logo.png" alt="logo" id="logo-img"></a>
        </div>
        <div id="list" style="text-align:center; padding:0px; margin: 0px;">
            <ul id="list-items" style="text-align:center; padding:0px; margin: 0px;">
                <il><a href="aboutus/aboutus.php" id="items">about us</a></il>
                <il><a href="/adoptaPet/adoptaPet.php" id="items">adopt a pet</a></il>
                <il><a href="tips/tips.php" id="items">care tips</a></il>
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
            <img src="images/ham-menu.png" alt="ham-menu" id="hamburger-menu">
        </div>
    </div>

    <!--Hamburger-menu hidden-->

    <div class="hamburger-items">
    <ul id="list-items-hidden">
        <li style="list-style-type: none"><a href="aboutus/aboutus.php" id="ham-items">about us</a></li><br>
        <li style="list-style-type: none"><a href="/adoptaPet/adoptaPet.php" id="ham-items">adopt a pet</a></li><br>
        <li style="list-style-type: none"><a href="tips/tips.php" id="ham-items">care tips</a></li><br>
        <?php
        if(isset($_SESSION['username'])) {
            echo '<il><a href="/user-profile.php" style="color: white; font-weight: bold; margin-right: 4px;">Hello, '.$_SESSION['username'].'</a></il>';
            echo '<il><a href="/login/logout.php"><button id="btn">logout</button></a></il>';
        } else {
            
        }
        ?>
    </ul>
    </div>

    <!--Hero-->

    <div class="hero">
        <img src="images/hero-background.jpg" alt="hero-image" id="hero-image">
        <div class="overlay">
            <h1 id="hero-heading">Don't buy. Adopt.</h1>
            <?php
            if(isset($_SESSION['username'])) {
                
            } else {
                echo '<p><b>Before you can adopt, login or register</b></p>';
                echo '<a href="/login/login.html"><button id="hero-btn-left">login</button></a>';
                echo '<a href="/register/register.html"><button id="hero-btn-right">register</button></a>';
            }
            ?>
        </div>
    </div>

    <!--Message bar-->

    <div class="message">
        <p id="message-text">Hopeful hearts seek loving home!</p>
    </div>

    <!--Adoption advice-->
    
    <div class="container">
        <div id="advice-heading">
            <h1 id="adv-heading">Check out our adoption advice</h1>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12" id="advice-left">
                <h2 id="adv-left-heading">Why we recommend adopting</h2>
                <p style="color:black">There are so many reasons to adopt: meeting a unique pet, spending less, doing a good deed, but let's talk facts. Millions of pets enter shelters every year. And hundreds of thousands are euthanized each year. We don't tell you that to guilt you or be a downer, but that's why adoption really matters to us. So we would love it if you considered adopting. And, since you're here, we're guessing you are. Seriously, no judgment if you find a pet another way (every pet parent journey is different!). But we're here to help make adoption easier, however we can.</p>
            </div>
            <div class="col-md-6 col-sm-12" id="advice-right">
                <h2 id="adv-right-heading">How to find the right pet</h2>
                <p style="color:black">Let's bust a myth. The perfect pet? Doesn't exist. Because there are so many pets that can be the right fit for you. It's just about knowing what you're looking for. So start by thinking about your criteria based on your lifestyle, breed preferences, living situation, (fur and human) family, etc. From there, our team can help match you with the right pet. Check out our Premium New Pet Alerts too. With Alerts, we'll email you newly added adoptable pets that fit your search—so you can check out matches and meet your next best friend faster.</p>
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
            <img src="images/fb-logo.png" alt="fb-logo" id="social-logo">
            <img src="images/insta-logo.png" alt="insta-logo" id="social-logo">
            <img src="images/twitter-logo.png" alt="twitter-logo" id="social-logo">
            <p style="margin: 0px; padding-bottom: 5px">Copyright © 2023 DaksDesign. All rights reserved.</p>
    </footer>
    <script src="index.js">

    </script>
</body>
</html>
