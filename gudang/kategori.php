<?php
// Mendapatkan ID toko user yg login
$id_toko = $_SESSION['user']['id_toko'];

$kategori = array();
$ambil = $koneksi->query("SELECT * FROM kategori WHERE id_toko='$id_toko'");
while ($tiap = $ambil->fetch_assoc()) {
    $kategori[] = $tiap;
}

echo '<pre>';
print_r($kategori);
echo '</pre>';
?>

<div class="card border-0 shadow">
    <div class="card-header bg-primary text-white">Kategori</div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($kategori as $key => $value) : ?>
                    <tr>
                        <td><?= $key + 1; ?></td>
                        <td class="w-75"><?= $value['nama_kategori']; ?></td>
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