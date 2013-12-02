-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2013 at 05:25 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `detail`
--

INSERT INTO `detail` (`Id`, `Tipe_SimCard`, `Jaringan_Data`, `Jaringan_Telepon`, `Prosesor`, `RAM`, `Media_Penyimpanan`, `GPU`, `Layar`, `Kamera`, `Baterai`, `Fitur_Tambahan`) VALUES
(1, 'GSM', '4G(LTE Cat 4 150/50Mbps)', 'Quad band(850/900/1800/1900 MHz)', 'LTE(2.3 GHz Quad-Core Processor), 3G(1.9GHz Octa Core Processor(A15 1.9GHz+A7 1.3GHz)', '3 GB', '32/64 GB memori internal + slot microSD(hingga 64GB)', 'Mali-400MP4', '5.7 inch(144.3mm) Full HD Super AMOLED (1920 x 1080 piksel)', 'Kamera utama/belakang(13 Mpx), kamera depan(2 Mpx), dual kamera/dual rekaman/dual panggilan video', 'Li-ion 3.200 mAh', 'S Pen dengan fitur yang dioptimalisasi, Bluetooth v4.0(LE), Gesture, Accelerometer, Geo-magnetic, Gyroscope, RGB'),
(2, 'GSM', 'WCDMA850/900/1700/1900/ 2100MHz, HSPA + 42Mbps(DL) / 5.76Mbps(UL), GPRS/EDGE Class 12', 'GSM 850/900/1800/1900MHz,  GPRS/EDGE Class 12', 'Intel Atom Z2580, Dual-core 2 GHz', '1GB', 'Internal : 16GB\r\nExternal : tidak ada', 'PowerVR SGX544', '5.5" Full HD (1920x1080) IPS', 'Utama : 13 Mpx AF(F1.8 Lens), Depan : 2M FF', '2800mAh (Li-polymer)', 'OS      : Android v4.2 (Jelly Bean)\r\nSIM     : Single (Micro SIM card)\r\nDimensi : 78x157x6.9 mm'),
(3, 'GSM', 'HSDPA 850 / 900 / 1700 / 1900 / 2100,\r\nLTE 700 / 850 / 900/ 1700 / 1900 / 2100 / 2600 - C6806, \r\nLTE 800 / 850 / 900 / 1700 / 1800 / 1900 / 2100 / 2600 - C6833', 'GSM 850 / 900 / 1800 / 1900', 'Qualcomm MSM8974 2.2 GHz, Quadcore', '2 GB', 'Internal : 16 GB, slot microSD hingga 64 GB(didukung SDXC)', 'Adreno 330', '16 juta warna, 1920 x 1080 px, 6,4" tahan terhadap goresan', 'Kamera Utama : 8 Mpx, 16 digital zoom dengan AF, Kamera depan :  2 Mpx, 1080p@30fps', 'Non-removable Li-Ion 3050 mAh', 'Berat : 212 g,\r\nDimensi : 179x92x6,6 mm,\r\nOS : Android 4.2 (Jelly Bean)\r\nTahan debu dan tahan air'),
(4, 'GSM', 'HSDPA 850 / 900 / 1900 / 2100, \r\nLTE 800 / 1800 / 2600, \r\nLTE 1800 / 2600\r\n', 'GSM 850 / 900 / 1800 / 1900', 'Quad-core 1.7 GHz Krait 300', '2 GB', 'Internal 32 / 64 GB, tanpa media penyimpanan external.', 'Adreno 320', '16 juta warna, 1080 x 1920 px, 4.7"(~469 ppi pixel density), Corning Gorilla Glass 2', 'Kamera utama : 4 Mpx, autofocus, optical image stabilization, LED flash. Kamera depan  :  2.1 Mpx, 1080p@30fps, HDR', 'Non-removable Li-Po 2300 mAh', 'Ukuran Simcard : Micro-Sim\r\nDimensi : 137.4 x 68.2 x 9.3 mm\r\nBerat   : 143 g\r\nOS      : Android OS, v4.1.2 (Jelly Bean)\r\n'),
(5, 'CDMA', 'CDMA2000 1xEV-DO - CDMA A1429,\r\nLTE 700 / 850 / 1800 / 1900 / 2100 - CDMA A1429', 'CDMA 800 / 1900 / 2100 - CDMA A1429', 'Dual-core 1.3 GHz Swift (berbasis ARM v7)', '1 GB DDR2', 'Internal : 16/32/64 GB.\r\nTidak ada memori external.', 'PowerVR SGX 543MP3 (grafik tiga inti)', '16 juta warna, 640 x 1136 pixels, 4.0", Corning Gorilla Glass, Oleophobic Coating', 'Kamera Utama : 8 Mpx, 3264x2448 pixels, autofocus, LED flash. Kamera depan : 1.2 Mpx, 720p@30fps', 'Non-removable Li-Po 1440 mAh', 'Ukuran simcard : Nano-SIM\r\nBerat  : 112 g\r\nOS  : iOS 6, dapat di-upgrade hingga iOS 7.0.3\r\n\r\n'),
(6, 'CDMA', 'CDMA2000 1xEV-DO,\r\nLTE', 'CDMA 800 / 1900', 'Quad-core 2.26 GHz Krait 400', '2 GB', '16/32 GB, tampa penyimpanan external.', 'Adreno 330', 'True HD-IPS + LCD capacitive touchscreen, 16M colors, Corning Gorilla Glass 2', '13 MP, autofocus, optical image stabilization, LED flash. Kamera depan : 2.1 MP, 1080p@30fps', 'Non-removable Li-Po 3000 mAh', 'Ukuran : 138.5 x 70.9 x 8.9 mm\r\nBerat  : 143 g\r\nOS     : Android OS, v4.2.2 (Jelly Bean)\r\nUkuran simcard : Micro-SIM \r\nSensor : Accelerometer, gyro, proximity, compass\r\n'),
(7, 'GSM', 'HSDPA 850 / 900 / 1900 / 2100,\r\n', 'GSM 850 / 900 / 1800 / 1900\r\nLTE 800 / 850 / 900 / 1800 / 2100 / 2600', 'Dual-core 1.5 GHz', '1.5 GB', 'Internal : 16/32 GB\r\nExternal : microSD, hingga 64 GB', 'Mali-400MP', '16 juta warna, 800 x 1280 px, 8.0" (~189 ppi pixel density)', 'Kamera Utama : 5 Mpx, Autofocus. Kamera depan : 1.3 Mpx', 'Non-removable Li-Ion 4450 mAh', 'Ukuran  : 209.8 x 123.8 x 7.4 mm \r\nBerat   : 314 g\r\nUkuran Simcard : Micro-SIM\r\nOS      : Android OS, v4.2.2 (Jelly Bean)'),
(8, 'GSM', 'HSDPA 850 / 900 / 1700 / 1900 / 2100', 'GSM 850 / 900 / 1800 / 1900', '1,5 GHz quad-core Cortex-A9', '2 GB', 'Internal 8GB,\r\nExternal : hingga 64 GB', '-', '16 juta warna, 720 x 1280 px, 6.1"(~241 ppi pixel density), Corning Gorilla Glass', 'Kamera utama : 8 Mpx, Autofocus, LED flash, Kamera depan : 1Mpx 720p@30fps.\r\n', 'Non-removable Li-Ion 4050 mAh', 'Ukuran : 163.5 x 85.7 x 9.9 mm\r\nBerat  : 198 g\r\nOS     : Android OS, v4.1 (Jelly Bean)\r\nSensor : Accelerometer, gyro, proximity, compass.\r\nUkuran simcard : icro-SIM');

