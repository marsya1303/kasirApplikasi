-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2024 at 07:18 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasir2`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `detail_id` int(11) NOT NULL,
  `kode_produk` varchar(15) DEFAULT NULL,
  `nama_produk` varchar(50) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `penjualan_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`detail_id`, `kode_produk`, `nama_produk`, `harga`, `jumlah`, `penjualan_id`) VALUES
(1, 'M.001', 'Nasi Uduk', 20000, 2, 1),
(2, 'M.002', 'Nasi Goreng Spesial', 25000, 3, 1),
(3, 'M.003', 'Ayam Geprek', 15000, 1, 1),
(4, 'M.001', 'Nasi Uduk', 20000, 2, 2),
(5, 'M.003', 'Ayam Geprek', 15000, 2, 2),
(6, 'M.001', 'Nasi Uduk', 20000, 3, 3),
(7, 'M.002', 'Nasi Goreng Spesial', 25000, 3, 3),
(8, 'M.004', 'Ayam Bakar', 10000, 3, 3),
(9, 'M.001', 'Nasi Uduk', 20000, 2, 4),
(10, 'M.003', 'Ayam Geprek', 15000, 3, 4),
(11, 'M.004', 'Ayam Bakar', 10000, 2, 5),
(12, 'M.003', 'Ayam Geprek', 15000, 1, 5),
(13, 'M.001', 'Nasi Uduk', 20000, 2, 6),
(14, 'M.003', 'Ayam Geprek', 15000, 2, 6),
(15, 'M.001', 'Nasi Uduk', 20000, 2, 7),
(16, 'M.001', 'Nasi Uduk', 20000, 2, 8),
(17, 'M.003', 'Ayam Geprek', 15000, 3, 8),
(18, 'M.005', 'Nila Bakar', 25000, 2, 8),
(19, 'M.001', 'Nasi Uduk', 20000, 2, 9),
(20, 'M.002', 'Nasi Goreng Spesial', 25000, 2, 9),
(21, 'M.003', 'Ayam Geprek', 15000, 4, 9),
(22, 'M.001', 'Nasi Uduk', 20000, 1, 10),
(23, 'M.005', 'Nila Bakar', 25000, 5, 10),
(24, 'M.003', 'Ayam Geprek', 15000, 2, 10),
(25, 'M.003', 'Ayam Geprek', 15000, 5, 11),
(26, 'M.001', 'Nasi Uduk', 20000, 5, 11),
(27, 'M.002', 'Nasi Goreng Spesial', 25000, 5, 12),
(28, 'M.003', 'Ayam Geprek', 15000, 2, 12),
(29, 'M.004', 'Ayam Bakar', 10000, 3, 12),
(30, 'M.001', 'Nasi Uduk', 20000, 2, 13),
(31, 'M.002', 'Nasi Goreng Spesial', 25000, 3, 14),
(32, 'M.004', 'Ayam Bakar', 10000, 3, 14),
(33, 'M.005', 'Nila Bakar', 25000, 3, 14),
(34, 'D.002', 'Jus Sirsak', 10000, 3, 14),
(35, 'M.001', 'Nasi Uduk', 20000, 3, 15),
(36, 'M.003', 'Ayam Geprek', 15000, 1, 15),
(37, 'D.002', 'Jus Sirsak', 10000, 1, 15),
(38, 'D.002', 'Jus Sirsak', 10000, 3, 16),
(39, 'M.001', 'Nasi Uduk', 20000, 3, 16),
(40, 'D.002', 'Jus Sirsak', 10000, 3, 17),
(41, 'M.002', 'Nasi Goreng Spesial', 25000, 2, 17),
(44, 'M.003', 'Ayam Geprek', 15000, 1, 17),
(46, 'M.001', 'Nasi Uduk', 20000, 2, 18),
(47, 'D.001', 'Jus Alpukat', 10000, 2, 18),
(48, 'M.002', 'Nasi Goreng Spesial', 25000, 3, 19),
(49, 'M.004', 'Ayam Bakar', 10000, 2, 19),
(50, 'D.001', 'Jus Alpukat', 10000, 5, 19),
(51, 'M.001', 'Nasi Uduk', 20000, 1, 20),
(52, 'M.003', 'Ayam Geprek', 15000, 3, 20),
(53, 'M.001', 'Nasi Uduk', 20000, 2, 21),
(54, 'M.003', 'Ayam Geprek', 15000, 1, 21),
(55, 'D.001', 'Jus Alpukat', 10000, 3, 21),
(56, 'M.001', 'Nasi Uduk', 20000, 5, 22),
(57, 'M.005', 'Nila Bakar', 25000, 5, 22),
(58, 'M.001', 'Nasi Uduk', 20000, 2, 23),
(59, 'M.002', 'Nasi Goreng Spesial', 25000, 2, 23),
(60, 'M.003', 'Ayam Geprek', 15000, 1, 23),
(61, 'M.002', 'Nasi Goreng Spesial', 25000, 3, 24),
(62, 'D.002', 'Jus Sirsak', 10000, 2, 24),
(63, 'M.002', 'Nasi Goreng Spesial', 25000, 2, 25),
(64, 'M.003', 'Ayam Geprek', 15000, 1, 25),
(65, 'M.001', 'Nasi Uduk', 20000, 1, 26),
(66, 'M.002', 'Nasi Goreng Spesial', 25000, 2, 27),
(67, 'M.005', 'Nila Bakar', 25000, 17, 28),
(68, 'D.002', 'Jus Sirsak', 10000, 6, 29),
(69, 'D.001', 'Jus Alpukat', 10000, 50, 30),
(70, 'M.003', 'Roti Bakar Keju&coklat', 15000, 6, 32),
(71, 'M.001', 'Jus jambu merah', 20000, 22, 33),
(72, 'M.005', 'Roti Bakar Sikaya', 25000, 32, 34),
(73, 'M.001', 'Jus jambu merah', 20000, 1, 35),
(74, 'M.002', 'jus Apel', 25000, 3, 36),
(75, 'D.001', 'Jus Alpukat', 10000, 1, 36),
(76, 'M.001', 'Jus jambu merah', 20000, 1, 38),
(77, 'M.002', 'jus Apel', 25000, 2, 39),
(78, 'M.005', 'Roti Bakar Sikaya', 25000, 1, 39),
(79, 'D.001', 'Jus Alpukat', 10000, 1, 39),
(80, 'M.002', 'jus Apel', 25000, 2, 40),
(81, 'M.006', 'Pukis', 5000, 2, 41),
(82, 'M.002', 'jus Apel', 25000, 3, 42),
(83, 'M.005', 'Roti Bakar Sikaya', 25000, 1, 43),
(85, 'M.001', 'Jus jambu merah', 20000, 1, 44),
(86, 'M.004', 'Roti Bakar Nutella', 10000, 2, 45),
(87, 'M.004', 'Roti Bakar Nutella', 10000, 1, 46),
(88, 'D.002', 'Jus Sirsak', 10000, 1, 47),
(89, 'M.001', 'Jus jambu merah', 20000, 2, 48),
(90, 'D.001', 'Jus Alpukat', 10000, 1, 48),
(91, 'M.002', 'jus Apel', 25000, 1, 48),
(92, 'CF', 'Cheesecake Furry', 42000, 1, 51),
(93, 'BC', 'Blueberry Cheesecake', 42000, 5, 55),
(94, 'RV', 'Red Velvet', 42000, 1, 57),
(95, 'CDV', 'Chocolate De Ville', 39000, 4, 57),
(96, 'SC', 'Strawberry Cheesecake', 42000, 80, 58);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `kode_pelanggan` varchar(15) DEFAULT NULL,
  `nama_pelanggan` varchar(30) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `kode_pelanggan`, `nama_pelanggan`, `alamat`, `no_hp`) VALUES
