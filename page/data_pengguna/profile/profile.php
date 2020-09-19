<?php
if (isset($_SESSION['user']['id'])) {
    $id   = $_SESSION['user']['id'];
    $sql  = $koneksi->query("SELECT * FROM tb_user INNER JOIN tb_user_level ON tb_user.id_level = tb_user_level.id_level WHERE tb_user.id='$id'");
    $data = $sql->fetch_assoc();
    if (isset($_POST['simpan'])) {
        $username = $_POST['username'];
        $pass     = $_POST['pass'];
        $nama     = $_POST['nama'];
        $fotoasal = $_POST['fotoasal'];
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
            $sql = $koneksi->query("update  tb_user set username='$username', password='$pass', nama='$nama', foto='$namaFileBaru' where id='$id'");
            if ($sql) {
                setAlert('<strong>Berhasil..! </strong>Data berhasil diubah..', 'success');
                echo '<script type = "text/javascript">window.location.href = "' . $_baseurl . '";</script>';
            } else {
                setAlert('<strong>Gagal..! </strong>Data gagal diubah..', 'success');
                echo '<script type = "text/javascript">window.location.href = "' . $_baseurl . '";</script>';
            }
        } else {
            $sql = $koneksi->query("update  tb_user set username='$username', password='$pass', nama='$nama' where id='$id'");
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
                                        <label>Level Akses</label>
                                        <input class="form-control" name="level" id="pass" value="<?php echo $data['title']; ?>" readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input class="form-control" name="username" value="<?php echo $data['username']; ?>" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input class="form-control" name="pass" type="Password" id="pass" value="<?php echo $data['password']; ?>" />
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