<?php

$id_konsumen = $_GET['id_konsumen'];

$koneksi->query("delete from tb_konsumen where id_konsumen ='$id_konsumen'");
echo '
 <script type="text/javascript">
		 window.location.href = "' . $_baseurl . '";
 </script>
 ';
