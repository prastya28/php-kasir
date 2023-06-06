<?php include "header.php" ?>
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
$id_user = $_SESSION['user']['id_user'];
$ambil = $koneksi->query("SELECT * FROM penjualan
        LEFT JOIN pelanggan ON penjualan.id_pelanggan=pelanggan.id_pelanggan
        WHERE penjualan.id_toko='$id_toko' AND id_user='$id_user' AND DATE(tanggal_penjualan) BETWEEN '$tglm' AND '$tgls' ");

while ($tiap = $ambil->fetch_assoc()) {
    $laporan[] = $tiap;
}

// echo "<pre>";
// print_r($laporan);
// echo "</pre>";

?>

<div class="page-body">
    <div class="container-xl">

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
                            <th>Tanggal</th>
                            <th>Pelanggan</th>
                            <th>Penjualan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $grandtotal = 0; ?>
                        <?php foreach ($laporan as $key => $value) : ?>
                            <?php $grandtotal += $value['total_penjualan'];  ?>
                            <tr>
                                <td><?= $key + 1; ?></td>
                                <td><?= date("d M Y H:s", strtotime($value['tanggal_penjualan'])); ?></td>
                                <td>
                                    <?php if ($value['id_pelanggan'] != 0) : ?>
                                        <?= $value['nama_pelanggan']; ?> (<?= $value['telepon_pelanggan']; ?>)
                                        <?php else : ?>-<?php endif; ?>
                                </td>
                                <td>Rp. <?= number_format($value['total_penjualan']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="1"><b>TOTAL</b></td>
                            <td><b>Rp. <?= number_format($grandtotal); ?></b></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

    </div>
</div>

<?php include "footer.php" ?>