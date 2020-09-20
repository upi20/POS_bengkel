<?php
$id_menu = 0;
if (isset($_GET['id'])) {
    $id_menu = $_GET['id'];
    // mengambil data untuk judul
    $menu_title = query("SELECT `menu_title` FROM `tb_user_menu` WHERE `user_menu_id`='$id_menu'");

    // mengambil data untuk hak akses
    $user_level = query("SELECT * FROM `tb_user_level`");
    for ($i = 0; $i < count($user_level); $i++) {
        $user_level_id = $user_level[$i]['id_level'];
        $result = query("SELECT 'id' FROM tb_user_menu_access WHERE tb_user_menu_access.menu_id = '$id_menu' AND tb_user_menu_access.id_user_level = '$user_level_id'");
        if ($result) $user_level[$i]['akses'] = true;
        else $user_level[$i]['akses'] = false;;
    }
} else {
    setAlert('Fatal..! ', 'Tidak ada id yang dikirimkan..', 'danger');
    echo '
    <script type = "text/javascript">
        window.location.href = "' . $_baseurl . '";
    </script>
    ';
}

?>
<div class="panel panel-default">
    <div class="panel-heading">
        Hak Akses Menu Manajemen
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="container-fluid">
                <h3>Hak Akses Menu <?= $menu_title[0]['menu_title']; ?></h3>
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="container-fluid">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th style="text-align:center;" width="25px">No</th>
                                    <th style="text-align:center;">Nama Level</th>
                                    <th style="text-align:center;" width="120px;">Hak Akses</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $nomor = 0;
                                foreach ($user_level as $u_level) : ?>
                                    <tr>
                                        <td style="text-align:center;"><?= ++$nomor; ?></td>
                                        <td><?= $u_level['title']; ?></td>
                                        <?php if ($u_level['akses']) : ?>
                                            <td style="text-align:center;"><input type="checkbox" checked="" onchange="gantiHakAkses('<?= $u_level['id_level']; ?>', '<?= $id_menu; ?>', 1)"></td>
                                        <?php else : ?>
                                            <td style="text-align:center;"><input type="checkbox" onchange="gantiHakAkses('<?= $u_level['id_level']; ?>', '<?= $id_menu; ?>', 0)"></td>
                                        <?php endif; ?>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function gantiHakAkses(id_level, id_menu, status) {
        window.location.href = `<?= $_baseurl; ?>&aksi=gantiakses&id_level=${id_level}&id_menu=${id_menu}&status=${status}`;
    }
</script>