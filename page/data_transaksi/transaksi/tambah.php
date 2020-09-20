<?php
$barang   = query("SELECT `id_barang`, `nama_barang`, `kode_barang`, `harga_jual`, `stok` FROM `tb_barang`");
$konsumen = query("SELECT `nama`, `id_konsumen` FROM `tb_konsumen`");

if (isset($_POST['simpan'])) {
	$id_konsumen    = $_POST['konsumen'];
	$kode_transaksi = $_POST['kode_transaksi'];
	$id_barang      = $_POST['barang'];
	$jumlah         = $_POST['qty'];
	$harga          = $_POST['harga'];
	$tgl            = $_POST['tgl'];

	$querybuilder = "INSERT INTO `tb_barang_keluar` 
	(`id_transaksi`, `id_konsumen`, `kode_transaksi`, `id_barang`, `jumlah`, `harga`, `tanggal`) 
	VALUES 
	(NULL, '$id_konsumen', '$kode_transaksi', '$id_barang', '$jumlah', '$harga', '$tgl')";

	if ($koneksi->query($querybuilder)) {
		setAlert('Berhasil..! ', 'Data berhasil ditambahkan..', 'success');
		echo '<script type = "text/javascript">window.location.href = "' . $_baseurl . '";</script>';
	} else {
		setAlert('Gagal..! ', 'Data gagal ditambahkan..', 'success');
		echo '<script type = "text/javascript">window.location.href = "' . $_baseurl . '";</script>';
	}
}

?>
<script type="text/javascript">
	function validasi(form) {
		if (Number(form.qty.value) > Number(form.stok.value)) {
			setAlert("Peringatan..!", `Stok Kurang, Stok yang tersedia saat ini adalah ${form.stok.value}`, "danger");
			form.qty.focus();
			return false;
		}
		return (true);
	}
</script>
<div class="panel panel-default">
	<div class="panel-heading">
		Tambah Data Transaksi
	</div>
	<div class="panel-body">
		<div class="row">
			<form method="POST" action="" onsubmit="return validasi(this)">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label>Nama Konsumen</label>
								<select class="form-control" name="konsumen" id="konsumen">
									<?php foreach ($konsumen as $k) {
										echo '<option value="' . $k['id_konsumen'] . '">' . $k['nama'] . '</option>';
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
										echo '<option value="' . $b['id_barang'] . '">' . $b['nama_barang'] . '</option>';
									} ?>
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Stok</label>
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
				if (nama_barang.val() == '<?= $b['id_barang']; ?>') {
					kode_barang.val('<?= $b['kode_barang']; ?>');
					harga.val('<?= $b['harga_jual']; ?>');
					qty.attr('max', '<?= $b['stok']; ?>');
					stok.val('<?= $b['stok']; ?>');
				}
			<?php endforeach; ?>
			countQty();
		}

		function countQty() {
			total_harga.val(Number(qty.val()) * Number(harga.val()));
			cekStok();
		}

		function cekStok() {
			if (Number(qty.val()) > Number(stok.val())) {
				setAlert("Peringatan..!", `Stok Kurang, Stok yang tersedia saat ini adalah ${stok.val()}`, "danger");
			} else {
				setAlert();
			}
		}

		nama_barang.on('change', function() {
			caputre();
		});

		caputre();
		qty.on('keyup', function() {
			countQty();
		});


	});
</script>