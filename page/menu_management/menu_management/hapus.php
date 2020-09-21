<?php
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$koneksi->query("DELETE FROM `tb_user_menu` WHERE `tb_user_menu`.`user_menu_id` = '$id'");

	if (mysqli_errno($koneksi) == 0) {
		setAlert('Berhasil..! ', 'Data berhasil dihapus..', 'success');
		echo '<script type="text/javascript"> window.location.href = "' . $_baseurl . '"; </script> ';
	} else if (mysqli_errno($koneksi) == 1451) {
		setAlert('Gagal..! ', 'Data gagal hapus.. Menu ini digunakan oleh SubMenu lain..', 'danger');
		echo '<script type="text/javascript"> window.location.href = "' . $_baseurl . '"; </script> ';
	}
} else {
	setAlert('Galat..! ', 'Fatal error tidak ada id yang dikirimkan..', 'danger');
	echo '<script type="text/javascript"> window.location.href = "' . $_baseurl . '"; </script> ';
}
