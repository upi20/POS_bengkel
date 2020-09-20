<?php
if (isset($_GET['id'])) {
	$id_user     = $_GET['id'];
	$ambil       = $koneksi->query("select * from tb_user where id='$id_user'");
	$data        = $ambil->fetch_assoc();
	$foto_produk = $data['foto'];

	if (file_exists("images/user_profile/$foto_produk")) {
		unlink("images/user_profile/$foto_produk");
	}
	$koneksi->query("delete from tb_user where id='$id_user'");

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
