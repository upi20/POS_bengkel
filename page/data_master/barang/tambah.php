<?php
if (isset($_POST['simpan'])) {
    $nama_barang = $_POST['nama_barang'];
    $kode_barang = $_POST['kode_barang'];
    $harga_beli  = $_POST['harga_beli'];
    $harga_jual  = $_POST['harga_jual'];
    $stok        = $_POST['stok'];
    $kategori    = $_POST['kategori'];

    $foto          = $_FILES['gambar']['name'];
    $lokasi        = $_FILES['gambar']['tmp_name'];
    $ekteksiGambar = explode('.', $foto);
    $ekteksiGambar = strtolower(end($ekteksiGambar));
    $namaFileBaru  = $kode_barang . "_" . uniqid() . '.' . $ekteksiGambar;
    $upload        = move_uploaded_file($lokasi, "images/master_data_barang/" . $namaFileBaru);

    $querybuilder = " INSERT INTO `tb_barang` (`id_barang`, `nama_barang`, `kode_barang`, `harga_beli`, `harga_jual`, `gambar`, `stok`, `id_kategori`)
    VALUES (NULL, '$nama_barang', '$kode_barang', '$harga_beli', '$harga_jual', '$namaFileBaru', '$stok', '$kategori') ";

    $sql = $koneksi->query($querybuilder);
    if ($sql) {
        setAlert('<strong>Berhasil..! </strong>Data berhasil ditambahkan..', 'success');
        echo '<script type = "text/javascript">window.location.href = "' . $_baseurl . '";</script>';
    } else {
        setAlert('<strong>Gagal..! </strong>Data gagal ditambahkan..', 'success');
        echo '<script type = "text/javascript">window.location.href = "' . $_baseurl . '";</script>';
    }
}
?>

<script type="text/javascript">
    function validasi(form) {
        if (form.nama_barang.value == "") {
            alert("nama_barang Tidak Boleh Kosong");
            form.nama_barang.focus();
            return (false);
        }
        if (form.kode_barang.value == "") {
            alert("kode_barang Tidak Boleh Kosong");
            form.kode_barang.focus();
            return (false);
        }
        if (form.harga_beli.value == "") {
            alert("harga_beli Tidak Boleh Kosong");
            form.harga_beli.focus();
            return (false);
        }
        if (form.stok.value == "") {
            alert("stok Tidak Boleh Kosong");
            form.stok.focus();
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
                                    <input class="form-control" type="number" name="harga_jual" id="harga_jual" required="" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Kode Barang</label>
                                    <input class="form-control" name="kode_barang" id="kode_barang" required="" disabled value="<?= date("yy/m/d/") . uniqid(); ?>" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="stock">Stok</label>
                                    <input class="form-control" type="number" name="stok" id="stok" required="" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <select class="form-control" name="kategori">
                                        <option>== Pilih ==</option>
                                        <?php
                                        $query = $koneksi->query("SELECT * FROM tb_kategori ORDER by id_kategori");

                                        while ($kategori = $query->fetch_assoc()) {
                                            echo "<option value='$kategori[id_kategori]'>$kategori[kategori]</option>";
                                        }
                                        ?>
                                    </select>
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
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <input type="submit" name="simpan" value="Simpan" class="btn btn-primary btn-block">
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>