<?php include 'header.php' ?>

<?php
// Dapatkan id_user dari kasir yang login
$id_user = $_SESSION['user']['id_user'];

$ambil = $koneksi->query("SELECT * FROM user WHERE id_user='$id_user'");
$user  = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($user);
// echo "</pre>";

?>

<div class="page-body">
    <div class="container-xl">
        <form class="card" method="post">
            <div class="card-header">
                <h3 class="card-title">Ubah Akun</h3>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label required">Nama</label>
                    <div>
                        <input type="text" name="nama" class="form-control" placeholder="Masukkan nama" value="<?= $user['nama_user']; ?>">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label required">Email</label>
                    <div>
                        <input type="email" name="email" class="form-control" aria-describedby="emailHelp" placeholder="Masukkan email" value="<?= $user['email_user']; ?>">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label required">Password</label>
                    <div>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <button type="submit" name="ubah" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>

<?php

if (isset($_POST['ubah'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($password)) {
        $password = sha1($password);
        $koneksi->query("UPDATE user SET nama_user='$nama', email_user='$email', password_user='$password'
                        WHERE id_user='$id_user'");
    } else {
        $koneksi->query("UPDATE user SET nama_user='$nama', email_user='$email' WHERE id_user='$id_user'");
    }

    echo "<script>alert('Akun anda telah diubah!')</script>";
    echo "<script>location='akun.php'</script>";
}

?>

<?php include 'footer.php' ?>