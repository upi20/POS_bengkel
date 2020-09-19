-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Sep 2020 pada 08.35
-- Versi server: 10.3.15-MariaDB
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bengkel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `nis` int(10) NOT NULL,
  `nama` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `tempat_lahir` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` enum('l','p') COLLATE latin1_general_ci NOT NULL,
  `kelas` enum('I','II','III','IV','V','VI') COLLATE latin1_general_ci NOT NULL,
  `tgl_input` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `tb_anggota`
--

INSERT INTO `tb_anggota` (`nis`, `nama`, `tempat_lahir`, `tgl_lahir`, `jk`, `kelas`, `tgl_input`) VALUES
(2016210004, 'Narti', 'Makassar', '2019-07-16', 'p', 'V', '2019-07-28 07:30:30'),
(2016210002, 'Putri Mawar', 'Makassar', '2019-07-03', 'p', 'VI', '2019-07-31 12:33:02'),
(2016210003, 'Dony Pratama', 'Makassar', '2019-07-12', 'p', 'V', '2019-07-28 14:42:43'),
(2016210001, 'Nawirah', 'Makassar', '2019-07-02', 'l', 'VI', '2019-07-28 14:43:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `kode_barang` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `harga_beli` int(255) NOT NULL,
  `harga_jual` int(255) NOT NULL,
  `gambar` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `stok` int(50) NOT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `nama_barang`, `kode_barang`, `harga_beli`, `harga_jual`, `gambar`, `stok`, `id_kategori`) VALUES
(40, 'Ubah Nama barang', '12312', 231, 1232, 'FB_IMG_1596702327604.jpg', 300, 16),
(41, 'adasd', 'qweqwe', 1231, 12313, '20200706_133053.jpg', 1234, 16),
(42, 'adjie123', 'qweqwe', 1234123, 213123, 'logo.webp', 123, 12),
(43, 'hasan', '172', 123, 234, 'th (3).jpg', 12, 16),
(46, '111', '111efd', 11, 11, 'FB_IMG_1596702330078.jpg', 111, 16),
(50, 'Tes Tambah Barang', '123', 11, 11, '123_5f658f675622b.jpg', 111, 16);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `kategori`) VALUES
(8, 'asdasds2'),
(9, '123'),
(10, 'asdasds'),
(11, 'afdas'),
(12, 'sukaaa12'),
(13, 'oooooooo'),
(16, 'Tambah kategori tes tus');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_konsumen`
--

