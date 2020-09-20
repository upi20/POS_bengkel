<?php
$id_kategori = $_GET['id_kategori'];
$sql         = $koneksi->query("select * from tb_kategori where id_kategori='$id_kategori'");
$tampil      = $sql->fetch_assoc();


if (isset($_POST['simpan'])) {
	$kategori = $_POST['kategori'];
	$sql      = $koneksi->query("update tb_kategori set kategori='$kategori' where id_kategori='$id_kategori' ");

	if ($sql) {
		setAlert('Berhasil..! ','Data berhasil diubah..', 'success');
		echo '<script type = "text/javascript">window.location.href = "' . $_baseurl . '";</script>';
	} else {
		setAlert('Gagal..! ','Data gagal diubah..', 'success');
		echo '<script type = "text/javascript">window.location.href = "' . $_baseurl . '";</script>';
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
						<input class="form-control" name="kategori" value="<?php echo $tampil['kategori']; ?>" />
					</div>
					<div>
						<input type="submit" name="simpan" value="Ubah" class="btn btn-primary">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>