<?php
$id_kategori = $_GET['id'];
$id_toko = $_SESSION['user']['id_toko'];

$koneksi->query("DELETE FROM kategori WHERE id_kategori='$id_kategori' AND id_toko='$id_toko' ");

// echo "<script>alert('Data kategori terhapus!')</script>";
$_SESSION['status'] = "Kategori telah dihapus!";
$_SESSION['status_type'] = "warning";
echo "<script>location='index.php?page=kategori'</script>";
