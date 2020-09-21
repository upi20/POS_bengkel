<?php
if (isset($_POST['simpan_ubah'])) {
	$id_suplier     = $_POST['suplier_ubah'];
	$kode_transaksi = $_POST['kode_transaksi_ubah'];
	$id_barang      = $_POST['barang_ubah'];
	$jumlah         = $_POST['qty_ubah'];
	$harga          = $_POST['harga_ubah'];
	$tgl            = $_POST['tgl_ubah'];
	$querybuilder   = "INSERT INTO `tb_barang_masuk` 
	(`id_barang_masuk`, `id_barang_data`, `id_barang_suplier`, `barang_masuk_kode`, `barang_masuk_jumlah`, `barang_masuk_harga`, `barang_masuk_tanggal`)
	VALUES 
	(NULL, '$id_barang', '$id_suplier', '$kode_transaksi', '$jumlah', '$harga', '$tgl')";

	if ($koneksi->query($querybuilder)) {
		setAlert('Berhasil..! ', 'Data berhasil diubahkan..', 'success');
		echo '<script type = "text/javascript">window.location.href = "' . $_baseurl . '";</script>';
	} else {
		setAlert('Gagal..! ', 'Data gagal diubahkan..', 'success');
		echo '<script type = "text/javascript">window.location.href = "' . $_baseurl . '";</script>';
	}
}

?>
<!-- Modal ubah -->
<!-- ================================================================================================ -->
<div class="modal fade" id="modalubah">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" data-dismiss="modal"><span>&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Ubah Data Transaksi Pengadaan Barang</h4>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<form method="POST" action="">
								<div class="container-fluid">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Nama suplier</label>
												<select class="form-control" name="suplier_ubah" id="suplier_ubah">
													<?php
													if ($data['tambah']['suplier']) {
														foreach ($data['tambah']['suplier'] as $s) {
															echo '<option value="' . $s['id_barang_suplier'] . '">' . $s['barang_suplier_nama'] . '</option>';
														}
													} ?>
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Nama Barang</label>
												<select class="form-control" name="barang_ubah" id="barang_ubah">
													<?php foreach ($data['tambah']['barang'] as $b) {
														echo '<option value="' . $b['id_barang_data'] . '">' . $b['barang_data_nama'] . '</option>';
													} ?>
												</select>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label>Qty</label>
												<input class="form-control" type="number" value="0" name="qty_ubah" id="qty_ubah" min="1" />
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Stok Yang Ada</label>
												<input class="form-control" type="number" id="stok_ubah" name="stok_ubah" readonly>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Harga</label>
												<input class="form-control" type="number" name="harga_ubah" id="harga_ubah" readonly />
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<div class="form-group">
													<label>Total harga</label>
													<input class="form-control" type="number" name="Total_harga_ubah" id="total_harga_ubah" readonly />
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Tanggal</label>
												<input class="form-control" type="text" name="tgl_ubah" id="tgl_ubah" value="" readonly />
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Kode transaksi</label>
												<input class="form-control" type="text" name="kode_transaksi_ubah" readonly value="" />
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Kode barang</label>
												<input class="form-control" type="text" name="kode_barang_ubah" id="kode_barang_ubah" readonly />
											</div>
										</div>
									</div>
								</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<input type="submit" name="simpan_ubah" value="Simpan" class="btn btn-primary">
				</form>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>
<!-- ================================================================================================ -->

<script>
	function ubahData(data) {
		let suplier_ubah = document.querySelector('#suplier_ubah');
		let barang_ubah = document.querySelector('#barang_ubah');
		suplier_ubah.value = data.dataset.id_barang_suplier;
		barang_ubah.value = data.dataset.id_barang_data;
	}



	// let ubah_nama_barang = undefined;
	// let ubah_kode_barang = undefined;
	// let ubah_qty = undefined;
	// let ubah_harga = undefined;
	// let ubah_total_harga = undefined;
	// let ubah_stok = undefined;
	// $(document).ready(function() {
	// 	ubah_nama_barang = $('#barang_ubah');
	// 	ubah_kode_barang = $('#kode_barang_ubah');
	// 	ubah_qty = $('#qty_ubah');
	// 	ubah_harga = $('#harga_ubah');
	// 	ubah_total_harga = $('#total_harga_ubah');
	// 	ubah_stok = $('#stok_ubah');

	// 	function caputre() {
	// 		<?php foreach ($data['tambah']['barang'] as $b) : ?>
	// 			if (ubah_nama_barang.val() == '<?= $b['id_barang_data']; ?>') {
	// 				ubah_kode_barang.val('<?= $b['barang_data_kode']; ?>');
	// 				ubah_harga.val('<?= $b['barang_data_harga_jual']; ?>');
	// 				ubah_stok.val('<?= getStokBarang($b['id_barang_data']); ?>');
	// 			}
	// 		<?php endforeach; ?>
	// 		countQty();
	// 	}

	// 	function countQty() {
	// 		ubah_total_harga.val(Number(ubah_qty.val()) * Number(ubah_harga.val()));
	// 	}

	// 	ubah_nama_barang.on('change', function() {
	// 		caputre();
	// 	});

	// 	ubah_qty.on('keyup', function() {
	// 		countQty();
	// 	});
	// 	caputre();
	// });
</script>