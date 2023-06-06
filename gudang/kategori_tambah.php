<form method="post" class="card">
    <div class="card-body">
        <div class="row row-cards">
            <div class="col-md-12">
                <label class="form-label">Nama Kategori</label>
                <input type="text" class="form-control" name="nama" placeholder="Nama kategori">
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
    $id_toko = $_SESSION['user']['id_toko'];

    $koneksi->query("INSERT INTO kategori (id_toko,nama_kategori) VALUES ('$id_toko','$nama') ");

    echo "<script>alert('Data kategori tersimpan!')</script>";
    echo "<script>location='index.php?page=kategori'</script>";
}

?>