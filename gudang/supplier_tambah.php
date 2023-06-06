<form method="post" class="card">
    <div class="card-body">
        <div class="row row-cards">
            <div class="col-md-12">
                <label class="form-label">Nama Supplier</label>
                <input type="text" class="form-control" name="nama" placeholder="Nama supplier">
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

    $koneksi->query("INSERT INTO supplier (id_toko,nama_supplier) VALUES ('$id_toko','$nama') ");

    echo "<script>alert('Data supplier tersimpan!')</script>";
    echo "<script>location='index.php?page=supplier'</script>";
}

?>