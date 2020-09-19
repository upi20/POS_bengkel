<?php
$id_barang = $_GET['id_barang'];
$koneksi->query("delete from tb_barang where id_barang ='$id_barang'");
echo '
<script type="text/javascript">
	alert("Data Berhasil Dihapus");
	window.location.href = "' . $_baseurl . '";
</script>
';
