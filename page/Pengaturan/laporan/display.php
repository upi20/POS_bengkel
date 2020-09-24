<?php

if (isset($_POST['simpan'])) {
    $id_pengaturan = $_settingDetail['laporan']['id_pengaturan'];
    $nilai = $_POST['perusahaan'] . '$' . $_POST['alamat'] . '$' . $_POST['jabatan'] . '$' . $_POST['pejabat'];

    $sql  = $koneksi->query("UPDATE `tb_pengaturan` SET `pengaturan_nilai` = '$nilai' WHERE `tb_pengaturan`.`id_pengaturan` = '$id_pengaturan'");
    if ($sql) {
        setAlert('Berhasil..! ', 'Data berhasil diubah..', 'success');
        echo '<script type = "text/javascript">window.location.href = "' . $_baseurl . '";</script>';
    } else {
        setAlert('Gagal..! ', 'Data gagal diubah..', 'success');
        echo '<script type = "text/javascript">window.location.href = "' . $_baseurl . '";</script>';
    }
}
?>

<div class="panel panel-default">
    <div class="panel-heading">
        Pengatuaran Laporan
    </div>
    <div class="panel-body">
        <form method="POST" method="post">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Nama Perusahaan</label>
                        <input class="form-control" name="perusahaan" id="perusahaan" value="<?php echo $print['header']['judul']; ?>" required="" />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Nama Jabatan</label>
                        <input class="form-control" name="jabatan" id="jabatan" value="<?php echo $print['footer']['jabatan']; ?>" required="" />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Nama Pejabat</label>
                        <input class="form-control" name="pejabat" id="pejabat" value="<?php echo $print['footer']['nama']; ?>" required="" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Alamat Perusahaan</label>
                        <textarea class="form-control" type="text" name="alamat" id="alamat" rows="4" required=""><?php echo $print['header']['alamat']; ?></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <p><?php echo $_settingDetail['laporan']['pengaturan_deskripsi']; ?></p>
                    </div>
                </div>
            </div>
            <div>
                <input type="submit" name="simpan" value="Ubah" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>