-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 10 Feb 2020 pada 04.50
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pertanian`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto`
--

CREATE TABLE `foto` (
  `id` int(11) NOT NULL,
  `pengguna_id` int(11) NOT NULL,
  `foto_orang` varchar(128) NOT NULL,
  `foto_kk` varchar(128) NOT NULL,
  `foto_lahan` varchar(128) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `foto`
--

INSERT INTO `foto` (`id`, `pengguna_id`, `foto_orang`, `foto_kk`, `foto_lahan`, `created_at`, `updated_at`) VALUES
(1, 16, './assets/img/pengguna/17/people_photo.png', './assets/img/pengguna/17/kk_photo.png', './assets/img/pengguna/17/lahan_photo.png', '2020-02-08 13:34:38', '2020-02-08 13:34:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `general`
--

CREATE TABLE `general` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `slug` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `value` varchar(256) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `rt/rw` varchar(64) NOT NULL,
  `desa` varchar(128) NOT NULL,
  `kecamatan` varchar(128) NOT NULL,
  `kabupaten` varchar(128) NOT NULL,
  `nik` varchar(128) NOT NULL,
  `nomor_kk` varchar(128) NOT NULL,
  `titik_koordinat` varchar(128) NOT NULL,
  `luas` int(11) NOT NULL,
  `panen` int(11) NOT NULL,
  `biaya_tanam` int(11) NOT NULL,
  `nomor_anggota` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id`, `name`, `rt/rw`, `desa`, `kecamatan`, `kabupaten`, `nik`, `nomor_kk`, `titik_koordinat`, `luas`, `panen`, `biaya_tanam`, `nomor_anggota`, `created_at`, `updated_at`) VALUES
(16, 'Salung prastyo', '05/04', 'SROBYONG', 'MLONGGO', 'JEPARA', '00668989990', '00668989990', '7°16\'27.26&quot;S/111°29\'16.92&quot;T', 14322, 213444, 230000000, 5, '2020-02-08 13:34:10', '2020-02-08 13:34:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `login_token` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `login_token`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 'root', '$2y$10$IuOlnXLXuhvpgShjLOsvhOirQOz130BFxsp2vabnQbDMSdhQrusLK', '$2y$10$Ad59FKo2sxKdJYlpoIlYL.3Ns622cnizG5T0ePzamG9FpAFz8qVWC', 1, '2019-11-25 02:43:59', '2019-12-14 07:13:01');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `general`
--
ALTER TABLE `general`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
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
-- AUTO_INCREMENT untuk tabel `foto`
--
ALTER TABLE `foto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `general`
--
ALTER TABLE `general`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
