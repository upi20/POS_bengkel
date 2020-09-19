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
$query = "SELECT kode_barang,nama_barang,harga_jual,harga_beli,stok FROM tb_barang";
$sql = mysqli_query ($conn,$query);
$data = array();

while ($row = mysqli_fetch_assoc($sql)) {
array_push($data, $row);
}
 
#setting judul laporan dan header tabel

$judul = "EDO PLAYSTATION";
$judul2 = "Laporan Barang";
$jln = "JL. Jend. Sudirman, Tambak Sari, Kec. Jambi Selatan, Kota Jambi";
$header = array(
		array("label"=>"kode_barang", "length"=>30, "align"=>"C"),
		array("label"=>"nama_barang", "length"=>50, "align"=>"L"),
		array("label"=>"harga_beli", "length"=>45, "align"=>"L"),
		array("label"=>"harga_jual", "length"=>45, "align"=>"C"),
		array("label"=>"stok", "length"=>20, "align"=>"L")
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
<h1>Laporan Data Barang</h1>
<br>


<table border="1px" class="tabel"  >
<tr>
<th>No</th>
<th>Nama Barang</th>
<th>Kode Barang</th>
<th>Harga Beli</th>
<th>Stok Jual</th>
<th>Gambar</th>
<th>Stok</th>
<th>Kategori</th>
</tr>';



if (isset($_POST['cetak'])) {


	
	$tgl1 = $_POST['tanggal1'];
	$tgl2 = $_POST['tanggal2'];

	
		
	$no = 1;
	$sql = $koneksi->query("select * from tb_barang where kategori between '$tgl1' and '$tgl2' ");
	// echo $tgl1; echo "<br>"; echo $tgl2;
	while ($tampil=$sql->fetch_assoc()) {

	$content .='
		<tr>
			<td align="center">'.$no++.'</td>
			<td align="center">'.$tampil['nama_barang'].'</td>
			<td align="center">'.$tampil['kode_barang'].'</td>
			<td align="center">'.$tampil['harga_beli'].'</td>
			<td align="center">'.$tampil['harga_jual'].'</td>
			<td><img style="width:50px; height:50px"src="../images/barang/'.$tampil['gambar'].'"/></td>
			<td align="center">'.$tampil['stok'].'</td>
			<td align="center">'.$tampil['kategori'].'</td>
		</tr>
	';	
}
// echo $tgl1; echo "<br>"; echo $tgl2;
}else{

$no=1;

$sql = $koneksi->query("select * from tb_barang");
while ($tampil=$sql->fetch_assoc()) {
	$content .='
		<tr>
			<td align="center">'.$no++.'</td>
			<td align="center">'.$tampil['nama_barang'].'</td>
			<td align="center">'.$tampil['kode_barang'].'</td>
			<td align="center">'.$tampil['harga_beli'].'</td>
			<td align="center">'.$tampil['harga_jual'].'</td>
			<td><img style="width:50px; height:50px"src="../images/barang/'.$tampil['gambar'].'"></td>
			<td align="center">'.$tampil['stok'].'</td>
			<td align="center">'.$tampil['kategori'].'</td>
		</tr>
	';
}
}

$content .='


</table>
</page>';
ob_start();
echo $content;
$content = ob_get_clean();
require_once('../assets/html2pdf/html2pdf.class.php');
$html2pdf = new HTML2PDF('P','A4','fr');
$html2pdf->WriteHTML($content);
$html2pdf->Output('barang.pdf');

?>
-->