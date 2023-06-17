<?php
include('../koneksi.php');
$nim = $_POST['nim'];
$name = $_POST['name'];
$no_hp = $_POST['no_hp'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$jurusan = $_POST['jurusan'];
$alamat = $_POST['alamat'];


$sql = "insert into mahasiswa(nim,name,no_hp,jenis_kelamin,jurusan,alamat) values ('$nim','$name','$no_hp','$jenis_kelamin','$jurusan','$alamat')";

try {
    //code...
    mysqli_query($link, $sql);
    header("Location: ../data_mhs.php?status=success&message=Tambah Data Berhasil");
} catch (\Throwable $th) {
    //throw $th;
    header("Location: ../data_mhs.php?status=error&message=Query Error Execution");
}
