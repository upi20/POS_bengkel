<?php

$id_konsumen  = $_GET['id_konsumen'];
$sql          = $koneksi->query("select * from tb_konsumen where id_konsumen='$id_konsumen'");
$tampil       = $sql->fetch_assoc();
$warna_mobil2 = $tampil['warna_mobil2'];
$kategori     = $tampil['kategori'];
$alamat       = $tampil['alamat'];

?>

<?php
// memperoses data ubah
if (isset($_POST['simpan'])) {
    $kode_konsumen = $_POST['kode_konsumen'];
    $nik           = $_POST['nik'];
    $nama          = $_POST['nama'];
    $no_telepon    = $_POST['no_telepon'];
    $merk_mobil    = $_POST['merk_mobil'];
    $warna_mobil   = $_POST['warna_mobil'];
    $tgl_daftar    = $_POST['tgl_daftar'];
    $alamat        = $_POST['alamat'];

    $querybuilder = " UPDATE `tb_barang` SET
                  `nama_barang`           = '$nama_barang',
                  `harga_beli`            = '$harga_beli',
                  `harga_jual`            = '$harga_jual',
                  `stok`                  = '$stok',
                  `id_kategori`           = '$kategori'
            WHERE `tb_barang`.`id_barang` = '$id_barang'
        ";
    $sql = $koneksi->query($querybuilder);
    if ($sql) {
        setAlert('Berhasil..! ', 'Data berhasil diubah..', 'success');
        echo '<script type = "text/javascript">window.location.href = "' . $_baseurl . '";</script>';
    } else {
        setAlert('Gagal..! ', 'Data gagal diubah..', 'success');
        echo '<script type = "text/javascript">window.location.href = "' . $_baseurl . '";</script>';
    }
}

// Menyiapkan data ubah
$id_barang   = $_GET['id_barang'];
$sql         = $koneksi->query("select * from tb_barang where id_barang='$id_barang'");
$tampil      = $sql->fetch_assoc();
$harga_jual2 = $tampil['harga_jual'];
?>

<script type="text/javascript">
    function validasi(form) {
        if (form.nik.value == "") {
            setAlert("Peringatan..!", "NIK Tidak Boleh Kosong", "danger");
            form.nik.focus();
            return false;
        } else if (form.nama.value == "") {
            setAlert("Peringatan..!", "Nama Tidak Boleh Kosong", "danger");
            form.nama.focus();
            return false;
        } else if (form.no_telepon.value == "") {
            setAlert("Peringatan..!", "No Telepon Tidak Boleh Kosong", "danger");
            form.no_telepon.focus();
            return false;
        } else if (form.merk_mobil.value == "") {
            setAlert("Peringatan..!", "Merek Mobil Tidak Boleh Kosong", "danger");
            form.merk_mobil.focus();
            return false;
        } else if (form.warna_mobil.value == "") {
            setAlert("Peringatan..!", "Warna Mobil Tidak Boleh Kosong", "danger");
            form.warna_mobil.focus();
            return false;
        } else if (form.tgl_daftar.value == "") {
            setAlert("Peringatan..!", "Tanggal Daftar Tidak Boleh Kosong", "danger");
            form.tgl_daftar.focus();
            return false;
        } else if (form.alamat.value == "") {
            setAlert("Peringatan..!", "Alamat Tidak Boleh Kosong", "danger");
            form.alamat.focus();
            return false;
        }
        return (true);
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
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Nama</label>
                                <input class="form-control" type="text" name="nama" id="nama" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>No Telepon</label>
                                <input class="form-control" type="tel" name="no_telepon" id="no_telepon" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Tanggal Daftar</label>
                                        <input class="form-control" type="date" name="tgl_daftar" id="tgl_daftar" value="<?= date("yy-m-d"); ?>" />
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Kode Konsumen</label>
                                        <input class="form-control" name="kode_konsumen" id="kode_konsumen" required="" readonly="" value="<?= date("yy-m-d-") . uniqid(); ?>" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Merek Mobil</label>
                                        <input class="form-control" type="text" name="merk_mobil" id="merk_mobil" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Warna Mobil</label>
                                        <input class="form-control" type="text" name="warna_mobil" id="warna_mobil" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea class="form-control" type="text" name="alamat" id="alamat" rows="4"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>