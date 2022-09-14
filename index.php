<?php
include 'koneksi.php';
?>

<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="shortcut icon" href="./assets/img/building-store.png" type="image/x-icon">
    <title>Login</title>
    <!-- CSS files -->
    <link href="./assets/css/tabler.min.css" rel="stylesheet" />

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

</head>

<body class="border-top-wide border-primary d-flex flex-column">
    <div class="page page-center">
        <div class="container-tight py-4">
            <div class="text-center mb-4">
                <h2><a href="index.php" class="navbar-brand navbar-brand-autodark"><img src="./assets/img/building-store.svg" height="36" alt="">&nbsp;PHP-KASIR</a></h2>
            </div>
            <div class="card card-md">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Masuk ke akun anda</h2>
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Kata sandi</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-footer">
                            <button class="btn btn-primary w-100" type="submit" name="login"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-login" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2"></path>
                                    <path d="M20 12h-13l3 -3m0 6l-3 -3"></path>
                                </svg>Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="./assets/js/tabler.min.js" defer></script>
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