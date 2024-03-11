-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Mar 2024 pada 11.56
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pemesanan-hotel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamar`
--

CREATE TABLE `kamar` (
  `id_kamar` int(11) NOT NULL,
  `kamar` varchar(30) NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `kamar`, `harga`, `deskripsi`) VALUES
(1, '1', '150', 'bersih dan terawat'),
(2, '2', '200', 'Nyaman dan di jamin puas'),
(3, '3', '100', 'Bersih\r\n'),
(4, '4', '200', 'Bersih dan enak di liat'),
(5, '5', '56', 'bersih dan nyaman\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `kamar` varchar(30) NOT NULL,
  `nm_user` varchar(40) NOT NULL,
  `lama_inap` int(11) NOT NULL,
  `tgl_transaksi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `kamar`, `nm_user`, `lama_inap`, `tgl_transaksi`) VALUES
(7, '1', 'Giri', 8, '2024-01-23 08:56:35'),
(9, '2', 'Giri', 15, '2024-01-23 11:38:58'),
(10, '4', 'Giri', 12, '2024-01-25 08:05:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`) VALUES
(1, 'Apang'),
(2, 'Nugraha'),
(3, 'Giri');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`) VALUES
(1, 'APANG', 'APANG', '$argon2i$v=19$m=65536,t=4,p=1$eEl5TUVacElzcGdsVVRyag$3BZEJCdug+LQHt3aP6iyE5uSQa1Ht4B6Zg6+n9dZqzc'),
(2, 'RII', 'RII', '$argon2i$v=19$m=65536,t=4,p=1$U3pRb3RXVVcwMGV1SlJaUA$f59RbBk2R6WCqm4zTU22xNDL3dPjDV1RdpRHkIRcxYg'),
(7, 'GIRI SEJATI NUGRAHA', 'GIRI SEJATI NUGRAHA', '$argon2i$v=19$m=65536,t=4,p=1$NnlwTlpiSnQzY2xqYWtCZw$LXTIu6Mqo3EezDCCxQWXPjx2Gs1nlOH62R4arth/hYU'),
(8, 'ADMIN', 'ADMIN', '$argon2i$v=19$m=65536,t=4,p=1$dG4xT2JTUnIyMUNTYUo3bw$A2vBkZSgpMZJzCeft+WO5D8VWYmQlywDevW2WcTc6rc'),
(9, 'GSN', 'GSN', '$argon2i$v=19$m=65536,t=4,p=1$UEh1ZEZ0WkZObXhaTDZabg$3/ZdFTKeU8CwdF+h7jnvvWhd292Rlv5ibqSpgaS5Qsw');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id_kamar`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
