<?php include "header.php"; ?>

<?php
// Mendapatkan ID toko user yg login
$id_toko = $_SESSION['user']['id_toko'];

// Mendapatkan ID penjualan dari URL yg didetailkan
$id_penjualan = $_GET['id'];

// Ambil data penjualan menggunakan ID yg didapat
$ambil = $koneksi->query("SELECT * FROM penjualan 
                            LEFT JOIN pelanggan ON penjualan.id_pelanggan=pelanggan.id_pelanggan
                                WHERE penjualan.id_penjualan='$id_penjualan' AND penjualan.id_toko='$id_toko'");
$penjualan = $ambil->fetch_assoc();

$produk = array();
$ambil = $koneksi->query("SELECT * FROM penjualan_produk WHERE id_penjualan='$id_penjualan' AND id_toko='$id_toko'");
while ($tiap = $ambil->fetch_assoc()) {
    $produk[] = $tiap;
}

// echo "<pre>";
// print_r($penjualan);
// print_r($produk);
// echo "</pre>";
?>


<div class="page-body">
    <div class="container-xl">

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
            <div class="card-header">
                <h3 class="card-title">Detail Penjualan</h3>
            </div>
            <div class="card-body">
                <div class="datagrid">
                    <div class="datagrid-item">
                        <div class="datagrid-title">ID Penjualan</div>
                        <div class="datagrid-content"><?= $penjualan['id_penjualan']; ?></div>
                    </div>
                    <div class="datagrid-item">
                        <div class="datagrid-title">Tanggal</div>
                        <div class="datagrid-content"><?= $penjualan['tanggal_penjualan']; ?></div>
                    </div>
                    <div class="datagrid-item">
                        <div class="datagrid-title">Pelanggan</div>
                        <div class="datagrid-content">
                            <?php if ($penjualan['id_pelanggan'] != 0) : ?>
                                <?= $penjualan['nama_pelanggan']; ?> (<?= $penjualan['telepon_pelanggan']; ?>)
                                <?php else : ?>-<?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <h3 class="card-title">Detail Produk</h3>
            </div>
            <div class="table-responsive">
                <table class="table table-vcenter card-table">
                    <thead>
                        <tr>
                            <th class="w-1">No</th>
                            <th>Produk</th>
                            <th>Harga Beli</th>
                            <th>Harga Jual</th>
                            <th>QTY</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $keuntungan = 0; ?>
                        <?php foreach ($produk as $key => $value) : ?>
                            <?php $keuntungan += ($value['harga_jual'] - $value['harga_beli']) * $value['jumlah_jual']; ?>
                            <tr>
                                <td><?= $key + 1; ?></td>
                                <td><?= $value['nama_jual']; ?></td>
                                <td>Rp. <?= number_format($value['harga_beli']); ?></td>
                                <td>Rp. <?= number_format($value['harga_jual']); ?></td>
                                <td><?= $value['jumlah_jual']; ?></td>
                                <td>Rp. <?= number_format($value['subtotal_jual']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4"></td>
                            <td colspan="1">Total</td>
                            <td>Rp. <?= number_format($penjualan['total_penjualan']); ?></td>
                        </tr>
                        <tr>
                            <td colspan="4"></td>
                            <td colspan="1">Bayar</td>
                            <td>Rp. <?= number_format($penjualan['bayar_penjualan']); ?></td>
                        </tr>
                        <tr>
                            <td colspan="4"></td>
                            <td colspan="1">Kembalian</td>
                            <td>Rp. <?= number_format($penjualan['kembalian_penjualan']); ?></td>
                        </tr>
                        <tr>
                            <td colspan="4"></td>
                            <td colspan="1">Keuntungan</td>
                            <td>Rp. <?= number_format($keuntungan) ?></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>