<?php 
// koneksi database
require "../connect.php";
require "../function.php";
if( isset($_POST["registrasi"]) ){
  
    if( registrasi($_POST) > 0){
        echo "<script>
              alert('user baru berhasil ditambahkan!');
              </script>";
      }else{
        echo mysqli_error($db);
      }
  
}





?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registrasi</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
    <!-- css -->
    <link rel="stylesheet" href="registrasi.css" />
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet" />
</head>

<body>
    <section class="form-registrasi">
        <div class="container mt-5">
            <div class="registrasi mx-auto">
                <h3 class="mb-4"><i class="bi bi-person-vcard"></i> Form Registrasi</h3>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            name="nama" />
                        <div id="emailHelp" class="form-text">We'll never share your identity with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password1" />
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password2" />
                    </div>
                    <button type="submit" class="btn btn-primary" name="registrasi">Submit</button>
                </form>
            </div>
        </div>
    </section>

    <div class="container mt-5">
        <p class="text-center">Sudah punya akun ? <a href="../login/login.php">Login</a></p>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>