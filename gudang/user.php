<?php
// Mendapatkan ID toko user yg login
$id_toko = $_SESSION['user']['id_toko'];

$user = array();
$ambil = $koneksi->query("SELECT * FROM user WHERE id_toko='$id_toko'");
while ($tiap = $ambil->fetch_assoc()) {
    $user[] = $tiap;
}

// echo '<pre>';
// print_r($user);
// echo '</pre>';
?>

<div class="mb-3">
    <a href="index.php?page=user_tambah" class="btn btn-primary">Tambah</a>
</div>

<div class="card">
    <div class="table-responsive">
        <table class="table table-vcenter card-table">
            <thead>
                <tr>
                    <th class="w-1">No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Level</th>
                    <th class="w-25"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($user as $key => $value) : ?>
                    <tr>
                        <td><?= $key + 1; ?></td>
                        <td><?= $value['nama_user']; ?></td>
                        <td><?= $value['email_user']; ?></td>
                        <td><?= $value['level_user']; ?></td>
                        <td>
                            <a href="index.php?page=user_edit&id=<?= $value['id_user']; ?>">Edit</a>
                            <a href="index.php?page=user_hapus&id=<?= $value['id_user']; ?>" onclick="return confirm('Apakah anda yakin?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>