<?php
$user_level = query("SELECT * FROM `tb_user_level`");
?>
<div class="panel panel-default">
    <div class="panel-heading">
        Hak Akses Manajemen
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col">
                <div class="container-fluid">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th style="text-align:center;" width="25px">No</th>
                                    <th style="text-align:center;">Nama Level</th>
                                    <th style="text-align:center;" width="120px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $nomor = 0;
                                foreach ($user_level as $u_level) : ?>
                                    <tr>
                                        <td style="text-align:center;">
                                            <?php echo ++$nomor; ?>
                                        </td>
                                        <td>
                                            <?php echo $u_level['title']; ?>
                                        </td>
                                        <td>
                                            <a href="<?= $_baseurl; ?>&aksi=hakakses&id=<?= $u_level['id_level']; ?>" class="btn btn-primary"><i class="fa fa-folder"></i> Hak Akses</a>
                                        </td>
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