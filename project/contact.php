<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="with=device-width, initial-scale=1.0">
    <title>ContestWorld</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<?php
include "db.php";
session_start(); 
$cookie_name = 'User';
$cookie_value = $_SESSION['login'];
setcookie($cookie_name, $cookie_value, time() + (86400*30), "/"); // 180s expiration
?>
</head>
<body>
    <section class="sub-header">
        <nav>
            <a href="main.php"><img src="media/logo.png"></a>
            <div class="nav-links" id="navLinks">
                <i class="fa fa-times" onclick="hideMenu()"></i>
                <ul>
                    <li><a href="main.php">HOME</a></li>
                    <li><a href="about.php">ABOUT</a></li>
                    <li><a href="contact.php">CONTACTS</a></li>
                    <li><a href="contest.php">CONTESTS</a></li>
                    <li><a href="index.html">SIGN UP</a></li>
                    <li><a href="contact2.php">RUS</a></li>
                    <li><?= $_COOKIE['User']?></li>
                </ul>
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>
        <h1> Contact Us</h1>
    </section>
    <!-------------------- contact us ---------------->
    <section class="contact-us">
        <div class="row">
            <div class="contact-col">
                <div>
                    <i class="fa fa-phone"></i>
                    <span>
                        <h5>+7 701 771 89 24</h5>
                        <p> Monday to Friday 10M to 6PM</p>
                    </span>
                </div>
                <div>
                    <i class="fa fa-envelope-o"></i>
                    <span>
                        <h5>contestworld@gmail.com</h5>
                        <p>Email Us</p>
                        
                    </span>
                </div>
            </div>
            <div class="contact-col">
                <form action="form-handler.php" method="post">
                    <input type="text"  name="name" placeholder="Enter your name" required>
                    <input type="email" name="email" placeholder="Enter email address" required>
                    <input type="text" name="subject" placeholder="Enter your subject" required>
                    <textarea rows="8" name="message" placeholder="Message" required></textarea>
                    <button type="submit" class="hero-btn red-btn">Send Message</button>
                </form>




            </div>
        </div>

    </section>
<!---------------Footer--------------->

<section class="footer">
    <h4>About Us</h4>
    <p>At ContestWorld, we're passionate about fostering creativity and talent across the globe.<br> 
        Our platform is dedicated to providing a space where individuals can explore their potential, <br>
        connect with like-minded enthusiasts, and participate in exciting contests that inspire innovation.<br>
         With a commitment to excellence and inclusivity, we strive to empower our community members to <br>
         showcase their skills and achieve their aspirations. Join us on this journey of creativity, collaboration, 
         and limitless possibilities.
</p>
        <div class="icons">
            <i class="fa fa-facebook"></i>
            <i class="fa fa-instagram"></i>
            <i class="fa fa-twitter"></i>
            <i class="fa fa-linkedin"></i>
        </div>
        <p>Made with <i class="fa fa-heart-o"></i> by Muratkhanov Aldiyar</p>
</section>



















<!---------JavaScript for Toggle Menu----------->
<script>
    // Function to show the navigation menu
    var navLinks = document.getElementById("navLinks");
    function showMenu(){
        // Set the right CSS property of navLinks to 0 to show the menu
        navLinks.style.right = "0";
    }
    // Function to hide the navigation menu
    function hideMenu(){
        // Set the right CSS property of navLinks to -200px to hide the menu
        navLinks.style.right = "-200px";
    }
</script>


</body>
</html>