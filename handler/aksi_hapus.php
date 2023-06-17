<?php
include('../koneksi.php');
$id = $_GET['id'];


$sql = "delete from mahasiswa where id=$id";

try {
    //code...
    mysqli_query($link, $sql);
    header("Location: ../data_mhs.php?status=success&message=Hapus Data Berhasil");
} catch (\Throwable $th) {
    //throw $th;
    header("Location: ../data_mhs.php?status=error&message=Query Error Execution");
}
