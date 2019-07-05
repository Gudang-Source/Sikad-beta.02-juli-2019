-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2019 at 03:13 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sikad`
--

-- --------------------------------------------------------

--
-- Table structure for table `superadmin`
--

CREATE TABLE `superadmin` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `superadmin`
--

INSERT INTO `superadmin` (`id`, `nama`, `username`, `password`) VALUES
(1, 'NawaIdea', 'sajadahcinta', '6f4816769f83fb8e0b62ee882ff03b13');

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_user` int(35) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `email` varchar(35) NOT NULL,
  `divisi` varchar(35) NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_user`, `kode`, `user_name`, `email`, `divisi`, `status`) VALUES
(1, 'admin', 'root', 'sopo_aku@ymail.com', 'bidang2', 'active'),
(2, 'admin', 'root2', 'root@admin.com', 'Bid. 1', 'active'),
(6, 'admin', 'root3', 'root3@pc.malang.com', 'Div. Posting', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tb_header`
--

CREATE TABLE `tb_header` (
  `id` int(11) NOT NULL,
  `brand` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_header`
--

INSERT INTO `tb_header` (`id`, `brand`) VALUES
(1, 'PC PMII KOTA MALANG');

-- --------------------------------------------------------

--
-- Table structure for table `tb_image_kta`
--

CREATE TABLE `tb_image_kta` (
  `id` int(11) NOT NULL,
  `url` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_image_kta`
--

INSERT INTO `tb_image_kta` (`id`, `url`) VALUES
(1, 'file_1525791786.jpeg'),
(2, 'file_1525791801.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kader_anggota`
--

CREATE TABLE `tb_kader_anggota` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `kode` varchar(100) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `foto` text NOT NULL,
  `jk` enum('lk','pr') NOT NULL,
  `alamat_asal` text NOT NULL,
  `alamat_malang` text NOT NULL,
  `kode_kom` varchar(11) NOT NULL,
  `kode_rayon` varchar(11) NOT NULL,
  `tlp` int(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `blog` varchar(250) NOT NULL,
  `fb` varchar(250) NOT NULL,
  `tw` varchar(250) NOT NULL,
  `ig` varchar(250) NOT NULL,
  `lahir` varchar(200) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `motto` longtext NOT NULL,
  `ayah` varchar(200) NOT NULL,
  `ibu` varchar(200) NOT NULL,
  `alamat_ortu` text NOT NULL,
  `alasan` longtext NOT NULL,
  `organisasi` longtext NOT NULL,
  `bakat` text NOT NULL,
  `minat` text NOT NULL,
  `nim` int(20) NOT NULL,
  `tlp_ortu` int(20) NOT NULL,
  `since_enter` date NOT NULL,
  `kampus` varchar(200) NOT NULL,
  `fakultas` varchar(200) NOT NULL,
  `jurusan` varchar(200) NOT NULL,
  `st_pc` enum('ya','tidak') NOT NULL,
  `st_pk` enum('ya','tidak') NOT NULL,
  `st_pr` enum('ya','tidak') NOT NULL,
  `status` enum('inactive','active') NOT NULL,
  `reg_count` int(255) DEFAULT NULL,
  `qrcode` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `kategori`) VALUES
(1, 'kritik'),
(2, 'saran'),
(3, 'hiburan'),
(4, 'informasi'),
(5, 'instruksi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_komisariat`
--

CREATE TABLE `tb_komisariat` (
  `id_kom` int(11) NOT NULL,
  `kode_kom` varchar(200) NOT NULL,
  `nama_kom` varchar(200) NOT NULL,
  `kampus` varchar(200) NOT NULL,
  `no_telp` int(20) NOT NULL,
  `email` varchar(250) NOT NULL,
  `website` varchar(250) NOT NULL,
  `fb` varchar(250) NOT NULL,
  `tw` varchar(250) NOT NULL,
  `ig` varchar(250) NOT NULL,
  `media` text NOT NULL,
  `alamat` text NOT NULL,
  `since` date NOT NULL,
  `ket` longtext NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_konten`
--

CREATE TABLE `tb_konten` (
  `id_konten` int(11) NOT NULL,
  `id_kader` varchar(100) NOT NULL,
  `id_kom` varchar(100) NOT NULL,
  `id_rayon` varchar(100) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `judul` varchar(250) NOT NULL,
  `posting` tinytext NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `gambar` varchar(250) NOT NULL,
  `to_konten` varchar(20) NOT NULL,
  `id_pengurus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_konten`
--

INSERT INTO `tb_konten` (`id_konten`, `id_kader`, `id_kom`, `id_rayon`, `id_kategori`, `judul`, `posting`, `tanggal`, `gambar`, `to_konten`, `id_pengurus`) VALUES
(1, 'V-04.02.a1.aa1.2018.001', 'a1', 'aa1', 2, 'Tahu ', '<p>kjlkjf asdkfjisajdfljasdf</p>\r\n<p>sdffklasjdf skdfjaksljdflkjasdflfkjasldkjfas</p>\r\n<p>fsldkfjlksjdf iejfkljs 02i3i0</p>', '2019-06-30 15:57:09', '30', 'aa1', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_rayon`
--

CREATE TABLE `tb_rayon` (
  `id_rayon` int(11) NOT NULL,
  `kode_rayon` varchar(200) NOT NULL,
  `nama_rayon` varchar(35) NOT NULL,
  `kampus` varchar(200) NOT NULL,
  `fakultas` varchar(35) NOT NULL,
  `kode_kom` varchar(200) DEFAULT NULL,
  `no_telp` int(20) NOT NULL,
  `media` text NOT NULL,
  `website` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `alamat` text NOT NULL,
  `since` date NOT NULL,
  `ket` longtext NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `fb` varchar(200) NOT NULL,
  `tw` varchar(200) NOT NULL,
  `ig` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_testing_log`
--

CREATE TABLE `tb_testing_log` (
  `id` int(11) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `user` varchar(250) NOT NULL,
  `pass` varchar(250) NOT NULL,
  `pk` varchar(30) NOT NULL,
  `pr` varchar(30) NOT NULL,
  `logig` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_testing_log`
--

INSERT INTO `tb_testing_log` (`id`, `kode`, `user`, `pass`, `pk`, `pr`, `logig`) VALUES
(6, 'admin', 'root', '202cb962ac59075b964b07152d234b70', '', '', 1),
(7, 'admin', 'root2', 'caf1a3dfb505ffed0d024130f58c5cfa', '', '', 1),
(11, 'admin', 'root3', 'caf1a3dfb505ffed0d024130f58c5cfa', '', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `superadmin`
--
ALTER TABLE `superadmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_header`
--
ALTER TABLE `tb_header`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_image_kta`
--
ALTER TABLE `tb_image_kta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kader_anggota`
--
ALTER TABLE `tb_kader_anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_komisariat`
--
ALTER TABLE `tb_komisariat`
  ADD PRIMARY KEY (`id_kom`);

--
-- Indexes for table `tb_konten`
--
ALTER TABLE `tb_konten`
  ADD PRIMARY KEY (`id_konten`);

--
-- Indexes for table `tb_rayon`
--
ALTER TABLE `tb_rayon`
  ADD PRIMARY KEY (`id_rayon`);

--
-- Indexes for table `tb_testing_log`
--
ALTER TABLE `tb_testing_log`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `superadmin`
--
ALTER TABLE `superadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_user` int(35) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_image_kta`
--
ALTER TABLE `tb_image_kta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_kader_anggota`
--
ALTER TABLE `tb_kader_anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_komisariat`
--
ALTER TABLE `tb_komisariat`
  MODIFY `id_kom` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_konten`
--
ALTER TABLE `tb_konten`
  MODIFY `id_konten` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_rayon`
--
ALTER TABLE `tb_rayon`
  MODIFY `id_rayon` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_testing_log`
--
ALTER TABLE `tb_testing_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
