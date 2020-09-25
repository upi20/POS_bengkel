<?php
$qselect = "";
$qjoin = "";
$qwhere = "";
$title_laporan = "";

if (isset($_POST['cetak'])) {
    if (isset($_POST['tabel_all'])) {
        $qselect = '*';
        $qjoin .= " INNER JOIN `tb_barang_kategori` ON `tb_barang_data`.`id_barang_kategori` = `tb_barang_kategori`.`id_barang_kategori` ";
    } else {
        $qselect .= "`id_barang_data`";
        if (isset($_POST['tabel_nama'])) $qselect .= ",`barang_data_nama`";
        if (isset($_POST['tabel_harga_beli'])) $qselect .= ",`barang_data_harga_beli`";
        if (isset($_POST['tabel_harga_jual'])) $qselect .= ",`barang_data_harga_jual`";
        if (isset($_POST['tabel_gambar'])) $qselect .= ",`barang_data_gambar`";
        if (isset($_POST['tabel_tanggal'])) $qselect .= ",`barang_data_tanggal`";
        if (isset($_POST['tabel_kategori'])) {
            $qselect .= ",`tb_barang_data`.`id_barang_kategori`, `tb_barang_kategori`.`id_barang_kategori`, `tb_barang_kategori`.`barang_kategori_nama`";
            $qjoin .= " INNER JOIN `tb_barang_kategori` ON `tb_barang_data`.`id_barang_kategori` = `tb_barang_kategori`.`id_barang_kategori` ";
        }
    }

    if (!isset($_POST['kategori_all'])) {
        $querykategori = query('SELECT * FROM tb_barang_kategori');
        if ($querykategori) {
            foreach ($querykategori as $kategori) {
                if (isset($_POST['kategori_' . $kategori['id_barang_kategori']])) {
                    if (!isset($_POST['tanggal_all'])) {
                        if ($qwhere == "") $qwhere .= "WHERE (";
                        else $qwhere .= " OR ";
                    } else {
                        if ($qwhere == "") $qwhere .= "WHERE ";
                        else $qwhere .= " OR ";
                    }
                    if ($title_laporan == "") $title_laporan = "Laporan Barang<br>Kategori: " . $kategori['barang_kategori_nama'];
                    else $title_laporan .= ", " . $kategori['barang_kategori_nama'];

                    $id_kategori = $kategori['id_barang_kategori'];
                    $qwhere .= " `tb_barang_data`.`id_barang_kategori` = '$id_kategori' ";
                }
            }
        }
    }

    if (!isset($_POST['tanggal_all'])) {
        $dari = $_POST['tanggal_dari'];
        $sampai = $_POST['tanggal_sampai'];
        if ($title_laporan == "") $title_laporan = "Laporan Barang<br>Periode: " . $dari . " / " . $sampai;
        else $title_laporan .= "<br>Periode: Dari " . $dari . " / " . $sampai;

        if ($qwhere == "") $qwhere .= "WHERE ";
        else $qwhere .= ") AND ";
        $qselect .= ",`barang_data_tanggal`";
        $qwhere .= " `tb_barang_data`.`barang_data_tanggal` BETWEEN '$dari' AND '$sampai'";
    }
}

$qbuilder = "SELECT " . $qselect . " FROM `tb_barang_data` " . $qjoin . $qwhere;
$nomor = 1;
$datas = query($qbuilder);
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
<?php if (isset($_POST['cetak'])) : ?>
    <?php if ($title_laporan == "") {
        echo '<h3>Lapora Semua Barang</h3>';
    } else {
        echo '<h3>' . $title_laporan . '</h3>';
    } ?>
    <table>
        <thead>
            <tr>
                <th style="text-align: center;">No</th>
                <?php
                if (isset($_POST['tabel_nama'])) echo '<th style="text-align: center;">Nama barang</th>';
                if (isset($_POST['tabel_kategori'])) echo '<th style="text-align: center;">Kategori</th>';
                if (isset($_POST['tabel_tanggal'])) echo '<th style="text-align: center;">Tgl Daftar</th>';
                if (isset($_POST['tabel_stok'])) echo '<th style="text-align: center;">Stok</th>';
                if (isset($_POST['tabel_harga_beli'])) echo '<th style="text-align: center;">Harga beli</th>';
                if (isset($_POST['tabel_harga_jual'])) echo '<th style="text-align: center;">Harga jual</th>';
                if (isset($_POST['tabel_gambar'])) echo '<th style="text-align: center;">Gambar</th>';
                ?>
            </tr>
        </thead>
        <tbody>
            <?php if ($datas) : ?>
                <?php foreach ($datas as $data) : ?>
                    <tr>
                        <td style="text-align: center;"><?php echo $nomor++; ?></td>
                        <?php
                        if (isset($_POST['tabel_nama'])) echo '<td>' . $data["barang_data_nama"] . '</td>';
                        if (isset($_POST['tabel_kategori'])) echo '<td>' . $data["barang_kategori_nama"] . '</td>';
                        if (isset($_POST['tabel_tanggal'])) echo '<td>' . $data["barang_data_tanggal"] . '</td>';
                        if (isset($_POST['tabel_stok'])) echo '<td style="text-align:right;">' . getStokBarang($data["id_barang_data"]) . '</td>';
                        if (isset($_POST['tabel_harga_beli'])) echo '<td style="text-align:right;">Rp. ' . number_format($data["barang_data_harga_beli"], 0, ',', '.') . '</td>';
                        if (isset($_POST['tabel_harga_jual'])) echo '<td style="text-align:right;">Rp. ' . number_format($data["barang_data_harga_jual"], 0, ',', '.') . '</td>';
                        if (isset($_POST['tabel_gambar'])) echo '<td style="text-align:center;"><img style="width: 80px; height: 80px; object-fit:contain;" src="../../images/master_data_barang/' . $data["barang_data_gambar"] . '" style="width: 100px;" alt="..." class="img-thumbnail"></td>';
                        ?>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>

<?php endif; ?>