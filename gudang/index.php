<?php
include '../koneksi.php';

// Jika blm login/tidak ada session user
if (!isset($_SESSION['user'])) {
    echo "<script>alert('Anda harus login!')</script>";
    echo "<script>location='../index.php'</script>";
    exit();
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Dashboard</title>

    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">

</head>

<body>

    <header class="navbar navbar-dark sticky-top bg-primary flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">xToko</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3 text-white" href="index.php?page=logout">Logout</a>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse shadow">
                <div class="mt-4 text-center">
                    <h6>
                        <?php echo $_SESSION['user']['nama_user']; ?>
                    </h6>
                </div>
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=supplier">
                                Supplier
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=kategori">
                                Kategori
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=produk">
                                Produk
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=pelanggan">
                                Pelanggan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=penjualan">
                                Penjualan
                            </a>
                        </li>
                    </ul>

                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>LAPORAN</span>
                        <a class="link-secondary" href="#" aria-label="Add a new report">
                            <span data-feather="plus-circle"></span>
                        </a>
                    </h6>
                    <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=laporan_penjualan">
                                Laporan Penjualan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=laporan_keuntungan">
                                Laporan Keuntungan
                            </a>
                        </li>

                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 min-vh-100 pt-3">
                <?php
                if (!isset($_GET['page'])) {
                    include 'dashboard.php';
                } else {
                    if ($_GET['page'] == 'supplier') {
                        include 'supplier.php';
                    } else if ($_GET['page'] == 'kategori') {
                        include 'kategori.php';
                    } else if ($_GET['page'] == 'produk') {
                        include 'produk.php';
                    } else if ($_GET['page'] == 'pelanggan') {
                        include 'pelanggan.php';
                    } else if ($_GET['page'] == 'penjualan') {
                        include 'penjualan.php';
                    } else if ($_GET['page'] == 'penjualan_produk') {
                        include 'penjualan_produk.php';
                    } else if ($_GET['page'] == 'logout') {
                        include 'logout.php';
                    }
                }
                ?>
            </main>
        </div>
    </div>


    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>