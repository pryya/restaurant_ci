-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2020 at 01:06 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_resto`
--

-- --------------------------------------------------------

--
-- Table structure for table `daftar_menu`
--

CREATE TABLE `daftar_menu` (
  `id_menu` varchar(20) NOT NULL,
  `nama_menu` varchar(20) NOT NULL,
  `jenis_menu` varchar(20) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `deskripsi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `daftar_menu`
--

INSERT INTO `daftar_menu` (`id_menu`, `nama_menu`, `jenis_menu`, `harga_satuan`, `foto`, `deskripsi`) VALUES
('ME-0001', 'sate', 'Makanan', 12000, 'sate.png', 'Sate Kambing'),
('ME-0002', 'Tahu Gejrot', 'Makanan', 12000, 'tahugejrot.png', 'Enakkk'),
('ME-0003', 'Lotek', 'Makanan', 12000, 'lotek1.png', 'pedasss');

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_pesanan` varchar(20) NOT NULL,
  `id_menu` varchar(20) NOT NULL,
  `nama_menu` varchar(20) NOT NULL,
  `jlm_pesan` int(11) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `det_transaksi`
--

CREATE TABLE `det_transaksi` (
  `no_transaksi` varchar(20) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `jlm_pesan` int(11) NOT NULL,
  `harga_satuan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `nama_level` enum('Admin','Kasir','Koki','Owner') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `nama_level`) VALUES
(1, 'Admin'),
(2, 'Kasir'),
(3, 'Koki'),
(4, 'Owner');

-- --------------------------------------------------------

--
-- Stand-in structure for view `login_jo1`
-- (See below for the actual view)
--
CREATE TABLE `login_jo1` (
`id_user` varchar(20)
,`username` varchar(20)
,`password` varchar(20)
,`nama_user` varchar(20)
,`id_level` int(11)
,`nama_level` enum('Admin','Kasir','Koki','Owner')
);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `id_pesanan` varchar(20) NOT NULL,
  `id_menu` varchar(20) NOT NULL,
  `jlm_pesan` int(11) NOT NULL,
  `no_meja` varchar(20) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `jam_pesan` varchar(20) NOT NULL,
  `total` int(11) NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'B'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `id_pesanan`, `id_menu`, `jlm_pesan`, `no_meja`, `harga_satuan`, `tgl_pesan`, `jam_pesan`, `total`, `status`) VALUES
(55, 'PE-001', 'ME-0001', 3, 'M-0001', 12000, '2020-02-26', '22:05:26', 36000, 'B'),
(57, 'PE-002', 'ME-0003', 3, 'M-0002', 12000, '2020-02-26', '22:05:54', 36000, 'S'),
(58, 'PE-002', 'ME-0002', 4, 'M-0002', 12000, '2020-02-26', '22:06:03', 48000, 'S'),
(59, 'PE-003', 'ME-0002', 4, 'M-0001', 12000, '2020-03-04', '08:09:33', 48000, 'B'),
(60, 'PE-004', 'ME-0003', 4, 'M-0002', 12000, '2020-03-04', '21:49:35', 48000, 'B');

-- --------------------------------------------------------

