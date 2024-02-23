<?php
$servername = "localhost";
$username = "kvbbgcom_floodPrevention";
$password = "kv0889909595";
$database = "kvbbgcom_floodPrevention";

$connection = new mysqli($servername, $username, $password, $database);

//$device_id = "";
$device_name = "";
$opisanie = "";
$prinaglejostkumkluster = "";
$geo1 = "";
$geo2 = "";
$wifissid = "";
$wifipassword = "";
$mac = "";
$device_add_description = "";
$sensor_water_1_status = "";
$sensor_water_1_level = "";
$sensor_water_1_alert = "";
$sensor_water_2_status = "";
$sensor_water_2_level = "";
$sensor_water_2_alert  = "";
$sensor_water_3_status = "";
$sensor_water_3_level = "";
$sensor_water_3_alert = "";
$sensor_water_4_status = "";
$sensor_water_4_level = "";
$sensor_water_4_alert = "";
$sensor_level_1_status = "";
$sensor_level_1_alert_level = "";


$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (!isset($_GET["id"])) {
        header("location: index.php");
        exit;
    }

    $id = $_GET["id"];

    $sql = "SELECT * FROM devices WHERE id = $id";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header("location: index.php");
        exit;
    }

    //$device_id = $row["name"];
    $device_name = $row["device_name"];
    $opisanie = $row["device_description"];
    $prinaglejostkumkluster = $row["cluster_id"];
    $geo1 = $row["device_geolocation_1"];
    $geo2 = $row["device_geolocation_2"];
    $wifissid = $row["device_wifi_network_name"];
    $wifipassword = $row["device_wifi_network_password"];
    $mac = $row["device_mac"];
    $device_add_description = $row["device_add_description"];
    $sensor_water_1_status = $row["sensor_water_1_status"];
    $sensor_water_1_level = $row["sensor_water_1_level_1"];
    $sensor_water_1_alert = $row["sensor_water_1_alert_1"];
    $sensor_water_2_status = $row["sensor_water_2_status_1"];
    $sensor_water_2_level = $row["sensor_water_2_level_1"];
    $sensor_water_2_alert  = $row["sensor_water_2_alert_1"];
    $sensor_water_3_status = $row["sensor_water_3_status_1"];
    $sensor_water_3_level = $row["sensor_water_3_level_1"];
    $sensor_water_3_alert = $row["sensor_water_3_alert_1"];
    $sensor_water_4_status = $row["sensor_water_4_status_1"];
    $sensor_water_4_level = $row["sensor_water_4_level_1"];
    $sensor_water_4_alert = $row["sensor_water_4_alert_1"];
    $sensor_level_1_status = $row["sensor_level_1_status_1"];
    $sensor_level_1_alert_level = $row["sensor_level_1_alert_level_1"];
    
} else {
  
    $device_name = $_POST["device_name"];
    $opisanie = $_POST["device_description"];
    $prinaglejostkumkluster = $_POST["cluster_id"];
    $geo1 = $_POST["device_geolocation_1"];
    $geo2 = $_POST["device_geolocation_2"];
    $wifissid = $_POST["device_wifi_network_name"];
    $wifipassword = $_POST["device_wifi_network_password"];
    $mac = $_POST["device_mac"];
    $device_add_description = $_POST["device_add_description"];
    $sensor_water_1_status = $_POST["sensor_water_1_status"];
    $sensor_water_1_level = $_POST["sensor_water_1_level"];
    $sensor_water_1_alert = $_POST["sensor_water_1_alert"];
    $sensor_water_2_status = $_POST["sensor_water_2_status"];
    $sensor_water_2_level = $_POST["sensor_water_2_level"];
    $sensor_water_2_alert  = $_POST["sensor_water_2_alert"];
    $sensor_water_3_status = $_POST["sensor_water_3_status"];
    $sensor_water_3_level = $_POST["sensor_water_3_level"];
    $sensor_water_3_alert = $_POST["sensor_water_3_alert"];
    $sensor_water_4_status = $_POST["sensor_water_4_status"];
    $sensor_water_4_level = $_POST["sensor_water_4_level"];
    $sensor_water_4_alert = $_POST["sensor_water_4_alert"];
    $sensor_level_1_status = $_POST["sensor_level_1_status"];
    $sensor_level_1_alert_level = $_POST["sensor_level_1_alert_level"];
?>

<?php
    do{
       if (empty($device_name) || empty($opisanie) || empty($prinaglejostkumkluster) || empty($geo1) || empty($geo2) 
       || empty($wifissid) || empty($wifipassword) || empty($mac) 
       || empty($device_add_description) || empty($sensor_water_1_status) || empty($sensor_water_1_level)
       || empty($sensor_water_1_alert) || empty($sensor_water_2_status) || empty($sensor_water_2_level) 
       || empty($sensor_water_2_alert) || empty($sensor_water_3_status) || empty($sensor_water_3_level) 
       || empty($sensor_water_3_alert) || empty($sensor_water_4_status) || empty($sensor_water_4_level) 
       || empty($sensor_water_4_alert) || empty($sensor_level_1_status) || empty($sensor_level_1_alert_level)) {
        $errorMessage = "All fields are required";
        break;
        } 
        
        $sql = "UPDATE clients " .
    "SET device_name = '$device_name'
    , device_description  = '$opisanie'
    , cluster_id = '$prinaglejostkumkluster'
    , device_geolocation_1 = '$geo1'
    , device_geolocation_2 = '$geo2' 
    , device_wifi_network_name = '$wifissid'
    , device_wifi_network_password = '$wifipassword'
    , device_mac = '$mac'
    , device_add_description  = '$device_add_description'  
    , sensor_water_1_status = '$sensor_water_1_status'
    , sensor_water_1_level = '$sensor_water_1_level'
    , sensor_water_1_alert = '$sensor_water_1_alert' 
    , sensor_water_2_status = '$sensor_water_2_status'
    , sensor_water_2_level = '$sensor_water_2_level'
    , sensor_water_2_alert = '$sensor_water_2_alert'
    , sensor_water_3_status = '$sensor_water_3_status'
    , sensor_water_3_level = '$sensor_water_3_level'
    , sensor_water_3_alert = '$sensor_water_3_alert'
    , sensor_water_4_status = '$sensor_water_4_status'
    , sensor_water_4_level = '$sensor_water_4_level'
    , sensor_water_4_alert = '$sensor_water_4_alert'
    , sensor_level_1_status = '$sensor_level_1_status'
    , sensor_level_1_alert_level = '$sensor_level_1_alert_level'
" .
"WHERE id = $id";



        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        } else {
            $successMessage = "Client updated correctly";
            header("location: index.php");
            exit;
        }
    }while(false);
    
    
}

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
        <title>СИРЕНА - Редактиране на устройство</title>
        <meta name="description" content="">
        <meta name="author" content="templatemo">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
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
                            <h2 class="welcome-title text-uppercase">Редактиране</h2>
                            <img src="img/welcome-divider-lines.png" alt="Welcome divider" class="welcome-divider-lines-img">
                            <nav class="text-uppercase templatemo-nav-1">
                                <ul class="nav2">
                                    <li><a href="show-devices.php" >Визуализация на устройство</a></li>
                                        <li><a href="add-devices.php">Добавяне на устройство</a></li>
                                        <li><a href="edit-devices.php" class="active">Редактиране на устройство</a></li>
                                        <!--<li><a href="delete-devices.php">Изтриване на устройство</a></li>-->    
                                </ul>
                            </nav>
                      
                    
                    
                </div>
                            
                            
                    </div>
                </div>
            </div>
        </div>
        <!-- Welcome message -->
        <!-- main content -->
        <?php
      /*echo $user_name_global;
      try{
  
        $sql = "SELECT * FROM kvbbgcom_floodPrevention.devices WHERE `user_id`='$user_name_global' and `id`='$id'";
        $result = $pdo->query($sql);
        
      //echo $id;
        
        if ($result->rowCount() > 0){
            while($row = $result->fetch()){
                    //$device_id_var = $row["device_id"];
                    $device_name_var= $row["device_name"];
                    $device_mac_var = $row["device_mac"];
                    $device_description_var = $row["device_description"];
                    $device_cluster_var = $row['cluster_id'];
                    $device_geolocation1_var = $row["device_geolocation_1"];
                    $device_geolocation2_var = $row["device_geolocation_2"];
                    $device_wifi_network_name_var = $row["device_wifi_network_name"];
                    $device_wifi_network_password_var = $row["device_wifi_network_password"];
                    $device_additional_description_var = $row["device_additional_description"];
            
            
              
           //         echo $device_name_var;
           //         echo $device_mac_var;
           //         echo $device_description_var ;
           //         echo $device_geolocation1_var;
           //         echo $device_geolocation2_var;
           //         echo $device_wifi_network_name_var;
           //         echo $device_wifi_network_password_var ;
           //         echo $device_additional_description_var;
            
            }
               
            unset($result);
        } else {
            echo "no records matching your query were found.";
        }
      } catch(PDOExeption $e){
          die("Error: could not able to execute $sql. ". $e->getMessage());
      } 
      
      unset($pdo);*/
      ?>
      
         
              
        
        
        
        
        <div class="templatemo-content-container">
          <div class="templatemo-content-widget white-bg">
            <form method = "post">
                <input type="hidden" name="id" value="<?php echo $device_name; ?>">
              <div class="col-lg-6 col-md-6 form-group">                  
                  <label for="inputDeviceName">Име на устройство</label>
                  <input type="text" class="form-control" id="inputDeviceName" name="device_name1" placeholder="Устройство 1" value = "<?php echo $device_name; ?>">                  
              </div>
              <div class="row mb-3">
                    <label class="col-sm-3" col-form-label>Описание на устройството</label>
                    <div class = "col-sm-6">
                        <input type = "text" class = "form-control" name = "opisanie" value = "<?php echo $opisanie; ?>">
                    </div>
                </div>
          
           <div class="row mb-3">
                    <label class="col-sm-3" col-form-label>Принадлежност към клъстер</label>
                    <div class = "col-sm-6">
                        <input type = "number" class = "form-control" name = "prinaglejostkumkluster" value = "<?php echo $prinaglejostkumkluster; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3" col-form-label>Геолокация / Географска ширина (във формат 43.078151)</label>
                    <div class = "col-sm-6">
                        <input type = "text" class = "form-control" name = "geo1" value = "<?php echo $geo1; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3" col-form-label>Геолокация / Географска дължина (във формат 25.6272318)</label>
                    <div class = "col-sm-6">
                        <input type = "text" class = "form-control" name = "geo2" value = "<?php echo $geo2; ?>">
                    </div>
                </div>
                
                
                <div class="row mb-3">
                    <label class="col-sm-3" col-form-label>Наличие на сензор 1</label>
                    <div class = "col-sm-6">
                        <input type = "checkbox" class = "form-control" name = "sensor_water_1_status_1" value = "<?php echo $sensor_water_1_status; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3" col-form-label>Критично ниво за известяване на сензор 1</label>
                    <div class = "col-sm-6">
                        <input type = "number" class = "form-control" name = "sensor_water_1_level_1" value = "<?php echo $sensor_water_1_level; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3" col-form-label>Известяване при достигане на критично ниво на сензор 1</label>
                    <div class = "col-sm-6">
                        <input type = "checkbox" class = "form-control" name = "sensor_water_1_alert_1" value = "<?php echo $sensor_water_1_alert; ?>">
                    </div>
                 </div>     
                    
                    
                    <div class="row mb-3">
                    <label class="col-sm-3" col-form-label>Наличие на сензор 2</label>
                    <div class = "col-sm-6">
                        <input type = "text" class = "form-control" name = "sensor_water_2_status_1" value = "<?php echo $sensor_water_2_status; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3" col-form-label>Критично ниво за известяване на сензор 2</label>
                    <div class = "col-sm-6">
                        <input type = "text" class = "form-control" name = "sensor_water_2_level_1" value = "<?php echo $sensor_water_2_level; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3" col-form-label>Известяване при достигане на критично ниво на сензор 2</label>
                    <div class = "col-sm-6">
                        <input type = "text" class = "form-control" name = "sensor_water_2_alert_1" value = "<?php echo $sensor_water_2_alert; ?>">
                    </div>
                  </div>   
                    
                    
                    <div class="row mb-3">
                    <label class="col-sm-3" col-form-label>Наличие на сензор 3</label>
                    <div class = "col-sm-6">
                        <input type = "text" class = "form-control" name = "sensor_water_3_status_1" value = "<?php echo $sensor_water_3_status; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3" col-form-label>Критично ниво за известяване на сензор 3</label>
                    <div class = "col-sm-6">
                        <input type = "text" class = "form-control" name = "sensor_water_3_status_1" value = "<?php echo $sensor_water_3_level; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3" col-form-label>Известяване при достигане на критично ниво на сензор 3</label>
                    <div class = "col-sm-6">
                        <input type = "text" class = "form-control" name = "sensor_water_3_status_1" value = "<?php echo $sensor_water_3_alert; ?>">
                    </div>
                </div>   
                    
                    <div class="row mb-3">
                    <label class="col-sm-3" col-form-label>Наличие на сензор 4</label>
                    <div class = "col-sm-6">
                        <input type = "text" class = "form-control" name = "sensor_water_4_status_1" value = "<?php echo $sensor_water_4_status; ?>">
                    </div>
                </div>
                
                <div class="row mb-3">
                    <label class="col-sm-3" col-form-label>Критично ниво за известяване на сензор 4</label>
                    <div class = "col-sm-6">
                        <input type = "text" class = "form-control" name = "sensor_water_4_level_1" value = "<?php echo $sensor_water_4_level; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3" col-form-label>Известяване при достигане на критично ниво на сензор 4</label>
                    <div class = "col-sm-6">
                        <input type = "text" class = "form-control" name = "sensor_water_4_alert_1" value = "<?php echo $sensor_water_4_alert; ?>">
                    </div>
                </div>
                
                
                <div class="row mb-3">
                    <label class="col-sm-3" col-form-label>Наличие на ултразвуков сензор</label>
                    <div class = "col-sm-6">
                        <input type = "text" class = "form-control" name = "sensor_level_1_status_1" value = "<?php echo $sensor_level_1_status; ?>">
                    </div>
                </div>
                
                <div class="row mb-3">
                    <label class="col-sm-3" col-form-label>Критично ниво за известяване на ултразвуков сензор(в метри)</label>
                    <div class = "col-sm-6">
                        <input type = "text" class = "form-control" name = "sensor_level_1_alert_level_1" value = "<?php echo $sensor_level_1_alert_level; ?>">
                    </div>
                </div>
                
                <div class="row mb-3">
                    <label class="col-sm-3" col-form-label>Име на безжичната мрежа, към която ще се свърже агрометеостанцията</label>
                    <div class = "col-sm-6">
                        <input type = "text" class = "form-control" name = "address" value = "<?php echo $wifissid; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3" col-form-label>Парола за безжичната мрежа, към която ще се свърже агрометеостанцията</label>
                    <div class = "col-sm-6">
                        <input type = "text" class = "form-control" name = "address" value = "<?php echo $wifipassword; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3" col-form-label>MAC адрес / сериен номер на агрометеостанцията</label>
                    <div class = "col-sm-6">
                        <input type = "text" class = "form-control" name = "macaddress" value = "<?php echo $mac; ?>">
                    </div>
                </div>
            
            
            
           
            </div>
              
                     
            
            <!--<div class="form-group text-left">
              <button type="submit" class="templatemo-blue-button">Добави устройство</button>
              <button type="reset" class="templatemo-white-button">Отказ</button>
            </div>  -->                         
          </form>
        </div>
    </div>
    
    
    
    
    
               <!-- <form method = "post">
                <input type="hidden" name="id" value="<?php echo $device_name; ?>">
                <div class="row mb-3">
                    <label class="col-sm-3" col-form-label>Име на устройството</label>
                    <div class = "col-sm-6">
                        <input type = "text" class = "form-control" name = "device_name" value = "<?php echo $device_name; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3" col-form-label>Описание на устройството</label>
                    <div class = "col-sm-6">
                        <input type = "text" class = "form-control" name = "opisanie" value = "<?php echo $opisanie; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3" col-form-label>Принадлежност към клъстер</label>
                    <div class = "col-sm-6">
                        <input type = "text" class = "form-control" name = "prinaglejostkumkluster" value = "<?php echo $prinaglejostkumkluster; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3" col-form-label>Геолокация / Географска ширина (във формат 43.078151)</label>
                    <div class = "col-sm-6">
                        <input type = "text" class = "form-control" name = "geo1" value = "<?php echo $geo1; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3" col-form-label>Геолокация / Географска дължина (във формат 25.6272318)</label>
                    <div class = "col-sm-6">
                        <input type = "text" class = "form-control" name = "geo2" value = "<?php echo $geo2; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3" col-form-label>Наличие на сензор 1</label>
                    <div class = "col-sm-6">
                        <input type = "text" class = "form-control" name = "email" value = "<?php echo $opisanie; ?>">
                    </div>
                </div>
                
                <div class="row mb-3">
                    <label class="col-sm-3" col-form-label>Име на безжичната мрежа, към която ще се свърже агрометеостанцията</label>
                    <div class = "col-sm-6">
                        <input type = "text" class = "form-control" name = "address" value = "<?php echo $wifissid; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3" col-form-label>Парола за безжичната мрежа, към която ще се свърже агрометеостанцията</label>
                    <div class = "col-sm-6">
                        <input type = "text" class = "form-control" name = "address" value = "<?php echo $wifipassword; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3" col-form-label>MAC адрес / сериен номер на агрометеостанцията</label>
                    <div class = "col-sm-6">
                        <input type = "text" class = "form-control" name = "address" value = "<?php echo $mac; ?>">
                    </div>
                </div> -->
                
                
                
                
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
                <div class = "row mb-3">
                    <div class = "offset-sm3 col-sm-3 d-grid">
                        <button type = "submit" class = "btn btn-primary">Актуализирай информация за устройството</button>
                    </div>
                    <div class = "col-sm-3 d-grid">
                        <a class = "btn btn-outline-primary" href = "show-devices.php" role = "button">Отказ</a>
                    </div>
                </div> 
            </form>
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
