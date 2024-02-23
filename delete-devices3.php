<?php
$servername = "***";
$username = "**";
$password = "***";
$database = "***";

$connection = new mysqli($servername, $username, $password, $database);

$id = "";
$device_name = "";
$opisanie = "";
$prinaglejostkumkluster = "";
$geo1 = "";
$geo2 = "";
$wifissid = "";
$wifipassword = "";
$mac = "";
$sensor_water_1_level = "";
$sensor_water_2_level = "";
$sensor_water_3_level = "";
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

    $device_name = $row["device_name"];
    $opisanie = $row["device_description"];
    $prinaglejostkumkluster = $row["cluster_id"];
    $geo1 = $row["device_geolocation_1"];
    $geo2 = $row["device_geolocation_2"];
    $wifissid = $row["device_wifi_network_name"];
    $wifipassword = $row["device_wifi_network_password"];
    $mac = $row["device_mac"];
    $sensor_water_1_level = $row["sensor_water_1_level"];
    $sensor_water_2_level = $row["sensor_water_2_level"];
    $sensor_water_3_level = $row["sensor_water_3_level"];
    $sensor_level_1_alert_level = $row["sensor_level_1_alert_level"];
} else {
    $device_name = $_POST["device_name"];
    $opisanie = $_POST["device_description"];
    $prinaglejostkumkluster = $_POST["cluster_id"];
    $geo1 = $_POST["device_geolocation_1"];
    $geo2 = $_POST["device_geolocation_2"];
    $wifissid = $_POST["device_wifi_network_name"];
    $wifipassword = $_POST["device_wifi_network_password"];
    $mac = $_POST["device_mac"];
    $sensor_water_1_level = $_POST["sensor_water_1_level"];
    $sensor_water_2_level = $_POST["sensor_water_2_level"];
    $sensor_water_3_level = $_POST["sensor_water_3_level"];
    $sensor_level_1_alert_level = $_POST["sensor_level_1_alert_level"];

    do {
        if (empty($device_name) || empty($opisanie) || empty($prinaglejostkumkluster) || empty($geo1) || empty($geo2) || empty($wifissid) || empty($wifipassword) || empty($mac) || empty($sensor_water_1_level) || empty($sensor_water_2_level) || empty($sensor_water_3_level) || empty($sensor_level_1_alert_level)) {
            $errorMessage = "All fields are required";
            break;
        }
         $id = $_GET["id"];
        $sql = "DELETE devices " .
            "SET device_name = '$device_name', device_description = '$opisanie', cluster_id = '$prinaglejostkumkluster', device_geolocation_1 = '$geo1', device_geolocation_2 = '$geo2', device_wifi_network_name = '$wifissid', device_wifi_network_password = '$wifipassword', device_mac = '$mac', sensor_water_1_level = '$sensor_water_1_level', sensor_water_2_level = '$sensor_water_2_level', sensor_water_3_level = '$sensor_water_3_level', sensor_level_1_alert_level = '$sensor_level_1_alert_level' " .
            "WHERE id = $id";
        
//        echo "SQL query: " . $sql; // Add this line for debugging purposes

        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        } else {
            $successMessage = "Device updated correctly";
            header("location: show-devices.php");
            exit;
        }
    } while (false);
}
?>
