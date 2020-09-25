<?php
$qselect         = "";
$qwhere          = "";
$title_laporan   = "";
$dnotfoundcount  = 1;

if (isset($_POST['cetak'])) {
    if (isset($_POST['tabel_all'])) {
        $qselect = '*';
        $dnotfoundcount += 5;
    } else {
        $qselect .= "`id_barang_suplier`";
        if (isset($_POST['tabel_nama'])) {
            $dnotfoundcount++;
            $qselect .= ",`barang_suplier_nama`";
        }
        if (isset($_POST['tabel_no_telepon'])) {
            $dnotfoundcount++;
            $qselect .= ",`barang_suplier_no_telepon`";
        }
        if (isset($_POST['tabel_alamat'])) {
            $dnotfoundcount++;
            $qselect .= ",`barang_suplier_alamat`";
        }
        if (isset($_POST['tabel_kode'])) {
            $dnotfoundcount++;
            $qselect .= ",`barang_suplier_kode`";
        }
        if (isset($_POST['tabel_tanggal'])) {
            $dnotfoundcount++;
            $qselect .= ",`barang_suplier_tanggal_daftar`";
        }
    }

    if (!isset($_POST['tanggal_all'])) {
        $dari = $_POST['tanggal_dari'];
        $sampai = $_POST['tanggal_sampai'];

        $title_laporan = "Laporan Suplier<br>Periode: Dari " . $dari . " / " . $sampai;

        // menambahkan barang tambah di query select
        if (!isset($_POST['tabel_tanggal'])) $qselect .= ",`barang_suplier_tanggal`";

        $qwhere = " WHERE `tb_barang_suplier`.`barang_suplier_tanggal_daftar` BETWEEN '$dari' AND '$sampai'";
    }
}

$qbuilder = "SELECT " . $qselect . " FROM `tb_barang_suplier` " . $qwhere;
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
        echo '<h3>Lapora Semua Suplier</h3>';
    } else {
        echo '<h3>' . $title_laporan . '</h3>';
    } ?>
    <table>
        <thead>
            <tr>
                <th style="text-align: center;">No</th>
                <?php
                if (isset($_POST['tabel_nama'])) echo '<th style="text-align: center;">Nama suplier</th>';
                if (isset($_POST['tabel_no_telepon'])) echo '<th style="text-align: center;">No Telepon</th>';
                if (isset($_POST['tabel_alamat'])) echo '<th style="text-align: center;">Alamat</th>';
                if (isset($_POST['tabel_kode'])) echo '<th style="text-align: center;">Kode suplier</th>';
                if (isset($_POST['tabel_tanggal'])) echo '<th style="text-align: center;">Tanggal Daftar</th>';
                ?>
            </tr>
        </thead>
        <tbody>
            <?php if ($datas) : ?>
                <?php foreach ($datas as $data) : ?>
                    <tr>
                        <td style="text-align: center;"><?php echo $nomor++; ?></td>
                        <?php
                        if (isset($_POST['tabel_nama'])) echo '<td>' . $data["barang_suplier_nama"] . '</td>';
                        if (isset($_POST['tabel_no_telepon'])) echo '<td>' . $data["barang_suplier_no_telepon"] . '</td>';
                        if (isset($_POST['tabel_alamat'])) echo '<td>' . $data["barang_suplier_alamat"] . '</td>';
                        if (isset($_POST['tabel_kode'])) echo '<td>' . $data["barang_suplier_kode"] . '</td>';
                        if (isset($_POST['tabel_tanggal'])) echo '<td>' . $data["barang_suplier_tanggal_daftar"] . '</td>';
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