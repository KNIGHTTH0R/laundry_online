-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 15 Nov 2017 pada 01.46
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `11_deaamaliaputri_laundry`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `stok` varchar(50) NOT NULL,
  `tanggal_update_stok` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `kode`, `nama`, `stok`, `tanggal_update_stok`) VALUES
(1, 'B01', 'Baju', '10', '2017-10-08'),
(2, 'B02', 'celana', '2', '2017-10-08'),
(3, 'B03', 'Daster', '10', '2017-10-06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_laundry`
--

CREATE TABLE `jenis_laundry` (
  `id` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_laundry`
--

INSERT INTO `jenis_laundry` (`id`, `nama`) VALUES
(1, 'Setrika'),
(3, 'Cuci - Kering'),
(4, 'Cuci');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telp` varchar(50) NOT NULL,
  `gender` enum('L','P') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id`, `nik`, `nama`, `alamat`, `telp`, `gender`) VALUES
(5, 'KA03', 'amalia', 'kepanjen', '0812343511', 'L'),
(6, 'KA01', 'Dea Amalia Putri', 'Malang', '0812345678', 'P'),
(7, 'KA02', 'Dea Amalia Putri', 'Malang', '08384738', 'P'),
(8, 'KA04', 'siiwi', 'cokolio', '098764256', 'P'),
(9, 'KA05', 'matematika', 'sukun', '098765677', 'L');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konsumen`
--

CREATE TABLE `konsumen` (
  `id` int(11) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konsumen`
--

INSERT INTO `konsumen` (`id`, `kode`, `nama`, `alamat`) VALUES
(1, 'K01', 'amalia', 'kepanjen'),
(2, 'K02', 'Amalia putra', 'solo'),
(3, 'K03', 'Salsa ', 'Pagak'),
(4, 'K04', 'Alfin', 'tegalsari'),
(5, 'K05', 'Syamsudin', 'wagir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `karyawan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `type`, `karyawan_id`) VALUES
(1, 'dea', '96991368fec63c8a1bfc48a70010f84a', 'admin', 6),
(2, 'amalia', '51e0a46ceb9b9f53a96281bd6b4f38e8', 'user', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemakaian_barang`
--

CREATE TABLE `pemakaian_barang` (
  `id` int(11) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `jumlah` varchar(50) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `karyawan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemakaian_barang`
--

INSERT INTO `pemakaian_barang` (`id`, `kode`, `jumlah`, `barang_id`, `karyawan_id`) VALUES
(1, 'PB01', '10', 2, 6),
(2, 'PB02', '10', 1, 5),
(3, 'PB03', '30', 2, 8),
(4, 'PB04', '30', 2, 7),
(5, 'PB05', '22', 2, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id` int(11) NOT NULL,
  `nomer` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `total` varchar(20) NOT NULL,
  `karyawan_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id`, `nomer`, `tanggal`, `total`, `karyawan_id`, `supplier_id`) VALUES
(2, '01', '2017-10-18', '700000', 7, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rincian`
--

CREATE TABLE `rincian` (
  `id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tarif_id` int(11) NOT NULL,
  `tarif_nama` varchar(50) NOT NULL,
  `tarif` int(11) NOT NULL,
  `jenis_laundry_id` int(11) NOT NULL,
  `jenis_laundry_nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rincian`
--

INSERT INTO `rincian` (`id`, `jumlah`, `tarif_id`, `tarif_nama`, `tarif`, `jenis_laundry_id`, `jenis_laundry_nama`) VALUES
(1, 2, 6, '', 0, 1, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rincian_pembelian`
--

CREATE TABLE `rincian_pembelian` (
  `id` int(11) NOT NULL,
  `nomer` varchar(20) NOT NULL,
  `jumlah` varchar(50) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `pembelian_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rincian_pembelian`
--

INSERT INTO `rincian_pembelian` (`id`, `nomer`, `jumlah`, `barang_id`, `pembelian_id`) VALUES
(1, '01', '30', 3, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rincian_transaksi`
--

CREATE TABLE `rincian_transaksi` (
  `id` int(11) NOT NULL,
  `jumlah` varchar(20) NOT NULL,
  `transaksi_id` int(11) NOT NULL,
  `tarif_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id`, `nama`, `alamat`, `telp`) VALUES
(1, 'Dea Ananda', 'Cempokoulyo', '0849'),
(2, 'Oke', 'boyolali', '088789789'),
(4, 'Barack', 'Amerika', '089927');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tarif`
--

CREATE TABLE `tarif` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `jenis_laundry_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tarif`
--

INSERT INTO `tarif` (`id`, `nama`, `harga`, `jenis_laundry_id`) VALUES
(6, 'pakaian putih', '100000', 1),
(7, 'jeans', '30000', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `nomer` varchar(30) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `tanggal_ambil` date NOT NULL,
  `diskon` varchar(30) NOT NULL,
  `konsumen_id` int(11) NOT NULL,
  `karyawan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `nomer`, `tanggal_transaksi`, `tanggal_ambil`, `diskon`, `konsumen_id`, `karyawan_id`) VALUES
(3, '01', '2017-11-14', '2017-11-16', '5%', 1, 6),
(4, '02', '2017-11-16', '2017-11-17', '5%', 4, 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_laundry`
--
ALTER TABLE `jenis_laundry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `konsumen`
--
ALTER TABLE `konsumen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD KEY `karyawan_id` (`karyawan_id`);

--
-- Indexes for table `pemakaian_barang`
--
ALTER TABLE `pemakaian_barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `karyawan_id` (`karyawan_id`),
  ADD KEY `barang_id` (`barang_id`,`karyawan_id`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `karyawan_id` (`karyawan_id`,`supplier_id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `rincian`
--
ALTER TABLE `rincian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rincian_pembelian`
--
ALTER TABLE `rincian_pembelian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barang_id` (`barang_id`,`pembelian_id`),
  ADD KEY `pembelian_id` (`pembelian_id`);

--
-- Indexes for table `rincian_transaksi`
--
ALTER TABLE `rincian_transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_id` (`transaksi_id`,`tarif_id`),
  ADD KEY `tarif_id` (`tarif_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tarif`
--
ALTER TABLE `tarif`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jenis_laundry_id` (`jenis_laundry_id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `jenis_laundry`
--
ALTER TABLE `jenis_laundry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `konsumen`
--
ALTER TABLE `konsumen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pemakaian_barang`
--
ALTER TABLE `pemakaian_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `rincian`
--
ALTER TABLE `rincian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `rincian_pembelian`
--
ALTER TABLE `rincian_pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `rincian_transaksi`
--
ALTER TABLE `rincian_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tarif`
--
ALTER TABLE `tarif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`karyawan_id`) REFERENCES `karyawan` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pemakaian_barang`
--
ALTER TABLE `pemakaian_barang`
  ADD CONSTRAINT `pemakaian_barang_ibfk_1` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pemakaian_barang_ibfk_2` FOREIGN KEY (`karyawan_id`) REFERENCES `karyawan` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`karyawan_id`) REFERENCES `karyawan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pembelian_ibfk_2` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `rincian_pembelian`
--
ALTER TABLE `rincian_pembelian`
  ADD CONSTRAINT `rincian_pembelian_ibfk_1` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rincian_pembelian_ibfk_2` FOREIGN KEY (`pembelian_id`) REFERENCES `pembelian` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `rincian_transaksi`
--
ALTER TABLE `rincian_transaksi`
  ADD CONSTRAINT `rincian_transaksi_ibfk_1` FOREIGN KEY (`tarif_id`) REFERENCES `tarif` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tarif`
--
ALTER TABLE `tarif`
  ADD CONSTRAINT `tarif_ibfk_1` FOREIGN KEY (`jenis_laundry_id`) REFERENCES `jenis_laundry` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
