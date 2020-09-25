<?php
$joindata        = " INNER JOIN `tb_barang_data` ON `tb_barang_keluar`.`id_barang_data` = `tb_barang_data`.`id_barang_data` ";
$joinkonsumen     = " INNER JOIN `tb_barang_konsumen` ON `tb_barang_keluar`.`id_barang_konsumen` = `tb_barang_konsumen`.`id_barang_konsumen` ";
$qselect         = "";
$qjoin           = "";
$qwhere          = "";
$title_laporan   = "";
$count           = 0;
$querywhere      = [
    0 => ['val' => '', 'stt' => false, 'judul' => ''],
    1 => ['val' => '', 'stt' => false, 'judul' => ''],
    2 => ['val' => '', 'stt' => false, 'judul' => '']
];

if (isset($_POST['cetak'])) {
    if (isset($_POST['tabel_all'])) {
        $qselect = '*';
        $qjoin .= $joindata;
        $qjoin .= $joinkonsumen;
    } else {
        $qselect .= "`tb_barang_keluar`.`id_barang_keluar`";
        if (isset($_POST['tabel_kode'])) $qselect .= ",`barang_keluar_kode`";
        if (isset($_POST['tabel_tanggal'])) $qselect .= ",`barang_keluar_tanggal`";
        if (isset($_POST['tabel_jumlah'])) $qselect .= ",`barang_keluar_jumlah`";
        if (isset($_POST['tabel_harga'])) $qselect .= ",`barang_keluar_harga`";
        if (isset($_POST['tabel_total'])) {
            if (!isset($_POST['tabel_jumlah'])) $qselect .= ",`barang_keluar_jumlah`";
            if (!isset($_POST['tabel_harga'])) $qselect .= ",`barang_keluar_harga`";
        }
        if (isset($_POST['tabel_nama'])) {
            $qjoin .= $joindata;
            $qselect .= ",`tb_barang_data`. `id_barang_data`, `tb_barang_data`.`barang_data_nama`";
        }
        if (isset($_POST['tabel_konsumen'])) {
            $qjoin .= $joinkonsumen;
            $qselect .= ", `tb_barang_konsumen`.`id_barang_konsumen`, `tb_barang_konsumen`.`barang_konsumen_nama`";
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

    if (!isset($_POST['konsumen_all'])) {
        $querykonsumen = query('SELECT `id_barang_konsumen`,`barang_konsumen_nama` FROM `tb_barang_konsumen`');
        if ($querykonsumen) {
            foreach ($querykonsumen as $konsumen) {
                if (isset($_POST['konsumen_' . $konsumen['id_barang_konsumen']])) {
                    if ($querywhere[1]['val'] != "") $querywhere[1]['val'] .= " OR ";

                    if ($querywhere[1]['judul'] == "") $querywhere[1]['judul'] = "konsumen Barang: " . $konsumen['barang_konsumen_nama'];
                    else $querywhere[1]['judul'] .= ", " . $konsumen['barang_konsumen_nama'];

                    $id_barang_konsumen = $konsumen['id_barang_konsumen'];
                    $querywhere[1]['val'] .= " `tb_barang_konsumen`.`id_barang_konsumen` = '$id_barang_konsumen' ";
                }
            }
        }
    }

    if (!isset($_POST['tanggal_all'])) {
        $dari = $_POST['tanggal_dari'];
        $sampai = $_POST['tanggal_sampai'];

        $querywhere[3]['judul'] = "Periode: Dari " . $dari . " / " . $sampai;

        // menambahkan barang tambah di query select
        if (!isset($_POST['tabel_tanggal'])) $qselect .= ",`barang_keluar_tanggal`";

        $querywhere[3]['val'] = "`tb_barang_keluar`.`barang_keluar_tanggal` BETWEEN '$dari' AND '$sampai'";
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
            $title_laporan = "Laporan Penjualan Barang<br>" . $q['judul'];
        }
    }
} else if ($count > 1) {
    foreach ($querywhere as $q) {
        if ($q['stt']) {
            if ($qwhere == "") {
                $qwhere = " WHERE (" . $q['val'] . ")";
                $title_laporan = "Laporan Penjualan Barang<br>" . $q['judul'];
            } else {
                $qwhere .= " AND (" . $q['val'] . ")";
                $title_laporan .= "<br>" . $q['judul'];
            }
        }
    }
}
// =======================================================================

$qbuilder = "SELECT " . $qselect . " FROM `tb_barang_keluar` " . $qjoin . $qwhere;
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
        echo '<h3>Lapora Semua Penjualan Barang</h3>';
    } else {
        echo '<h3>' . $title_laporan . '</h3>';
    } ?>
    <table>
        <thead>
            <tr>
                <th style="text-align: center;">No</th>
                <?php
                if (isset($_POST['tabel_nama'])) echo '<th style="text-align: center;">Nama barang</th>';
                if (isset($_POST['tabel_kode'])) echo '<th style="text-align: center;">Kode Transaksi</th>';
                if (isset($_POST['tabel_konsumen'])) echo '<th style="text-align: center;">Nama konsumen</th>';
                if (isset($_POST['tabel_tanggal'])) echo '<th style="text-align: center;">Tanggal</th>';
                if (isset($_POST['tabel_jumlah'])) echo '<th style="text-align: center;">Jumlah</th>';
                if (isset($_POST['tabel_harga'])) echo '<th style="text-align: center;">Harga</th>';
                if (isset($_POST['tabel_total'])) echo '<th style="text-align: center;">Total Harga</th>';
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
                        if (isset($_POST['tabel_kode'])) echo '<td>' . $data["barang_keluar_kode"] . '</td>';
                        if (isset($_POST['tabel_konsumen'])) echo '<td>' . $data["barang_konsumen_nama"] . '</td>';
                        if (isset($_POST['tabel_tanggal'])) echo '<td>' . $data["barang_keluar_tanggal"] . '</td>';
                        if (isset($_POST['tabel_jumlah'])) echo '<td style="text-align:right;">' . $data["barang_keluar_jumlah"] . '</td>';
                        if (isset($_POST['tabel_harga'])) echo '<td style="text-align:right;">Rp. ' . number_format($data["barang_keluar_harga"], 0, ',', '.') . '</td>';
                        if (isset($_POST['tabel_total'])) echo '<td style="text-align:right;">Rp. ' . number_format(($data["barang_keluar_harga"] * $data["barang_keluar_jumlah"]), 0, ',', '.') . '</td>';
                        ?>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>

<?php endif; ?>