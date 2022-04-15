-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Apr 2022 pada 15.56
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `article`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `posts`
--

CREATE TABLE `posts` (
  `Id` int(11) NOT NULL,
  `Title` varchar(200) NOT NULL,
  `Content` text NOT NULL,
  `Category` varchar(100) NOT NULL,
  `Created_Date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Updated_Date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `posts`
--

INSERT INTO `posts` (`Id`, `Title`, `Content`, `Category`, `Created_Date`, `Updated_Date`, `Status`) VALUES
(1, 'Indonesia Vs Singapuraaa', 'Pertandingan Sepakbola Indonesia vs Singapura berakhir skor dengan 5-0 untuk kemenangan Indonesia yang sangat menguntungkan untuk lolos ke piala dunia yang dimainkan di Jakarta Internasional Stadium', 'Sepak Bolaaa', '2022-04-14 14:00:41', '2022-04-14 14:02:51', 'Draft'),
(3, 'Indonesia VS Amerika Serikat', 'Jojo berhasil lolos ke babak selanjutnya setelah mengalahkan single putra dari negara brazil dengan skor 21-10 dan 21-18 yang memastikan jojo akan bertemu dengan ginting', 'Bulu Tangkis', '2022-04-14 14:02:33', '2022-04-15 13:28:09', 'Trash'),
(4, 'Indonesia VS Thailand', 'Jojo berhasil lolos ke babak selanjutnya setelah mengalahkan single putra dari negara Thailand dengan skor 21-10 dan 21-05 yang memastikan jojo akan bertemu dengan ginting', 'Bulu Tangkis', '2022-04-15 09:44:55', '0000-00-00 00:00:00', 'Trash'),
(5, 'Indonesia VS Thailand', 'Timnas Futsal Indonesia berhasil lolos ke babak FInal setelah berhasil mengalahkan Myanmar dengan skor telak 6-1 pada ajang AFF CUP Futsal Championship 2022. Timnas Indonesia akan berhadapan dengan Thailand di partai Final', 'Futsal', '2022-04-15 13:31:05', '0000-00-00 00:00:00', 'Publish'),
(6, 'Indonesia VS Thailand', 'Timnas Futsal Indonesia berhasil lolos ke babak FInal setelah berhasil mengalahkan Myanmar dengan skor telak 6-1 pada ajang AFF CUP Futsal Championship 2022. Timnas Indonesia akan berhadapan dengan Thailand di partai Final', 'Futsal', '2022-04-15 13:33:14', '0000-00-00 00:00:00', 'Publish'),
(7, 'Indonesia VS Thailand', 'Timnas Futsal Indonesia berhasil lolos ke babak FInal setelah berhasil mengalahkan Myanmar dengan skor telak 6-1 pada ajang AFF CUP Futsal Championship 2022. Timnas Indonesia akan berhadapan dengan Thailand di partai Final', 'Futsal', '2022-04-15 13:33:16', '2022-04-15 13:33:48', 'Trash');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `posts`
--
ALTER TABLE `posts`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
