<?php
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$koneksi->query("DELETE FROM `tb_user_sub_menu` WHERE `tb_user_sub_menu`.`id` = '$id'");

	if (mysqli_affected_rows($koneksi) > 0) {
		setAlert('Berhasil..! ','Data berhasil dihapus..', 'success');
		echo '
	<script type="text/javascript">
		window.location.href = "' . $_baseurl . '";
	</script>
	';
	} else {
		setAlert('Gagal..! ','Data gagal diubah..', 'danger');
		echo '
	<script type="text/javascript">
		window.location.href = "' . $_baseurl . '";
	</script>
	';
	}
} else {
	setAlert('Galat..! ','Fatal error tidak ada id yang dikirimkan..', 'danger');
	echo '
	<script type = "text/javascript">
		window.location.href = "' . $_baseurl . '";
	</script>
	';
}
