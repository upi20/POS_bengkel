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
 
#ambil data di tabel dan masukkan ke array
$query = "SELECT * FROM tb_kategori ";
$sql = mysqli_query ($conn,$query);
$data = array();

while ($row = mysqli_fetch_assoc($sql)) {
array_push($data, $row);
}
 
#setting judul laporan dan header tabel

$judul = "EDO PLAYSTATION";
$judul2 = "Laporan Kategori ";
$jln = "JL. Jend. Sudirman, Tambak Sari, Kec. Jambi Selatan, Kota Jambi";
$header = array(
		array("label"=>"NO", "length"=>20, "align"=>"C"),
		array("label"=>"KATEGORI", "length"=>120, "align"=>"L")
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
<h1>Laporan Data Kategori Barang</h1>
<br>


<table border="1px" class="tabel"  >
<tr>
<th>No</th>
<th>kategori</th>
<th>jumlah</th>

</tr>';



if (isset($_POST['cetak'])) {


	
	$tgl1 = $_POST['tanggal1'];
	$tgl2 = $_POST['tanggal2'];

	
		
	$no = 1;
	$sql = $koneksi->query("select * from tb_kategori");
	// echo $tgl1; echo "<br>"; echo $tgl2;
	$jumlah = [];
$i = 0;
$ktgr = "";
while ($tampil=$sql->fetch_assoc()) {
	$kategori = $tampil['kategori'];
	if($ktgr !== $kategori || $ktgr ==""){
	$jumlah[$i] = $koneksi->query("select * from tb_barang where kategori='$kategori' and tgl_input between '$tgl1' and '$tgl2'")->num_rows;
	
	$content .='
		<tr>
			<td align="center">'.$no++.'</td>
			<td align="center">'.$tampil['kategori'].'</td>
			<td align="center">'.$jumlah[$i].'</td>
			
		</tr>
	';
	$i++;
	}
	$ktgr=$kategori;
}
// echo $tgl1; echo "<br>"; echo $tgl2;
}else{

$no=1;

$sql = $koneksi->query("select * from tb_kategori");
$jumlah = [];
$i = 0;
$ktgr = "";
while ($tampil=$sql->fetch_assoc()) {
	$kategori = $tampil['kategori'];
	if($ktgr !== $kategori || $ktgr ==""){
	$jumlah[$i] = $koneksi->query("select * from tb_barang where kategori='$kategori'")->num_rows;
	
	$content .='
		<tr>
			<td align="center">'.$no++.'</td>
			<td align="center">'.$tampil['kategori'].'</td>
			<td align="center">'.$jumlah[$i].'</td>
			
		</tr>
	';
	$i++;
	}
	$ktgr=$kategori;
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
$html2pdf->Output('kategoriBarang.pdf');

?>
-->