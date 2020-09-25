<?php
$qselect         = "";
$qwhere          = "";
$title_laporan   = "";
$dnotfoundcount  = 1;

if (isset($_POST['cetak'])) {
    if (isset($_POST['tabel_all'])) {
        $qselect = '*';
        $dnotfoundcount += 7;
    } else {
        $qselect .= "`id_barang_konsumen`";
        if (isset($_POST['tabel_nama'])) $qselect .= ",`barang_konsumen_nama`";
        if (isset($_POST['tabel_nik'])) $qselect .= ",`barang_konsumen_nik`";
        if (isset($_POST['tabel_no_telepon'])) $qselect .= ",`barang_konsumen_no_telepon`";
        if (isset($_POST['tabel_alamat'])) $qselect .= ",`barang_konsumen_alamat`";
        if (isset($_POST['tabel_merk_mobil'])) $qselect .= ",`barang_konsumen_merk_mobil`";
        if (isset($_POST['tabel_warna_mobil'])) $qselect .= ",`barang_konsumen_warna_mobil`";
        if (isset($_POST['tabel_kode'])) $qselect .= ",`barang_konsumen_kode`";
        if (isset($_POST['tabel_tanggal'])) $qselect .= ",`barang_konsumen_tanggal_daftar`";
    }

    if (!isset($_POST['tanggal_all'])) {
        $dari = $_POST['tanggal_dari'];
        $sampai = $_POST['tanggal_sampai'];

        $title_laporan = "Laporan Pelanggan<br>Periode: Dari " . $dari . " / " . $sampai;

        // menambahkan barang tambah di query select
        if (!isset($_POST['tabel_tanggal'])) $qselect .= ",`barang_konsumen_tanggal`";

        $qwhere = " WHERE `tb_barang_konsumen`.`barang_konsumen_tanggal_daftar` BETWEEN '$dari' AND '$sampai'";
    }
}

$qbuilder = "SELECT " . $qselect . " FROM `tb_barang_konsumen` " . $qwhere;
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
        echo '<h3>Lapora Semua Pelanggan</h3>';
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
                    echo '<th style="text-align: center;">Nama Konsumen</th>';
                }
                if (isset($_POST['tabel_nik'])) {
                    $dnotfoundcount++;
                    echo '<th style="text-align: center;">NIK</th>';
                }
                if (isset($_POST['tabel_no_telepon'])) {
                    $dnotfoundcount++;
                    echo '<th style="text-align: center;">No Telepon</th>';
                }
                if (isset($_POST['tabel_alamat'])) {
                    $dnotfoundcount++;
                    echo '<th style="text-align: center;">Alamat</th>';
                }
                if (isset($_POST['tabel_merk_mobil'])) {
                    $dnotfoundcount++;
                    echo '<th style="text-align: center;">Merk Mobil</th>';
                }
                if (isset($_POST['tabel_warna_mobil'])) {
                    $dnotfoundcount++;
                    echo '<th style="text-align: center;">Warna Mobil</th>';
                }
                if (isset($_POST['tabel_kode'])) {
                    $dnotfoundcount++;
                    echo '<th style="text-align: center;">Kode Konsumen</th>';
                }
                if (isset($_POST['tabel_tanggal'])) {
                    $dnotfoundcount++;
                    echo '<th style="text-align: center;">Tanggal Daftar</th>';
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
                        if (isset($_POST['tabel_nama'])) echo '<td>' . $data["barang_konsumen_nama"] . '</td>';
                        if (isset($_POST['tabel_nik'])) echo '<td>' . $data["barang_konsumen_nik"] . '</td>';
                        if (isset($_POST['tabel_no_telepon'])) echo '<td>' . $data["barang_konsumen_no_telepon"] . '</td>';
                        if (isset($_POST['tabel_alamat'])) echo '<td>' . $data["barang_konsumen_alamat"] . '</td>';
                        if (isset($_POST['tabel_merk_mobil'])) echo '<td>' . $data["barang_konsumen_merk_mobil"] . '</td>';
                        if (isset($_POST['tabel_warna_mobil'])) echo '<td>' . $data["barang_konsumen_warna_mobil"] . '</td>';
                        if (isset($_POST['tabel_kode'])) echo '<td>' . $data["barang_konsumen_kode"] . '</td>';
                        if (isset($_POST['tabel_tanggal'])) echo '<td>' . $data["barang_konsumen_tanggal_daftar"] . '</td>';

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