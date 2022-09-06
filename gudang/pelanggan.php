<?php
// Mendapatkan ID toko user yg login
$id_toko = $_SESSION['user']['id_toko'];

$pelanggan = array();
$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE id_toko='$id_toko'");
while ($tiap = $ambil->fetch_assoc()) {
    $pelanggan[] = $tiap;
}

echo '<pre>';
print_r($pelanggan);
echo '</pre>';
?>

<div class="card border-0 shadow">
    <div class="card-header bg-primary text-white">Pelanggan</div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Alamat</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pelanggan as $key => $value) : ?>
                    <tr>
                        <td><?= $key + 1; ?></td>
                        <td><?= $value['nama_pelanggan']; ?></td>
                        <td><?= $value['email_pelanggan']; ?></td>
                        <td><?= $value['telepon_pelanggan']; ?></td>
                        <td><?= $value['alamat_pelanggan']; ?></td>
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