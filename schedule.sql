-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 26, 2015 at 08:08 AM
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `schedule`
--

-- --------------------------------------------------------

--
-- Table structure for table `leader`
--

CREATE TABLE IF NOT EXISTS `leader` (
  `id_leader` int(2) NOT NULL AUTO_INCREMENT,
  `nama_leader` varchar(50) NOT NULL,
  PRIMARY KEY (`id_leader`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `leader`
--

INSERT INTO `leader` (`id_leader`, `nama_leader`) VALUES
(1, 'Nanang Wahyu Setiana'),
(2, 'Piecessa Adi Nugraha'),
(3, 'Muhammad Yusran');

-- --------------------------------------------------------

--
-- Table structure for table `persons`
--

CREATE TABLE IF NOT EXISTS `persons` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `firstName` varchar(100) DEFAULT NULL,
  `lastName` varchar(100) DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `persons`
--

INSERT INTO `persons` (`id`, `firstName`, `lastName`, `gender`, `address`, `dob`) VALUES
(1, 'Ari2', 'coba', 'female', 'asd', '1992-04-12'),
(2, 'Garrett', 'Winters', 'male', 'Tokyo', '1988-09-02'),
(3, 'John', 'Doe', 'male', 'Kansas123', '1972-11-02'),
(4, 'Tatyana', 'Fitzpatrick', 'male', 'New York', '1989-01-01'),
(5, 'Quinn', 'Flynn', 'male', 'Edinburgh2', '1977-03-24');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `nama_project` varchar(100) NOT NULL,
  `desc` varchar(500) NOT NULL,
  `pic` varchar(50) NOT NULL,
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  `submit` date NOT NULL,
  `status` varchar(10) NOT NULL,
  `leader_id_leader` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `leader_id_leader` (`leader_id_leader`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `nama_project`, `desc`, `pic`, `start`, `end`, `submit`, `status`, `leader_id_leader`) VALUES
(8, 'EVALUASI OUTSORCHING', 'EVALUASI TAHUNAN OUTSORCHING ', 'RIAS APRIYANTI (HRGA)', '2015-09-27', '2015-10-30', '2015-09-27', 'Running', 3),
(9, 'EVALUASI KINERJA HRGA', 'EVALUASI KINERJA HRGA', 'RIAS APRIYANTI (HRGA)', NULL, NULL, '2015-09-27', 'Pending', NULL),
(10, '6R6S Medan', '6R6S Medan', 'KKM Medan', '2015-09-15', '2015-10-08', '2015-09-15', 'Finish', 3),
(11, 'SPL', 'Sistem Pengajuan Lembur berbasis web', 'HR', '2015-08-03', '2015-10-15', '2015-08-03', 'Finish', 2),
(13, 'Software internal trucking admin', 'Modifikasi software internal trucking admin', 'Listiyo', NULL, NULL, '2015-10-08', 'Pending', NULL),
(15, 'Report System e-6R6S PEPSMG', 'Membuat Beberapa Pilihan Menu Laporan Data e-6R6S, seperti : Laporan Temuan Kategori Office / Lapangan sudah Close per Unit / Seksi dan per periode / bulan, Laporan Temuan Kategori Office / Lapangan I', 'Beni Wijayanto', '2015-10-23', '2015-10-23', '2015-10-08', 'Finish', 3),
(16, 'sistem laporan patroli amano', 'membuat program input hasil patroli amano petugas security', 'pujiono', NULL, NULL, '2015-10-08', 'Pending', NULL),
(17, 'monitoring APAR ', 'membuat program untuk monitoring kondisi dan tanggal kadaluarsa APAR', 'abdul hadie nugroho', NULL, NULL, '2015-10-08', 'Pending', NULL),
(18, 'sistem laporan kecelakaan kerja', 'membuat sistem laporan untuk dokumentasi kecelakaan kerja di perusahaan.', 'abdul hadie nugroho', NULL, NULL, '2015-10-08', 'Pending', NULL),
(19, 'program surat pengantar karyawan kecelakaan kerja/kontrol pasca kecelakaan', 'membuat program untuk menyederhanakan proses pembuatan surat pengantar kecelakaan kerja/kontrol pasca kecelakaan dengan hanya meng input NIK SAP Karyawan.', 'abdul hadie nugroho', NULL, NULL, '2015-10-08', 'Pending', NULL),
(20, 'master data karyawan PEP semarang', 'membuat sistem informasi agar dapat melihat data/rekap data karyawan (seperti : nama,alamat,golongan darah,no KPJ,No Peserta BPJS Kesehatan,No Tlp/HP Keluarga yg bisa dihubungi)', 'abdul hadie nugroho', NULL, NULL, '2015-10-08', 'Pending', NULL),
(21, 'Button Re-notified di System e-6R6S', 'Untuk temuan 6R6S yang belum dilakukan perbaikan oleh PIC 6R6S di masing-masing seksi maka dibuatkan tombol / button khusus untuk notifikasi ulang / re-notified adanya temuan 6R6S ke PIC yang bersangk', 'Beni Wijayanto', '2015-10-21', '2015-10-22', '2015-10-08', 'Finish', 3),
(22, 'program pembuatan laporan kecelakaan kerja Tahap 1 dan Tahap 2', 'menyederhanakan pembuatan laporan kecelakaan kerja hanya dengan meng input NIK SAP Karyawan', 'abdul hadie nugroho', NULL, NULL, '2015-10-08', 'Pending', NULL),
(23, 'Button Export to Excel untuk Menu Report System e-6R6S', 'Untuk Rekap Data Temuan vs Perbaikan 6R6S di system e-6R6S ada pilihan tombol / button export to excel untuk keperluan dokumentasi / presentasi', 'Beni Wijayanto', NULL, NULL, '2015-10-08', 'Pending', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `id_user` int(2) NOT NULL AUTO_INCREMENT,
  `login` varchar(30) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `login`, `nama_user`, `password`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(3, '1003', 'Factory Manager Office', 'aa68c75c4a77c87f97fb686b2f068676'),
(4, '1630', 'Quality Control', '46031b3d04dc90994ca317a7c55c4289'),
(5, '1800', 'Information Technology', 'f39ae9ff3a81f499230c4126e01f421b'),
(6, '2100', 'General Affairs', '2cad8fa47bbef282badbb8de5374b894'),
(7, '2200', 'Human Resources Development', '5249ee8e0cff02ad6b4cc0ee0e50b7d1'),
(8, '2400', 'Procurement', '03cf87174debaccd689c90c34577b82f'),
(9, '2511', 'Paper  Roll Warehouse', 'f8b932c70d0b2e6bf071729a4fa68dfc'),
(10, '3000', 'Production Departement', 'e93028bdc1aacdfb3687181f2031765d'),
(11, '7110', 'Production Planning & Control', '7da9fd85999f583e3906f99a3ee58911'),
(12, '3360', 'Corrugator Section', '75df63609809c7a2052fdffe5c00a84e'),
(13, '3370', 'Finishing Section', '900c563bfd2c48c16701acca83ad858a'),
(14, '3380', 'Paper Tube Section', 'f2bff080785c76aa81dbaffce7dea0ad'),
(15, '4500', 'Utility', '7d6548bdc0082aacc950ed35e91fcccb'),
(16, '6150', 'Collection', '598a90004bace6540f0e2230bdc47c09'),
(17, '6400', 'Accounting', 'd6dabcc412981d56c8733b52586a9d44'),
(18, '7320', 'Inner Sales', '8b1ecf6d8049bb062a356f1cc812e69e');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`leader_id_leader`) REFERENCES `leader` (`id_leader`) ON DELETE CASCADE ON UPDATE CASCADE;
