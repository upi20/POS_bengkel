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