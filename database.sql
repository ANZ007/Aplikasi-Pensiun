-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 11 Jan 2021 pada 12.36
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aplikasi_pensiun`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_pegawai`
--

CREATE TABLE `daftar_pegawai` (
  `nip` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `satker` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `bup` date NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `file_pensiun`
--

CREATE TABLE `file_pensiun` (
  `id` int(11) NOT NULL,
  `superpdna` varchar(255) NOT NULL,
  `skpi1thn` varchar(255) NOT NULL,
  `superhd` varchar(255) NOT NULL,
  `skcp` varchar(255) NOT NULL,
  `skkp` varchar(255) NOT NULL,
  `skpmk` varchar(255) DEFAULT NULL,
  `skjf1` varchar(255) DEFAULT NULL,
  `skjab` varchar(255) DEFAULT NULL,
  `skkppi` varchar(255) DEFAULT NULL,
  `skhentis` varchar(255) DEFAULT NULL,
  `skcltn` varchar(255) DEFAULT NULL,
  `skaktcltn` varchar(255) DEFAULT NULL,
  `file_jawaban` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `id_pensiun`
--

CREATE TABLE `id_pensiun` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `satker` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tracking`
--

CREATE TABLE `tracking` (
  `id` int(11) NOT NULL,
  `sampai_karowai` tinyint(1) DEFAULT NULL,
  `is_rollback` tinyint(1) DEFAULT NULL,
  `pesan_rollback` text DEFAULT NULL,
  `sampai_bkn` tinyint(1) DEFAULT NULL,
  `sampai_karowai_2` tinyint(1) DEFAULT NULL,
  `sampai_satker` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `bio` text DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `role` tinyint(4) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `bio`, `image`, `role`, `email`, `password`, `date_created`) VALUES
(1, 'Karowai', '', 'default_profile.jpg', 1, 'karowai@example.com', '$2y$10$qSKEUS8vRppnT/Ei8y3.Fu1POSwpWldNkSua27AshWkbMPU.Nk44e', 1608818172),
(2, 'SEKOLAH TINGGI MULTIMEDIA (STMM)', '', 'default_profile.jpg', 2, 'satker1@example.com', '$2y$10$91gCdk91zwhLmlaCnEuDT.RVIjJhzhZem8tCIaeUM3fDpAP8npgbK', 1609002573),
(3, 'DIREKTORAT PENGENDALIAN SUMBER DAYA DAN PERANGKAT POS DAN INFORMATIKA', NULL, 'default_profile.jpg', 2, 'satker2@example.com', '$2y$10$MACifNFNk.4ydqpJJcmaxepH4rdw1qHo/8YhS2MflkgzY27FHYZrC', 1610272849);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `daftar_pegawai`
--
ALTER TABLE `daftar_pegawai`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `file_pensiun`
--
ALTER TABLE `file_pensiun`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `id_pensiun`
--
ALTER TABLE `id_pensiun`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tracking`
--
ALTER TABLE `tracking`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `id_pensiun`
--
ALTER TABLE `id_pensiun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `file_pensiun`
--
ALTER TABLE `file_pensiun`
  ADD CONSTRAINT `FK_FILE_TO_ID` FOREIGN KEY (`id`) REFERENCES `id_pensiun` (`id`);

--
-- Ketidakleluasaan untuk tabel `tracking`
--
ALTER TABLE `tracking`
  ADD CONSTRAINT `FK_TRACKING_TO_ID` FOREIGN KEY (`id`) REFERENCES `id_pensiun` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
