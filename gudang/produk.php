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

<div class="card">
    <div class="table-responsive">
        <table class="table table-vcenter card-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Beli</th>
                    <th>Jual</th>
                    <th>Stok</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($produk as $key => $value) : ?>
                    <tr>
                        <td><?= $key + 1; ?></td>
                        <td><?= $value['kode_produk']; ?></td>
                        <td><?= $value['nama_produk']; ?></td>
                        <td><?= $value['beli_produk']; ?></td>
                        <td><?= $value['jual_produk']; ?></td>
                        <td><?= $value['stok_produk']; ?></td>
                        <td>
                            <a href="">Edit</a>
                            <a href="">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>