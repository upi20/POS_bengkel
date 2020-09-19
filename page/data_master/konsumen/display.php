<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Data konsumen
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <div>
                        <a href="<?= $_baseurl; ?>&aksi=tambah" class="btn btn-success" style="margin-top:  8px;"><i class="fa fa-plus"></i> Tambah Data</a>
                    </div><br>
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>id_konsumen</th>
                                <th>kode_konsumen</th>
                                <th>nik</th>
                                <th>nama</th>
                                <th>hp</th>
                                <th>bg_mobil</th>
                                <th>merk_mobil</th>
                                <th>warna_mobil</th>
                                <th>tgl_daftar</th>
                                <th>alamat</th>
                                <th width="19%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            $no = 1;

                            $sql = $koneksi->query("select * from tb_konsumen");

                            while ($data = $sql->fetch_assoc()) {

                            ?>

                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $data['kode_konsumen']; ?></td>
                                    <td><?php echo $data['nik']; ?></td>
                                    <td><?php echo $data['nama']; ?></td>
                                    <td><?php echo $data['hp']; ?></td>
                                    <td><?php echo $data['bg_mobil']; ?></td>
                                    <td><?php echo $data['merk_mobil']; ?></td>
                                    <td><?php echo $data['warna_mobil']; ?></td>
                                    <td><?php echo $data['tgl_daftar']; ?></td>
                                    <td><?php echo $data['alamat']; ?></td>
                                    <td>
                                        <a href="<?= $_baseurl; ?>&aksi=ubah&id_konsumen=<?php echo $data['id_konsumen']; ?>" class="btn btn-warning"><i class="fa fa-edit"></i> Ubah</a>
                                        <a onclick="return confirm('Anda yakin ingin menghapus?')" href="<?= $_baseurl; ?>&&aksi=hapus&id_konsumen=<?php echo $data['id_konsumen']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>

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