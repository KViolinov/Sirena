<?php
$servername = "localhost";
$username = "kvbbgcom_floodPrevention";
$password = "kv0889909595";
$database = "kvbbgcom_floodPrevention";

$connection = new mysqli($servername, $username, $password, $database);

$id = "";
//$cluster_id = "";
$user_id = "";
$cluster_name = "";
$cluster_description = "";
$cluster_geo1 = "";
$cluster_geo2 = "";
$cluster_critical_level = "";
$cluster_email = "";
$cluster_phone = "";
$cluster_add_information = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET["id"])) {
        header("location: index.php");
        exit;
    }

    $id = $_GET["id"];
 
    $sql = "SELECT * FROM clusters WHERE id = $id";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header("location: index.php");
        exit;
    }


    //$cluster_id = $row["cluster_id"];
    $user_id = $row["user_id"];
    $cluster_name = $row["cluster_name"];
    $cluster_description = $row["cluster_description"];
    $cluster_geo1 = $row["cluster_geolocation1"];
    $cluster_geo2 = $row["cluster_geolocation2"];
    $cluster_critical_level = $row["cluster_critical_level"];
    $cluster_email = $row["cluster_email_notation"];
    $cluster_phone = $row["cluster_phone_notation"];
    $cluster_add_information = $row["cluster_additional_description"];
    
} else {
    
    //$cluster_id = $_POST["cluster_id"];
    $user_id = $_POST["user_id"];
    $cluster_name = $_POST["cluster_name"];
    $cluster_description = $_POST["cluster_description"];
    $cluster_geo1 = $_POST["cluster_geolocation1"];
    $cluster_geo2 = $_POST["cluster_geolocation2"];
    $cluster_critical_level = $_POST["cluster_critical_level"];
    $cluster_email = $_POST["cluster_email_notation"];
    $cluster_phone = $_POST["cluster_phone_notation"];
    $cluster_add_information = $_POST["cluster_additional_description"];
    

    do {
        if (empty($cluster_name) || empty($cluster_description) || empty($cluster_geo1) || empty($cluster_geo2) || empty($cluster_critical_level) || empty($cluster_email) || empty($cluster_phone) || empty($cluster_add_information)) {
            $errorMessage = "All fields are required";
            break;
        }
         $id = $_GET["id"];
        $sql = "UPDATE clusters " .
            "SET cluster_name = '$cluster_name', cluster_description = '$cluster_description', cluster_geolocation1 = '$cluster_geo1', cluster_geolocation2 = '$cluster_geo2', cluster_critical_level = '$cluster_critical_level', cluster_email_notation = '$cluster_email', cluster_phone_notation = '$cluster_phone', cluster_additional_description  = '$cluster_add_information' " .
            "WHERE id = $id";

        
       //echo "SQL query: " . $sql; // Add this line for debugging purposes

        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        } else {
            $successMessage = "Device updated correctly";
            header("location: show-cluster.php");
            exit;
        }
    } while (false);
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>СИРЕНА - Редактиране на Клъстери</title>
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
            form{
            margin-left:150px;
            
        }
        
        .container{
            width:80%;
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
        <div class="header-img-2">
        </div>
        <!-- end header image -->
        <!-- Welcome message -->
        <div class="welcome-container">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="welcome-wrapper">
                            <h2 class="welcome-title text-uppercase">Редактиране</h2>
                            <img src="img/welcome-divider-lines.png" alt="Welcome divider" class="welcome-divider-lines-img">
                            <nav class="text-uppercase templatemo-nav-1">
                                <ul class="nav2">
                                    <li><a href="show-cluster.php" >Визуализация на клъстери</a></li>
                                        <li><a href="add-cluster.php">Добавяне на клъстер</a></li>
                                          
                                </ul>
                            </nav>
                        </div>       
                    </div>
                </div>
            </div>
        </div>
        <!-- Welcome message -->
        <!-- main content -->
        <div>
        <div class="container my-5">
            <!--<h2>Редактиране на устройство</h2>-->
            
            <?php
                if(!empty($errorMessage)){
                    echo "
                    <div class = 'alert alert-warning alert-dismissible fade show' role = 'alert'>
                        <strong>$errorMessage</strong>
                        <button type = 'button' class = 'btn-close' data-bs-dissmiss = 'alert' aria-label = 'Close'></button>
                    </div>
                    ";
                }
            ?>
            <br>
            <form action="update-cluster-in-db.php" class="templatemo-login-form" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="row mb-3">
                    <label class="col-sm-3" col-form-label>Име <br>на клъстера</label>
                    <div class = "col-sm-6">
                        <input type = "text" class = "form-control" name = "cluster_name" value = "<?php echo $cluster_name; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3" col-form-label>Описание <br>на клъстера</label>
                    <div class = "col-sm-6">
                        <input type = "text" class = "form-control" name = "cluster_description" value = "<?php echo $cluster_description; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3" col-form-label>Геолокация / Географска ширина (във формат 43.078151)</label>
                    <div class = "col-sm-6">
                        <input type = "text" class = "form-control" name = "cluster_geolocation1" value = "<?php echo $cluster_geo1; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3" col-form-label>Геолокация / Географска дължина (във формат 25.6272318)</label>
                    <div class = "col-sm-6">
                        <input type = "text" class = "form-control" name = "cluster_geolocation2" value = "<?php echo $cluster_geo2; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3" col-form-label>Критична ниво <br>за известяване</label>
                    <div class = "col-sm-6">
                        <input type = "text" class = "form-control" name = "cluster_critical_level" value = "<?php echo $cluster_critical_level; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3" col-form-label>Електронна поща <br>за известяване</label>
                    <div class = "col-sm-6">
                        <input type = "text" class = "form-control" name = "cluster_email_notation" value = "<?php echo $cluster_email; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3" col-form-label>Телефон <br>за известяване</label>
                    <div class = "col-sm-6">
                        <input type = "text" class = "form-control" name = "cluster_phone_notation" value = "<?php echo $cluster_phone; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3" col-form-label>Допълнителна информация</label>
                    <div class = "col-sm-6">
                        <input type = "text" class = "form-control" name = "cluster_additional_description" value = "<?php echo $cluster_add_information; ?>">
                    </div>
                </div>
                <br>
                
                
                <?php
                    if(!empty($successMessage)){
                       echo "
                       <div class = 'row mb-3'>
                            <div class = 'offset-sm-3 col-sm-6'>
                                <div class = 'alert alert-warning alert-dismissible fade show' role = 'alert'>
                                    <strong>$successMessage</strong>
                                    <button type = 'button' class = 'btn-close' data-bs-dissmiss = 'alert' aria-label = 'Close'></button>
                                </div>
                            </div>
                       </div>
                       
                       
                       
                       
                    <div class = 'alert alert-warning alert-dismissible fade show' role = 'alert'>
                        <strong>$successMessage</strong>
                        <button type = 'button' class = 'btn-close' data-bs-dissmiss = 'alert' aria-label = 'Close'></button>
                    </div>
                    "; 
                    }
                ?>
                
                 <!--<div class = "row mb-3">-->
                        <div class = "form-group text-left">
                        <button type = "submit" class = "btn btn-primary">Редактирай</button>
                 <!--</div>-->
                      <!--<div class = "form-group text-left">-->
                        <a class = "btn btn-primary" href = "index.php" role = "button">Отказ</a>
                    <!--</div>-->
                          </div>
                          
                <!--<div class = "row mb-3">
                    <div class = "offset-sm3 col-sm-3 d-grid">
                        <button type = "submit" class = "btn btn-primary">Редактирай</button>
                    </div>
                    <div class = "col-sm-3 d-grid">
                        <a class = "btn btn-primary" href = "index.php" role = "button">Отказ</a>
                    </div>
                </div>-->
                <br>
            </form>
        </div>
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

