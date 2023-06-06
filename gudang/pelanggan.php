<?php
// Mendapatkan ID toko user yg login
$id_toko = $_SESSION['user']['id_toko'];

$pelanggan = array();
$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE id_toko='$id_toko'");
while ($tiap = $ambil->fetch_assoc()) {
    $pelanggan[] = $tiap;
}

// echo '<pre>';
// print_r($pelanggan);
// echo '</pre>';
?>


<div class="card">
    <div class="table-responsive">
        <table class="table table-vcenter card-table">
            <thead>
                <tr>
                    <th class="w-1">No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Alamat</th>
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
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>