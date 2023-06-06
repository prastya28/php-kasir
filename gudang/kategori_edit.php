<?php
$id_kategori = $_GET['id'];
$id_toko = $_SESSION['user']['id_toko'];

$ambil = $koneksi->query("SELECT * FROM kategori WHERE id_kategori='$id_kategori' AND id_toko='$id_toko' ");
$kategori = $ambil->fetch_assoc();

?>

<form method="post" class="card">
    <div class="card-body">
        <div class="row row-cards">
            <div class="col-md-12">
                <label class="form-label">Nama Kategori</label>
                <input type="text" class="form-control" name="nama" value="<?= $kategori['nama_kategori']; ?>">
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
    $id_toko = $_SESSION['user']['id_toko'];

    $koneksi->query("UPDATE kategori SET nama_kategori='$nama' WHERE id_kategori='$id_kategori' AND id_toko='$id_toko' ");

    echo "<script>alert('Data kategori tersimpan!')</script>";
    echo "<script>location='index.php?page=kategori'</script>";
}

?>