-- --------------------------------------------------------

--
-- Table structure for table `nota`
--

CREATE TABLE IF NOT EXISTS `nota` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_nota` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `gambar` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama_pengguna`, `email`, `password`, `alamat`, `kota`, `telepon`, `gambar`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2a$08$mrMbM.Pkt2/rX1QOalsgf.YwtQ26f12ewXn6UIBwWPOx4nUykqLwe', 'DutaWacana', 'Jogjakarta', '08123456789', 'images/avatar.jpg'),
(2, 'Fandi', 'fandi.wirawan@gmail.com', '$2a$08$7RDbHoWFfQuOubgaUHTn/.xI3rvr42hNESfgBrII7R7hEroPnbiBq', 'Jl. Revolusi, Kebumen', 'Kebumen', '081999999999', 'images/avatar.jpg'),
(3, 'Danny', 'danny@yahoo.com', '$2a$08$H8B9WJLoi.GAF/yN7l9q7eRHUzFYARL1MWxULeMAw5Vbyu4DhKMI.', 'gang nanas, Yogyakarta', 'Yogyakarta', '0821234243243', 'images/avatar.jpg'),
(4, 'Steve', 'steve@gmail.com', '$2a$08$t9Ts1Jk.INeRjaq9.U7Mg.eP/AboFCn6UE2DdkIUo7E8SQTjaG2bS', 'jl raya banjar', 'Banjar', '082242434332', 'images/avatar.jpg'),
(5, 'Progweb', 'progweb@gmail.com', '$2a$08$Nlx2eGtOkz35d7e38QPqk.l8ZwRFYwT4WmcpBXw/.hXcJCfRujlU6', 'jogja', 'jogja', '0821313322322', 'images/avatar.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE IF NOT EXISTS `pengiriman` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nama` varchar(100) NOT NULL,
  `Kota_Tujuan` varchar(100) NOT NULL,
  `Harga` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `pengiriman`
--

INSERT INTO `pengiriman` (`Id`, `Nama`, `Kota_Tujuan`, `Harga`) VALUES
(1, 'JNE', 'Kebumen', 19000),
(2, 'Tiki', 'Kebumen', 28000),
(3, 'Pos Indonesia', 'Kebumen', 19900),
(4, 'JNE', 'Yogyakarta', 7000),
(5, 'Tiki', 'Yogyakarta', 9000),
(6, 'Pos Indonesia', 'Yogyakarta', 16500),
(7, 'JNE', 'Cilacap', 20000),
(8, 'Tiki', 'Cilacap', 12000),
(9, 'Pos Indonesia', 'Cilacap', 19800);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `merek` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `stok` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `waktu_peluncuran` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `terjual` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `merek`, `nama`, `harga`, `gambar`, `stok`, `nilai`, `waktu_peluncuran`, `terjual`, `status`) VALUES
(1, 'Samsung', 'Samsung Galaxy Note 3', 8880000, 'images/samsung-galaxy-note-3.jpg', 5, 4, '2013-10-27 14:23:52', 5, 'unggulan'),
(2, 'Lenovo', 'Lenovo K900', 4499000, 'images/lenovo-k900.jpg', 2, 4, '2013-10-29 10:21:33', 4, 'baru'),
(3, 'Sony', 'Sony Xperia Z Ultra', 7499000, 'images/sony-xperia-z-ultra.jpg', 1, 5, '2013-10-29 10:30:05', 2, 'unggulan'),
(4, 'HTC', 'HTC One', 7300000, 'images/htc-one.jpg', 3, 4, '2013-10-30 13:02:35', 2, 'baru'),
(5, 'Apple', 'iPhone 5', 9000000, 'images/apple-iphone-5.jpg', 2, 4, '2013-10-30 14:50:05', 5, 'baru'),
(6, 'LG', 'Lg G2', 6799000, 'images/lg-g2.jpg', 3, 5, '2013-11-02 03:00:00', 2, 'unggulan'),
(7, 'Samsung', 'Samsung Galaxy Tab 3 8.0', 4499000, 'images/samsung-galaxy-tab-3-80.jpg', 2, 3, '2013-11-02 05:00:00', 8, 'baru'),
(8, 'Huawei', 'Huawei Ascend Mate', 3999000, 'images/huawei-ascend-mate.jpg', 4, 2, '2013-11-09 08:00:00', 1, 'baru');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `id_produk`, `id_pengguna`, `waktu`, `isi`) VALUES
(1, 1, 4, '2013-11-17 16:09:13', 'Saya bisa menggunakan 9 jam pada wifi dan sekitar 12 jam untuk menonton video. Saya selalu bisa melewati hari dengan penggunaan yang intens. Dengan penggunaan normal, cukup nyaman untuk 2 hari, dan saya menebak bisa mencapai 3 hari untuk penggunaan ringan.'),
(2, 2, 3, '2013-11-17 16:12:35', 'Saya rasa slot memori external sangat dibutuhkan, karena jaman sekarang ini, memori dengan kapasitas 16 GB terisi penuh dengan sangat cepat.'),
(3, 3, 2, '2013-11-17 16:15:11', 'Gadged satu ini tahan air loh,, sudah dibuktikan, kaca nya anti gores juga, jadi tak perlu membeli pelapis antigores dan case anti air,, hemat biaya, Gan,,,'),
(4, 4, 5, '2013-11-17 16:17:29', 'Kaca anti gores dengan gorila glass itu keren.'),
(5, 4, 3, '2013-11-24 05:52:57', 'manteb ni gadget dilihat secara keseluruhan gak habis pikir lah kalo punya ni gadget... :D'),
(6, 1, 3, '2013-11-24 06:28:51', 'Sudah tidak diragukan lagi untuk peforma gadget ini dengan prosesor generasi terbaru dari qualcomm dan RAM 3gb maka sudah dipastikan semua komputasi dapat berjalan dengan baik... :D'),
(7, 6, 3, '2013-11-24 17:04:55', 'Fitur Guest mode yang sangat inovativ dan juga tombol yang berada di belakang sangat nyaman digunakan'),
(8, 3, 3, '2013-11-24 17:09:10', 'test review bisa?');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `testimoni`
--

