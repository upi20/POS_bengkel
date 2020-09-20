<?php
if (isset($_POST['simpan'])) {
    $kategori = $_POST['kategori'];
    $simpan   = $_POST['simpan'];
    if ($simpan) {
        $sql = $koneksi->query("insert into tb_barang_kategori (kategori)values('$kategori')");
        if ($sql) {
            setAlert('Berhasil..! ', 'Data berhasil ditambahkan..', 'success');
            echo '<script type = "text/javascript">window.location.href = "' . $_baseurl . '";</script>';
        } else {
            setAlert('Gagal..! ', 'Data gagal ditambahkan..', 'success');
            echo '<script type = "text/javascript">window.location.href = "' . $_baseurl . '";</script>';
        }
    }
}
?>

<script type="text/javascript">
    function validasi(form) {
        if (form.kategori.value == "") {
            alert("kategori Tidak Boleh Kosong");
            form.kategori.focus();
            return (false);
        }
        return (true);
    }
</script>

<div class="panel panel-default">
    <div class="panel-heading">
        Tambah Data kategori Barang
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" onsubmit="return validasi(this)">
                    <div class="form-group">
                        <label>Kategori Barang</label>
                        <input class="form-control" name="kategori" id="kategori" />

                    </div>
                    <div>
                        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>