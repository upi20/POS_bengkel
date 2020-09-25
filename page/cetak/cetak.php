<?php
session_start();
include "../../config.php";
if (!ceklogin($_SESSION['user'])) header('Location: ../../login.php');
if (isset($_GET['title'])) {
    $judul_laporan = $_GET['title'];
} else {
    $judul_laporan = "Cetak Data Laporan";
}
?>

<html>

<head>
    <style>
        body {
            padding: 1cm;
            width: 21cm;
            margin: auto;
            background-color: white;
            font: 11pt "Tahoma", "Helvetica";
            text-align: center;
        }

        * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
        }

        th {
            padding: 7px;
        }

        td {

            padding: 7px
        }

        .ttd {
            float: right;
            text-align: center;
            margin-top: 10px;
        }

        @page {
            size: A4;
            margin: 0;
        }

        table {
            border-collapse: collapse;
            margin: auto;
            margin-top: 10px;
            background-color: #ffff;
        }

        table td,
        table th {
            border: 1px solid #aaa;
            padding: 5px;
            text-align: left;
        }
    </style>
    <title><?php echo $judul_laporan; ?></title>
    <script>
        window.print();
    </script>
</head>

<body>
    <h2 align="center"><?php echo $print['header']['judul']; ?></h2>
    <p align="center"><?php echo $print['header']['alamat']; ?></p>
    <hr>
    <br>
    <?php
    if (isset($_GET['laporan'])) {
        switch ($_GET['laporan']) {
            case 'barang':
                include 'data_master/barang/print.php';
                break;

            case 'kategori':
                include 'data_master/kategori/print.php';
                break;

            case 'konsumen':
                include 'data_master/konsumen/print.php';
                break;

            case 'suplier':
                include 'data_master/suplier/print.php';
                break;

            case 'barang_masuk':
                include 'data_transaksi/barang_masuk/print.php';
                break;

            case 'barang_keluar':
                include 'data_transaksi/barang_keluar/print.php';
                break;


            default:
                echo '<h2 align="center">Data Tidak Ditemukan</h2>';
                break;
        }
    } else  echo '<h2 align="center">Data Tidak Ditemukan</h2>';
    ?>
    <div class="ttd">
        <h4><?php echo $print['footer']['jabatan']; ?></h4>
        <br>
        <h5><u><?php echo $print['footer']['nama']; ?></u></h5>
    </div>
</body>

</html>