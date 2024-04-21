<!DOCTYPE html>
<html>
<head>
    <!-- Set the viewport to the width of the device and initial scale to 1.0 for responsive design -->
    <meta name="viewport" content="with=device-width, initial-scale=1.0">
    <!-- Set the title of the HTML document -->
    <title>ContestWorld</title>
    <!-- Include the main stylesheet -->
    <link rel="stylesheet" href="styles.css">
    <!-- Preconnect to Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- Include Google Fonts stylesheet for font family Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600;700&display=swap" rel="stylesheet">
    <!-- Include Font Awesome icons stylesheet -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <?php
        // Include the "db.php" file containing database connection settings or functions
        include "db.php";
        // Start or resume a session
        session_start(); 
        // Set up a cookie named "User" with the value of the "login" session variable
        $cookie_name = 'User';
        $cookie_value = $_SESSION['login'];
        // Set the cookie expiration time to 30 days
        setcookie($cookie_name, $cookie_value, time() + (86400*30), "/"); // 180s expiration
    ?>
</head>
<body>
    <!-- Section for the sub-header -->
    <section class="sub-header">
        <!-- Navigation bar -->
        <nav>
            <!-- Logo linking to the main page -->
            <a href="main.php"><img src="media/logo.png"></a>
            <!-- Navigation links container with an id "navLinks" -->
            <div class="nav-links" id="navLinks">
                <!-- Close icon for mobile navigation -->
                <i class="fa fa-times" onclick="hideMenu()"></i>
                <!-- List of navigation links -->
                <ul>
                    <li><a href="main.php">HOME</a></li>
                    <li><a href="about.php">ABOUT</a></li>
                    <li><a href="contact.php">CONTACTS</a></li>
                    <li><a href="contest.php">CONTESTS</a></li>
                    <li><a href="index.html">SIGN UP</a></li>
                    <!-- Display the username stored in the cookie -->
                    <li><?= $_COOKIE['User']?></li>
                    <li><a href="about2.php">RUS</a></li>
                </ul>
            </div>
            <!-- Hamburger icon for mobile navigation -->
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>
        <!-- Header text -->
        <h1> About Us</h1>
    </section>
    <!-- Section for the "About Us" content -->
    <section class="about-us">
        <!-- Row for arranging content in two columns -->
        <div class="row">
            <!-- Column for textual content -->
            <div class="about-col">
                <!-- Heading -->
                <h1>Competitions, Olympiads, Contests</h1>
                <!-- Paragraph describing the purpose of ContestWorld -->
                <p>At ContestWorld, we're passionate about fostering creativity and talent across the globe.<br> 
        Our platform is dedicated to providing a space where individuals can explore their potential, <br>
        connect with like-minded enthusiasts, and participate in exciting contests that inspire innovation.<br>
         With a commitment to excellence and inclusivity, we strive to empower our community members to <br>
         showcase their skills and achieve their aspirations. Join us on this journey of creativity, collaboration, 
         and limitless possibilities.
</p>
                <!-- Button to explore contests -->
                <a href="contest.php" class="hero-btn red-btn">EXPLORE NOW</a>
            </div>
            <!-- Column for image -->
            <div class="about-col">
                <!-- Image illustrating the concept of ContestWorld -->
                <img src="media/aboutus.png">
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

    var navLinks = document.getElementById("navLinks");
    function showMenu(){
        navLinks.style.right = "0";
    }
    function hideMenu(){
        navLinks.style.right = "-200px";
    }
</script>


</body>
</html>