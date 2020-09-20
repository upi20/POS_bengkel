<?php
if (isset($_POST['simpan'])) {
    $nama    = $_POST['nama'];
    $file    = $_POST['file'];
    $url     = $_POST['url'];
    $menu_id = $_POST['menu_id'];

    $sql = $koneksi->query("INSERT INTO `tb_user_sub_menu` (`id`, `menu_id`, `title`, `sub_menu_url`, `file`) VALUES (NULL, '$menu_id', '$nama', '$url', '$file')");
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
        } else if (form.file.value == "") {
            alert("Lokasi File Tidak Boleh Kosong");
            form.file.focus();
            return (false);
        } else if (form.menu_id.value == "") {
            alert("Menu File Tidak Boleh Kosong");
            form.menu_id.focus();
            return (false);
        }
        return (true);
    }
</script>

<div class="panel panel-default">
    <div class="panel-heading">
        Tambah Data SubMenu Manajemen
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="" onsubmit="return validasi(this)">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input class="form-control" name="nama" type="text" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Menu</label>
                                    <select class="form-control" name="menu_id">
                                        <?php foreach (query("SELECT * FROM tb_user_menu") as $d) : ?>
                                            <option value='<?= $d['user_menu_id']; ?>'>
                                                <?= $d['menu_title']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Url</label>
                                    <input class="form-control" name="url" type="text" />
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Lokasi File </label>
                                    <input class="form-control" name="file" type="text" />
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