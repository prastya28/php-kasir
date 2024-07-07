<?php
// jika ada tanggal filtering terpilih
if (isset($_POST['tglm']) and $_POST['tgls']) {
    $tglm = $_POST['tglm'];
    $tgls = $_POST['tgls'];
} else {
    $tgls = date("Y-m-d");
    $tglm = (new DateTime($tgls))->modify("-1 month")->format("Y-m-d");
}

$laporan = array();
$id_toko = $_SESSION['user']['id_toko'];

$ambil = $koneksi->query("SELECT *, SUM(jumlah_jual) as terjual FROM penjualan_produk
        LEFT JOIN produk ON penjualan_produk.id_produk=produk.id_produk
        LEFT JOIN penjualan ON penjualan_produk.id_penjualan=penjualan.id_penjualan
        WHERE penjualan_produk.id_toko='$id_toko' AND DATE(tanggal_penjualan) BETWEEN '$tglm' AND '$tgls'
        GROUP BY penjualan_produk.id_produk ");

while ($tiap = $ambil->fetch_assoc()) {
    $laporan[] = $tiap;
}

// echo "<pre>";
// print_r($laporan);
// echo "</pre>";

?>

<form action="" method="post">
    <div class="card">
        <div class="card-body">
            <div class="row row-cards">
                <div class="col-md-3">
                    <label class="form-label">Dari</label>
                    <input type="date" class="form-control" name="tglm" value="<?= $tglm; ?>">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Sampai</label>
                    <input type="date" class="form-control" name="tgls" value="<?= $tgls; ?>">
                </div>
                <div class="col-md-3">
                    <label class="form-label">&nbsp;</label>
                    <button class="btn btn-primary" name="filter">Filter</button>
                </div>
            </div>
        </div>
    </div>
</form>

<div class="card">
    <div class="table-responsive">
        <table class="table table-vcenter card-table">
            <thead>
                <tr>
                    <th class="w-1">No</th>
                    <th>Produk</th>
                    <th>Terjual</th>
                    <th>Stok</th>
                </tr>
            </thead>
            <tbody>
                <?php $total = 0;
                ?>
                <?php foreach ($laporan as $key => $value) : ?>
                    <?php $total += $value['terjual'];
                    ?>
                    <tr>
                        <td><?= $key + 1; ?></td>
                        <td><?= $value['nama_produk']; ?></td>
                        <td><?= $value['terjual']; ?></td>
                        <td><?= $value['stok_produk']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="1"></td>
                    <td colspan="1"><b>TOTAL</b></td>
                    <td><b><?= number_format($total); ?></b></td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>