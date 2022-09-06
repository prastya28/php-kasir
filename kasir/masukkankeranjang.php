<?php
include '../koneksi.php';
$id_produk = $_POST['id_produk'];

// jika dikeranjang belum ada id produk itu, maka jumlahnya default 1
if (!isset($_SESSION['keranjang'][$id_produk])) {
    $_SESSION['keranjang'][$id_produk] =  1;
} else {
    $_SESSION['keranjang'][$id_produk] +=  1;
}
