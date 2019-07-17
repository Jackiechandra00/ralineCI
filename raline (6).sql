-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2019 at 02:27 PM
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
(1605098, 2, 0, 4, 0),
(1605099, 3, 2, 3, 1),
(1605105, 7, 1, 3, 0),
(1706150, 4, 1, 1, 2),
(1706172, 5, 2, 0, 0),
(1706198, 6, 0, 0, 0),
(1807202, 8, 0, 0, 2),
(1807257, 10, 5, 0, 0),
(1807261, 9, 0, 0, 0);

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
(1605097, 1, 6, '2019/2020', 'Ade Ermanisa memiliki sifat yang rajin. Selalu mengerjakan setiap tugas yang diberikan. Tetaplah semangat menuntut ilmu, karena ilmu ibaratkan cahaya yang akan menuntun Ananda dalam bertindak.'),
(1605098, 2, 6, '2019/2020', 'Muharriz memiliki sifat yang rajin. Selalu mengerjakan setiap tugas yang diberikan. Tetaplah semangat menuntut ilmu, karena ilmu ibaratkan cahaya yang akan menuntun Ananda dalam bertindak. Semoga apa '),
(1605099, 3, 6, '2019/2020', 'Dinul mempunyai paras tampan'),
(1605105, 7, 6, '2019/2020', 'Fakhri keren banget. Ia mahasiswa yang tidak sopan.'),
(1706150, 4, 4, '2019/2020', 'Ibnu Maulana memiliki sifat yang rajin. Selalu mengerjakan setiap tugas yang diberikan. Tetaplah semangat menuntut ilmu, karena ilmu ibaratkan cahaya yang akan menuntun Ananda dalam bertindak.'),
(1706172, 5, 4, '2019/2020', 'Rezky memiliki sifat yang rajin. Selalu mengerjakan setiap tugas yang diberikan. Tetaplah semangat menuntut ilmu, karena ilmu ibaratkan cahaya yang akan menuntun Ananda dalam bertindak.'),
(1706198, 6, 4, '2019/2020', 'Sultan Alamsyah memiliki sifat yang rajin. Selalu mengerjakan setiap tugas yang diberikan. Tetaplah semangat menuntut ilmu, karena ilmu ibaratkan cahaya yang akan menuntun Ananda dalam bertindak.'),
(1807202, 8, 2, '2019/2020', 'Jackie adalah anak yang sangat pandai ilmu bela diri karate.'),
(1807257, 10, 2, '2019/2020', 'Ananda Adinda Nurhazizah memiliki sifat yang rajin. Selalu mengerjakan setiap tugas yang diberikan. Tetaplah semangat menuntut ilmu, karena ilmu ibaratkan cahaya yang akan menuntun Ananda dalam bertin'),
(1807261, 9, 2, '2019/2020', 'Rapeng memiliki sifat yang rajin. Selalu mengerjakan setiap tugas yang diberikan. Tetaplah semangat menuntut ilmu, karena ilmu ibaratkan cahaya yang akan menuntun Ananda dalam bertindak.');

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
(1605098, 'B', 'Sikap Ananda secara umum sangat baik. Terbiasa dalam sholat dzuhur secara berjamaah, memberi dan menjawab salam dan berdoa kepada Allah.', 'Sikap Ananda secara umum sangat baik. Memiliki sikap jujur, santun, peduli, gotong royong dan percaya diri. '),
(1605099, 'SB', 'Sikap Ananda secara umum sangat baik. Memiliki sikap jujur, santun, peduli, gotong royong dan percaya diri. ', 'Sikap Ananda secara umum sangat baik. Terbiasa dalam sholat dzuhur secara berjamaah, memberi dan menjawab salam dan berdoa kepada Allah.'),
(1605105, 'B', 'Sikap Ananda secara umum sangat baik. Memiliki sikap jujur, santun, peduli, gotong royong dan percaya diri. ', 'Sikap Ananda secara umum sangat baik. Terbiasa dalam sholat dzuhur secara berjamaah, memberi dan menjawab salam dan berdoa kepada Allah.'),
(1706150, 'SB', 'Sikap Ananda secara umum sangat baik. Memiliki sikap jujur, santun, peduli, gotong royong dan percaya diri. ', 'Sikap Ananda secara umum sangat baik. Terbiasa dalam sholat dzuhur secara berjamaah, memberi dan menjawab salam dan berdoa kepada Allah.'),
(1706172, 'B', 'Sikap Ananda secara umum sangat baik. Memiliki sikap jujur, santun, peduli, gotong royong dan percaya diri. ', 'Sikap Ananda secara umum sangat baik. Terbiasa dalam sholat dzuhur secara berjamaah, memberi dan menjawab salam dan berdoa kepada Allah.'),
(1706198, 'SB', 'Sikap Ananda secara umum sangat baik. Memiliki sikap jujur, santun, peduli, gotong royong dan percaya diri. ', 'Sikap Ananda secara umum sangat baik. Terbiasa dalam sholat dzuhur secara berjamaah, memberi dan menjawab salam dan berdoa kepada Allah.'),
(1807202, 'SB', 'Sikap Ananda secara umum sangat baik. Memiliki sikap jujur, santun, peduli, gotong royong dan percaya diri. ', 'Sikap Ananda secara umum sangat baik. Terbiasa dalam sholat dzuhur secara berjamaah, memberi dan menjawab salam dan berdoa kepada Allah.'),
(1807257, 'B', 'Sikap Ananda secara umum sangat baik. Memiliki sikap jujur, santun, peduli, gotong royong dan percaya diri. ', 'Sikap Ananda secara umum sangat baik. Terbiasa dalam sholat dzuhur secara berjamaah, memberi dan menjawab salam dan berdoa kepada Allah.'),
(1807261, 'SB', 'Sikap Ananda secara umum sangat baik. Memiliki sikap jujur, santun, peduli, gotong royong dan percaya diri. ', 'Sikap Ananda secara umum sangat baik. Terbiasa dalam sholat dzuhur secara berjamaah, memberi dan menjawab salam dan berdoa kepada Allah.');

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
(1605098, 2, 'Sudah Berkembang tentang Kemampuan Berthoharoh secara tertulis'),
(1605099, 1, 'Sudah Berkembang tentang Kemampuan Berthoharoh secara tertulis'),
(1605105, 1, 'Sudah Berkembang tentang Kemampuan Berthoharoh secara tertulis'),
(1706150, 1, 'Sudah Berkembang tentang Kemampuan Berthoharoh secara tertulis'),
(1706172, 1, 'Sudah Berkembang tentang Kemampuan Berthoharoh secara tertulis'),
(1706198, 1, 'Sudah Berkembang tentang Kemampuan Berthoharoh secara tertulis'),
(1807202, 1, 'Sudah Berkembang tentang Kemampuan Berthoharoh secara tertulis'),
(1807257, 1, 'Sudah Berkembang tentang Kemampuan Berthoharoh secara tertulis'),
(1807261, 1, 'Sudah Berkembang tentang Kemampuan Berthoharoh secara tertulis');

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
(1605098, 1, 'Meningkat tentang Kemampuan Berthoharoh secara praktek'),
(1605099, 1, 'Meningkat tentang Kemampuan Berthoharoh secara praktek'),
(1605105, 1, 'Meningkat tentang Kemampuan Berthoharoh secara praktek'),
(1706150, 1, 'Meningkat tentang Kemampuan Berthoharoh secara praktek'),
(1706172, 1, 'Meningkat tentang Kemampuan Berthoharoh secara praktek'),
(1706198, 1, 'Meningkat tentang Kemampuan Berthoharoh secara praktek'),
(1807202, 1, 'Meningkat tentang Kemampuan Berthoharoh secara praktek'),
(1807257, 1, 'Meningkat tentang Kemampuan Berthoharoh secara praktek'),
(1807261, 1, 'Meningkat tentang Kemampuan Berthoharoh secara praktek');

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
(1605097, 'Sudah sangat berkembang dalam memahami teks bahasa Arab.', 'ARABIC CLUB'),
(1605098, 'Sudah sangat berkembang dalam memahami teks bahasa Arab.', 'ARABIC CLUB'),
(1605099, 'Sudah sangat berkembang dalam memahami teks bahasa Arab.', 'ARABIC CLUB'),
(1605105, 'Sudah sangat berkembang dalam memahami teks bahasa Arab.', 'ARABIC CLUB'),
(1706150, 'Sudah sangat berkembang dalam memahami teks bahasa Arab.', 'ARABIC CLUB'),
(1706172, 'Sudah sangat berkembang dalam memahami isi kajian Islam.', 'TAKLIM'),
(1706198, 'Sudah sangat berkembang dalam memahami isi kajian Islam.', 'TAKLIM'),
(1807202, 'Sudah sangat berkembang dalam memahami isi kajian Islam.', 'TAKLIM'),
(1807257, 'Sudah sangat berkembang dalam memahami isi kajian Islam.', 'TAKLIM'),
(1807261, 'Sudah sangat berkembang dalam memahami isi kajian Islam.', 'TAKLIM');

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
('jackie', '2019-07-17 14:23:10', 'login');

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
(1, 'fiqih'),
(2, 'hadist'),
(3, 'tafsir'),
(4, 'ushul_fiqih'),
(5, 'aqidah'),
(6, 'musthakah_hadist'),
(7, 'ushu_tafsir'),
(8, 'tajwid'),
(9, 'manhaj'),
(10, 'akhlak'),
(11, 'pkn'),
(12, 'bahasa_Indonesia'),
(13, 'bahasa_inggris'),
(14, 'matematika_wajib'),
(15, 'sejarah'),
(16, 'seni_budaya'),
(17, 'pjo'),
(18, 'keterampilan'),
(19, 'ips'),
(20, 'nahwu'),
(21, 'sharaf'),
(22, 'muhadatsah'),
(23, 'balaghan'),
(25, 'khat_imlah'),
(26, 'muthola\'ah'),
(27, 'tahfiz'),
(28, 'fisika'),
(29, 'biologi'),
(30, 'kimia'),
(31, 'matematika_peminatan');

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
(1605098, 1, 2, '85', '85', 'B', 87, '2019/2020', 6),
(1605099, 1, 3, '96', '85', 'SB', 87, '2019/2020', 6),
(1605105, 1, 7, '94', '90', 'B', 87, '2019/2020', 6),
(1706150, 1, 4, '89', '86', 'SB', 87, '2019/2020', 4),
(1706172, 1, 5, '96', '85', 'B', 85, '2019/2020', 4),
(1706198, 1, 6, '95', '87', 'SB', 85, '2019/2020', 4),
(1807202, 1, 8, '97', '87', 'SB', 87, '2019/2020', 2),
(1807257, 1, 10, '98', '87', 'B', 87, '2019/2020', 2),
(1807261, 1, 9, '97', '89', 'SB', 84, '2019/2020', 2),
(1605097, 1, 0, '87', '90', 'K', 0, '2020', 6),
(1605097, 15, 0, '89', '97', 'SB', 0, '2020', 6),
(1605097, 2, 0, '89', '87', 'B', 0, '2020', 6),
(1605098, 2, 0, '89', '94', 'B', 0, '2020', 6),
(1605098, 3, 0, '86', '93', 'B', 0, '2020', 6),
(1605098, 4, 0, '85', '92', 'B', 0, '2020', 6),
(1605098, 5, 0, '85', '92', 'B', 0, '2020', 6),
(1605099, 4, 0, '85', '96', 'B', 0, '2020', 6),
(1605099, 31, 0, '87', '89', 'B', 0, '2020', 6),
(1605097, 6, 0, '89', '87', 'B', 0, '2020', 6),
(1605100, 1, 0, '80', '87', 'C', 0, '2020', 6),
(1605097, 8, 0, '87', '87', 'B', 0, '2020', 6);

