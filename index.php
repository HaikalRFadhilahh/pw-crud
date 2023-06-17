<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Aplikasi Login</title>
    <style>
        body {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>
<?php 
    session_start();
    if (!empty($_SESSION['status']))
    {
        header("Location: ./data_mhs.php");
    }
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <h3 class="mb-3">Silahkan Login</h3>
                <form action="./handler/aksi_login.php" method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username">
                        <span class="error">
                            <?php if (isset($errors['username'])) echo $errors['username']; ?>
                        </span>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="text" class="form-control" id="password" name="password">
                        <span class="error">
                            <?php if (isset($errors['password'])) echo $errors['password']; ?>
                        </span>
                    </div>
                    <button type="sumbit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="./js/sweetalert.js"></script>
    <?php
    if (isset($_GET['status'])) {
        $mess = $_GET['message'];
        $status = $_GET['status'];
        echo "<script>Swal.fire(
            '$status',
            '$mess',
            '$status'
        );</script>";
    }
    ?>
</body>
</html>