<?php
// Mendapatkan ID toko user yg login
$id_toko = $_SESSION['user']['id_toko'];

$penjualan = array();
$ambil = $koneksi->query("SELECT * FROM penjualan 
                            LEFT JOIN pelanggan ON penjualan.id_pelanggan=pelanggan.id_pelanggan
                                WHERE penjualan.id_toko='$id_toko'");
while ($tiap = $ambil->fetch_assoc()) {
    $penjualan[] = $tiap;
}

echo '<pre>';
print_r($penjualan);
echo '</pre>';
?>

<div class="card border-0 shadow">
    <div class="card-header bg-primary text-white">penjualan</div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Pelanggan</th>
                    <th>Total</th>
                    <th>Bayar</th>
                    <th>Kembalian</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($penjualan as $key => $value) : ?>
                    <tr>
                        <td><?= $key + 1; ?></td>
                        <td><?= date("d M Y H:s", strtotime($value['tanggal_penjualan'])); ?></td>
                        <td><?= $value['nama_pelanggan']; ?> (<?= $value['telepon_pelanggan']; ?>)</td>
                        <td><?= number_format($value['total_penjualan']); ?></td>
                        <td><?= number_format($value['bayar_penjualan']); ?></td>
                        <td><?= number_format($value['kembalian_penjualan']); ?></td>
                        <td>
                            <a href="index.php?page=penjualan_produk&id=<?= $value['id_penjualan']; ?>">Detail</a>
                            <a href="">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>