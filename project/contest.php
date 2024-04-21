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
                    <li><a href="contest2.php">RUS</a></li>
                    <li><?= $_COOKIE['User']?></li>
                </ul>
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>
        <h1> Our Contests</h1>
    </section>
<!----------------------------Searching ------------------->




<input type="text" id="searchInput" class="Searching" placeholder="Search contest here..." oninput="searchProducts()">
<button type="submit" onclick="eraseSearch()">Clear</button>
<button id="sortButton">Sort Courses</button>





<script>
  function searchProducts() {
    var searchText = document.getElementById('searchInput').value.toLowerCase();
    var products = document.querySelectorAll('.course-col');

    products.forEach(function(product) {
        var productName = product.querySelector('h3').innerText.toLowerCase();
        if (productName.includes(searchText)) {
            product.style.display = 'inline-block';
        } else {
            product.style.display = 'none';
        }
    });
}

function eraseSearch() {
    document.getElementById('searchInput').value = '';
    var products = document.querySelectorAll('.course-col');
    products.forEach(function(product) {
        product.style.display = 'inline-block';
    });
}
    </script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
      document.getElementById('course-col').addEventListener('click', function () {
        sortCourseColumns();
      });
  
      function sortCourseColumns() {
        var courseCols = document.querySelectorAll('.course-col');
  
        // Convert NodeList to array for sorting
        var courseColsArray = Array.from(courseCols);
  
        // Sort the array alphabetically based on text content
        courseColsArray.sort(function(a, b) {
          var textA = a.textContent.trim().toUpperCase();
          var textB = b.textContent.trim().toUpperCase();
          if (textA < textB) return -1;
          if (textA > textB) return 1;
          return 0;
        });
  
        // Clear the container
        var container = document.getElementById('course-col');
        container.innerHTML = '';
  
        // Append sorted elements back to the container
        courseColsArray.forEach(function(courseCol) {
          container.appendChild(courseCol);
        });
      }
    });
  </script>
  
  <script> 
  document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('sortButton').addEventListener('click', function () {
        sortCourseByPrice();
    });

    function sortCourseByPrice() {
        var courseCols = document.querySelectorAll('.course-col');

        // Convert NodeList to array for sorting
        var courseColsArray = Array.from(courseCols);

        // Sort the array by price (assuming the price is the last element in each .course-col)
        courseColsArray.sort(function(a, b) {
            var priceA = parseFloat(a.querySelector('h3:last-of-type').innerText.replace('$', ''));
            var priceB = parseFloat(b.querySelector('h3:last-of-type').innerText.replace('$', ''));
            return priceA - priceB;
        });

        // Clear the container
        var container = document.querySelector('.course');
        container.innerHTML = '';

        // Append sorted elements back to the container
        courseColsArray.forEach(function(courseCol) {
            container.appendChild(courseCol);
        });
    }
});

</script>

<script> 
document.addEventListener('DOMContentLoaded', function () {
    var originalOrder = []; // To store the original order of course elements
    var sortedByPrice = false; // Flag to track if currently sorted by price

    // Save the original order of course elements
    var courseCols = document.querySelectorAll('.course-col');
    courseCols.forEach(function(courseCol) {
        originalOrder.push(courseCol);
    });

    document.getElementById('sortButton').addEventListener('click', function () {
        if (!sortedByPrice) {
            sortCourseByPrice();
            sortedByPrice = true;
            document.getElementById('sortButton').textContent = 'Restore Order';
        } else {
            restoreOriginalOrder();
            sortedByPrice = false;
            document.getElementById('sortButton').textContent = 'Sort Courses';
        }
    });

    function sortCourseByPrice() {
        var courseCols = document.querySelectorAll('.course-col');

        // Convert NodeList to array for sorting
        var courseColsArray = Array.from(courseCols);

        // Sort the array by price (assuming the price is the last element in each .course-col)
        courseColsArray.sort(function(a, b) {
            var priceA = parseFloat(a.querySelector('h3:last-of-type').innerText.replace('$', ''));
            var priceB = parseFloat(b.querySelector('h3:last-of-type').innerText.replace('$', ''));
            return priceA - priceB;
        });

        // Clear the container
        var container = document.querySelector('.course');
        container.innerHTML = '';

        // Append sorted elements back to the container
        courseColsArray.forEach(function(courseCol) {
            container.appendChild(courseCol);
        });
    }

    function restoreOriginalOrder() {
        var container = document.querySelector('.course');
        container.innerHTML = ''; // Clear the container

        // Append original order elements back to the container
        originalOrder.forEach(function(courseCol) {
            container.appendChild(courseCol);
        });
    }
});

