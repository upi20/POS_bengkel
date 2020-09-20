<div class="panel panel-default">
    <div class="panel-heading">
        Data Kategori
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="container-fluid">
                <a href="<?= $_baseurl; ?>&aksi=tambah" class="btn btn-success" style="margin-top:  8px;"><i class="fa fa-plus"></i> Tambah Data</a>
                <br>
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
                                    <th style="text-align:center;">Data kategori barang</th>
                                    <th style="text-align:center;" width="230px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $datas = query("select * from tb_barang_kategori");
                                foreach ($datas as $data) {
                                ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $data['kategori']; ?></td>
                                        <td style="white-space:nowrap">
                                            <a href="<?= $_baseurl; ?>&aksi=ubah&id_kategori=<?= $data['id_kategori']; ?>" class="btn btn-warning"><i class="fa fa-edit"></i> Ubah</a>
                                            <a onclick="return confirm('Anda yakin ingin menghapus?')" href="<?= $_baseurl; ?>&aksi=hapus&id_kategori=<?= $data['id_kategori']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                                        </td>
                                    </tr>
                                <?php  } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>