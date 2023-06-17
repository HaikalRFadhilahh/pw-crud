<?php

session_start();

if (empty($_SESSION['status']))
{
    header("Location: ../index.php?status=error&message=Harus Login Terlebih Dahulu");
}

session_destroy();

header("Location: ../index.php?status=success&message=Logout Berhasil");

?>