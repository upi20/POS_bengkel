SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE `tb_barang_data` (
  `id_barang_data` int(11) NOT NULL,
  `id_barang_kategori` int(11) NOT NULL,
  `barang_data_nama` varchar(200) COLLATE utf8_bin NOT NULL,
  `barang_data_kode` varchar(100) COLLATE utf8_bin NOT NULL,
  `barang_data_harga_beli` int(255) NOT NULL,
  `barang_data_harga_jual` int(255) NOT NULL,
  `barang_data_gambar` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `tb_barang_data` VALUES
(40, 8, 'Ban addidas', '2020-09-19-5f66001194479', 300000, 350000, '2020-09-19-5f66001194479_5f66013366fe6.jpg'),
(41, 13, 'Spion Addinda', '2020-09-19-5f660025905c9', 100000, 110000, 'qweqwe_5f65ecebaad38.jpg'),
(42, 9, 'Velg Rokstar', '2020-09-19-5f6600401f739', 1000000, 1200000, 'qweqwe_5f65ed197799c.jpg'),
(43, 11, 'Pintu kulkas', '2020-09-19-5f660052cb49e', 500000, 550000, '172_5f65e7b8e9534.jpg'),
(46, 13, 'Kaca Spion', '2020-09-19-5f66005fb0a3a', 30000, 35000, '111efd_5f65e7944b0ed.jpg'),
(50, 10, 'Monitor LCD', '2020-09-19-5f66007e8767d', 2000000, 2200000, '123_5f65e77157af2.jpg'),
(53, 8, 'Spion super', '2020-09-20-5f66bb70afac9', 50000, 51000, '2020-09-20-5f66bb70afac9_5f66bbd1b5969.jpg'),
(54, 21, 'Spion super Duper', '2020-09-20-5f670f9643b7b', 1000000, 1000001, '2020-09-20-5f670f9643b7b_5f670fc904f9b.jpg');

CREATE TABLE `tb_barang_kategori` (
  `id_barang_kategori` int(11) NOT NULL,
  `barang_kategori_nama` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `tb_barang_kategori` VALUES
(8, 'Ban'),
(9, 'Velg'),
(10, 'Elektronik'),
(11, 'Pintu'),
(12, 'Kaca'),
(13, 'Spion'),
(16, 'Tambah kategori tes tus'),
(21, 'Lain-Lain');

CREATE TABLE `tb_barang_keluar` (
  `id_barang_keluar` int(11) NOT NULL,
  `id_barang_data` int(11) NOT NULL,
  `id_barang_konsumen` int(11) NOT NULL,
  `barang_keluar_kode` varchar(250) COLLATE utf8_bin NOT NULL,
  `barang_keluar_jumlah` int(11) NOT NULL,
  `barang_keluar_harga` bigint(20) NOT NULL,
  `barang_keluar_tanggal` date NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `tb_barang_keluar` VALUES
(391, 53, 7, '2020-09-20-5f66e3b466474', 1, 50000, '0000-00-00'),
(392, 40, 7, '2020-09-20-5f66e54b61d69', 90, 350000, '2020-09-20'),
(393, 40, 7, '2020-09-20-5f66e8e0b391b', 5, 350000, '2020-09-20'),
(394, 42, 7, '2020-09-20-5f66ef6898432', 1, 1200000, '2020-09-20');

CREATE TABLE `tb_barang_konsumen` (
  `id_barang_konsumen` int(20) NOT NULL,
  `barang_konsumen_kode` varchar(50) COLLATE utf8_bin NOT NULL,
  `barang_konsumen_nik` varchar(50) COLLATE utf8_bin NOT NULL,
  `barang_konsumen_nama` varchar(50) COLLATE utf8_bin NOT NULL,
  `barang_konsumen_no_telepon` varchar(50) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `barang_konsumen_merk_mobil` varchar(50) COLLATE utf8_bin NOT NULL,
  `barang_konsumen_warna_mobil` varchar(50) COLLATE utf8_bin NOT NULL,
  `barang_konsumen_tanggal_daftar` date NOT NULL,
  `barang_konsumen_alamat` mediumtext COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `tb_barang_konsumen` VALUES
(7, '2020-09-20-5f66d2284cda3', '94545345834757345', 'Bambang sugiono', '+62 85798132505', 'Toyota ', 'Merah', '2020-09-20', 'Bandung'),
(8, '2020-09-20-5f66d4f76d70b', '200081000033311123', 'Kulan Bin Pulan', '085798132505', 'Mitshubishi ', 'Hitam', '2020-09-20', 'Cikupa tangerang');

CREATE TABLE `tb_barang_masuk` (
  `id_barang_masuk` int(11) NOT NULL,
  `id_barang_data` int(11) NOT NULL,
  `id_barang_suplier` int(11) NOT NULL,
  `barang_masuk_kode` varchar(250) COLLATE utf8_bin NOT NULL,
  `barang_masuk_jumlah` int(11) NOT NULL,
  `barang_masuk_harga` bigint(20) NOT NULL,
  `barang_masuk_tanggal` date NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

CREATE TABLE `tb_barang_suplier` (
  `id_barang_suplier` int(11) NOT NULL,
  `barang_suplier_nama` varchar(50) NOT NULL,
  `barang_suplier_no_telepon` varchar(20) NOT NULL,
  `barang_suplier_alamat` text NOT NULL,
  `barang_suplier_tanggal_daftar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_bin NOT NULL,
  `password` varchar(100) COLLATE utf8_bin NOT NULL,
  `nama` varchar(200) COLLATE utf8_bin NOT NULL,
  `foto` varchar(200) COLLATE utf8_bin NOT NULL,
  `id_level` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `tb_user` VALUES
(2, 'admin', 'admin', 'Isep Lutpi Nur', 'admin_5f65e86a67474.jpg', 2),
(4, 'user', 'user', 'Isep Lutpi', 'user_5f65e8b0c779e.jpg', 6),
(16, 'iseplutpi', '1234', 'Isep Lutpi Nur', 'iseplutpi_5f65e856d9fef.jpg', 1),
(10, 'nurul', 'nurul', 'Nurul Husnul', 'nurul_5f65e891052f4.jpg', 2),
(3, 'Kasir', 'Kasir', 'Kasir', 'Kasir_5f65e8b08f909.jpg', 3),
(1, 'Pimpinan', 'Pimpinan', 'Pimpinan', 'Pimpinan_5f65e856bbb88.jpg', 1),
(14, 'user123', '12345', 'Tambah data', 'user123_5f65e85dd9d97.jpg', 1),
(15, 'user', 'user', 'admin', 'user_5f65e8911d99a.jpg', 2);

CREATE TABLE `tb_user_level` (
  `id_level` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `tb_user_level` VALUES
(1, 'Pimpinan'),
(2, 'Admin'),
(3, 'Kasir'),
(4, 'User'),
(6, 'Supervisor Tes');

CREATE TABLE `tb_user_menu` (
  `user_menu_id` int(11) NOT NULL,
  `menu_title` varchar(128) COLLATE utf8_bin NOT NULL,
  `icon` varchar(255) COLLATE utf8_bin NOT NULL,
  `menu_url` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `tb_user_menu` VALUES
(2, 'Data Transaksi', 'fa fa-edit fa-2x', 'transaksi'),
(3, 'Laporan', 'fa fa-edit fa-2x', 'laporan'),
(4, 'Data Master', 'fa fa-laptop fa-2x', 'data_master'),
(5, 'Data Pengguna', 'fa fa-user fa-2x', 'pengguna'),
(6, 'Menu Mnajemen', 'fa fa-folder fa-2x', 'menumanagement'),
(30, 'admin', 'fas fa-fw fa-user-edit', '123');

CREATE TABLE `tb_user_menu_access` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `id_user_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `tb_user_menu_access` VALUES
(1, 5, 1),
(33, 6, 2),
(40, 4, 2),
(46, 5, 2),
(47, 3, 2),
(48, 2, 2),
(51, 3, 3),
(53, 5, 3),
(54, 2, 3),
(55, 30, 3),
(56, 2, 1),
(57, 3, 1),
(58, 30, 1),
(59, 6, 1),
(60, 4, 1),
(61, 30, 6),
(62, 30, 6);

CREATE TABLE `tb_user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) COLLATE utf8_bin NOT NULL,
  `sub_menu_url` varchar(50) COLLATE utf8_bin NOT NULL,
  `file` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `tb_user_sub_menu` VALUES
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

CREATE TABLE `tb_user_sub_menu_access` (
  `id` int(11) NOT NULL,
  `sub_menu_id` int(11) NOT NULL,
  `id_user_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `tb_user_sub_menu_access` VALUES
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
(25, 21, 3),
(26, 2, 3),
(28, 32, 3),
(29, 34, 1),
(30, 30, 1),
(31, 2, 1),
(33, 27, 1),
(34, 24, 1),
(35, 25, 1),
(36, 26, 1),
(38, 3, 1),
(40, 22, 1),
(41, 21, 1),
(42, 20, 1),
(43, 17, 1),
(44, 5, 1);


ALTER TABLE `tb_barang_data`
  ADD PRIMARY KEY (`id_barang_data`),
  ADD UNIQUE KEY `isbn` (`barang_data_gambar`);

ALTER TABLE `tb_barang_kategori`
  ADD PRIMARY KEY (`id_barang_kategori`);

ALTER TABLE `tb_barang_keluar`
  ADD PRIMARY KEY (`id_barang_keluar`);

ALTER TABLE `tb_barang_konsumen`
  ADD PRIMARY KEY (`id_barang_konsumen`);

ALTER TABLE `tb_barang_masuk`
  ADD PRIMARY KEY (`id_barang_masuk`);

ALTER TABLE `tb_barang_suplier`
  ADD PRIMARY KEY (`id_barang_suplier`);

ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tb_user_level`
  ADD PRIMARY KEY (`id_level`);

ALTER TABLE `tb_user_menu`
  ADD PRIMARY KEY (`user_menu_id`);

ALTER TABLE `tb_user_menu_access`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tb_user_sub_menu`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tb_user_sub_menu_access`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `tb_barang_data`
  MODIFY `id_barang_data` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

ALTER TABLE `tb_barang_kategori`
  MODIFY `id_barang_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

ALTER TABLE `tb_barang_keluar`
  MODIFY `id_barang_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=395;

ALTER TABLE `tb_barang_konsumen`
  MODIFY `id_barang_konsumen` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

ALTER TABLE `tb_barang_masuk`
  MODIFY `id_barang_masuk` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `tb_barang_suplier`
  MODIFY `id_barang_suplier` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

ALTER TABLE `tb_user_level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `tb_user_menu`
  MODIFY `user_menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

ALTER TABLE `tb_user_menu_access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

ALTER TABLE `tb_user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

ALTER TABLE `tb_user_sub_menu_access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
