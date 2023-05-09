<?php
session_start(); 
require "../connect.php";
require "../function.php";

if( !isset($_SESSION["login"]) ){
    header("Location: login.php");
}

if( isset($_POST["submit"]) ){
    
    if( tambah($_POST) > 0  ){
        echo " <script>
            alert('Data berhasil ditambah!'); 
            document.location.href = 'daftarAnggota.php';
            </script>";
    }else{
        mysqli_error($db);
    }

}




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

    <main class="tambah">
        <div class="container tambah-data">
            <div class="row  mt-5">
                <div class="col">
                    <h3>Tambah Anggota <i class="bi bi-database-add"></i></h3>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <form action="" method="post" enctype="multipart/form-data">

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                name="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Lingkungan</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="lingkungan">
                        </div>
                        <div class="mb-3">
                            <label for="inputGroupFile04" class="form-label">Upload Foto</label>
                            <input type="file" class="form-control" id="inputGroupFile04"
                                aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="foto">
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </div>
                </form>
            </div>
            <h5 class="text-center mt-5"><a href="daftarAnggota.php">Halaman Anggota</a></h5>
        </div>
        </div>
    </main>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>