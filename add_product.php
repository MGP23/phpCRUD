<?php
session_start();
if (!$_SESSION['userid']) {
    header('Location:index.php');
}

$mysqli = new mysqli('localhost', 'root', '', 'crud_db');




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
                <li class="nav-item active">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <form action="product_save.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col">
                    <div class="form-group mt-4">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group mt-4">
                        <label for="">Price</label>
                        <input type="number" min="1.00" name="price" class="form-control" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group mt-4">
                        <label for="">UPC</label>
                        <input type="text" name="upc" class="form-control" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group mt-4">
                        <label for="">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group mt-4">
                        <label for="">Image</label>
                        <input type="file" name="image" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>