<?php
if (isset($_GET['id_barang'])) {
	$id_barang = $_GET['id_barang'];

	// mengambil nama gambar
	$fotoasal = query("SELECT `gambar` FROM `tb_barang` WHERE `tb_barang`.`id_barang` = '$id_barang'")[0]['gambar'];
	// menghapus gambar jika ada
	if (file_exists("images/master_data_barang/$fotoasal")) {
		unlink("images/master_data_barang/$fotoasal");
	}

	// menghapus data
	$koneksi->query("delete from tb_barang where id_barang ='$id_barang'");

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
