<html lang="en">

<?php
include('./koneksi.php');
$id = $_GET['id'];
$sql = "select * from mahasiswa where id=$id";
$data = mysqli_query($link, $sql);
$data = mysqli_fetch_assoc($data);
if (empty($id) || empty($data)) {
    header("Location: ./index.php");
}
?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="icon" href="./image/icon/HaikLogo.png">
    <title>Update Data Mahasiswa</title>
</head>

<body>
    <?php 
        session_start();
        if (empty($_SESSION['status']))
        {
            header("Location: ./index.php?status=error&message=Harus Login Terlebih Dahulu");
        }
    ?>
    <div class="container">
        <h1 class="my-4 text-center">Update Mahasiswa</h1>
        <form action="./handler/aksi_update.php" method="POST">
            <input type="text" hidden name="id" value='<?php echo $data['id'] ?>'>
            <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input required type="text" class="form-control" id="nim" name="nim" value='<?php echo $data['nim'] ?>'>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input required type="text" class="form-control" id="name" name="name" value='<?php echo $data['name'] ?>'>
            </div>
            <div class="mb-3">
                <label for="no_hp" class="form-label">Nomer HP</label>
                <input required type="text" class="form-control" id="no_hp" name="no_hp" value='<?php echo $data['no_hp'] ?>'>
            </div>
            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="form-select">
                    <option value="Laki-Laki" <?php $status = $data['jenis_kelamin'] == "Laki-Laki" ? 'selected' : '';
                                                echo $status  ?>>Laki-Laki</option>
                    <option value="Perempuan" <?php $status = $data['jenis_kelamin'] == "Perempuan" ? 'selected' : '';
                                                echo $status  ?>>Perempuan</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="jurusan" class="form-label">Jurusan</label>
                <select name="jurusan" id="jurusan" class="form-select">
                    <option value="Informatika" <?php $status = $data['jurusan'] == "Informatika" ? 'selected' : '';
                                                echo $status  ?>>Informatika</option>
                    <option value="Sistem Informasi" <?php $status = $data['jurusan'] == "Sistem Informasi" ? 'selected' : '';
                                                        echo $status ?>>Sistem Informasi</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea required name="alamat" id="alamat" rows="3" class="form-control"><?php echo $data['alamat'] ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="./data_mhs.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>