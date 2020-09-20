<?php
if (isset($_GET['id'])) {
	$id_barang = $_GET['id'];

	// mengambil nama gambar
	$fotoasal = query("SELECT `barang_data_gambar` FROM `tb_barang_data` WHERE `tb_barang_data`.`id_barang_data` = '$id_barang'")[0]['barang_data_gambar'];
	// menghapus gambar jika ada
	if (file_exists("images/master_data_barang/$fotoasal")) {
		unlink("images/master_data_barang/$fotoasal");
	}

	// menghapus data
	$koneksi->query("DELETE FROM tb_barang_data WHERE id_barang_data ='$id_barang'");

	if (mysqli_affected_rows($koneksi) > 0) {
		setAlert('Berhasil..! ', 'Data berhasil dihapus..', 'success');
		echo '<script type="text/javascript"> window.location.href = "' . $_baseurl . '"; </script> ';
	} else {
		setAlert('Gagal..! ', 'Data gagal Dihapus..', 'danger');
		echo '<script type="text/javascript"> window.location.href = "' . $_baseurl . '"; </script> ';
	}
} else {
	setAlert('Galat..! ', 'Fatal error tidak ada id yang dikirimkan..', 'danger');
	echo '<script type="text/javascript"> window.location.href = "' . $_baseurl . '"; </script> ';
}
