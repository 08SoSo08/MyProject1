<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>ISS NOW Daten</title>
</head>
<body>

<h2>Aktuelle ISS‑Position</h2>

<?php

$api_url = "http://api.open-notify.org/iss-now.json";

// JSON laden
$json_iss = file_get_contents($api_url);

// JSON dekodieren
$jsondata = json_decode($json_iss);


$lat = $jsondata->iss_position->latitude;
$lon = $jsondata->iss_position->longitude;
$timestamp = $jsondata->timestamp;

// Zeit umwandeln
$zeit = date("d.m.Y H:i:s", $timestamp);
?>

<p><b>Breitengrad:</b> <?php echo $lat; ?></p>
<p><b>Längengrad:</b> <?php echo $lon; ?></p>
<p><b>Letzte Aktualisierung:</b> <?php echo $zeit; ?></p>
<p><b><a href="https://www.google.com/maps/?q=<?php echo $lat; ?>,<?php echo $lon; ?>&z=6" target="_blank">iss-now ORT</a></b></p>

<?php
$type = $_POST['type'] ?? 'random';

// базовые URL
$cats = [
    'random' => 'https://cataas.com/cat',
    'orange' => 'https://cataas.com/cat/orange,cute',
    'gif'    => 'https://cataas.com/cat/gif',
    'hello'  => 'https://cataas.com/cat/says/hello?fontSize=50&fontColor=red'
];

// выбираем URL
$url = $cats[$type] . '&rand=' . time();
?>

<h2>🐱 Cat Generator</h2>

<img src="<?= $url ?>" width="350" height="350" alt="Cat">

<form method="POST">

    <button type="submit" name="type" value="random">
        Random Cat
    </button>

    <button type="submit" name="type" value="orange">
        Random Orange Cute Cat
    </button>

    <button type="submit" name="type" value="gif">
        Random GIF Cat
    </button>

    <button type="submit" name="type" value="hello">
        Custom "Hello" Cat
    </button>

</form>

</body>
</html>
