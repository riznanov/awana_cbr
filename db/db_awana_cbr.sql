-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2019 at 08:25 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_awana_cbr`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_kasus`
--

CREATE TABLE IF NOT EXISTS `data_kasus` (
`id_kasus` int(11) NOT NULL,
  `tema` varchar(20) NOT NULL,
  `budget` varchar(20) NOT NULL,
  `varian` varchar(20) NOT NULL,
  `vendor` varchar(20) NOT NULL,
  `paket` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_kasus`
--

INSERT INTO `data_kasus` (`id_kasus`, `tema`, `budget`, `varian`, `vendor`, `paket`) VALUES
(1, 'Jawa', 'Low', '10', 'LAKSANA', 'PREMIUM'),
(2, 'Nasional', 'Medium', '11', 'VAS', 'GLADIOL'),
(3, 'Internasional', 'Medium', '11', 'SARI DEVI', 'PAKET 1'),
(4, 'Nasional', 'Low', '10', 'SARI', 'PAKET 1'),
(5, 'Jawa', 'Low', '10', 'LESTARI', 'BUFFET 2'),
(6, 'Internasional', 'High', '10', 'SONO KEMBANG', 'AROMA'),
(7, 'Nasional', 'Medium', '13', 'NASTITI', 'HEMAT'),
(8, 'Jawa', 'Medium', '15', 'VAS', 'GARBERA'),
(9, 'Jawa', 'Medium', '14', 'VAS', 'AMARILIS'),
(10, 'Nasional', 'Medium', '16', 'LAKSANA', 'PAKET 2'),
(11, 'Nasional', 'High', '15', 'SONO KEMBANG', 'BOGANA'),
(12, 'Internasional', 'High', '16', 'NUSANTARA', 'ANYELIR 2'),
(13, 'Jawa', 'Low', '13', 'SARI', 'PAKET 2'),
(14, 'Nasional', 'Medium', '16', 'VAS', 'KRISAN'),
(15, 'Nasional', 'Medium', '15', 'LAKSANA', 'PAKET 2'),
(16, 'Internasional', 'Low', '13', 'LESTARI', 'BUFFET 1'),
(17, 'Jawa', 'Medium', '15', 'NASTITI', 'PAKET 1');

-- --------------------------------------------------------

--
-- Table structure for table `data_menu`
--

CREATE TABLE IF NOT EXISTS `data_menu` (
`kd_menu` tinyint(3) unsigned NOT NULL,
  `nama_menu` varchar(50) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=141 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_menu`
--

INSERT INTO `data_menu` (`kd_menu`, `nama_menu`) VALUES
(1, 'ACAR'),
(2, 'AIR MINERAL'),
(3, 'AIR MINERAL, TEA'),
(4, 'AIR MINERAL, TEA ,JUS'),
(5, 'AIR MINERAL, TEA,SOFTDRINK'),
(6, 'AIR PUTIH'),
(7, 'ASEM ASEM DAGING'),
(8, 'AYAM ASAM MANIS'),
(9, 'AYAM BAKAR NUSANTARA'),
(10, 'AYAM CRISPI'),
(11, 'AYAM GORENG BACEM'),
(12, 'AYAM LADA HITAM'),
(13, 'AYAM RICA KEMANGI'),
(14, 'BAKMOY'),
(15, 'BAKSO'),
(16, 'BAKSO DAGING'),
(17, 'BAKSO KOMPLIT'),
(18, 'BAKSO KUPAT'),
(19, 'BAKSO MULUS'),
(20, 'BAKSO PANGSIT'),
(21, 'BAKSO SEAFOOD'),
(22, 'BEBEK PEKING'),
(23, 'BEEF GOULASH'),
(24, 'BERAS KENCUR'),
(25, 'BESTIK AYAM ROLL'),
(26, 'BESTIK LIDAH'),
(27, 'BESTIK TEMPURA'),
(28, 'BISTIK GALANTIN'),
(29, 'BISTIK TELUR GULUNG'),
(30, 'BUAH IRIS'),
(31, 'BUAH POTONG'),
(32, 'BUNCIS AKAR KUNING'),
(33, 'CA PELANGI'),
(34, 'CA SAYUR'),
(35, 'CA SAYUR BAKSO'),
(36, 'CA SAYUR SOSIS UDANG'),
(37, 'CA SAYUR UDANG'),
(38, 'CA SOON'),
(39, 'CA SOON JAMUR'),
(40, 'CAH AYAM JAMUR'),
(41, 'CAH SEAFOOD BROKOLI'),
(42, 'CHICKEN CORDON BLEAU'),
(43, 'CHICKEN KUNGPAO'),
(44, 'CHICKEN MARYLAND'),
(45, 'CHICKEN STEAK'),
(46, 'CHICKEN STICK BALL'),
(47, 'CHICKEN TERIYAKI'),
(48, 'CUMI ASAM PEDAS'),
(49, 'DAGING LADA HITAM'),
(50, 'DAGING PELANGI'),
(51, 'DIM SUM'),
(52, 'EMPAL GENTONG'),
(53, 'EMPEK EMPEK'),
(54, 'ES CREAM DAN BUAH'),
(55, 'ES CREAM DAN PUDING'),
(56, 'ES MANADO'),
(57, 'FRIUT SALAD'),
(58, 'FUYUNG HAY'),
(59, 'GARAM ASEM AYAM'),
(60, 'GARANG ASEM'),
(61, 'GARANG ASEM AYAM'),
(62, 'GURAME ACAR'),
(63, 'GURAME BUMBU RUJAK'),
(64, 'GURAMEH ACAR KUNING'),
(65, 'ICE KRIM'),
(66, 'ICE KRIM PUDING'),
(67, 'ICE MANADO'),
(68, 'IGA BAKAR'),
(69, 'JUS JAMBU'),
(70, 'JUS MANGGA'),
(71, 'KRUPUK'),
(72, 'KWETIAW'),
(73, 'LASAGNA'),
(74, 'LONTONG OPOR'),
(75, 'LUMPIA'),
(76, 'MARTABAK'),
(77, 'MARTABAK KUBANG'),
(78, 'MI GORENG'),
(79, 'MI JOWO'),
(80, 'MIE JAWA'),
(81, 'MIE ORIENTAL'),
(82, 'NASI GORENG'),
(83, 'NASI LIWET'),
(84, 'NASI PUTIH'),
(85, 'ORAK ARIK '),
(86, 'ROLADE SAUS STEAK'),
(87, 'SALAD SOLO'),
(88, 'SALAD SOLO DAGING'),
(89, 'SALAD SOLO GALANTIN'),
(90, 'SAMBAL GOR DAGING '),
(91, 'SAMBAL GORENG DAGING '),
(92, 'SAMBAL GORENG KOMBINASI'),
(93, 'SAMBEL GOR KRENI'),
(94, 'SAMBEL GORENG KRENI'),
(95, 'SAPI ASAM MANIS'),
(96, 'SAPO TAHU'),
(97, 'SATE AYAM '),
(98, 'SATE AYAM LONTONG'),
(99, 'SATE LONTONG'),
(100, 'SEAFOOD SAOS TIRAM'),
(101, 'SELADA PENGANTIN'),
(102, 'SERABI KOCOR'),
(103, 'SERUNDENG PARU'),
(104, 'SIOMAY'),
(105, 'SIOMAY NUSANTARA'),
(106, 'SOFTDRINK'),
(107, 'SOP ASPARAGUS'),
(108, 'SOP AYAM BAKSO'),
(109, 'SOP AYAM JAMUR'),
(110, 'SOP BAKSO SEAFOOD'),
(111, 'SOP JAGUNG'),
(112, 'SOP KEMBANG WARU'),
(113, 'SOP RAMBUTAN'),
(114, 'SOUP ASPARAGUS'),
(115, 'SOUP AYAM JAMUR'),
(116, 'SOUP AYAM ROLL'),
(117, 'SOUP AYAM SAYUR'),
(118, 'SOUP BOLA-BOLA DAGING'),
(119, 'SOUP KACANG MERAH'),
(120, 'SOUP KEMBANG WARU'),
(121, 'SOUP PENGANTIN'),
(122, 'SOUP TEKWAN'),
(123, 'SOUP TIMLO'),
(124, 'SOUPKEMBANG WARU'),
(125, 'STEAK DAGING'),
(126, 'TEA'),
(127, 'TENGKLENG'),
(128, 'TENGKLENG LONTONG'),
(129, 'TOM YAM'),
(130, 'TONGSENG SAPI'),
(131, 'TRANCAM'),
(132, 'TUMIS DAGING'),
(133, 'TUMIS POSOL SOSIS'),
(134, 'UDANG GORENG MADU'),
(135, 'UDANG KRISPY'),
(136, 'VILLET ASAM MANIS'),
(137, 'VILLET IKAN'),
(138, 'VILLET IKAN CRISPY'),
(139, 'VILLET IKAN GURAME'),
(140, 'ZUPA SOUP');

-- --------------------------------------------------------

--
-- Table structure for table `data_paket`
--

CREATE TABLE IF NOT EXISTS `data_paket` (
`kd_paket` tinyint(3) unsigned NOT NULL,
  `nama_paket` varchar(50) NOT NULL,
  `budget` varchar(12) NOT NULL,
  `kd_vendor` tinyint(3) unsigned NOT NULL,
  `harga` varchar(20) NOT NULL,
  `porsi` varchar(10) NOT NULL,
  `tema` varchar(12) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_paket`
--

INSERT INTO `data_paket` (`kd_paket`, `nama_paket`, `budget`, `kd_vendor`, `harga`, `porsi`, `tema`) VALUES
(1, 'PREMIUM', 'Low', 1, '10000000', '', 'Jawa'),
(2, 'GLADIOL', 'Low', 11, '6170000', '', 'Nasional'),
(3, 'PAKET 1', 'Meduim', 8, '7000000', '', 'Internasiona'),
(4, 'PAKET 1', '1', 7, '6050000', '', '2'),
(5, 'BUFFET 2', '1', 3, '6460000', '', '1'),
(6, 'AROMA', '3', 10, '9095000', '', '3'),
(7, 'HEMAT', '2', 4, '7625000', '', '2'),
(8, 'GARBERA', '2', 11, '8075000', '', '1'),
(9, 'AMARILIS', '2', 11, '7835000', '', '1'),
(10, 'ANYELIR 2', '2', 2, '9005000', '', '2'),
(11, 'BOGANA', '3', 10, '15500000', '', '2'),
(12, 'ANYELIR', '3', 5, '16100000', '', '3'),
(13, 'PAKET 2', '1', 7, '8000000', '', '1'),
(14, 'KRISAN', '2', 11, '10510000', '', '2'),
(15, 'PAKET 2', '2', 2, '9000000', '', '2'),
(16, 'PAKET 1', '1', 3, '8500000', '', '3'),
(17, 'PAKET 1', '2', 4, '9000000', '', '1'),
(18, 'AMARILIS', '2', 11, '11000000', '', '1'),
(19, 'PAKET 2', '2', 4, '11500000', '', '2'),
(20, 'PAKET 2', '1', 7, '7050000', '', '2'),
(21, 'PAKET 2', '2', 4, '8900000', '', '1'),
(22, 'CHERY 2', '3', 5, '17000000', '', '2'),
(23, 'BUGENFIL', '3', 5, '16300000', '', '3'),
(24, 'MENU 1', '1', 6, '6500000', '', '2'),
(25, 'PAKET 1', '3', 9, '16700000', '', '1'),
(26, 'PAKET 2', '3', 5, '18000000', '', '2'),
(27, 'GLADIOL', '2', 11, '7000000', '', '2'),
(28, 'BUFFET 3', '2', 3, '7500000', '', '2'),
(29, 'MENU 1', '1', 6, '6800000', '', '2'),
(30, 'GARBERA', '2', 11, '7600000', '', '3');

-- --------------------------------------------------------

--
-- Table structure for table `data_vendor`
--

CREATE TABLE IF NOT EXISTS `data_vendor` (
`kd_vendor` tinyint(3) unsigned NOT NULL,
  `nama_vendor` varchar(20) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_vendor`
--

INSERT INTO `data_vendor` (`kd_vendor`, `nama_vendor`) VALUES
(1, 'KARUNIA'),
(2, 'LAKSANA'),
(3, 'LESTARI'),
(4, 'NASTITI'),
(5, 'NUSANTARA'),
(6, 'RESTU'),
(7, 'SARI'),
(8, 'SARI DEVI'),
(9, 'SIRIKIT'),
(10, 'SONO KEMBANG'),
(11, 'VAS');

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE IF NOT EXISTS `gejala` (
`kd_pilihan` int(11) NOT NULL,
  `kriteria_nama` varchar(25) NOT NULL,
  `sub_nama` varchar(20) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`kd_pilihan`, `kriteria_nama`, `sub_nama`) VALUES
(1, 'Tema', 'Jawa'),
(2, 'Tema', 'Nasional'),
(3, 'Tema', 'Internasional'),
(4, 'Budget', 'Low'),
(5, 'Budget', 'Medium'),
(6, 'Budget', 'High'),
(7, 'Varian', '10'),
(8, 'Varian', '11'),
(9, 'Varian', '12'),
(10, 'Varian', '13'),
(11, 'Varian', '14'),
(12, 'Varian', '15'),
(13, 'Varian', '16'),
(14, 'Varian', '17'),
(15, 'Vendor', 'KARUNIA'),
(16, 'Vendor', 'LAKSANA'),
(17, 'Vendor', 'LESTARI'),
(18, 'Vendor', 'NASTITI'),
(19, 'Vendor', 'NUSANTARA'),
(20, 'Vendor', 'RESTU'),
(21, 'Vendor', 'SARI'),
(22, 'Vendor', 'SARI DEVI'),
(23, 'Vendor', 'SIRIKIT'),
(24, 'Vendor', 'SONO KEMBANG'),
(26, 'Vendor', 'VAS');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE IF NOT EXISTS `kriteria` (
`kriteria_id` int(11) NOT NULL,
  `kriteria_nama` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`kriteria_id`, `kriteria_nama`) VALUES
(1, 'Tema'),
(2, 'Budget'),
(3, 'Varian'),
(4, 'Vendor');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `username` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `relasi`
--

CREATE TABLE IF NOT EXISTS `relasi` (
`id_relasi` int(4) NOT NULL,
  `no_relasi` int(11) NOT NULL,
  `kd_pilihan` int(11) NOT NULL,
  `kd_paket` int(11) NOT NULL,
  `bobot` double NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `relasi`
--

INSERT INTO `relasi` (`id_relasi`, `no_relasi`, `kd_pilihan`, `kd_paket`, `bobot`) VALUES
(1, 1, 1, 1, 0.7),
(2, 1, 6, 1, 0.9),
(3, 1, 7, 1, 0.5),
(4, 1, 15, 1, 0.8),
(5, 2, 2, 2, 0.7),
(6, 2, 5, 2, 0.9),
(7, 2, 8, 2, 0.5),
(8, 2, 26, 2, 0.8),
(9, 3, 3, 3, 0.7),
(10, 3, 5, 3, 0.9),
(11, 3, 8, 3, 0.5),
(12, 3, 22, 3, 0.8),
(13, 4, 2, 4, 0.7),
(14, 4, 4, 4, 0.9),
(15, 4, 7, 4, 0.5),
(16, 4, 21, 4, 0.8),
(17, 5, 1, 5, 0.7),
(18, 5, 4, 5, 0.9),
(19, 5, 7, 5, 0.5),
(20, 5, 17, 5, 0.8),
(21, 6, 3, 6, 0.7),
(22, 6, 6, 6, 0.9),
(23, 6, 7, 6, 0.5),
(24, 6, 24, 6, 0.8);

-- --------------------------------------------------------

--
-- Table structure for table `sub_kriteria`
--

CREATE TABLE IF NOT EXISTS `sub_kriteria` (
`sub_id` int(11) NOT NULL,
  `kriteria_id` int(11) NOT NULL,
  `kriteria_nama` varchar(25) NOT NULL,
  `sub_nama` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_kriteria`
--

INSERT INTO `sub_kriteria` (`sub_id`, `kriteria_id`, `kriteria_nama`, `sub_nama`) VALUES
(1, 1, 'Tema', 'Jawa'),
(2, 1, 'Tema', 'Nasional'),
(3, 1, 'Tema', 'Internasional'),
(4, 2, 'Budget', 'Low'),
(5, 2, 'Budget', 'Medium'),
(6, 2, 'Budget', 'High'),
(8, 3, 'Varian', '10'),
(9, 3, 'Varian', '11'),
(10, 3, 'Varian', '12'),
(11, 3, 'Varian', '13'),
(12, 3, 'Varian', '14'),
(13, 3, 'Varian', '15'),
(14, 3, 'Varian', '16'),
(15, 3, 'Varian', '17'),
(16, 4, 'Vendor', 'KARUNIA'),
(17, 4, 'Vendor', 'LAKSANA'),
(18, 4, 'Vendor', 'LESTARI'),
(19, 4, 'Vendor', 'NASTITI'),
(20, 4, 'Vendor', 'NUSANTARA'),
(21, 4, 'Vendor', 'RESTU'),
(22, 4, 'Vendor', 'SARI'),
(23, 4, 'Vendor', 'SARI DEVI'),
(24, 4, 'Vendor', 'SIRIKIT'),
(25, 4, 'Vendor', 'SONO KEMBANG'),
(26, 4, 'Vendor', 'VAS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_kasus`
--
ALTER TABLE `data_kasus`
 ADD PRIMARY KEY (`id_kasus`);

--
-- Indexes for table `data_menu`
--
ALTER TABLE `data_menu`
 ADD PRIMARY KEY (`kd_menu`);

--
-- Indexes for table `data_paket`
--
ALTER TABLE `data_paket`
 ADD PRIMARY KEY (`kd_paket`);

--
-- Indexes for table `data_vendor`
--
ALTER TABLE `data_vendor`
 ADD PRIMARY KEY (`kd_vendor`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
 ADD PRIMARY KEY (`kd_pilihan`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
 ADD PRIMARY KEY (`kriteria_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
 ADD PRIMARY KEY (`username`);

--
-- Indexes for table `relasi`
--
ALTER TABLE `relasi`
 ADD PRIMARY KEY (`id_relasi`);

--
-- Indexes for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
 ADD PRIMARY KEY (`sub_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_kasus`
--
ALTER TABLE `data_kasus`
MODIFY `id_kasus` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `data_menu`
--
ALTER TABLE `data_menu`
MODIFY `kd_menu` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=141;
--
-- AUTO_INCREMENT for table `data_paket`
--
ALTER TABLE `data_paket`
MODIFY `kd_paket` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `data_vendor`
--
ALTER TABLE `data_vendor`
MODIFY `kd_vendor` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `gejala`
--
ALTER TABLE `gejala`
MODIFY `kd_pilihan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
MODIFY `kriteria_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `relasi`
--
ALTER TABLE `relasi`
MODIFY `id_relasi` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
