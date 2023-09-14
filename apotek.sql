-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Jul 2022 pada 23.07
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apotek`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

DROP TABLE IF EXISTS `karyawan`;
CREATE TABLE `karyawan` (
  `id_karyawan` int(3) NOT NULL,
  `kode_karyawan` char(6) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `tgl_lhr` date NOT NULL,
  `shif` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `kode_karyawan`, `nama_karyawan`, `tgl_lhr`, `shif`) VALUES
(1, 'KRY001', 'Kevin Pramata', '2002-03-07', 1),
(2, 'KRY002', 'Agus Prasetyo', '2001-09-03', 1),
(3, 'KRY003', 'Asep', '1992-07-10', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

DROP TABLE IF EXISTS `obat`;
CREATE TABLE `obat` (
  `kode_obat` char(6) NOT NULL,
  `id_obat` int(4) NOT NULL,
  `foto` varchar(30) NOT NULL,
  `nama_obat` varchar(100) NOT NULL,
  `jenis` char(50) NOT NULL,
  `harga` char(100) NOT NULL,
  `expired` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`kode_obat`, `id_obat`, `foto`, `nama_obat`, `jenis`, `harga`, `expired`) VALUES
('OBT001', 1, 'download1.jpg', 'Paracetamol', 'Penurun panas', '25000', '2025-08-10'),
('OBT002', 2, 'download_(1).jpg', 'Dumolid', 'Obat Penenang', '15000', '2026-10-27'),
('OBT003', 6, 'download_(2).jpg', 'COMBIN', 'OBAT BATUK', '10000', '2024-08-07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

DROP TABLE IF EXISTS `penjualan`;
CREATE TABLE `penjualan` (
  `id_trans` int(1) NOT NULL,
  `kode_trans` char(6) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `tgl_trans` date NOT NULL,
  `metode_bayar` varchar(10) NOT NULL,
  `jumlah_beli` int(50) NOT NULL,
  `nama_pelayan` char(50) NOT NULL,
  `nama_penerima` char(50) NOT NULL,
  `total_bayar` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id_trans`, `kode_trans`, `nama_obat`, `tgl_trans`, `metode_bayar`, `jumlah_beli`, `nama_pelayan`, `nama_penerima`, `total_bayar`) VALUES
(1, 'TRX001', 'Paracetamol', '2022-07-08', 'Tunai', 4, 'nama_pelayan', 'Prisilia Rahayu', 25000),
(6, 'TRX003', 'COMBIN', '2021-06-04', 'Non-tunai', 2, 'Budi', 'Suri', 17000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

DROP TABLE IF EXISTS `tb_admin`;
CREATE TABLE `tb_admin` (
  `id` int(10) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `username`, `password`) VALUES
(1, 'arya', '611dd931040ba2284d0adc26a5e3f056'),
(2, 'fauzi', 'd7f99c1142dbb97452a77183772bb997'),
(3, 'andika', 'e5a85482d8b9bedbd68c39cb22aea751');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_trans`);

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_trans` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
