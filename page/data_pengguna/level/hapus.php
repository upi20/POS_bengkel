<?php
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$koneksi->query("DELETE FROM `tb_user_level` WHERE `tb_user_level`.`id_level` = '$id'");

	if (mysqli_affected_rows($koneksi) > 0) {
		setAlert('Berhasil..! ','Data berhasil dihapus..', 'success');
		echo '<script type = "text/javascript">window.location.href = "' . $_baseurl . '";</script>';
	} else {
		setAlert('Gagal..! ','Data gagal dihapus..', 'success');
		echo '<script type = "text/javascript">window.location.href = "' . $_baseurl . '";</script>';
	}
} else {
	setAlert('Gagal..! ','Data gagal dihapus..', 'success');
	echo '<script type = "text/javascript">window.location.href = "' . $_baseurl . '";</script>';
}