(1, 'P.001', 'Agus Rusdiana', 'Jl. K.H. Abdul Halim No. 2000 Majalengka', '085111222333'),
(2, 'P.002', 'Asep Darmawan', 'Lingk. Dahlia No. 20 Majalengka', '085222333444'),
(3, 'P.003', 'Budi Siregar', 'Jl.cendrawasih.No.25 Surabaya', '089660602121'),
(4, 'P.004', 'Cristy', 'Jl.jalak No.45 Sumedang', '09877623415'),
(5, 'P.005', 'Uul', 'Jl.mawar.No.07 Ujung Jaya', '086751123098'),
(6, 'P.006', 'Dinda', 'Jl.cendrawasih.No.33 Cimahi', '0838469812'),
(7, 'P.007', 'Joko', 'Jl.Marapi Timur.No.88.Tanjung Priok', '089123788'),
(8, 'P.008', 'Budi ', 'Jl.Marapi Barat.No.14.jakarta utara', '023467811123'),
(9, 'P.009', 'Utami', 'Jl.simpang.No.51.Tanjung Priok', '0973456778221'),
(10, 'P.010', 'Putri', 'Jl.stadion selatan.No.20 jakarta barat', '08347890054'),
(11, 'P.011', 'Mentari', 'Jl.Swasarana.No.11.Jakarta utara', '099954368832'),
(12, 'P.012', 'Paulina', 'Jl.Sepakat.No.33.jakarta barat', '0856678345221'),
(13, 'P.013', 'Jojo', 'Jl.Tujuh Belas.No.08.Jakarta  Utara', '0933211145556'),
(14, 'P.014', 'Chealsy', 'Jl.upaya.No.04.jakarta timur', '08998543221889'),
(15, 'P.015', 'marsya', 'Jl.swatirta.No.23.jakarta pusat', '08122347789223');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `penjualan_id` int(11) NOT NULL,
  `tanggal` datetime DEFAULT NULL,
  `total_harga` int(11) DEFAULT NULL,
  `bayar` int(11) DEFAULT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`penjualan_id`, `tanggal`, `total_harga`, `bayar`, `id_pelanggan`, `id_petugas`, `nama_petugas`) VALUES
