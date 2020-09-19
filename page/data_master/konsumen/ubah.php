<?php

$id_konsumen  = $_GET['id_konsumen'];
$sql          = $koneksi->query("select * from tb_konsumen where id_konsumen='$id_konsumen'");
$tampil       = $sql->fetch_assoc();
$warna_mobil2 = $tampil['warna_mobil2'];
$kategori     = $tampil['kategori'];
$alamat       = $tampil['alamat'];
?>

<div class="panel panel-default">
    <div class="panel-heading">
        Ubah Data
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">

                <form method="POST" action="">
                    <div class="form-group">
                        <label>id_konsumen</label>
                        <input class="form-control" name="id_konsumen" value="<?php echo $tampil['id_konsumen']; ?>" />

                    </div>

                    <div class="form-group">
                        <label>kode_konsumen</label>
                        <input class="form-control" name="kode_konsumen" type="text" value="<?php echo $tampil['kode_konsumen']; ?>" />

                    </div>

                    <div class="form-group">
                        <label>nik</label>
                        <input class="form-control" name="nik" type="text" value="<?php echo $tampil['nik']; ?>" />

                    </div>

                    <div class="form-group">
                        <label>nama</label>
                        <input class="form-control" name="nama" type="text" value="<?php echo $tampil['nama']; ?>" />

                    </div>

                    <div class="form-group">
                        <label>hp</label>
                        <input class="form-control" name="hp" type="phone" value="<?php echo $tampil['hp']; ?>" />
                    </div>

                    <div class="form-group">
                        <label>bg_mobil</label>
                        <input class="form-control" name="bg_mobil" type="text" value="<?php echo $tampil['bg_mobil']; ?>" />

                    </div>

                    <div class="form-group">
                        <label>merk_mobil</label>
                        <input class="form-control" name="merk_mobil" type="text" value="<?php echo $tampil['merk_mobil']; ?>" />

                    </div>

                    <div class="form-group">
                        <label>warna_mobil</label>
                        <input class="form-control" name="warna_mobil" type="text" value="<?php echo $tampil['warna_mobil']; ?>" />

                    </div>

                    <div class="form-group">
                        <label>tgl_daftar</label>
                        <input class="form-control" name="tgl_daftar" type="text" value="<?php echo $tampil['tgl_daftar']; ?>" />

                    </div>

                    <div class="form-group">
                        <label>alamat</label>
                        <input class="form-control" name="alamat" type="text" value="<?php echo $tampil['alamat']; ?>" />

                    </div>

                    <div>

                        <input type="submit" name="simpan" value="Ubah" class="btn btn-primary">
                    </div>
            </div>

            </form>
        </div>
    </div>
</div>
</div>


<?php
if (isset($_POST['simpan'])) {
    $id_konsumen   = $_POST['id_konsumen'];
    $kode_konsumen = $_POST['kode_konsumen'];
    $nik           = $_POST['nik'];
    $nama          = $_POST['nama'];
    $hp            = $_POST['hp'];
    $bg_mobil      = $_POST['bg_mobil'];
    $merk_mobil    = $_POST['merk_mobil'];
    $warna_mobil   = $_POST['warna_mobil'];
    $tgl_daftar    = $_POST['tgl_daftar'];
    $alamat        = $_POST['alamat'];

    $koneksi->query("UPDATE tb_konsumen SET id_konsumen='$id_konsumen', kode_konsumen='$kode_konsumen', nik='$nik', nama='$nama', hp='$hp', bg_mobil='$bg_mobil', merk_mobil='$merk_mobil', warna_mobil='$warna_mobil', tgl_daftar='$tgl_daftar', alamat='$alamat' WHERE id_konsumen='$id_konsumen'");
    echo  '<script type="text/javascript"> alert ("Ubah Berhasil Disimpan"); window.location.href = "' . $_baseurl . '"; </script>';
}
?>