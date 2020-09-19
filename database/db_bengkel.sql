SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

CREATE TABLE `tb_anggota` (
  `nis` int(10) NOT NULL,
  `nama` varchar(200) COLLATE utf8_bin NOT NULL,
  `tempat_lahir` varchar(100) COLLATE utf8_bin NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` enum('l','p') COLLATE utf8_bin NOT NULL,
  `kelas` enum('I','II','III','IV','V','VI') COLLATE utf8_bin NOT NULL,
  `tgl_input` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `tb_anggota` VALUES
(2016210004, 'Narti', 'Makassar', '2019-07-16', 'p', 'V', '2019-07-28 14:30:30'),
(2016210002, 'Putri Mawar', 'Makassar', '2019-07-03', 'p', 'VI', '2019-07-31 19:33:02'),
(2016210003, 'Dony Pratama', 'Makassar', '2019-07-12', 'p', 'V', '2019-07-28 21:42:43'),
(2016210001, 'Nawirah', 'Makassar', '2019-07-02', 'l', 'VI', '2019-07-28 21:43:12');

CREATE TABLE `tb_barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(200) COLLATE utf8_bin NOT NULL,
  `kode_barang` varchar(100) COLLATE utf8_bin NOT NULL,
  `harga_beli` int(255) NOT NULL,
  `harga_jual` int(255) NOT NULL,
  `gambar` varchar(255) COLLATE utf8_bin NOT NULL,
  `stok` int(50) NOT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `tb_barang` VALUES
(40, 'Ubah Nama barang', '12312', 231, 1232, 'FB_IMG_1596702327604.jpg', 300, 16),
(41, 'adasd', 'qweqwe', 1231, 12313, '20200706_133053.jpg', 1234, 16),
(42, 'adjie123', 'qweqwe', 1234123, 213123, 'logo.webp', 123, 12),
(43, 'hasan', '172', 123, 234, 'th (3).jpg', 12, 16),
(46, '111', '111efd', 11, 11, 'FB_IMG_1596702330078.jpg', 111, 16),
(50, 'Tes Tambah Barang', '123', 11, 11, '123_5f658f675622b.jpg', 111, 16);

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `tb_kategori` VALUES
(8, 'asdasds2'),
(9, '123'),
(10, 'asdasds'),
(11, 'afdas'),
(12, 'sukaaa12'),
(13, 'oooooooo'),
(16, 'Tambah kategori tes tus');

CREATE TABLE `tb_konsumen` (
  `id_konsumen` bigint(20) NOT NULL,
  `kode_konsumen` varchar(50) COLLATE utf8_bin NOT NULL,
  `nik` varchar(50) COLLATE utf8_bin NOT NULL,
  `nama` varchar(50) COLLATE utf8_bin NOT NULL,
  `hp` int(11) NOT NULL,
  `bg_mobil` varchar(50) COLLATE utf8_bin NOT NULL,
  `merk_mobil` varchar(50) COLLATE utf8_bin NOT NULL,
  `warna_mobil` varchar(50) COLLATE utf8_bin NOT NULL,
  `tgl_daftar` date NOT NULL,
  `alamat` mediumtext COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `tb_konsumen` VALUES
(1, '2', '1702002', 'Thania', 888888, 'mobil', 'toyota', 'hitam', '2020-08-17', 'j'),
(2, '3', '1702003', 'Tri', 999999, 'mobil', 'jazz', 'silver', '2020-08-29', 'stikom'),
(4, '5', '1702008', 'Aditya', 777, 'mobil', 'python', 'merah', '2020-08-09', 'telanai'),
(5, '122', '333', 'sa', 345, 'mobil', 'haj', 'er', '2020-08-06', 'ha');

CREATE TABLE `tb_transaksi` (
  `no` int(11) NOT NULL,
  `konsumen` varchar(250) COLLATE utf8_bin NOT NULL,
  `kode_transaksi` varchar(250) COLLATE utf8_bin NOT NULL,
  `kode_barang` varchar(250) COLLATE utf8_bin NOT NULL,
  `barang` varchar(250) COLLATE utf8_bin NOT NULL,
  `Qty` varchar(100) COLLATE utf8_bin NOT NULL,
  `Harga` varchar(250) COLLATE utf8_bin NOT NULL,
  `total_harga` varchar(100) COLLATE utf8_bin NOT NULL,
  `tgl` date NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `tb_transaksi` VALUES
(380, 'ubah data', 'Fgg4jv', 'dsfdsf', '123', '123', '123', '123', '2020-09-17'),
(381, 'oo', '79', '98', 'fasa', '6', '34', '23', '2020-08-25'),
(383, 'qewwqe', 'ewqwe', 'asdasd', 'asdasd', '1', '1324234', '13241324', '2020-09-17'),
(385, 'qewwqe', 'ewqwe', 'dsafasdf', 'asdasd', '123', '123', '123', '2020-09-17'),
(389, 'coba di edit', 'ewqwe', '123', '12333', '123', '123', '123', '2020-09-18');

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_bin NOT NULL,
  `password` varchar(100) COLLATE utf8_bin NOT NULL,
  `nama` varchar(200) COLLATE utf8_bin NOT NULL,
  `foto` varchar(200) COLLATE utf8_bin NOT NULL,
  `id_level` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `tb_user` VALUES
(2, 'admin', 'admin', 'Isep Lutpi Nur', 'admin_5f65bc3568423.jpg', 2),
(4, 'user', 'user', 'Isep Lutpi', 'login.png', 6),
(16, 'iseplutpi', '1234', 'Isep Lutpi Nur', 'iseplutpii_5f65dcbdf3ef3.jpg', 1),
(10, 'nurul', 'nurul', 'Nurul Husnul', 'My-Account-Icon.jpg', 2),
(3, 'Kasir', 'Kasir', 'Kasir', 'Kasir_5f65da0a14844.jpg', 3),
(1, 'Pimpinan', 'Pimpinan', 'Pimpinan', 'Pimpinan_5f657be24dcc2.png', 1),
(14, 'user123', '12345', 'Tambah data', 'user123_5f6585e5787c3.png', 1),
(15, 'user', 'user', 'admin', 'user_5f65868939178.png', 2);

CREATE TABLE `tb_user_access_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `id_user_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `tb_user_access_menu` VALUES
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
(60, 4, 1);

CREATE TABLE `tb_user_access_sub_menu` (
  `id` int(11) NOT NULL,
  `sub_menu_id` int(11) NOT NULL,
  `id_user_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `tb_user_access_sub_menu` VALUES
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
(32, 36, 1),
(33, 27, 1),
(34, 24, 1),
(35, 25, 1),
(36, 26, 1),
(37, 32, 1),
(38, 3, 1),
(39, 33, 1),
(40, 22, 1),
(41, 21, 1),
(42, 20, 1),
(43, 17, 1),
(44, 5, 1);

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


ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`nis`);

ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD UNIQUE KEY `isbn` (`gambar`);

ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

ALTER TABLE `tb_konsumen`
  ADD PRIMARY KEY (`id_konsumen`);

ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`no`);

ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tb_user_access_menu`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tb_user_access_sub_menu`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tb_user_level`
  ADD PRIMARY KEY (`id_level`);

ALTER TABLE `tb_user_menu`
  ADD PRIMARY KEY (`user_menu_id`);

ALTER TABLE `tb_user_sub_menu`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

ALTER TABLE `tb_konsumen`
  MODIFY `id_konsumen` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `tb_transaksi`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=391;

ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

ALTER TABLE `tb_user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

ALTER TABLE `tb_user_access_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

ALTER TABLE `tb_user_level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `tb_user_menu`
  MODIFY `user_menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

ALTER TABLE `tb_user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
