<?php

if (isset($_GET['id'])) {
	$id   = $_GET['id'];
	$data = query("SELECT * FROM `tb_barang_keluar` WHERE `no`='$id'");
} else {
	echo '
	<script>
	window.location.href = "' . $_baseurl . '";
	</script>
	';
}

if (!$data) {
	echo '
	<script>
	alert("Data tidak ditemukan");
	window.location.href = "' . $_baseurl . '";
	</script>
	';
}

// menyimpan ubah data
if (isset($_POST['simpan'])) {
	$konsumen       = $_POST['konsumen'];
	$kode_transaksi = $_POST['kode_transaksi'];
	$kode_barang    = $_POST['kode_barang'];
	$barang         = $_POST['barang'];
	$Qty            = $_POST['Qty'];
	$Harga          = $_POST['Harga'];
	$Total_harga    = $_POST['Total_harga'];
	$Tgl            = $_POST['Tgl'];
	$no             = $_POST['no'];

	$querybuilder   = "UPDATE `tb_barang_keluar` SET 
		`no`                = '$no',
		`konsumen`          = '$konsumen',
		`kode_transaksi`    = '$kode_transaksi',
		`kode_barang`       = '$kode_barang',
		`barang`            = '$barang',
		`Qty`               = '$Qty',
		`Harga`             = '$Harga',
		`total_harga`       = '$Total_harga',
		`tgl`               = '$Tgl'
	WHERE `tb_barang_keluar`.`no` = '$no'";
	if ($koneksi->query($querybuilder)) {
		echo '
		<script>
		alert("Data berhasil diubah");
		window.location.href = "' . $_baseurl . '";
		</script>
		';
	} else {
		echo '
		<script>
		alert("Data gagal diubah");
		window.location.href = "' . $_baseurl . '";
		</script>
		';
	}
}
?>
<div class="panel panel-default">
	<div class="panel-heading">
		Ubah Data Transaksi
	</div>
	<div class="panel-body">
		<div class="row">
			<form method="POST" action="">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label>Nama Konsumen</label>
								<input class="form-control" type="text" name="konsumen" value="<?= $data[0]['konsumen']; ?>" />
								<input type="text" name="no" hidden="" value="<?= $data[0]['no']; ?>">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Kode transaksi</label>
								<input class="form-control" type="text" name="kode_transaksi" value="<?= $data[0]['kode_transaksi']; ?>" />
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Kode barang</label>
								<input class="form-control" type="text" name="kode_barang" value="<?= $data[0]['kode_barang']; ?>" />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-8">
							<div class="form-group">
								<label>Nama Barang</label>
								<input class="form-control" type="text" name="barang" value="<?= $data[0]['barang']; ?>" />
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Qty</label>
								<input class="form-control" type="number" name="Qty" value="<?= $data[0]['Qty']; ?>" />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-5">
							<div class="form-group">
								<label>Harga</label>
								<input class="form-control" type="number" name="Harga" value="<?= $data[0]['Harga']; ?>" />
							</div>
						</div>
						<div class="col-md-5">
							<div class="form-group">
								<label>Total harga</label>
								<input class="form-control" type="number" name="Total_harga" value="<?= $data[0]['total_harga']; ?>" />
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label>Tanggal</label>
								<input class="form-control" type="text" name="Tgl" value="<?= $data[0]['tgl']; ?>" readonly />
							</div>
						</div>
						<div class="row">
							<div class="col-md-2"></div>
							<div class="col-md-8">
								<input type="submit" name="simpan" value="Ubah" class="btn btn-primary btn-block">
							</div>
							<div class="col-md-2"></div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>