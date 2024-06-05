-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2024 at 07:55 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `websitegereja`
--

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_ibadah`
--

CREATE TABLE `jadwal_ibadah` (
  `id_jadwal` int(11) NOT NULL,
  `hari_tgl` varchar(100) NOT NULL,
  `waktu_ibadah` varchar(11) NOT NULL,
  `jenis_keg` varchar(100) NOT NULL,
  `lokasi_ibadah` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal_ibadah`
--

INSERT INTO `jadwal_ibadah` (`id_jadwal`, `hari_tgl`, `waktu_ibadah`, `jenis_keg`, `lokasi_ibadah`) VALUES
(1, 'SELASA', '12.00 WIT', 'DOA PUASA', 'GEREJA'),
(2, '~ \" ~', '17.30 WIT', 'IBADAH SEKTOR JOYFULL & RAJAWALI', 'RUMAH JEMAAT'),
(3, 'RABU', '17.30 WIT', 'IBADAH SEKTOR DEBORA SION', 'RUMAH JEMAAT'),
(4, '~ \" ~', '18.00 WIT', 'IBADAH SEKTOR IMANUEL, VICTORY & CALVARI', 'RUMAH JEMAAT'),
(5, 'KAMIS', '17.00 WIT', 'IBADAH WANITA BETHEL INDONESIA', 'GEREJA'),
(6, '~ \" ~', '19.00 WIT', 'IBADAH YOUTH GRACE MINISTRY', 'GEREJA'),
(7, 'JUMAT', '18.00 WIT', 'IBADAH PRIA SEJATI & IBADAH SEKTOR NUSANIWE', 'GEREJA & RUMAH JEMAAT'),
(8, 'SABTU', '17.00 WIT', 'DOA PERSIAPAN PELAYAN', 'GEREJA'),
(9, '~ \" ~', '19.00 WIT', 'LATIHAN TIM MUSIK', 'GEREJA'),
(10, 'MINGGU', '09.00 WIT', 'IBADAH RAYA & SEKOLAH MINGGU', 'GEREJA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jadwal_ibadah`
--
ALTER TABLE `jadwal_ibadah`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal_ibadah`
--
ALTER TABLE `jadwal_ibadah`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
