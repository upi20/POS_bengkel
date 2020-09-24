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
  `barang_data_tanggal` date NOT NULL,
  `barang_data_gambar` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `tb_barang_data` (`id_barang_data`, `id_barang_kategori`, `barang_data_nama`, `barang_data_kode`, `barang_data_harga_beli`, `barang_data_harga_jual`, `barang_data_tanggal`, `barang_data_gambar`) VALUES
(40, 8, 'Ban addidas Terbaru', '2020-09-19-5f66001194479', 300000, 350000, '2020-09-23', '2020-09-19-5f66001194479_5f6718c627efa.jpg'),
(41, 13, 'Spion Addinda', '2020-09-19-5f660025905c9', 100000, 110000, '2020-09-22', 'qweqwe_5f65ecebaad38.jpg'),
(42, 9, 'Velg Rokstar', '2020-09-19-5f6600401f739', 1000000, 1200000, '2020-09-01', 'qweqwe_5f65ed197799c.jpg'),
(46, 13, 'Kaca Spion', '2020-09-19-5f66005fb0a3a', 30000, 35000, '2020-09-26', '111efd_5f65e7944b0ed.jpg'),
(50, 10, 'Monitor LCD', '2020-09-19-5f66007e8767d', 2000000, 2200000, '2020-09-22', '123_5f65e77157af2.jpg'),
(53, 8, 'Spion super', '2020-09-20-5f66bb70afac9', 50000, 51000, '2020-09-23', '2020-09-20-5f66bb70afac9_5f674b87bad1b.jpg');

