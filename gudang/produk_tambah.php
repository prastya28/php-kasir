<?php
// Mendapatkan ID toko user yg login
$id_toko = $_SESSION['user']['id_toko'];

$supplier = array();
$ambil = $koneksi->query("SELECT * FROM supplier WHERE id_toko='$id_toko'");
while ($tiap = $ambil->fetch_assoc()) {
    $supplier[] = $tiap;
}

$kategori = array();
$ambil = $koneksi->query("SELECT * FROM kategori WHERE id_toko='$id_toko'");
while ($tiap = $ambil->fetch_assoc()) {
    $kategori[] = $tiap;
}

// echo '<pre>';
// print_r($supplier);
// echo '</pre>';
?>

<form method="post" class="card" enctype="multipart/form-data">
    <div class="card-body">
        <div class="row row-cards">
            <div class="col-md-6">
                <label class="form-label">Supplier</label>
                <select class="form-select" name="id_supplier">
                    <?php foreach ($supplier as $key => $value) : ?>
                        <option value="<?= $value['id_supplier']; ?>">
                            <?= $value['nama_supplier']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label">Kategori</label>
                <select class="form-select" name="id_kategori">
                    <?php foreach ($kategori as $key => $value) : ?>
                        <option value="<?= $value['id_kategori']; ?>">
                            <?= $value['nama_kategori']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label">Kode Produk</label>
                <input type="text" class="form-control" name="kode" placeholder="0">
            </div>
            <div class="col-md-10">
                <label class="form-label">Nama Produk</label>
                <input type="text" class="form-control" name="nama" placeholder="Nama produk">
            </div>
            <div class="col-md-5">
                <label class="form-label">Harga Beli</label>
                <input type="number" class="form-control" name="beli" placeholder="0">
            </div>
            <div class="col-md-5">
                <label class="form-label">Harga Jual</label>
                <input type="number" class="form-control" name="jual" placeholder="0">
            </div>
            <div class="col-md-2">
                <label class="form-label">Stok</label>
                <input type="number" class="form-control" name="stok" placeholder="0">
            </div>
            <div class="col-md-12">
                <label class="form-label">Foto</label>
                <input type="file" class="form-control" name="foto" placeholder="Foto produk">
            </div>
            <div class="col-md-12">
                <label class="form-label">Keterangan</label>
                <textarea rows="5" class="form-control" name="keterangan" placeholder="Keterangan..."></textarea>
            </div>
        </div>
    </div>
    <div class="card-footer text-start">
        <button type="submit" class="btn btn-primary" name="simpan">Tambah</button>
    </div>
</form>

<?php

if (isset($_POST['simpan'])) {
    $id_toko = $_SESSION['user']['id_toko'];
    $nama = $_POST['nama'];
    $id_supplier = $_POST['id_supplier'];
    $id_kategori = $_POST['id_kategori'];
    $kode = $_POST['kode'];
    $beli = $_POST['beli'];
    $jual = $_POST['jual'];
    $stok = $_POST['stok'];
    $keterangan = $_POST['keterangan'];
    $namafoto = $_FILES['foto']['name'];
    $lokasifoto = $_FILES['foto']['tmp_name'];

    if (!empty($lokasifoto)) {
        move_uploaded_file($lokasifoto, "../assets/img/produk/" . $namafoto);
        $koneksi->query("INSERT INTO produk (id_toko,id_kategori,id_supplier,nama_produk,kode_produk,beli_produk,jual_produk,stok_produk,foto_produk,keterangan_produk) VALUES ('$id_toko','$id_kategori','$id_supplier','$nama','$kode','$beli','$jual','$stok','$namafoto','$keterangan') ");
    } else {
        $koneksi->query("INSERT INTO produk (id_toko,id_kategori,id_supplier,nama_produk,kode_produk,beli_produk,jual_produk,stok_produk,keterangan_produk) VALUES ('$id_toko','$id_kategori','$id_supplier','$nama','$kode','$beli','$jual','$stok','$keterangan') ");
    }


    echo "<script>alert('Data produk berhasil ditambahkan!')</script>";
    echo "<script>location='index.php?page=produk'</script>";
}

?>