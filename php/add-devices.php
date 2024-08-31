<?php
session_start();
	$_SESSION;
	include("connection.php");
	include("functions.php");
	$user_data = check_login($con); 
	
	
?>

<!-- ustroistva -->


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>СИРЕНА - Добавяне на устройство</title>
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
                                <li><a href="show-cluster.php">Клъстери</a></li>
                                <li><a href="show-devices.php" class="active">Устройства</a></li>
                                <li><a href="zanas.php">За нас</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- end header -->
        <!-- header image -->
        <div class="header-img-2">
        </div>
        <!-- end header image -->
        <!-- Welcome message -->
        <div class="welcome-container">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="welcome-wrapper">
                            <h2 class="welcome-title text-uppercase">Добавяне</h2>
                            <img src="img/welcome-divider-lines.png" alt="Welcome divider" class="welcome-divider-lines-img">
                            <nav class="text-uppercase templatemo-nav-1">
                                <ul class="nav2">
                                    <li><a href="show-devices.php" >Визуализация на устройство</a></li>
                                        <li><a href="add-devices.php" class="active">Добавяне на устройство</a></li>
                                        <!--<li><a href="edit-devices.php">Редактиране на устройство</a></li>
                                        <li><a href="delete-devices.php">Изтриване на устройство</a></li> -->       
                                </ul>
                            </nav>
                      
                    
                    
                </div>
                            
                            
                    </div>
                </div>
            </div>
        </div>
        <!-- Welcome message -->
        <!-- main content -->
        <div class="form">
            <div class="form2">
        <form action="insert-device-in-db.php" class="templatemo-login-form" method="post" enctype="multipart/form-data">
            <div class="row form-group">
              <div class="col-lg-6 col-md-6 form-group">                  
                  <label for="inputDeviceName">Име на устройство</label>
                  <input type="text" class="form-control" id="inputDeviceName" name="device_name1" placeholder="Устройство 1" title = "Въведете името на устройството на кирилица без интервал" required pattern = "(^[a-zA-Zа-яА-Я]{1,30})">                  
              </div>
              </div>
              <div class="row form-group">
              <div class="col-lg-6 col-md-6 form-group">                  
                  <label for="inputDeviceDescription">Описание на устройство</label>
                  <input type="text" class="form-control" id="inputDeviceDescription" name="device_description1" placeholder="Устройство 1 - Община Велико Търново, река Янтра">                  
              </div> 
            </div>
          
          
           <!-- да се добави четене от база данни с клъстери и да се предвиди падащо меню за избор -->
              <div class="row form-group">
              <div class="col-lg-6 col-md-6 form-group">                  
                  <label for="inputDeviceCluster">Принадлежност към клъстер</label>
                  <input type="number" class="form-control" id="inputDeviceCluster" name="device_cluster1" value="Клъстер 1" title = "Въведете името на клъстера на кирилица без интервал" required pattern = "(^[a-zA-Zа-яА-Я]{1,30})">                  
              </div> 
            </div>
               
            <div class="row form-group">
              <div class="col-lg-6 col-md-6 form-group">                  
                  <label for="inputDeviceCoordinate1">Геолокация / Географска ширина (във формат 43.078151)</label>
                  <input type="text" class="form-control" id="inputDeviceCoordinate1" name="device_geolocation11" placeholder="43.078151" title = "Въведете географската ширина на устройството без интервал" required pattern = "[+-]?\d+(\.\d+)?">                  
              </div>
              </div>
          <div class="row form-group">    
              <div class="col-lg-6 col-md-6 form-group">                  
                  <label for="inputDeviceCoordinate2">Геолокация / Географска дължина (във формат 25.6272318)</label>
                  <input type="text" class="form-control" id="inputDeviceCoordinate2" name="device_geolocation21" placeholder="25.6272318" title = "Въведете географската дължина на устройството без интервал" required pattern = "[+-]?\d+(\.\d+)?">                  
              </div> 
            </div>
            
              <!--<div class="row form-group">
              <div class="col-lg-6 col-md-6 form-group">                  
                  <label for="sensor_water_1_status">Наличие на сензор 1</label>
                  <input type="checkbox" class="form-control" id="sensor_water_1_status" name="sensor_water_1_status_1" placeholder="1 или 0">                  
              </div>
              </div> -->
              <div class="row form-group">
              <div class="col-lg-6 col-md-6 form-group">                  
                  <label for="sensor_water_1_level">Критично ниво за известяване на сензор 1</label>
                  <input type="number" class="form-control" id="sensor_water_1_level" name="sensor_water_1_level_1" placeholder="200 cm" title = "Въведете Критично ниво за известяване на сензор 1 на устройството без интервал" required pattern = "[+-]?\d+">                  
              </div>
              </div>
              <!-- <div class="row form-group">
              <div class="col-lg-6 col-md-6 form-group">                  
                  <label for="sensor_water_1_alert">Известяване при достигане на критично ниво на сензор 1</label>
                  <input type="checkbox" class="form-control" id="sensor_water_1_alert" name="sensor_water_1_alert_1" placeholder="1 или 0">                  
              </div>
              </div>
              <div class="row form-group">
              <div class="col-lg-6 col-md-6 form-group">                  
                  <label for="sensor_water_2_status">Наличие на сензор 2</label>
                  <input type="checkbox" class="form-control" id="sensor_water_2_status" name="sensor_water_2_status_1" placeholder="1 или 0">                  
                 
              </div>
              </div>-->
              <div class="row form-group">
              <div class="col-lg-6 col-md-6 form-group">                  
                  <label for="sensor_water_2_level">Критично ниво за известяване на сензор 2</label>
                  <input type="number" class="form-control" id="sensor_water_2_level" name="sensor_water_2_level_1" placeholder="200 cm" title = "Въведете Критично ниво за известяване на сензор 2 на устройството без интервал" required pattern = "[+-]?\d+">                  
              </div>
              </div>
              <!--<div class="row form-group">
              <div class="col-lg-6 col-md-6 form-group">                  
                  <label for="sensor_water_2_alert">Известяване при достигане на критично ниво на сензор 2</label>
                  <input type="checkbox" class="form-control" id="sensor_water_2_alert" name="sensor_water_2_alert_1" placeholder="1 или 0">                  
              </div>
              </div>
              <div class="row form-group">
              <div class="col-lg-6 col-md-6 form-group">                  
                  <label for="sensor_water_3_status">Наличие на сензор 3</label>
                  <input type="checkbox" class="form-control" id="sensor_water_3_status" name="sensor_water_3_status_1" placeholder="1 или 0">                  
              </div>
              </div> -->
              <div class="row form-group">
              <div class="col-lg-6 col-md-6 form-group">                  
                  <label for="sensor_water_3_level">Критично ниво за известяване на сензор 3</label>
                  <input type="number" class="form-control" id="sensor_water_3_level" name="sensor_water_3_level_1" placeholder="200 cm" title = "Въведете Критично ниво за известяване на сензор 2 на устройството без интервал" required pattern = "[+-]?\d+">                  
              </div>
              </div>
              <!--<div class="row form-group">
              <div class="col-lg-6 col-md-6 form-group">                  
                  <label for="sensor_water_3_alert">Известяване при достигане на критично ниво на сензор 3</label>
                  <input type="checkbox" class="form-control" id="sensor_water_3_alert" name="sensor_water_3_alert_1" placeholder="1 или 0">                  
              </div>
              </div>
              <div class="row form-group">
              <div class="col-lg-6 col-md-6 form-group">                  
                  <label for="sensor_water_4_status">Наличие на сензор 4</label>
                  <input type="checkbox" class="form-control" id="sensor_water_4_status" name="sensor_water_4_status_1" placeholder="1 или 0">                  
              </div>
              </div>
              <div class="row form-group">
              <div class="col-lg-6 col-md-6 form-group">                  
                  <label for="sensor_water_4_level">Критично ниво за известяване на сензор 4</label>
                  <input type="number" class="form-control" id="sensor_water_4_level" name="sensor_water_4_level_1" placeholder="200 cm">                  
              </div>
              </div>-->
              <!--<div class="row form-group">
              <div class="col-lg-6 col-md-6 form-group">                  
                  <label for="sensor_water_4_alert">Известяване при достигане на критично ниво на сензор 4</label>
                  <input type="checkbox" class="form-control" id="sensor_water_4_alert" name="sensor_water_4_alert_1" placeholder="1 или 0">                  
              </div>
              </div>
              <div class="row form-group">
              <div class="col-lg-6 col-md-6 form-group">                  
                  <label for="sensor_level_1_status">Наличие на ултразвуков сензор</label>
                  <input type="checkbox" class="form-control" id="sensor_level_1_status" name="sensor_level_1_status_1" placeholder="1 или 0">                  
              </div>
              </div>-->
              <div class="row form-group">
              <div class="col-lg-6 col-md-6 form-group">                  
                  <label for="sensor_level_1_alert_level">Критично ниво за известяване на ултразвуков сензор(в метри)</label>
                  <input type="number" class="form-control" id="sensor_level_1_alert_level" name="sensor_level_1_alert_level_1" placeholder="2 метра" title = "Въведете критично ниво за известяване на ултразвуков сензор(в метри) на устройството без интервал" required pattern = "[+-]?\d+">                  
              </div>
              </div>
             <div class="row form-group">
              <div class="col-lg-6 col-md-6 form-group">                  
                  <label for="inputWiFiName">Име на безжичната мрежа, към която ще се свърже устройството</label>
                  <input type="text" class="form-control" id="inputWiFiName" name="device_wifi_network_name1" placeholder="Sirena" title = "Въведете на безжичната мрежа на устройството без интервал" required pattern = "(^[a-zA-Zа-яА-Я0-9]{1,30})">                  
              </div>
              </div>
          <div class="row form-group">    
              <div class="col-lg-6 col-md-6 form-group">                  
                  <label for="inputWiFiPassword">Парола за безжичната мрежа, към която ще се свърже устройството</label>
                  <input type="text" class="form-control" id="inputWiFiPassword" name="device_wifi_network_password1" placeholder="Sirena" title = "Въведете на паролата на безжичната мрежа на устройството без интервал" required pattern = "(^[a-zA-Zа-яА-Я0-9]{1,30})">                  
              </div> 
            </div>
            
            
            <div class="row form-group">    
              <div class="col-lg-6 col-md-6 form-group">                  
                  <label for="inputMAC">MAC адрес / сериен номер на устройството</label>
                  <input type="text" class="form-control" id="inputMAC" name="device_mac1" placeholder="23:43:d3:43:43:54" title = "Въведете на MAC адреса на устройството без интервал" required pattern = "([0-9A-Fa-f]{2}[:-]){5}([0-9A-Fa-f]{2})">                  
              </div> 
            </div>
            
            
            
           
            </div>
              
                     
            
            <div class="form-group text-left">
              <button type="submit" class="btn btn-primary">Добави устройство</button>
              <button type="reset" class="btn btn-primary">Отказ</button>
            </div>                           
          </form>
        </div>
    </div>
        
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
        <script type="text/javascript" src="js/templatemo-script.js"></script>      <!-- Templatemo Script -->
        <script>
            /* Google map
            ------------------------------------------------*/
            var map = '';
            var center;

            function initialize() {
                var mapOptions = {
                  zoom: 16,
                  center: new google.maps.LatLng(13.758468,100.567481),
                  scrollwheel: false
                };

                map = new google.maps.Map(document.getElementById('google-map'),  mapOptions);

                google.maps.event.addDomListener(map, 'idle', function() {
                    calculateCenter();
                });

                google.maps.event.addDomListener(window, 'resize', function() {
                    map.setCenter(center);
                });
            }

            function calculateCenter() {
              center = map.getCenter();
            }

            function loadGoogleMap(){
                var script = document.createElement('script');
                script.type = 'text/javascript';
                script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&' + 'callback=initialize';
                document.body.appendChild(script);
            }
            $(document).ready(function(){
                loadGoogleMap();
            });
        </script>
    </body>
</html>
