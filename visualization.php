
<!-- vizualizaciq -->




<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>СИРЕНА - Визуализация</title>
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
       	
        <meta http-equiv="refresh" content="5">
        <!-- 
        Multi Profile
        http://www.templatemo.com/preview/templatemo_457_multi_profile
        -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700' rel='stylesheet' type='text/css'>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/templatemo-style.css" rel="stylesheet">
        
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

    <style>
        body {
            margin: 0;
            padding: 0;
        }
        #map {
            height: 100vh;
            width: 100%;
        }
        
        .text-uppercase{
               text-align: left;
           }
    </style>      

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

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
                                <li><a href="visualization.php" class="active">Визуализация</a></li>
                                <li><a href="show-cluster.php">Клъстери</a></li>
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
        
        <!--
        <div class="header-img-2"></div>
        -->
        
        
        <!-- end header image -->
        <!-- Welcome message -->
        <!--
        <div class="welcome-container">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="welcome-wrapper">
                            <h2 class="welcome-title text-uppercase">About Us</h2>
                            <img src="img/welcome-divider-lines.png" alt="Welcome divider" class="welcome-divider-lines-img">
                            <p class="welcome-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc posuere lectus augue, non rhoncus erat accumsan eu. Sed dictum sem.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        -->
        <!-- Welcome message -->
        <!-- main content -->
        <!--
        <section class="templatemo-container section-shadow-bottom">
            <div class="container">
                <div class="row section-title-container">
                    <div class="col-lg-12 text-uppercase text-center">
                        <h2 class="section-title">Who We Are</h2>
                        <div class="section-title-underline-blue"></div>
                        <hr class="section-title-underline">
                        <p class="small">Lorem ip sums</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-7 col-md-7 col-sm-7 tm-about-left">
                        <img src="img/7.jpg" alt="Image" class="img-responsive margin-bottom-30">
                        <h3 class="section-title-2 text-uppercase font-weight-300"><b>Morbi</b> <span class="blue-text">Accumsan</span></h3>
                        <p class="justify-text">Morbi dapibus rhoncus nulla ac tempus. Integer felis lorem, fermentum quis nisl accumsan, gravida gravida est. Cras ultrices rhoncus dui ut laoreet. Fusce tincidunt, urna a imperdiet tempor, orci dolor dictum elit, sit amet malesuada mauris magna eget dolor.</p>
                        <p class="justify-text margin-bottom-30">Phasellus lobortis nisl ut tortor placerat, vel auctor felis semper. Quisque ut auctor sapien. Proin gravida arcu malesuada, venenatis nisl vitae, egestas sem. Vestibulum mauris magna, aliquam non commodo ac, porttitor a augue.</p>
                        <a href="#" class="btn-blue-gradient">Prima Liuam</a>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-5 tm-about-right">
                        <div class="tm-img-container margin-bottom-30">
                            <div class="tm-img-overlay">
                                <p class="img-description">Feufelisda</p>
                                <p class="img-title">Nullam Acurna</p>
                            </div>
                            <img src="img/8.jpg" alt="Image" class="img-responsive">
                        </div>
                        <div class="tm-img-container margin-bottom-30">
                            <div class="tm-img-overlay">
                                <p class="img-description">Feufelisda</p>
                                <p class="img-title">Nullam Acurna</p>
                            </div>
                            <img src="img/9.jpg" alt="Image" class="img-responsive">
                        </div>
                        <div class="tm-img-container margin-bottom-30">
                            <div class="tm-img-overlay">
                                <p class="img-description">Feufelisda</p>
                                <p class="img-title">Nullam Acurna</p>
                            </div>
                            <img src="img/10.jpg" alt="Image" class="img-responsive">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        -->
        <div id="map"></div>
        
      
      
      
      <!-- секция визуализация на устройствата -->
      
      
      <!--
        <section class="templatemo-container light-gray-bg section-shadow-bottom">
            
            <div class="container">
                    <div class = "container my-5">
        <h2>Данни от измервателните устройства</h2>
        
        <br>
        <table class = "table">
            <thread>
                <tr>
                    <th>ID на устройство</th>
                    <th>Име на устройство</th>
                    <th>Собственик</th>
                    <th>Описание на устройство</th>
                    <th>Критично ниво на сензор 1</th>
                    <th>Известяване при достигане</th>
                    <th>Критично ниво на сензор 2</th>
                    <th>Известяване при достигане</th>
                    <th>Критично ниво на сензор 3</th>
                    <th>Известяване при достигане</th>
                    <th>Критично ниво на сензор 4</th>
                    <th>Известяване при достигане</th>
                    <th>Критично ниво на ултразвуков сензор 1</th>
          
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
                
                $sql = "SELECT * FROM devices";
                $result = $connection->query($sql);
                
                if(!$result){
                    die("Invalid query: " . $connection->error);
                }
                
                while($row = $result->fetch_assoc()){
                    echo "
                    <tr>
                    
                        <th>$row[device_id]</th>
                        <th>$row[device_name]</th>
                        <th>$row[user_id]</th>
                        <th>$row[device_description]</th>
                        <th>$row[sensor_water_1_level]</th>
                        <th>$row[sensor_water_1_alert]</th>
                        <th>$row[sensor_water_2_level]</th>
                        <th>$row[sensor_water_2_alert]</th>
                        <th>$row[sensor_water_3_level]</th>
                        <th>$row[sensor_water_3_alert]</th>
                        <th>$row[sensor_water_4_level]</th>
                        <th>$row[sensor_water_4_alert]</th>
                        <th>$row[sensor_level_1_status]</th>
                    </tr>
                ";
                }
                ?>
            </tbody>
        </table>
    </div>

            </div>
        </section>
        
        -->

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
                                <li><a href="about.php">Визуализация</a></li>
                                <li><a href="profile.php">Клъстери</a></li>
                                <li><a href="contact.php">Устройства</a></li>
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