</script>



    <!--------------------  course ----------------->
    <section class="course">
        <h1>Contests</h1>
        <p></p>
    
        <div class="row">
            <div class="course-col">
                <h3>Math League High School</h3>
                <p>Math League sponsors a number of high school contests that are held throughout the school year. 
                    Top-scoring students at qualifying meets held throughout the year will be invited to compete 
                    at the state and national championship. You have to sign up by yourself to participate in this contest. 
                    This contest is not done through your school, but students from same school can form a team 
                    (upto 4 students in a team) and compete for sweepstakes award.</p>
                    <h3>15$</h3>
            </div>
            <div class="course-col">
                <h3>AMC 10</h3>
                <p>The AMC 10 is a 25-question, 75-minute, multiple choice examinations in high school mathematics 
                    designed to promote the development and enhancement of problem-solving skills. The AMC 10 is for 
                    students in 10th grade and below, and covers the high school curriculum up to 10th grade. 
                    The AMC 10 is the first in a series of competitions that eventually lead all the way to the
                     International Mathematical Olympiad </p>
                     <h3>13$</h3>
            </div>
            <div class="course-col">
                <h3>AMC 12

                </h3>
                <p>The AMC 12 is a 25-question, 75-minute, multiple choice examinations in high school mathematics
                    designed to promote the development and enhancement of problem-solving skills. The AMC 12 is for
                     students in 12th grade and below, and covers the high school curriculum up to 12th grade. The 
                     AMC 12 is the first in a series of competitions that eventually lead all the way to the International 
                     Mathematical Olympiad</p>
                     <h3>17$</h3>
            </div>
        </div>

       
        <div class="row">
            <div class="course-col">
                <h3>AIME</h3>
                <p>This stands for American Invitational Mathematics Examination. The students are selected based on 
                    their scores in AMC 10 (top 2.5% of students) or AMC12 (top 5% of students). The AIME is a 15 
                    question, 3-hour examination, each answer is an integer number between 0 to 999. The questions on
                     the AIME are much more difficult than those on the AMC 10 and AMC 12 competitions. Based on 
                     the AMC10/12 scores and AIME scores, the top students are invited to take the USAJMO or USAMO 
                     which are proof based competitions.</p>
                     <h3>32$</h3>
            </div>
            <div class="course-col">
                <h3>Math Kangaroo</h3>
                <p>Math Kangaroo is a math contest with many puzzles and logic style problems. Many prizes are handed
                     out to top 20 scorers across their state and the nation. You have to sign up at a test center from
                      September to early December. There are  thousands of test centers across USA where you can take this test.</p>
                      <h3>14$</h3>
            </div>
            <div class="course-col">
                <h3>
                    Pi Math Contest (PiMC) Math Contest</h3>
                <p>AlphaStar Academy organizes an exciting Pi Math Contest (PiMC) which is for students up to 8th grade
                     in two divisions. PiMC is offered online, annually as a single-round individual contest. Top scoring
                      individuals are recognized on the contest page and get winner certificates as well as awards.</p>
                      <h3>50$</h3>
            </div>
        </div>


        <!------------- Olympiads ----------->
    
        <div class="row">
            <div class="course-col">
                <h3>Fall Math Meet by NanoMath</h3>
                <p>An annual, student-run online math competition and event for high school and advanced middle school students.
                     In addition to contest rounds, FMM features activities and talks by notable mathematicians.</p>
                     <h3>35$</h3>
            </div>
            <div class="course-col">
                <h3>Harvest Math Invitational (HMI)</h3>
                <p>HMI is a unique opportunity for high schoolers to compete in a challenging and fun individual 
                    and group contest of mathematical skill.</p>
                    <h3>40$</h3>
            </div>
            <div class="course-col">
                <h3>Shengmeng Math Competition (organized by Cowconuts Math Club)</h3>
                <p>The competition is divided into two rounds that everyone will take part in: an Individual 
                    Round and a team Guts Round. There will also be Tiebreaker Rounds that only some contestants will take part in.

                    ​</p>
                    <h3>90$</h3>
            </div>
        </div>
    </section>
    

    <!-------------- facilities -------------->

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