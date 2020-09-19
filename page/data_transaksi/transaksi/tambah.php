<?php
$barang   = query("SELECT `id_barang`, `nama_barang`, `kode_barang`, `harga_jual`, `stok` FROM `tb_barang`");
$konsumen = query("SELECT `nama`, `id_konsumen` FROM `tb_konsumen`");

if (isset($_POST['simpan'])) {
	$konsumen       = $_POST['konsumen'];
	$kode_transaksi = $_POST['kode_transaksi'];
	$kode_barang    = $_POST['kode_barang'];
	$barang         = $_POST['barang'];
	$Qty            = $_POST['Qty'];
	$Harga          = $_POST['Harga'];
	$Total_harga    = $_POST['Total_harga'];
	$Tgl            = $_POST['Tgl'];
	$sql            = $koneksi->query("INSERT INTO tb_transaksi VALUES (NULL,'$konsumen', '$kode_transaksi','$kode_barang','$barang', '$Qty', '$Harga', '$Total_harga', '$Tgl')");
	if ($sql) {
		echo '
     <script>
     	alert("Data transaksi berhasil di tambah");
		 window.location.href = "' . $_baseurl . '";
     </script>
		';
	}
}

?>
<div class="panel panel-default">
	<div class="panel-heading">
		Tambah Data Transaksi
	</div>
	<div class="panel-body">
		<div class="row">
			<form method="POST" action="">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label>Nama Konsumen</label>
								<select class="form-control" name="konsumen" id="konsumen">
									<?php foreach ($konsumen as $k) {
										echo '<option value="' . $k['nama'] . '">' . $k['nama'] . '</option>';
									} ?>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Kode transaksi</label>
								<input class="form-control" type="text" name="kode_transaksi" disabled value="<?= date("yy/m/d/") . uniqid(); ?>" />
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Kode barang</label>
								<input class="form-control" type="text" name="kode_barang" id="kode_barang" disabled />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Nama Barang</label>
								<select class="form-control" name="barang" id="barang">
									<?php foreach ($barang as $b) {
										echo '<option value="' . $b['nama_barang'] . '">' . $b['nama_barang'] . '</option>';
									} ?>
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Stok</label>
								<input class="form-control" type="number" id="stok" disabled>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Harga</label>
								<input class="form-control" type="number" name="Harga" id="harga" disabled />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-5">
							<div class="form-group">
								<label>Qty</label>
								<input class="form-control" type="number" value="0" name="Qty" id="qty" min="1" />
							</div>
							<strong><i><span class="text-danger" id="qty_alert"></span></i></strong>
						</div>
						<div class="col-md-5">
							<div class="form-group">
								<label>Total harga</label>
								<input class="form-control" type="number" name="Total_harga" id="total_harga" disabled />
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label>Tanggal</label>
								<input class="form-control" type="text" name="Tgl" value="<?= date("yy-m-d"); ?>" readonly />
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

		nama_barang.on('change', function() {
			<?php foreach ($barang as $b) : ?>
				if (nama_barang.val() == '<?= $b['nama_barang']; ?>') {
					kode_barang.val('<?= $b['kode_barang']; ?>');
					harga.val('<?= $b['harga_jual']; ?>');
					qty.attr('max', '<?= $b['stok']; ?>');
					stok.val('<?= $b['stok']; ?>');
				}
			<?php endforeach; ?>
		});

		<?php foreach ($barang as $b) : ?>
			if (nama_barang.val() == '<?= $b['nama_barang']; ?>') {
				kode_barang.val('<?= $b['kode_barang']; ?>');
				harga.val('<?= $b['harga_jual']; ?>');
				qty.attr('max', '<?= $b['stok']; ?>');
				stok.val('<?= $b['stok']; ?>');
			}
		<?php endforeach; ?>

		qty.on('keyup', function() {
			total_harga.val(Number(qty.val()) * Number(harga.val()));
		});

		total_harga.val(Number(qty.val()) * Number(harga.val()));
	});
</script>