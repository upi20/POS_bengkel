<?php
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$koneksi->query("DELETE FROM `tb_user_menu` WHERE `tb_user_menu`.`user_menu_id` = '$id'");

	if (mysqli_affected_rows($koneksi) > 0) {
		setAlert('<strong>Berhasil..! </strong>Data berhasil dihapus..', 'success');
		echo '
	<script type="text/javascript">
		window.location.href = "' . $_baseurl . '";
	</script>
	';
	} else {
		setAlert('<strong>Gagal..! </strong>Data gagal diubah..', 'danger');
		echo '
	<script type="text/javascript">
		window.location.href = "' . $_baseurl . '";
	</script>
	';
	}
} else {
	setAlert('<strong>Galat..! </strong>Fatal error tidak ada id yang dikirimkan..', 'danger');
	echo '
	<script type = "text/javascript">
		alert("Fatal error tidak ada id yang dikirimkan");
		window.location.href = "' . $_baseurl . '";
	</script>
	';
}
