<?php
// Mendapatkan ID toko user yg login
$id_toko = $_SESSION['user']['id_toko'];

$produk = array();
$ambil = $koneksi->query("SELECT * FROM produk WHERE id_toko='$id_toko'");
while ($tiap = $ambil->fetch_assoc()) {
    $produk[] = $tiap;
}

// echo '<pre>';
// print_r($produk);
// echo '</pre>';
?>

<div class="mb-3">
    <a href="index.php?page=produk_tambah" class="btn btn-primary">Tambah</a>
</div>

<?php if (isset($_SESSION['status'])) : ?>
    <div class="alert alert-important alert-<?= $_SESSION['status_type']; ?> alert-dismissible" role="alert">
        <div class="d-flex">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M5 12l5 5l10 -10"></path>
                </svg>
            </div>
            <div>
                <?= $_SESSION['status']; ?>
                <?php unset($_SESSION['status']); ?>
                <?php unset($_SESSION['status_type']); ?>
            </div>
        </div>
        <a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
    </div>
<?php endif; ?>

<div class="card">
    <div class="table-responsive">
        <table class="table table-vcenter card-table">
            <thead>
                <tr>
                    <th class="w-1">No</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Beli</th>
                    <th>Jual</th>
                    <th>Stok</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($produk as $key => $value) : ?>
                    <tr>
                        <td><?= $key + 1; ?></td>
                        <td><?= $value['kode_produk']; ?></td>
                        <td><?= $value['nama_produk']; ?></td>
                        <td>Rp. <?= number_format($value['beli_produk']); ?></td>
                        <td>Rp. <?= number_format($value['jual_produk']); ?></td>
                        <td><?= $value['stok_produk']; ?></td>
                        <td>
                            <a href="index.php?page=produk_edit&id=<?= $value['id_produk']; ?>">Edit</a> /
                            <a href="index.php?page=produk_hapus&id=<?= $value['id_produk']; ?>" onclick="return confirm('Apakah anda yakin?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>