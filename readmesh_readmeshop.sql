-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2013 at 08:27 AM
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
  `Processor` varchar(500) NOT NULL,
  `RAM` varchar(500) NOT NULL,
  `Storage` varchar(500) NOT NULL,
  `GPU` varchar(500) NOT NULL,
  `Display` varchar(500) NOT NULL,
  `Camera` varchar(500) NOT NULL,
  `Batery` varchar(200) NOT NULL,
  `Fitur_Tambahan` varchar(1000) NOT NULL,
  `Tanggal_Release` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `detail`
--

INSERT INTO `detail` (`Id`, `Tipe_SimCard`, `Jaringan_Data`, `Jaringan_Telepon`, `Processor`, `RAM`, `Storage`, `GPU`, `Display`, `Camera`, `Batery`, `Fitur_Tambahan`, `Tanggal_Release`) VALUES
(1, 'GSM', '4G(LTE Cat 4 150/50Mbps)', 'Quad band(850/900/1800/1900 MHz)', 'LTE(2.3 GHz Quad-Core Processor), 3G(1.9GHz Octa Core Processor(A15 1.9GHz+A7 1.3GHz)', '3 GB', '32/64 GB memori internal + slot microSD(hingga 64GB)', 'Mali-400MP4', '5.7 inch(144.3mm) Full HD Super AMOLED (1920 x 1080 piksel)', 'Kamera utama/belakang(13 Mpx), kamera depan(2 Mpx), dual kamera/dual rekaman/dual panggilan video', 'Li-ion 3.200 mAh', 'S Pen dengan fitur yang dioptimalisasi, Bluetooth v4.0(LE), Gesture, Accelerometer, Geo-magnetic, Gyroscope, RGB', '2013-11-09 06:32:35');

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
  `status` varchar(100) NOT NULL,
  `ratting` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `hargaString` (`hargaString`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `merek`, `nama`, `harga`, `hargaString`, `gambar`, `stok`, `status`, `ratting`) VALUES
(1, '', 'Samsung Note 3', 8880000, '8.880.000', 'images/samsung-galaxy-note-3.jpg', 5, 'baru', 4),
(2, '', 'Lenovo K900', 4499000, '4.449.000', 'images/lenovo-k900.jpg', 2, 'baru', 4),
(3, '', 'Sony Xperia Z Ultra', 7499000, '7.499.000', 'images/sony-xperia-z-ultra.jpg', 1, 'unggulan', 5),
(4, '', 'HTC One', 7300000, '7.300.000', 'images/htc-one.jpg', 3, 'unggulan', 4),
(5, '', 'iPhone 5', 9000000, '9.000.000', 'images/apple-iphone-5.jpg', 2, 'unggulan', 4),
(6, '', 'LG G2', 6799000, '6.799.000', 'images/lg-g2.jpg', 3, 'unggulan', 5),
(7, '', 'Samsung Galaxy Tab 3 8.0', 4499000, '4.499.000', 'images/samsung-galaxy-tab-3-80.jpg', 2, 'unggulan', 3),
(8, '', 'Huawei Ascend Mate', 3999000, '3.999.000', 'images/huawei-ascend-mate.jpg', 4, 'unggulan', 2);

-- --------------------------------------------------------

--
-- Table structure for table `promo`
--

CREATE TABLE IF NOT EXISTS `promo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(200) NOT NULL,
  `berlaku` varchar(30) NOT NULL,
  `gambar` varchar(150) NOT NULL,
  `deskripsi` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `promo`
--

INSERT INTO `promo` (`id`, `judul`, `berlaku`, `gambar`, `deskripsi`) VALUES
(1, 'LG cash back up to 1 juta!', '30 Desember 2014', 'images/promo-1.png', 'promo promo promo'),
(2, 'Promo Blackberry cash reward up to 900 rb', '30 Desember 2014', 'images/promo-2.png', 'promo promo promo'),
(3, 'Promo Samsung cash reward up tp 1 juta', '30 Desember 2014', 'images/promo-3.png', 'promo promo promo');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `Id_Transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Customer` int(11) NOT NULL,
  `Id_Barang` int(11) NOT NULL,
  `Id_Pengiriman` int(11) NOT NULL,
  `Total_Harga_Barang` int(11) NOT NULL,
  `Biaya_Kirim` int(11) NOT NULL,
  `Discount` int(11) NOT NULL,
  `Total_Harga_Dibayarkan` int(11) NOT NULL,
  `Tanggal_Transaksi` int(11) NOT NULL,
  PRIMARY KEY (`Id_Transaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `panggilan` varchar(20) NOT NULL,
  `nama depan` varchar(50) NOT NULL,
  `nama belakang` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `telepon` int(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `panggilan`, `nama depan`, `nama belakang`, `email`, `password`, `alamat`, `kota`, `telepon`) VALUES
(1, '', 'admin', '', '', 'admin', '', '', 0),
(2, 'mr', 'Fandi', 'Wirawan', 'fandi.wirawan@gmail.com', '123456789', 'Karanganyar, Kebumen', 'Kebumen', 2147483647),
(3, 'mr', 'Danny', 'Aguswahyudi', 'dannyganteng@gantengmail.com', 'akuganteng', 'gang nanas, Yogyakarta', 'Yogyakarta', 2147483647),
(4, 'mr', 'Steven Renaldo', 'Antony', 'steven.renaldo.antony@sadakomail.com', 'akumiripsadako', 'TPU gunung meletus, Cilacap', 'Cilacap', 2147483647);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
