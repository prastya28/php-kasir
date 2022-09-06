<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 offset-md-4 mt-5 bg-light shadow p-5 rounded rounded-lg">
                <div class="text-center mb-3">
                    <img src="./assets/img/logo.png" width="150" alt="">
                </div>
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <button class="btn btn-primary" type="submit" name="login">Login</button>
                </form>
            </div>
        </div>
    </div>
    <script src="./assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = sha1($_POST['password']);

    // Cek user di tabel user
    $ambil = $koneksi->query("SELECT * FROM user WHERE email_user='$email' AND password_user='$password' ");
    $cekuser = $ambil->fetch_assoc();

    // Jika kosong
    if (empty($cekuser)) {
        echo "<script>alert('Login gagal!')</script>";
        echo "<script>location='index.php'</script>";
    } else {
        // Menyimpan data login dalam session
        $_SESSION['user'] = $cekuser;

        if ($cekuser['level_user'] == 'kasir') {
            echo "<script>alert('Login berhasil!')</script>";
            echo "<script>location='kasir/index.php'</script>";
        } else if ($cekuser['level_user'] == 'gudang') {
            echo "<script>alert('Login berhasil!')</script>";
            echo "<script>location='gudang/index.php'</script>";
        }
    }
}
?>