<?php
if (isset($_POST['simpan'])) {
    $username = $_POST['username'];
    $pass     = $_POST['pass'];
    $nama     = $_POST['nama'];
    $level    = $_POST['level'];
    $foto     = $_FILES['foto']['name'];
    $lokasi   = $_FILES['foto']['tmp_name'];

    // generate nama file
    $ekteksiGambar = explode('.', $foto);
    $ekteksiGambar = strtolower(end($ekteksiGambar));
    $namaFileBaru  = $username . "_" . uniqid() . '.' . $ekteksiGambar;
    $upload        = move_uploaded_file($lokasi, "images/user_profile/" . $namaFileBaru);

    $sql = $koneksi->query("INSERT INTO `tb_user` (`id`, `username`, `password`, `nama`, `foto`, `id_level`) VALUES (NULL, '$username', '$pass', '$nama', '$namaFileBaru', '$level')");
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
        if (form.nama.value == "") {
            alert("Nama user Tidak Boleh Kosong");
            form.nama.focus();
            return (false);
        }
        if (form.level.value == "") {
            alert("Level Tidak Boleh Kosong");
            form.level.focus();
            return (false);
        }
        if (form.username.value == "") {
            alert("Username Tidak Boleh Kosong");
            form.username.focus();
            return (false);
        }
        if (form.pass.value == "") {
            alert("Password Tidak Boleh Kosong");
            form.pass.focus();
            return (false);
        }
        return (true);
    }
</script>
<div class="panel panel-default">
    <div class="panel-heading">
        Ubah Data Pengguna
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" enctype="multipart/form-data" onsubmit="return validasi(this)">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input class="form-control" name="nama" id="nama" value="" required="" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Level User</label>
                                        <select class="form-control" name="level" id="level">
                                            <?php foreach (query("SELECT * FROM `tb_user_level`") as $level) {
                                                if ($data['id_level'] == $level['id_level']) echo '<option selected="" value="' . $level['id_level'] . '">' . $level['title'] . '</option>';
                                                else echo '<option value="' . $level['id_level'] . '">' . $level['title'] . '</option>';
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input class="form-control" name="username" type="text" id="username" value="" required="" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input class="form-control" name="pass" type="password" id="pass" value="" required="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Pilih Foto </label>
                                        <input type="file" name="foto" id="foto" accept="image/*" required="" />
                                        <span><i>Ukuran file maksimal 2000 Kb</i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <input type="submit" name="simpan" class="btn btn-primary" value="Ubah">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>