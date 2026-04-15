<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>ISS NOW Daten</title>
</head>
<body>

<h2>Aktuelle ISS‑Position</h2>

<?php
// URL wie im Beispiel
$api_url = "http://api.open-notify.org/iss-now.json";

// JSON laden
$json_iss = file_get_contents($api_url);

// JSON dekodieren
$jsondata = json_decode($json_iss);

// Variablen aus JSON
$lat = $jsondata->iss_position->latitude;
$lon = $jsondata->iss_position->longitude;
$timestamp = $jsondata->timestamp;

// Zeit umwandeln
$zeit = date("d.m.Y H:i:s", $timestamp);
?>

<p><b>Breitengrad:</b> <?php echo $lat; ?></p>
<p><b>Längengrad:</b> <?php echo $lon; ?></p>
<p><b>Letzte Aktualisierung:</b> <?php echo $zeit; ?></p>
<p><b><a href="https://www.google.com/maps/?q=<?php echo $lat; ?>,<?php echo $lon; ?>&z=6">iss-now ORT</a></b></p>

</body>
</html>
