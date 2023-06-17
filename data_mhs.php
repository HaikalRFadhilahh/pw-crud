<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="icon" href="./image/icon/HaikLogo.png">
    <title>Crud Mahasiswa</title>
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
        <h1 class="my-4 text-center">CRUD Mahasiswa</h1>
        <?php
        include('./koneksi.php');
        $result = mysqli_query($link, 'select * from mahasiswa');
        ?>
        <table class="table">
            <thead>
                <th>NIM</th>
                <th>Nama</th>
                <th>No HP</th>
                <th>Jenis Kelamin</th>
                <th>Jurusan</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                <?php while ($data = mysqli_fetch_assoc($result)) { ?>
                    <td><?php echo $data['nim'] ?></td>
                    <td><?php echo $data['name'] ?></td>
                    <td><?php echo $data['no_hp'] ?></td>
                    <td><?php echo $data['jenis_kelamin'] ?></td>
                    <td><?php echo $data['jurusan'] ?></td>
                    <td><?php echo $data['alamat'] ?></td>
                    <td>
                        <a href="./form_update.php?id=<?php echo $data['id'] ?>" class="btn btn-primary">Edit</a>
                        <a href="./handler/aksi_hapus.php?id=<?php echo $data['id'] ?>" class="btn btn-danger">Delete</a>
                    </td>
            </tbody>
        <?php } ?>
        </table>
        <a href="form_tambah.php" class="btn btn-success">Tambah Mahasiswa</a>
        <a href="./handler/aksi_logout.php" class="btn btn-danger me-auto">Logout</a>
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