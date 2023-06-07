<?php
$id_produk = $_GET['id'];
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

$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk' AND id_toko='$id_toko' ");
$produk = $ambil->fetch_assoc();

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
                        <option value="<?= $value['id_supplier']; ?>" <?= ($value['id_supplier'] == $produk['id_supplier']) ? 'selected' : ''; ?>>
                            <?= $value['nama_supplier']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label">Kategori</label>
                <select class="form-select" name="id_kategori">
                    <?php foreach ($kategori as $key => $value) : ?>
                        <option value="<?= $value['id_kategori']; ?>" <?= ($value['id_kategori'] == $produk['id_kategori']) ? 'selected' : ''; ?>>
                            <?= $value['nama_kategori']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label">Kode Produk</label>
                <input type="text" class="form-control" name="kode" value="<?= $produk['kode_produk']; ?>">
            </div>
            <div class="col-md-10">
                <label class="form-label">Nama Produk</label>
                <input type="text" class="form-control" name="nama" value="<?= $produk['nama_produk']; ?>">
            </div>
            <div class="col-md-5">
                <label class="form-label">Harga Beli</label>
                <input type="number" class="form-control" name="beli" value="<?= $produk['beli_produk']; ?>">
            </div>
            <div class="col-md-5">
                <label class="form-label">Harga Jual</label>
                <input type="number" class="form-control" name="jual" value="<?= $produk['jual_produk']; ?>">
            </div>
            <div class="col-md-2">
                <label class="form-label">Stok</label>
                <input type="number" class="form-control" name="stok" value="<?= $produk['stok_produk']; ?>">
            </div>
            <?php if ($produk['foto_produk'] != 'default.png') : ?>
                <div class="col-auto">
                    <span class="avatar avatar-md" style="background-image: url(../assets/img/produk/<?= $produk['foto_produk']; ?>)"></span>
                </div>
            <?php else : ?>
                <div class="col-auto">
                    <span class="avatar avatar-md" style="background-image: url(../assets/img/produk/default.png)"></span>
                </div>
            <?php endif; ?>
            <div class="col-md">
                <label class="form-label">Foto</label>
                <input type="file" class="form-control" name="foto" placeholder="Foto produk">
            </div>
            <div class="col-md-12">
                <label class="form-label">Keterangan</label>
                <textarea rows="5" class="form-control" name="keterangan"><?= $produk['keterangan_produk']; ?></textarea>
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
        $koneksi->query("UPDATE produk SET 
                            id_kategori='$id_kategori',
                            id_supplier='$id_supplier',
                            nama_produk='$nama',
                            kode_produk='$kode',
                            beli_produk='$beli',
                            jual_produk='$jual',
                            stok_produk='$stok',
                            foto_produk='$namafoto',
                            keterangan_produk='$keterangan'
                            WHERE id_produk='$id_produk' AND id_toko='$id_toko' ");
    } else {
        $koneksi->query("UPDATE produk SET 
                            id_kategori='$id_kategori',
                            id_supplier='$id_supplier',
                            nama_produk='$nama',
                            kode_produk='$kode',
                            beli_produk='$beli',
                            jual_produk='$jual',
                            stok_produk='$stok',
                            keterangan_produk='$keterangan'
                            WHERE id_produk='$id_produk' AND id_toko='$id_toko' ");
    }

    // echo "<script>alert('Data produk berhasil disimpan!')</script>";
    $_SESSION['status'] = "Data produk berhasil diubah!";
    $_SESSION['status_type'] = "success";
    echo "<script>location='index.php?page=produk'</script>";
}

?>