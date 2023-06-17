<?php
$errors = array();

if (empty($_POST['username']))
{
    $errors['username'] = 'Username Harus Di Isi';
}

if (empty($_POST['password']))
{
    $errors['Password'] = 'Password Harus Di Isi';
}

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "select * from admin where username = '$username' AND password = '$password'";

try {
    //code...
    include ('../koneksi.php');
    $result = mysqli_query($link,$sql);
    if (mysqli_num_rows($result) == 1)
    {
        session_start();
        $_SESSION['status'] = 'login';
        header("Location: ../data_mhs.php?status=success&message=Login Success");
    }
    else {
        header("Location: ../index.php?status=error&message=Login Gagal");
    }
} catch (\Throwable $th) {
    //throw $th;
    include '../index.php?status=error&message=System Error';
}

?>