<?php
if (isset($_POST['simpan'])) {
    // memperoses data ubah
    $nama_barang = $_POST['nama_barang'];
    $kode_barang = $_POST['kode_barang'];
    $harga_beli  = $_POST['harga_beli'];
    $harga_jual  = $_POST['harga_jual'];
    $kategori    = $_POST['kategori'];
    $fotoasal    = $_POST['fotoasal'];
    $id_barang   = $_POST['id_barang'];
    $tgl_daftar  = $_POST['tgl_daftar'];
    $gambar      = $_FILES['gambar']['name'];
    $lokasi      = $_FILES['gambar']['tmp_name'];

    if (!empty($lokasi)) {
        // generate nama file
        $ekteksiGambar = explode('.', $gambar);
        $ekteksiGambar = strtolower(end($ekteksiGambar));
        $namaFileBaru  = $kode_barang . "_" . uniqid() . '.' . $ekteksiGambar;
        $upload        = move_uploaded_file($lokasi, "images/master_data_barang/" . $namaFileBaru);

        // hapus file yang sudah ada
        if (file_exists("images/master_data_barang/$fotoasal")) {
            unlink("images/master_data_barang/$fotoasal");
        }
        $querybuilder = " UPDATE `tb_barang_data` SET
            `barang_data_nama`       = '$nama_barang',
            `barang_data_harga_beli` = '$harga_beli',
            `barang_data_harga_jual` = '$harga_jual',
            `barang_data_gambar`     = '$namaFileBaru',
            `barang_data_tanggal`    = '$tgl_daftar',
            `id_barang_kategori`     = '$kategori'
        WHERE `tb_barang_data`.`id_barang_data` = '$id_barang'
        ";

        $sql = $koneksi->query($querybuilder);
        if ($sql) {
            setAlert('Berhasil..! ', 'Data berhasil diubah..', 'success');
            echo '<script type = "text/javascript">window.location.href = "' . $_baseurl . '";</script>';
        } else {
            setAlert('Gagal..! ', 'Data gagal diubah..', 'danger');
            echo '<script type = "text/javascript">window.location.href = "' . $_baseurl . '";</script>';
        }
    } else {
        $querybuilder = " UPDATE `tb_barang_data` SET
            `barang_data_nama`       = '$nama_barang',
            `barang_data_harga_beli` = '$harga_beli',
            `barang_data_harga_jual` = '$harga_jual',
            `barang_data_tanggal`    = '$tgl_daftar',
            `id_barang_kategori`     = '$kategori'
        WHERE `tb_barang_data`.`id_barang_data` = '$id_barang'
        ";
        $sql = $koneksi->query($querybuilder);
        if ($sql) {
            setAlert('Berhasil..! ', 'Data berhasil diubah..', 'success');
            echo '<script type = "text/javascript">window.location.href = "' . $_baseurl . '";</script>';
        } else {
            setAlert('Gagal..! ', 'Data gagal diubah..', 'danger');
            echo '<script type = "text/javascript">window.location.href = "' . $_baseurl . '";</script>';
        }
    }
}

if (isset($_GET['id'])) {
    // Menyiapkan data ubah
    $id_barang = $_GET['id'];
    $tampil['data']    = query("SELECT * FROM tb_barang_data WHERE id_barang_data='$id_barang'")[0];


    if (!$tampil) {
        setAlert('Gagal..! ', 'Data gagal diubah..', 'danger');
        echo '<script type = "text/javascript">window.location.href = "' . $_baseurl . '";</script>';
    } else {
        // menyiapkan data kategori
        $tampil['kategori'] = query("SELECT * FROM tb_barang_kategori");
    }
} else {
    setAlert('Gagal..! ', 'Data gagal diubah..', 'danger');
    echo '<script type = "text/javascript">window.location.href = "' . $_baseurl . '";</script>';
}
?>

<script type="text/javascript">
    function validasi(form) {
        if (form.nama_barang.value == "") {
            setAlert('Peringatan..!', "Nama Barang Tidak Boleh Kosong", 'danger');
            form.nama_barang.focus();
            return (false);
        }

        if (form.harga_beli.value == "") {
            setAlert('Peringatan..!', "Harga Beli Tidak Boleh Kosong", 'danger');
            form.harga_beli.focus();
            return (false);
        }

        if (Number(form.harga_jual.value) <= Number(form.harga_beli.value)) {
            setAlert('Peringatan..!', "Harga jual harus lebih tinggi dari harga beli", 'danger');
            form.harga_jual.focus();
            return (false);
        }

        if (form.harga_jual.value == "") {
            setAlert('Peringatan..!', "Harga Jual Tidak Boleh Kosong", 'danger');
            form.harga_jual.focus();
            return (false);
        }
        return (true);
    }
</script>

<div class="panel panel-default">
    <div class="panel-heading">
        Ubah Data barang
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" enctype="multipart/form-data" onsubmit="return validasi(this)">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama barang</label>
                                    <input class="form-control" name="nama_barang" value="<?php echo $tampil['data']['barang_data_nama']; ?>" />
                                    <input hidden="" name="id_barang" value="<?php echo $tampil['data']['id_barang_data']; ?>" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Harga Beli</label>
                                    <input class="form-control" name="harga_beli" value="<?php echo $tampil['data']['barang_data_harga_beli']; ?>" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Harga Jual</label>
                                    <input class="form-control" name="harga_jual" value="<?php echo $tampil['data']['barang_data_harga_jual']; ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Kode Barang</label>
                                    <input readonly="" class="form-control" type="text" name="kode_barang" value="<?php echo $tampil['data']['barang_data_kode']; ?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <select class="form-control" name="kategori">
                                        <?php if ($tampil['kategori']) {
                                            foreach ($tampil['kategori'] as $kategori) {
                                                if ($tampil['data']['id_barang_kategori'] == $kategori['id_barang_kategori']) {
                                                    echo '<option selected="" value="' . $kategori['id_barang_kategori'] . '">' . $kategori['barang_kategori_nama'] . '</option>';
                                                } else {
                                                    echo '<option value="' . $kategori['id_barang_kategori'] . '">' . $kategori['barang_kategori_nama'] . '</option>';
                                                }
                                            }
                                        } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Tanggal Daftar</label>
                                    <input class="form-control" type="date" name="tgl_daftar" id="tgl_daftar" value="<?php echo $tampil['data']['barang_data_tanggal']; ?>" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="gambar">Gambar</label>
                                    <input type="file" class="file-control-file" name="gambar" id="gambar" />
                                    <input type="text" name="fotoasal" value="<?= $tampil['data']['barang_data_gambar']; ?>" hidden="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                                <a href="<?php echo $_baseurl; ?>" class="btn btn-success">Kembali</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>