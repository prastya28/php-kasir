<form method="post" class="card">
    <div class="card-body">
        <div class="row row-cards">
            <div class="col-md-12">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" placeholder="Nama">
            </div>
            <div class="col-md-12">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" placeholder="user@mail.com">
            </div>
            <div class="col-md-12">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password" placeholder="*****">
            </div>
            <div class="col-md-12">
                <label class="form-label">Level</label>
                <select name="level" class="form-control">
                    <option value="">Pilih</option>
                    <option value="kasir">Kasir</option>
                    <option value="gudang">Gudang</option>
                </select>
            </div>
        </div>
    </div>
    <div class="card-footer text-start">
        <button type="submit" class="btn btn-primary" name="simpan">Tambah</button>
    </div>
</form>

<?php

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = sha1($_POST['password']);
    $level = $_POST['level'];
    $id_toko = $_SESSION['user']['id_toko'];

    $koneksi->query("INSERT INTO user (id_toko,nama_user,email_user,password_user,level_user) VALUES ('$id_toko','$nama','$email','$password','$level') ");

    // echo "<script>alert('Data pengguna baru tersimpan!')</script>";
    $_SESSION['status'] = "Pengguna baru berhasil ditambahkan!";
    $_SESSION['status_type'] = "success";
    echo "<script>location='index.php?page=user'</script>";
}

?>