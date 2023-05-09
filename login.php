<?php
session_start();
require "connect.php";
require "function.php";


// cek cookie

if (isset($_COOKIE["userid"]) && isset($_COOKIE["username"])) {
    $id = $_COOKIE["userid"];
    $nama = $_COOKIE["username"];

    $query = "SELECT nama FROM admin WHERE id ='$id'";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);

    if ($nama === $row["nama"]) {
        $_SESSION["login"] = true;
        $_SESSION["nama"] = $row["nama"];
    }
}





if (isset($_SESSION["login"])) {
    header("Location: index.php");
}


if (isset($_POST["login"])) {

    $username = $_POST["nama"];
    $password = $_POST["password"];

    $result = mysqli_query($db, "SELECT * FROM admin WHERE nama ='$username'");

    if (mysqli_num_rows($result) == 1) {

        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row["password"])) {



            $_SESSION["login"] = true;
            $_SESSION["nama"] = $username;
            if (isset($_POST["remember"])) {



                // ?tidak bisa tampil ditab yg berbeda
                // buat cookie
                setcookie("userid", $row["id"], time() + 60);
                setcookie("username", $username, time() + 60);
            }



            header("Location: index.php");
            exit;
        }
    }

    $error = "Password / Username SALAH!";
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
    <!-- css -->
    <link rel="stylesheet" href="login.css" />
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet" />
</head>

<body>
    <!-- ========== Start form login ========== -->
    <section class="form-login">
        <div class="container-md">
            <div class="form p-4 mx-auto mt-4 mb-4 border border-3 border-white">
                <h4 class="mb-4">Login <i class="bi bi-exclamation-circle"></i></h4>
                <!-- Pesan Kesalahan username/password -->
                <?php if (isset($error)) : ?>
                    <p class="text-danger fs-4 fst-italic"><?= $error; ?></p>
                <?php endif; ?>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nama" />
                        <div id="emailHelp" class="form-text text-info">We'll never share your Username/Password with
                            anyone else.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password" required />
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember" />
                        <label class="form-check-label" for="exampleCheck1">Remember me!</label>
                    </div>
                    <div class="d-grid gap-2 col-6 mx-auto mt-3 mb-3">
                        <button class="btn btn-primary" type="submit" name="login">Login</button>
                    </div>
                </form>
                <p class="text-center">
                    <a href="../registrasi/registrasi.php"><i class="bi bi-person-plus"></i> Registrasi?</a>
                </p>
            </div>
        </div>
    </section>
    <!-- ========== End form login ========== -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>