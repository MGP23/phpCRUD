<?php
session_start();
if (!$_SESSION['userid']) {
    header('Location:index.php');
}

$mysqli = new mysqli('localhost', 'root', '', 'crud_db');


$products = $mysqli->query('SELECT * FROM `products`');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
        <a href="add_product.php" class="btn btn-success">Add</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>Name</td>
                    <td>Price</td>
                    <td>Status</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($products->num_rows) {
                    foreach ($products->fetch_all() as $key => $value) {

                ?>
                        <tr>
                            <td><?= $value[1] ?></td>
                            <td><?= $value[2] ?></td>
                            <td><?= ($value[4] ? 'Active' : 'Inactive') ?></td>
                            <td>
                                <a href="editproduct.php?id=<?= $value[0] ?>" class="btn btn-success">Edit</a>
                                <a href="deleteproduct.php?id=<?= $value[0] ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="4">No Data</td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>