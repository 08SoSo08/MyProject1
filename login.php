<?php
session_start();

// Данные для проверки (можно заменить на свои)
$correct_user = 'admin';
$correct_pass = '12345';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['username'] ?? '';
    $pass = $_POST['password'] ?? '';

    if ($user === $correct_user && $pass === $correct_pass) {
        $_SESSION['authorized'] = true;
        header('Location: index.php'); // Переход на защищенную страницу
        exit;
    } else {
        $error = 'Username oder Pass ist inkorrekt';
    }
}
?>

<!DOCTYPE html>
<html>
<body>
    <form method="post">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Passwort" required><br>
        <button type="submit">Войти</button>
    </form>
    <?php if ($error) echo "<p style='color:red;'>$error</p>"; ?>
</body>