<?php

// Replace these with your actual database credentials
$hostname = "localhost";
$username = "kvbbgcom_floodPrevention";
$password = "kv0889909595";
$database = "kvbbgcom_floodPrevention";

include 'cron.php';

// Create a connection
$conn = new mysqli($hostname, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query
$query = "
   SELECT devices.device_geolocation_1, devices.device_geolocation_2, sensor_data.sensor_water_1, sensor_data.sensor_water_2, sensor_data.sensor_water_3 FROM `sensor_data` INNER JOIN `devices` ON sensor_data.device_id=devices.device_mac WHERE sensor_data.date = (SELECT MAX(sensor_data.date) FROM sensor_data);
";

// Execute the query
$result = $conn->query($query);

// Fetch results into an array
$result_array = array();

$coordinates = [];


if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Calculate the percentage based on conditions
        $percentage = 5; // Default value

        if ($row['sensor_water_1'] == 1) {
            $percentage = 20;
        }

        if ($row['sensor_water_1'] == 1 && $row['sensor_water_2'] == 1) {
            $percentage = 50;
        }

        if ($row['sensor_water_1'] == 1 && $row['sensor_water_2'] == 1 && $row['sensor_water_3'] == 1) {
            $percentage = 100;
            //mail("n3twork_5h4d0w@proton.me", "Наводнение", "Вашето устройство е надвишило и трите нива на сензорите за вода", "sirena@outlook.com");
        }

        $coordinates[] = [
            'latitude' => $row['device_geolocation_1'],
            'longitude' => $row['device_geolocation_2'],
            'value' => $percentage,
        ];
    }
}

$conn->close();

//echo json_encode($coordinates);

?>



        <!-- JS -->
        <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>      <!-- jQuery -->
        <script type="text/javascript" src="js/templatemo-script.js"></script>      <!-- Templatemo Script -->

<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>




    </body>
</html>



<script src="js/leaflet-heat.js"></script>


<script>
    var map = L.map('map').setView([43.05929575305801, 25.598378106660363], 12);
    var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    });
    osm.addTo(map);

   console.log(<?php echo json_encode($coordinates); ?>);

// Parse JSON data in JavaScript
var addressPoints = <?php echo json_encode($coordinates); ?>;

// Debugging: Print the parsed data to the console
console.log("Address Points:", addressPoints);


var heatArray = addressPoints.map(function (point) {
    return [parseFloat(point.latitude), parseFloat(point.longitude), point.value];
});

console.log("Heat Array:", heatArray);

var heat = L.heatLayer(heatArray).addTo(map);
</script>
