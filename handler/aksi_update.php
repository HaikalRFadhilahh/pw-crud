<?php
include('../koneksi.php');
$id = $_POST['id'];
$nim = $_POST['nim'];
$name = $_POST['name'];
$no_hp = $_POST['no_hp'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$jurusan = $_POST['jurusan'];
$alamat = $_POST['alamat'];

$sql = "update mahasiswa set nim='$nim',name='$name',no_hp='$no_hp',jenis_kelamin='$jenis_kelamin',jurusan='$jurusan',alamat='$alamat' where id=$id";

try {
    //code..
    mysqli_query($link, $sql);
    header("Location: ../data_mhs.php?status=success&message=Update Data Berhasil");
} catch (\Throwable $th) {
    //throw $th;
    header("Location: ../data_mhs.php?status=error&message=Query Error Execution");
}
