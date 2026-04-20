<?php
$type = $_POST['type'] ?? 'random';
$size = $_POST['size'] ?? 350;

$cats = [
    'random' => 'https://cataas.com/cat',
    'orange' => 'https://cataas.com/cat/orange,cute',
    'gif'    => 'https://cataas.com/cat/gif',
    'hello'  => 'https://cataas.com/cat/says/hello?fontSize=50&fontColor=red'
];

$url = $cats[$type];

if (str_contains($url, '?')) {
    $url .= "&width=$size&height=$size&rand=" . time();
} else {
    $url .= "?width=$size&height=$size&rand=" . time();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Cat Generator</title>

<style>
body {
    font-family: Arial, sans-serif;
    background: #f5f6fa;
    text-align: center;
    padding: 30px;
}

h2 {
    margin-bottom: 20px;
}

.cat {
    border-radius: 15px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    margin-bottom: 20px;
}

form {
    margin: 10px;
}

/* КНОПКИ */
button {
    padding: 10px 15px;
    margin: 5px;
    border: none;
    border-radius: 10px;
    cursor: pointer;
    font-size: 14px;
    transition: 0.2s;
}

/* Типы котов */
button[name="type"] {
    background: #4a69bd;
    color: white;
}

button[name="type"]:hover {
    background: #1e3799;
}

/* Размеры */
button[name="size"] {
    background: #60a3bc;
    color: white;
}

button[name="size"]:hover {
    background: #3c6382;
}

button:active {
    transform: scale(0.95);
}
</style>

</head>
<body>

<h2>🐱 Cat Generator</h2>

<img class="cat" src="<?= $url ?>" width="<?= $size ?>" height="<?= $size ?>" alt="Cat">

<!-- КНОПКИ ТИПА -->
<form method="POST">
    <input type="hidden" name="size" value="<?= $size ?>">

    <button type="submit" name="type" value="random">Random Cat</button>
    <button type="submit" name="type" value="orange">Orange Cute Cat</button>
    <button type="submit" name="type" value="gif">GIF Cat</button>
    <button type="submit" name="type" value="hello">Hello Cat</button>
</form>

<!-- КНОПКИ РАЗМЕРА -->
<form method="POST">
    <input type="hidden" name="type" value="<?= $type ?>">

    <button type="submit" name="size" value="200">Small</button>
    <button type="submit" name="size" value="350">Medium</button>
    <button type="submit" name="size" value="500">Large</button>
</form>

</body>
</html>