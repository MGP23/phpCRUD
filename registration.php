<?php

session_start();

if (isset($_SESSION['userid'])) {
    header('Location:home.php');
}

$mysqli = new mysqli('localhost', 'root', '', 'crud_db');


if ($_POST) {

    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = $mysqli->query('INSERT INTO `users`(`name`, `email`, `password`) VALUES ("' . $_POST['name'] . '","' . $_POST['email'] . '","' . $password . '")');
    if ($query) {
        header('Location:index.php');
    } else {
        header('Location:registration.php');
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">CRUD</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Login</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="registration.php">Registration</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <form action="registration.php" method="post">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>