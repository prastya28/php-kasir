<?php
// Mendapatkan ID toko user yg login
$id_toko = $_SESSION['user']['id_toko'];

$supplier = array();
$ambil = $koneksi->query("SELECT * FROM supplier WHERE id_toko='$id_toko'");
while ($tiap = $ambil->fetch_assoc()) {
    $supplier[] = $tiap;
}

// echo '<pre>';
// print_r($supplier);
// echo '</pre>';
?>

<div class="mb-3">
    <a href="index.php?page=supplier_tambah" class="btn btn-primary">Tambah</a>
</div>

<div class="card">
    <div class="table-responsive">
        <table class="table table-vcenter card-table">
            <thead>
                <tr>
                    <th class="w-1">No</th>
                    <th>Nama</th>
                    <th class="w-25"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($supplier as $key => $value) : ?>
                    <tr>
                        <td><?= $key + 1; ?></td>
                        <td><?= $value['nama_supplier']; ?></td>
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