(1, '2024-01-25 14:05:09', 130000, 150000, 1, 1, 'Yoga Eryana'),
(2, '2024-01-25 14:10:39', 70000, 100000, 2, 1, 'Yoga Eryana'),
(3, '2024-01-25 15:03:52', 165000, 170000, 1, 4, 'M. Gibran'),
(4, '2024-01-25 19:30:03', 85000, 100000, 1, 4, 'M. Gibran'),
(5, '2024-01-26 10:46:11', 35000, 50000, NULL, 4, 'M. Gibran'),
(6, '2024-01-27 11:45:34', 70000, 100000, NULL, 1, 'Yoga Eryana'),
(7, '2024-01-31 11:46:04', NULL, NULL, NULL, 0, NULL),
(8, '2024-03-02 16:59:56', 135000, 150000, 1, 1, 'Yoga Eryana'),
(9, '2024-03-02 18:02:41', 150000, 200000, 2, 4, 'M. Gibran'),
(10, '2024-03-02 18:17:12', 175000, 200000, 1, 4, 'M. Gibran'),
(11, '2024-03-02 18:44:20', 175000, 200000, 1, 4, 'M. Gibran'),
(12, '2024-03-04 12:21:47', 185000, 200000, 1, 4, 'M. Gibran'),
(13, '2024-03-04 12:28:57', 40000, 50000, NULL, 1, 'Yoga Eryana'),
(14, '2024-03-04 20:23:41', 210000, 220000, 1, 2, 'Aldena Restu'),
(15, '2024-03-04 21:32:27', 85000, 100000, NULL, 1, 'Yoga Eryana'),
(16, '2024-03-05 09:09:39', 90000, 100000, NULL, 1, 'Yoga Eryana'),
(17, '2024-03-05 12:20:59', 95000, 100000, 1, 4, 'M. Gibran'),
(18, '2024-03-05 13:23:30', 60000, 70000, 2, 4, 'M. Gibran'),
(19, '2024-03-09 13:28:47', 145000, 150000, 1, 5, 'Ronaldo'),
(20, '2024-04-30 20:56:25', 65000, 100000, NULL, 4, 'M. Gibran'),
(21, '2024-05-28 12:47:55', 85000, 100000, 1, 1, 'Yoga Eryana'),
(22, '2024-06-08 14:09:44', 225000, 250000, 2, 2, 'Aldena Restu'),
(23, '2024-08-09 22:16:42', 105000, 120000, 2, 1, 'Yoga Eryana'),
(24, '2024-08-09 22:20:44', 95000, 100000, NULL, 1, 'Yoga Eryana'),
(25, '2024-08-09 22:27:04', 65000, 100000, NULL, 4, 'M. Gibran'),
(26, '2024-10-23 18:59:06', 20000, 20000, NULL, 1, 'Yoga Eryana'),
(27, '2024-10-25 14:32:48', 50000, 50000, 1, 6, 'iin suhartini'),
(28, '2024-10-25 14:33:56', 425000, 450000, NULL, 6, 'iin suhartini'),
(29, '2024-10-25 14:52:05', 60000, 60000, NULL, 6, 'iin suhartini'),
(30, '2024-10-25 15:56:18', 500000, 600000, NULL, 6, 'iin suhartini'),
(31, '2024-10-26 07:03:15', NULL, NULL, NULL, 0, NULL),
(32, '2024-10-26 14:28:07', 90000, 90000, NULL, 4, 'Rudiana'),
(33, '2024-10-26 14:35:55', 440000, 440000, NULL, 6, 'iin suhartini'),
(34, '2024-10-26 17:06:58', 800000, 800000, NULL, 6, 'iin suhartini'),
(35, '2024-10-26 19:29:45', 20000, 20000, NULL, 6, 'iin suhartini'),
(36, '2024-10-27 11:25:15', 85000, 100000, 2, 6, 'iin suhartini'),
(37, '2024-10-27 11:35:36', NULL, NULL, NULL, 0, NULL),
(38, '2024-10-27 11:35:56', NULL, NULL, NULL, 0, NULL),
(39, '2024-10-27 12:03:49', 85000, 90000, 2, 4, 'Rudiana'),
(40, '2024-10-27 12:15:19', 50000, 50000, 0, 6, 'iin suhartini'),
(41, '2024-10-27 12:19:08', 10000, 10000, 3, 6, 'iin suhartini'),
(42, '2024-10-27 12:19:48', 75000, 100000, 2, 6, 'iin suhartini'),
(43, '2024-10-27 12:20:36', 25000, 30000, 3, 6, 'iin suhartini'),
(45, '2024-10-27 12:37:20', 20000, 20000, 3, 9, 'abel'),
(46, '2024-10-27 12:37:42', 10000, 10000, 2, 9, 'abel'),
(47, '2024-10-27 12:38:25', 10000, 10000, 0, 9, 'abel'),
(48, '2024-10-27 12:39:39', 75000, 100000, NULL, 9, 'abel'),
(49, '2024-10-27 13:36:55', NULL, NULL, NULL, 0, NULL),
(50, '2024-10-29 09:28:03', NULL, NULL, NULL, 0, NULL),
(51, '2024-10-31 07:51:36', 42000, 45000, 1, 6, 'iin suhartini'),
(52, '2024-10-31 08:48:18', NULL, NULL, NULL, 0, NULL),
(53, '2024-10-31 09:02:48', NULL, NULL, NULL, 0, NULL),
(54, '2024-10-31 09:31:51', NULL, NULL, NULL, 0, NULL),
(55, '2024-11-07 07:24:38', 210000, 210000, 3, 6, 'iin suhartini'),
(56, '2024-11-07 08:43:04', NULL, NULL, NULL, 0, NULL),
(57, '2024-11-07 08:50:40', 198000, 200000, 2, 4, 'Rudiana'),
(58, '2024-11-07 13:13:03', 3360000, 3360000, 6, 4, 'Rudiana');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `nama_petugas` varchar(35) DEFAULT NULL,
  `level` enum('admin','petugas') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `username`, `password`, `nama_petugas`, `level`) VALUES
