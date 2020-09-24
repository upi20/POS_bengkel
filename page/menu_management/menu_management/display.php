<div class="panel panel-default">
    <div class="panel-heading">
        Menu Manajemen
    </div>
    <div class="panel-body">
        <?php if ($_settingDetail['pengembangan']['pengaturan_nilai']) : ?>
            <div class="row">
                <div class="container-fluid">
                    <div class="col"><a href="<?= $_baseurl; ?>&aksi=tambah" class="btn btn-success" style="margin-top: 8px;"><i class="fa fa-plus"></i> Tambah Data</a></div>
                    <br>
                </div>
            </div>
        <?php endif; ?>
        <div class="row">
            <div class="col">
                <div class="container-fluid">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th width="25px">No</th>
                                    <th>Nama</th>
                                    <th>Url</th>
                                    <th>Icon</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $nomor = 0;
                                $data = query("SELECT * FROM tb_user_menu ORDER BY user_menu_id DESC");
                                if ($data) :
                                    foreach ($data as $d) : ?>
                                        <tr>
                                            <td style="white-space: nowrap;"><?= ++$nomor; ?></td>
                                            <td style="white-space: nowrap;"><?= $d['menu_title']; ?></td>
                                            <td style="white-space: nowrap;"><?= $d['menu_url']; ?></td>
                                            <td style="white-space: nowrap;"><?= $d['icon']; ?></td>
                                            <td style="white-space: nowrap;">
                                                <a href="<?= $_baseurl; ?>&aksi=hakakses&id=<?= $d['user_menu_id']; ?>" class="btn btn-primary"><i class="fa fa-folder"></i> Hak Akses</a>
                                                <?php if ($_settingDetail['pengembangan']['pengaturan_nilai']) : ?>
                                                    <a href="<?= $_baseurl; ?>&aksi=ubah&id=<?= $d['user_menu_id']; ?>" class="btn btn-warning"><i class="fa fa-edit"></i> Ubah</a>
                                                    <a onclick="return confirm('Anda yakin ingin menghapus?')" href="<?= $_baseurl; ?>&aksi=hapus&id=<?= $d['user_menu_id']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                <?php endforeach;
                                endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>