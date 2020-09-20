<?php
if (isset($_GET['id'])) {
    // menyiapkan data untuk form ubah
    $id   = $_GET['id'];
    $data = query("SELECT * FROM `tb_user_sub_menu` WHERE `id`='$id'");

    if (isset($_POST['simpan'])) {
        $nama    = $_POST['nama'];
        $file    = $_POST['file'];
        $url     = $_POST['url'];
        $menu_id = $_POST['menu_id'];

        $sql = $koneksi->query("UPDATE `tb_user_sub_menu` SET 
              `menu_id`               = '$menu_id',
              `title`                 = '$nama',
              `sub_menu_url`          = '$url',
              `file`                  = '$file'
        WHERE `tb_user_sub_menu`.`id` = '$id'");

        if ($sql) {
            setAlert('Berhasil..! ', 'Data berhasil diubah..', 'success');
            echo '<script type = "text/javascript">window.location.href = "' . $_baseurl . '";</script>';
        } else {
            setAlert('Gagal..! ', 'Data gagal diubah..', 'danger');
            echo '<script type = "text/javascript">window.location.href = "' . $_baseurl . '";</script>';
        }
    }
} else {
    setAlert('Gagal..! ', 'Tidak ada data id yang dikirimkan..', 'danger');
    echo '<script type = "text/javascript">window.location.href = "' . $_baseurl . '";</script>';
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
        Ubah Data SubMenu Manajemen
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
                                    <input class="form-control" name="nama" type="text" value="<?= $data[0]['title']; ?>" />
                                    <input name="id" type="text" value="<?= $data[0]['id']; ?>" hidden="" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Menu</label>
                                    <select class="form-control" name="menu_id">
                                        <?php foreach (query("SELECT * FROM tb_user_menu") as $d) : ?>
                                            <?php if ($data[0]['menu_id'] == $d['user_menu_id']) : ?>
                                                <option value='<?= $d['user_menu_id']; ?>' selected=""><?php echo $d['menu_title']; ?></option>
                                            <?php else : ?>
                                                <option value='<?= $d['user_menu_id']; ?>'><?php echo $d['menu_title']; ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Url</label>
                                    <input class="form-control" name="url" type="text" value="<?= $data[0]['sub_menu_url']; ?>" />
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Lokasi File </label>
                                    <input class="form-control" name="file" type="text" value="<?= $data[0]['file']; ?>" />
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