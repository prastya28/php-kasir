-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for phpkasir
CREATE DATABASE IF NOT EXISTS `phpkasir` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `phpkasir`;

-- Dumping structure for table phpkasir.kategori
CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `id_toko` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table phpkasir.kategori: ~4 rows (approximately)
DELETE FROM `kategori`;
/*!40000 ALTER TABLE `kategori` DISABLE KEYS */;
INSERT INTO `kategori` (`id_kategori`, `id_toko`, `nama_kategori`) VALUES
	(1, 1, 'Snack'),
	(2, 1, 'Dapur'),
	(3, 1, 'Alat Tulis');
/*!40000 ALTER TABLE `kategori` ENABLE KEYS */;

-- Dumping structure for table phpkasir.pelanggan
CREATE TABLE IF NOT EXISTS `pelanggan` (
  `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT,
  `id_toko` int(11) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `telepon_pelanggan` varchar(25) NOT NULL,
  `alamat_pelanggan` varchar(100) NOT NULL,
  PRIMARY KEY (`id_pelanggan`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table phpkasir.pelanggan: ~0 rows (approximately)
DELETE FROM `pelanggan`;
/*!40000 ALTER TABLE `pelanggan` DISABLE KEYS */;
INSERT INTO `pelanggan` (`id_pelanggan`, `id_toko`, `nama_pelanggan`, `email_pelanggan`, `telepon_pelanggan`, `alamat_pelanggan`) VALUES
	(1, 1, 'Budi A.', 'budi@gmail.com', '6281222', 'Jl. Jambu');
/*!40000 ALTER TABLE `pelanggan` ENABLE KEYS */;

-- Dumping structure for table phpkasir.penjualan
CREATE TABLE IF NOT EXISTS `penjualan` (
  `id_penjualan` int(11) NOT NULL AUTO_INCREMENT,
  `id_pelanggan` int(11) DEFAULT NULL,
  `id_toko` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_penjualan` datetime NOT NULL,
  `total_penjualan` int(11) NOT NULL,
  `bayar_penjualan` int(11) NOT NULL,
  `kembalian_penjualan` int(11) NOT NULL,
  PRIMARY KEY (`id_penjualan`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table phpkasir.penjualan: ~2 rows (approximately)
DELETE FROM `penjualan`;
/*!40000 ALTER TABLE `penjualan` DISABLE KEYS */;
INSERT INTO `penjualan` (`id_penjualan`, `id_pelanggan`, `id_toko`, `id_user`, `tanggal_penjualan`, `total_penjualan`, `bayar_penjualan`, `kembalian_penjualan`) VALUES
	(1, 0, 1, 1, '2023-06-06 10:12:18', 14000, 15000, 1000),
	(2, 1, 1, 1, '2023-06-06 12:17:53', 33000, 50000, 17000),
	(3, 0, 1, 1, '2023-06-06 16:53:12', 137000, 150000, 13000);
/*!40000 ALTER TABLE `penjualan` ENABLE KEYS */;

-- Dumping structure for table phpkasir.penjualan_produk
CREATE TABLE IF NOT EXISTS `penjualan_produk` (
  `id_penjualan_produk` int(11) NOT NULL AUTO_INCREMENT,
  `id_penjualan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `nama_jual` varchar(255) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `jumlah_jual` int(11) NOT NULL,
  `subtotal_jual` int(11) NOT NULL,
  PRIMARY KEY (`id_penjualan_produk`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- Dumping data for table phpkasir.penjualan_produk: ~15 rows (approximately)
DELETE FROM `penjualan_produk`;
/*!40000 ALTER TABLE `penjualan_produk` DISABLE KEYS */;
INSERT INTO `penjualan_produk` (`id_penjualan_produk`, `id_penjualan`, `id_produk`, `id_toko`, `harga_beli`, `nama_jual`, `harga_jual`, `jumlah_jual`, `subtotal_jual`) VALUES
	(1, 1, 1, 1, 2000, 'Taro Pedas', 3000, 1, 3000),
	(2, 1, 3, 1, 8000, 'Piring', 10000, 1, 10000),
	(3, 1, 5, 1, 750, 'Tic Tac', 1000, 1, 1000),
	(4, 2, 4, 1, 4000, 'Sendok', 5000, 1, 5000),
	(5, 2, 5, 1, 750, 'Tic Tac', 1000, 5, 5000),
	(6, 2, 1, 1, 2000, 'Taro Pedas', 3000, 1, 3000),
	(7, 2, 3, 1, 8000, 'Piring', 10000, 2, 20000),
	(8, 3, 7, 1, 55000, 'Faber Castell 9000 Pensil 2B (12pcs)', 60000, 1, 60000),
	(9, 3, 8, 1, 1300, 'Beng Beng', 2000, 6, 12000),
	(10, 3, 2, 1, 4000, 'Richeese Nabati', 5000, 3, 15000),
	(11, 3, 3, 1, 8000, 'Piring', 10000, 1, 10000),
	(12, 3, 1, 1, 2000, 'Taro Pedas', 3000, 5, 15000),
	(13, 3, 4, 1, 4000, 'Sendok', 5000, 2, 10000),
	(14, 3, 6, 1, 4000, 'Garpu', 5000, 2, 10000),
	(15, 3, 5, 1, 750, 'Tic Tac', 1000, 5, 5000);
/*!40000 ALTER TABLE `penjualan_produk` ENABLE KEYS */;

-- Dumping structure for table phpkasir.produk
CREATE TABLE IF NOT EXISTS `produk` (
  `id_produk` int(11) NOT NULL AUTO_INCREMENT,
  `kode_produk` varchar(25) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `beli_produk` int(11) NOT NULL,
  `jual_produk` int(11) NOT NULL,
  `stok_produk` int(11) NOT NULL,
  `foto_produk` varchar(255) NOT NULL DEFAULT 'default.png',
  `keterangan_produk` text NOT NULL,
  PRIMARY KEY (`id_produk`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table phpkasir.produk: ~8 rows (approximately)
DELETE FROM `produk`;
/*!40000 ALTER TABLE `produk` DISABLE KEYS */;
INSERT INTO `produk` (`id_produk`, `kode_produk`, `id_supplier`, `id_kategori`, `id_toko`, `nama_produk`, `beli_produk`, `jual_produk`, `stok_produk`, `foto_produk`, `keterangan_produk`) VALUES
	(1, 'SN100', 4, 1, 1, 'Taro Pedas', 2000, 3000, 5, 'taro-pedas.jpg', 'Taro Pedas 300gr'),
	(2, 'SN101', 1, 1, 1, 'Richeese Nabati', 4000, 5000, 5, 'richeese-nabati.jpg', '-'),
	(3, 'DP200', 1, 2, 1, 'Piring', 8000, 10000, 5, 'piring.jpg', '-'),
	(4, 'DP201', 1, 2, 1, 'Sendok', 4000, 5000, 6, 'sendok.jpg', '-'),
	(5, 'SN102', 1, 1, 1, 'Tic Tac', 750, 1000, 36, 'tictac.png', '-'),
	(6, 'DP202', 1, 2, 1, 'Garpu', 4000, 5000, 7, 'garpu.jpg', '-'),
	(7, 'AT300', 2, 3, 1, 'Faber Castell 9000 Pensil 2B (12pcs)', 55000, 60000, 24, 'faber-castell-9000-2b-pensil-12-pcs.jpg', 'Pensil ujian Faber Castell 2B (12pcs)'),
	(8, 'SN103', 3, 1, 1, 'Beng Beng', 1300, 2000, 44, 'beng2.jpg', 'Beng Beng snack 200gr.');
/*!40000 ALTER TABLE `produk` ENABLE KEYS */;

-- Dumping structure for table phpkasir.supplier
CREATE TABLE IF NOT EXISTS `supplier` (
  `id_supplier` int(11) NOT NULL AUTO_INCREMENT,
  `id_toko` int(11) NOT NULL,
  `nama_supplier` varchar(100) NOT NULL,
  PRIMARY KEY (`id_supplier`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table phpkasir.supplier: ~4 rows (approximately)
DELETE FROM `supplier`;
/*!40000 ALTER TABLE `supplier` DISABLE KEYS */;
INSERT INTO `supplier` (`id_supplier`, `id_toko`, `nama_supplier`) VALUES
	(1, 1, 'SRC'),
	(2, 1, 'LOTTE'),
	(3, 1, 'MIROTA'),
	(4, 1, 'MAYORA');
/*!40000 ALTER TABLE `supplier` ENABLE KEYS */;

-- Dumping structure for table phpkasir.toko
CREATE TABLE IF NOT EXISTS `toko` (
  `id_toko` int(11) NOT NULL AUTO_INCREMENT,
  `nama_toko` varchar(100) NOT NULL DEFAULT '',
  `alamat_toko` text NOT NULL,
  PRIMARY KEY (`id_toko`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table phpkasir.toko: ~0 rows (approximately)
DELETE FROM `toko`;
/*!40000 ALTER TABLE `toko` DISABLE KEYS */;
INSERT INTO `toko` (`id_toko`, `nama_toko`, `alamat_toko`) VALUES
	(1, 'Hamizan Mart', 'Jl. Wara Wiri 1');
/*!40000 ALTER TABLE `toko` ENABLE KEYS */;

-- Dumping structure for table phpkasir.user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `id_toko` int(11) NOT NULL,
  `email_user` varchar(100) NOT NULL,
  `password_user` varchar(100) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `level_user` enum('kasir','gudang') NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table phpkasir.user: ~2 rows (approximately)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id_user`, `id_toko`, `email_user`, `password_user`, `nama_user`, `level_user`) VALUES
	(1, 1, 'test@test.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Bu Joko', 'kasir'),
	(2, 1, 'test2@test.com', '7c222fb2927d828af22f592134e8932480637c0d', 'Pak Joko', 'gudang');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
