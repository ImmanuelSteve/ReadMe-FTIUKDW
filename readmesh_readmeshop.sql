-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2013 at 04:17 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `readmesh_readmeshop`
--
CREATE DATABASE IF NOT EXISTS `readmesh_readmeshop` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `readmesh_readmeshop`;

-- --------------------------------------------------------

--
-- Table structure for table `detail`
--

CREATE TABLE IF NOT EXISTS `detail` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Tipe_SimCard` varchar(10) NOT NULL,
  `Jaringan_Data` varchar(200) NOT NULL,
  `Jaringan_Telepon` varchar(200) NOT NULL,
  `Prosesor` varchar(500) NOT NULL,
  `RAM` varchar(500) NOT NULL,
  `Media_Penyimpanan` varchar(500) NOT NULL,
  `GPU` varchar(500) NOT NULL,
  `Layar` varchar(500) NOT NULL,
  `Kamera` varchar(500) NOT NULL,
  `Baterai` varchar(200) NOT NULL,
  `Fitur_Tambahan` varchar(1000) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `detail`
--

INSERT INTO `detail` (`Id`, `Tipe_SimCard`, `Jaringan_Data`, `Jaringan_Telepon`, `Prosesor`, `RAM`, `Media_Penyimpanan`, `GPU`, `Layar`, `Kamera`, `Baterai`, `Fitur_Tambahan`) VALUES
(1, 'GSM', '4G(LTE Cat 4 150/50Mbps)', 'Quad band(850/900/1800/1900 MHz)', 'LTE(2.3 GHz Quad-Core Processor), 3G(1.9GHz Octa Core Processor(A15 1.9GHz+A7 1.3GHz)', '3 GB', '32/64 GB memori internal + slot microSD(hingga 64GB)', 'Mali-400MP4', '5.7 inch(144.3mm) Full HD Super AMOLED (1920 x 1080 piksel)', 'Kamera utama/belakang(13 Mpx), kamera depan(2 Mpx), dual kamera/dual rekaman/dual panggilan video', 'Li-ion 3.200 mAh', 'S Pen dengan fitur yang dioptimalisasi, Bluetooth v4.0(LE), Gesture, Accelerometer, Geo-magnetic, Gyroscope, RGB');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE IF NOT EXISTS `pengguna` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pengguna` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `telepon` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama_pengguna`, `email`, `password`, `alamat`, `kota`, `telepon`) VALUES
(1, 'Admin', '', 'admin', '', '', '0'),
(2, 'Fandi', 'fandi.wirawan@gmail.com', 'akumiripsadako', 'TPU gunung meletus, Kebumen', 'Kebumen', '2147483647'),
(3, 'Danny', 'dannyganteng@gantengmail.com', 'akuganteng', 'gang nanas, Yogyakarta', 'Yogyakarta', '2147483647'),
(4, 'Steve', 'steve@gmail.com', 'readme', 'jl raya banjar', 'Banjar', '2147483647'),
(5, 'Progweb', 'progweb@gmail.com', 'progweb', 'jogja', 'jogja', '0821313322322');

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE IF NOT EXISTS `pengiriman` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nama` varchar(100) NOT NULL,
  `Kota_Tujuan` varchar(100) NOT NULL,
  `Harga` int(11) NOT NULL,
  `Harga_String` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `pengiriman`
--

INSERT INTO `pengiriman` (`Id`, `Nama`, `Kota_Tujuan`, `Harga`, `Harga_String`) VALUES
(1, 'JNE', 'Kebumen', 19000, '19.000'),
(2, 'Tiki', 'Kebumen', 28000, '28.000'),
(3, 'Pos Indonesia', 'Kebumen', 19900, '19.900'),
(4, 'JNE', 'Yogyakarta', 7000, '7.000'),
(5, 'Tiki', 'Yogyakarta', 9000, '9.000'),
(6, 'Pos Indonesia', 'Yogyakarta', 16500, '16.500'),
(7, 'JNE', 'Cilacap', 20000, '20.000'),
(8, 'Tiki', 'Cilacap', 12000, '12.000'),
(9, 'Pos Indonesia', 'Cilacap', 19800, '19.800');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `merek` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `hargaString` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `stok` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `waktu_peluncuran` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `terjual` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `hargaString` (`hargaString`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `merek`, `nama`, `harga`, `hargaString`, `gambar`, `stok`, `nilai`, `waktu_peluncuran`, `terjual`, `status`) VALUES
(1, 'Samsung', 'Samsung Galaxy Note 3', 8880000, '8.880.000', 'images/samsung-galaxy-note-3.jpg', 5, 4, '2013-10-27 14:23:52', 5, 'unggulan'),
(2, 'Lenovo', 'Lenovo K900', 4499000, '4.449.000', 'images/lenovo-k900.jpg', 2, 4, '2013-10-29 10:21:33', 4, 'baru'),
(3, 'Sony', 'Sony Xperia Z Ultra', 7499000, '7.499.000', 'images/sony-xperia-z-ultra.jpg', 1, 5, '2013-10-29 10:30:05', 2, 'unggulan'),
(4, 'HTC', 'HTC One', 7300000, '7.300.000', 'images/htc-one.jpg', 3, 4, '2013-10-30 13:02:35', 2, 'baru'),
(5, 'i-Phone', 'iPhone 5', 9000000, '9.000.000', 'images/apple-iphone-5.jpg', 2, 4, '2013-10-30 14:50:05', 5, 'baru'),
(6, 'LG', 'Lg G2', 6799000, '6.799.000', 'images/lg-g2.jpg', 3, 5, '2013-11-02 03:00:00', 2, 'unggulan'),
(7, 'Samsung', 'Samsung Galaxy Tab 3 8.0', 4499000, '4.499.000', 'images/samsung-galaxy-tab-3-80.jpg', 2, 3, '2013-11-02 05:00:00', 8, 'baru'),
(8, 'Huawei', 'Huawei Ascend Mate', 3999000, '3.999.000', 'images/huawei-ascend-mate.jpg', 4, 2, '2013-11-09 08:00:00', 1, 'baru');

