<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Data barang
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <div>
                        <a href="<?= $_baseurl; ?>&aksi=tambah" class="btn btn-success" style="margin-top:  8px;"><i class="fa fa-plus"></i> Tambah Data</a>
                    </div><br>
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th style="text-align: center;">NO</th>
                                <th style="text-align: center;">NAMA BARANG</th>
                                <th style="text-align: center;">KODE BARANG</th>
                                <th style="text-align: center;">HARGA BELI</th>
                                <th style="text-align: center;">HARGA JUAL</th>
                                <th style="text-align: center;">GAMBAR</th>
                                <th style="text-align: center;">STOK</th>
                                <th style="text-align: center;">KATEGORI</th>
                                <th style="text-align: center;">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $sql = $koneksi->query("SELECT * FROM tb_barang INNER JOIN tb_kategori ON tb_barang.id_kategori = tb_kategori.id_kategori");
                            while ($data = $sql->fetch_assoc()) {
                            ?>
                                <tr>
                                    <td style="white-space: nowrap;"><?php echo $no++; ?></td>
                                    <td style="white-space: nowrap;"><?php echo $data['nama_barang']; ?></td>
                                    <td style="white-space: nowrap;"><?php echo $data['kode_barang']; ?></td>
                                    <td style="white-space: nowrap; text-align:right;">Rp. <?= number_format($data['harga_beli'], 0, ',', '.'); ?></td>
                                    <td style="white-space: nowrap; text-align:right;">Rp. <?= number_format($data['harga_jual'], 0, ',', '.'); ?></td>
                                    <td style="white-space: nowrap; text-align:center;"><img style="width: 200px; height: 80px; object-fit:contain;" src="images/master_data_barang/<?php echo $data['gambar']; ?>" style="width: 100px;" alt="..." class="img-thumbnail"></td>
                                    <td style="white-space: nowrap; text-align:right;"><?php echo $data['stok']; ?></td>
                                    <td style="white-space: nowrap;"><?php echo $data['kategori']; ?></td>
                                    <td style="white-space:nowrap;">
                                        <a href="<?= $_baseurl; ?>&aksi=ubah&id_barang=<?php echo $data['id_barang']; ?>" class="btn btn-warning"><i class="fa fa-edit"></i> Ubah</a>
                                        <a onclick="return confirm('Anda yakin ingin menghapus?')" href="<?= $_baseurl; ?>&aksi=hapus&id_barang=<?php echo $data['id_barang']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
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