CREATE TABLE `tb_konsumen` (
  `id_konsumen` bigint(20) NOT NULL,
  `kode_konsumen` varchar(50) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `hp` int(11) NOT NULL,
  `bg_mobil` varchar(50) NOT NULL,
  `merk_mobil` varchar(50) NOT NULL,
  `warna_mobil` varchar(50) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_konsumen`
--

INSERT INTO `tb_konsumen` (`id_konsumen`, `kode_konsumen`, `nik`, `nama`, `hp`, `bg_mobil`, `merk_mobil`, `warna_mobil`, `tgl_daftar`, `alamat`) VALUES
(1, '2', '1702002', 'Thania', 888888, 'mobil', 'toyota', 'hitam', '2020-08-17', 'j'),
(2, '3', '1702003', 'Tri', 999999, 'mobil', 'jazz', 'silver', '2020-08-29', 'stikom'),
(4, '5', '1702008', 'Aditya', 777, 'mobil', 'python', 'merah', '2020-08-09', 'telanai'),
(5, '122', '333', 'sa', 345, 'mobil', 'haj', 'er', '2020-08-06', 'ha');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `no` int(11) NOT NULL,
  `konsumen` varchar(250) CHARACTER SET latin1 NOT NULL,
  `kode_transaksi` varchar(250) CHARACTER SET latin1 NOT NULL,
  `kode_barang` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `barang` varchar(250) CHARACTER SET latin1 NOT NULL,
  `Qty` varchar(100) CHARACTER SET latin1 NOT NULL,
  `Harga` varchar(250) CHARACTER SET latin1 NOT NULL,
  `total_harga` varchar(100) CHARACTER SET latin1 NOT NULL,
  `tgl` date NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`no`, `konsumen`, `kode_transaksi`, `kode_barang`, `barang`, `Qty`, `Harga`, `total_harga`, `tgl`) VALUES
(380, 'ubah data', 'Fgg4jv', 'dsfdsf', '123', '123', '123', '123', '2020-09-17'),
(381, 'oo', '79', '98', 'fasa', '6', '34', '23', '2020-08-25'),
(383, 'qewwqe', 'ewqwe', 'asdasd', 'asdasd', '1', '1324234', '13241324', '2020-09-17'),
(385, 'qewwqe', 'ewqwe', 'dsafasdf', 'asdasd', '123', '123', '123', '2020-09-17'),
(390, 'Thania', '', '', 'adasd', '123333333', '', '', '2020-09-19'),
(389, 'coba di edit', 'ewqwe', '123', '12333', '123', '123', '123', '2020-09-18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `nama` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `foto` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `id_level` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`, `nama`, `foto`, `id_level`) VALUES
(2, 'admin', 'admin', 'Isep Lutpi Nur', 'My-Account-Icon.jpg', 2),
(4, 'user', 'user', 'Isep Lutpi', 'login.png', 6),
(10, 'nurul', 'nurul', 'Nurul Husnul', 'My-Account-Icon.jpg', 2),
(3, 'Kasir', 'Kasir', 'Kasir', 'My-Account-Icon.jpg', 3),
(1, 'Pimpinan', 'Pimpinan', 'Pimpinan', 'Pimpinan_5f657be24dcc2.png', 1),
(14, 'user123', '12345', 'Tambah data', 'user123_5f6585e5787c3.png', 1),
(15, 'user', 'user', 'admin', 'user_5f65868939178.png', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user_access_menu`
--

CREATE TABLE `tb_user_access_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `id_user_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user_access_menu`
--

INSERT INTO `tb_user_access_menu` (`id`, `menu_id`, `id_user_level`) VALUES
(1, 5, 1),
(33, 6, 2),
(40, 4, 2),
(46, 5, 2),
(47, 3, 2),
(48, 2, 2),
(49, 2, 3),
(50, 4, 3),
(51, 3, 3),
(52, 6, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user_access_sub_menu`
--

CREATE TABLE `tb_user_access_sub_menu` (
  `id` int(11) NOT NULL,
  `sub_menu_id` int(11) NOT NULL,
  `id_user_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user_access_sub_menu`
--

INSERT INTO `tb_user_access_sub_menu` (`id`, `sub_menu_id`, `id_user_level`) VALUES
(1, 5, 2),
(3, 1, 1),
(5, 1, 2),
(6, 17, 2),
(7, 2, 2),
(8, 3, 2),
(9, 20, 2),
(11, 21, 2),
(12, 22, 2),
(13, 24, 2),
(14, 25, 2),
(15, 26, 2),
(16, 27, 2),
(17, 32, 2),
(18, 30, 2),
(20, 20, 3),
(22, 22, 3),
(24, 34, 2),
(25, 21, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user_level`
--

CREATE TABLE `tb_user_level` (
  `id_level` int(11) NOT NULL,
  `title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user_level`
--

INSERT INTO `tb_user_level` (`id_level`, `title`) VALUES
(1, 'Pimpinan'),
(2, 'Admin'),
(3, 'Kasir'),
(4, 'User'),
(6, 'Supervisor Tes');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user_menu`
--

CREATE TABLE `tb_user_menu` (
  `user_menu_id` int(11) NOT NULL,
  `menu_title` varchar(128) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `menu_url` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user_menu`
--

INSERT INTO `tb_user_menu` (`user_menu_id`, `menu_title`, `icon`, `menu_url`) VALUES
(2, 'Data Transaksi', 'fa fa-edit fa-2x', 'transaksi'),
(3, 'Laporan', 'fa fa-edit fa-2x', 'laporan'),
(4, 'Data Master', 'fa fa-laptop fa-2x', 'data_master'),
(5, 'Data Pengguna', 'fa fa-user fa-2x', 'pengguna'),
(6, 'Menu Mnajemen', 'fa fa-folder fa-2x', 'menumanagement'),
(30, 'admin', 'fas fa-fw fa-user-edit', '123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user_sub_menu`
--

CREATE TABLE `tb_user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `sub_menu_url` varchar(50) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user_sub_menu`
--

INSERT INTO `tb_user_sub_menu` (`id`, `menu_id`, `title`, `sub_menu_url`, `file`) VALUES
(1, 5, 'Data Pengguna', 'pengguna', 'page/data_pengguna/pengguna/pengguna.php'),
(2, 5, 'Profile Saya', 'profile', 'page/data_pengguna/profile/profile.php'),
(3, 6, 'Menu Manajemen', 'menumanagement', 'page/menu_management/menu_management/switcher.php'),
(5, 6, 'Submenu Manajemen', 'submenumanagement', 'page/menu_management/submenu_management/switcher.php'),
(17, 6, 'Hak Akses', 'hakaksesmanagement', 'page/menu_management/hak_akses/switcher.php'),
(20, 4, 'Data Kategori Barang', 'kategori', 'page/data_master/kategori/kategori.php'),
(21, 4, 'Data Barang', 'barang', 'page/data_master/barang/barang.php'),
(22, 4, 'Data Konsumen', 'konsumen', 'page/data_master/konsumen/konsumen.php'),
(24, 3, 'Laporan Barang', 'barang', 'page/data_master/barang/form_laporan_barang.php'),
(25, 3, 'Laporan Konsumen', 'konsumen', 'page/data_master/konsumen/form_laporan_konsumen.php'),
(26, 3, 'Laporan Kategori', 'kategori', 'page/data_master/kategori/form_laporan_kategori.php'),
(27, 3, 'Laporan Transaksi', 'transaksi', 'page/data_transaksi/transaksi/form_laporan_transaksi.php'),
(30, 2, 'Data Transaksi', 'transaksi', 'page/data_transaksi/transaksi/transaksi.php'),
(32, 30, 'admin', 'menu/usermanagement', 'page/menu_management/submenu_management/switcher.php'),
(33, 4, 'admin', 'menu/usermanagement', 'page/menu_management/submenu_management/switcher.php'),
(34, 5, 'Data Level', 'level', 'page/data_pengguna/level/switcher.php'),
(36, 3, '324324', 'menu', 'page/index.php');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`nis`);

--
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD UNIQUE KEY `isbn` (`gambar`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tb_konsumen`
--
ALTER TABLE `tb_konsumen`
  ADD PRIMARY KEY (`id_konsumen`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_user_access_menu`
--
ALTER TABLE `tb_user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_user_access_sub_menu`
--
ALTER TABLE `tb_user_access_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_user_level`
--
ALTER TABLE `tb_user_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `tb_user_menu`
--
ALTER TABLE `tb_user_menu`
  ADD PRIMARY KEY (`user_menu_id`);

--
-- Indeks untuk tabel `tb_user_sub_menu`
--
ALTER TABLE `tb_user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tb_konsumen`
--
ALTER TABLE `tb_konsumen`
  MODIFY `id_konsumen` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=391;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tb_user_access_menu`
--
ALTER TABLE `tb_user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT untuk tabel `tb_user_access_sub_menu`
--
ALTER TABLE `tb_user_access_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `tb_user_level`
--
ALTER TABLE `tb_user_level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_user_menu`
--
ALTER TABLE `tb_user_menu`
  MODIFY `user_menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `tb_user_sub_menu`
--
ALTER TABLE `tb_user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
