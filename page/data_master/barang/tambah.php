<?php
if (isset($_POST['simpan'])) {
    // meniapkan informasi untu disimpan
    $nama_barang = $_POST['nama_barang'];
    $kode_barang = $_POST['kode_barang'];
    $harga_beli  = $_POST['harga_beli'];
    $harga_jual  = $_POST['harga_jual'];
    $kategori    = $_POST['kategori'];
    $tgl_daftar  = $_POST['tgl_daftar'];

    // menyiapkan informasi gambar
    $foto          = $_FILES['gambar']['name'];
    $lokasi        = $_FILES['gambar']['tmp_name'];
    $ekteksiGambar = explode('.', $foto);
    $ekteksiGambar = strtolower(end($ekteksiGambar));
    $namaFileBaru  = $kode_barang . "_" . uniqid() . '.' . $ekteksiGambar;
    $upload        = move_uploaded_file($lokasi, "images/master_data_barang/" . $namaFileBaru);

    $querybuilder = "INSERT INTO `tb_barang_data` 
    (`id_barang_data`, `id_barang_kategori`, `barang_data_nama`, `barang_data_kode`, `barang_data_harga_beli`, `barang_data_harga_jual`, `barang_data_gambar`, `barang_data_tanggal`)
    VALUES 
    (NULL, '$kategori', '$nama_barang', '$kode_barang', '$harga_beli', '$harga_jual', '$namaFileBaru', '$tgl_daftar') ";

    $sql = $koneksi->query($querybuilder);
    if ($sql) {
        setAlert('Berhasil..! ', 'Data berhasil ditambahkan..', 'success');
        echo '<script type = "text/javascript">window.location.href = "' . $_baseurl . '";</script>';
    } else {
        setAlert('Gagal..! ', 'Data gagal ditambahkan..', 'success');
        echo '<script type = "text/javascript">window.location.href = "' . $_baseurl . '";</script>';
    }
}

// Menyiapkan data kategori
$kategori = query("SELECT * FROM tb_barang_kategori");
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

        if (form.harga_jual.value <= form.harga_beli.value) {
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
        Tambah Data barang
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
                                    <input class="form-control" name="nama_barang" id="nama_barang" required="" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Harga Beli</label>
                                    <input class="form-control" type="number" name="harga_beli" id="harga_beli" required="" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Harga Jual</label>
                                    <input class="form-control is-invalid" type="number" name="harga_jual" id="harga_jual" required="" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Kode Barang</label>
                                    <input class="form-control" name="kode_barang" id="kode_barang" required="" readonly="" value="<?= date("yy-m-d-") . uniqid(); ?>" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <select class="form-control" name="kategori">
                                        <?php if ($kategori) {
                                            foreach ($kategori as $k) {
                                                echo "<option value='$k[id_barang_kategori]'>$k[barang_kategori_nama]</option>";
                                            }
                                        } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Tanggal Daftar</label>
                                    <input class="form-control" readonly="" type="date" name="tgl_daftar" id="tgl_daftar" value="<?= date("yy-m-d"); ?>" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="gambar">Gambar</label>
                                    <input type="file" class="file-control-file" name="gambar" id="gambar" required="" />
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