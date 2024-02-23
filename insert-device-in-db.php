<?php
	session_start();
	
	include("connection.php");
	include("functions.php");
	
	if ($_SERVER['REQUEST_METHOD'] == "POST"){
		//something was posted
		
		           // $device_id_var = $_POST['device_id'];
                    

                    //-------------
                    
                    
                    $device_name_var = $_POST['device_name1'];
                    $device_description_var = $_POST['device_description1'];
                    
                    //трябва да се направи връзка с таблица клъстери за да вземи ИД на съответния клъстер
                    $device_cluster_var = (int)$_POST['device_cluster1'];
                    
                    $device_geolocation1_var = (float)$_POST['device_geolocation11'];
                    $device_geolocation2_var = (float)$_POST['device_geolocation21'];
                    $device_wifi_network_name_var = $_POST['device_wifi_network_name1'];
                    $device_wifi_network_password_var = $_POST['device_wifi_network_password1'];
                    $device_mac_var = $_POST['device_mac1'];
                    $device_additional_description_var = $_POST['device_additional_description1'];
                    
                    /*if($_POST['sensor_water_1_status_1'] == "on"){
                        $sensor_water_1_status_var = 1;
                    }
                    else{
                      $sensor_water_1_status_var = 0;  
                    }*/
                    
                    $sensor_water_1_level_var = (double)$_POST['sensor_water_1_level_1'];
                    
                    /*if($_POST['sensor_water_1_alert_1'] == "on"){
                        $sensor_water_1_alert_var = 1;
                    }
                    else{
                        $sensor_water_1_alert_var = 0;  
                    }
                    
                    
                    
                    if($_POST['sensor_water_2_status_1'] == "on"){
                        $sensor_water_2_status_var = 1;
                    }
                    else{
                        $sensor_water_2_status_var = 0;  
                    }*/
                    
                    $sensor_water_2_level_var = (double)$_POST['sensor_water_2_level_1'];
                    
                    /*if($_POST['sensor_water_2_alert_1'] == "on"){
                        $sensor_water_2_alert_var = 1;
                    }
                    else{
                        $sensor_water_2_alert_var = 0;  
                    }
                    
                    
                    
                    if($_POST['sensor_water_3_status_1'] == "on"){
                        $sensor_water_3_status_var = 1;
                    }
                    else{
                        $sensor_water_3_status_var = 0;  
                    }*/
                    
                    $sensor_water_3_level_var = (double)$_POST['sensor_water_3_level_1'];
                    
                    /*if($_POST['sensor_water_3_alert_1'] == "on"){
                        $sensor_water_3_alert_var = 1;
                    }
                    else{
                        $sensor_water_3_alert_var = 0;  
                    }
                    
                    
                    if($_POST['sensor_water_4_status_1'] == "on"){
                        $sensor_water_4_status_var = 1;
                    }
                    else{
                        $sensor_water_4_status_var = 0;  
                    }*/
                    
                    //$sensor_water_4_level_var = (double)$_POST['sensor_water_4_level_1'];
                    
                    /*if($_POST['sensor_water_4_alert_1'] == "on"){
                        $sensor_water_4_alert_var = 1;
                    }
                    else{
                        $sensor_water_4_alert_var = 0;  
                    }
                    
                    
                    if($_POST['sensor_level_1_status_1'] == "on"){
                        $sensor_level_1_status_var = 1;
                    }
                    else{
                        $sensor_level_1_status_var = 0;  
                    }*/
                    
                    $sensor_level_1_alert_level_var = $_POST['sensor_level_1_alert_level_1'];
                    
                    $user_name_global = $_SESSION['user_name'];
                    $device_id_var = random_num(20); 
	          
	                /*
	                echo "device_name1";
	                echo "<br>";
	                echo "kum db";
	                echo "<br>";
	                echo $device_name_var;
                    echo "<br>";
                    echo "ot forma";
                    echo "<br>";
                    echo $_POST['device_name1'];
                    echo "<br>";
                    
                    echo "<br>";
                    echo "<br>";
                    
                    echo "device_description1";
                    echo "<br>";
	                echo "kum db";
                    echo $device_description_var;
                    echo "<br>";
                    echo "ot forma";
                    echo "<br>";
                    echo $_POST['device_description1'];
                    echo "<br>";
                    
                    echo "<br>";
                    echo "<br>";
                    
                    echo "device_cluster1";
                    echo "<br>";
	                echo "kum db";
	                echo "<br>";
                    echo $device_cluster_var;
                    echo "<br>";
                    echo "ot forma";
                    echo "<br>";
                    echo $_POST['device_cluster1'];
                    echo "<br>";
                    
                    echo "<br>";
                    echo "<br>";
                    
                    echo "device_geolocation11";
                    echo "<br>";
	                echo "kum db";
	                echo "<br>";
                    echo $device_geolocation1_var;
                    echo "<br>";
                    echo "ot forma";
                    echo "<br>";
                    echo $_POST['device_geolocation11'];
                    echo "<br>";
                    
                    echo "<br>";
                    echo "<br>";
                    
                    echo "device_geolocation21";
                    echo "<br>";
	                echo "kum db";
	                echo "<br>";
                    echo $device_geolocation2_var;
                    echo "<br>";
                    echo "ot forma";
                    echo "<br>";
                    echo $_POST['device_geolocation21'];
                    echo "<br>";
                    
                    echo "<br>";
                    echo "<br>";
                    
                    echo "device_wifi_network_name1";
                    echo "<br>";
	                echo "kum db";
	                echo "<br>";
                    echo $device_wifi_network_name_var;
                    echo "<br>";
                    echo "ot forma";
                    echo "<br>";
                    echo $_POST['device_wifi_network_name1'];
                    echo "<br>";
                    
                    echo "<br>";
                    echo "<br>";
                    
                    echo "device_wifi_network_password1";
                    echo "<br>";
	                echo "kum db";
	                echo "<br>";
                    echo $device_wifi_network_password_var;
                    echo "<br>";
                    echo "ot forma";
                    echo "<br>";
                    echo $_POST['device_wifi_network_password1'];
                    echo "<br>";
                    
                    echo "<br>";
                    echo "<br>";
                    
                    echo "device_mac1";
                    echo "<br>";
	                echo "kum db";
	                echo "<br>";
                    echo $device_mac_var;
                    echo "<br>";
                    echo "ot forma";
                    echo "<br>";
                    echo $_POST['device_mac1'];
                    echo "<br>";
                    
                    echo "<br>";
                    echo "<br>";
                    
                    echo "device_additional_description1";
                    echo "<br>";
	                echo "kum db";
	                echo "<br>";
                    echo $device_additional_description_var;
                    echo "<br>";
                    echo "ot forma";
                    echo "<br>";
                    echo $_POST['device_additional_description1'];
                    echo "<br>";
                    
                    echo "<br>";
                    echo "<br>";
                    
                    echo "sensor_water_1_status";
                    echo "<br>";
	                echo "kum db";
	                echo "<br>";
                    echo $sensor_water_1_status_var;
                    echo "<br>";
                    echo "ot forma";
                    echo "<br>";
                    echo $_POST['sensor_water_1_status_1'];
                    echo "<br>";
                    
                    echo "<br>";
                    echo "<br>";
                    
                    echo "sensor_water_1_level";
                    echo "<br>";
	                echo "kum db";
	                echo "<br>";
                    echo $sensor_water_1_level_var;
                    echo "<br>";
                    echo "ot forma";
                    echo "<br>";
                    echo $_POST['sensor_water_1_level_1'];
                    echo "<br>";
                    
                    echo "<br>";
                    echo "<br>";
                    
                    echo "sensor_water_1_alert";
                    echo "<br>";
	                echo "kum db";
	                echo "<br>";
                    echo $sensor_water_1_alert_var;
                    echo "<br>";
                    echo "ot forma";
                    echo "<br>";
                    echo $_POST['sensor_water_1_alert_1'];
                    echo "<br>";
                    
                    echo "<br>";
                    echo "<br>";
                    
                    echo "sensor_water_2_status";
                    echo "<br>";
	                echo "kum db";
	                echo "<br>";
                    echo $sensor_water_2_status_var;
                    echo "<br>";
                    echo "ot forma";
                    echo "<br>";
                    echo $_POST['sensor_water_2_status_1'];
                    echo "<br>";
                    
                    echo "<br>";
                    echo "<br>";
                    
                    echo "sensor_water_2_level";
                    echo "<br>";
	                echo "kum db";
	                echo "<br>";
                    echo $sensor_water_2_level_var;
                    echo "<br>";
                    echo "ot forma";
                    echo "<br>";
                    echo $_POST['sensor_water_2_level_1'];
                    echo "<br>";
                    
                    echo "<br>";
                    echo "<br>";
                    
                    echo "sensor_water_2_alert";
                    echo "<br>";
	                echo "kum db";
	                echo "<br>";
                    echo $sensor_water_2_alert_var;
                    echo "<br>";
                    echo "ot forma";
                    echo "<br>";
                    echo $_POST['sensor_water_2_alert_1'];
                    echo "<br>";
                    
                    echo "<br>";
                    echo "<br>";
                    
                    echo "sensor_water_3_status";
                    echo "<br>";
	                echo "kum db";
	                echo "<br>";
                    echo $sensor_water_3_status_var;
                    echo "<br>";
                    echo "ot forma";
                    echo "<br>";
                    echo $_POST['sensor_water_3_status_1'];
                    echo "<br>";
                    
                    echo "<br>";
                    echo "<br>";
                    
                    echo "sensor_water_3_level";
                    echo "<br>";
	                echo "kum db";
	                echo "<br>";
                    echo $sensor_water_3_level_var;
                    echo "<br>";
                    echo "ot forma";
                    echo "<br>";
                    echo $_POST['sensor_water_3_level_1'];
                    echo "<br>";
                    
                    echo "<br>";
                    echo "<br>";
                    
                    echo "sensor_water_3_alert";
                    echo "<br>";
	                echo "kum db";
	                echo "<br>";
                    echo $sensor_water_3_alert_var;
                    echo "<br>";
                    echo "ot forma";
                    echo "<br>";
                    echo $_POST['sensor_water_3_alert_1'];
                    echo "<br>";
                    
                    echo "<br>";
                    echo "<br>";
                    
                    echo "sensor_water_4_status";
                    echo "<br>";
	                echo "kum db";
	                echo "<br>";
                    echo $sensor_water_4_status_var;
                    echo "<br>";
                    echo "ot forma";
                    echo "<br>";
                    echo $_POST['sensor_water_4_status_1'];
                    echo "<br>";
                    
                    echo "<br>";
                    echo "<br>";
                    
                    echo "sensor_water_4_level";
                    echo "<br>";
	                echo "kum db";
	                echo "<br>";
                    echo $sensor_water_4_level_var;
                    echo "<br>";
                    echo "ot forma";
                    echo "<br>";
                    echo $_POST['sensor_water_4_level_1'];
                    echo "<br>";
                    
                    echo "<br>";
                    echo "<br>";
                    
                    echo "sensor_water_4_alert";
                    echo "<br>";
	                echo "kum db";
	                echo "<br>";
                    echo $sensor_water_4_alert_var;
                    echo "<br>";
                    echo "ot forma";
                    echo "<br>";
                    echo $_POST['sensor_water_4_alert_1'];
                    echo "<br>";
                    
                    echo "<br>";
                    echo "<br>";
                    
                    echo "sensor_level_1_status";
                    echo "<br>";
	                echo "kum db";
	                echo "<br>";
                    echo $sensor_level_1_status_var;
                    echo "<br>";
                    echo "ot forma";
                    echo "<br>";
                    echo $_POST['sensor_level_1_status_1'];
                    echo "<br>";
                    
                    echo "<br>";
                    echo "<br>";
                    
                    echo "sensor_level_1_alert_level";
                    echo "<br>";
	                echo "kum db";
	                echo "<br>";
                    echo $sensor_level_1_alert_level_var;
                    echo "<br>";
                    echo "ot forma";
                    echo "<br>";
                    echo $_POST['sensor_level_1_alert_level_1'];
                    echo "<br>";
                    
                    echo "<br>";
                    echo "<br>";
                    
                    echo $user_name_global;
                    echo $_SESSION['user_name'];
                    echo "<br>"; */

                    
			        $query = "insert into devices (device_id, device_name, device_mac, user_id, cluster_id, device_description, device_geolocation_1, device_geolocation_2, device_wifi_network_name, device_wifi_network_password, device_additional_description, sensor_water_1_status, sensor_water_1_level, sensor_water_1_alert, sensor_water_2_status, sensor_water_2_level, sensor_water_2_alert, sensor_water_3_status, sensor_water_3_level, sensor_water_3_alert, sensor_water_4_status, sensor_water_4_level, sensor_water_4_alert, sensor_level_1_status, sensor_level_1_alert_level) 
			                  values ('$device_id_var','$device_name_var','$device_mac_var','$user_name_global','$device_cluster_var','$device_description_var','$device_geolocation1_var','$device_geolocation2_var','$device_wifi_network_name_var','$device_wifi_network_password_var','$device_additional_description_var', '$sensor_water_1_status_var', '$sensor_water_1_level_var', '$sensor_water_1_alert_var', '$sensor_water_2_status_var', '$sensor_water_2_level_var', '$sensor_water_2_alert_var', '$sensor_water_3_status_var', '$sensor_water_3_level_var', '$sensor_water_3_alert_var', '$sensor_water_4_status_var','$sensor_water_4_level_var','$sensor_water_4_alert_var','$sensor_level_1_status_var','$sensor_level_1_alert_level_var')";
			
			        //echo $query;
			
			        mysqli_query($con, $query);
 
			        header("Location: show-devices.php");
			        die;

	}
?>

