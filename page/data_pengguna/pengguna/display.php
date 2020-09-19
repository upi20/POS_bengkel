<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Data Pengguna
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <div>
                        <a href="<?= $_baseurl; ?>&aksi=tambah" class="btn btn-success" style="margin-top: 8px;"><i class="fa fa-plus"></i> Tambah Data</a>
                    </div><br>
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th style="text-align:center;" width="25px;">No</th>
                                <th style="text-align:center;">Nama Lengkap</th>
                                <th style="text-align:center;">Username</th>
                                <th style="text-align:center;">Password</th>
                                <th style="text-align:center;">Level</th>
                                <th style="text-align:center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $sql = $koneksi->query("SELECT * FROM tb_user INNER JOIN tb_user_level ON tb_user.id_level = tb_user_level.id_level");
                            while ($data = $sql->fetch_assoc()) {
                            ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $data['nama']; ?></td>
                                    <td><?php echo $data['username']; ?></td>
                                    <td><?php echo $data['password']; ?></td>
                                    <td><?php echo $data['title']; ?></td>
                                    <td style="white-space:nowrap;">
                                        <a href="<?= $_baseurl; ?>&aksi=ubah&id_user=<?php echo $data['id']; ?>" class="btn btn-warning"><i class="fa fa-edit"></i> Ubah</a>
                                        <a onclick="return confirm('Anda yakin ingin menghapus?')" href="<?= $_baseurl; ?>&aksi=hapus&id=<?php echo $data['id']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>

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