<?php
	
	$nis = $_GET ['id'];

	$koneksi->query("delete from tb_anggota where nis ='$nis'");

?>


<script type="text/javascript">
		window.location.href="?page=anggota";
</script>