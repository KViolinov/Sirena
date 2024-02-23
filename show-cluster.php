<?php
session_start();
	$_SESSION;
	$username1 = isset($_SESSION['username']) ? $_SESSION['username'] : '';
	include("connection.php");
	include("functions.php");
	$user_data = check_login($con);
?>


<!-- klusteri -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>СИРЕНА - Налични клъстери</title>
       <meta name="description" content="СИРЕНА - Система за Известяване и Ранна Евакуация при Наводнения и Аварии">
        <meta name="author" content="Konstantin Violinov, Константин Виолинов">
        <meta name="area" content="Education, Smart Home, IoT, Internet of Thing, Arduino, Образование, Умен дом, Интернет на нещата, Ардуино, Обучение" />
        <meta name="rating" content="General" />
        <meta name="abstract" content="СИРЕНА - Система за Известяване и Ранна Евакуация при Наводнения и Аварии. Целта на този сайт е да представи работеща платформа за ранно известяване при опасност от наводнения." />
        <meta name="keywords" content="Обучение, Образование, Умен дом, Промишлена автоматизация, Проекти, Проекти с Ардуино, Проекти за умен дом, Проекти за примишлена автоматизация, Проекти за IoT, 
       Education, smart home for beginners, smart home for advanced, Arduino, smart home with arduino, Projects with Arduino, ESP32, LoRa32,
       Making Smart Home, Building Smart Home, Internet of Thing, IoT, Би смарт, B-Smart, Be Smart, B Smart " />
        <meta name="subject" content="СИРЕНА - Система за Известяване и Ранна Евакуация при Наводнения и Аварии, промишлена автоматизация, SIRENA, Internet of Thing, IoT, Projects" />
       	<meta name="robots" content="index, follow" />
        <!-- 
        Multi Profile
        http://www.templatemo.com/preview/templatemo_457_multi_profile
        -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700' rel='stylesheet' type='text/css'>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/templatemo-style.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

<style>
    .text-uppercase{
               text-align: left;
           }
           
           table{
               width:300px;
               
           }
</style>
    </head>
    <body class="templatemo-container">
        <!-- header -->
        <div class="header-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-4 site-name-container">
                        <img src="img/logo.png" alt="Site logo" class="site-logo">
                        <h1 class="site-name">СИРЕНА</h1>
                    </div>
                    <div class="mobile-menu-icon">
                        <i class="fa fa-bars"></i>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-8 templatemo-nav-container">
                        <nav class="templatemo-nav">
                            <ul>
                                <li><a href="index.php">Начало</a></li>
                                <li><a href="visualization.php">Визуализация</a></li>
                                <li><a href="show-cluster.php" class="active">Клъстери</a></li>
                                <li><a href="show-devices.php">Устройства</a></li>
                                <li><a href="zanas.php">За нас</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- end header -->
        <!-- header image -->
        <div class="header-img-3"></div>
        <!-- end header image -->
        <!-- Welcome message -->
        <div class="welcome-container">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="welcome-wrapper">
                            <h2 class="welcome-title text-uppercase">Налични клъстери</h2>
                            <img src="img/welcome-divider-lines.png" alt="Welcome divider" class="welcome-divider-lines-img">
                            <nav class="text-uppercase templatemo-nav-1">
                                <ul class="nav2">
                                    <li><a href="show-cluster.php" class="active">Визуализация на клъстери</a></li>
                                        <li><a href="add-cluster.php">Добавяне на клъстер</a></li>
                                        <!--<li><a href="edit-cluster.php">Редактиране на клъстер</a></li>
                                        <li><a href="delete-cluster.php">Изтриване на клъстер</a></li> -->       
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Welcome message -->
        <!-- main content -->
        <!-- показване на таблица-->         
            
