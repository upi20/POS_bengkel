<?php
error_reporting(0);
$koneksi = new mysqli("localhost","root","","db_bengkel");
$content ='

<style type="text/css">
	
	.tabel{border-collapse: collapse;}
	.tabel th{padding: 8px 5px;  background-color:  #cccccc;  }
	.tabel td{padding: 8px 5px;   }
</style>


';


 $content .= '

<page>
<h1>Laporan Data Buku</h1>
<br>


<table border="1px" class="tabel"  >
<tr>
<th>No</th>
<th>Judul</th>
<th>Pengarang</th>
<th>Penerbit</th>
<th>Tahun Terbit</th>
<th>ISBN</th>
<th>Jumlah Buku</th>
<th>Lokasi</th>
</tr>';



if (isset($_POST['cetak'])) {


	
	$tgl1 = $_POST['tanggal1'];
	$tgl2 = $_POST['tanggal2'];

	
		
	$no = 1;
	$sql = $koneksi->query("select * from tb_buku where tgl_input between '$tgl1' and '$tgl2' ");
	// echo $tgl1; echo "<br>"; echo $tgl2;
	while ($tampil=$sql->fetch_assoc()) {

	$content .='
		<tr>
			<td align="center">'.$no++.'</td>
			<td align="center">'.$tampil['judul'].'</td>
			<td align="center">'.$tampil['pengarang'].'</td>
			<td align="center">'.$tampil['penerbit'].'</td>
			<td align="center">'.$tampil['tahun_terbit'].'</td>
			<td align="center">'.$tampil['isbn'].'</td>
			<td align="center">'.$tampil['jumlah_buku'].'</td>
			<td align="center">'.$tampil['lokasi'].'</td>
		</tr>
	';	
}
// echo $tgl1; echo "<br>"; echo $tgl2;
}else{

$no=1;

$sql = $koneksi->query("select * from tb_buku");
while ($tampil=$sql->fetch_assoc()) {
	$content .='
		<tr>
			<td align="center">'.$no++.'</td>
			<td align="center">'.$tampil['judul'].'</td>
			<td align="center">'.$tampil['pengarang'].'</td>
			<td align="center">'.$tampil['penerbit'].'</td>
			<td align="center">'.$tampil['tahun_terbit'].'</td>
			<td align="center">'.$tampil['isbn'].'</td>
			<td align="center">'.$tampil['jumlah_buku'].'</td>
			<td align="center">'.$tampil['lokasi'].'</td>
		</tr>
	';
}
}

$content .='


</table>
</page>';

require_once('../assets/html2pdf/html2pdf.class.php');
$html2pdf = new HTML2PDF('P','A4','fr');
$html2pdf->WriteHTML($content);
$html2pdf->Output('exemple.pdf');
?>
