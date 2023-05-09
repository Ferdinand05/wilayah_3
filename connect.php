<?php

$db = mysqli_connect("localhost","root","","wilayah3");

if( mysqli_connect_errno() ){
    echo " Koneksi ke database gagal! "; 
    return mysqli_connect_error($db); 
}

?>