<?php
session_start();
if (!$_SESSION['userid']) {
    header('Location:index.php');
}

$mysqli = new mysqli('localhost', 'root', '', 'crud_db');

$product = $mysqli->query('DELETE FROM `products` where `id`=' . $_GET['id'] . ' ');

header('Location:home.php');
