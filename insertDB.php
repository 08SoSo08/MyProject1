<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "alexandru";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = "";

if (isset($_POST['save'])) {

    $firstname = $_POST['firstname'];
    $lastname  = $_POST['lastname'];
    $email     = $_POST['email'];

    $sql = "INSERT INTO MyGuests (firstname, lastname, email)
            VALUES ('$firstname', '$lastname', '$email')";

    if ($conn->query($sql) === TRUE) {
        $message = "Gespeichert ✔";
    } else {
        $message = "Fehler: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Insert</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'Header.php';?>
<body class="insertDB">

<h2>Einfügen</h2>

<form method="POST">
    <input type="text" name="firstname" placeholder="Vorname" required><br><br>
    <input type="text" name="lastname" placeholder="Nachname" required><br><br>
    <input type="email" name="email" placeholder="E-Mail" required><br><br>

    <button type="submit" name="save">Speichern</button>
</form>

<p style="color:green;">
    <?php echo $message; ?>
</p>
<?php include 'Footer.php';?>
</body>
</html>

<?php $conn->close(); ?>