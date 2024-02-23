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
    <title>СИРЕНА - Устройства</title>
    <meta name="description" content="">
    <meta name="author" content="templatemo">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <!-- 
        Multi Profile
        http://www.templatemo.com/preview/templatemo_457_multi_profile
        -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700' rel='stylesheet'
        type='text/css'>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/templatemo-style.css" rel="stylesheet">

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
                        <h2 class="welcome-title text-uppercase">Налични устройства</h2>
                        <img src="img/welcome-divider-lines.png" alt="Welcome divider"
                            class="welcome-divider-lines-img">
                        <nav class="text-uppercase templatemo-nav-1">
                            <ul class="nav2">
                                <li><a href="show-cluster.php" class="active">Визуализация на устройство</a></li>
                                <li><a href="add-devices.php">Добавяне на устройство</a></li>
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
    <!-- показване на таблица-->


    <div class = "container my-5">
        <!--<h2>Налични устройства</h2>-->
        <!--<a class = "btn btn-primary" href = "add-devices.php" role = "button">Ново устройство</a>-->
        <br>
        <table class = "table">
            <thead>
                <tr>
                    <th>ID на устройство</th>
                    <th>Сензор вода 1</th>
                    <th>Сензор вода 2</th>
                    <th>Сензор вода 3</th>
                    <th>Ултразвуков сензор</th>
                        <th></th>
                 </tr>
            </thead>
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
                
                $sql = "SELECT * FROM sensor_data ORDER BY id DESC LIMIT 5";
                $result = $connection->query($sql);
                
                if(!$result){
                    die("Invalid query: " . $connection->error);
                }
                
                while($row = $result->fetch_assoc()){
                    echo "
                    <tr>
                        <th>$row[device_id]</th>
                        <th>$row[sensor_water_1]</th>
                        <th>$row[sensor_water_2]</th>
                        <th>$row[sensor_water_3]</th>
                        <th>$row[sensor_level_1]</th>
                    </tr>
                ";
                }
                ?>
                
                
                
            </tbody>
        </table>
    </div>
    
    <!--
    <table width="100%" border="1" style="border-collapse:collapse;">
        <thead>
            <tr>
                <th><strong>Номер на устройството</strong></th>
                <th><strong>Име на устройството</strong></th>
                <th><strong>Описание на устройството</strong></th>
                <th><strong>Редактиране</strong></th>
                <th><strong>Изтриване</strong></th>
            </tr>
        </thead>
        <tbody>
            
            <?php
    $count=1;
    
    
    $sql="SELECT * FROM kvbbgcom_floodPrevention.devices WHERE `user_id`=?";
    echo $user_name_global;
    $stmt = $con->prepare($sql); 
    //$stmt->bind_param("s", $user_name_global); //i for integer, d for double (float), s for string, b for blobs;
    $stmt->bind_param("s", $user_name_global); //i for integer, d for double (float), s for string, b for blobs;
    $stmt->execute();
    $result = $stmt->get_result(); // get the mysqli result
    
    
    
    while($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td align="center">
                    <?php echo $row["device_id"]; ?>
                </td>
                <td align="center">
                    <?php echo $row["device_name"]; ?>
                </td>
                <td align="center">
                    <?php echo $row["device_description"]; ?>
                </td>
                <td align="center">
                    <a href="edit-device.php?id=<?php echo $row[" id"]; ?>&user_name_current=
                        <?php echo $user_name_global; ?>">Редактиране
                    </a>
                </td>
                <td align="center">
                    <a href="delete-device.php?id=<?php echo $row[" id"]; ?>&user_name_current=
                        <?php echo $user_name_global; ?>">Изтриване
                    </a>
                </td>
            </tr>
            <?php $count++; } ?>
        </tbody>
    </table>
        -->
    <!-- край на таблицата-->

    </div> <!-- container -->
    </section>
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
                <p>Настоящият сайт е разработен като част от демонстрационна платформа СИРЕНА - "Система за Известяване
                    и Ранна Евакуация при Наводнения и Аварии"
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
    <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script> <!-- jQuery -->
    <script type="text/javascript" src="js/templatemo-script.js"></script> <!-- Templatemo Script -->
    <script>
        /* Google map
        ------------------------------------------------*/
        var map = '';
        var center;

        function initialize() {
            var mapOptions = {
                zoom: 16,
                center: new google.maps.LatLng(13.758468, 100.567481),
                scrollwheel: false
            };

            map = new google.maps.Map(document.getElementById('google-map'), mapOptions);

            google.maps.event.addDomListener(map, 'idle', function () {
                calculateCenter();
            });

            google.maps.event.addDomListener(window, 'resize', function () {
                map.setCenter(center);
            });
        }

        function calculateCenter() {
            center = map.getCenter();
        }

        function loadGoogleMap() {
            var script = document.createElement('script');
            script.type = 'text/javascript';
            script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&' + 'callback=initialize';
            document.body.appendChild(script);
        }
        $(document).ready(function () {
            loadGoogleMap();
        });
    </script>
</body>

</html>
