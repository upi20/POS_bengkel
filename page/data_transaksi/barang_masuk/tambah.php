<?php
$barang   = query("SELECT `id_barang_data`, `barang_data_nama`, `barang_data_kode`, `barang_data_harga_jual`, `barang_data_stok` FROM `tb_barang_data`");
$suplier  = query("SELECT `barang_suplier_nama`, `id_barang_suplier` FROM `tb_barang_suplier`");

if (isset($_POST['simpan'])) {
	$id_suplier    = $_POST['suplier'];
	$kode_transaksi = $_POST['kode_transaksi'];
	$id_barang      = $_POST['barang'];
	$jumlah         = $_POST['qty'];
	$harga          = $_POST['harga'];
	$tgl            = $_POST['tgl'];

	$querybuilder = "INSERT INTO `tb_barang_masuk` 
	(`id_barang_masuk`, `id_barang_data`, `id_barang_suplier`, `barang_masuk_kode`, `barang_masuk_jumlah`, `barang_masuk_harga`, `barang_masuk_tanggal`)
	VALUES 
	(NULL, '$id_barang', '$id_suplier', '$kode_transaksi', '$jumlah', '$harga', '$tgl')";

	if ($koneksi->query($querybuilder)) {
		setAlert('Berhasil..! ', 'Data berhasil ditambahkan..', 'success');
		echo '<script type = "text/javascript">window.location.href = "' . $_baseurl . '";</script>';
	} else {
		setAlert('Gagal..! ', 'Data gagal ditambahkan..', 'success');
		echo '<script type = "text/javascript">window.location.href = "' . $_baseurl . '";</script>';
	}
}

?>
<div class="panel panel-default">
	<div class="panel-heading">
		Tambah Data Transaksi Pengadaan Barang
	</div>
	<div class="panel-body">
		<div class="row">
			<form method="POST" action="">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label>Nama suplier</label>
								<select class="form-control" name="suplier" id="suplier">
									<?php
									if ($suplier) {
										foreach ($suplier as $s) {
											echo '<option value="' . $s['id_barang_suplier'] . '">' . $s['barang_suplier_nama'] . '</option>';
										}
									} ?>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Kode transaksi</label>
								<input class="form-control" type="text" name="kode_transaksi" readonly value="<?= date("yy-m-d-") . uniqid(); ?>" />
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Kode barang</label>
								<input class="form-control" type="text" name="kode_barang" id="kode_barang" readonly />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Nama Barang</label>
								<select class="form-control" name="barang" id="barang">
									<?php foreach ($barang as $b) {
										echo '<option value="' . $b['id_barang_data'] . '">' . $b['barang_data_nama'] . '</option>';
									} ?>
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Stok Yang Ada</label>
								<input class="form-control" type="number" id="stok" name="stok" readonly>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Harga</label>
								<input class="form-control" type="number" name="harga" id="harga" readonly />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-5">
							<div class="form-group">
								<label>Qty</label>
								<input class="form-control" type="number" value="0" name="qty" id="qty" min="1" />
							</div>
							<strong><i><span class="text-danger" id="qty_alert"></span></i></strong>
						</div>
						<div class="col-md-5">
							<div class="form-group">
								<label>Total harga</label>
								<input class="form-control" type="number" name="Total_harga" id="total_harga" readonly />
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label>Tanggal</label>
								<input class="form-control" type="text" name="tgl" value="<?= date("yy-m-d"); ?>" readonly />
							</div>
						</div>
						<div class="row">
							<div class="col-md-2"></div>
							<div class="col-md-8">
								<input type="submit" name="simpan" value="Simpan" class="btn btn-primary btn-block">
							</div>
							<div class="col-md-2"></div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		const nama_barang = $('#barang');
		const kode_barang = $('#kode_barang');
		const qty = $('#qty');
		const harga = $('#harga');
		const total_harga = $('#total_harga');
		const stok = $('#stok');

		function caputre() {
			<?php foreach ($barang as $b) : ?>
				if (nama_barang.val() == '<?= $b['id_barang_data']; ?>') {
					kode_barang.val('<?= $b['barang_data_kode']; ?>');
					harga.val('<?= $b['barang_data_harga_jual']; ?>');
					stok.val('<?= $b['barang_data_stok']; ?>');
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