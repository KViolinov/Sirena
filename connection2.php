<?php
    $username = "***";
    $password = "***";
    $datebase = "***";
    
    try{
        $pdo = new PDO("mysql:host=localhost;database=$datebase", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e){
        die("Error: could not connect. " . $e->getMessage());
    }
?>
