-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2024 at 02:45 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_replikas`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kandidat`
--

CREATE TABLE `kandidat` (
  `id_kandidat` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `nama_calon` varchar(50) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `foto` varchar(150) NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL,
  `id_kk` int(11) NOT NULL,
  `jumlah_suara` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kandidat`
--

INSERT INTO `kandidat` (`id_kandidat`, `nis`, `nama_calon`, `kelas`, `foto`, `visi`, `misi`, `id_kk`, `jumlah_suara`, `user_id`) VALUES
(17, 89723, 'bagasa', 'xrpl 2', '20240215114032529.jpg', '                                                                            - melatih menguap seperti kapan dan dimana                                                                    ', '                                                                            membuat rekor menguap                                                                                       ', 18, 0, 83),
(34, 8193789, 'rajib sulaiman', 'X rpl 1', '20240428155003934[1].jpg', '                                                melakukan latihan setiap hari \r\nolahraga lari 10km tanpa henti\r\nmakan makanan yang berprotein                        ', '                                                bandan berotot dan bururat                                                                                    ', 40, 1, 81),
(37, 78324, 'fazri', 'x rpl 2', 'Fazri.jpg', 'menanmkan bom di berbagai tempat .\r\nmempraktekan nuklir.\r\nmembuat senjata pemusnah masal.\r\nmembuat virus abcd.\r\n      ', ' menghancurkan dunia                             ', 44, 0, 77);

-- --------------------------------------------------------

--
-- Table structure for table `konsentrasi_keahlian`
--

CREATE TABLE `konsentrasi_keahlian` (
  `id_kk` int(11) NOT NULL,
  `nama_kk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `konsentrasi_keahlian`
--

INSERT INTO `konsentrasi_keahlian` (`id_kk`, `nama_kk`) VALUES
(16, ''),
(17, ''),
(18, 'menguap'),
(34, 'asdf'),
(35, '34234'),
(36, '34234'),
(37, '34234'),
(38, 'fasd'),
(40, 'Olahra olahraga'),
(41, 'cadjo'),
(44, 'pembuat BOOM'),
(45, 'pembuat BOOM'),
(46, 'dendam ');

-- --------------------------------------------------------

--
-- Table structure for table `panitia`
--

CREATE TABLE `panitia` (
  `id_panitia` int(11) NOT NULL,
  `nama_panitia` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `panitia`
--

INSERT INTO `panitia` (`id_panitia`, `nama_panitia`, `user_id`) VALUES
(36, 'israil', 90);

-- --------------------------------------------------------

--
-- Table structure for table `pemilih`
--

CREATE TABLE `pemilih` (
  `id_pemilih` int(11) NOT NULL,
  `nis` int(8) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `keterangan` enum('siswa aktif','alumni') NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemilih`
--

INSERT INTO `pemilih` (`id_pemilih`, `nis`, `nama_siswa`, `kelas`, `keterangan`, `user_id`) VALUES
(12, 10212887, 'maulana ergi alip falah', 'x rpl 2', 'siswa aktif', 85),
(13, 8263874, 'akbar', 'x rpl 2', 'siswa aktif', 88),
(14, 982384, 'pendekar', 'xrpl 2 ', 'alumni', 91);

-- --------------------------------------------------------

--
-- Table structure for table `pilihan_pemilih`
--

CREATE TABLE `pilihan_pemilih` (
  `id_pilihan` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `id_kandidat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pilihan_pemilih`
--

INSERT INTO `pilihan_pemilih` (`id_pilihan`, `user_id`, `id_kandidat`) VALUES
(8, 77, 34);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` enum('admin','panitia','pemilih','kandidat') NOT NULL DEFAULT 'pemilih'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin', 'admin'),
(77, 'fazri', 'fazri', 'kandidat'),
(80, 'admin', 'admin', 'admin'),
(81, 'rajib', 'rajib123', 'kandidat'),
(82, 'maulana', 'maulana', 'pemilih'),
(83, 'israil', 'israil', 'panitia'),
(85, 'ergi alip', 'admin', 'pemilih'),
(86, 'admin', 'admin', 'admin'),
(88, 'barr', 'admin', 'pemilih'),
(90, 'israil', 'israil', 'panitia'),
(91, 'pendekar', 'pendekar', 'pemilih'),
(92, 'maulana', '$2y$10$HR2LpJZMcy1Bf', 'pemilih');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `kandidat`
--
ALTER TABLE `kandidat`
  ADD PRIMARY KEY (`id_kandidat`),
  ADD KEY `id_kk` (`id_kk`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `konsentrasi_keahlian`
--
ALTER TABLE `konsentrasi_keahlian`
  ADD PRIMARY KEY (`id_kk`);

--
-- Indexes for table `panitia`
--
ALTER TABLE `panitia`
  ADD PRIMARY KEY (`id_panitia`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `pemilih`
--
ALTER TABLE `pemilih`
  ADD PRIMARY KEY (`id_pemilih`),
  ADD UNIQUE KEY `nis` (`nis`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `pilihan_pemilih`
--
ALTER TABLE `pilihan_pemilih`
  ADD PRIMARY KEY (`id_pilihan`),
  ADD KEY `id_kandidat` (`id_kandidat`),
  ADD KEY `id_pemilih` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kandidat`
--
ALTER TABLE `kandidat`
  MODIFY `id_kandidat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `konsentrasi_keahlian`
--
ALTER TABLE `konsentrasi_keahlian`
  MODIFY `id_kk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `panitia`
--
ALTER TABLE `panitia`
  MODIFY `id_panitia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `pemilih`
--
ALTER TABLE `pemilih`
  MODIFY `id_pemilih` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pilihan_pemilih`
--
ALTER TABLE `pilihan_pemilih`
  MODIFY `id_pilihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `administrator`
--
ALTER TABLE `administrator`
  ADD CONSTRAINT `administrator_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `kandidat`
--
ALTER TABLE `kandidat`
  ADD CONSTRAINT `kandidat_ibfk_2` FOREIGN KEY (`id_kk`) REFERENCES `konsentrasi_keahlian` (`id_kk`) ON DELETE CASCADE,
  ADD CONSTRAINT `kandidat_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `panitia`
--
ALTER TABLE `panitia`
  ADD CONSTRAINT `panitia_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pemilih`
--
ALTER TABLE `pemilih`
  ADD CONSTRAINT `pemilih_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `pilihan_pemilih`
--
ALTER TABLE `pilihan_pemilih`
  ADD CONSTRAINT `pilihan_pemilih_ibfk_2` FOREIGN KEY (`id_kandidat`) REFERENCES `kandidat` (`id_kandidat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pilihan_pemilih_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
