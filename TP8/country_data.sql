-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Bulan Mei 2022 pada 16.21
-- Versi server: 10.4.16-MariaDB
-- Versi PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `country_data`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `country_city`
--

CREATE TABLE `country_city` (
  `id` int(11) NOT NULL,
  `countryName` varchar(100) NOT NULL,
  `countryCode` varchar(100) NOT NULL,
  `cityName` varchar(100) NOT NULL,
  `mayor` varchar(50) DEFAULT NULL,
  `cityPopulation` varchar(100) NOT NULL,
  `submittedAt` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `country_city`
--

INSERT INTO `country_city` (`id`, `countryName`, `countryCode`, `cityName`, `mayor`, `cityPopulation`, `submittedAt`) VALUES
(1, 'Indonesia', '00001', 'Tanah Datar', 'Eka Putra, S.E., M.M.', '356085', '2022-05-01 11:27:09'),
(2, 'Brazil', '00123', 'Rio De Janeiro', 'Eduardo Paes', '6748000', '2022-05-01 11:28:33'),
(3, 'Cuba', '06340', 'Havana', 'Juan Contino Aslán', '2130000', '2022-05-01 11:29:52'),
(4, 'United Kingdom', '55555', 'London', 'Shadiq Khan', '8982000', '2022-05-01 11:31:18');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `country_city`
--
ALTER TABLE `country_city`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `country_city`
--
ALTER TABLE `country_city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
