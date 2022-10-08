<?php

session_start();

if (!$_POST) {
    header('Location:home.php');
}

$mysqli = new mysqli('localhost', 'root', '', 'crud_db');

$name = $_POST['name'];
$price = $_POST['price'];
$upc = $_POST['upc'];
$status = $_POST['status'];
$image = '';

if ($_FILES['image']) {
    $fileName = basename($_FILES["image"]["name"]);
    if (move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' . $fileName)) {
        $image = $fileName;
        if (isset($_POST['id'])) {
            unlink('uploads/' . $_POST['oldImage']);
        }
    }
}


if (isset($_POST['id'])) {
    $mysqli->query("UPDATE `products` SET`name`='" . $name . "',`price`='" . $price . "',`upc`='" . $upc . "',`status`='" . $status . "',`image`='" . $image . "' WHERE id=" . $_POST['id']);
} else {
    $mysqli->query("INSERT INTO `products`( `name`, `price`, `upc`, `status`, `image`) VALUES ('" . $name . "','" . $price . "','" . $upc . "','" . $status . "','" . $image . "')");
}


header('Location:home.php');
