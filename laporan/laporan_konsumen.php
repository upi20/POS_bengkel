<?php
//koneksi ke database
$host = "localhost";
$user = "root";
$pass = "";
$dbnm = "db_bengkel__8___1___2_";
 
$conn = mysqli_connect($host, $user, $pass);
if ($conn) {
	$open = mysqli_select_db($conn,$dbnm);
	if (!$open) {
		die ("Database tidak dapat dibuka karena ".mysqli_error());
	}
} else {
	die ("Server MySQL tidak terhubung karena ".mysqli_error());
}
//akhir koneksi
 $tgl1 = $_POST['tanggal1'];
	$tgl2 = $_POST['tanggal2'];
#ambil data di tabel dan masukkan ke array
$query = "SELECT nik,nama,hp,bg_mobil,merk_mobil,alamat,tgl_daftar FROM tb_konsumen where tgl_daftar between '$tgl1' and '$tgl2'";
$sql = mysqli_query ($conn,$query);
$data = array();

while ($row = mysqli_fetch_assoc($sql)) {
array_push($data, $row);
}
 
#setting judul laporan dan header tabel

$judul = "EDO PLAYSTATION";
$judul2 = "Laporan konsumen";
$jln = "JL. Jend. Sudirman, Tambak Sari, Kec. Jambi Selatan, Kota Jambi";
$header = array(
		array("label"=>"nik", "length"=>20, "align"=>"C"),
		array("label"=>"nama", "length"=>30, "align"=>"L"),
		array("label"=>"no hp", "length"=>20, "align"=>"L"),
		array("label"=>"bg_mobil", "length"=>30, "align"=>"C"),
		array("label"=>"merk_mobil", "length"=>30, "align"=>"L"),
		array("label"=>"alamat", "length"=>30, "align"=>"L"),
		array("label"=>"tgl_daftar", "length"=>30, "align"=>"L")
	);
 
#sertakan library FPDF dan bentuk objek
require_once ("../fpdf/fpdf.php");
$pdf = new FPDF();
$pdf->AddPage();
 
#tampilkan judul laporan
$pdf->SetFont('Arial','B','16');
$pdf->Cell(0,10, $judul, '0', 1, 'C');
$pdf->SetFont('Arial','B','16');
$pdf->Cell(0,10, $judul2, '0', 1, 'C'); 
$pdf->SetFont('Arial','I','11');
$pdf->Cell(0,5, $jln, '0', 1, 'C'); 
$pdf->SetFont('Arial','I','11');
$pdf->Cell(0,10, '', '0', 1, 'C'); 
#buat header tabel
$pdf->SetFont('Arial','','10');
$pdf->SetFillColor(255,255,255);
$pdf->SetTextColor(0);
$pdf->SetDrawColor(0,0,0);
foreach ($header as $kolom) {
	$pdf->Cell($kolom['length'], 5, $kolom['label'], 1, '0', $kolom['align'], true);
}
$pdf->Ln();
 
#tampilkan data tabelnya
$pdf->SetFillColor(255,255,255);
$pdf->SetTextColor(0);
$pdf->SetFont('');
$fill=false;
foreach ($data as $baris) {
	$i = 0;
	foreach ($baris as $cell) {
		$pdf->Cell($header[$i]['length'], 5, $cell, 1, '0', $kolom['align'], $fill);
		$i++;
	}
	$fill = !$fill;
	$pdf->Ln();
}
$pdf->Cell(0,15, '', '0', 1, 'C'); 
$pdf->SetFont('Arial','B','11');
$pdf->Cell(0,5, "PEMILIK ", '0', 1, 'L');  
$pdf->SetFont('Arial','U','11');
$pdf->Cell(0,35, "NAMA PEMILIK ", '0', 1, 'L');  
#output file PDF
$pdf->Output();
?>


<!--
<?php
error_reporting(0);
$koneksi = new mysqli("localhost","root","","db_bengkel (8)");
$content ='

<style type="text/css">
	
	.tabel{border-collapse: collapse;}
	.tabel th{padding: 8px 5px;  background-color:  #cccccc;  }
	.tabel td{padding: 8px 5px;   }
</style>


';


 $content .= '

<page>
<h1>Laporan Data konsumen</h1>
<br>


<table border="1px" class="tabel"  >
<tr>
<th>No</th>
<th>Kode</th>
<th>nik</th>
<th>nama</th>
<th>hp</th>
<th>bg_mobil</th>
<th>merk_mobil</th>
<th>warna_mobil</th>
<th>tgl_daftar</th>
<th>Alamat</th>
</tr>';



if (isset($_POST['cetak'])) {


	
	$tgl1 = $_POST['tanggal1'];
	$tgl2 = $_POST['tanggal2'];

	
		
	$no = 1;
	$sql = $koneksi->query("select * from tb_konsumen where alamat between '$tgl1' and '$tgl2' ");
	// echo $tgl1; echo "<br>"; echo $tgl2;
	while ($tampil=$sql->fetch_assoc()) {

	$content .='
		<tr>
			<td align="center">'.$no++.'</td>
			<td align="center">'.$tampil['kode_konsumen'].'</td>
			<td align="center">'.$tampil['nik'].'</td>
			<td align="center">'.$tampil['nama'].'</td>
			<td align="center">'.$tampil['hp'].'</td>
			<td align="center">'.$tampil['bg_mobil'].'</td>
			<td align="center">'.$tampil['merk_mobil'].'</td>
			<td align="center">'.$tampil['warna_mobil'].'</td>
			<td align="center">'.$tampil['tgl_daftar'].'</td>
			<td align="center">'.$tampil['alamat'].'</td>
		</tr>
	';	
}
// echo $tgl1; echo "<br>"; echo $tgl2;
}else{

$no=1;

$sql = $koneksi->query("select * from tb_konsumen");
while ($tampil=$sql->fetch_assoc()) {
	$content .='
		<tr>
			<td align="center">'.$no++.'</td>
			<td align="center">'.$tampil['kode_konsumen'].'</td>
			<td align="center">'.$tampil['nik'].'</td>
			<td align="center">'.$tampil['nama'].'</td>
			<td align="center">'.$tampil['hp'].'</td>
			<td align="center">'.$tampil['bg_mobil'].'</td>
			<td align="center">'.$tampil['merk_mobil'].'</td>
			<td align="center">'.$tampil['warna_mobil'].'</td>
			<td align="center">'.$tampil['tgl_daftar'].'</td>
			<td align="center">'.$tampil['alamat'].'</td>
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
$html2pdf->Output('konsumen.pdf');
?>
-->