--
-- Triggers `nilai`
--
DELIMITER $$
CREATE TRIGGER `log_del_nilai` BEFORE DELETE ON `nilai` FOR EACH ROW INSERT INTO log_nilai VALUES ('',old.nis,'Data Dihapus',now())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `log_insert_nilai` AFTER INSERT ON `nilai` FOR EACH ROW INSERT INTO log_nilai VALUES ('',new.nis,'Tambah data', now())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `log_updt_nilai` BEFORE UPDATE ON `nilai` FOR EACH ROW INSERT INTO log_nilai VALUES ('',old.nis,'Data di update',now())
$$
DELIMITER ;

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
(1605097, 'asasas', 'assas', 'sasas');

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
(1605098, '0013417776', 'ATH THORIQ', 'XII B'),
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
(1605113, '0012179110', 'REZA AL FARISI', 'XII B'),
(1605115, '0014188193', 'AISYAH BASUKI', 'XII A'),
(1605116, '0013054139', 'ALBATROS BADRULINA', 'XII A'),
(1605117, '0025984522', 'ANNISA ANDRIANI', 'XII A'),
(1605118, '0013979009', 'CILVIA YOAHANA', 'XII A'),
(1605119, '0013732480', 'DELVI NURHALIZA PUTRI', 'XII A'),
(1605120, '0012211104', 'DIAN ATIKA SARI', 'XII A'),
(1605121, '0018593776', 'ESTER GATI BORU MANJORAN', 'XII A'),
(1605122, '0013351527', 'FEBBY SARACH DITA', 'XII A'),
(1605123, '0011952157', 'HERLI INDAH SARI', 'XII A'),
(1605124, '0014978283', 'NADYA SALSABILA PURBA', 'XII A'),
(1605125, '0013130666', 'NIKMAH HAFIZAH LUBIS', 'XII A'),
(1605126, '0014355162', 'NUR ZAKIYAH', 'XII A'),
(1605127, '0002054261', 'PUTRI INTAN SETIAWATI', 'XII A'),
(1605128, '0012535023', 'PUTRI NURUL HIDAYAH', 'XII A'),
(1605129, '0012871224', 'RIZKY LUTHFINA S.', 'XII A'),
(1605130, '0014490734', 'SIVA RAMADHANI BR.PINEM', 'XII  '),
(1605131, '0018212127', 'WITRI WARDANI', 'XII A'),
(1605132, '0013658158', 'WULANDARI', 'XII A'),
(1605133, '0018943496', 'ZAN CLARA BR. BARUS', 'XII A'),
(1705194, '000580431', 'NAURAH RAHMADHANI', 'XII A'),
(1705198, '0011181314', 'AULIA MILLZA FAKHRIZQII', 'XII B'),
(1706138, '0026035401', 'ABDULLAH GYMNASTIAR HSB', 'XI B'),
(1706139, '0022896970', 'ALFHANDHI HAGANA', 'XI B'),
(1706140, '0035918086', 'FALIH NAUFAL YUFA', 'XI B'),
(1706141, '0021872198', 'FATIH INSANI NASUTION', 'XI B'),
(1706142, '0035559118', 'FAYAHD FADILAH NASUTION', 'XI B'),
(1706143, '0022038055', 'IKHLASUL AMAL RAMBE', 'XI B'),
(1706145, '0021470396', 'IMAMUSHSHIDDIQY', 'XI B'),
(1706146, '0030211963', 'INDRA FATURACHMAN', 'XI B'),
(1706147, '0020224193', 'KHOLID ABDUL AZIZ', 'XI B'),
(1706148, '006328312', 'MUHAMMAD HABIB HANZHALAH', 'XI B'),
(1706149, '0023515356', 'MUHAMMAD IHSAN SYAHRIVI', 'XI B'),
(1706150, '0021270675', 'MUHAMMAD OMAR JIHATULLAH', 'XI B'),
(1706151, '0034390264', 'OK. MUHAMMAD ABTHAL AL-WAFI', 'XI B'),
(1706152, '0015439511', 'RAFINDO PURBA', 'XI B'),
(1706153, '0016993001', 'RAHMAN HADI SITUMORANG', 'XI B'),
(1706154, '0012286900', 'RAMADHAN QADRI', 'XI B'),
(1706155, '0022573030', 'REZA YUSAZMI', 'XI B'),
(1706156, '0030334282', 'RIFKI ABDURROFI', 'XI B'),
(1706157, '0022023153', 'SHAIFUL DARMAWAN', 'XI B'),
(1706158, '0030339118', 'SULTAN MUHAMMAR HAFIS', 'XI B'),
(1706159, '0023314517', 'TAUFIQURRAHIM HASIBUAN', 'XI B'),
(1706160, '002395118', 'UKASYAH', 'XI B'),
(1706161, '0016717225', 'YAZID ALIFFIAN', 'XI B'),
(1706162, '0019332430', 'YUDI ARDIANSYAH', 'XI B'),
(1706163, '0021259978', 'YUSUF AHMADI', 'XI B'),
(1706164, '0029293396', 'YUSUF AL-FAUZI', 'XI B'),
(1706165, '0025876545', 'ZULFAHRI PRANATA DAMANIK', 'XI B'),
(1706167, '0020280561', 'ALYA SHABRINA NASUTION', 'XI A'),
(1706168, '0027994993', 'ALYALOVA PUTRI SUBROTO', 'XI A'),
(1706170, '0024397117', 'ANNISA NOVITA PUTRI SIREGAR', 'XI A'),
(1706171, '0022096038', 'APRIANA ULAN DARI', 'XI A'),
(1706172, '0022818443', 'AYU DIVA ARDELIA', 'XI A'),
(1706173, '0021911460', 'BINTANG ANANTRA', 'XI A'),
(1706175, '0028174069', 'DEA ANNISA SESWOYO', 'XI A'),
(1706176, '0021653350', 'DURRA MUDRIKAH MATONDANG', 'XI A'),
(1706177, '0027666001', 'FANI DARYANI SYAH', 'XI A'),
(1706178, '0025630374', 'HARTATI OCTAVIA ARITONANG', 'XI A'),
(1706180, '008829190', 'MULYANI', 'XI A'),
(1706181, '0021675410', 'NABILA ZATA ARIFA', 'XI A'),
(1706182, '0022917786', 'NELLI AINI RIANTI', 'XI A'),
(1706183, '22656213', 'NIA WAHYUNI', 'XI A'),
(1706184, '26035345', 'NURUL RAFIQAH', 'XI A'),
(1706185, '25986715', 'SACHRANI SYAKILLA', 'XI A'),
(1706186, '21471882', 'SALMA MAULIDIAH', 'XI A'),
(1706187, '23379096', 'SALSABILLA', 'XI A'),
(1706189, '23736002', 'SHOFI FAHIRA AZZAHRA', 'XI A'),
(1706190, '22818627', 'SHOFIYAH HASANAN', 'XI A'),
(1706191, '238872169', 'SITI NAZLA RAIHANA', 'XI A'),
(1706192, '22751787', 'ULFAH RAHMAH', 'XI A'),
(1706195, '30215477', 'JIHAN FATMA DEWI', 'XI A'),
(1706196, '18606278', 'INDAH SYAHFITRI', 'XI A'),
(1706197, '2374218', 'MUHAMMMAD HIDAYAT RAMADHAN', 'XI B'),
(1706198, '17751192', 'SARAH NABILA', 'XI A'),
(1806199, '45873512', 'AHMAD MUZAKKIR LUBIS', 'XI B'),
(1807200, '34051488', 'ABDURRAHIM NUR', 'X B'),
(1807201, '34414162', 'ADENAN MUKHYAR RITONGA', 'X B'),
(1807202, '32151093', 'AKMAL RIDHO SOFIYANTO', 'X B'),
(1807203, '34736472', 'DIMAS GUSVI RADITYA', 'X B'),
(1807204, '28053933', 'FIQRIALDY TRISNA RAMADHAN', 'X B'),
(1807205, '34395522', 'GILANG MIRZA HABIBI', 'X B'),
(1807206, '33476142', 'JORDANIA RAMADHANA SILALAHI', 'X B'),
(1807207, '2040760114', 'M. HAFIDZ SYAH ALFAD', 'X B'),
(1807208, '32274663', 'M. HUFAIZI', 'X B'),
(1807209, '30792945', 'M. YUNUS AMDANI', 'X B'),
(1807210, '40155314', 'M. RIZKI ILAHI', 'X B'),
(1807211, '33686690', 'MHD. ABID AZ\'HAN', 'X B'),
(1807212, '27732538', 'MHD. SULI FIQIH HAMBALI', 'X B'),
(1807213, '38802983', 'MHD. ZUHRI SYAH UMAR', 'X B'),
(1807214, '38579127', 'MUHAMMAD ABDULLAH', 'X B'),
(1807215, '25112629', 'MUHAMMAD FAHIM AL-MUBAROQ', 'X B'),
(1807216, '32681039', 'MUHAMMAD FARRAS JUNDANA', 'X B'),
(1807217, '32914845', 'MUHAMMAD FATHUR RAMADHAN SIAGIAN', 'X B'),
(1807218, '3441478', 'MUHAMMAD HAEKAL OEMRY', 'X B'),
(1807219, '37004405', 'MUHAMMAD FIQRI HAFIZH', 'X B'),
(1807220, '2498362', 'MUHAMMAD USAMAH', 'X B'),
(1807221, '4384652', 'MUHAMMAD ZUBAIR', 'X B'),
(1807222, '31518370', 'PUTRI ARI BINTARO', 'X B'),
(1807223, '33857433', 'RABI\'AH AR RA\'IY', 'X B'),
(1807224, '30485264', 'RAMDHANIEL AMANI', 'X B'),
(1807225, '33673077', 'RANDI FAREZI', 'X B'),
(1807226, '32195365', 'ZAKY SYAHIDAN MANDAY', 'X B'),
(1807227, '32011380', 'ADE ERMANISA', 'X A'),
(1807228, '33274894', 'ADINDA NURKHAZIZAH', 'X A'),
(1807229, '32011243', 'ADZKIA KHAIRUNNISA', 'X A'),
(1807230, '35249090', 'AINUS SHAFIYAH', 'X A'),
(1807231, '33115231', 'AISAH AYU RAHMAH', 'X A'),
(1807232, '32994826', 'AISYAH HUSNI', 'X A'),
(1807233, '33555078', 'ALISYA SALSABILA', 'X A'),
(1807234, '33875812', 'ANNISYAH', 'X A'),
(1807235, '28513544', 'ARDEA PRAMESTI', 'X A'),
(1807236, '30715193', 'ARRIDHA SILFANI', 'X A'),
(1807237, '33715438', 'CHAIRUNNISA NUR FITRIANI', 'X A'),
(1807238, '303989932', 'DEA ARRANOYA', 'X A'),
(1807239, '31266019', 'HANIFAH FITRI', 'X A'),
(1807240, '323311511', 'HUNAISAH LUBIS', 'X A'),
(1807241, '40293338', 'JIHAN LUTHFIYAH NASUTION', 'X A'),
(1807242, '34372414', 'KAILA WANDA', 'X A'),
(1807243, '33256354', 'LIYANA ADRIANA', 'X A'),
(1807244, '30042313', 'MAISYARAH KHAIRUNNISA', 'X A'),
(1807245, '42470106', 'NAZIRAH AL ZANY', 'X A'),
(1807246, '32408017', 'NURUL ADINDA', 'X A'),
(1807247, '30457714', 'NURUL BALQIS', 'X A'),
(1807248, '34093602', 'NURUL KHAIRANI', 'X A'),
(1807249, '33917775', 'PUTRI KHAIRUNNISA', 'X A'),
(1807250, '30245524', 'RESTU AMALIA MAZID', 'X A'),
(1807251, '40050409', 'RIZKY MAY SHARAH', 'X A'),
(1807252, '40325385', 'SALSA MADINA', 'X A'),
(1807253, '30104071', 'SHOFI MAGRINA BR SIMBOLON', 'X A'),
(1807254, '33674503', 'SHOFI NABILA', 'X A'),
(1807255, '31396330', 'SHOFIYYAH ORIEEL', 'X A'),
(1807256, '2049459', 'SITI MARHAMAH', 'X A'),
(1807257, '31770233', 'SUCI RAMADHANI', 'X A'),
(1807258, '40317042', 'VIVI ORIZA SYATIVA', 'X A'),
(1807259, '30316727', 'YASMIN LATHIFAH', 'X A'),
(1807260, '31636582', 'YASMIN SALSABILA', 'X A'),
(1807261, '0034051492', 'ZAHRANI NABILAH', 'X A'),
(1807262, '0033984375', 'MOHAMMAD DAFFA ALIF', 'X B'),
(1807263, '0025241505', 'AHMAD RIANDI', 'X B'),
(1807264, '0030677925', 'NAJLA AZIZAH ZAFIRAH SITORUS', 'X A');

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
  ADD CONSTRAINT `absen_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON UPDATE CASCADE;

--
-- Constraints for table `catatan_walikelas`
--
ALTER TABLE `catatan_walikelas`
  ADD CONSTRAINT `catatan_walikelas_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON UPDATE CASCADE;