INSERT INTO `testimoni` (`id`, `id_pengguna`, `waktu`, `isi`) VALUES
(1, 2, '2013-11-17 15:00:19', 'pelayanannya super cepat dan tanggap, gak salah pilih toko online... :D'),
(2, 3, '2013-11-17 15:00:38', 'mantab abiss, respon cepat dan kualitas barang juga tetap nomer 1.... :D\r\n'),
(3, 5, '2013-11-17 15:10:35', 'responnya cepet abis, barang dikirim cepet dan barang nya juga bagus dan gak ngecewain... mantab...'),
(4, 4, '2013-11-17 15:11:49', '\r\npelayanannya mantab dan tetep jaga kualitas barang tentunya... maju terus :)'),
(5, 4, '2013-11-17 15:13:35', 'jarang2 ni nemu toko online yang pelayanannya mantab abisss..'),
(6, 3, '2013-11-24 17:09:32', 'ganteng'),
(7, 3, '2013-11-24 17:09:57', 'aaaaa');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_produk` int(11) NOT NULL,
  `id_pengiriman` int(11) NOT NULL,
  `total_harga_barang` int(11) NOT NULL,
  `biaya_kirim` int(11) NOT NULL,
  `potongan_harga` int(11) NOT NULL,
  `total_harga_dibayarkan` int(11) NOT NULL,
  `tanggal_transaksi` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Id_Barang` (`id_produk`),
  UNIQUE KEY `Id_Pengiriman` (`id_pengiriman`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `produk_promo`
--
ALTER TABLE `produk_promo`
  ADD CONSTRAINT `produk_promo_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id`),
  ADD CONSTRAINT `produk_promo_ibfk_2` FOREIGN KEY (`id_promo`) REFERENCES `promo` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
