<?php

if (isset($_POST['simpan'])) {
    $qperusahan = true;
    if ($_POST['perusahaan'] != $_settingDetail['nama_perusahaan']['pengaturan_nilai']) {
        $nilai = $_POST['perusahaan'];
        $id_pengaturan = $_settingDetail['nama_perusahaan']['id_pengaturan'];
        $qperusahan = $koneksi->query("UPDATE `tb_pengaturan` SET `pengaturan_nilai` = '$nilai' WHERE `tb_pengaturan`.`id_pengaturan` = '$id_pengaturan'");
    }

    $qurl = true;
    if ($_POST['url'] != $_settingDetail['default_home']['pengaturan_nilai']) {
        $nilai = $_POST['url'];
        $id_pengaturan = $_settingDetail['default_home']['id_pengaturan'];
        $qurl = $koneksi->query("UPDATE `tb_pengaturan` SET `pengaturan_nilai` = '$nilai' WHERE `tb_pengaturan`.`id_pengaturan` = '$id_pengaturan'");
    }

    $qcpr = true;
    if ($_POST['copyright'] != $_settingDetail['tahuncopyright']['pengaturan_nilai']) {
        $nilai = $_POST['copyright'];
        $id_pengaturan = $_settingDetail['tahuncopyright']['id_pengaturan'];
        $qcpr = $koneksi->query("UPDATE `tb_pengaturan` SET `pengaturan_nilai` = '$nilai' WHERE `tb_pengaturan`.`id_pengaturan` = '$id_pengaturan'");
    }

    $dev = true;
    if (isset($_POST['pengembangan'])) {
        $id_pengaturan = $_settingDetail['pengembangan']['id_pengaturan'];
        $dev = $koneksi->query("UPDATE `tb_pengaturan` SET `pengaturan_nilai` = '1' WHERE `tb_pengaturan`.`id_pengaturan` = '$id_pengaturan'");
    } else {
        $id_pengaturan = $_settingDetail['pengembangan']['id_pengaturan'];
        $dev = $koneksi->query("UPDATE `tb_pengaturan` SET `pengaturan_nilai` = '0' WHERE `tb_pengaturan`.`id_pengaturan` = '$id_pengaturan'");
    }

    $gambar = true;

    if ($_FILES['gambar']['tmp_name']) {
        if (file_exists("images/background/bg.jpg")) {
            unlink("images/background/bg.jpg");
        }
        $lokasi = $_FILES['gambar']['tmp_name'];
        $gambar = move_uploaded_file($lokasi, "images/background/bg.jpg");
    }

    $sql = $qperusahan && $qurl && $qcpr && $dev && $gambar;
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
        Pengatuaran Aplikasi
    </div>
    <div class="panel-body">
        <form method="POST" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label>Nama Perusahaan</label>
                        <input class="form-control" name="perusahaan" id="perusahaan" value="<?php echo $_settingDetail['nama_perusahaan']['pengaturan_nilai']; ?>" required="" />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>URL Home Default</label>
                        <input class="form-control" name="url" id="url" value="<?php echo $_settingDetail['default_home']['pengaturan_nilai']; ?>" required="" />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Copyright</label>
                        <input class="form-control" name="copyright" id="copyright" value="<?php echo $_settingDetail['tahuncopyright']['pengaturan_nilai']; ?>" required="" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <label for="pengembangan" class="form-check-label">Pengembangan</label>
                    <table width="100%">
                        <tr>
                            <td style="white-space:nowrap"><label for="pengembangan" class="form-check-label">Mode Pengembangan</label></td>
                            <?php if ($_settingDetail['pengembangan']['pengaturan_nilai']) : ?>
                                <td style="text-align:right;"><input type="checkbox" class="checkbox" id="pengembangan" name="pengembangan" checked=""></td>
                            <?php else : ?>
                                <td style="text-align:right;"><input type="checkbox" class="checkbox" id="pengembangan" name="pengembangan"></td>
                            <?php endif; ?>
                        </tr>
                    </table>
                </div>
                <div class="col-md-7">
                    <div class="form-group">
                        <label for="gambar">Logo</label>
                        <input type="file" class="file-control-file" name="gambar" id="gambar" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <hr>
                </div>
            </div>
            <div>
                <input type="submit" name="simpan" value="Ubah" class="btn btn-primary">
            </div>
        </form>
        <div class="row">
            <div class="col-md-12">
                <hr>
                <label>Keterangan</label>
                <br>
                <label>Nama peusahaan:</label>
                <span><?php echo $_settingDetail['nama_perusahaan']['pengaturan_deskripsi']; ?></span>
                <hr>
                <label>Url Home Default:</label>
                <span><?php echo $_settingDetail['default_home']['pengaturan_deskripsi']; ?></span>
                <hr>
                <label>Copyright:</label>
                <span><?php echo $_settingDetail['tahuncopyright']['pengaturan_deskripsi']; ?></span>
                <hr>
                <label>Mode Pengembangan:</label>
                <span><?php echo $_settingDetail['pengembangan']['pengaturan_deskripsi']; ?></span>
                <hr>
                <label>Logo:</label>
                <span><?php echo $_settingDetail['logo']['pengaturan_deskripsi']; ?></span>
                <hr>
            </div>
        </div>
    </div>
</div>