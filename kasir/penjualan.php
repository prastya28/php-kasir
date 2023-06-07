<?php include 'header.php' ?>

<?php

// Dapatkan id_user dari kasir yang login
$id_user = $_SESSION['user']['id_user'];
$id_toko = $_SESSION['user']['id_toko'];

$penjualan = array();
$ambil = $koneksi->query("SELECT * FROM penjualan
                        LEFT JOIN pelanggan ON penjualan.id_pelanggan=pelanggan.id_pelanggan
                        WHERE penjualan.id_user='$id_user' AND penjualan.id_toko='$id_toko'");

while ($tiap = $ambil->fetch_assoc()) {
    $penjualan[] = $tiap;
}

// echo "<pre>";
// print_r($penjualan);
// echo "</pre>";

?>



<div class="page-body">
    <div class="container-xl">
        <!-- <div class="row row-cards"> -->
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
                            <th>Tanggal</th>
                            <th>Pelanggan</th>
                            <th>Total</th>
                            <th>Bayar</th>
                            <th>Kembalian</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($penjualan as $key => $value) : ?>
                            <tr>
                                <td><?= $key + 1; ?></td>
                                <td><?= date("d M Y H:s", strtotime($value['tanggal_penjualan'])); ?></td>
                                <td>
                                    <?php if ($value['id_pelanggan'] != 0) : ?>
                                        <?= $value['nama_pelanggan']; ?> (<?= $value['telepon_pelanggan']; ?>)
                                    <?php else : ?>
                                        -
                                    <?php endif; ?>
                                </td>
                                <td>Rp. <?= number_format($value['total_penjualan']); ?></td>
                                <td>Rp. <?= number_format($value['bayar_penjualan']); ?></td>
                                <td>Rp. <?= number_format($value['kembalian_penjualan']); ?></td>
                                <td>
                                    <a href="penjualan_produk.php?id=<?= $value['id_penjualan']; ?>">Detail</a> /
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal-danger" data-url="penjualan_hapus.php?id=<?= $value['id_penjualan']; ?>">Hapus</a>
                                </td>
                            </tr>

                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- </div> -->
    </div>
</div>

<!-- MODAL START -->

<div class="modal modal-blur fade" id="modal-danger" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-status bg-danger"></div>
            <div class="modal-body text-center py-4">
                <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M10.24 3.957l-8.422 14.06a1.989 1.989 0 0 0 1.7 2.983h16.845a1.989 1.989 0 0 0 1.7 -2.983l-8.423 -14.06a1.989 1.989 0 0 0 -3.4 0z"></path>
                    <path d="M12 9v4"></path>
                    <path d="M12 17h.01"></path>
                </svg>
                <h3>Apakah anda yakin?</h3>
                <div class="text-muted">Apakah anda yakin ingin menghapus data penjualan ini? Data yang sudah terhapus tidak dapat dikembalikan.</div>
            </div>
            <div class="modal-footer">
                <div class="w-100">
                    <div class="row">
                        <div class="col">
                            <a href="#" class="btn w-100" data-bs-dismiss="modal">
                                Batal
                            </a>
                        </div>
                        <div class="col">
                            <a href="#" id="hapus-data" class="btn btn-danger w-100">
                                Hapus
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL END -->

<script>
    $('#modal-danger').on('show.bs.modal', function(e) {
        var url = $(e.relatedTarget).data('url');
        $(e.currentTarget).find('#hapus-data').attr("href", url);
    })
</script>

<?php include 'footer.php' ?>