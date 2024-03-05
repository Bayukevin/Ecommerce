-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Mar 2024 pada 10.55
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
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Sembako');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `telephon_pelanggan` varchar(20) NOT NULL,
  `password_pelanggan` varchar(255) NOT NULL,
  `foto_pelanggan` text DEFAULT NULL,
  `alamat_pelanggan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `jumlah` decimal(10,2) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` decimal(10,2) NOT NULL,
  `status_pembelian` enum('pending','lunas','barang dikirim','batal') NOT NULL,
  `resi_pengiriman` varchar(100) DEFAULT NULL,
  `alamat_pengiriman` varchar(255) DEFAULT NULL,
  `totalberat` int(11) DEFAULT NULL,
  `provinsi` varchar(255) DEFAULT NULL,
  `distrik` varchar(255) DEFAULT NULL,
  `tipe` varchar(255) DEFAULT NULL,
  `kodepos` varchar(10) DEFAULT NULL,
  `ekspedisi` varchar(255) DEFAULT NULL,
  `paket` varchar(255) DEFAULT NULL,
  `ongkir` decimal(10,2) DEFAULT NULL,
  `estimasi` varchar(50) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `berat` int(11) DEFAULT NULL,
  `subberat` int(11) DEFAULT NULL,
  `subharga` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian` int(11) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `harga` decimal(10,2) DEFAULT NULL,
  `berat` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `subberat` int(11) DEFAULT NULL,
  `subharga` decimal(10,2) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `harga_produk` decimal(10,2) NOT NULL,
  `berat_produk` int(11) NOT NULL,
  `foto_produk` text DEFAULT NULL,
  `deskripsi_produk` text DEFAULT NULL,
  `stok_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `harga_produk`, `berat_produk`, `foto_produk`, `deskripsi_produk`, `stok_produk`) VALUES
(4, 1, 'Beras', '50000.00', 5, 'Beras.jpg', 'Beras 5kg', 7),
(5, 1, 'Minyak Bimoli', '15000.00', 1, 'Bimoli.jpg', 'Bimoli 1 liter', 5),
(6, 1, 'Gulaku', '10000.00', 1, 'gula.jpg', 'Gulaku 1kg', 10),
(7, 1, 'Indomie', '100000.00', 1, 'indomie.jpg', '1 Dus Indomie Goreng', 9),
(8, 1, 'Kecap ABC', '7000.00', 1, 'kecap.jpg', 'Kecap ABC Refil', 5),
(9, 1, 'Marjan', '15000.00', 1, 'marjan.jpeg', 'Marjan', 15),
(10, 1, 'Saos Indofood', '10000.00', 1, 'saos.jpeg', 'Saos botol indofood', 10),
(11, 1, 'Kecap Bangau ', '20000.00', 1, 'kecap bangau.jpg', 'KEcap Bangau Refil', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_foto`
--

CREATE TABLE `produk_foto` (
  `id_produk_foto` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_produk_foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk_foto`
--

INSERT INTO `produk_foto` (`id_produk_foto`, `id_produk`, `nama_produk_foto`) VALUES
(5, 4, 'Beras.jpg'),
(6, 5, 'Bimoli.jpg'),
(7, 6, 'gula.jpg'),
(8, 7, 'indomie.jpg'),
(9, 8, 'kecap.jpg'),
(10, 9, 'marjan.jpeg'),
(11, 10, 'saos.jpeg'),
(12, 11, 'kecap bangau.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_pembelian` (`id_pembelian`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `produk_foto`
--
ALTER TABLE `produk_foto`
  ADD PRIMARY KEY (`id_produk_foto`),
  ADD KEY `id_produk` (`id_produk`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `produk_foto`
--
ALTER TABLE `produk_foto`
  MODIFY `id_produk_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_pembelian`) REFERENCES `pembelian` (`id_pembelian`);

--
-- Ketidakleluasaan untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`);

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Ketidakleluasaan untuk tabel `produk_foto`
--
ALTER TABLE `produk_foto`
  ADD CONSTRAINT `produk_foto_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
