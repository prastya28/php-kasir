<?php
$id_produk = $_GET['id'];
$id_toko = $_SESSION['user']['id_toko'];

$koneksi->query("DELETE FROM produk WHERE id_produk='$id_produk' AND id_toko='$id_toko' ");

// echo "<script>alert('Data produk terhapus!')</script>";
$_SESSION['status'] = "Produk telah dihapus!";
$_SESSION['status_type'] = "warning";
echo "<script>location='index.php?page=produk'</script>";
