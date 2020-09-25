<?php
$joindata        = " INNER JOIN `tb_barang_data` ON `tb_barang_masuk`.`id_barang_data` = `tb_barang_data`.`id_barang_data` ";
$joinsuplier    = " INNER JOIN `tb_barang_suplier` ON `tb_barang_masuk`.`id_barang_suplier` = `tb_barang_suplier`.`id_barang_suplier` ";
$qselect         = "";
$qjoin           = "";
$qwhere          = "";
$title_laporan   = "";
$count           = 0;
$dnotfoundcount  = 1;
$querywhere      = [
    0 => ['val' => '', 'stt' => false, 'judul' => ''],
    1 => ['val' => '', 'stt' => false, 'judul' => ''],
    2 => ['val' => '', 'stt' => false, 'judul' => '']
];

if (isset($_POST['cetak'])) {
    if (isset($_POST['tabel_all'])) {
        $qselect = '*';
        $qjoin .= $joindata;
        $qjoin .= $joinsuplier;
        $dnotfoundcount += 7;
    } else {
        $qselect .= "`tb_barang_masuk`.`id_barang_masuk`";
        if (isset($_POST['tabel_kode'])) $qselect .= ",`barang_masuk_kode`";
        if (isset($_POST['tabel_tanggal'])) $qselect .= ",`barang_masuk_tanggal`";
        if (isset($_POST['tabel_jumlah'])) $qselect .= ",`barang_masuk_jumlah`";
        if (isset($_POST['tabel_harga'])) $qselect .= ",`barang_masuk_harga`";
        if (isset($_POST['tabel_total'])) {
            if (!isset($_POST['tabel_jumlah'])) $qselect .= ",`barang_masuk_jumlah`";
            if (!isset($_POST['tabel_harga'])) $qselect .= ",`barang_masuk_harga`";
        }
        if (isset($_POST['tabel_nama'])) {
            $qjoin .= $joindata;
            $qselect .= ",`tb_barang_data`. `id_barang_data`, `tb_barang_data`.`barang_data_nama`";
        }
        if (isset($_POST['tabel_suplier'])) {
            $qjoin .= $joinsuplier;
            $qselect .= ", `tb_barang_suplier`.`id_barang_suplier`, `tb_barang_suplier`.`barang_suplier_nama`";
        }
    }

    if (!isset($_POST['data_all'])) {
        $querydata = query('SELECT `id_barang_data`,`barang_data_nama` FROM `tb_barang_data`');
        if ($querydata) {
            foreach ($querydata as $data) {
                if (isset($_POST['data_' . $data['id_barang_data']])) {
                    // jika barang data lebih dari dua maka tambahkan or untuk query where
                    if ($querywhere[0]['val'] != "") $querywhere[0]['val'] .= " OR ";


                    if ($querywhere[0]['judul'] == "") $querywhere[0]['judul'] = "Data Barang: " . $data['barang_data_nama'];
                    else $querywhere[0]['judul'] .= ", " . $data['barang_data_nama'];

                    $id_barang_data = $data['id_barang_data'];
                    $querywhere[0]['val'] .= " `tb_barang_data`.`id_barang_data` = '$id_barang_data' ";
                }
            }
        }
    }

    if (!isset($_POST['suplier_all'])) {
        $querysuplier = query('SELECT `id_barang_suplier`,`barang_suplier_nama` FROM `tb_barang_suplier`');
        if ($querysuplier) {
            foreach ($querysuplier as $suplier) {
                if (isset($_POST['suplier_' . $suplier['id_barang_suplier']])) {
                    if ($querywhere[1]['val'] != "") $querywhere[1]['val'] .= " OR ";

                    if ($querywhere[1]['judul'] == "") $querywhere[1]['judul'] = "suplier: " . $suplier['barang_suplier_nama'];
                    else $querywhere[1]['judul'] .= ", " . $suplier['barang_suplier_nama'];

                    $id_barang_suplier = $suplier['id_barang_suplier'];
                    $querywhere[1]['val'] .= " `tb_barang_suplier`.`id_barang_suplier` = '$id_barang_suplier' ";
                }
            }
        }
    }

    if (!isset($_POST['tanggal_all'])) {
        $dari = $_POST['tanggal_dari'];
        $sampai = $_POST['tanggal_sampai'];

        $querywhere[3]['judul'] = "Periode: Dari " . $dari . " / " . $sampai;

        // menambahkan barang tambah di query select
        if (!isset($_POST['tabel_tanggal'])) $qselect .= ",`barang_masuk_tanggal`";

        $querywhere[3]['val'] = "`tb_barang_masuk`.`barang_masuk_tanggal` BETWEEN '$dari' AND '$sampai'";
    }
}


