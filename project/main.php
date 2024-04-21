<?php 
    // Start a new session or resume the existing session
    session_start();
    
    // Check if the "theme" session variable is not set
    if (!isset($_SESSION["theme"])) {
        // Set the default theme to "light" if it's not already set
        $_SESSION["theme"] = "light";
    }

    // Check if the form has been submitted with a field named "toggle_theme"
    if (isset($_POST['toggle_theme'])) {
        // Toggle between light and dark themes based on the current theme stored in the session
        $_SESSION["theme"] = ($_SESSION["theme"] === "light") ? "dark" : "light";
    }
?>


<!DOCTYPE html>
<html>
<head>
    <!-- Set the viewport to the width of the device and initial scale to 1.0 for responsive design -->
    <meta name="viewport" content="with=device-width, initial-scale=1.0">
    <!-- Set the title of the HTML document -->
    <title>ContestWorld</title>
    <!-- Include the appropriate stylesheet based on the current theme stored in the session -->
    <link rel="stylesheet" type="text/css" href="<?php echo ($_SESSION["theme"] === "light") ? "light-theme.css" : "dark-theme.css"; ?>" />
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
    // Set up a cookie named "User" with the value of the "login" session variable
    $cookie_name = 'User';
    $cookie_value = $_SESSION['login'];
    // Set the cookie expiration time to 30 days
    setcookie($cookie_name, $cookie_value, time() + (86400*30), "/"); // 180s expiration
?>


</head>
<body>
    <section class="header">
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
                    <li><?= $_COOKIE['User']?></li>
                    <li><a href="main2.php">RUS</a></li>
                    <form method="POST">
                        <button type="submit" name="toggle_theme">Toggle Theme</button>
                    </form>
                </ul>
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>
<div class="text-box">
    <h1>ContestWorld</h1>
    <p>Welcome to our platform!<br>Here, you'll discover a diverse array of 
        competitions and contests spanning various subjects.<br>
        Whether you're passionate about physics, mathematics or infromatics,<br> 
        our site is your gateway to exploring exciting opportunities to showcase your talents and expertise.
    </p>
    <a href="about.php" class="hero-btn">Visit us to know more</a>
</div>
    </section>

<!----------- Course ----------->

<section class="course">
    <h1>Contests</h1>
    <p></p>

    <div class="row">
        <div class="course-col">
            <h3>Global</h3>
            <p>Participate in global contests that transcend borders, bringing together
                 talents and ideas from diverse corners of the world. Showcase your skills 
                 on an international platform and compete with participants from various countries.</p>
        </div>
        <div class="course-col">
            <h3>National</h3>
            <p>Engage in international contests that celebrate cultural diversity and innovation.
                 Join a vibrant community of contestants from around the globe, exchange ideas, 
                 and challenge yourself against top talents across different nations.</p>
        </div>
        <div class="course-col">
            <h3>Online</h3>
            <p>Explore a world of online contests designed for convenience and accessibility. 
                Whether you're a professional or an enthusiast, participate in virtual competitions 
                from the comfort of your home. Join the digital arena, showcase your abilities, 
                and connect with like-minded individuals worldwide.</p>
        </div>
    </div>
</section>

<!--------------- campus ---------->

<section class="campus">
    <h1>Subjects</h1>
    <p></p>

    <div class="row">
        <div class="campus-col">
            <img src="media/math.avif">
            <div class="layer">
                <h3>MATHEMATICS</h3>
            </div>
        </div>
        <div class="campus-col">
            <img src="media/physics1.avif">
            <div class="layer">
                <h3>PHYSICS</h3>
            </div>
        </div>
        <div class="campus-col">
            <img src="media/info.jpeg">
            <div class="layer">
                <h3>INFORMATICS</h3>
            </div>
        </div>
    </div>


</section>

<!------------ Testimonials ------------->
<section class="testimonials">
    <h1>What our users say</h1>
    <p></p>

    <div class="row">
        <div class="testimonial-col">
            <img src="media/comment.png">
            <div>
                <p>"I love how easy it is to find and participate in contests on this site! 
                    The user-friendly interface makes navigating through different categories a breeze. 
                    It's definitely my go-to platform for showcasing my talents and discovering new opportunities."
                </p>
                <h3>Yernur Alpysbai</h3>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
            </div>
        </div>
        <div class="testimonial-col">
            <img src="media/comment.png">
            <div>
                <p>"This site has completely transformed my contest experience!
                     From international competitions to niche-specific challenges, there's something for everyone. 
                     The supportive community and seamless registration process make it a joy to be a part of.
                      Highly recommended for anyone passionate about contests and creative expression!"
                 </p>
                <h3>Sagyn Jumadildayev</h3>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-half-o"></i>
            </div>
        </div>
    </div>
</section>

<!------ Call To Action ------>

<section class="cta">
    <h1>Enroll For Our Various Competitions<br>Anywhere From The 
        World</h1>
    <a href="contact.php" class="hero-btn">CONTACT US</a>    
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

<script> 
// Toggle dark mode function
function toggleDarkMode() {
    var body = document.body;
    body.classList.toggle("dark-mode");
    // Save theme preference to local storage
    var isDarkMode = body.classList.contains("dark-mode");
    localStorage.setItem("darkMode", isDarkMode);
}

// Check if dark mode preference exists in local storage
var darkMode = localStorage.getItem("darkMode");
if (darkMode === "true") {
    document.body.classList.add("dark-mode");
}

</script>


















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
<script>
// Toggle dark mode function
function toggleDarkMode() {
    var body = document.body;
    body.classList.toggle("dark-mode");
    // Save theme preference to local storage
    var isDarkMode = body.classList.contains("dark-mode");
    localStorage.setItem("darkMode", isDarkMode);
}

// Check if dark mode preference exists in local storage
var darkMode = localStorage.getItem("darkMode");
if (darkMode === "true") {
    document.body.classList.add("dark-mode");
}

</script>


</body>
</html>
