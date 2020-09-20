<?php
if (isset($_GET['id_level']) && isset($_GET['id_menu']) && isset($_GET['status']) && isset($_GET['menu'])) {
    $status   = $_GET['status'];
    $id_menu  = $_GET['id_menu'];
    $id_level = $_GET['id_level'];
    $menu     = $_GET['menu'];

    if ($menu == "menu") {
        if ($status) {
            // menghapus akses
            $sql  = $koneksi->query("DELETE FROM `tb_user_menu_access` WHERE `tb_user_menu_access`.`menu_id` = '$id_menu' AND `tb_user_menu_access`.`id_user_level` = '$id_level'");
            if ($sql) {
                setAlert('Berhasil..! ', 'Data berhasil diubah..', 'success');
                echo '
                <script type = "text/javascript">
                    window.location.href = "' . $_baseurl . '&aksi=hakakses&id=' . $id_level . '";
                </script>
                ';
            } else {
                setAlert('Gagal..! ', 'Data gagal diubah..', 'danger');
                echo '
                <script type = "text/javascript">
                    window.location.href = "' . $_baseurl . '&aksi=hakakses&id=' . $id_level . '";
                </script>
                ';
            }
        } else {
            // menambah akses
            $sql  = $koneksi->query("INSERT INTO `tb_user_menu_access` (`id`, `menu_id`, `id_user_level`) VALUES (NULL, '$id_menu', '$id_level')");
            if ($sql) {
                setAlert('Berhasil..! ', 'Data berhasil diubah..', 'success');
                echo '
                <script type = "text/javascript">
                    window.location.href = "' . $_baseurl . '&aksi=hakakses&id=' . $id_level . '";
                </script>
                ';
            } else {
                setAlert('Gagal..! ', 'Data gagal diubah..', 'danger');
                echo '
                <script type = "text/javascript">
                    window.location.href = "' . $_baseurl . '&aksi=hakakses&id=' . $id_level . '";
                </script>
                ';
            }
        }
    } else if ($menu == "submenu") {
        if ($status) {
            // menghapus akses
            $sql = $koneksi->query("DELETE FROM `tb_user_sub_menu_access` WHERE `tb_user_sub_menu_access`.`sub_menu_id` = '$id_menu' AND `tb_user_sub_menu_access`.`id_user_level` = '$id_level'");
            if ($sql) {
                setAlert('Berhasil..! ', 'Data berhasil diubah..', 'success');
                echo '
            <script type = "text/javascript">
                window.location.href = "' . $_baseurl . '&aksi=hakakses&id=' . $id_level . '";
            </script>
            ';
            } else {
                setAlert('Gagal..! ', 'Data gagal diubah..', 'danger');
                echo '
            <script type = "text/javascript">
                window.location.href = "' . $_baseurl . '&aksi=hakakses&id=' . $id_level . '";
            </script>
            ';
            }
        } else {
            // menambah akses
            $sql = $koneksi->query("INSERT INTO `tb_user_sub_menu_access` (`id`, `sub_menu_id`, `id_user_level`) VALUES (NULL, '$id_menu', '$id_level')");
            if ($sql) {
                setAlert('Berhasil..! ', 'Data berhasil diubah..', 'success');
                echo '
            <script type = "text/javascript">
                window.location.href = "' . $_baseurl . '&aksi=hakakses&id=' . $id_level . '";
            </script>
            ';
            } else {
                setAlert('Gagal..! ', 'Data gagal diubah..', 'danger');
                echo '
            <script type = "text/javascript">
                window.location.href = "' . $_baseurl . '&aksi=hakakses&id=' . $id_level . '";
            </script>
            ';
            }
        }
    } else {
        setAlert('Gagal..! ', 'Data gagal ditambahkan..', 'danger');
        echo '<script type = "text/javascript">window.location.href = "' . $_baseurl . '";</script>';
    }
} else {
    setAlert('Gagal..! ', 'Data gagal ditambahkan..', 'danger');
    echo '
    <script type = "text/javascript">
        window.location.href = "' . $_baseurl . '";
    </script>
    ';
}
