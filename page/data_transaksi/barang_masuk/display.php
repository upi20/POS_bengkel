<?php
$datas = query("SELECT * FROM tb_barang_masuk 
                JOIN
                tb_barang_data
                ON tb_barang_masuk.id_barang_data = tb_barang_data.id_barang_data
                JOIN
                tb_barang_suplier
                ON tb_barang_masuk.id_barang_suplier = tb_barang_suplier.id_barang_suplier");
$nomor = 0;
?>
<div class="panel panel-default">
    <div class="panel-heading">
        Data Transaksi Pengadaan Barang
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
                                    <th style="text-align:center;" width="25px">No</th>
                                    <th style="text-align:center;">Suplier</th>
                                    <th style="text-align:center;">Barang</th>
                                    <th style="text-align:center;">Qty</th>
                                    <th style="text-align:center;">Harga</th>
                                    <th style="text-align:center;">Total harga</th>
                                    <th style="text-align:center;">Tanggal</th>
                                    <th style="text-align:center;">Aksi</th>
                                </tr>
                            </thead>
                            <?php
                            if ($datas) {
                                foreach ($datas as $data) {
                            ?>
                                    <tr>
                                        <td><?php echo ++$nomor; ?></td>
                                        <td><?php echo $data['barang_suplier_nama']; ?></td>
                                        <td><?php echo $data['barang_data_nama']; ?></td>
                                        <td style="text-align:right"><?php echo $data['barang_masuk_jumlah']; ?></td>
                                        <td style="text-align:right"><?php echo 'Rp. ' . number_format($data['barang_masuk_harga'], 0, ',', '.'); ?></td>
                                        <td style="text-align:right"><?php echo 'Rp. ' . number_format($data['barang_masuk_harga'] * $data['barang_masuk_jumlah'], 0, ',', '.'); ?></td>
                                        <td><?php echo $data['barang_masuk_tanggal']; ?></td>
                                        <td>

                                        </td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>