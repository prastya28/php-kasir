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

<div class="pt-2 pb-2">
    <?php
    if ($keranjang) :
        foreach ($keranjang as $key => $perproduk) : ?>
            <h3><?= $perproduk['nama_produk']; ?></h3>
            <div class="row mb-3">
                <div class="col">
                    <span class="text-muted">Rp. <?= number_format($perproduk['jual_produk']); ?></span>
                </div>
                <div class="col-auto">
                    <a href="#" class="link-muted kurangi" idnya="<?= $perproduk['id_produk']; ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-minus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <circle cx="12" cy="12" r="9"></circle>
                            <line x1="9" y1="12" x2="15" y2="12"></line>
                        </svg>
                    </a>
                </div>
                <div class="col-auto">
                    x<?= $perproduk['jumlah']; ?>
                </div>
                <div class="col-auto">
                    <a href="#" class="link-muted tambahi" idnya="<?= $perproduk['id_produk']; ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <circle cx="12" cy="12" r="9"></circle>
                            <line x1="9" y1="12" x2="15" y2="12"></line>
                            <line x1="12" y1="9" x2="12" y2="15"></line>
                        </svg>
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <i class="text-muted">Keranjang kosong!</i>
    <?php endif; ?>
</div>

<div class="mt-3 mb-2">
    <form action="checkout.php" method="post">
        <div class="mb-3">
            <label for="" class="form-label">Total</label>
            <input type="number" name="total" class="form-control total" value="<?= $total; ?>" readonly>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Bayar</label>
            <input type="number" name="bayar" class="form-control bayar" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Kembalian</label>
            <input type="number" name="kembalian" class="form-control kembalian" readonly>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Telepon</label>
            <input type="text" name="telepon" class="form-control" placeholder="62">
        </div>
        <button class="btn btn-primary w-100">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-cash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <rect x="7" y="9" width="14" height="10" rx="2"></rect>
                <circle cx="14" cy="14" r="2"></circle>
                <path d="M17 9v-2a2 2 0 0 0 -2 -2h-10a2 2 0 0 0 -2 2v6a2 2 0 0 0 2 2h2"></path>
            </svg>
            Beli
        </button>
    </form>
</div>