-- --------------------------------------------------------

--
-- Table structure for table `produk_promo`
--

CREATE TABLE IF NOT EXISTS `produk_promo` (
  `id_promo` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  UNIQUE KEY `id_promo` (`id_promo`,`id_produk`),
  KEY `id_produk` (`id_produk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `promo`
--

CREATE TABLE IF NOT EXISTS `promo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(200) NOT NULL,
  `gambar` varchar(150) NOT NULL,
  `berlaku` varchar(30) NOT NULL,
  `deskripsi` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `promo`
--

INSERT INTO `promo` (`id`, `judul`, `gambar`, `berlaku`, `deskripsi`) VALUES
(1, 'LG cash back up to 1 juta!', 'images/promo-1.png', '30 Desember 2014', 'promo promo promo'),
(2, 'Promo Blackberry cash reward up to 900 rb', 'images/promo-2.png', '30 Desember 2014', 'promo promo promo'),
(3, 'Promo Samsung cash reward up tp 1 juta', 'images/promo-3.png', '30 Desember 2014', 'promo promo promo');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE IF NOT EXISTS `review` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_produk` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isi` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_user` (`id_pengguna`),
  UNIQUE KEY `id_produk` (`id_produk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

CREATE TABLE IF NOT EXISTS `testimoni` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pengguna` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isi` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `testimoni`
--

INSERT INTO `testimoni` (`id`, `id_pengguna`, `waktu`, `isi`) VALUES
(1, 2, '2013-11-17 15:00:19', 'pelayanannya super cepat dan tanggap, gak salah pilih toko online... :D'),
(2, 3, '2013-11-17 15:00:38', 'mantab abiss, respon cepat dan kualitas barang juga tetap nomer 1.... :D\r\n'),
(3, 5, '2013-11-17 15:10:35', 'responnya cepet abis, barang dikirim cepet dan barang nya juga bagus dan gak ngecewain... mantab...'),
(4, 4, '2013-11-17 15:11:49', '\r\npelayanannya mantab dan tetep jaga kualitas barang tentunya... maju terus :)'),
(5, 4, '2013-11-17 15:13:35', 'jarang2 ni nemu toko online yang pelayanannya mantab abisss..');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pengguna` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_pengiriman` int(11) NOT NULL,
  `total_harga_barang` int(11) NOT NULL,
  `biaya_kirim` int(11) NOT NULL,
  `potongan_harga` int(11) NOT NULL,
  `total_harga_dibayarkan` int(11) NOT NULL,
  `tanggal_transaksi` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Id_Customer` (`id_pengguna`),
  UNIQUE KEY `Id_Barang` (`id_produk`),
  UNIQUE KEY `Id_Pengiriman` (`id_pengiriman`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail`
--
ALTER TABLE `detail`
  ADD CONSTRAINT `detail_ibfk_1` FOREIGN KEY (`Id`) REFERENCES `produk` (`id`);

--
-- Constraints for table `produk_promo`
--
ALTER TABLE `produk_promo`
  ADD CONSTRAINT `produk_promo_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id`),
  ADD CONSTRAINT `produk_promo_ibfk_2` FOREIGN KEY (`id_promo`) REFERENCES `promo` (`id`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id`),
  ADD CONSTRAINT `review_ibfk_3` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`id_pengiriman`) REFERENCES `pengiriman` (`Id`),
  ADD CONSTRAINT `transaksi_ibfk_4` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id`),
  ADD CONSTRAINT `transaksi_ibfk_5` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
