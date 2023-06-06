<?php
$id_supplier = $_GET['id'];
$id_toko = $_SESSION['user']['id_toko'];

$ambil = $koneksi->query("SELECT * FROM supplier WHERE id_supplier='$id_supplier' AND id_toko='$id_toko' ");
$supplier = $ambil->fetch_assoc();

?>

<form method="post" class="card">
    <div class="card-body">
        <div class="row row-cards">
            <div class="col-md-12">
                <label class="form-label">Nama Supplier</label>
                <input type="text" class="form-control" name="nama" value="<?= $supplier['nama_supplier']; ?>">
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

    $koneksi->query("UPDATE supplier SET nama_supplier='$nama' WHERE id_supplier='$id_supplier' AND id_toko='$id_toko' ");

    echo "<script>alert('Data supplier tersimpan!')</script>";
    echo "<script>location='index.php?page=supplier'</script>";
}

?>