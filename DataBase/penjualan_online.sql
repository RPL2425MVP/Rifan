-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Nov 2025 pada 04.26
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penjualan_online`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `account_admin`
--

CREATE TABLE `account_admin` (
  `id_admin` varchar(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `account_user`
--

CREATE TABLE `account_user` (
  `id_user` varchar(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nomor_tlp` int(30) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `daerah` varchar(100) NOT NULL,
  `kode_pos` int(10) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_produk`
--

CREATE TABLE `data_produk` (
  `id_produk` varchar(11) NOT NULL,
  `nama_produk` varchar(200) NOT NULL,
  `id_kategori` varchar(11) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `harga` int(10) NOT NULL,
  `stok` int(10) NOT NULL,
  `deskripsi` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_produk`
--

INSERT INTO `data_produk` (`id_produk`, `nama_produk`, `id_kategori`, `jenis`, `harga`, `stok`, `deskripsi`, `created_at`, `updated_at`) VALUES
('PRDK00008', 'Topi Pantai Anyaman', 'KTG004', 'Anyaman', 368000, 12, 'Lingkar kepala 56cm - 58cm\r\n\r\nHeight 10cm\r\n\r\nWide Brim 9.5cm\r\n\r\nDiameter lubang topi +/- 18,5cm', '2025-11-20 02:05:30', '2025-11-20 02:05:30'),
('PRDK001', 'Pantofel Pria Klasik', 'KTG002', 'Kulit', 100000, 12, 'Model simple dan elegan trend terbaru\r\n\r\nKualitas bagus harga terjangkau\r\n\r\nNyaman saat dipakai Perawatan mudah', '2025-11-18 20:49:50', '2025-11-19 09:50:29'),
('PRDK002', 'Kanky Yuga Makie', 'KTG002', 'Sneakers', 228800, 123, 'Sepatu Yuga Makie adalah pilihan sempurna untuk menemani aktivitas harian Anda. Dirancang dengan fokus pada kenyamanan dan kepraktisan, sepatu ini hadir dengan bobot ringan yang membuat setiap langkah terasa bebas. Outsole yang terbuat dari bahan phylon dan anti-slip memberikan daya cengkeram yang kuat, memastikan stabilitas saat berjalan.\r\n', '2025-11-19 14:46:49', '2025-11-19 09:10:32'),
('PRDK003', 'Russ Sweater', 'KTG003', 'Sweater', 193300, 20, 'bahan kualitas yang nyaman dan cocok dipakai untuk udara dingin dan outdoor.', '2025-11-20 01:24:02', '2025-11-19 19:25:32'),
('PRDK004', 'Dowear Baju Kemeja', 'KTG003', 'Baju', 79500, 30, 'Suka pake kemeja tapi tidak mau terlihat formal?\r\n\r\nAtau mau menggunakan kemeja pada saat nongkrong santai dengan bahan yang adem, lembut dan nyaman?\r\n\r\n\r\n\r\nTingkatkan gaya Anda dengan kemeja katun mikro full printing kami yang eksklusif ini. Tersedia dalam berbagai ukuran, Anda dapat menemukan ukuran yang sesuai dengan tubuh Anda dan tetap tampil modis setiap saat. Dapatkan sekarang dan jadikan kemeja ini sebagai bagian dari koleksi fashion Anda!', '2025-11-20 01:32:28', '2025-11-20 01:32:28'),
('PRDK005', 'Tshirt Kaos Distro', 'KTG003', 'Tshirt', 52600, 100, '*Terbuat dari 100% katun / 100% cotton ( COTTON COMBED 30s) bukan Polyster & bukan spandex\r\n\r\n*sehingga nyaman dipakai, pas dibadan dan tidak berkerut setelah dicuci.\r\n\r\n*Menghasilkan tekstur kain yang lembut dan tidak panas\r\n\r\n*Model cutting Kaos bisa dipakai untuk pria maupun wanita\r\n\r\n*Pola jahitan dan potongan  yang rapih membuat kaos ini terlihat sangat exclusif & Trendy', '2025-11-20 01:38:03', '2025-11-19 19:40:04'),
('PRDK006', 'Topi Sport Outdoor ', 'KTG003', 'Sport', 16450, 30, 'Spesifikasi:\r\n\r\n* Ready Warna Hitam, Cream \r\n\r\n* Bahan drill twill Premium\r\n\r\n* Lingkar Kepala 54-62 cm\r\n\r\n* Menggunakan jepitan besi di bagian belakang sehingga bisa di perkecil dan di perbesar sesuai keinginan\r\n\r\n', '2025-11-20 01:54:54', '2025-11-19 20:05:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail` varchar(11) NOT NULL,
  `id_transaksi` varchar(11) DEFAULT NULL,
  `id_produk` varchar(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga_satuan` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto_produk`
--

CREATE TABLE `foto_produk` (
  `id_foto` varchar(11) NOT NULL,
  `id_produk` varchar(11) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `foto_produk`
--

INSERT INTO `foto_produk` (`id_foto`, `id_produk`, `foto`) VALUES
('F00010', 'PRDK00008', '1763604330-9963-tpantai.webp'),
('F001', 'PRDK001', '1763498990-6745-s1.webp'),
('F0010', 'PRDK006', '1763603694-8641-topi1.webp'),
('F002', 'PRDK001', '1763556255-3966-s2.webp'),
('F003', 'PRDK002', '1763563609-2433-ss1.webp'),
('F004', 'PRDK002', '1763563617-1194-ss2.webp'),
('F005', 'PRDK003', '1763601842-4870-b1.webp'),
('F006', 'PRDK003', '1763601905-8969-b2.webp'),
('F007', 'PRDK004', '1763602348-2127-p.webp'),
('F008', 'PRDK005', '1763602683-8803-t1.webp'),
('F009', 'PRDK005', '1763602804-4375-t2.webp');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
('KTG002', 'Sepatu'),
('KTG003', 'Baju'),
('KTG004', 'Topi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` varchar(11) NOT NULL,
  `id_user` varchar(11) DEFAULT NULL,
  `id_produk` varchar(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT 1,
  `tanggal_ditambahkan` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(11) NOT NULL,
  `id_user` varchar(11) DEFAULT NULL,
  `tanggal_transaksi` timestamp NOT NULL DEFAULT current_timestamp(),
  `total_harga` int(11) DEFAULT NULL,
  `status` enum('pending','diproses','dikirim','selesai','batal') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ulasan`
--

CREATE TABLE `ulasan` (
  `id_ulasan` varchar(11) NOT NULL,
  `id_user` varchar(11) DEFAULT NULL,
  `id_produk` varchar(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL CHECK (`rating` between 1 and 5),
  `komentar` text DEFAULT NULL,
  `tanggal_ulasan` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `account_admin`
--
ALTER TABLE `account_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `account_user`
--
ALTER TABLE `account_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `data_produk`
--
ALTER TABLE `data_produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `fk_produk_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `foto_produk`
--
ALTER TABLE `foto_produk`
  ADD PRIMARY KEY (`id_foto`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`id_ulasan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data_produk`
--
ALTER TABLE `data_produk`
  ADD CONSTRAINT `fk_produk_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Ketidakleluasaan untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`),
  ADD CONSTRAINT `detail_transaksi_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `data_produk` (`id_produk`);

--
-- Ketidakleluasaan untuk tabel `foto_produk`
--
ALTER TABLE `foto_produk`
  ADD CONSTRAINT `foto_produk_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `data_produk` (`id_produk`);

--
-- Ketidakleluasaan untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `keranjang_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `account_user` (`id_user`),
  ADD CONSTRAINT `keranjang_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `data_produk` (`id_produk`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `account_user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `ulasan`
--
ALTER TABLE `ulasan`
  ADD CONSTRAINT `ulasan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `account_user` (`id_user`),
  ADD CONSTRAINT `ulasan_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `data_produk` (`id_produk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
