<?php
// Mendapatkan ID toko user yg login
$id_toko = $_SESSION['user']['id_toko'];

$kategori = array();
$ambil = $koneksi->query("SELECT * FROM kategori WHERE id_toko='$id_toko'");
while ($tiap = $ambil->fetch_assoc()) {
    $kategori[] = $tiap;
}

// echo '<pre>';
// print_r($kategori);
// echo '</pre>';
?>

<div class="mb-3">
    <a href="index.php?page=kategori_tambah" class="btn btn-primary">Tambah</a>
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
                <?php foreach ($kategori as $key => $value) : ?>
                    <tr>
                        <td><?= $key + 1; ?></td>
                        <td><?= $value['nama_kategori']; ?></td>
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