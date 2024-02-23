<?php
 
if(isset($_GET["level1"])) {
   $level1 = $_GET["level1"];
   $level2 = $_GET["level2"];   
   $level3 = $_GET["level3"];
   $level4 = $_GET["level4"]; 
   $level5 = $_GET["level5"];
   $distance1 = $_GET["distance1"];  // get temperature value from HTTP GET
   $macAdress = $_GET["mac"];    // get temperature value from HTTP GET
 // da definirame i syglasuwame imenata na promenliwite s ESP32
 
 
   $servername = "localhost";
   $username = "kvbbgcom_floodPrevention";
   $password = "kv0889909595";
   $database_name = "kvbbgcom_floodPrevention";
 //imeto i parolata na bazata danni
 
 
   // Create MySQL connection fom PHP to MySQL server
   $connection = new mysqli($servername, $username, $password, $database_name);
   // Check connection
   if ($connection->connect_error) {
      die("MySQL connection failed: " . $connection->connect_error);
   }
 
   $sql = "INSERT INTO `sensor_data`(`device_id`, `sensor_water_1`, `sensor_water_2`, `sensor_water_3`, `sensor_water_4`, `sensor_water_5`, `sensor_level_1`) VALUES ('$macAdress','$level1','$level2','$level3','$level4','$level5','$distance1')";
   
 // da se dopylni zaqwkata s ostanalite promenliwi i stojnosti
 
 
   if ($connection->query($sql) === TRUE) {
      echo "New record created successfully";
   } else {
      echo "Error: " . $sql . " => " . $connection->error;
   }
 
   $connection->close();
} else {
   echo "data is not set in the HTTP request";
}
?>