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
                    <li><a href="main2.php">ГЛАВНАЯ</a></li>
                    <li><a href="about2.php">О НАС</a></li>
                    <li><a href="contact2.php">КОНТАКТЫ</a></li>
                    <li><a href="contest2.php">КОНКУРСЫ</a></li>
                    <li><a href="index.html">РЕГИСТРАЦИЯ</a></li>
                    <li><a href="contact.php">Англиский</a></li>
                    <li><?= $_COOKIE['User']?></li>
                </ul>
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>
        <h1> Свяжитесь с нами</h1>
    </section>
    <!-------------------- Свяжитесь с нами ---------------->
    <section class="contact-us">
        <div class="row">
            <div class="contact-col">
                <div>
                    <i class="fa fa-phone"></i>
                    <span>
                        <h5>+7 701 771 89 24</h5>
                        <p>Понедельник-Пятница с 10:00 до 18:00</p>
                    </span>
                </div>
                <div>
                    <i class="fa fa-envelope-o"></i>
                    <span>
                        <h5>contestworld@gmail.com</h5>
                        <p>Напишите нам</p>
                        
                    </span>
                </div>
            </div>
            <div class="contact-col">
                <form action="form-handler.php" method="post">
                    <input type="text"  name="name" placeholder="Введите ваше имя" required>
                    <input type="email" name="email" placeholder="Введите адрес электронной почты" required>
                    <input type="text" name="subject" placeholder="Введите вашу тему" required>
                    <textarea rows="8" name="message" placeholder="Сообщение" required></textarea>
                    <button type="submit" class="hero-btn red-btn">Отправить сообщение</button>
                </form>




            </div>
        </div>

    </section>
<!---------------Подвал--------------->
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
<!---------JavaScript для переключения меню----------->
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
