-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2026 at 11:25 AM
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
-- Database: `bett`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `pengarang` varchar(255) NOT NULL,
  `kategori` varchar(100) DEFAULT NULL,
  `stok` int(5) DEFAULT 0,
  `cover_buku` varchar(255) DEFAULT 'default.jpg',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `judul`, `pengarang`, `kategori`, `stok`, `cover_buku`, `created_at`, `updated_at`) VALUES
(1, 'Filosofi Teras', 'Henry Manampiring', 'Self Improvement', 5, 'filosofi.jpg', '2026-04-08 09:58:45', '2026-04-08 09:58:45'),
(2, 'Bumi Manusia', 'Pramoedya Ananta Toer', 'Novel', 0, 'bumimanusia.jpg', '2026-04-08 09:58:45', '2026-04-08 09:58:45'),
(3, 'Laskar Pelangi', 'Andrea Hirata', 'Novel', 3, 'laskar.jpg', '2026-04-08 09:58:45', '2026-04-08 09:58:45'),
(4, 'Sains Dasar', 'Dr. Khoirul', 'Pelajaran', 10, 'sains.jpg', '2026-04-08 09:58:45', '2026-04-08 09:58:45'),
(5, 'Filosofi Teras', 'Henry Manampiring', 'Self Improvement', 5, 'filosofi.jpg', '2026-04-08 09:59:31', '2026-04-08 09:59:31'),
(6, 'Bumi Manusia', 'Pramoedya Ananta Toer', 'Novel', 0, 'bumimanusia.jpg', '2026-04-08 09:59:31', '2026-04-08 09:59:31'),
(7, 'Laskar Pelangi', 'Andrea Hirata', 'Novel', 3, 'laskar.jpg', '2026-04-08 09:59:31', '2026-04-08 09:59:31'),
(8, 'Sains Dasar', 'Dr. Khoirul', 'Pelajaran', 10, 'sains.jpg', '2026-04-08 09:59:31', '2026-04-08 09:59:31');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_user` int(11) UNSIGNED NOT NULL,
  `id_buku` int(11) UNSIGNED NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `status` enum('Dipinjam','Kembali','Terlambat') DEFAULT 'Dipinjam'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `password` varchar(100) NOT NULL,
  `foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `username`, `role`, `password`, `foto`) VALUES
(1, 'Aboyy', 'Boyy', 'user', '$2y$10$FMQRdH0ecCbZZVWtN2n7/u1YZN/gr7X98Er4NG4sqDAWCXlZwmB6S', '1775093367_46bccd6aaddb966c13d6.webp'),
(2, 'Gisaa', 'Gisaa', 'admin', '$2y$10$2pebsUiHMjnyPZrA7A.Yq.S1/9X0h4dEqiOZUwO.OoLnkx92pcGLa', '1775092353_341980bc6b65e811273d.webp'),
(3, 'obeyy', 'beyy', 'user', '$2y$10$R4341EU/1uSaQI./JFOOC.t6TDNlqhuzH5gVjsJfZLj71h3qCqLg2', '1775106317_840d54408ab9cbc3f60a.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `books` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
