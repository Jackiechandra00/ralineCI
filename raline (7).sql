-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2019 at 01:44 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `raline`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `log_user_aktif` (IN `username` VARCHAR(255), IN `activity` VARCHAR(255), IN `tanggal` VARCHAR(255))  NO SQL
BEGIN
	INSERT INTO `log_user` VALUES(username,tanggal,activity);
END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `hitung_kkm_siswa` () RETURNS INT(11) return (SELECT COUNT(*)
        AS jumlah_siswa_kkm
        FROM nilai
        WHERE k3>80 AND k4>80)$$

CREATE DEFINER=`root`@`localhost` FUNCTION `hitung_nilai` () RETURNS INT(11) NO SQL
RETURN(SELECT COUNT(*) FROM nilai WHERE k3>80 and k4>85)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE `absen` (
  `nis` int(7) NOT NULL,
  `id_raport` int(11) NOT NULL,
  `alpha` int(2) NOT NULL,
  `sakit` int(2) NOT NULL,
  `izin` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`nis`, `id_raport`, `alpha`, `sakit`, `izin`) VALUES
(1605097, 1, 0, 3, 1),
(1605099, 3, 2, 3, 1),
(1605101, 0, 1, 2, 2),
(1605105, 7, 1, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `catatan_walikelas`
--

CREATE TABLE `catatan_walikelas` (
  `nis` int(7) NOT NULL,
  `id_raport` int(11) NOT NULL,
  `semester` int(2) NOT NULL,
  `tahun_akademik` varchar(10) NOT NULL,
  `keterangan` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catatan_walikelas`
--

INSERT INTO `catatan_walikelas` (`nis`, `id_raport`, `semester`, `tahun_akademik`, `keterangan`) VALUES
(1605097, 1, 6, '2019/2020', 'ananda sangat hebat bersiat lidah'),
(1605099, 3, 6, '2019/2020', 'ppppaaaaaaaaaaaaaa'),
(1605105, 7, 6, '2019/2020', 'Fakhri keren banget. Ia mahasiswa yang tidak sopan.');

-- --------------------------------------------------------

--
-- Table structure for table `deskripsi1`
--

CREATE TABLE `deskripsi1` (
  `nis` int(7) NOT NULL,
  `predikat` varchar(2) NOT NULL,
  `deskripsi_sosial` varchar(300) NOT NULL,
  `deskripsi_spiritual` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deskripsi1`
--

INSERT INTO `deskripsi1` (`nis`, `predikat`, `deskripsi_sosial`, `deskripsi_spiritual`) VALUES
(1605097, 'SB', 'Sikap Ananda secara umum sangat baik. Terbiasa dalam sholat dzuhur secara berjamaah, memberi dan menjawab salam dan berdoa kepada Allah.', 'Sikap Ananda secara umum sangat baik. Memiliki sikap jujur, santun, peduli, gotong royong dan percaya diri. '),
(1605099, 'SB', 'Sikap Ananda secara umum sangat baik. Memiliki sikap jujur, santun, peduli, gotong royong dan percaya diri. ', 'Sikap Ananda secara umum sangat baik. Terbiasa dalam sholat dzuhur secara berjamaah, memberi dan menjawab salam dan berdoa kepada Allah.'),
(1605105, 'B', 'Sikap Ananda secara umum sangat baik. Memiliki sikap jujur, santun, peduli, gotong royong dan percaya diri. ', 'Sikap Ananda secara umum sangat baik. Terbiasa dalam sholat dzuhur secara berjamaah, memberi dan menjawab salam dan berdoa kepada Allah.');

-- --------------------------------------------------------

--
-- Table structure for table `deskripsik3`
--

CREATE TABLE `deskripsik3` (
  `nis` int(7) NOT NULL,
  `id_mapel` int(10) NOT NULL,
  `deskripsi_k3` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deskripsik3`
--

INSERT INTO `deskripsik3` (`nis`, `id_mapel`, `deskripsi_k3`) VALUES
(1605097, 1, 'Sudah Berkembang tentang Kemampuan Berthoharoh secara tertulis'),
(1605099, 1, 'Sudah Berkembang tentang Kemampuan Berthoharoh secara tertulis'),
(1605105, 1, 'Sudah Berkembang tentang Kemampuan Berthoharoh secara tertulis');

-- --------------------------------------------------------

--
-- Table structure for table `deskripsik4`
--

CREATE TABLE `deskripsik4` (
  `nis` int(7) NOT NULL,
  `id_mapel` int(7) NOT NULL,
  `deskripsi_k4` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deskripsik4`
--

INSERT INTO `deskripsik4` (`nis`, `id_mapel`, `deskripsi_k4`) VALUES
(1605097, 1, 'Meningkat tentang Kemampuan Berthoharoh secara praktek'),
(1605099, 1, 'Meningkat tentang Kemampuan Berthoharoh secara praktek'),
(1605105, 1, 'Meningkat tentang Kemampuan Berthoharoh secara praktek');

-- --------------------------------------------------------

--
-- Stand-in structure for view `detail_nilai`
-- (See below for the actual view)
--
CREATE TABLE `detail_nilai` (
`nama` varchar(100)
,`kelas` varchar(5)
,`semester` int(2)
,`k3` varchar(2)
,`k4` varchar(2)
);

-- --------------------------------------------------------

--
-- Table structure for table `extra`
--

CREATE TABLE `extra` (
  `nis` int(7) NOT NULL,
  `deskripsi_ex` varchar(300) NOT NULL,
  `jenis_extra` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `extra`
--

INSERT INTO `extra` (`nis`, `deskripsi_ex`, `jenis_extra`) VALUES
(1605097, 'Sangat bagus dan teruskan', 'ARABIC CLUB'),
(1605099, 'Sudah sangat berkembang dalam memahami teks bahasa Arab.', 'ARABIC CLUB'),
(1605105, 'Sudah sangat berkembang dalam memahami teks bahasa Arab.', 'ARABIC CLUB');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `nip` int(10) NOT NULL,
  `id_mapel` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`nip`, `id_mapel`, `nama`) VALUES
(27561002, 2, 'DINUL IMAN'),
(27561003, 3, 'FAKHIRAH MENTAYA'),
(27561004, 4, 'SULTAN ALAMSYAH'),
(27561005, 5, 'MUHARRIZ'),
(27561006, 6, 'FAKHRI RIZHA'),
(27561007, 7, 'RAFIF RASYIDI'),
(27561008, 8, 'JACKIE'),
(27561010, 10, 'MUHAMMAD REZKY');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kelas` varchar(2) NOT NULL,
  `nip_walikelas` int(10) NOT NULL,
  `id_raport` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `log_nilai`
--

CREATE TABLE `log_nilai` (
  `id` int(11) NOT NULL,
  `nis` varchar(7) NOT NULL,
  `keterangan` varchar(30) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_nilai`
--

INSERT INTO `log_nilai` (`id`, `nis`, `keterangan`, `waktu`) VALUES
(0, '1605097', 'Data di update', '2019-07-15 20:23:53'),
(1, '1605097', 'Data Dihapus', '2019-07-09 00:55:19'),
(2, '1605097', 'Tambah data', '2019-07-09 00:55:37'),
(3, '1605097', 'Data di update', '2019-07-09 00:55:45'),
(4, '1605097', 'Tambah data', '2019-07-09 14:11:24'),
(5, '1605097', 'Data di update', '2019-07-09 14:11:31'),
(6, '1605098', 'Tambah data', '2019-07-09 14:31:25'),
(7, '1605098', 'Tambah data', '2019-07-09 14:32:11'),
(8, '1605098', 'Tambah data', '2019-07-09 14:32:38'),
(9, '1605098', 'Tambah data', '2019-07-09 14:33:07'),
(10, '1605099', 'Tambah data', '2019-07-09 14:34:30'),
(11, '1605099', 'Tambah data', '2019-07-09 14:35:12'),
(12, '1605097', 'Tambah data', '2019-07-09 15:05:09'),
(13, '1605097', 'Tambah data', '2019-07-09 15:15:32'),
(14, '1605097', 'Data di update', '2019-07-09 15:15:43'),
(15, '1605097', 'Data Dihapus', '2019-07-09 15:15:47'),
(16, '1605100', 'Tambah data', '2019-07-09 15:26:10'),
(17, '1605100', 'Data di update', '2019-07-09 15:26:20'),
(18, '1605097', 'Tambah data', '2019-07-09 15:26:55'),
(19, '1605097', 'Data di update', '2019-07-13 22:02:06');

-- --------------------------------------------------------

--
-- Table structure for table `log_siswa`
--

CREATE TABLE `log_siswa` (
  `id` int(11) NOT NULL,
  `nis` varchar(7) NOT NULL,
  `Keterangan` varchar(50) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_siswa`
--

INSERT INTO `log_siswa` (`id`, `nis`, `Keterangan`, `waktu`) VALUES
(0, '1705198', 'Data di update', '2019-07-16 13:55:36'),
(1, '1616161', 'Tambah data', '2019-07-04 21:17:21'),
(2, '1616161', 'Data Berhasil di update', '2019-07-04 21:18:15'),
(3, '1717171', 'Data Dihapus', '2019-07-04 21:18:19');

-- --------------------------------------------------------

--
-- Table structure for table `log_user`
--

CREATE TABLE `log_user` (
  `username` varchar(255) NOT NULL,
  `tanggal` datetime NOT NULL,
  `activity` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_user`
--

INSERT INTO `log_user` (`username`, `tanggal`, `activity`) VALUES
('admin', '0000-00-00 00:00:00', 'login'),
('Jackie', '2019-07-08 09:27:44', 'login'),
('Jackie', '2019-07-08 09:29:25', 'login'),
('Jackie', '2019-07-08 09:30:07', 'login'),
('Jackie', '2019-07-08 09:34:19', 'login'),
('Jackie', '2019-07-08 09:35:31', 'login'),
('Jackie', '2019-07-08 09:36:29', 'login'),
('Jackie', '2019-07-08 10:13:58', 'logout'),
('Jackie', '2019-07-08 10:14:11', 'login'),
('Jackie', '2019-07-08 10:36:17', 'logout'),
('Jackie', '2019-07-08 10:36:52', 'login'),
('Jackie', '2019-07-08 10:37:25', 'logout'),
('Jackie', '2019-07-08 10:38:14', 'login'),
('Jackie', '2019-07-08 10:38:23', 'logout'),
('Jackie', '2019-07-08 10:38:30', 'login'),
('Jackie', '2019-07-08 10:39:06', 'logout'),
('admin', '2019-07-08 10:40:56', 'login'),
('admin', '2019-07-08 11:11:02', 'logout'),
('Jackie', '2019-07-08 11:13:54', 'login'),
('Jackie', '2019-07-08 11:13:59', 'logout'),
('Jackie', '2019-07-08 11:14:04', 'login'),
('Jackie', '2019-07-08 11:14:43', 'logout'),
('Jackie', '2019-07-08 11:14:51', 'login'),
('Jackie', '2019-07-08 11:38:23', 'logout'),
('Jackie', '2019-07-08 11:38:51', 'login'),
('Jackie', '2019-07-08 11:57:21', 'logout'),
('admin', '2019-07-08 11:57:27', 'login'),
('admin', '2019-07-08 12:00:00', 'login'),
('Admin', '2019-07-08 12:00:29', 'login'),
('admin', '2019-07-08 12:03:47', 'logout'),
('Admin', '2019-07-08 12:09:19', 'login'),
('admin', '2019-07-08 12:09:53', 'logout'),
('admin', '2019-07-08 12:09:58', 'login'),
('admin', '2019-07-08 12:11:27', 'logout'),
('', '2019-07-08 12:11:27', 'logout'),
('admin', '2019-07-08 12:11:33', 'login'),
('admin', '2019-07-08 12:33:12', 'logout'),
('Jackie', '2019-07-08 14:14:05', 'login'),
('Jackie', '2019-07-08 19:42:02', 'logout'),
('Admin', '2019-07-08 19:42:17', 'login'),
('admin', '2019-07-08 19:43:14', 'logout'),
('Jackie', '2019-07-08 19:43:36', 'login'),
('Jackie', '2019-07-08 19:43:45', 'logout'),
('Admin', '2019-07-08 19:44:13', 'login'),
('admin', '2019-07-08 19:44:38', 'logout'),
('Jackie', '2019-07-08 19:55:09', 'login'),
('Jackie', '2019-07-08 19:58:48', 'logout'),
('admin', '2019-07-08 22:30:26', 'login'),
('admin', '2019-07-09 03:19:45', 'login'),
('admin', '2019-07-09 03:22:40', 'logout'),
('Jackie', '2019-07-09 03:22:51', 'login'),
('Jackie', '2019-07-09 03:26:57', 'logout'),
('Admin', '2019-07-09 03:36:50', 'login'),
('admin', '2019-07-09 05:21:41', 'logout'),
('admin', '2019-07-09 05:21:45', 'login'),
('admin', '2019-07-09 05:21:55', 'logout'),
('Jackie', '2019-07-09 05:22:21', 'login'),
('Jackie', '2019-07-09 06:19:02', 'logout'),
('admin', '2019-07-09 06:19:24', 'login'),
('admin', '2019-07-09 06:30:09', 'login'),
('admin', '2019-07-09 06:30:23', 'logout'),
('Jackie', '2019-07-09 06:30:28', 'login'),
('Jackie', '2019-07-09 06:30:41', 'logout'),
('admin', '2019-07-09 06:33:11', 'login'),
('admin', '2019-07-09 07:36:28', 'logout'),
('admin', '2019-07-09 07:36:39', 'login'),
('admin', '2019-07-09 09:10:23', 'logout'),
('Jackie', '2019-07-09 09:10:51', 'login'),
('Jackie', '2019-07-09 09:11:41', 'logout'),
('Admin', '2019-07-09 09:11:46', 'login'),
('admin', '2019-07-09 09:12:39', 'logout'),
('Jackie', '2019-07-09 09:21:03', 'login'),
('Jackie', '2019-07-09 09:47:42', 'logout'),
('Admin', '2019-07-09 09:48:01', 'login'),
('admin', '2019-07-09 09:48:45', 'logout'),
('Jackie', '2019-07-09 09:48:50', 'login'),
('Jackie', '2019-07-09 09:50:19', 'logout'),
('Admin', '2019-07-09 09:50:29', 'login'),
('admin', '2019-07-09 09:50:46', 'logout'),
('Jackie', '2019-07-09 09:51:01', 'login'),
('Jackie', '2019-07-09 09:51:33', 'logout'),
('admin', '2019-07-09 09:52:07', 'login'),
('admin', '2019-07-09 09:53:05', 'logout'),
('Jackie', '2019-07-09 09:53:20', 'login'),
('Jackie', '2019-07-09 09:53:42', 'logout'),
('admin', '2019-07-09 09:53:50', 'login'),
('admin', '2019-07-09 10:02:32', 'logout'),
('Fakhirah', '2019-07-09 10:04:16', 'login'),
('Fakhirah', '2019-07-09 10:07:06', 'logout'),
('Ibnu', '2019-07-09 10:07:43', 'login'),
('Ibnu', '2019-07-09 10:09:01', 'logout'),
('adminbaru', '2019-07-09 10:10:44', 'login'),
('adminbaru', '2019-07-09 10:11:27', 'logout'),
('adminbaru', '2019-07-09 10:13:02', 'login'),
('adminbaru', '2019-07-09 10:14:38', 'logout'),
('Ibnu', '2019-07-09 10:14:52', 'login'),
('Ibnu', '2019-07-09 10:16:25', 'logout'),
('adminbaru', '2019-07-09 10:16:32', 'login'),
('adminbaru', '2019-07-09 10:17:10', 'logout'),
('Jackie', '2019-07-09 10:25:21', 'login'),
('Jackie', '2019-07-13 16:50:39', 'login'),
('Jackie', '2019-07-13 17:00:35', 'logout'),
('Jackie', '2019-07-13 17:00:46', 'login'),
('jackie', '2019-07-15 15:21:47', 'login'),
('Jackie', '2019-07-15 15:21:51', 'logout'),
('adminbaru', '2019-07-15 15:21:59', 'login'),
('Jackie', '2019-07-15 15:23:43', 'login'),
('Jackie', '2019-07-15 15:57:47', 'logout'),
('admin', '2019-07-15 15:57:54', 'login'),
('admin', '2019-07-15 16:03:51', 'logout'),
('jackie', '2019-07-15 16:03:56', 'login'),
('jackie', '2019-07-16 08:52:13', 'login'),
('Jackie', '2019-07-16 09:08:55', 'login'),
('Jackie', '2019-07-16 09:34:46', 'logout'),
('admin', '2019-07-16 09:34:51', 'login'),
('jackie', '2019-07-16 13:37:00', 'login'),
('admin', '2019-07-17 14:18:17', 'login'),
('admin', '2019-07-17 14:22:59', 'logout'),
('jackie', '2019-07-17 14:23:10', 'login'),
('jackie', '2019-07-17 16:15:51', 'login'),
('Jackie', '2019-07-17 16:40:49', 'logout'),
('jackie', '2019-07-17 16:40:54', 'login'),
('Jackie', '2019-07-17 16:44:23', 'logout'),
('admin', '2019-07-17 16:44:28', 'login'),
('admin', '2019-07-17 17:34:14', 'logout'),
('jackie', '2019-07-17 17:34:25', 'login'),
('admin', '2019-07-17 21:37:18', 'login'),
('admin', '2019-07-17 21:37:38', 'logout'),
('jackie', '2019-07-17 21:37:46', 'login'),
('Jackie', '2019-07-17 21:59:27', 'logout'),
('admin', '2019-07-17 21:59:34', 'login'),
('admin', '2019-07-17 22:11:37', 'logout'),
('jackie', '2019-07-17 22:11:46', 'login'),
('jackie', '2019-07-17 22:14:44', 'login'),
('jackie', '2019-07-18 06:06:01', 'login'),
('jackie', '2019-07-18 07:19:56', 'login'),
('Jackie', '2019-07-18 09:44:51', 'logout'),
('admin', '2019-07-18 09:44:56', 'login'),
('jackie', '2019-07-18 10:10:52', 'login'),
('jackie', '2019-07-18 10:46:17', 'login'),
('admin', '2019-07-18 10:48:14', 'login'),
('jackie', '2019-07-18 10:50:03', 'login'),
('admin', '2019-07-18 10:50:44', 'login'),
('jackie', '2019-07-18 11:09:12', 'login'),
('admin', '2019-07-18 11:09:56', 'login'),
('admin', '2019-07-18 13:38:15', 'login');

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `id_mapel` int(10) NOT NULL,
  `mapel` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`id_mapel`, `mapel`) VALUES
(1, 'Fiqih'),
(2, 'Hadist'),
(3, 'Tafsir'),
(4, 'Ushul Fiqih'),
(5, 'Aqidah'),
(6, 'Musthakah Hadist'),
(7, 'Ushu Tafsir'),
(8, 'Tajwid'),
(9, 'Manhaj'),
(10, 'Akhlak'),
(11, 'PKN'),
(12, 'Bahasa Indonesia'),
(13, 'Bahasa Inggris'),
(14, 'Matematika Wajib'),
(15, 'Sejarah'),
(16, 'Seni Budaya'),
(17, 'Penjas Orkes'),
(18, 'Keterampilan'),
(19, 'IPS'),
(20, 'Nahwu'),
(21, 'Sharaf'),
(22, 'Muhadatsah'),
(23, 'Balaghan'),
(25, 'Khat Imlah'),
(26, 'Muthola\'ah'),
(27, 'Tahfiz'),
(28, 'Fisika'),
(29, 'Biologi'),
(30, 'Kimia'),
(31, 'Matematika Peminatan');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `nis` int(7) NOT NULL,
  `id_mapel` int(10) NOT NULL,
  `id_raport` int(11) NOT NULL,
  `k3` varchar(2) NOT NULL,
  `k4` varchar(2) NOT NULL,
  `predikat` varchar(2) NOT NULL,
  `nilai_ekstra` int(2) NOT NULL,
  `tahun_akademik` varchar(10) NOT NULL,
  `semester` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`nis`, `id_mapel`, `id_raport`, `k3`, `k4`, `predikat`, `nilai_ekstra`, `tahun_akademik`, `semester`) VALUES
(1605097, 1, 0, '86', '87', 'B', 0, '2020', 6),
(1605097, 2, 0, '87', '87', 'B', 0, '2020', 6),
(1605097, 3, 0, '88', '89', 'B', 0, '2020', 6),
(1605097, 4, 0, '97', '88', 'SB', 0, '2020', 6),
(1605097, 5, 0, '86', '86', 'B', 0, '2020', 6),
(1605097, 6, 0, '88', '78', 'B', 0, '2020', 6),
(1605097, 7, 0, '89', '88', 'B', 0, '2020', 6),
(1605097, 8, 0, '88', '87', 'B', 0, '2020', 6),
(1605097, 9, 0, '88', '87', 'B', 0, '2020', 6),
(1605097, 10, 0, '87', '88', 'B', 0, '2020', 6),
(1605097, 11, 0, '87', '82', 'B', 0, '2020', 6),
(1605097, 12, 0, '88', '83', 'B', 0, '2020', 6),
(1605097, 13, 0, '81', '82', 'B', 0, '2020', 6),
(1605097, 14, 0, '88', '84', 'B', 0, '2020', 6),
(1605097, 15, 0, '79', '83', 'C', 0, '2020', 6),
(1605097, 16, 0, '77', '78', 'C', 0, '2020', 6),
(1605097, 17, 0, '87', '88', 'B', 0, '2020', 6),
(1605097, 18, 0, '88', '88', 'B', 0, '2020', 6),
(1605097, 19, 0, '88', '87', 'B', 0, '2020', 6),
(1605097, 20, 0, '78', '87', 'C', 0, '2020', 6),
(1605097, 21, 0, '87', '78', 'B', 0, '2020', 6),
(1605097, 22, 0, '77', '78', 'C', 0, '2020', 6),
(1605097, 23, 0, '88', '89', 'B', 0, '2020', 6),
(1605097, 25, 0, '88', '76', 'B', 0, '2020', 6),
(1605097, 26, 0, '88', '81', 'SB', 0, '2020', 6),
(1605097, 27, 0, '88', '78', 'B', 0, '2020', 6),
(1605097, 28, 0, '77', '88', 'C', 0, '2020', 6),
(1605097, 29, 0, '88', '89', 'B', 0, '2020', 6),
(1605097, 30, 0, '88', '77', 'B', 0, '2020', 6),
(1605097, 31, 0, '77', '88', 'C', 0, '2020', 6);

-- --------------------------------------------------------

--
-- Table structure for table `predikat2`
--

CREATE TABLE `predikat2` (
  `nis` int(7) NOT NULL,
  `kegiatan2` varchar(200) NOT NULL,
  `keterangan2` varchar(200) NOT NULL,
  `catatan_khusus2` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `predikat3`
--

CREATE TABLE `predikat3` (
  `nis` int(7) NOT NULL,
  `kegiatan3` varchar(200) NOT NULL,
  `keterangan3` varchar(200) NOT NULL,
  `catatan_khusus3` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prestasi`
--

CREATE TABLE `prestasi` (
  `nis` int(7) NOT NULL,
  `kegiatan` varchar(200) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `catatan_khusus` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prestasi`
--

INSERT INTO `prestasi` (`nis`, `kegiatan`, `keterangan`, `catatan_khusus`) VALUES
(1605097, 'wwwwwwwwwwwwwww', 'qqqqqqqqqqqqqqq', 'ttttttttttttttt'),
(1605099, 'Fl2sn', '111111111111111', '121212');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` int(7) NOT NULL,
  `nisn` varchar(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kelas` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `nisn`, `nama`, `kelas`) VALUES
(1605097, '0004773512', 'ANGGA SURYA', 'XII B'),
(1605099, '0029749962', 'ERLANGGA SIDIQ', 'XII B'),
(1605100, '0011351718', 'FITRANUDDIN', 'XII B'),
(1605101, '0004294878', 'GINTAS AULIA INSANI', 'XII B'),
(1605103, '0017897952', 'HASBI ISWARA S', 'XII B'),
(1605105, '0013855812', 'M. RIZKI YOGA', 'XII B'),
(1605107, '0012471736', 'MUHAMMAD FAIZ FAKHRURROZI', 'XII B'),
(1605108, '0013577982', 'MUHAMMAD FATHI HUSNI', 'XII B'),
(1605109, '0018387343', 'MUHAMMAD RYAN HIDAYAT', 'XII B'),
(1605110, '0040291504', 'MUHAMMAD YAZID MAULANA', 'XII B'),
(1605111, '0014355168', 'MUSHTOF AINAL AKHYAR', 'XII B'),
(1605112, '0014351793', 'RAYFRANA GINTING', 'XII B'),
(1605113, '0012179110', 'REZA AL FARISI', 'XII B');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`, `jabatan`, `status`) VALUES
(4, 'yayak', '$2y$10$aXtI0jvNM8lw/SfvBGLah.T1ovxiib/YDw/RC7W65/ThObJf/5BNO', 'yayak', 'Guru', 'inactive'),
(5, 'Ibnu', '$2y$10$/zOd6iWyLD4I3P0qxuuVEOlyLekwV6oDagbsoO1p.wwu4K85YBVwa', 'Ibnu Maulana', 'Guru', 'inactive'),
(7, 'admin', '$2y$10$DaxECXa3.GNcLwPC.NiSwOL8utYt4yNLyHyOQKL1ux7i/VGY4D3D2', 'admin', 'admin', 'inactive'),
(8, 'Jackie', '$2y$10$3FwgKH7HYsc3I5.D57Erwefr9HbpdT4oGuzSt0Qzj0o2T3a6sk0Za', 'Jackie Chandra', 'Guru', 'inactive');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_detail_nilai`
-- (See below for the actual view)
--
CREATE TABLE `v_detail_nilai` (
`nis` int(7)
,`nama` varchar(100)
,`kelas` varchar(5)
,`semester` int(2)
,`k3` varchar(2)
,`k4` varchar(2)
);

-- --------------------------------------------------------

--
-- Structure for view `detail_nilai`
--
DROP TABLE IF EXISTS `detail_nilai`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_nilai`  AS  select `s`.`nama` AS `nama`,`s`.`kelas` AS `kelas`,`n`.`semester` AS `semester`,`n`.`k3` AS `k3`,`n`.`k4` AS `k4` from (`siswa` `s` join `nilai` `n`) where (`s`.`nis` = `n`.`nis`) ;

-- --------------------------------------------------------

--
-- Structure for view `v_detail_nilai`
--
DROP TABLE IF EXISTS `v_detail_nilai`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_detail_nilai`  AS  select `siswa`.`nis` AS `nis`,`siswa`.`nama` AS `nama`,`siswa`.`kelas` AS `kelas`,`nilai`.`semester` AS `semester`,`nilai`.`k3` AS `k3`,`nilai`.`k4` AS `k4` from (`siswa` join `nilai` on((`siswa`.`nis` = `nilai`.`nis`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `id_raport` (`id_raport`);

--
-- Indexes for table `catatan_walikelas`
--
ALTER TABLE `catatan_walikelas`
  ADD KEY `id_raport` (`id_raport`),
  ADD KEY `nis` (`nis`);

--
-- Indexes for table `deskripsi1`
--
ALTER TABLE `deskripsi1`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `deskripsik3`
--
ALTER TABLE `deskripsik3`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `deskripsik4`
--
ALTER TABLE `deskripsik4`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `extra`
--
ALTER TABLE `extra`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `id_mapel` (`id_mapel`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD KEY `id_raport` (`id_raport`),
  ADD KEY `kelas` (`kelas`);

--
-- Indexes for table `log_nilai`
--
ALTER TABLE `log_nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_siswa`
--
ALTER TABLE `log_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD KEY `id_raport` (`id_raport`),
  ADD KEY `nis` (`nis`);

--
-- Indexes for table `predikat2`
--
ALTER TABLE `predikat2`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `predikat3`
--
ALTER TABLE `predikat3`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `kelas` (`kelas`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log_nilai`
--
ALTER TABLE `log_nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `log_siswa`
--
ALTER TABLE `log_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `id_mapel` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absen`
--
ALTER TABLE `absen`
  ADD CONSTRAINT `absen_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `catatan_walikelas`
--
ALTER TABLE `catatan_walikelas`
  ADD CONSTRAINT `catatan_walikelas_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `deskripsi1`
--
ALTER TABLE `deskripsi1`
  ADD CONSTRAINT `deskripsi1_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `deskripsik3`
--
ALTER TABLE `deskripsik3`
  ADD CONSTRAINT `deskripsik3_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `deskripsik4`
--
ALTER TABLE `deskripsik4`
  ADD CONSTRAINT `deskripsik4_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `extra`
--
ALTER TABLE `extra`
  ADD CONSTRAINT `extra_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`id_mapel`) REFERENCES `mata_pelajaran` (`id_mapel`) ON UPDATE CASCADE;

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`kelas`) REFERENCES `siswa` (`kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `predikat2`
--
ALTER TABLE `predikat2`
  ADD CONSTRAINT `predikat2_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `predikat3`
--
ALTER TABLE `predikat3`
  ADD CONSTRAINT `predikat3_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD CONSTRAINT `prestasi_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
