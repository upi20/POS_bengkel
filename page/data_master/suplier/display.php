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
                                <th style="text-align:center;">No</th>
                                <th style="text-align:center;">Kode</th>
                                <th style="text-align:center;">NIK</th>
                                <th style="text-align:center;">Nama</th>
                                <th style="text-align:center;">No Telepon</th>
                                <th style="text-align:center;">Merek Mobil</th>
                                <th style="text-align:center;">Warna Mobil</th>
                                <th style="text-align:center;">Tgl Daftar</th>
                                <th style="text-align:center;">Alamat</th>
                                <th style="text-align:center;" width="200px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $datas = query("SELECT * FROM tb_barang_konsumen");
                            if ($datas) :
                                $no = 1;
                                foreach ($datas as $data) : ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $data['barang_konsumen_kode']; ?></td>
                                        <td><?php echo $data['barang_konsumen_nik']; ?></td>
                                        <td style="white-space: nowrap"><?php echo $data['barang_konsumen_nama']; ?></td>
                                        <td><?php echo $data['barang_konsumen_no_telepon']; ?></td>
                                        <td><?php echo $data['barang_konsumen_merk_mobil']; ?></td>
                                        <td><?php echo $data['barang_konsumen_warna_mobil']; ?></td>
                                        <td><?php echo $data['barang_konsumen_tanggal_daftar']; ?></td>
                                        <td><?php echo $data['barang_konsumen_alamat']; ?></td>
                                        <td style="white-space: nowrap">
                                            <a href="<?= $_baseurl; ?>&aksi=ubah&id_konsumen=<?php echo $data['id_barang_konsumen']; ?>" class="btn btn-warning"><i class="fa fa-edit"></i> Ubah</a>
                                            <a onclick="return confirm('Anda yakin ingin menghapus?')" href="<?= $_baseurl; ?>&&aksi=hapus&id_konsumen=<?php echo $data['id_barang_konsumen']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
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