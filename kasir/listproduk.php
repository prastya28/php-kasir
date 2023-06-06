<?php
include '../koneksi.php';

// Dapatkan ID toko dari user yg login
$id_toko = $_SESSION['user']['id_toko'];

// Dapatkan produk dari id toko ini
$produk = array();

$produk = array();
$ambil = $koneksi->query("SELECT * FROM produk 
                            LEFT JOIN kategori ON produk.id_kategori=kategori.id_kategori
                                WHERE produk.id_toko='$id_toko' ORDER BY id_produk DESC LIMIT 20");
while ($tiap = $ambil->fetch_assoc()) {
    $produk[] = $tiap;
}

// echo '<pre>';
// print_r($produk);
// echo '</pre>';

// echo '<pre>';
// print_r($_SESSION['keranjang']);
// echo '</pre>';


?>

<div class="row row-cards row-deck">
    <?php foreach ($produk as $key => $value) : ?>

        <?php

        $gambar = $value['foto_produk'];

        ?>

        <div class="col-3">
            <div class="card">
                <?php
                if ($value['stok_produk'] < 5) :
                ?>
                    <div class="ribbon bg-red">Stok menipis</div>
                <?php endif; ?>
                <div class="card-body p-4 text-center">
                    <img src="../assets/img/produk/<?= $gambar; ?>" alt="" class="avatar avatar-xl mb-3 avatar-rounded img-fluid">

                    <h3 class="m-0 mb-1"><?= $value['nama_produk']; ?></h3>
                    <div class="text-muted"><span class="badge bg-primary-lt"><?= $value['nama_kategori']; ?></span> / Stok: <?= $value['stok_produk']; ?></div>
                    <div class="mt-3">
                        <h3>
                            <span class="badge bg-green-lt">Rp. <?= number_format($value['jual_produk']); ?></span>
                        </h3>
                    </div>
                </div>
                <div class="d-flex">
                    <a href="#" class="card-btn link-produk" idnya="<?= $value['id_produk']; ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <circle cx="6" cy="19" r="2"></circle>
                            <circle cx="17" cy="19" r="2"></circle>
                            <path d="M17 17h-11v-14h-2"></path>
                            <path d="M6 5l6.005 .429m7.138 6.573l-.143 .998h-13"></path>
                            <path d="M15 6h6m-3 -3v6"></path>
                        </svg>&nbsp;Tambah
                    </a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>