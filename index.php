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
    <link href="./assets/css/style.css" rel="stylesheet" />

</head>

<body>

    <section>
        <div class=" items-center px-5 py-12 lg:px-20">
            <div class="sm:mx-auto sm:w-full sm:max-w-md">
                <h2 class="mt-6 text-3xl font-extrabold text-center text-neutral-600">Login to your account</h2>
            </div>
            <div class="flex flex-col w-full max-w-md p-10 mx-auto my-6 transition duration-500 ease-in-out transform bg-white rounded-lg md:mt-0">
                <div class="mt-8">
                    <div class="mt-6">
                        <form action="#" method="POST" class="space-y-6" data-bitwarden-watching="1">
                            <div>
                                <label for="email" class="block text-sm font-medium text-neutral-600"> Email </label>
                                <div class="mt-1">
                                    <input id="email" name="email" type="email" autocomplete="email" required="" placeholder="Your Email" class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300">
                                </div>
                            </div>

                            <div class="space-y-1">
                                <label for="password" class="block text-sm font-medium text-neutral-600"> Password </label>
                                <div class="mt-1">
                                    <input id="password" name="password" type="password" autocomplete="current-password" required="" placeholder="Your Password" class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300">
                                </div>
                            </div>

                            <div>
                                <button type="submit" name="login" class="flex items-center justify-center w-full px-10 py-4 text-base font-medium text-center text-white transition duration-500 ease-in-out transform bg-blue-600 rounded-xl hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

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