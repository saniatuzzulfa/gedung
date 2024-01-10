-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2024 at 11:17 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gedung`
--

-- --------------------------------------------------------

--
-- Table structure for table `kas`
--

CREATE TABLE `kas` (
  `kode_kas` varchar(50) NOT NULL,
  `nama_kas` varchar(50) NOT NULL,
  `tipe_kas` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kas`
--

INSERT INTO `kas` (`kode_kas`, `nama_kas`, `tipe_kas`) VALUES
('PM-001', 'Reservasi', 'pemasukan'),
('PM-002', 'Infaq Penggunaan Fasilitas', 'pemasukan'),
('PM-003', 'Vendor', 'pemasukan'),
('PN-001', 'Intensif Petugas', 'pengeluaran'),
('PN-002', 'Vendor', 'pengeluaran'),
('PN-003', 'Gaji Karyawan', 'pengeluaran'),
('PN-004', 'Pemeliharaan Gedung', 'pengeluaran'),
('PN-005', 'Inventaris Gedung', 'pengeluaran'),
('PN-006', 'ATK Kantor', 'pengeluaran'),
('PN-007', 'Pulsa Listrik', 'pengeluaran'),
('PN-008', 'Tagihan Listrik', 'pengeluaran'),
('PN-009', 'Izin Kegiatan', 'pengeluaran'),
('PN-010', 'Penerapan PSBB', 'pengeluaran'),
('PN-011', 'Iuran RW', 'pengeluaran'),
('PN-012', 'Kegiatan PCNU', 'pengeluaran'),
('PN-013', 'PBB Gedung', 'pengeluaran'),
('PN-014', 'Refund Sewa Gedung', 'pengeluaran');

-- --------------------------------------------------------

--
-- Table structure for table `pakett`
--

CREATE TABLE `pakett` (
  `kode_paket` varchar(20) NOT NULL,
  `jenis_paket` enum('pernikahan','non pernikahan','hiburan') NOT NULL,
  `bentuk_paket` enum('paket a','paket b','paket c','reguler','paket hiburan') NOT NULL,
  `nama_paket` enum('silver','diamond','platinum','reguler','paket hiburan') NOT NULL,
  `harga_perpax` int(50) NOT NULL,
  `jumlah_pax` int(50) NOT NULL,
  `harga` int(50) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pakett`
--

INSERT INTO `pakett` (`kode_paket`, `jenis_paket`, `bentuk_paket`, `nama_paket`, `harga_perpax`, `jumlah_pax`, `harga`, `deskripsi`) VALUES
('HIBURAN', 'hiburan', 'paket hiburan', 'paket hiburan', 0, 0, 17000000, 'Paket Hiburan'),
('NONWEDDING', 'non pernikahan', 'reguler', 'reguler', 0, 0, 13000000, 'Harga khusus sewa gedung'),
('WEDDING-A-001', 'pernikahan', 'paket a', 'silver', 62000, 800, 49600000, 'Include Fasilitas Dekorasi, Pelaminan, Catering, dan Buffe'),
('WEDDING-A-002', 'pernikahan', 'paket a', 'diamond', 69000, 800, 55200000, 'Include Fasilitas Dekorasi, Pelaminan, Catering, dan Buffe'),
('WEDDING-A-003', 'pernikahan', 'paket a', 'platinum', 77000, 800, 61600000, 'Include Fasilitas Dekorasi, Pelaminan, Catering, dan Buffe'),
('WEDDING-B-001', 'pernikahan', 'paket b', 'silver', 63000, 1000, 63000000, 'Bonus : 3 Unit Kipas Salju dan Hias Mobil Pengantin'),
('WEDDING-B-002', 'pernikahan', 'paket b', 'diamond', 71000, 1000, 71000000, 'Bonus : 3 Unit Kipas Salju dan Hias Mobil Pengantin'),
('WEDDING-B-003', 'pernikahan', 'paket b', 'platinum', 77000, 1000, 77000000, 'Bonus : 3 Unit Kipas Salju dan Hias Mobil Pengantin'),
('WEDDING-C-001', 'pernikahan', 'paket c', 'silver', 58000, 1500, 87000000, 'BONUS PAKET C : 4 Unit Kipas Salju dan Hias Mobil Pengantin'),
('WEDDING-C-002', 'pernikahan', 'paket c', 'diamond', 67000, 1500, 100500000, 'BONUS PAKET C : 4 Unit Kipas Salju dan Hias Mobil Pengantin'),
('WEDDING-C-003', 'pernikahan', 'paket c', 'platinum', 73000, 1500, 109500000, 'BONUS PAKET C : 4 Unit Kipas Salju dan Hias Mobil Pengantin');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_lengkap` varchar(16) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` int(13) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `hak_akses` enum('admin','pelanggan','pemilik') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama_lengkap`, `jenis_kelamin`, `alamat`, `no_hp`, `username`, `password`, `hak_akses`) VALUES
(1, 'zulfa', 'perempuan', 'kuripan', 2147483647, 'zulfa', '8eb856767eb1bafe3966a04b3dfec572', 'pelanggan'),
(2, 'ariya', 'laki laki', 'Jl. Patriot', 976532567, 'ariya', '630784103133c1834e4359e396c8c8fa', 'admin'),
(3, 'iyan', 'laki laki', 'kuripan', 2147483647, 'iyan', '70f32b0989903de63dde4ea96d5d4000', 'pelanggan'),
(4, 'pcnu', 'laki laki', 'Jl. Patriot', 976532567, 'pcnu', 'e63c124d7c0ec70f64b2557608921c81', 'pemilik');

