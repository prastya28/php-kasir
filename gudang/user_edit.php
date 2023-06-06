<?php
$id_user = $_GET['id'];
$id_toko = $_SESSION['user']['id_toko'];

$ambil = $koneksi->query("SELECT * FROM user WHERE id_user='$id_user' AND id_toko='$id_toko' ");
$user = $ambil->fetch_assoc();

?>

<form method="post" class="card">
    <div class="card-body">
        <div class="row row-cards">
            <div class="col-md-12">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" value="<?= $user['nama_user']; ?>">
            </div>
            <div class="col-md-12">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="<?= $user['email_user']; ?>">
            </div>
            <div class="col-md-12">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
                <small class="form-hint">
                    Kosongkan jika tidak ingin diubah.
                </small>
            </div>
            <div class="col-md-12">
                <label class="form-label">Level</label>
                <select name="level" class="form-control">
                    <option value="">Pilih</option>
                    <option value="kasir" <?= ($user['level_user'] == 'kasir') ? 'selected' : ''; ?>>Kasir</option>
                    <option value="gudang" <?= ($user['level_user'] == 'gudang') ? 'selected' : ''; ?>>Gudang</option>
                </select>
            </div>
        </div>
    </div>
    <div class="card-footer text-start">
        <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
    </div>
</form>

<?php

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $level = $_POST['level'];
    $id_toko = $_SESSION['user']['id_toko'];

    if (!empty($_POST['password'])) {
        $password = sha1($_POST['password']);

        $koneksi->query("UPDATE user SET 
            nama_user='$nama',
            email_user='$email',
            password_user='$password',
            level_user='$level' 
            WHERE id_user='$id_user' AND id_toko='$id_toko' ");
    } else {
        $koneksi->query("UPDATE user SET 
            nama_user='$nama',
            email_user='$email',
            level_user='$level' 
            WHERE id_user='$id_user' AND id_toko='$id_toko' ");
    }

    echo "<script>alert('Data pengguna tersimpan!')</script>";
    echo "<script>location='index.php?page=user'</script>";
}

?>