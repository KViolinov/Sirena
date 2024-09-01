<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Карта - риск от наводнения</title>
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
    <!-- leaflet cdn link -->
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
    </style>
</head>
<body>
    <div id="map"></div>
</body>
</html>

<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<!--
<script src="http://leaflet.github.io/Leaflet.markercluster/example/realworld.10000.js"></script>
-->

<script src="js/leaflet-heat.js"></script>


<script>
    // Map initialization 
    var map = L.map('map').setView([43.05929575305801, 25.598378106660363], 14);

    //osm layer
    var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    });
    osm.addTo(map);

//    console.log(addressPoints);

//    addressPoints = addressPoints.map(function (p) { return [p[0], p[1]]; });

//    console.log(addressPoints)

var addressPoints = [
[43.067969791383206, 25.568436740898232, "20"],
[43.06426606389827, 25.569043367698377, "10"],
[43.05916911579996, 25.572856450442146, "30"],
[43.06011888980358, 25.58013597204388, "40"],
[43.06284149374164, 25.592788473875473, "50"],
[43.05939073105008, 25.598941402848368, "60"],
[43.04922726503493, 25.60739084756467, "70"],
[43.049480580604204, 25.636725586400242, "80"],
[43.06369623980797, 25.63256585977068, "90"],
[443.06974243646326, 25.634732384056914, "100"],



];


    var heat = L.heatLayer(addressPoints).addTo(map);
    
</script>
