<?php
if (isset($_GET['id_user'])) {
    $id         = $_GET['id_user'];
    $sql        = $koneksi->query("select * from tb_user where id='$id'");
    $data       = $sql->fetch_assoc();

    if (isset($_POST['simpan'])) {
        $username = $_POST['username'];
        $pass     = $_POST['pass'];
        $nama     = $_POST['nama'];
        $fotoasal = $_POST['fotoasal'];
        $level    = $_POST['level'];
        $foto     = $_FILES['foto']['name'];
        $lokasi   = $_FILES['foto']['tmp_name'];

        if (!empty($lokasi)) {
            // generate nama file
            $ekteksiGambar = explode('.', $foto);
            $ekteksiGambar = strtolower(end($ekteksiGambar));
            $namaFileBaru  = $username . "_" . uniqid() . '.' . $ekteksiGambar;
            $upload        = move_uploaded_file($lokasi, "images/user_profile/" . $namaFileBaru);

            // hapus file yang sudah ada
            if (file_exists("images/user_profile/$fotoasal")) {
                unlink("images/user_profile/$fotoasal");
            }
            $sql = $koneksi->query("update  tb_user set username='$username', password='$pass', nama='$nama', foto='$namaFileBaru', id_level='$level' where id='$id'");
            if ($sql) {
                setAlert('<strong>Berhasil..! </strong>Data berhasil diubah..', 'success');
                echo '<script type = "text/javascript">window.location.href = "' . $_baseurl . '";</script>';
            } else {
                setAlert('<strong>Gagal..! </strong>Data gagal diubah..', 'success');
                echo '<script type = "text/javascript">window.location.href = "' . $_baseurl . '";</script>';
            }
        } else {
            $sql = $koneksi->query("update  tb_user set username='$username', password='$pass', nama='$nama', id_level='$level' where id='$id'");
            if ($sql) {
                setAlert('<strong>Berhasil..! </strong>Data berhasil diubah..', 'success');
                echo '<script type = "text/javascript">window.location.href = "' . $_baseurl . '";</script>';
            } else {
                setAlert('<strong>Gagal..! </strong>Data gagal diubah..', 'success');
                echo '<script type = "text/javascript">window.location.href = "' . $_baseurl . '";</script>';
            }
        }
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
                                        <input class="form-control" name="nama" id="nama" value="<?php echo $data['nama']; ?>" />
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
                                        <input class="form-control" name="username" type="text" id="username" value="<?php echo $data['username']; ?>" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input class="form-control" name="pass" type="password" id="pass" value="<?php echo $data['password']; ?>" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Foto</label>
                                        <label><img src='images/user_profile/<?php echo $data['foto']; ?>' width="100" height="75"></label>
                                        <input type="text" value="<?= $data['foto']; ?>" name="fotoasal" hidden="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Ganti Foto </label>
                                        <input type="file" name="foto" id="foto" accept="image/*" />
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