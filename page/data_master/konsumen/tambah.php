<script type="text/javascript">
function validasi(form) {
if (form.id_konsumen.value == "") {
alert("id_konsumen Tidak Boleh Kosong");
form.id_konsumen.focus();
return false;
}
if (form.kode_konsumen.value == "") {
alert("kode_konsumen Tidak Boleh Kosong");
form.kode_konsumen.focus();
return false;
}
if (form.nik.value == "") {
alert("nik Tidak Boleh Kosong");
form.nik.focus();
return false;
}
if (form.nama.value == "") {
alert("nama Tidak Boleh Kosong");
form.nama.focus();
return false;
}
if (form.hp.value == "") {
alert("hp Tidak Boleh Kosong");
form.hp.focus();
return false;
}
if (form.bg_mobil.value == "") {
alert("bg_mobil Tidak Boleh Kosong");
form.bg_mobil.focus();
return false;
}
if (form.merk_mobil.value == "") {
alert("merk_mobil Tidak Boleh Kosong");
form.merk_mobil.focus();
return false;
}
if (form.warna_mobil.value == "") {
alert("warna_mobil Tidak Boleh Kosong");
form.warna_mobil.focus();
return false;
}
if (form.tgl_daftar.value == "") {
alert("tgl_daftar Tidak Boleh Kosong");
form.tgl_daftar.focus();
return false;
}
if (form.alamat.value == "") {
alert("alamat Tidak Boleh Kosong");
form.alamat.focus();
return false;
}
return true;
}
</script>
<div class="panel panel-default">
    <div class="panel-heading">
        Tambah Data konsumen
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="" onsubmit="return validasi(this)">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>NIK</label>
                                <input class="form-control" name="nik" id="nik" />
                            </div>
                        </div>
                            <div class="col-md-4"></div>
                        </div>
                        <div class="form-group">
                            <label>kode_konsumen</label>
                            <input class="form-control" name="kode_konsumen" id="kode_konsumen" />
                        </div>
                        <div class="form-group">
                            <label>nama</label>
                            <input class="form-control" type="text" name="nama" id="nama" />
                        </div>
                        <div class="form-group">
                            <label>hp</label>
                            <input class="form-control" type="phone" name="hp" id="hp" />
                        </div>
                        <div class="form-group">
                            <label>bg_mobil</label>
                            <input class="form-control" type="text" name="bg_mobil" id="bg_mobil" />
                        </div>
                        <div class="form-group">
                            <label>merk_mobil</label>
                            <input class="form-control" type="text" name="merk_mobil" />
                        </div>
                        <div class="form-group">
                            <label>warna_mobil</label>
                            <input class="form-control" type="text" name="warna_mobil" id="warna_mobil" />
                        </div>
                        <div class="form-group">
                            <label>tgl_daftar</label>
                            <input class="form-control" type="date" name="tgl_daftar" id="tgl_daftar" />
                        </div>
                        <div class="form-group">
                            <label>alamat</label>
                            <input class="form-control" type="text" name="alamat" id="alamat" />
                        </div>
                        <div>
                            <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
if (isset($_POST['simpan'])) {
$kode_konsumen = $_POST['kode_konsumen'];
$nik = $_POST['nik'];
$nama = $_POST['nama'];
$hp = $_POST['hp'];
$bg_mobil = $_POST['bg_mobil'];
$merk_mobil = $_POST['merk_mobil'];
$warna_mobil = $_POST['warna_mobil'];
$tgl_daftar = $_POST['tgl_daftar'];
$alamat = $_POST['alamat'];
$sql = $koneksi->query("INSERT INTO tb_konsumen VALUES ('', '$kode_konsumen', '$nik', '$nama', '$hp', '$bg_mobil', '$merk_mobil', '$warna_mobil', '$tgl_daftar', '$alamat')");
var_dump($sql);
if ($sql) {
echo '
<script type="text/javascript">
alert ("Data Berhasil Disimpan");
window.location.href = "' . $_baseurl . '";
</script>
';
}
}
?>