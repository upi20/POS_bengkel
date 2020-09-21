<?php
$nomor = 1;
$datas = query("SELECT * FROM `tb_barang_data` INNER JOIN `tb_barang_kategori` ON `tb_barang_data`.`id_barang_kategori` = `tb_barang_kategori`.`id_barang_kategori`");
?>
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
                                <th style="text-align: center;">No</th>
                                <th style="text-align: center;">Nama barang</th>
                                <th style="text-align: center;">Harga beli</th>
                                <th style="text-align: center;">Harga jual</th>
                                <th style="text-align: center;">Stok</th>
                                <th style="text-align: center;">Gambar</th>
                                <th style="text-align: center;">Kategori</th>
                                <th style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($datas) :
                                foreach ($datas as $data) : ?>
                                    <tr>
                                        <td style="white-space: nowrap;"><?php echo $nomor++; ?></td>
                                        <td style="white-space: nowrap;"><?php echo $data['barang_data_nama']; ?></td>
                                        <td style="white-space: nowrap; text-align:right;">Rp. <?php echo number_format($data['barang_data_harga_beli'], 0, ',', '.'); ?></td>
                                        <td style="white-space: nowrap; text-align:right;">Rp. <?php echo number_format($data['barang_data_harga_jual'], 0, ',', '.'); ?></td>
                                        <td style="white-space: nowrap; text-align:right;"><?php echo getStokBarang($data['id_barang_data']); ?></td>
                                        <td style="white-space: nowrap; text-align:center;"><img style="width: 200px; height: 80px; object-fit:contain;" src="images/master_data_barang/<?php echo $data['barang_data_gambar']; ?>" style="width: 100px;" alt="..." class="img-thumbnail"></td>
                                        <td style="white-space: nowrap;"><?php echo $data['barang_kategori_nama']; ?></td>
                                        <td style="white-space:nowrap;">
                                            <a href="<?= $_baseurl; ?>&aksi=ubah&id=<?php echo $data['id_barang_data']; ?>" class="btn btn-warning"><i class="fa fa-edit"></i> Ubah</a>
                                            <a onclick="return confirm('Anda yakin ingin menghapus?')" href="<?= $_baseurl; ?>&aksi=hapus&id=<?php echo $data['id_barang_data']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
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