--
-- Stand-in structure for view `pesanan_jo1`
-- (See below for the actual view)
--
CREATE TABLE `pesanan_jo1` (
`id` int(11)
,`id_pesanan` varchar(20)
,`id_menu` varchar(20)
,`nama_menu` varchar(20)
,`jlm_pesan` int(11)
,`no_meja` varchar(20)
,`harga_satuan` int(11)
,`tgl_pesan` date
,`jam_pesan` varchar(20)
,`total` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan_temp`
--

CREATE TABLE `pesanan_temp` (
  `id` int(11) NOT NULL,
  `id_pesanan` varchar(20) NOT NULL,
  `jlm_pesan` int(11) NOT NULL,
  `no_meja` varchar(20) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `jam_pesan` varchar(20) NOT NULL,
  `id_menu` varchar(20) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Stand-in structure for view `pesana_jo2`
-- (See below for the actual view)
--
CREATE TABLE `pesana_jo2` (
`id` int(11)
,`id_pesanan` varchar(20)
,`id_menu` varchar(20)
,`nama_menu` varchar(20)
,`jlm_pesan` int(11)
,`no_meja` varchar(20)
,`harga_satuan` int(11)
,`tgl_pesan` date
,`jam_pesan` varchar(20)
,`total` int(11)
,`status` char(1)
);

-- --------------------------------------------------------

--
-- Table structure for table `posisi_meja`
--

CREATE TABLE `posisi_meja` (
  `no_meja` varchar(11) NOT NULL,
  `deskripsi_meja` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posisi_meja`
--

INSERT INTO `posisi_meja` (`no_meja`, `deskripsi_meja`) VALUES
('M-0001', 'Di pesan'),
('M-0002', 'kosong');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `no_transaksi` varchar(20) NOT NULL,
  `no_pesanan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_jual` date NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi1`
--

CREATE TABLE `transaksi1` (
  `id_transaksi` varchar(20) NOT NULL,
  `id_pesanan` varchar(50) NOT NULL,
  `id_user` varchar(50) NOT NULL,
  `tgl_jual` varchar(50) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi1`
--

INSERT INTO `transaksi1` (`id_transaksi`, `id_pesanan`, `id_user`, `tgl_jual`, `subtotal`, `bayar`, `kembalian`) VALUES
('TR-0001', 'PE-002', 'US-0001', '1, 04-03-2020 20:09:54', 96000, 100000, 4000);

-- --------------------------------------------------------

--
-- Table structure for table `t_pesanan`
--

CREATE TABLE `t_pesanan` (
  `id` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `id_menu` varchar(20) NOT NULL,
  `jlm_pesan` int(11) NOT NULL,
  `no_meja` int(11) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `jam_pesan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama_user` varchar(20) NOT NULL,
  `id_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_user`, `id_level`) VALUES
('US-0001', 'admin', 'admin', 'Pryya Haseny', 1),
('US-0002', 'kasir', 'kasir', 'pryyahaseny', 2),
('US-0003', 'koki', 'koki', 'pryyahaseny11', 3),
('US-0004', 'owner', 'owner', 'pryyahaseny1104', 4);

-- --------------------------------------------------------

--
-- Structure for view `login_jo1`
--
DROP TABLE IF EXISTS `login_jo1`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `login_jo1`  AS  select `user`.`id_user` AS `id_user`,`user`.`username` AS `username`,`user`.`password` AS `password`,`user`.`nama_user` AS `nama_user`,`level`.`id_level` AS `id_level`,`level`.`nama_level` AS `nama_level` from (`user` left join `level` on(`user`.`id_level` = `level`.`id_level`)) ;

-- --------------------------------------------------------

--
-- Structure for view `pesanan_jo1`
--
DROP TABLE IF EXISTS `pesanan_jo1`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pesanan_jo1`  AS  select `pesanan_temp`.`id` AS `id`,`pesanan_temp`.`id_pesanan` AS `id_pesanan`,`daftar_menu`.`id_menu` AS `id_menu`,`daftar_menu`.`nama_menu` AS `nama_menu`,`pesanan_temp`.`jlm_pesan` AS `jlm_pesan`,`pesanan_temp`.`no_meja` AS `no_meja`,`daftar_menu`.`harga_satuan` AS `harga_satuan`,`pesanan_temp`.`tgl_pesan` AS `tgl_pesan`,`pesanan_temp`.`jam_pesan` AS `jam_pesan`,`pesanan_temp`.`total` AS `total` from (`pesanan_temp` left join `daftar_menu` on(`pesanan_temp`.`id_menu` = `daftar_menu`.`id_menu`)) ;

-- --------------------------------------------------------

--
-- Structure for view `pesana_jo2`
--
DROP TABLE IF EXISTS `pesana_jo2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pesana_jo2`  AS  select `pesanan`.`id` AS `id`,`pesanan`.`id_pesanan` AS `id_pesanan`,`daftar_menu`.`id_menu` AS `id_menu`,`daftar_menu`.`nama_menu` AS `nama_menu`,`pesanan`.`jlm_pesan` AS `jlm_pesan`,`pesanan`.`no_meja` AS `no_meja`,`daftar_menu`.`harga_satuan` AS `harga_satuan`,`pesanan`.`tgl_pesan` AS `tgl_pesan`,`pesanan`.`jam_pesan` AS `jam_pesan`,`pesanan`.`total` AS `total`,`pesanan`.`status` AS `status` from (`pesanan` left join `daftar_menu` on(`pesanan`.`id_menu` = `daftar_menu`.`id_menu`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftar_menu`
--
ALTER TABLE `daftar_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `det_transaksi`
--
ALTER TABLE `det_transaksi`
  ADD PRIMARY KEY (`no_transaksi`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan_temp`
--
ALTER TABLE `pesanan_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posisi_meja`
--
ALTER TABLE `posisi_meja`
  ADD PRIMARY KEY (`no_meja`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`no_transaksi`);

--
-- Indexes for table `transaksi1`
--
ALTER TABLE `transaksi1`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `t_pesanan`
--
ALTER TABLE `t_pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `pesanan_temp`
--
ALTER TABLE `pesanan_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `t_pesanan`
--
ALTER TABLE `t_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
