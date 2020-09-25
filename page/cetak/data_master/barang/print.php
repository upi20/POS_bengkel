<?php
$joindata        = " INNER JOIN `tb_barang_kategori` ON `tb_barang_data`.`id_barang_kategori` = `tb_barang_kategori`.`id_barang_kategori` ";
$qselect         = "";
$qjoin           = "";
$qwhere          = "";
$title_laporan   = "";
$dnotfoundcount  = 1;
$count           = 0;
$querywhere      = [
    0 => ['val' => '', 'stt' => false, 'judul' => ''],
    1 => ['val' => '', 'stt' => false, 'judul' => '']
];

if (isset($_POST['cetak'])) {
    if (isset($_POST['tabel_all'])) {
        $qselect = '*';
        $qjoin .= $joindata;
        $dnotfoundcount += 6;
    } else {
        $qselect .= "`id_barang_data`";
        if (isset($_POST['tabel_nama'])) {
            $qselect .= ",`barang_data_nama`";
            $dnotfoundcount++;
        }
        if (isset($_POST['tabel_harga_beli'])) {
            $qselect .= ",`barang_data_harga_beli`";
            $dnotfoundcount++;
        }
        if (isset($_POST['tabel_harga_jual'])) {
            $qselect .= ",`barang_data_harga_jual`";
            $dnotfoundcount++;
        }
        if (isset($_POST['tabel_gambar'])) {
            $qselect .= ",`barang_data_gambar`";
            $dnotfoundcount++;
        }
        if (isset($_POST['tabel_tanggal'])) {
            $qselect .= ",`barang_data_tanggal`";
            $dnotfoundcount++;
        }
        if (isset($_POST['tabel_kategori'])) {
            $qselect .= ",`tb_barang_data`.`id_barang_kategori`, `tb_barang_kategori`.`id_barang_kategori`, `tb_barang_kategori`.`barang_kategori_nama`";
            $qjoin .= $joindata;
            $dnotfoundcount++;
        }
    }

    if (!isset($_POST['kategori_all'])) {
        $querykategori = query('SELECT * FROM tb_barang_kategori');
        if ($querykategori) {
            foreach ($querykategori as $kategori) {
                if (isset($_POST['kategori_' . $kategori['id_barang_kategori']])) {
                    if ($querywhere[0]['val'] != "") $querywhere[0]['val'] .= " OR ";

                    if ($querywhere[0]['judul'] == "") $querywhere[0]['judul'] = "Kategori: " . $kategori['barang_kategori_nama'];
                    else $querywhere[0]['judul'] .= ", " . $kategori['barang_kategori_nama'];

                    $id_kategori = $kategori['id_barang_kategori'];
                    $querywhere[0]['val'] .= " `tb_barang_data`.`id_barang_kategori` = '$id_kategori' ";
                }
            }
        }
    }

    if (!isset($_POST['tanggal_all'])) {
        $dari = $_POST['tanggal_dari'];
        $sampai = $_POST['tanggal_sampai'];

        $querywhere[2]['judul'] = "Periode: Dari " . $dari . " / " . $sampai;

        // menambahkan barang tambah di query select
        if (!isset($_POST['tabel_tanggal'])) $qselect .= ",`barang_data_tanggal`";

        $querywhere[2]['val'] = "`tb_barang_data`.`barang_data_tanggal` BETWEEN '$dari' AND '$sampai'";
    }
}

// query builder where generator
// =======================================================================
// 1. Pemerikasaan
for ($i = 0; $i < count($querywhere); $i++) {
    if ($querywhere[$i]['val'] != '') {
        $count++;
        $querywhere[$i]['stt'] = true;
    }
}

// 2. Eksekusi
if ($count == 1) {
    foreach ($querywhere as $q) {
        if ($q['stt']) {
            $qwhere = " WHERE " . $q['val'];
            $title_laporan = "Laporan Barang<br>" . $q['judul'];
        }
    }
} else if ($count > 1) {
    foreach ($querywhere as $q) {
        if ($q['stt']) {
            if ($qwhere == "") {
                $qwhere = " WHERE (" . $q['val'] . ")";
                $title_laporan = "Laporan Barang<br>" . $q['judul'];
            } else {
                $qwhere .= " AND (" . $q['val'] . ")";
                $title_laporan .= "<br>" . $q['judul'];
            }
        }
    }
}
// =======================================================================

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
            <?php else : ?>
                <tr>
                    <td style="text-align:center;" colspan="<?php echo ++$dnotfoundcount; ?>">
                        <h4>DATA TIDAK DITEMUKAN</h4>
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

<?php endif; ?>