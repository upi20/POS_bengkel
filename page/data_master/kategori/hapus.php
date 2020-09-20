<?php
if (isset($_POST['simpan_hapus'])) {
	$id_kategori = $_POST['id_kategori'];
	$koneksi->query("DELETE FROM tb_barang_kategori WHERE id_barang_kategori ='$id_kategori'");

	if (mysqli_affected_rows($koneksi) > 0) {
		echo '<script type = "text/javascript">setAlert("Berhasil..! ", "Data berhasil hapus..", "success");</script>';
	} else {
		echo '<script type = "text/javascript">setAlert("Gagal..! ", "Data gagal hapus.. Nama kategori mungkin sudah ada..", "danger");</script>';
	}
}
?>
<!-- Modal hapus -->
<!-- ================================================================================================ -->
<div class="modal fade" id="modalHapus">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" data-dismiss="modal"><span>&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Hapus Kategori Barang</h4>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<form method="POST">
								<div class="form-group">
									<h5>Yakin Akan Menghapus Data <strong id="kategori_hapus"></strong> ..?</h5>
									<span><i class="text-danger">Data barang dengan kategori ini akan ikut terhapus</i></span>
									<input hidden="" name="id_kategori" id="id_kategori_hapus" required="" />
								</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<input type="submit" name="simpan_hapus" value="Hapus" class="btn btn-danger">
				</form>
				<button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>
<script>
	function hapusData(data, id) {
		document.querySelector('#kategori_hapus').innerHTML = data;
		document.querySelector('#id_kategori_hapus').value = id;
	}
</script>