<?php
if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $icon = $_POST['icon'];
    $url  = $_POST['url'];

    $sql  = $koneksi->query("INSERT INTO `tb_user_menu` (`user_menu_id`, `menu_title`, `icon`, `menu_url`) VALUES (NULL, '$nama', '$icon', '$url')");
    if ($sql) {
        setAlert('Berhasil..! ','Data berhasil ditambahkan..', 'success');
        echo '<script type = "text/javascript">window.location.href = "' . $_baseurl . '";</script>';
    } else {
        setAlert('Gagal..! ','Data gagal ditambahkan..', 'danger');
        echo '<script type = "text/javascript">window.location.href = "' . $_baseurl . '";</script>';
    }
}
?>

<script type="text/javascript">
    function validasi(form) {
        if (form.nama.value == "") {
            alert("Nama Tidak Boleh Kosong");
            form.nama.focus();
            return (false);
        } else if (form.icon.value == "") {
            alert("Icon Tidak Boleh Kosong");
            form.icon.focus();
            return (false);
        }
        return (true);
    }
</script>

<div class="panel panel-default">
    <div class="panel-heading">
        Tambah Data Menu Manajemen
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="" onsubmit="return validasi(this)">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input class="form-control" name="nama" type="text" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Url</label>
                                    <input class="form-control" name="url" type="text" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Icon </label>
                                    <input class="form-control" name="icon" type="text" />
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 20px;">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <input type="submit" name="simpan" value="Simpan" class="btn btn-primary btn-block">
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>