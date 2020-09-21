<?php
if (isset($_POST['simpan_ubah1'])) {
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
							<div id="alert-modal-ubah"></div>
							<form method="POST" action="" id="form_modal_ubah">
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
												<input class="form-control" type="text" name="kode_transaksi_ubah" id="kode_transaksi_ubah" readonly value="" />
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
	let data_barang = [];
	let temp = {};
	let qty_ubah = document.querySelector('#qty_ubah');
	let barang_ubah = document.querySelector('#barang_ubah');
	let total_harga_ubah = document.querySelector('#total_harga_ubah');
	let stok_ubah = document.querySelector('#stok_ubah')
	let kode_barang_ubah = document.querySelector('#kode_barang_ubah')
	let harga_ubah = document.querySelector('#harga_ubah')
	let suplier_ubah = document.querySelector('#suplier_ubah');
	let tgl_ubah = document.querySelector('#tgl_ubah');
	let kode_transaksi_ubah = document.querySelector('#kode_transaksi_ubah');
	let form_modal_ubah = document.querySelector('#form_modal_ubah');
	let alert_modal_ubah = document.querySelector('#alert-modal-ubah');

	<?php for ($i = 0; $i < count($data['tambah']['barang']); $i++) : ?>
		data_barang[<?= $data['tambah']['barang'][$i]['id_barang_data']; ?>] = {
			id_barang_data: <?= $data['tambah']['barang'][$i]['id_barang_data']; ?>,
			barang_data_stok: <?= $data['tambah']['barang'][$i]['barang_data_stok']; ?>,
			barang_data_harga_jual: <?= $data['tambah']['barang'][$i]['barang_data_harga_jual']; ?>,
			barang_data_kode: '<?= $data['tambah']['barang'][$i]['barang_data_kode']; ?>',
			barang_data_nama: '<?= $data['tambah']['barang'][$i]['barang_data_nama']; ?>',
		};
	<?php endfor; ?>


	barang_ubah.addEventListener('change', function() {
		caputre(this.value);
		countQty();
		cekStok(this.value);
	});

	qty_ubah.addEventListener('keyup', function() {
		countQty();
	});
	qty_ubah.addEventListener('click', function() {
		countQty();
	});

	function ubahData(data) {
		suplier_ubah.value = data.dataset.id_barang_suplier;
		barang_ubah.value = data.dataset.id_barang_data;
		qty_ubah.value = data.dataset.barang_masuk_jumlah;
		kode_transaksi_ubah.value = data.dataset.barang_masuk_kode;
		tgl_ubah.value = data.dataset.barang_masuk_tanggal;
		temp.ubah = {
			id: data.dataset.id_barang_data,
			stok: data_barang[data.dataset.id_barang_data].barang_data_stok,
			qty: Number(data.dataset.barang_masuk_jumlah)
		};
		caputre(data.dataset.id_barang_data);
	}


	function caputre(id) {
		stok_ubah.value = data_barang[id].barang_data_stok;
		kode_barang_ubah.value = data_barang[id].barang_data_kode;
		harga_ubah.value = data_barang[id].barang_data_harga_jual;
		countQty();
	}

	function countQty() {
		if (temp.ubah.id == barang_ubah.value) {
			if (qty_ubah.value > Number(temp.ubah.qty)) {
				console.log('lebih');
			} else if (qty_ubah.value < Number(temp.ubah.qty)) {
				console.log('kurang');
			} else if (qty_ubah.value == Number(temp.ubah.qty)) {
				console.log('sama');
			}
		}
		total_harga_ubah.value = (Number(qty_ubah.value) * Number(harga_ubah.value));
	}

	function setVisibleForm(visible = true) {
		if (visible) form_modal_ubah.removeAttribute('onsubmit');
		else form_modal_ubah.setAttribute('onsubmit', 'return false');
	}

	function cekStok(id) {
		if (id == temp.ubah.id) {
			setAlert('hide_alert', '', '', '#alert-modal-ubah');
			setVisibleForm();
		} else {
			if ((temp.ubah.stok - temp.ubah.qty) < 0) {
				setAlert('Peringatan.. ', "Barang tidak bisa diubah karena stok akan menjadi minus..!", 'danger', '#alert-modal-ubah');
				setVisibleForm(false);
			} else {
				setAlert('hide_alert', '', '', '#alert-modal-ubah');
				setVisibleForm();
			}
		}
	}
</script>