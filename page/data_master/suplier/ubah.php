<?php
if (isset($_POST['simpan'])) {
    // memperoses data ubah
    $id_suplier  = $_POST['id_suplier'];
    $nama        = $_POST['nama'];
    $no_telepon  = $_POST['no_telepon'];
    $tgl_daftar  = $_POST['tgl_daftar'];
    $alamat      = $_POST['alamat'];

    $querybuilder = " UPDATE `tb_barang_suplier` SET 
        `barang_suplier_nama`           = '$nama',
        `barang_suplier_no_telepon`     = '$no_telepon',
        `barang_suplier_tanggal_daftar` = '$tgl_daftar',
        `barang_suplier_alamat`         = '$alamat'
        WHERE 
        `tb_barang_suplier`.`id_barang_suplier` = '$id_suplier'
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

if (isset($_GET['id'])) {
    // Menyiapkan data ubah
    $id_suplier = $_GET['id'];
    $sql        = $koneksi->query("SELECT * FROM tb_barang_suplier WHERE id_barang_suplier='$id_suplier'");
    $tampil     = $sql->fetch_assoc();
    if (!$sql) {
        setAlert('Gagal..! ', 'Data gagal diubah..', 'danger');
        echo '<script type = "text/javascript">window.location.href = "' . $_baseurl . '";</script>';
    }
} else {
    setAlert('Gagal..! ', 'Data gagal diubah..', 'danger');
    echo '<script type = "text/javascript">window.location.href = "' . $_baseurl . '";</script>';
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
        Ubah Data Suplier
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="" onsubmit="return validasi(this)">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Nama Suplier</label>
                                <input class="form-control" type="text" name="nama" id="nama" value="<?php echo $tampil['barang_suplier_nama']; ?>">
                                <input hidden="" type="text" name="id_suplier" id="id_suplier" value="<?php echo $tampil['id_barang_suplier']; ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>No Telepon</label>
                                <input class="form-control" type="tel" name="no_telepon" id="no_telepon" value="<?php echo $tampil['barang_suplier_no_telepon']; ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Kode Suplier</label>
                                <input class="form-control" name="kode_suplier" id="kode_suplier" required="" readonly="" value="<?php echo $tampil['barang_suplier_kode']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Tanggal Daftar</label>
                                        <input class="form-control" type="date" name="tgl_daftar" id="tgl_daftar" value="<?php echo $tampil['barang_suplier_tanggal_daftar']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="address" class="form-control" name="alamat" id="alamat" value="<?php echo $tampil['barang_suplier_alamat']; ?>">
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