--
-- Constraints for table `deskripsi1`
--
ALTER TABLE `deskripsi1`
  ADD CONSTRAINT `deskripsi1_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON UPDATE CASCADE;

--
-- Constraints for table `deskripsik3`
--
ALTER TABLE `deskripsik3`
  ADD CONSTRAINT `deskripsik3_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON UPDATE CASCADE;

--
-- Constraints for table `deskripsik4`
--
ALTER TABLE `deskripsik4`
  ADD CONSTRAINT `deskripsik4_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON UPDATE CASCADE;

--
-- Constraints for table `extra`
--
ALTER TABLE `extra`
  ADD CONSTRAINT `extra_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON UPDATE CASCADE;

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`id_mapel`) REFERENCES `mata_pelajaran` (`id_mapel`) ON UPDATE CASCADE;

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`kelas`) REFERENCES `siswa` (`kelas`) ON UPDATE CASCADE;

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON UPDATE CASCADE;

--
-- Constraints for table `predikat2`
--
ALTER TABLE `predikat2`
  ADD CONSTRAINT `predikat2_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON UPDATE CASCADE;

--
-- Constraints for table `predikat3`
--
ALTER TABLE `predikat3`
  ADD CONSTRAINT `predikat3_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON UPDATE CASCADE;

--
-- Constraints for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD CONSTRAINT `prestasi_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
