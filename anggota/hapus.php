<?php
session_start();



require "../connect.php";
require "../function.php";

if(!isset($_SESSION["login"])){   
    header("Location: login.php");
}

if( isset($_GET["id"]) ){

    $id = $_GET["id"];
    if( hapus($id) > 0 ){

        echo "
        <script>
        alert('Data berhasil DIHAPUS!'); 
        document.location.href = 'daftarAnggota.php';
        </script>";
    }else{
        mysqli_error($db);
    }
}




?>