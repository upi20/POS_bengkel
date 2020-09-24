<?php
var_dump($_POST);
var_dump("SELECT * FROM `tb_barang_data` INNER JOIN `tb_barang_kategori` ON `tb_barang_data`.`id_barang_kategori` = `tb_barang_kategori`.`id_barang_kategori`");
die;



$nomor = 1;
$datas = query("SELECT * FROM `tb_barang_data` INNER JOIN `tb_barang_kategori` ON `tb_barang_data`.`id_barang_kategori` = `tb_barang_kategori`.`id_barang_kategori`");
?>
<style>
    h3 {
        text-align: center;
        margin: 0;
    }

    table {
        width: 100%;
        font: 11pt "Tahoma", "Helvetica";
    }
</style>

<h3>Lapora Semua Barang Per Tanggal</h3>
<table>
    <thead>
        <tr>
            <th style="text-align: center;">No</th>
            <th style="text-align: center;">Nama barang</th>
            <th style="text-align: center;">Harga beli</th>
            <th style="text-align: center;">Harga jual</th>
            <th style="text-align: center;">Stok</th>
            <th style="text-align: center;">Gambar</th>
            <th style="text-align: center;">Kategori</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($datas) : ?>
            <?php foreach ($datas as $data) : ?>
                <tr>
                    <td style="white-space: nowrap; text-align: center;"><?php echo $nomor++; ?></td>
                    <td style="white-space: nowrap;"><?php echo $data['barang_data_nama']; ?></td>
                    <td style="white-space: nowrap; text-align:right;">Rp. <?php echo number_format($data['barang_data_harga_beli'], 0, ',', '.'); ?></td>
                    <td style="white-space: nowrap; text-align:right;">Rp. <?php echo number_format($data['barang_data_harga_jual'], 0, ',', '.'); ?></td>
                    <td style="white-space: nowrap; text-align:right;"><?php echo getStokBarang($data['id_barang_data']); ?></td>
                    <td style="white-space: nowrap; text-align:center;"><img style="width: 80px; height: 80px; object-fit:contain;" src="../../images/master_data_barang/<?php echo $data['barang_data_gambar']; ?>" style="width: 100px;" alt="..." class="img-thumbnail"></td>
                    <td style="white-space: nowrap;"><?php echo $data['barang_kategori_nama']; ?></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>