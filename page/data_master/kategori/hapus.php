<?php
if (isset($_GET['id_kategori'])) {
	$id_kategori = $_GET['id_kategori'];
	$koneksi->query("delete from tb_kategori where id_kategori ='$id_kategori'");

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
