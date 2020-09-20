<?php
if (isset($_GET['id_konsumen'])) {
	$id_konsumen = $_GET['id_konsumen'];

	// menghapus data
	$koneksi->query("DELETE FROM `tb_barang_konsumen` WHERE `tb_barang_konsumen`.`id_barang_konsumen`='$id_konsumen'");

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
