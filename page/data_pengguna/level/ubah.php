<?php
if (isset($_GET['id'])) {
	$id_level = $_GET['id'];
	$sql      = $koneksi->query("SELECT * FROM `tb_user_level` WHERE `id_level`='$id_level'");
	$tampil   = $sql->fetch_assoc();

	if (isset($_POST['simpan'])) {
		$nama = $_POST['nama'];
		$sql  = $koneksi->query("UPDATE `tb_user_level` SET `title` = '$nama' WHERE `tb_user_level`.`id_level` = '$id_level'");

		if ($sql) {
			setAlert('Berhasil..! ','Data berhasil diubah..', 'success');
			echo '<script type = "text/javascript">window.location.href = "' . $_baseurl . '";</script>';
		} else {
			setAlert('Gagal..! ','Data gagal diubah..', 'success');
			echo '<script type = "text/javascript">window.location.href = "' . $_baseurl . '";</script>';
		}
	}
}
?>

<div class="panel panel-default">
	<div class="panel-heading">
		Ubah Data
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-12">
				<form method="POST">
					<div class="form-group">
						<label>Kategori Barang</label>
						<input class="form-control" name="nama" value="<?php echo $tampil['title']; ?>" />
					</div>
					<div>
						<input type="submit" name="simpan" value="Ubah" class="btn btn-primary">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>