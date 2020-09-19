<?php
$user_level = query("SELECT * FROM `tb_user_level`");
?>
<div class="panel panel-default">
    <div class="panel-heading">
        Level
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col">
                <div class="container-fluid">
                    <div class="table-responsive">
                        <div>
                            <a href="<?= $_baseurl; ?>&aksi=tambah" class="btn btn-success" style="margin-top:  8px;"><i class="fa fa-plus"></i> Tambah Data</a>
                        </div><br>
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
                                        <td style="white-space:nowrap;">
                                            <a href="<?= $_baseurl; ?>&aksi=ubah&id=<?php echo $u_level['id_level']; ?>" class="btn btn-warning"><i class="fa fa-edit"></i> Ubah</a>
                                            <a onclick="return confirm('Anda yakin ingin menghapus?')" href="<?= $_baseurl; ?>&aksi=hapus&id=<?php echo $u_level['id_level']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
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