(4, 'kasir1', '$2y$10$y3w83bapwMaPPcC9OFQU4OVML6FBePIRjWY2DxT..pUuJr4e6s05e', 'Rudiana', 'petugas'),
(6, 'iin suhartini', '$2y$10$j9y0k958Vv.AAgYKBCM/gu1VRR0Y.QuSbDyCc3qFmw.i48vYCPoNW', 'iin suhartini', 'admin'),
(9, 'kasir2', '$2y$10$5C7sak/0OMbtsHJI700jSubS49Wdz7.Tug5h0PtShwu7JAzFBH3R.', 'abel', 'petugas');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `kode_produk` varchar(15) DEFAULT NULL,
  `nama_produk` varchar(50) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `kode_produk`, `nama_produk`, `harga`, `stok`) VALUES
(9, 'BC', 'Blueberry Cheesecake', 42000, 100),
(10, 'CF', 'Cheesecake Furry', 42000, 100),
(11, 'RV', 'Red Velvet', 42000, 100),
(12, 'CT', 'Chocolate Tiramisu', 42000, 100),
(13, 'TC', 'Triple Chocolate', 39000, 100),
(14, 'CC', 'Chocomaltine Cheesecake', 40000, 100),
(15, 'SC', 'Strawberry Cheesecake', 42000, 100),
(16, 'CDV', 'Chocolate De Ville', 39000, 100),
(17, 'MC', 'Milk Chocolate', 39000, 150),
(18, 'MFC', 'Mix Fruit Cheesecake', 40000, 100);

-- --------------------------------------------------------

--
-- Table structure for table `tambah_stok`
--

CREATE TABLE `tambah_stok` (
  `tambah_id` int(11) NOT NULL,
  `tanggal` datetime DEFAULT NULL,
  `kode_produk` varchar(15) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tambah_stok`
--

INSERT INTO `tambah_stok` (`tambah_id`, `tanggal`, `kode_produk`, `jumlah`) VALUES
(1, '2024-01-31 08:39:02', 'M.001', 20),
(2, '2024-01-31 08:39:48', 'M.002', 10),
(3, '2024-01-31 08:41:23', 'M.003', 20),
(4, '2024-01-31 08:43:53', 'M.005', 10),
(5, '0000-00-00 00:00:00', 'M.001', 10),
(6, '0000-00-00 00:00:00', 'M.001', 50),
(7, '0000-00-00 00:00:00', 'D.002', 10),
(8, '2024-10-25 10:57:51', 'D.001', 300);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`detail_id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`penjualan_id`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `tambah_stok`
--
ALTER TABLE `tambah_stok`
  ADD PRIMARY KEY (`tambah_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `penjualan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tambah_stok`
--
ALTER TABLE `tambah_stok`
  MODIFY `tambah_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
