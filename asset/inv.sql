-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 07 Nov 2018 pada 01.05
-- Versi Server: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inv`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_kategori` varchar(4) NOT NULL,
  `id` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `qty` int(5) NOT NULL,
  `kondisi` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_kategori`, `id`, `nama`, `qty`, `kondisi`) VALUES
('k1', 'B001', 'Lenovo Thonkpad', 5, 'Baik'),
('k1', 'B002', 'Logitech G21', 2, 'Baik'),
('k1', 'B003', 'Asus ROG STRIX GL52VZ', 1, 'Baik'),
('k1', 'B004', 'Rexus TX7', 3, 'Baik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `id_barang` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `det`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `det` (
`id_pinjam` int(11)
,`id` varchar(10)
,`qty` int(5)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_peminjaman`
--

CREATE TABLE `detail_peminjaman` (
  `id` int(11) NOT NULL,
  `id_pinjam` int(11) NOT NULL,
  `id_barang` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_peminjaman`
--

INSERT INTO `detail_peminjaman` (`id`, `id_pinjam`, `id_barang`) VALUES
(31, 29, 'B001'),
(32, 29, 'B002'),
(33, 30, 'B003'),
(34, 31, 'B003'),
(35, 32, 'B002'),
(36, 32, 'B003');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` varchar(10) NOT NULL,
  `description` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `description`) VALUES
('k1', 'Laptop'),
('k2', 'Mouse'),
('k3', 'Aksesoris'),
('k4', 'Perkakas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_user` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_user`, `id`, `tgl_pinjam`, `status`) VALUES
(3, 29, '2018-11-06', 'Selesai'),
(5, 30, '2018-11-06', 'Selesai'),
(5, 31, '2018-11-06', 'Selesai'),
(3, 32, '2018-11-06', 'Selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_petugas` int(11) NOT NULL,
  `id_pinjam` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `tgl_kembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengembalian`
--

INSERT INTO `pengembalian` (`id_petugas`, `id_pinjam`, `id`, `tgl_kembali`) VALUES
(2, 29, 42, '2018-11-06'),
(2, 30, 43, '2018-11-06'),
(2, 31, 44, '2018-11-06'),
(2, 32, 45, '2018-11-06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(12) NOT NULL,
  `password` varchar(12) NOT NULL,
  `level` enum('admin','peminjam','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin', 'admin', 'admin'),
(2, 'p', 'p', 'p', 'petugas'),
(3, 'Hafizh', 'h', 'h', 'peminjam'),
(4, 'Surya', 'sur', 'boominc', 'peminjam'),
(5, 'Prayogo', 'pra', 'yogo', 'peminjam');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vbarang`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vbarang` (
`id` varchar(10)
,`nama` varchar(50)
,`qty` int(5)
,`kondisi` varchar(7)
,`kategori` varchar(30)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vdetail`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vdetail` (
`id_pinjam` int(11)
,`id` varchar(10)
,`nama` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vpeminjaman`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vpeminjaman` (
`id` int(11)
,`nama` varchar(50)
,`tgl_pinjam` date
,`status` varchar(10)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `det`
--
DROP TABLE IF EXISTS `det`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `det`  AS  select `detail_peminjaman`.`id_pinjam` AS `id_pinjam`,`barang`.`id` AS `id`,`barang`.`qty` AS `qty` from (`barang` join `detail_peminjaman`) where (`barang`.`id` = `detail_peminjaman`.`id_barang`) order by `detail_peminjaman`.`id` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `vbarang`
--
DROP TABLE IF EXISTS `vbarang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vbarang`  AS  select `barang`.`id` AS `id`,`barang`.`nama` AS `nama`,`barang`.`qty` AS `qty`,`barang`.`kondisi` AS `kondisi`,`kategori`.`description` AS `kategori` from (`barang` join `kategori`) where (`barang`.`id_kategori` = `kategori`.`id`) group by `barang`.`id` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `vdetail`
--
DROP TABLE IF EXISTS `vdetail`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vdetail`  AS  select `d`.`id_pinjam` AS `id_pinjam`,`b`.`id` AS `id`,`b`.`nama` AS `nama` from (`detail_peminjaman` `d` join `barang` `b`) where (`d`.`id_barang` = `b`.`id`) order by `d`.`id_pinjam` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `vpeminjaman`
--
DROP TABLE IF EXISTS `vpeminjaman`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vpeminjaman`  AS  select `peminjaman`.`id` AS `id`,`user`.`nama` AS `nama`,`peminjaman`.`tgl_pinjam` AS `tgl_pinjam`,`peminjaman`.`status` AS `status` from (`peminjaman` join `user`) where (`peminjaman`.`id_user` = `user`.`id`) order by `peminjaman`.`id` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brg_pmnjm` (`id_barang`),
  ADD KEY `pnjm_dtl` (`id_pinjam`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pmnjm` (`id_user`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ptgs_kmbl` (`id_petugas`),
  ADD KEY `pmnjmnd` (`id_pinjam`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`);

--
-- Ketidakleluasaan untuk tabel `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  ADD CONSTRAINT `brg_pmnjm` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pmnjmn` FOREIGN KEY (`id_pinjam`) REFERENCES `peminjaman` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `pmnjm` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD CONSTRAINT `pmnjmnd` FOREIGN KEY (`id_pinjam`) REFERENCES `peminjaman` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ptgs_kmbl` FOREIGN KEY (`id_petugas`) REFERENCES `user` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
