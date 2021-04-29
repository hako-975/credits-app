-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Apr 2021 pada 01.38
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `credits`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `credits`
--

CREATE TABLE `credits` (
  `id_credit` int(11) NOT NULL,
  `asset` varchar(100) NOT NULL,
  `creator` varchar(100) NOT NULL,
  `date_created` int(11) NOT NULL,
  `id_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `credits`
--

INSERT INTO `credits` (`id_credit`, `asset`, `creator`, `date_created`, `id_type`) VALUES
(1, '3LE Low Poly Cloud Pack', 'The Fallout Nerd', 0, 1),
(2, 'Anime Character : Arisa (MC)', 'Dai Yong Xiang', 0, 1),
(3, 'Desert Kits 64 Sample', 'Sagital3D', 0, 1),
(4, 'Fantasy Monster - Skeleton', 'Teamjoker', 0, 1),
(5, 'Free Fantasy Spider', 'Kalamona', 0, 1),
(6, 'Free HDR Sky', 'ProAssets', 0, 1),
(7, 'Japanese Classroom', 'T I A N', 0, 1),
(8, 'Joystick Pack', 'Fenerax Studios', 0, 1),
(9, 'Lowpoly Nature & Village Pack', 'Hasan3DModels', 0, 1),
(10, 'Scorpion', 'anthonyvanoo', 0, 1),
(11, 'BGM Boss Appear', 'www.bensound.com', 0, 2),
(12, 'Campfire - Roa (BGM Level Grass) ', 'Audio Library', 0, 2),
(13, 'Danger Around The Corner', 'Darren Curtis', 0, 2),
(14, 'Desert Travel (BGM Level Desert)', 'MusicForVideosCreators', 0, 2),
(15, 'sfx', 'freesound.org', 0, 3),
(16, 'sfx', 'taira-komori.jpn.org', 0, 3),
(17, 'sfx', 'www.storyblocks.com', 0, 3),
(18, 'sfx', 'www.videvo.net', 0, 3),
(19, 'sfx', 'www.zapsplat.com', 0, 3),
(20, 'tess', 'sfx', 1619739112, 0),
(21, 'bgm', 'tesbgm', 1619739112, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `type`
--

CREATE TABLE `type` (
  `id_type` int(11) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `type`
--

INSERT INTO `type` (`id_type`, `type`) VALUES
(1, 'assets'),
(2, 'bgm'),
(3, 'sfx');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `credits`
--
ALTER TABLE `credits`
  ADD PRIMARY KEY (`id_credit`),
  ADD KEY `id_type` (`id_type`);

--
-- Indeks untuk tabel `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id_type`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `credits`
--
ALTER TABLE `credits`
  MODIFY `id_credit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `type`
--
ALTER TABLE `type`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
