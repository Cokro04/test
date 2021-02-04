-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Feb 2021 pada 10.58
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_test`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_club`
--

CREATE TABLE `tbl_club` (
  `id_club` int(11) NOT NULL,
  `nama_club` varchar(255) NOT NULL,
  `kota_club` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_club`
--

INSERT INTO `tbl_club` (`id_club`, `nama_club`, `kota_club`) VALUES
(2, 'psm', 'makasar'),
(3, 'persib', 'bandung'),
(4, 'persipura', 'papua'),
(5, 'persija', 'jakarta'),
(7, 'persita', 'tangerang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_poin`
--

CREATE TABLE `tbl_poin` (
  `id_poin` int(11) NOT NULL,
  `nama_club` varchar(255) NOT NULL,
  `poin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_poin`
--

INSERT INTO `tbl_poin` (`id_poin`, `nama_club`, `poin`) VALUES
(1, 'persib', 7),
(2, 'persija', 4),
(3, 'psm', 0),
(4, 'persipura', 0),
(5, 'persita', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tanding`
--

CREATE TABLE `tbl_tanding` (
  `id_tanding` int(11) NOT NULL,
  `tim_a` varchar(255) NOT NULL,
  `skor_a` varchar(255) NOT NULL,
  `tim_b` varchar(255) NOT NULL,
  `skor_b` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_tanding`
--

INSERT INTO `tbl_tanding` (`id_tanding`, `tim_a`, `skor_a`, `tim_b`, `skor_b`) VALUES
(35, 'persib', '0', 'persija', '0'),
(36, 'persib', '1', 'psm', '0'),
(37, 'persija', '1', 'persipura', '0'),
(38, 'persib', '5', 'persita', '0');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_club`
--
ALTER TABLE `tbl_club`
  ADD PRIMARY KEY (`id_club`);

--
-- Indeks untuk tabel `tbl_poin`
--
ALTER TABLE `tbl_poin`
  ADD PRIMARY KEY (`id_poin`);

--
-- Indeks untuk tabel `tbl_tanding`
--
ALTER TABLE `tbl_tanding`
  ADD PRIMARY KEY (`id_tanding`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_club`
--
ALTER TABLE `tbl_club`
  MODIFY `id_club` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_poin`
--
ALTER TABLE `tbl_poin`
  MODIFY `id_poin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_tanding`
--
ALTER TABLE `tbl_tanding`
  MODIFY `id_tanding` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
