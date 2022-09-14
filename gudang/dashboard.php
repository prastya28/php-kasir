<?php
// Mendapatkan ID toko user yg login
$id_toko = $_SESSION['user']['id_toko'];

$ambil_staff = $koneksi->query("SELECT count(1) FROM user WHERE id_toko='$id_toko'");
$total_staff = mysqli_fetch_array($ambil_staff);

$ambil_produk = $koneksi->query("SELECT count(1) FROM produk WHERE id_toko='$id_toko'");
$total_produk = mysqli_fetch_array($ambil_produk);

$ambil_kategori = $koneksi->query("SELECT count(1) FROM kategori WHERE id_toko='$id_toko'");
$total_kategori = mysqli_fetch_array($ambil_kategori);

$ambil_supplier = $koneksi->query("SELECT count(1) FROM supplier WHERE id_toko='$id_toko'");
$total_supplier = mysqli_fetch_array($ambil_supplier);

$ambil_toko = $koneksi->query("SELECT count(1) FROM toko");
$total_toko = mysqli_fetch_array($ambil_toko);

$ambil_stok_rendah = $koneksi->query("SELECT count(1) FROM produk WHERE stok_produk<'10' AND id_toko='$id_toko'");
$total_stok_rendah = mysqli_fetch_array($ambil_stok_rendah);

$ambil_penjualan = $koneksi->query("SELECT count(1) FROM penjualan WHERE id_toko='$id_toko'");
$total_penjualan = mysqli_fetch_array($ambil_penjualan);

$ambil_pelanggan = $koneksi->query("SELECT count(1) FROM pelanggan WHERE id_toko='$id_toko'");
$total_pelanggan = mysqli_fetch_array($ambil_pelanggan);

$ambil_jumlah_penjualan = $koneksi->query("SELECT sum(total_penjualan) AS semua_penjualan FROM penjualan WHERE id_toko='$id_toko'");
$total_jumlah_penjualan = mysqli_fetch_assoc($ambil_jumlah_penjualan);

// echo '<pre>';
// print_r($total_produk[0]);
// echo '</pre>';

?>

<div class="card">
    <div class="row row-0">
        <div class="col-3">
            <img src="https://placekitten.com/200/200" class="w-100 h-100 object-cover" alt="Card side image">
        </div>
        <div class="col">
            <div class="card-body">
                <h3 class="card-title">Selamat datang, <?= $_SESSION['user']['nama_user']; ?>!</h3>
                <p class="text-muted">Kelola data produk dan transaksi penjualan melalui panel ini.</p>
            </div>
        </div>
    </div>
</div>
<div class="row row-cards mt-1">
    <div class="col-sm-6 col-lg-3">
        <div class="card card-sm">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <span class="bg-blue text-white avatar">
                            <!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-basket" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <polyline points="7 10 12 4 17 10"></polyline>
                                <path d="M21 10l-2 8a2 2.5 0 0 1 -2 2h-10a2 2.5 0 0 1 -2 -2l-2 -8z"></path>
                                <circle cx="12" cy="15" r="2"></circle>
                            </svg>
                        </span>
                    </div>
                    <div class="col">
                        <div class="font-weight-medium">
                            <?= $total_produk[0]; ?> Products
                        </div>
                        <div class="text-muted">
                            in <?= $total_kategori[0]; ?> categories
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="card card-sm">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <span class="bg-green text-white avatar">
                            <!-- Download SVG icon from http://tabler-icons.io/i/shopping-cart -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-building-store" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <line x1="3" y1="21" x2="21" y2="21"></line>
                                <path d="M3 7v1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1h-18l2 -4h14l2 4"></path>
                                <line x1="5" y1="21" x2="5" y2="10.85"></line>
                                <line x1="19" y1="21" x2="19" y2="10.85"></line>
                                <path d="M9 21v-4a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v4"></path>
                            </svg>
                        </span>
                    </div>
                    <div class="col">
                        <div class="font-weight-medium">
                            <?= $total_toko[0]; ?> Stores
                        </div>
                        <div class="text-muted">
                            with <?= $total_supplier[0]; ?> suppliers
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="card card-sm">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <span class="bg-twitter text-white avatar">
                            <!-- Download SVG icon from http://tabler-icons.io/i/brand-twitter -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users" width="32" height="32" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
                            </svg>
                        </span>
                    </div>
                    <div class="col">
                        <div class="font-weight-medium">
                            <?= $total_staff[0]; ?> Staff
                        </div>
                        <div class="text-muted">
                            and <?= $total_pelanggan[0]; ?> registered customers
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="card card-sm">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <span class="bg-facebook text-white avatar">
                            <!-- Download SVG icon from http://tabler-icons.io/i/brand-facebook -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-report-money" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2"></path>
                                <rect x="9" y="3" width="6" height="4" rx="2"></rect>
                                <path d="M14 11h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5"></path>
                                <path d="M12 17v1m0 -8v1"></path>
                            </svg>
                        </span>
                    </div>
                    <div class="col">
                        <div class="font-weight-medium">
                            <?= $total_penjualan[0]; ?> Sales
                        </div>
                        <div class="text-muted">
                            Rp. <?= number_format($total_jumlah_penjualan['semua_penjualan']); ?> total incomes
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>