// query builder where generator
// =======================================================================
for ($i = 0; $i < count($querywhere); $i++) {
    if ($querywhere[$i]['val'] != '') {
        $count++;
        $querywhere[$i]['stt'] = true;
    }
}
if ($count == 1) {
    foreach ($querywhere as $q) {
        if ($q['stt']) {
            $qwhere = " WHERE " . $q['val'];
            $title_laporan = "Laporan Pengadaan Barang<br>" . $q['judul'];
        }
    }
} else if ($count > 1) {
    foreach ($querywhere as $q) {
        if ($q['stt']) {
            if ($qwhere == "") {
                $qwhere = " WHERE (" . $q['val'] . ")";
                $title_laporan = "Laporan Pengadaan Barang<br>" . $q['judul'];
            } else {
                $qwhere .= " AND (" . $q['val'] . ")";
                $title_laporan .= "<br>" . $q['judul'];
            }
        }
    }
}
// =======================================================================

$qbuilder = "SELECT " . $qselect . " FROM `tb_barang_masuk` " . $qjoin . $qwhere;
$nomor    = 1;
$datas    = query($qbuilder);

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
        echo '<h3>Lapora Semua Pengadaan Barang</h3>';
    } else {
        echo '<h3>' . $title_laporan . '</h3>';
    } ?>
    <table>
        <thead>
            <tr>
                <th style="text-align: center;">No</th>
                <?php
                if (isset($_POST['tabel_nama'])) {
                    $dnotfoundcount++;
                    echo '<th style="text-align: center;">Nama barang</th>';
                }
                if (isset($_POST['tabel_kode'])) {
                    $dnotfoundcount++;
                    echo '<th style="text-align: center;">Kode transaksi</th>';
                }
                if (isset($_POST['tabel_suplier'])) {
                    $dnotfoundcount++;
                    echo '<th style="text-align: center;">Nama suplier</th>';
                }
                if (isset($_POST['tabel_tanggal'])) {
                    $dnotfoundcount++;
                    echo '<th style="text-align: center;">Tanggal</th>';
                }
                if (isset($_POST['tabel_jumlah'])) {
                    $dnotfoundcount++;
                    echo '<th style="text-align: center;">Jumlah</th>';
                }
                if (isset($_POST['tabel_harga'])) {
                    $dnotfoundcount++;
                    echo '<th style="text-align: center;">Harga</th>';
                }
                if (isset($_POST['tabel_total'])) {
                    $dnotfoundcount++;
                    echo '<th style="text-align: center;">Total Harga</th>';
                }
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
                        if (isset($_POST['tabel_kode'])) echo '<td>' . $data["barang_masuk_kode"] . '</td>';
                        if (isset($_POST['tabel_suplier'])) echo '<td>' . $data["barang_suplier_nama"] . '</td>';
                        if (isset($_POST['tabel_tanggal'])) echo '<td>' . $data["barang_masuk_tanggal"] . '</td>';
                        if (isset($_POST['tabel_jumlah'])) echo '<td style="text-align:right;">' . $data["barang_masuk_jumlah"] . '</td>';
                        if (isset($_POST['tabel_harga'])) echo '<td style="text-align:right;">Rp. ' . number_format($data["barang_masuk_harga"], 0, ',', '.') . '</td>';
                        if (isset($_POST['tabel_total'])) echo '<td style="text-align:right;">Rp. ' . number_format(($data["barang_masuk_harga"] * $data["barang_masuk_jumlah"]), 0, ',', '.') . '</td>';
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