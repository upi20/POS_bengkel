<?php
// ============================= tambah data
if (isset($_POST['simpan_tambah'])) {
    $id_konsumen     = $_POST['konsumen_tambah'];
    $kode_transaksi = $_POST['kode_transaksi_tambah'];
    $id_barang      = $_POST['barang_tambah'];
    $jumlah         = $_POST['qty_tambah'];
    $harga          = $_POST['harga_tambah'];
    $tgl            = $_POST['tgl_tambah'];

    $querybuilder = "INSERT INTO `tb_barang_keluar` 
	(`id_barang_keluar`, `id_barang_data`, `id_barang_konsumen`, `barang_keluar_kode`, `barang_keluar_jumlah`, `barang_keluar_harga`, `barang_keluar_tanggal`)
	VALUES 
	(NULL, '$id_barang', '$id_konsumen', '$kode_transaksi', '$jumlah', '$harga', '$tgl')";

    if ($koneksi->query($querybuilder)) {
        echo '<script type = "text/javascript">setAlert("Berhasil..! ", "Data berhasil ditambahkan..", "success");</script>';
    } else {
        echo '<script type = "text/javascript">setAlert("Gagal..! ", "Data gagal ditambahkan..", "danger");</script>';
    }
}



// ============================= ubah data
if (isset($_POST['simpan_ubah'])) {
    $id_konsumen      = $_POST['konsumen_ubah'];
    $id_barang_keluar = $_POST['id_barang_keluar_ubah'];
    $id_barang       = $_POST['barang_ubah'];
    $jumlah          = $_POST['qty_ubah'];
    $harga           = $_POST['harga_ubah'];
    $tgl             = $_POST['tgl_ubah'];
    $querybuilder    = "UPDATE 
					`tb_barang_keluar` 
					SET 
					`id_barang_data`       = '$id_barang',
					`id_barang_konsumen`    = '$id_konsumen',
					`barang_keluar_jumlah`  = '$jumlah',
					`barang_keluar_harga`   = '$harga',
					`barang_keluar_tanggal` = '$tgl'
					WHERE 
                    `tb_barang_keluar`.`id_barang_keluar` = '$id_barang_keluar'";

    if ($koneksi->query($querybuilder)) {
        echo '<script type = "text/javascript">setAlert("Berhasil..! ", "Data berhasil diubah..", "success");</script>';
    } else {
        echo '<script type = "text/javascript">setAlert("Gagal..! ", "Data gagal diubah..", "danger");</script>';
    }
}



// ============================= hapus data
if (isset($_POST['simpan_hapus'])) {
    $id_barang_keluar = $_POST['id_barang_keluar_hapus'];
    $koneksi->query("DELETE FROM tb_barang_keluar WHERE id_barang_keluar ='$id_barang_keluar'");

    if (mysqli_errno($koneksi) == 0) {
        echo '<script type = "text/javascript">setAlert("Berhasil..! ", "Data berhasil hapus..", "success");</script>';
    } else if (mysqli_errno($koneksi) == 1451) {
        echo '<script type = "text/javascript">setAlert("Gagal..! ", "Data gagal hapus..", "danger");</script>';
    }
}


// ============================= query data
$data['tambah']['barang']  = query("SELECT `id_barang_data`, `barang_data_nama`, `barang_data_kode`, `barang_data_harga_jual` FROM `tb_barang_data` ORDER BY `id_barang_data`DESC");
$data['tambah']['konsumen'] = query("SELECT `barang_konsumen_nama`, `id_barang_konsumen` FROM `tb_barang_konsumen` ORDER BY `id_barang_konsumen` DESC");
if ($data['tambah']['barang']) {
    for ($i = 0; $i < count($data['tambah']['barang']); $i++) {
        $data['tambah']['barang'][$i]['barang_data_stok'] = getStokBarang($data['tambah']['barang'][$i]['id_barang_data']);
    }
}
