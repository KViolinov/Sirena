<?php

// Вашият код за връзка с базата данни и конфигурация
$hostname = "***";
$username = "***";
$password = "***";
$database = "***";


// Create a connection
$conn = new mysqli($hostname, $username, $password, $database);

// SQL заявка за извличане на последните стойности на sensor_water_1, sensor_water_2 и sensor_water_3
$query = "SELECT sensor_water_1, sensor_water_2, sensor_water_3 FROM sensor_data ORDER BY date DESC LIMIT 1";

// Изпълнение на заявката
$result = $conn->query($query);

// Проверка за грешки
if (!$result) {
    die("Invalid query: " . $conn->error);
}

// Извличане на резултатите
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Проверка дали всички стойности са 1
    if ($row['sensor_water_1'] == 1 && $row['sensor_water_2'] == 1 && $row['sensor_water_3'] == 1) {
        // Изпратете имейл
        // Вашият код за изпращане на имейл тук
        mail("n3twork_5h4d0w@proton.me", "Наводнение", "Вашето устройство е надвишило и трите нива на сензорите за вода", "sirena@outlook.com");
        //echo "Изпратен е имейл";
    } else {
        //echo "Не е необходимо да се изпраща имейл";
    }
} else {
    echo "Няма налични данни в базата данни";
}

// Затваряне на връзката с базата данни
$conn->close();

?>

