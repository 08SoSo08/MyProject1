<?php
session_start();
if (!isset($_SESSION['authorized']) || $_SESSION['authorized'] !== true) {
    header('Location: login.php');
    exit;
}