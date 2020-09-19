<?php

$id = $_GET['id'];
$sql = $koneksi->query("DELETE FROM tb_transaksi WHERE no='$id'");




if ($sql) {
     echo '
     <script>
     	alert("data transaksi berhasil di hapus");
          window.location.href = "' . $_baseurl . '";
     </script>
		';
}
