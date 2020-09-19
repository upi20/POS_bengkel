<?php
$querybuilder = "SELECT * FROM
                tb_user_sub_menu 
                INNER JOIN tb_user_menu 
                ON tb_user_sub_menu.menu_id = tb_user_menu.user_menu_id";
$data = query($querybuilder);
?>
<div class="panel panel-default">
    <div class="panel-heading">
        SubMenu Manajement
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="container-fluid">
                <div class="col"><a href="<?= $_baseurl; ?>&aksi=tambah" class="btn btn-success" style="margin-top: 8px;"><i class="fa fa-plus"></i> Tambah Data</a></div>
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
                                    <th style="text-align:center" width="25px">No</th>
                                    <th style="text-align:center">Nama</th>
                                    <th style="text-align:center">Menu</th>
                                    <th style="text-align:center">Url</th>
                                    <!-- <th style="text-align:center">file</th> -->
                                    <th style="text-align:center" width="200px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $nomor = 0;
                                foreach ($data as $d) : ?>
                                    <tr>
                                        <td><?= ++$nomor; ?></td>
                                        <td style="white-space:nowrap"><?= $d['title']; ?></td>
                                        <td style="white-space:nowrap"><?= $d['menu_title']; ?></td>
                                        <td style="white-space:nowrap"><?= $d['sub_menu_url']; ?></td>
                                        <!-- <td style="white-space:nowrap"><?= $d['file']; ?></td> -->
                                        <td style="white-space:nowrap">
                                            <a href="<?= $_baseurl; ?>&aksi=hakakses&id=<?= $d['id']; ?>" class="btn btn-primary"><i class="fa fa-folder"></i> Hak Akses</a>
                                            <a href="<?= $_baseurl; ?>&aksi=ubah&id=<?= $d['id']; ?>" class="btn btn-warning"><i class="fa fa-edit"></i> Ubah</a>
                                            <a onclick="return confirm('Anda yakin ingin menghapus?')" href="<?= $_baseurl; ?>&aksi=hapus&id=<?= $d['id']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
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