<?php
if (isset($_POST['simpan_ubah'])) {
	$id_suplier     = $_POST['suplier_ubah'];
	$kode_transaksi = $_POST['kode_transaksi_ubah'];
	$id_barang      = $_POST['barang_ubah'];
	$jumlah         = $_POST['qty_ubah'];
	$harga          = $_POST['harga_ubah'];
	$tgl            = $_POST['tgl_ubah'];
	$querybuilder = "INSERT INTO `tb_barang_masuk` 
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
												<select class="form-control" name="suplier_ubah" id="suplier">
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
												<input class="form-control" type="text" name="tgl_ubah" value="<?= date("yy-m-d"); ?>" readonly />
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Kode transaksi</label>
												<input class="form-control" type="text" name="kode_transaksi_ubah" readonly value="<?= date("yy-m-d-") . uniqid(); ?>" />
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
	$(document).ready(function() {
		const nama_barang = $('#barang_ubah');
		const kode_barang = $('#kode_barang_ubah');
		const qty = $('#qty_ubah');
		const harga = $('#harga_ubah');
		const total_harga = $('#total_harga_ubah');
		const stok = $('#stok_ubah');

		function caputre() {
			<?php foreach ($data['tambah']['barang'] as $b) : ?>
				if (nama_barang.val() == '<?= $b['id_barang_data']; ?>') {
					kode_barang.val('<?= $b['barang_data_kode']; ?>');
					harga.val('<?= $b['barang_data_harga_jual']; ?>');
					stok.val('<?= getStokBarang($b['id_barang_data']); ?>');
				}
			<?php endforeach; ?>
			countQty();
		}

		function countQty() {
			total_harga.val(Number(qty.val()) * Number(harga.val()));
		}

		nama_barang.on('change', function() {
			caputre();
		});

		qty.on('keyup', function() {
			countQty();
		});
		caputre();
	});
</script>