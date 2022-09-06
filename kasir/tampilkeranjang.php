<?php
include '../koneksi.php';

$keranjang = array();
$total = 0;
if (isset($_SESSION['keranjang'])) {
    foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) {
        $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
        $produk = $ambil->fetch_assoc();
        $produk['jumlah'] = $jumlah;
        $keranjang[] = $produk;
        $total += $produk['jual_produk'] * $jumlah;
    }
}

// echo "<pre>";
// print_r($keranjang);
// echo "</pre>";
?>

<?php foreach ($keranjang as $key => $perproduk) : ?>
    <div>
        <h6><?= $perproduk['nama_produk']; ?></h6>
        <span class="small text-muted"><?= number_format($perproduk['jual_produk']); ?></span>
        <p class="small">x <?= $perproduk['jumlah']; ?></p>
    </div>
    <hr>
<?php endforeach; ?>

<form action="" method="post">
    <div class="mb-3">
        <label for="">Total</label>
        <input type="number" name="total" class="form-control" value="<?= $total; ?>" readonly>
    </div>
    <div class="mb-3">
        <label for="">Bayar</label>
        <input type="number" name="bayar" class="form-control">
    </div>
    <div class="mb-3">
        <label for="">Kembalian</label>
        <input type="number" name="kembalian" class="form-control" readonly>
    </div>
    <button class="btn btn-primary btn-sm">Checkour</button>
</form>