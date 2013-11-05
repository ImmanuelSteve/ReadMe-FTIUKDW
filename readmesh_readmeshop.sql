-- phpMyAdmin SQL Dump
-- version 4.0.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 05, 2013 at 09:25 PM
-- Server version: 5.5.32-cll
-- PHP Version: 5.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `readmesh_readmeshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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

INSERT INTO `produk` (`id`, `nama`, `harga`, `hargaString`, `gambar`, `stok`, `status`, `ratting`) VALUES
(1, 'Samsung Note 3', 8880000, '8.880.000', 'images/samsung-galaxy-note-3.jpg', 5, 'baru', 4),
(2, 'Lenovo K900', 4499000, '4.449.000', 'images/lenovo-k900.jpg', 2, 'baru', 4),
(3, 'Sony Xperia Z Ultra', 7499000, '7.499.000', 'images/sony-xperia-z-ultra.jpg', 1, 'unggulan', 5),
(4, 'HTC One', 7300000, '7.300.000', 'images/htc-one.jpg', 3, 'unggulan', 4),
(5, 'iPhone 5', 9000000, '9.000.000', 'images/apple-iphone-5.jpg', 2, 'unggulan', 4),
(6, 'LG G2', 6799000, '6.799.000', 'images/lg-g2.jpg', 3, 'unggulan', 5),
(7, 'Samsung Galaxy Tab 3 8.0', 4499000, '4.499.000', 'images/samsung-galaxy-tab-3-80.jpg', 2, 'unggulan', 3),
(8, 'Huawei Ascend Mate', 3999000, '3.999.000', 'images/huawei-ascend-mate.jpg', 4, 'unggulan', 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `panggilan`, `nama depan`, `nama belakang`, `email`, `password`, `alamat`, `kota`, `telepon`) VALUES
(1, '', 'admin', '', '', 'admin', '', '', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

