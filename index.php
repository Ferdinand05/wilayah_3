<?php
session_start();
require "connect.php";
require "function.php";

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
}


if (isset($_COOKIE["username"])) {
    $nama = $_COOKIE["username"];
} else {
    $nama = $_SESSION["nama"];
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Wilayah 3</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
    <!-- css -->
    <link rel="stylesheet" href="style.css" />
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet" />
</head>

<body>
    <!-- ========== Start Image ========== -->
    <section id="image" class="wallpaper">
        <img src="img/img2.jpg" class="img-fluid">
        <div class="logo d-flex justify-content-between">
            <img src="img/logo_matius.png" class="img-fluid rounded-circle img-thumbnail ms-3">
            <h3 class="text-logo">WILAYAH 3</h3>
            <img src="img/logo_omk.jpg" class="img-fluid rounded-circle me-3">
        </div>
    </section>
    <!-- ========== End Image ========== -->

    <!-- ========== Start Navbar ========== -->
    <nav class="navbar navbar-expand-lg navbar3" id="nav-bar">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="">Wilayah 3</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" class="">
                <span class="navbar-toggler-icon btn text-bg-secondary"></span>
            </button>
            <div class="collapse navbar-collapse text-white" id="navbarNav">
                <ul class="navbar-nav  ms-auto d-flex justify-content-around pe-3">
                    <li class="nav-item pe-3">
                        <a class="nav-link active text-white home" aria-current="page" href="#image">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white anggota" href="./anggota/daftarAnggota.php">Daftar Anggota</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-bg-danger logout" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- ========== End Navbar ========== -->

    <p class="m-3">Selamat datang, <?= $nama; ?></p>
    <!-- ========== Start about ========== -->
    <section class="about">
        <div class="container-sm">
            <div class="row text-center">
                <div class="col">
                    <h3 class="title mb-4">ABOUT</h3>
                </div>
            </div>
            <div class="row text-center justify-content-center">
                <div class="col-md-4">
                    <p>Wilayah 3 adalah wilayah dari bagian Paroki Santo Matius Penginjil Bintaro. Wilayah 3 memiliki
                        banyak Lingkungan: St.Leo, Romo Sanjoyo, Tarsisius, Petrus</p>
                </div>
                <div class="col-md-4">
                    <p>Wilayah 3 merupakan wilayah yang luas, ada kurang lebih 100 KK yang terdaftar. Selain luas ,
                        wilayah 3 juga aktif dalam rangkain kegiatan Gereja, contohnya : Matchamp, Matius Sports day, 17
                        Agustus, dan Koor Gereja.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- ========== End about ========== -->

    <section class="location">
        <div class="container-sm">
            <div class="row text-center mb-4">
                <div class="col">
                    <h3 class="title">LOCATION</h3>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <iframe class="border border-black" width="100%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=santo%20matius%20penginjil+(santo%20matius)&amp;t=&amp;z=17&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.maps.ie/distance-area-calculator.html">measure area map</a></iframe>
                </div>
            </div>
        </div>
    </section>

    <!-- ========== Start quotes ========== -->
    <section class="quotes">
        <div class="container">
            <figure class="text-center">
                <blockquote class="blockquote">
                    <p>Berhagialah orang yang lapar dan haus akan Kebenaran karena mereka akan dipuaskan.</p>
                </blockquote>
                <figcaption class="blockquote-footer">Matius 5:6 <cite title="Source Title"></cite></figcaption>
            </figure>
        </div>
    </section>
    <!-- ========== End quotes ========== -->

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#000000" fill-opacity="1" d="M0,64L40,74.7C80,85,160,107,240,101.3C320,96,400,64,480,58.7C560,53,640,75,720,96C800,117,880,139,960,128C1040,117,1120,75,1200,58.7C1280,43,1360,53,1400,58.7L1440,64L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z">
        </path>
    </svg>
    <!-- ========== Start footer ========== -->

    <footer class="footer">
        <div class="container">
            <div class="row text-center">
                <div class="col text-white">
                    <p class="">
                        &copy;2023 Wilayah 3. Made with
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                        </svg>
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- ========== End footer ========== -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>