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
                            <a href="index.php?page=produk_edit&id=<?= $value['id_produk']; ?>">Edit</a>
                            <a href="index.php?page=produk_hapus&id=<?= $value['id_produk']; ?>">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>