<!--<table width="60%" border="1" style="border-collapse:collapse;">
    <thead>
    <tr>
    <!--<th><strong>Номер на клъстера</strong></th>
    <th><strong>Име на клъстера</strong></th>
    <th><strong>Описание на клъстера</strong></th>
    <th><strong>Редактиране</strong></th>
    <th><strong>Изтриване</strong></th> 
    </tr>
    </thead>
    <tbody>-->
    
    
    <div class = "container my-5">
        <!--<h2>Налични клъстери</h2>-->
        <!--<a class = "btn btn-primary" href = "add-cluster.php" role = "button">Нов клъстер</a>-->
        <br>
        <table class = "table">
            <thread>
                <tr>
                    <th>ID на клъстер</th>
                    <th>Собственик</th>
                    <th>Име на клъстер</th>
                    <th>Описание на устройство</th>
                    <th>Географска ширина</th>
                    <th>Географска дължина</th>
                    <th>Критично ниво</th>
                </tr>
            </thread>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "kvbbgcom_floodPrevention";
                $password = "kv0889909595";
                $database = "kvbbgcom_floodPrevention";
                
                $connection = new mysqli($servername, $username, $password, $database);
                
                if($connection->connect_error){
                    die("Connection failed: " . $connection->connect_error);
                }
                
                
                $sql = "SELECT * FROM clusters WHERE `user_id` = '$username1'";
                $result = $connection->query($sql);
                
                if(!$result){
                    die("Invalid query: " . $connection->error);
                }
                
                while($row = $result->fetch_assoc()){
                    echo "
                    <tr>
                        <th>$row[cluster_id]</th>
                        <th>$row[user_id]</th>
                        <th>$row[cluster_name]</th>
                        <th>$row[cluster_description]</th>
                        <th>$row[cluster_geolocation1]</th>
                        <th>$row[cluster_geolocation2]</th>
                        <th>$row[cluster_critical_level]</th>
                        <td>
                        
                            <a class = 'btn btn-primary btn-sm' href='edit-cluster.php?id=$row[id]'>Редактирай</a>
                            <a class = 'btn btn-danger btn-sm' href='delete-cluster.php?id=$row[id]'>Изтрий</a>
                        </td>
                    </tr>
                ";
                }
                ?>
                
                
                
            </tbody>
        </table>
    </div>
                
          <!-- край на таблицата-->  
        <div class="blue-divider effect1">
            <div class="dark-blue-bg"></div>
            <div class="blue-divider-bg-graphic"></div>
            <div class="blue-bg"></div>
        </div>
        <section class="templatemo-container blue-bg footer-nav effect1">
            <div class="container">
                <div class="col-lg-2 col-md-2 col-sm-6 footer-block">
                    <h3 class="text-uppercase">Основно меню</h3>
                    <nav class="text-uppercase templatemo-nav-2">
                        <ul>
                            <li><a href="index.php" class="active">Начало</a></li>
                                <li><a href="visualization.php">Визуализация</a></li>
                                <li><a href="show-cluster.php">Клъстери</a></li>
                                <li><a href="show-devices.php">Устройства</a></li>
                                <li><a href="zanas.php">За нас</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 footer-block">
                    <h3 class="text-uppercase">За нас</h3>
                    <p>Настоящият сайт е разработен като част от демонстрационна платформа СИРЕНА - "Система за Известяване и Ранна Евакуация при Наводнения и Аварии"
                        за участие в 21-ва Национална олимпиада по информационни технологии 2023/24
                    </p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 footer-block">
                    <h3 class="text-uppercase">Ръководител</h3>
                    <ul>
                        <li><a href="#">Георги Игнатов</a></li>
                        <li><a href="#">старши учител<a></li>
                        <li><a href="#">ПМГ "Васил Друмев"</a></li>
                        <li><a href="#">Велико Търново</a></li>
                        <li><a href="http://www.pmgvt.org" target="_blank">www.pmgvt.org</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 footer-block">
                    <h3 class="text-uppercase">Автор</h3>
                    <ul>
                        <li><a href="#">Константин Виолинов</a></li>
                        <li><a href="#">ПМГ "Васил Друмев"</a></li>
                        <li><a href="#">Велико Търново</a></li>
                        <li><a href="http://www.pmgvt.org" target="_blank">www.pmgvt.org</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- end main content -->
        <footer class="text-center">
            <p class="small copyright-text">Copyright &copy; 2024 Константин Виолинов| Design: Template Mo</p>
        </footer>

        <!-- JS -->
        <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>      <!-- jQuery -->
        <script type="text/javascript" src="js/isotope.pkgd.min.js"></script>      <!-- Isotope, http://isotope.metafizzy.co -->
        <script type="text/javascript" src="js/templatemo-script.js"></script>      <!-- Templatemo Script -->
        <script>
            // All images are loaded. Call isotope
            $(window).load(function() {
                 var $container = $('#folio-container');
                // init
                $container.isotope({
                // options
                itemSelector: '.folio-item',
                animationOptions: {
                        duration: 750,
                        easing: 'linear',
                        queue: false
                    },
                });

                // filter items when filter link is clicked
                jQuery('#filters a').click(function(){
                    var selector = $(this).attr('data-filter');
                    $container.isotope({ filter: selector });
                    return false;
                });

                jQuery('#filters li a').click(function(){

                    jQuery('#filters li').removeClass('current');
                    jQuery(this).parent().addClass('current');
                });
            });
        </script>
    </body>
</html>
