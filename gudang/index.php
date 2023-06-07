<?php
include '../koneksi.php';

// Jika blm login/tidak ada session user
if (!isset($_SESSION['user'])) {
    echo "<script>alert('Anda harus login!')</script>";
    echo "<script>location='../index.php'</script>";
    exit();
}

if (isset($_GET['page'])) {
    $skrg = $_GET['page'];
} else {
    $skrg = "dashboard";
}

if ($skrg == "dashboard") {
    $subjudul = "Beranda";
} else if ($skrg == 'supplier') {
    $subjudul = "Supplier";
} else if ($skrg == 'kategori') {
    $subjudul = "Kategori";
} else if ($skrg == 'produk') {
    $subjudul = "Produk";
} else if ($skrg == 'pelanggan') {
    $subjudul = "Data Pelanggan";
} else if ($skrg == 'penjualan') {
    $subjudul = "Data Penjualan";
} else if ($skrg == 'penjualan_produk') {
    $subjudul = "Penjualan";
} else if ($skrg == 'supplier_tambah') {
    $subjudul = "Tambah Supplier";
} else if ($skrg == 'supplier_edit') {
    $subjudul = "Ubah Supplier";
} else if ($skrg == 'kategori_tambah') {
    $subjudul = "Tambah Kategori";
} else if ($skrg == 'kategori_edit') {
    $subjudul = "Ubah Kategori";
} else if ($skrg == 'produk_tambah') {
    $subjudul = "Tambah Produk";
} else if ($skrg == 'produk_edit') {
    $subjudul = "Ubah Produk";
} else if ($skrg == 'laporan_penjualan') {
    $subjudul = "Laporan Penjualan";
} else if ($skrg == 'laporan_keuntungan') {
    $subjudul = "Laporan Keuntungan";
} else if ($skrg == 'user') {
    $subjudul = "Pengguna";
} else if ($skrg == 'user_tambah') {
    $subjudul = "Tambah Pengguna";
} else if ($skrg == 'user_edit') {
    $subjudul = "Ubah Data Pengguna";
} else {
    $subjudul = "404";
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="shortcut icon" href="../assets/img/building-store.png" type="image/x-icon">
    <title><?= $subjudul; ?> / Gudang</title>
    <!-- CSS files -->
    <link href="../assets/css/tabler.min.css" rel="stylesheet" />
</head>

<body>

    <div class="page">
        <aside class="navbar navbar-vertical navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <h1 class="navbar-brand navbar-brand-autodark">
                    <a href="index.php" class="text-decoration-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-building-store" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <line x1="3" y1="21" x2="21" y2="21"></line>
                            <path d="M3 7v1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1h-18l2 -4h14l2 4"></path>
                            <line x1="5" y1="21" x2="5" y2="10.85"></line>
                            <line x1="19" y1="21" x2="19" y2="10.85"></line>
                            <path d="M9 21v-4a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v4"></path>
                        </svg> GUDANG
                    </a>
                </h1>
                <div class="navbar-nav flex-row d-lg-none">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                            <span class="avatar avatar-sm" style="background-image: url(https://placekitten.com/200/300)"></span>
                            <div class="d-none d-xl-block ps-2">
                                <div>
                                    <?= $_SESSION['user']['nama_user']; ?>
                                </div>
                                <div class="mt-1 small text-muted">
                                    <?= $_SESSION['user']['level_user']; ?>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <a href="#" class="dropdown-item">Set status</a>
                            <a href="#" class="dropdown-item">Profile & account</a>
                            <a href="#" class="dropdown-item">Feedback</a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">Settings</a>
                            <a href="index.php?page=logout" class="dropdown-item">Logout</a>
                        </div>
                    </div>
                </div>

                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="navbar-nav pt-lg-3">
                        <li class="nav-item">
                            <span class="nav-link">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                </span>
                                <span class="nav-link-title text-muted">
                                    <strong>DASHBOARD</strong>
                                </span>
                            </span>
                        </li>
                        <li class="nav-item <?= ($skrg == 'dashboard') ? 'active' : ''; ?>">
                            <a class="nav-link" href="index.php">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <polyline points="5 12 3 12 12 3 21 12 19 12" />
                                        <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                        <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    Beranda
                                </span>
                            </a>
                        </li>
                        <li class="nav-item <?= ($skrg == 'supplier') ? 'active' : ''; ?>">
                            <a class="nav-link" href="index.php?page=supplier">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/checkbox -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-building-store" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <line x1="3" y1="21" x2="21" y2="21"></line>
                                        <path d="M3 7v1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1h-18l2 -4h14l2 4"></path>
                                        <line x1="5" y1="21" x2="5" y2="10.85"></line>
                                        <line x1="19" y1="21" x2="19" y2="10.85"></line>
                                        <path d="M9 21v-4a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v4"></path>
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    Supplier
                                </span>
                            </a>
                        </li>
                        <li class="nav-item <?= ($skrg == 'kategori') ? 'active' : ''; ?>">
                            <a class="nav-link" href="index.php?page=kategori">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/checkbox -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-category" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M4 4h6v6h-6z"></path>
                                        <path d="M14 4h6v6h-6z"></path>
                                        <path d="M4 14h6v6h-6z"></path>
                                        <circle cx="17" cy="17" r="3"></circle>
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    Kategori
                                </span>
                            </a>
                        </li>
                        <li class="nav-item <?= ($skrg == 'produk') ? 'active' : ''; ?>">
                            <a class="nav-link" href="index.php?page=produk">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/checkbox -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-basket" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <polyline points="7 10 12 4 17 10"></polyline>
                                        <path d="M21 10l-2 8a2 2.5 0 0 1 -2 2h-10a2 2.5 0 0 1 -2 -2l-2 -8z"></path>
                                        <circle cx="12" cy="15" r="2"></circle>
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    Produk
                                </span>
                            </a>
                        </li>
                        <li class="nav-item <?= ($skrg == 'pelanggan') ? 'active' : ''; ?>">
                            <a class="nav-link" href="index.php?page=pelanggan">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/checkbox -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <circle cx="9" cy="7" r="4"></circle>
                                        <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                        <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    Pelanggan
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <span class="nav-link">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                </span>
                                <span class="nav-link-title text-muted">
                                    <strong>Transaksi</strong>
                                </span>
                            </span>
                        </li>
                        <li class="nav-item <?= ($skrg == 'penjualan' or $skrg == 'penjualan_produk') ? 'active' : ''; ?>">
                            <a class="nav-link" href="index.php?page=penjualan">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/checkbox -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-report-money" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2"></path>
                                        <rect x="9" y="3" width="6" height="4" rx="2"></rect>
                                        <path d="M14 11h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5"></path>
                                        <path d="M12 17v1m0 -8v1"></path>
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    Data Penjualan
                                </span>
                            </a>
                        </li>
                        <li class="nav-item <?= ($skrg == 'laporan_penjualan' or $skrg == 'laporan_keuntungan') ? 'active' : ''; ?> dropdown">
                            <a class="nav-link dropdown-toggle" href="#navbar-extra" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="false">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-report" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M8 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h5.697"></path>
                                        <path d="M18 14v4h4"></path>
                                        <path d="M18 11v-4a2 2 0 0 0 -2 -2h-2"></path>
                                        <rect x="8" y="3" width="6" height="4" rx="2"></rect>
                                        <circle cx="18" cy="18" r="4"></circle>
                                        <path d="M8 11h4"></path>
                                        <path d="M8 15h3"></path>
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    Laporan
                                </span>
                            </a>
                            <div class="dropdown-menu <?= ($skrg == 'laporan_penjualan' or $skrg == 'laporan_keuntungan') ? 'show' : ''; ?>">
                                <div class="dropdown-menu-columns">
                                    <div class="dropdown-menu-column">
                                        <a class="dropdown-item <?= ($skrg == 'laporan_penjualan') ? 'active' : ''; ?>" href="index.php?page=laporan_penjualan">
                                            Laporan Penjualan
                                        </a>
                                        <a class="dropdown-item <?= ($skrg == 'laporan_keuntungan') ? 'active' : ''; ?>" href="index.php?page=laporan_keuntungan">
                                            Laporan Keuntungan
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </aside>
        <header class="navbar navbar-expand-md navbar-light d-none d-lg-flex d-print-none">
            <div class="container-xl">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-nav flex-row order-md-last">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                            <span class="avatar avatar-sm" style="background-image: url(https://placekitten.com/200/300)"></span>
                            <div class="d-none d-xl-block ps-2">
                                <div>
                                    <?php echo $_SESSION['user']['nama_user']; ?>
                                </div>
                                <div class="mt-1 small text-muted">
                                    <?php echo $_SESSION['user']['level_user']; ?>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <a href="index.php?page=user" class="dropdown-item <?= ($skrg == 'user') ? 'active' : ''; ?>">Pengguna</a>
                            <div class="dropdown-divider"></div>
                            <a href="index.php?page=logout" class="dropdown-item">Logout</a>
                        </div>
                    </div>
                </div>
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <div>
                        <!-- <form action="." method="get">
                            <div class="input-icon">
                                <span class="input-icon-addon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <circle cx="10" cy="10" r="7" />
                                        <line x1="21" y1="21" x2="15" y2="15" />
                                    </svg>
                                </span>
                                <input type="text" value="" class="form-control" placeholder="Search…" aria-label="Search in website">
                            </div>
                        </form> -->
                    </div>
                </div>
            </div>
        </header>
        <div class="page-wrapper">
            <div class="container-xl">
                <!-- Page title -->
                <div class="page-header d-print-none">
                    <div class="row g-2 align-items-center">
                        <div class="col">
                            <!-- Page pre-title -->
                            <div class="page-pretitle">
                                Halaman
                            </div>
                            <h2 class="page-title">
                                <?= $subjudul; ?>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-body">
                <div class="container-xl">
                    <main>
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
                            } else if ($_GET['page'] == 'supplier_tambah') {
                                include 'supplier_tambah.php';
                            } else if ($_GET['page'] == 'supplier_edit') {
                                include 'supplier_edit.php';
                            } else if ($_GET['page'] == 'supplier_hapus') {
                                include 'supplier_hapus.php';
                            } else if ($_GET['page'] == 'kategori_tambah') {
                                include 'kategori_tambah.php';
                            } else if ($_GET['page'] == 'kategori_edit') {
                                include 'kategori_edit.php';
                            } else if ($_GET['page'] == 'kategori_hapus') {
                                include 'kategori_hapus.php';
                            } else if ($_GET['page'] == 'produk_tambah') {
                                include 'produk_tambah.php';
                            } else if ($_GET['page'] == 'produk_edit') {
                                include 'produk_edit.php';
                            } else if ($_GET['page'] == 'produk_hapus') {
                                include 'produk_hapus.php';
                            } else if ($_GET['page'] == 'laporan_penjualan') {
                                include 'laporan_penjualan.php';
                            } else if ($_GET['page'] == 'laporan_keuntungan') {
                                include 'laporan_keuntungan.php';
                            } else if ($_GET['page'] == 'user') {
                                include 'user.php';
                            } else if ($_GET['page'] == 'user_tambah') {
                                include 'user_tambah.php';
                            } else if ($_GET['page'] == 'user_edit') {
                                include 'user_edit.php';
                            } else if ($_GET['page'] == 'user_hapus') {
                                include 'user_hapus.php';
                            } else if ($_GET['page'] == 'logout') {
                                include 'logout.php';
                            }
                        }
                        ?>
                    </main>
                </div>
            </div>
            <footer class="footer footer-transparent d-print-none">
                <div class="container-xl">
                    <div class="row text-center align-items-center flex-row-reverse">
                        <div class="col-lg-auto ms-lg-auto">
                            <ul class="list-inline list-inline-dots mb-0">
                                <li class="list-inline-item">
                                    <a href="https://twitter.com/farpras" target="_blank" class="link-secondary" rel="noopener">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon text-pink icon-filled icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428m0 0a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                        </svg>
                                        farpras
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                            <ul class="list-inline list-inline-dots mb-0">
                                <li class="list-inline-item">
                                    Copyright &copy; <?= date("Y"); ?>
                                    <a href="https://github.com/prastya28/php-kasir" class="link-secondary">farpras</a>.
                                    All rights reserved.
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="../assets/js/tabler.min.js" defer></script>

    <script>
        $(document).ready(function() {
            $('#data').DataTable();
        });
    </script>
</body>

</html>