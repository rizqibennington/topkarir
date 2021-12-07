-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Des 2021 pada 00.32
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `topkarir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_student`
--

CREATE TABLE `mst_student` (
  `id` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mst_student`
--

INSERT INTO `mst_student` (`id`, `nama`, `password`) VALUES
('Id1', 'Dani', '$2y$05$OQePU5cD42V0LN8ylqnuJeTX0tdJ79hRSXRKRe4Xxt0kgMBhzJKDu'),
('Id2', 'Suresh', '$2y$05$SsUXnwSI3.hBsF1iD7SrnuHIn9HnEEVtThnLGSiONXDU/2QYj0GaK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_teacher`
--

CREATE TABLE `mst_teacher` (
  `id` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mst_teacher`
--

INSERT INTO `mst_teacher` (`id`, `nama`, `password`) VALUES
('admin', 'admin', '$2y$05$ERJTr248t.U8feSrNUQH8eEoJJ7ioSrqjQuMIH2efzeEk16KDOXp2'),
('Id1', 'Dimas', '$2y$05$gcJGyB/eFrkbgrQ8scOjQ.lXyseS9bd0aLXxcSZuoxqRTOR58No9e'),
('Id2', 'Eza', '$2y$05$pq2Y9zuIxuywSXm9uNh0guZfHm7TlfzmcpYWnaMWTGh1e6TpA3.g.');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mst_student`
--
ALTER TABLE `mst_student`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mst_teacher`
--
ALTER TABLE `mst_teacher`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
