<?php
if (isset($_POST['simpan'])) {
    $level = $_POST['level'];
    $sql = $koneksi->query("INSERT INTO `tb_user_level` (`id_level`, `title`) VALUES (NULL, '$level')");
    if ($sql) {
        setAlert('Berhasil..! ','Data berhasil ditambahkan..', 'success');
        echo '<script type = "text/javascript">window.location.href = "' . $_baseurl . '";</script>';
    } else {
        setAlert('Gagal..! ','Data gagal ditambahkan..', 'success');
        echo '<script type = "text/javascript">window.location.href = "' . $_baseurl . '";</script>';
    }
}
?>

<script type="text/javascript">
    function validasi(form) {
        if (form.level.value == "") {
            alert("Nama Level Tidak Boleh Kosong");
            form.level.focus();
            return (false);
        }
        return (true);
    }
</script>

<div class="panel panel-default">
    <div class="panel-heading">
        Tambah Data Level Pengguna
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" onsubmit="return validasi(this)">
                    <div class="form-group">
                        <label>Nama Level</label>
                        <input class="form-control" name="level" id="level" />
                    </div>
                    <div>
                        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>