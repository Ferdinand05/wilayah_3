<?php 
session_start();
require "../connect.php";
require "../function.php";


if(!isset($_SESSION["login"])){   
    header("Location: login.php");
}




// tampil data

$anggotaWilayah  = query("SELECT * FROM anggota");






?>




<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Anggota</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet" />
    <!-- css -->
    <link rel="stylesheet" href="style.css">

</head>

<body>


    <!-- ========== Start Navbar ========== -->
    <nav class="navbar navbar-expand-lg text-white bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="">Wilayah 3</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse text-white" id="navbarNav">
                <ul class="navbar-nav text-white ms-auto d-flex justify-content-around pe-3">
                    <li class="nav-item pe-3">
                        <a class="nav-link active text-white home" aria-current="page" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white anggota" href="daftarAnggota.php">Daftar Anggota</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-bg-danger logout" href="../logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <!-- ========== Start Table ========== -->
    <main class="table-data">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h3>Daftar Anggota Wilayah 3 <i class="bi bi-file-earmark-person"></i></h3>
                </div>
            </div>
            <p><a href="tambah.php">Tambah data Anggota</a></p>
            <div class="row mt-3">
                <div class="col">

                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="input-group input-group-sm mb-3 search">
                            <span class="input-group-text" id="inputGroup-sizing-sm"><i class="bi bi-search"></i></span>
                            <input type="text" class="form-control" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-sm" name="search">
                            <button type="submit" name="search" class="btn btn-success">Search</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <table class="table table-success" border="1px">
                        <tr>
                            <th>No.</th>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>Lingkungan</th>
                            <th colspan="2" class="text-center">Aksi</th>
                        </tr>
                        <?php $i=1 ?>
                        <?php foreach($anggotaWilayah as $anggota):?>
                        <tr>
                            <th class="align-middle"><?= $i ?></th>
                            <td>
                                <img src="./img/<?= $anggota["foto"] ?>" width="60px">
                            </td>
                            <td class="align-middle"><?= $anggota["nama"] ?></td>
                            <td class="align-middle"><?= $anggota["lingkungan"] ?></td>
                            <td class="text-center align-middle">
                                <a href="tambah.php?id=<?= $anggota["id"] ?>">Edit</a>
                            </td>
                            <td class="text-center align-middle">
                                <a href="hapus.php?id=<?= $anggota["id"] ?>"
                                    onclick="return confirm('Anda yakin ingin Menghapus?');">Hapus</a>
                            </td>
                        </tr>
                        <?php $i++ ?>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <!-- ========== End Table ========== -->







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>