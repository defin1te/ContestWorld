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
    <section class="header">
        <nav>
            <a href="main.php"><img src="media/logo.png"></a>
            <div class="nav-links" id="navLinks">
                <i class="fa fa-times" onclick="hideMenu()"></i>
                <ul>
                    <li><a href="main2.php">ГЛАВНАЯ</a></li>
                    <li><a href="about2.php">О НАС</a></li>
                    <li><a href="contact2.php">КОНТАКТЫ</a></li>
                    <li><a href="contest2.php">КОНКУРСЫ</a></li>
                    <li><a href="index.html">РЕГИСТРАЦИЯ</a></li>
                    <li><a href="main.php">Англиский</a></li>
                    <li><?= $_COOKIE['User']?></li>
                    <button onclick="toggleDarkMode()">Toggle Dark Mode</button>
                </ul>
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>
<div class="text-box">
    <h1>ContestWorld</h1>
    <p>Добро пожаловать на нашу платформу!<br> Здесь вы найдете разнообразные 
                соревнования и конкурсы по различным темам.<br>
                Независимо от того, увлекаетесь ли вы физикой, математикой или информатикой,<br> 
                наш сайт - ваш шанс найти увлекательные возможности для демонстрации ваших талантов и экспертизы.
    </p>
    <a href="about.php" class="hero-btn">Посетите нас, чтобы узнать больше</a>
</div>
    </section>

<!----------- Course ----------->

<section class="course">
    <h1>КОНКУРСЫ</h1>
    <p></p>

    <div class="row">
        <div class="course-col">
            <h3>Мировые</h3>
            <p>Участвуйте в мировых конкурсах, переходящих границы, объединяющих 
                    таланты и идеи из разных уголков мира. Покажите свои навыки 
                    на международной платформе и соревнуйтесь с участниками из разных стран.</p>
        </div>
        <div class="course-col">
            <h3>Национальные</h3>
            <p>Принимайте участие в международных конкурсах, отмечающих культурное многообразие и инновации.
                     Присоединяйтесь к живому сообществу участников со всего мира, обменивайтесь идеями и 
                     бросайте вызов самым талантливым людям разных наций.</p>
        </div>
        <div class="course-col">
            <h3>Онлайн</h3>
            <p>Исследуйте мир онлайн-конкурсов, созданных для удобства и доступности. 
                    Независимо от того, профессионал вы или энтузиаст, участвуйте в виртуальных соревнованиях 
                    прямо из дома. Присоединяйтесь к цифровой арене, демонстрируйте свои способности и 
                    общайтесь с единомышленниками со всего мира.</p>
        </div>
    </div>
</section>

<!--------------- campus ---------->

<section class="campus">
    <h1>Предметы</h1>
    <p></p>

    <div class="row">
        <div class="campus-col">
            <img src="media/math.avif">
            <div class="layer">
                <h3>МАТЕМАТИКА</h3>
            </div>
        </div>
        <div class="campus-col">
            <img src="media/physics1.avif">
            <div class="layer">
                <h3>ФИЗИКА</h3>
            </div>
        </div>
        <div class="campus-col">
            <img src="media/info.jpeg">
            <div class="layer">
                <h3>ИНФОРМАТИКА</h3>
            </div>
        </div>
    </div>


</section>

<!------------ Testimonials ------------->
<section class="testimonials">
    <h1>Что говорят наши пользователи</h1>
    <p></p>

    <div class="row">
        <div class="testimonial-col">
            <img src="media/comment.png">
            <div>
                <p>"Мне нравится, насколько легко находить и участвовать в конкурсах на этом сайте!
                         Простой в использовании интерфейс делает навигацию по различным категориям легкой. 
                         Это определенно моя платформа для демонстрации талантов и поиска новых возможностей."
                </p>
                <h3>Ернур Алпысбай</h3>
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
                <p>"Этот сайт полностью изменил мой опыт участия в конкурсах!
                         От международных соревнований до вызовов, специфических для определенной области, 
                         здесь есть что-то для всех. Поддерживающее сообщество и безупречный процесс регистрации 
                         делают участие в нем истинным удовольствием. Настоятельно рекомендуется всем, кто 
                         увлечен конкурсами и творческим самовыражением!"
                 </p>
                <h3>Сагын Джумадильдаев</h3>
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
    <h1>Подпишитесь на наши различные соревнования<br>где угодно в мире</h1>
    <a href="contact.php" class="hero-btn">СВЯЖИТЕСЬ С НАМИ</a>    
</section>




<!---------------Footer--------------->

<section class="footer">
    <h4>О нас</h4>
    <p>В ContestWorld мы страстно поддерживаем творчество и талант по всему миру.<br> 
    Наша платформа посвящена предоставлению места, где люди могут исследовать свой потенциал, <br>
    находить единомышленников и участвовать в захватывающих конкурсах, вдохновляющих на инновации.<br>
    С приверженностью к качеству и инклюзивности мы стремимся к тому, чтобы наши члены сообщества могли <br>
    демонстрировать свои навыки и достигать своих амбиций. Присоединяйтесь к нам в этом путешествии творчества, сотрудничества, 
    и безграничных возможностей.

    </p>
        <div class="icons">
            <i class="fa fa-facebook"></i>
            <i class="fa fa-instagram"></i>
            <i class="fa fa-twitter"></i>
            <i class="fa fa-linkedin"></i>
        </div>
        <p>Сделано с <i class="fa fa-heart-o"></i> Муратхановым Алдияром</p>
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


</body>
</html>