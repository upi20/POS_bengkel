<?php
if (isset($_POST['simpan'])) {
    $kode_suplier  = $_POST['kode_suplier'];
    $nama          = $_POST['nama'];
    $no_telepon    = $_POST['no_telepon'];
    $tgl_daftar    = $_POST['tgl_daftar'];
    $alamat        = $_POST['alamat'];

    $querybuilder = "INSERT INTO `tb_barang_suplier` 
    (`id_barang_suplier`, `barang_suplier_nama`, `barang_suplier_kode`, `barang_suplier_no_telepon`, `barang_suplier_tanggal_daftar`, `barang_suplier_alamat`)
    VALUES 
    (NULL, '$nama', '$kode_suplier', '$no_telepon', '$tgl_daftar', '$alamat')";

    $sql = $koneksi->query($querybuilder);
    if ($sql) {
        setAlert('Berhasil..! ', 'Data berhasil ditambahkan..', 'success');
        echo '<script type = "text/javascript">window.location.href = "' . $_baseurl . '";</script>';
    } else {
        setAlert('Gagal..! ', 'Data gagal ditambahkan..', 'success');
        echo '<script type = "text/javascript">window.location.href = "' . $_baseurl . '";</script>';
    }
}
?>


<script type="text/javascript">
    function validasi(form) {
        if (form.nama.value == "") {
            setAlert("Peringatan..!", "Nama Tidak Boleh Kosong", "danger");
            form.nama.focus();
            return false;
        } else if (form.no_telepon.value == "") {
            setAlert("Peringatan..!", "No Telepon Tidak Boleh Kosong", "danger");
            form.no_telepon.focus();
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
        Tambah Data Suplier
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="" onsubmit="return validasi(this)">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Nama Suplier</label>
                                <input class="form-control" type="text" name="nama" id="nama" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>No Telepon</label>
                                <input class="form-control" type="tel" name="no_telepon" id="no_telepon" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Kode Suplier</label>
                                <input class="form-control" name="kode_suplier" id="kode_suplier" required="" readonly="" value="<?= date("yy-m-d-") . uniqid(); ?>" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Tanggal Daftar</label>
                                        <input class="form-control" type="date" name="tgl_daftar" id="tgl_daftar" value="<?= date("yy-m-d"); ?>" />
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="address" class="form-control" name="alamat" id="alamat">
                                    </div>
                                </div>
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