-- --------------------------------------------------------

--
-- Table structure for table `rekap_detail`
--

CREATE TABLE `rekap_detail` (
  `id_rekap_detail` int(11) NOT NULL,
  `id_rekap` int(11) NOT NULL,
  `kode_kas` varchar(12) NOT NULL,
  `debit` int(11) NOT NULL,
  `kredit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rekap_header`
--

CREATE TABLE `rekap_header` (
  `id_rekap` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `no_bukti` varchar(12) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reservasi`
--

CREATE TABLE `reservasi` (
  `kode_temp` int(11) NOT NULL,
  `kode_reservasi` varchar(20) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `tgl_booking` date NOT NULL,
  `kode_paket` varchar(20) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `harga` int(50) NOT NULL,
  `jumlah_pembayaran` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reservasidetail`
--

CREATE TABLE `reservasidetail` (
  `kode_reservasidetail` int(11) NOT NULL,
  `kode_paket` varchar(50) NOT NULL,
  `harga` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reservasiheader`
--

CREATE TABLE `reservasiheader` (
  `kode_reservasiheader` varchar(100) NOT NULL,
  `tgl_reservasiheader` date NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `jumlah_pembayaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tr_keluar`
--

CREATE TABLE `tr_keluar` (
  `no_bukti` varchar(12) NOT NULL,
  `tgl_transaksi` date DEFAULT NULL,
  `kode_kas` varchar(12) DEFAULT NULL,
  `nominal` int(50) DEFAULT NULL,
  `catatan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tr_keluar`
--

INSERT INTO `tr_keluar` (`no_bukti`, `tgl_transaksi`, `kode_kas`, `nominal`, `catatan`) VALUES
('PL-0001', '2024-01-02', 'KS-0002', 20000, 'ggada'),
('PL-0002', '2024-01-03', 'KS-0002', 100000, 'nothin');

-- --------------------------------------------------------

--
-- Table structure for table `tr_masuk`
--

CREATE TABLE `tr_masuk` (
  `no_bukti` varchar(12) NOT NULL,
  `tgl_transaksi` date DEFAULT NULL,
  `kode_kas` varchar(12) DEFAULT NULL,
  `nominal` int(50) DEFAULT NULL,
  `catatan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tr_masuk`
--

INSERT INTO `tr_masuk` (`no_bukti`, `tgl_transaksi`, `kode_kas`, `nominal`, `catatan`) VALUES
('PN-0001', '2024-01-10', 'PM-001', 100000, 'hjvkkj'),
('PN-0002', '2024-01-10', 'PM-003', 20000, 'hhj'),
('PN-0003', NULL, 'PM-001', 200000, 'asd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kas`
--
ALTER TABLE `kas`
  ADD PRIMARY KEY (`kode_kas`);

--
-- Indexes for table `pakett`
--
ALTER TABLE `pakett`
  ADD PRIMARY KEY (`kode_paket`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `rekap_detail`
--
ALTER TABLE `rekap_detail`
  ADD PRIMARY KEY (`id_rekap_detail`);

--
-- Indexes for table `rekap_header`
--
ALTER TABLE `rekap_header`
  ADD PRIMARY KEY (`id_rekap`);

--
-- Indexes for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`kode_temp`);

--
-- Indexes for table `reservasidetail`
--
ALTER TABLE `reservasidetail`
  ADD PRIMARY KEY (`kode_reservasidetail`);

--
-- Indexes for table `reservasiheader`
--
ALTER TABLE `reservasiheader`
  ADD PRIMARY KEY (`kode_reservasiheader`);

--
-- Indexes for table `tr_keluar`
--
ALTER TABLE `tr_keluar`
  ADD PRIMARY KEY (`no_bukti`);

--
-- Indexes for table `tr_masuk`
--
ALTER TABLE `tr_masuk`
  ADD PRIMARY KEY (`no_bukti`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rekap_detail`
--
ALTER TABLE `rekap_detail`
  MODIFY `id_rekap_detail` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `kode_temp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservasidetail`
--
ALTER TABLE `reservasidetail`
  MODIFY `kode_reservasidetail` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
