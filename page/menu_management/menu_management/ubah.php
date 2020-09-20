<?php
if (isset($_GET['id'])) {
	if (isset($_POST['simpan'])) {
		$id   = $_POST['id'];
		$nama = $_POST['nama'];
		$icon = $_POST['icon'];
		$url  = $_POST['url'];
		$sql  = $koneksi->query("UPDATE `tb_user_menu` SET `menu_title` = '$nama', `icon` = '$icon', `menu_url` = '$url' WHERE `tb_user_menu`.`user_menu_id` = '$id'");

		if ($sql) {
			setAlert('Berhasil..! ','Data berhasil diubah..', 'success');
			echo '
			<script type = "text/javascript">
				window.location.href = "' . $_baseurl . '";
			</script>
			';
		} else {
			setAlert('Gagal..! ','Data gagal diubah..', 'danger');
			echo '
			<script type = "text/javascript">
				window.location.href = "' . $_baseurl . '";
			</script>
			';
		}
	}

	$id     = $_GET['id'];
	$sql    = $koneksi->query("SELECT * FROM `tb_user_menu` WHERE user_menu_id='$id'");
	$tampil = $sql->fetch_assoc();
	if (!$tampil) {
		setAlert('Galat..! ','Fatal error id yang dikirimkan tidak terdaftar..', 'danger');
		echo '
		<script type = "text/javascript">
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
?>

<script type="text/javascript">
	function validasi(form) {
		if (form.nama.value == "") {
			alert("Nama Tidak Boleh Kosong");
			form.nama.focus();
			return (false);
		} else if (form.icon.value == "") {
			alert("Icon Tidak Boleh Kosong");
			form.icon.focus();
			return (false);
		}
		return (true);
	}
</script>

<div class="panel panel-default">
	<div class="panel-heading">
		Tambah Data Menu Manajemen
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-12">
				<form method="POST" action="" onsubmit="return validasi(this)">
					<input type="text" name="id" value="<?= $tampil['user_menu_id']; ?>" hidden="">
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>Nama</label>
									<input class="form-control" name="nama" type="text" value="<?= $tampil['menu_title']; ?>" />
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Url</label>
									<input class="form-control" name="url" type="text" value="<?= $tampil['menu_url']; ?>" />
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Icon </label>
									<input class="form-control" name="icon" type="text" value="<?= $tampil['icon']; ?>" />
								</div>
							</div>
						</div>
						<div class="row" style="margin-bottom: 20px;">
							<div class="col-md-3"></div>
							<div class="col-md-6">
								<input type="submit" name="simpan" value="Ubah" class="btn btn-primary btn-block">
							</div>
							<div class="col-md-3"></div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>