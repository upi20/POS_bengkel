<div class="panel panel-default">
    <div class="panel-heading">
        Data Transaksi
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
                                    <th style="text-align:center;">Konsumen</th>
                                    <th style="text-align:center;">Kode transaksi</th>
                                    <th style="text-align:center;">Kode barang</th>
                                    <th style="text-align:center;">Barang</th>
                                    <th style="text-align:center;">Qty</th>
                                    <th style="text-align:center;">Harga</th>
                                    <th style="text-align:center;">Total harga</th>
                                    <th style="text-align:center;">Tanggal</th>
                                    <th style="text-align:center;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $data = query("SELECT * FROM tb_transaksi");
                                if ($data) :
                                    $nomor = 0;
                                    foreach ($data as $d) : ?>
                                        <tr>
                                            <td style="white-space: nowrap; text-align:center;"><?= ++$nomor; ?></td>
                                            <td style="white-space: nowrap; text-align:left;"><?= $d['konsumen'];; ?></td>
                                            <td style="white-space: nowrap; text-align:left;"><?= $d['kode_transaksi']; ?></td>
                                            <td style="white-space: nowrap; text-align:left;"><?= $d['kode_barang']; ?></td>
                                            <td style="white-space: nowrap; text-align:left;"><?= $d['barang']; ?></td>
                                            <td style="white-space: nowrap; text-align:right;"><?= $d['Qty']; ?></td>
                                            <td style="white-space: nowrap; text-align:right;">Rp. <?= number_format($d['Harga'], 0, ',', '.'); ?></td>
                                            <td style="white-space: nowrap; text-align:right;">Rp. <?= number_format($d['total_harga'], 0, ',', '.'); ?></td>
                                            <td style="white-space: nowrap; text-align:left;"><?= $d['tgl']; ?></td>
                                            <td style="white-space: nowrap; text-align:center;">
                                                <a href="<?= $_baseurl; ?>&aksi=ubah&id=<?= $d['no']; ?>" class="btn btn-info"><i class="fa fa-edit"></i> ubah</a>
                                                <a onclick="return confirm('Anda yakin ingin menghapus?')" href="<?= $_baseurl; ?>&aksi=hapus&id=<?php echo $d['no']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i> hapus</a>
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