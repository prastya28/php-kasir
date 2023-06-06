<?php include '../koneksi.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Penjualan</title>

    <!-- CSS files -->
    <link href="../assets/css/tabler.min.css" rel="stylesheet" />

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
</head>

<body>

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
            <div class="row row-cards">
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
                                    <?php if ($penjualan['id_pelanggan'] != 0) : ?><?= $penjualan['nama_pelanggan']; ?> (<?= $penjualan['telepon_pelanggan']; ?>)<?php else : ?>-<?php endif; ?>
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
    </div>

</body>

</html>