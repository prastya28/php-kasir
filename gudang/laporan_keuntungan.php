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

$period = new DatePeriod(new DateTime($tglm), new DateInterval('P1D'), new DateTime($tgls));

foreach ($period as $date) {
    $pertanggal = array();
    $tanggal = $date->format('Y-m-d');
    $keuntungantanggal = 0;
    $transaksitanggal = 0;
    $ambil = $koneksi->query("SELECT * FROM penjualan_produk
            LEFT JOIN penjualan ON penjualan_produk.id_penjualan=penjualan.id_penjualan
            WHERE penjualan.id_toko='$id_toko' AND DATE(tanggal_penjualan)='$tanggal' ");

    while ($tiap = $ambil->fetch_assoc()) {
        $transaksitanggal += $tiap['harga_jual'];
        $keuntungantanggal += ($tiap['harga_jual'] - $tiap['harga_beli']) * $tiap['jumlah_jual'];
    }

    $pertanggal['tanggal'] = $tanggal;
    $pertanggal['keuntungan'] = $keuntungantanggal;
    $pertanggal['transaksi'] = $transaksitanggal;
    $laporan[] = $pertanggal;
}


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
                    <th>Tanggal</th>
                    <th>Transaksi</th>
                    <th>Keuntungan</th>
                </tr>
            </thead>
            <tbody>
                <?php $totaltransaksi = 0; ?>
                <?php $totalkeuntungan = 0; ?>
                <?php foreach ($laporan as $key => $value) : ?>
                    <?php $totalkeuntungan += $value['keuntungan']; ?>
                    <?php $totaltransaksi += $value['transaksi']; ?>
                    <tr>
                        <td><?= $key + 1; ?></td>
                        <td><?= date("d M Y", strtotime($value['tanggal'])); ?></td>
                        <td>Rp. <?= number_format($value['transaksi']); ?></td>
                        <td>Rp. <?= number_format($value['keuntungan']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2"><b>TOTAL</b></td>
                    <td><b>Rp. <?= number_format($totaltransaksi); ?></b></td>
                    <td><b>Rp. <?= number_format($totalkeuntungan); ?></b></td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>