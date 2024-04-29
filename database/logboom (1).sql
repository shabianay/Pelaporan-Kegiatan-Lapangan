-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2024 at 09:29 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `logboom`
--

-- --------------------------------------------------------

--
-- Table structure for table `pelaporan`
--

CREATE TABLE `pelaporan` (
  `id` varchar(6) NOT NULL,
  `n_pelapor` varchar(30) NOT NULL,
  `t_pelapor` varchar(30) NOT NULL,
  `b_pelapor` varchar(30) NOT NULL,
  `n_kegiatan` varchar(30) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `tgl_kegiatan` date NOT NULL,
  `j_kegiatan` varchar(50) NOT NULL,
  `ket` text NOT NULL,
  `foto` blob NOT NULL,
  `status` text NOT NULL,
  `ket_petugas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelaporan`
--

INSERT INTO `pelaporan` (`id`, `n_pelapor`, `t_pelapor`, `b_pelapor`, `n_kegiatan`, `lokasi`, `kecamatan`, `tgl_kegiatan`, `j_kegiatan`, `ket`, `foto`, `status`, `ket_petugas`) VALUES
('NP0001', 'Joko Tingkir', 'Alugoro 1.1', 'Tibum', 'Pengondisian', 'Pasar Ikan Pabean', 'Pabean', '2024-04-22', 'Waktu Tiba: 07:13 Waktu Penanganan: 07:19', 'Pengondisian pasar ikan pabean dan terdapat laka.', 0x666f746f2f36363235623438356163313964, 'Sedang diajukan', '-'),
('NP0002', 'joko', 'Jatisuro', 'Tibum', 'ji', 'Gubeng Airlangga', 'Karang Pilang', '2024-04-22', 'Waktu Tiba: 19:13 Waktu Penanganan: 19:17', 'bjj', 0x666f746f2f36363235643036623138306237, 'Sedang diajukan', '-'),
('NP0003', 'Joko Tingkir', 'Jolodoro 2.1', 'TranTibum', 'Penghalauan', 'Gubeng Airlangga', 'Kecamatan Gubeng', '2024-04-23', 'Waktu Tiba: 19:13 Waktu Penanganan: 19:17', 'mklopoiy', 0x666f746f2f36363237303836353137636233, 'Sedang diajukan', '-'),
('NP0004', 'joko', 'Alugoro 3.2', 'Tibum', 'Pengawasan', 'Pasar Ikan Pabean', 'Kecamatan Gubeng', '2024-04-23', 'Waktu Tiba: 07:13 Waktu Penanganan: 07:19', 'aman', 0x666f746f2f36363237313162633563633435, 'Sedang diajukan', '-'),
('NP0005', 'joko susanto', 'Jolodoro 2.3', 'Tibum', 'Pengawasan', 'Gubeng Airlangga', 'Gubeng', '2024-04-29', 'Waktu Tiba: 19:13 Waktu Penanganan: 19:17', 'steril', 0x666f746f2f36363265656632646232353866, 'Sedang diajukan', '-'),
('NP0006', 'Joko susilo', 'Jolodoro 1.1', 'Tibum', 'Pengondisian Pengamen', 'Ampel', 'Kecamatan Pakal', '2024-04-29', 'Waktu Tiba: 19:13 Waktu Penanganan: 19:17', 'steril', 0x666f746f2f36363265663364383635653630, 'Sedang diajukan', '-'),
('NP0007', 'adjahd', 'Alugoro 3.2', 'TranTibum', 'Sosialisasi', 'Pasar Ikan Pabean', 'Kecamatan Tandes', '2024-04-29', 'Waktu Tiba: 19:13 Waktu Penanganan: 19:17', 'ddd', 0x666f746f2f36363266343833383737663966, 'Sedang diajukan', '-');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` varchar(16) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(30) NOT NULL,
  `img` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `name`, `img`, `status`) VALUES
('1', 'admin', '$2y$10$vx9rULGqEcbI1khsJ2su8eRHIhZlpmvQW5sPZu3jmk471MtfaNqrm', 'Admin', '1617430645_admin2.png', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pelaporan`
--
ALTER TABLE `pelaporan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