CREATE TABLE `tb_barang_kategori` (
  `id_barang_kategori` int(11) NOT NULL,
  `barang_kategori_nama` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `tb_barang_kategori` (`id_barang_kategori`, `barang_kategori_nama`) VALUES
(8, 'Ban'),
(10, 'Elektronik'),
(12, 'Kaca'),
(21, 'Lain-Lain'),
(23, 'Lainnya'),
(24, 'Other'),
(13, 'Spion'),
(9, 'Velg');

CREATE TABLE `tb_barang_keluar` (
  `id_barang_keluar` int(11) NOT NULL,
  `id_barang_data` int(11) NOT NULL,
  `id_barang_konsumen` int(11) NOT NULL,
  `barang_keluar_kode` varchar(250) COLLATE utf8_bin NOT NULL,
  `barang_keluar_jumlah` int(11) NOT NULL,
  `barang_keluar_harga` bigint(20) NOT NULL,
  `barang_keluar_tanggal` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `tb_barang_keluar` (`id_barang_keluar`, `id_barang_data`, `id_barang_konsumen`, `barang_keluar_kode`, `barang_keluar_jumlah`, `barang_keluar_harga`, `barang_keluar_tanggal`) VALUES
(1, 53, 7, '2020-09-20-5f66e3b466474', 1, 50000, '0000-00-00'),
(2, 40, 7, '2020-09-20-5f66e54b61d69', 1, 350000, '2020-09-20'),
(3, 40, 7, '2020-09-20-5f66e8e0b391b', 5, 350000, '2020-09-20'),
(4, 42, 7, '2020-09-20-5f66ef6898432', 9, 1200000, '2020-09-20'),
(6, 50, 7, '2020-09-22-5f69856fd3548', 15, 2200000, '2020-09-22'),
(8, 50, 8, '2020-09-22-5f698edcb9099', 17, 2200000, '2020-09-22'),
(9, 53, 8, '2020-09-22-5f699a226abd8', 1, 51000, '2020-09-22'),
(10, 50, 7, '2020-09-24-5f6c736cec763', 14, 2200000, '2020-09-24');

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

INSERT INTO `tb_barang_konsumen` (`id_barang_konsumen`, `barang_konsumen_kode`, `barang_konsumen_nik`, `barang_konsumen_nama`, `barang_konsumen_no_telepon`, `barang_konsumen_merk_mobil`, `barang_konsumen_warna_mobil`, `barang_konsumen_tanggal_daftar`, `barang_konsumen_alamat`) VALUES
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `tb_barang_masuk` (`id_barang_masuk`, `id_barang_data`, `id_barang_suplier`, `barang_masuk_kode`, `barang_masuk_jumlah`, `barang_masuk_harga`, `barang_masuk_tanggal`) VALUES
(2, 46, 1, '2020-09-21-5f68118e38ee3', 10, 35000, '2020-09-21'),
(3, 46, 3, '2020-09-21-5f68121bf06ec', 1, 35000, '2020-09-21'),
(4, 40, 1, '2020-09-21-5f68122aebc24', 1, 350000, '2020-09-21'),
(5, 40, 2, '2020-09-21-5f68123a9e2ea', 1, 350000, '2020-09-21'),
(8, 40, 1, '2020-09-20-5f6762d29123e', 1, 350000, '2020-09-20'),
(9, 40, 1, '2020-09-20-5f6762d29123e', 1, 350000, '2020-09-20'),
(10, 40, 1, '2020-09-20-5f6762d29123e', 1, 350000, '2020-09-20'),
(12, 50, 1, '2020-09-21-5f689c1d6fbe6', 10, 2200000, '2020-09-21'),
(13, 50, 2, '2020-09-21-5f689e026ca0e', 10, 2200000, '2020-09-21'),
(14, 40, 2, '2020-09-21-5f68a5cf13eb0', 2, 350000, '2020-09-21'),
(15, 42, 2, '2020-09-21-5f68a610ac39e', 4, 1200000, '2020-09-21'),
(16, 42, 2, '2020-09-21-5f68a610ac39e', 1, 1200000, '2020-09-21'),
(17, 53, 2, '2020-09-21-5f68b44f7a19a', 2, 51000, '2020-09-21'),
(18, 42, 2, '2020-09-21-5f68b45f07910', 5, 1200000, '2020-09-21'),
(19, 50, 1, '2020-09-22-5f6986f9523d5', 26, 2200000, '2020-09-22'),
(20, 50, 3, '2020-09-24-5f6c73aacd052', 7, 2200000, '2020-09-24'),
(21, 50, 1, '2020-09-24-5f6c73d02800a', 4, 2200000, '2020-09-24');

CREATE TABLE `tb_barang_suplier` (
  `id_barang_suplier` int(11) NOT NULL,
  `barang_suplier_nama` varchar(50) NOT NULL,
  `barang_suplier_kode` varchar(50) NOT NULL,
  `barang_suplier_no_telepon` varchar(20) NOT NULL,
  `barang_suplier_tanggal_daftar` date NOT NULL,
  `barang_suplier_alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tb_barang_suplier` (`id_barang_suplier`, `barang_suplier_nama`, `barang_suplier_kode`, `barang_suplier_no_telepon`, `barang_suplier_tanggal_daftar`, `barang_suplier_alamat`) VALUES
(1, 'Pt. Sakti Mantra Guna Indah', '2020-09-20-5f67565585854', '089123505', '2020-09-19', 'Banceuy Jawa Utara'),
(2, 'Muhidin bin syukur', '2020-09-20-5f6757b184019', '0943438463333', '2020-09-20', 'Kabupaten Ciamis'),
(3, 'Pt. Indah Makmur Sentausa', '2020-09-20-5f675b41b734a', '085798132505', '2020-09-20', 'Nusa Tenggara Timur');

CREATE TABLE `tb_pengaturan` (
  `id_pengaturan` int(11) NOT NULL,
  `pengaturan_title` varchar(50) NOT NULL,
  `pengaturan_nilai` text NOT NULL,
  `pengaturan_deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tb_pengaturan` (`id_pengaturan`, `pengaturan_title`, `pengaturan_nilai`, `pengaturan_deskripsi`) VALUES
(1, 'nama_perusahaan', 'PT. Agung Automall Jambi', 'Nilai ini akan ditampilkan pada judul halaman dan coopyright'),
(2, 'tahuncopyright', '2020', 'Tahun ini ditampilkan dibawah tepatnya di footer'),
(3, 'logo', 'bg.jpg', 'Logo halaman dashboard dan login'),
(4, 'laporan', 'PT. AGUNG AUTOMALL JAMBI$Alamat: Jl. Sumantri Brojonegoro No. 135, Selamat, Kec. Telanaipura, Kota Jambi, Jambi 36129$KEPALA BENGKEL$SUTIKNA', 'Pengaturan untuk laporan untuk Header Alamat Dan nama Tanda Tangan tidak boleh memasukan karakter $\r\n'),
(5, 'default_home', 'page/home.php', 'Halaman dashboard default'),
(6, 'pengembangan', '1', 'Mode pengembangan bisa menambahkan Menghapus dan mengubah Menu dan sub menu');

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_bin NOT NULL,
  `password` varchar(100) COLLATE utf8_bin NOT NULL,
  `nama` varchar(200) COLLATE utf8_bin NOT NULL,
  `foto` varchar(200) COLLATE utf8_bin NOT NULL,
  `id_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `tb_user` (`id`, `username`, `password`, `nama`, `foto`, `id_level`) VALUES
(1, 'Pimpinan', 'Pimpinan', 'Pimpinan', 'Pimpinan_5f65e856bbb88.jpg', 1),
(2, 'admin', 'admin', 'Isep Lutpi Nur', 'admin_5f65e86a67474.jpg', 2),
(3, 'Kasir', 'Kasir', 'Kasir', 'Kasir_5f65e8b08f909.jpg', 3),
(4, 'user', 'user', 'Isep Lutpi', 'user_5f65e8b0c779e.jpg', 6),
(10, 'nurul', 'nurul', 'Nurul Husnul', 'nurul_5f65e891052f4.jpg', 2),
(14, 'user123', '12345', 'Tambah data', 'user123_5f65e85dd9d97.jpg', 1),
(15, 'user1', 'user', 'admin', 'user_5f65e8911d99a.jpg', 2),
(16, 'iseplutpi', '1234', 'Isep Lutpi Nur', 'iseplutpi_5f67525b81b35.jpg', 1);

CREATE TABLE `tb_user_level` (
  `id_level` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `tb_user_level` (`id_level`, `title`) VALUES
(2, 'Admin'),
(3, 'Kasir'),
(1, 'Pimpinan'),
(6, 'Supervisor Tes'),
(4, 'User');

CREATE TABLE `tb_user_menu` (
  `user_menu_id` int(11) NOT NULL,
  `menu_title` varchar(128) COLLATE utf8_bin NOT NULL,
  `icon` varchar(255) COLLATE utf8_bin NOT NULL,
  `menu_url` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `tb_user_menu` (`user_menu_id`, `menu_title`, `icon`, `menu_url`) VALUES
(2, 'Data Transaksi', 'fa fa-edit fa-2x', 'transaksi'),
(3, 'Laporan', 'fa fa-copy fa-2x', 'laporan'),
(4, 'Data Master', 'fa fa-laptop fa-2x', 'data_master'),
(5, 'Data Pengguna', 'fa fa-user fa-2x', 'pengguna'),
(6, 'Menu Mnajemen', 'fa fa-folder fa-2x', 'menumanagement'),
(33, 'Pengaturan', 'fa fa-gear fa-2x', 'pengatura');

CREATE TABLE `tb_user_menu_access` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `id_user_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `tb_user_menu_access` (`id`, `menu_id`, `id_user_level`) VALUES
(1, 5, 1),
(33, 6, 2),
(40, 4, 2),
(46, 5, 2),
(47, 3, 2),
(48, 2, 2),
(51, 3, 3),
(53, 5, 3),
(54, 2, 3),
(56, 2, 1),
(57, 3, 1),
(59, 6, 1),
(60, 4, 1),
(63, 33, 2),
(64, 33, 1);

CREATE TABLE `tb_user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) COLLATE utf8_bin NOT NULL,
  `sub_menu_url` varchar(50) COLLATE utf8_bin NOT NULL,
  `file` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `tb_user_sub_menu` (`id`, `menu_id`, `title`, `sub_menu_url`, `file`) VALUES
(1, 5, 'Data Pengguna', 'pengguna', 'page/data_pengguna/pengguna/pengguna.php'),
(2, 5, 'Profile Saya', 'profile', 'page/data_pengguna/profile/profile.php'),
(3, 6, 'Menu Manajemen', 'menumanagement', 'page/menu_management/menu_management/switcher.php'),
(5, 6, 'SubMenu Manajemen', 'submenumanagement', 'page/menu_management/submenu_management/switcher.php'),
(17, 6, 'Hak Akses', 'hakaksesmanagement', 'page/menu_management/hak_akses/switcher.php'),
(20, 4, 'Data Kategori Barang', 'kategori', 'page/data_master/kategori/display.php'),
(21, 4, 'Data Barang', 'barang', 'page/data_master/barang/barang.php'),
(22, 4, 'Data Konsumen', 'konsumen', 'page/data_master/konsumen/konsumen.php'),
(24, 3, 'Laporan Barang', 'barang', 'page/data_master/barang/form_laporan_barang.php'),
(25, 3, 'Laporan Konsumen', 'konsumen', 'page/data_master/konsumen/form_laporan_konsumen.php'),
(26, 3, 'Laporan Kategori', 'kategori', 'page/data_master/kategori/form_laporan_kategori.php'),
(27, 3, 'Laporan Penjualan', 'penjualan', 'page/data_transaksi/transaksi/form_laporan_transaksi.php'),
(34, 5, 'Data Level', 'level', 'page/data_pengguna/level/switcher.php'),
(37, 2, 'Data Pengadaan', 'barang_masuk', 'page/data_transaksi/barang_masuk/display.php'),
(39, 4, 'Data Suplier', 'data_suplier', 'page/data_master/suplier/switcher.php'),
(43, 33, 'Applikasi', 'app', 'page/pengaturan/aplikasi/display.php'),
(44, 33, 'Laporan', 'laporan', 'page/pengaturan/laporan/display.php'),
(45, 3, 'Laporan Pengadaan', 'pengadaan', 'page/data_transaksi/barang_masuk/laporan.php'),
(47, 2, 'Data Penjualan', 'barang_keluar', 'page/data_transaksi/barang_keluar/display.php'),
(48, 3, 'Laporan Suplier', 'suplier', 'page/data_master/suplier/laporan.php');

CREATE TABLE `tb_user_sub_menu_access` (
  `id` int(11) NOT NULL,
  `sub_menu_id` int(11) NOT NULL,
  `id_user_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `tb_user_sub_menu_access` (`id`, `sub_menu_id`, `id_user_level`) VALUES
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
(20, 20, 3),
(22, 22, 3),
(24, 34, 2),
(25, 21, 3),
(26, 2, 3),
(29, 34, 1),
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
(44, 5, 1),
(47, 37, 1),
(48, 38, 2),
(49, 38, 1),
(50, 38, 1),
(51, 39, 1),
(56, 37, 2),
(58, 43, 1),
(59, 44, 1),
(60, 39, 2),
(61, 39, 2),
(62, 43, 2),
(63, 43, 2),
(64, 44, 2),
(65, 45, 1),
(66, 45, 2),
(67, 47, 2),
(68, 47, 1),
(69, 48, 2),
(70, 48, 1);


ALTER TABLE `tb_barang_data`
  ADD PRIMARY KEY (`id_barang_data`),
  ADD UNIQUE KEY `barang_data_nama` (`barang_data_nama`),
  ADD UNIQUE KEY `barang_data_nama_2` (`barang_data_nama`),
  ADD KEY `id_barang_kategori` (`id_barang_kategori`);

ALTER TABLE `tb_barang_kategori`
  ADD PRIMARY KEY (`id_barang_kategori`),
  ADD UNIQUE KEY `barang_kategori_nama` (`barang_kategori_nama`);

ALTER TABLE `tb_barang_keluar`
  ADD PRIMARY KEY (`id_barang_keluar`),
  ADD KEY `id_barang_data` (`id_barang_data`),
  ADD KEY `id_barang_konsumen` (`id_barang_konsumen`);

ALTER TABLE `tb_barang_konsumen`
  ADD PRIMARY KEY (`id_barang_konsumen`);

ALTER TABLE `tb_barang_masuk`
  ADD PRIMARY KEY (`id_barang_masuk`),
  ADD KEY `id_barang_suplier` (`id_barang_suplier`),
  ADD KEY `id_barang_data` (`id_barang_data`);

ALTER TABLE `tb_barang_suplier`
  ADD PRIMARY KEY (`id_barang_suplier`),
  ADD UNIQUE KEY `barang_suplier_nama` (`barang_suplier_nama`),
  ADD UNIQUE KEY `barang_suplier_nama_2` (`barang_suplier_nama`);

ALTER TABLE `tb_pengaturan`
  ADD PRIMARY KEY (`id_pengaturan`),
  ADD UNIQUE KEY `pengaturan_title` (`pengaturan_title`);

ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `id_level` (`id_level`);

ALTER TABLE `tb_user_level`
  ADD PRIMARY KEY (`id_level`),
  ADD UNIQUE KEY `title` (`title`);

ALTER TABLE `tb_user_menu`
  ADD PRIMARY KEY (`user_menu_id`),
  ADD UNIQUE KEY `menu_url` (`menu_url`),
  ADD UNIQUE KEY `menu_title` (`menu_title`);

ALTER TABLE `tb_user_menu_access`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user_level` (`id_user_level`),
  ADD KEY `menu_id` (`menu_id`);

ALTER TABLE `tb_user_sub_menu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menu_id` (`menu_id`,`sub_menu_url`),
  ADD UNIQUE KEY `title` (`title`);

ALTER TABLE `tb_user_sub_menu_access`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user_level` (`id_user_level`),
  ADD KEY `sub_menu_id` (`sub_menu_id`);


ALTER TABLE `tb_barang_data`
  MODIFY `id_barang_data` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

ALTER TABLE `tb_barang_kategori`
  MODIFY `id_barang_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

ALTER TABLE `tb_barang_keluar`
  MODIFY `id_barang_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

ALTER TABLE `tb_barang_konsumen`
  MODIFY `id_barang_konsumen` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

ALTER TABLE `tb_barang_masuk`
  MODIFY `id_barang_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

ALTER TABLE `tb_barang_suplier`
  MODIFY `id_barang_suplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `tb_pengaturan`
  MODIFY `id_pengaturan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

ALTER TABLE `tb_user_level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `tb_user_menu`
  MODIFY `user_menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

ALTER TABLE `tb_user_menu_access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

ALTER TABLE `tb_user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

ALTER TABLE `tb_user_sub_menu_access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;


ALTER TABLE `tb_barang_data`
  ADD CONSTRAINT `tb_barang_data_ibfk_1` FOREIGN KEY (`id_barang_kategori`) REFERENCES `tb_barang_kategori` (`id_barang_kategori`);

ALTER TABLE `tb_barang_keluar`
  ADD CONSTRAINT `tb_barang_keluar_ibfk_1` FOREIGN KEY (`id_barang_data`) REFERENCES `tb_barang_data` (`id_barang_data`),
  ADD CONSTRAINT `tb_barang_keluar_ibfk_2` FOREIGN KEY (`id_barang_konsumen`) REFERENCES `tb_barang_konsumen` (`id_barang_konsumen`);

ALTER TABLE `tb_barang_masuk`
  ADD CONSTRAINT `tb_barang_masuk_ibfk_1` FOREIGN KEY (`id_barang_suplier`) REFERENCES `tb_barang_suplier` (`id_barang_suplier`),
  ADD CONSTRAINT `tb_barang_masuk_ibfk_2` FOREIGN KEY (`id_barang_data`) REFERENCES `tb_barang_data` (`id_barang_data`);

ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `tb_user_level` (`id_level`);

ALTER TABLE `tb_user_menu_access`
  ADD CONSTRAINT `tb_user_menu_access_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `tb_user_menu` (`user_menu_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_user_menu_access_ibfk_2` FOREIGN KEY (`id_user_level`) REFERENCES `tb_user_level` (`id_level`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `tb_user_sub_menu`
  ADD CONSTRAINT `tb_user_sub_menu_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `tb_user_menu` (`user_menu_id`);

ALTER TABLE `tb_user_sub_menu_access`
  ADD CONSTRAINT `tb_user_sub_menu_access_ibfk_1` FOREIGN KEY (`id_user_level`) REFERENCES `tb_user_level` (`id_level`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_user_sub_menu_access_ibfk_2` FOREIGN KEY (`sub_menu_id`) REFERENCES `tb_user_sub_menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
