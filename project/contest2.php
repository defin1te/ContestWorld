<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                    <li><a href="contest.php">Англиский</a></li>
                    <li><?= $_COOKIE['User']?></li>
                </ul>
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>
        <h1> Наши Конкурсы</h1>
    </section>
<!----------------------------Поиск ------------------->

<input type="text" id="searchInput" class="Searching" placeholder="Поиск конкурса..." oninput="searchProducts()">
<button type="submit" onclick="eraseSearch()">Очистить</button>
<button id="sortButton">Сортировать Курсы</button>

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
            document.getElementById('sortButton').textContent = 'Восстановить порядок';
        } else {
            restoreOriginalOrder();
            sortedByPrice = false;
            document.getElementById('sortButton').textContent = 'Сортировать Курсы';
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
        <h1>Конкурсы</h1>
        <p></p>
    
        <div class="row">
            <div class="course-col">
                <h3>Math League High School</h3>
                <p>Math League организует ряд соревнований для старшеклассников, которые проходят в течение учебного года. 
                    Ученики с высокими баллами на отборочных этапах, проводимых в течение года, будут приглашены на 
                    чемпионаты штата и национальные соревнования. Вы должны самостоятельно зарегистрироваться, чтобы 
                    принять участие в этом конкурсе. Этот конкурс не проводится через вашу школу, но ученики из 
                    одной школы могут создать команду (до 4 человек в команде) и соревноваться за призы.</p>
                    <h3>15$</h3>
            </div>
            <div class="course-col">
                <h3>AMC 10</h3>
                <p>AMC 10 - это 25-вопросный, 75-минутный многовариантный экзамен по высшей математике для старшеклассников,
                     созданный для содействия развитию и совершенствованию навыков решения проблем. AMC 10 предназначен для 
                     учеников 10-го класса и младше и охватывает школьную программу до 10-го класса. AMC 10 - это первый 
                     в серии соревнований, которые в конечном итоге приводят к Международной математической олимпиаде.</p>
                     <h3>13$</h3>
            </div>
            <div class="course-col">
                <h3>AMC 12</h3>
                <p>AMC 12 - это 25-вопросный, 75-минутный многовариантный экзамен по высшей математике для старшеклассников,
                     созданный для содействия развитию и совершенствованию навыков решения проблем. AMC 12 предназначен для 
                     учеников 12-го класса и младше и охватывает школьную программу до 12-го класса. AMC 12 - это первый 
                     в серии соревнований, которые в конечном итоге приводят к Международной математической олимпиаде.</p>
                     <h3>17$</h3>
            </div>
        </div>

       
        <div class="row">
            <div class="course-col">
                <h3>AIME</h3>
                <p>Это аббревиатура от American Invitational Mathematics Examination. Студенты отбираются на основе их результатов
                     на AMC 10 (лучшие 2,5% студентов) или AMC12 (лучшие 5% студентов). AIME - это 15 вопросов, 3-часовой экзамен, 
                     каждый ответ является целым числом от 0 до 999. Вопросы на AIME намного сложнее, чем на соревнованиях AMC 10 и AMC 12.
                      На основе баллов AMC10/12 и баллов AIME лучшие студенты приглашаются на соревнования USAJMO или USAMO, которые основаны на доказательствах.</p>
                     <h3>32$</h3>
            </div>
            <div class="course-col">
                <h3>Math Kangaroo</h3>
                <p>Math Kangaroo - это математический конкурс с множеством головоломок и задач на логику. Множество призов вручается 
                    лучшим 20 участникам в их штате и стране. Вы должны зарегистрироваться в тестовом центре с сентября по начало 
                    декабря. Есть тысячи тестовых центров по всему США, где вы можете сдать этот тест.</p>
                      <h3>14$</h3>
            </div>
            <div class="course-col">
                <h3>Pi Math Contest (PiMC) Math Contest</h3>
                <p>Академия AlphaStar организует захватывающий конкурс математики Pi Math Contest (PiMC) для учеников до 8-го класса
                     в двух разделах. PiMC предлагается онлайн ежегодно в виде одного раунда индивидуального конкурса. Лучшие участники 
                     получают признательные записи на странице конкурса, а также сертификаты победителей и награды.</p>
                      <h3>50$</h3>
            </div>
        </div>


        <!------------- Олимпиады ----------->
    
        <div class="row">
            <div class="course-col">
                <h3>Fall Math Meet by NanoMath</h3>
                <p>Ежегодный студенческий онлайн математический конкурс и мероприятие для старшеклассников и продвинутых учеников средней школы.
                     Помимо соревновательных раундов, FMM включает в себя мероприятия и беседы с известными математиками.</p>
                     <h3>35$</h3>
            </div>
            <div class="course-col">
                <h3>Harvest Math Invitational (HMI)</h3>
                <p>HMI - это уникальная возможность для старшеклассников соревноваться в вызывающем и веселом индивидуальном и
                     групповом конкурсе математического мастерства.</p>
                    <h3>40$</h3>
            </div>
            <div class="course-col">
                <h3>Shengmeng Math Competition (organized by Cowconuts Math Club)</h3>
                <p>Соревнование разделено на два раунда, в которых примут участие все: индивидуальный раунд и командный раунд.
                     Также будут проводиться дополнительные раунды для тех участников, которые будут допущены к ним.</p>
                    <h3>90$</h3>
            </div>
        </div>
    </section>
    

    <!-------------- Удобства -------------->

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
        <p>Сделано с <i class="fa fa-heart-o"></i>Муратхановым Алдияром</p>
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
