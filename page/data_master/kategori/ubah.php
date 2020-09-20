<?php
if (isset($_POST['simpan_ubah'])) {
	$kategori    = $_POST['kategori'];
	$id_kategori = $_POST['id_kategori'];
	$sql         = $koneksi->query("UPDATE tb_barang_kategori SET barang_kategori_nama='$kategori' WHERE id_barang_kategori='$id_kategori' ");

	if ($sql) {
		echo '<script type = "text/javascript">setAlert("Berhasil..! ", "Data berhasil diubah..", "success");</script>';
	} else {
		echo '<script type = "text/javascript">setAlert("Gagal..! ", "Data gagal diubah.. Nama kategori mungkin sudah ada..", "danger");</script>';
	}
}
?>

<!-- Modal Ubah -->
<!-- ================================================================================================ -->
<div class="modal fade" id="modalUbah">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" data-dismiss="modal"><span>&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Ubah Kategori Barang</h4>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<form method="POST">
								<div class="form-group">
									<label>Nama Kategori</label>
									<input class="form-control" name="kategori" id="kategori_ubah" required="" />
									<input hidden="" name="id_kategori" id="id_kategori_ubah" required="" />
									<span><i>Nama tidak boleh sama denga yang sudah ada</i></span>
								</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<input type="submit" name="simpan_ubah" value="Ubah" class="btn btn-primary">
				</form>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>
<script>
	function ubahData(data, id) {
		document.querySelector('#kategori_ubah').value = data;
		document.querySelector('#id_kategori_ubah').value = id;
	}
</script>
<!-- ================================================================================================ -->