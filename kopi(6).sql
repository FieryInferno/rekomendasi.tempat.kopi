-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 31 Des 2020 pada 07.25
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kopi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas`
--

CREATE TABLE `fasilitas` (
  `idFasilitas` bigint(191) NOT NULL,
  `nama` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `fasilitas`
--

INSERT INTO `fasilitas` (`idFasilitas`, `nama`) VALUES
(1, 'wifi'),
(2, 'Pesan Antar'),
(3, 'Ruang VIP'),
(4, 'Instagramable'),
(5, '24 Jam'),
(6, 'Harga Dibawah Rp. 50.000'),
(7, 'Area Merokok'),
(8, 'Area Outdoor');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitasTempat`
--

CREATE TABLE `fasilitasTempat` (
  `idFasilitasTempat` bigint(191) NOT NULL,
  `tempat` varchar(191) NOT NULL,
  `fasilitas` bigint(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `fasilitasTempat`
--

INSERT INTO `fasilitasTempat` (`idFasilitasTempat`, `tempat`, `fasilitas`) VALUES
(2, '1', 1),
(3, '2', 1),
(5, '4', 1),
(6, '5', 1),
(8, '7', 1),
(9, '8', 1),
(11, '3', 1),
(12, '6', 1),
(13, '9', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `image`
--

CREATE TABLE `image` (
  `id_image` varchar(191) NOT NULL,
  `id_tempat_ngopi` varchar(191) NOT NULL,
  `foto` varchar(191) NOT NULL,
  `id_review` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `image`
--

INSERT INTO `image` (`id_image`, `id_tempat_ngopi`, `foto`, `id_review`) VALUES
('image_5fd8c0fb74114', '1', 'Cuplikan_layar_dari_2020-11-19_21_26_301.png', '1'),
('image_5fd8c0fb89974', '1', 'Cuplikan_layar_dari_2020-11-28_14-11-09.png', '1'),
('image_5fd8c0fba1a34', '1', 'Cuplikan_layar_dari_2020-11-28_17-43-471.png', '1'),
('image_5fd8c0fbe0dc0', '1', 'Cuplikan_layar_dari_2020-12-01_17-51-24.png', '1'),
('image_5fd8c0fbee916', '1', 'Cuplikan_layar_dari_2020-12-01_17-51-25.png', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rating`
--

CREATE TABLE `rating` (
  `id_rating` bigint(191) NOT NULL,
  `id_user` bigint(191) NOT NULL,
  `id_tempat_ngopi` varchar(191) NOT NULL,
  `id_review` varchar(191) DEFAULT NULL,
  `rating` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rating`
--

INSERT INTO `rating` (`id_rating`, `id_user`, `id_tempat_ngopi`, `id_review`, `rating`) VALUES
(1, 1, '1', '1', 5),
(2, 4, '1', NULL, 5),
(3, 4, '2', NULL, 5),
(4, 4, '3', NULL, 2),
(5, 4, '4', NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `review`
--

CREATE TABLE `review` (
  `id_review` varchar(191) NOT NULL,
  `id_user` bigint(191) NOT NULL,
  `id_tempat_ngopi` varchar(191) NOT NULL,
  `tgl_pergi` date NOT NULL,
  `judul` varchar(191) NOT NULL,
  `review_pengguna` varchar(191) NOT NULL,
  `harga` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `review`
--

INSERT INTO `review` (`id_review`, `id_user`, `id_tempat_ngopi`, `tgl_pergi`, `judul`, `review_pengguna`, `harga`) VALUES
('1', 1, '1', '2020-12-15', 'enak', 'minumannya enak', '<50000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tempat_ngopi`
--

CREATE TABLE `tempat_ngopi` (
  `id_tempat_ngopi` varchar(191) NOT NULL,
  `nama` varchar(191) NOT NULL,
  `alamat` varchar(191) NOT NULL,
  `foto` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tempat_ngopi`
--

INSERT INTO `tempat_ngopi` (`id_tempat_ngopi`, `nama`, `alamat`, `foto`) VALUES
('1', 'Armor Kopi', 'Bandung', 'about-img.jpg'),
('2', 'Sejiwa Coffee', 'Bandung', 'about-img.jpg'),
('3', 'Kopi Anjis', 'Bandung', 'about-img.jpg'),
('4', 'Marka Coffee & Kitchen', 'Bandung', 'about-img.jpg'),
('5', 'Masagi Koffee', 'Bandung', 'about-img.jpg'),
('6', 'Kopi Toko Djawa', 'Bandung', 'about-img.jpg'),
('7', 'Two Cents', 'Bandung', 'about-img.jpg'),
('8', 'Lalune Coffee & Luncheonette', 'Bandung', 'about-img.jpg'),
('9', 'LoKa Si Coffee & Space', 'Bandung', 'about-img.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` bigint(191) NOT NULL,
  `username` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `level` enum('admin','user') NOT NULL,
  `nama` varchar(191) DEFAULT NULL,
  `jenisKelamin` enum('l','p') DEFAULT NULL,
  `pekerjaan` varchar(191) DEFAULT NULL,
  `tanggalLahir` date DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `foto` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `level`, `nama`, `jenisKelamin`, `pekerjaan`, `tanggalLahir`, `email`, `foto`) VALUES
(1, 'bagas', '$2y$10$ImmCljlwd2/1HHNdenp.yuyuhLp/9xoVkrqRk101iKZ2Wc1kWkt32', 'user', 'M. Bagas Setia', 'l', 'mahasiswa', '2020-12-30', 'bagassetia271@gmail.com', 'Cuplikan_layar_dari_2020-11-28_17-43-47.png'),
(3, 'admin', '$2y$10$fmpA6zc6yJ.H09l89H063.UlKNtX5U0jZChlltzghGtpVIZLJPGWm', 'admin', 'admin', 'l', 'mahasiswa', '2020-12-30', 'setiapermanabagas@gmail.com', NULL),
(4, 'a', '$2y$10$fmpA6zc6yJ.H09l89H063.UlKNtX5U0jZChlltzghGtpVIZLJPGWm', 'user', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'b', '$2y$10$fmpA6zc6yJ.H09l89H063.UlKNtX5U0jZChlltzghGtpVIZLJPGWm', 'user', NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'c', '$2y$10$fmpA6zc6yJ.H09l89H063.UlKNtX5U0jZChlltzghGtpVIZLJPGWm', 'user', NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'd', '$2y$10$fmpA6zc6yJ.H09l89H063.UlKNtX5U0jZChlltzghGtpVIZLJPGWm', 'user', NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'e', '$2y$10$fmpA6zc6yJ.H09l89H063.UlKNtX5U0jZChlltzghGtpVIZLJPGWm', 'user', NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'f', '$2y$10$fmpA6zc6yJ.H09l89H063.UlKNtX5U0jZChlltzghGtpVIZLJPGWm', 'user', NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`idFasilitas`);

--
-- Indeks untuk tabel `fasilitasTempat`
--
ALTER TABLE `fasilitasTempat`
  ADD PRIMARY KEY (`idFasilitasTempat`),
  ADD KEY `fasilitas` (`fasilitas`),
  ADD KEY `tempat` (`tempat`);

--
-- Indeks untuk tabel `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id_image`),
  ADD KEY `id_review` (`id_review`),
  ADD KEY `id_tempat_ngopi` (`id_tempat_ngopi`);

--
-- Indeks untuk tabel `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id_rating`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_review` (`id_review`),
  ADD KEY `id_tempat_ngopi` (`id_tempat_ngopi`);

--
-- Indeks untuk tabel `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id_review`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_tempat_ngopi` (`id_tempat_ngopi`);

--
-- Indeks untuk tabel `tempat_ngopi`
--
ALTER TABLE `tempat_ngopi`
  ADD PRIMARY KEY (`id_tempat_ngopi`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `idFasilitas` bigint(191) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `fasilitasTempat`
--
ALTER TABLE `fasilitasTempat`
  MODIFY `idFasilitasTempat` bigint(191) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `rating`
--
ALTER TABLE `rating`
  MODIFY `id_rating` bigint(191) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` bigint(191) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `fasilitasTempat`
--
ALTER TABLE `fasilitasTempat`
  ADD CONSTRAINT `fasilitasTempat_ibfk_1` FOREIGN KEY (`fasilitas`) REFERENCES `fasilitas` (`idFasilitas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fasilitasTempat_ibfk_2` FOREIGN KEY (`tempat`) REFERENCES `tempat_ngopi` (`id_tempat_ngopi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_2` FOREIGN KEY (`id_review`) REFERENCES `review` (`id_review`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `image_ibfk_3` FOREIGN KEY (`id_tempat_ngopi`) REFERENCES `tempat_ngopi` (`id_tempat_ngopi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `rating_ibfk_3` FOREIGN KEY (`id_review`) REFERENCES `review` (`id_review`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rating_ibfk_4` FOREIGN KEY (`id_tempat_ngopi`) REFERENCES `tempat_ngopi` (`id_tempat_ngopi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `review_ibfk_3` FOREIGN KEY (`id_tempat_ngopi`) REFERENCES `tempat_ngopi` (`id_tempat_ngopi`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
