<?php
$id_level = 0;
$level_title = "";
if (isset($_GET['id'])) {
    $id_level = $_GET['id'];

    // mengambil judul level
    $level_title = query("SELECT `title` FROM `tb_user_level` WHERE `id_level` = '$id_level'");

    // mengambil data untuk hak akses menu
    $menu_akses = query("SELECT * FROM `tb_user_menu`");

    // mengambil data untuk hak akses sub menu
    $sub_menu_akses = [];

    for ($i = 0; $i < count($menu_akses); $i++) {
        $menu_id = $menu_akses[$i]['user_menu_id'];
        $result = query("SELECT 'id' FROM `tb_user_access_menu` WHERE `tb_user_access_menu`.`menu_id` = '$menu_id' AND `tb_user_access_menu`.`id_user_level` = '$id_level'");
        if ($result) {
            $menu_akses[$i]['akses'] = true;
            $temp = query("SELECT * FROM `tb_user_sub_menu` WHERE `tb_user_sub_menu`.`menu_id`='$menu_id'");
            foreach ($temp as $t) {
                $sub_menu_akses[] = $t;
            }
        } else $menu_akses[$i]['akses'] = false;
    }

    for ($i = 0; $i < count($sub_menu_akses); $i++) {
        $sub_menu_id = $sub_menu_akses[$i]['id'];
        $result = query("SELECT 'id' FROM `tb_user_access_sub_menu` WHERE `tb_user_access_sub_menu`.`sub_menu_id` = '$sub_menu_id' AND `tb_user_access_sub_menu`.`id_user_level` = '$id_level'");
        if ($result) $sub_menu_akses[$i]['akses'] = true;
        else $sub_menu_akses[$i]['akses'] = false;
    }
} else {
    setAlert('<strong>Galat..! </strong>Tidak ada id yang dikirimkan..', 'danger');
    echo '
    <script type = "text/javascript">
        window.location.href = "' . $_baseurl . '";
    </script>
    ';
}

?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Manajemen Hak Akses Menu
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="container-fluid">
                            <h3>Hak Akses Menu level <?= $level_title[0]['title']; ?></h3>
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
                                                <th style="text-align:center;">Nama Menu</th>
                                                <th style="text-align:center;" width="120px;">Hak Akses</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $nomor = 0;
                                            foreach ($menu_akses as $menu) : ?>
                                                <tr>
                                                    <td style="text-align:center;"><?= ++$nomor; ?></td>
                                                    <td><?= $menu['menu_title']; ?></td>
                                                    <?php if ($menu['akses']) : ?>
                                                        <td style="text-align:center;"><input type="checkbox" checked="" onchange="gantiHakAksesMenu('<?= $menu['user_menu_id']; ?>', '<?= $id_level; ?>', 1)"></td>
                                                    <?php else : ?>
                                                        <td style="text-align:center;"><input type="checkbox" onchange="gantiHakAksesMenu('<?= $menu['user_menu_id']; ?>', '<?= $id_level; ?>', 0)"></td>
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
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Manajemen Hak Akses SubMenu
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="container-fluid">
                            <h3>Hak Akses SubMenu level <?= $level_title[0]['title']; ?></h3>
                            <br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="container-fluid">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-submenu">
                                        <thead>
                                            <tr>
                                                <th style="text-align:center;" width="25px">No</th>
                                                <th style="text-align:center;">Nama SubMenu</th>
                                                <th style="text-align:center;" width="120px;">Hak Akses</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $nomor = 0;
                                            foreach ($sub_menu_akses as $sub_menu) : ?>
                                                <tr>
                                                    <td style="text-align:center;">
                                                        <?php echo ++$nomor; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $sub_menu['title']; ?>
                                                    </td>
                                                    <?php if ($sub_menu['akses']) : ?>
                                                        <td style="text-align:center;"><input type="checkbox" checked="" onchange="gantiHakAksesSubMenu('<?= $sub_menu['id']; ?>', '<?= $id_level; ?>', 1)"></td>
                                                    <?php else : ?>
                                                        <td style="text-align:center;"><input type="checkbox" onchange="gantiHakAksesSubMenu('<?= $sub_menu['id']; ?>', '<?= $id_level; ?>', 0)"></td>
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
        </div>
    </div>
</div>



<script>
    function gantiHakAksesMenu(id_menu, id_level, status) {
        window.location.href = `<?= $_baseurl; ?>&aksi=gantiakses&id_level=${id_level}&id_menu=${id_menu}&status=${status}&menu=menu`;
    }

    function gantiHakAksesSubMenu(id_menu, id_level, status) {
        window.location.href = `<?= $_baseurl; ?>&aksi=gantiakses&id_level=${id_level}&id_menu=${id_menu}&status=${status}&menu=submenu`;
    }

    $(document).ready(function() {
        $('#dataTables-submenu').dataTable();
    });
</script>