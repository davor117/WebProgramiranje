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
    <link rel="stylesheet" href="tips.css">
    <link href='https://fonts.googleapis.com/css?family=BIZ UDPGothic' rel='stylesheet'>
    <link rel="icon" href="/images/favicon.png">
    <title>Tips</title>
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

    <!--HERO-->

    <div class="hero">
        <img src="/tips/images/dog-hero.jpg" alt="hero-image" id="hero-image">
        <div class="overlay">
            <h1 id="hero-heading">Care tips</h1>
        </div>    
    </div>

    <!--Message bar-->

    <div class="message">
        <p id="message-text">Hopeful hearts seek loving home!</p>
    </div>

    <!--Tips-->

    <h2>Our dog tips</h2>
    <div class="container">
        <div class="row">
            <div class="col-md-6 cold-sm-12">
                <p id="dog-tip" data-tip-number="#1">Provide your dog with a healthy and balanced diet that meets their nutritional needs. You can consult with your veterinarian to determine the best food for your dog's age, size, and activity level.</p>
            </div>
            <div class="col-md-6 cold-sm-12">
                <p id="dog-tip" data-tip-number="#2">Keep your dog's living environment clean and free from hazards. This includes providing a comfortable sleeping area and keeping potentially dangerous items out of their reach.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 cold-sm-12">
                <p id="dog-tip" data-tip-number="#3">Practice good grooming habits, such as brushing your dog's coat regularly, trimming their nails, and cleaning their ears and teeth.</p>
            </div>
            <div class="col-md-6 cold-sm-12">
                <p id="dog-tip" data-tip-number="#4">Schedule regular visits with your veterinarian for checkups and preventative care, such as vaccinations, parasite prevention, and dental exams.</p>
            </div>
        </div>
    </div>

    <h2>Our cat tips</h2>
    <div class="container">
        <div class="row">
            <div class="col-md-6 cold-sm-12">
                <p id="cat-tip" data-tip-number="#1">Make sure your cat has access to clean water at all times. Change the water bowl daily and keep it in a separate location from the litter box.</p>
            </div>
            <div class="col-md-6 cold-sm-12">
                <p id="cat-tip" data-tip-number="#2">Provide your cat with a clean and comfortable litter box that is easily accessible. Scoop the litter box daily and clean it thoroughly once a week.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 cold-sm-12">
                <p id="cat-tip" data-tip-number="#3">Play with your cat daily to help them stay active and stimulated. Use toys and interactive games to engage your cat's hunting instincts.</p>
            </div>
            <div class="col-md-6 cold-sm-12">
                <p id="cat-tip" data-tip-number="#4">Provide your cat with a scratching post to help them maintain their claws and prevent destructive scratching behavior.</p>
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
        <p style="margin: 0px; color: white; padding-bottom: 5px;">Copyright © 2023 DaksDesign. All rights reserved.</p>
    </footer>

<script src="tips.js"></script>
</body>
</html>
