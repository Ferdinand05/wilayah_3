<?php
require "connect.php";


// *function REGISTRASI
function registrasi($data){
    global $db;

    $username =  strtolower(stripslashes($data["nama"]));
    $password1 = mysqli_real_escape_string($db,$data["password1"]);
    $password2 = mysqli_escape_string($db,$data["password2"]);

    $query = "SELECT nama FROM admin where nama ='$username'";
    $result = mysqli_query($db,$query);
    
    // cek username sudah terdafatar atau belum
    if( mysqli_fetch_assoc($result) ){
      echo "<script>
            alert('username sudah terdaftar!');
            </script>";
            
      return false;
    }

    if( $password1 !== $password2 ){

        echo "<script>
        alert('Konfirmasi password tidak sesuai ');
        </script>";
      }else{
        $password1 = password_hash($password1,PASSWORD_DEFAULT);
        
        // tambahkan user
        $query = "INSERT INTO admin VALUES('','$username','$password1')";
        mysqli_query($db,$query);
      }
    
    return mysqli_affected_rows($db);

}


// *Tampil data
function query($query){
  global $db;

  $result = mysqli_query($db,$query);
  $rows=[];

  while($row = mysqli_fetch_assoc($result)){
    $rows[] = $row;
  }

  return $rows;
}

// *Tambah data
function tambah($data){
  global $db;

  $nama = htmlspecialchars($data["nama"]);
  $lingkungan = htmlspecialchars($data["lingkungan"]);
  
  $foto = upload();
  if( !$foto ){
      return false;    
  }

  $query = "INSERT INTO anggota VALUES ('','$foto','$nama','$lingkungan')";
  mysqli_query($db,$query);

  return mysqli_affected_rows($db);

}



// *Upload Gambar
function upload(){

  // diambil dari $_FILES 
  $namaFile = $_FILES["foto"]["name"];
  $ukuranFile = $_FILES["foto"]["size"];
  $error = $_FILES["foto"]["error"];
  $tmpName = $_FILES["foto"]["tmp_name"];

  if ($error === 4){
    echo "<script>
          alert('Pilih Foto Terlebih dahulu');
          </script>";
          return false;
  }

  $supportImage = ["jpg","jpeg","png"];
  $userFoto = explode(".",$namaFile);
  $userFoto = end($userFoto);
  $userFoto = strtolower($userFoto);

  if( !in_array($userFoto,$supportImage) ){
    echo "<script>
            alert('Yang anda Upload bukan Foto! (jpg,png,jpeg)');
            </script>";
            return false;
  }  

  // cek size gambar
  if( $ukuranFile > 1500000 ){
    echo "<script>
            alert('Size Gambar terlalu besar! max : 1.5mb');
            </script>";
      return false;
  }

  // ubah nama foto ke uniqid, mencegah kesamaan nama foto
  $namaFotoBaru = uniqid();
  $namaFotoBaru = $namaFotoBaru .'.'.$userFoto;
  var_dump($namaFotoBaru);
  // upload foto
   move_uploaded_file($tmpName,"img/".$namaFotoBaru);
  
  return $namaFotoBaru;
  
}


// *Hapus data
function hapus($id){
  global $db;
  
  $query = "DELETE FROM anggota WHERE id = $id";
  mysqli_query($db,$query);

  return mysqli_affected_rows($db);

}

?>