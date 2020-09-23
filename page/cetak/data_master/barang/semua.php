<?php
if (!isset($_GET['nama']) || !isset($_GET['beli']) || !isset($_GET['jual']) || !isset($_GET['stok']) || !isset($_GET['kategori']) || !isset($_GET['gambar'])) {
    header('Location: ../../index.php');
}

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
            <?php if ($_GET['nama']) : ?>
                <th style="text-align: center;">Nama barang</th>
            <?php endif; ?>
            <?php if ($_GET['beli']) : ?>
                <th style="text-align: center;">Harga beli</th>
            <?php endif; ?>
            <?php if ($_GET['jual']) : ?>
                <th style="text-align: center;">Harga jual</th>
            <?php endif; ?>
            <?php if ($_GET['stok']) : ?>
                <th style="text-align: center;">Stok</th>
            <?php endif; ?>
            <?php if ($_GET['gambar']) : ?>
                <th style="text-align: center;">Gambar</th>
            <?php endif; ?>
            <?php if ($_GET['kategori']) : ?>
                <th style="text-align: center;">Kategori</th>
            <?php endif; ?>
        </tr>
    </thead>
    <tbody>
        <?php if ($datas) :
            foreach ($datas as $data) : ?>
                <tr>
                    <td style="white-space: nowrap; text-align: center;"><?php echo $nomor++; ?></td>
                    <?php if ($_GET['nama']) : ?>
                        <td style="white-space: nowrap;"><?php echo $data['barang_data_nama']; ?></td>
                    <?php endif; ?>
                    <?php if ($_GET['beli']) : ?>
                        <td style="white-space: nowrap; text-align:right;">Rp. <?php echo number_format($data['barang_data_harga_beli'], 0, ',', '.'); ?></td>
                    <?php endif; ?>
                    <?php if ($_GET['jual']) : ?>
                        <td style="white-space: nowrap; text-align:right;">Rp. <?php echo number_format($data['barang_data_harga_jual'], 0, ',', '.'); ?></td>
                    <?php endif; ?>
                    <?php if ($_GET['stok']) : ?>
                        <td style="white-space: nowrap; text-align:right;"><?php echo getStokBarang($data['id_barang_data']); ?></td>
                    <?php endif; ?>
                    <?php if ($_GET['gambar']) : ?>
                        <td style="white-space: nowrap; text-align:center;"><img style="width: 80px; height: 80px; object-fit:contain;" src="../../images/master_data_barang/<?php echo $data['barang_data_gambar']; ?>" style="width: 100px;" alt="..." class="img-thumbnail"></td>
                    <?php endif; ?>
                    <?php if ($_GET['kategori']) : ?>
                        <td style="white-space: nowrap;"><?php echo $data['barang_kategori_nama']; ?></td>
                    <?php endif; ?>
                </tr>
        <?php endforeach;
        endif; ?>
    </tbody>
</table>