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
        <?php if (isset($_SESSION['status'])) : ?>
            <div class="alert alert-important alert-<?= $_SESSION['status_type']; ?> alert-dismissible" role="alert">
                <div class="d-flex">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M5 12l5 5l10 -10"></path>
                        </svg>
                    </div>
                    <div>
                        <?= $_SESSION['status']; ?>
                        <?php unset($_SESSION['status']); ?>
                        <?php unset($_SESSION['status_type']); ?>
                    </div>
                </div>
                <a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
            </div>
        <?php endif; ?>

        <form class="card" method="post">
            <div class="card-header">
                <h3 class="card-title">Ubah Akun</h3>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <div>
                        <input type="text" name="nama" class="form-control" placeholder="Masukkan nama" value="<?= $user['nama_user']; ?>">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <div>
                        <input type="email" name="email" class="form-control" aria-describedby="emailHelp" placeholder="Masukkan email" value="<?= $user['email_user']; ?>">
                    </div>
                </div>
                <div>
                    <label class="form-label">Password</label>
                    <div>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <small class="form-hint mt-1">
                        Kosongkan jika tidak ingin diubah.
                    </small>
                </div>
            </div>
            <div class="card-footer text-start">
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

    // echo "<script>alert('Akun anda telah diubah!')</script>";
    $_SESSION['status'] = "Akun anda berhasil diubah!";
    $_SESSION['status_type'] = "success";
    echo "<script>location='akun.php'</script>";
}

?>

<?php include 'footer.php' ?>