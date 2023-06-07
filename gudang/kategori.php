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

<?php if (isset($_SESSION['status'])) : ?>
    <div class="alert alert-important alert-<?= $_SESSION['status_type']; ?> alert-dismissible" role="alert">
        <div class="d-flex">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M5 12l5 5l10 -10"></path>
                </svg>
            </div>
            <div>
                <?= $_SESSION['status']; ?>
                <?php unset($_SESSION['status']); ?>
                <?php unset($_SESSION['status_type']); ?>
            </div>
        </div>
        <a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
    </div>
<?php endif; ?>

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
                            <a href="index.php?page=kategori_edit&id=<?= $value['id_kategori']; ?>">Edit</a> /
                            <a href="index.php?page=kategori_hapus&id=<?= $value['id_kategori']; ?>" onclick="return confirm('Apakah anda yakin?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>