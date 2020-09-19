<html>

<head>
    <?php if (@$_GET['page'] == 'data_kategori') {
        $page = 'KATEGORI BARANG';
    } elseif (@$_GET['page'] == 'data_transaksi') {
        $page = 'TRANSAKSI BARANG';
    } elseif (@$_GET['page'] == 'data_konsumen') {
        $page = 'KONSUMEN';
    } elseif (@$_GET['page'] == 'data_barang') {
        $page = 'BARANG';
    }
    $tgl_mulai   = @$_GET['tgl_mulai'];
    $tgl_selesai = @$_GET['tgl_selesai'];
    ?>
    <?php
    ?>
    <style>
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
    </style>
    <title>CETAK LAPORAN DATA <?php echo $page; ?></title>
    <script>
        window.print();
    </script>
</head>

<body style="font-family:Helvetica; display:block;">
    <h1 align="center">PT. AGUNG AUTOMALL JAMBI</h1>
    <h3 align="center">LAPORAN DATA <?php echo $page; ?></h3>
    <p> Alamat: Jl. Sumantri Brojonegoro No. 135, Selamat, Kec. Telanaipura, Kota Jambi, Jambi 36129</p>
    <?php
    $koneksi = mysqli_connect("localhost", "root", "", "db_bengkel");
    $con     = new mysqli("localhost", "root", "", "db_bengkel");
    if (@$_GET['page'] == 'data_kategori') {
        echo '<table align="center" border="1" cellspacing="0"  cell style="width:100%;"><thead><th>No.</th><th>Kategori Barang</th></thead><tbody >';
        $no  = 1;
        $sql = mysqli_query($koneksi, "SELECT*FROM tb_kategori");
        while ($r = mysqli_fetch_array($sql)) {
            echo '<tr><td>' . $no++ . '</td><td>' . $r['kategori'] . '</td></tr>';
        }
        echo '</tbody></table>';
    } elseif (@$_GET['page'] == 'data_transaksi') {
    ?>
        <?php

        echo '<b>' . $tgl_mulai . '&nbsp; sampai &nbsp;' . $tgl_selesai . '</b>';

        ?>
        <table align="center" border="1" cellspacing="0" cell style="width:100%;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Konsumen</th>
                    <th>Kode Transaksi</th>
                    <th>Kode Barang</th>
                    <th>Barang</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Total Harga</th>
                    <th>Tangggal</th>

                </tr>
            </thead>
            <tbody>

                <?php

                $no = 1;

                if ($tgl_mulai != '' and $tgl_mulai != '') {
                    $sql = mysqli_query($koneksi, "SELECT*FROM tb_transaksi WHERE '$tgl_mulai'<=tgl AND tgl<='$tgl_selesai' ORDER BY tgl ASC  ");
                } else {
                    $sql = mysqli_query($koneksi, "SELECT*FROM tb_transaksi  ORDER BY tgl ASC  ");
                }
                while ($data = mysqli_fetch_array($sql)) {

                ?>

                    <tr>
                        <td><?php echo $no++; ?></td>

                        <td><?php echo $data['konsumen'];; ?></td>
                        <td><?php echo $data['kode_transaksi']; ?></td>
                        <td><?php echo $data['kode_barang']; ?></td>
                        <td><?php echo $data['barang']; ?></td>
                        <td><?php echo $data['Qty']; ?></td>
                        <td><?php echo $data['Harga']; ?></td>
                        <td><?php echo $data['total_harga']; ?></td>
                        <td><?php echo $data['tgl']; ?></td>


                    </tr>
                <?php  } ?>
            </tbody>
        </table>
        <br>
        <br>

    <?php


    } elseif (@$_GET['page'] == 'data_konsumen') {
    ?>
        <table align="center" border="1" cellspacing="0" cell style="width:100%;">
            <thead>
                <tr>
                    <th>ID KONSUMEN</th>
                    <th>KODE KONSUMEN</th>
                    <th>NIK</th>
                    <th>NAMA</th>
                    <th>NO.TELP</th>
                    <th>BG MOBIL</th>
                    <th>MERK MOBIL</th>
                    <th>WARNA MOBIL</th>
                    <th>TANGGAL DAFTAR</th>
                    <th>ALAMAT</th>

                </tr>
            </thead>
            <tbody>

                <?php

                $no = 1;

                if ($tgl_mulai != '' and $tgl_mulai != '') {
                    $sql = mysqli_query($koneksi, "SELECT*FROM tb_konsumen WHERE '$tgl_mulai'<=tgl_daftar AND tgl_daftar<='$tgl_selesai' ORDER BY tgl_daftar ASC");
                } else {

                    $sql = mysqli_query($koneksi, "SELECT*FROM tb_konsumen  ORDER BY tgl_daftar ASC");
                }
                while ($data = mysqli_fetch_array($sql)) {

                ?>

                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $data['kode_konsumen']; ?></td>
                        <td><?php echo $data['nik']; ?></td>
                        <td><?php echo $data['nama']; ?></td>
                        <td><?php echo $data['hp']; ?></td>
                        <td><?php echo $data['bg_mobil']; ?></td>
                        <td><?php echo $data['merk_mobil']; ?></td>
                        <td><?php echo $data['warna_mobil']; ?></td>
                        <td><?php echo $data['tgl_daftar']; ?></td>
                        <td><?php echo $data['alamat']; ?></td>

                    </tr>


                <?php  } ?>
            </tbody>

        </table>
    <?php

    } elseif (@$_GET['page'] == 'data_barang') {
    ?>
        <table align="center" border="1" cellspacing="0" cell style="width:100%;">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>NAMA BARANG</th>
                    <th>KODE BARANG</th>
                    <th>HARGA BELI</th>
                    <th>HARGA JUAL</th>
                    <th>GAMBAR</th>
                    <th>STOK</th>
                    <th>KATEGORI</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $sql = $koneksi->query("SELECT * FROM tb_barang INNER JOIN tb_kategori ON tb_barang.id_kategori = tb_kategori.id_kategori");
                while ($data = $sql->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $data['nama_barang']; ?></td>
                        <td><?php echo $data['kode_barang']; ?></td>
                        <td style="text-align:right;">Rp. <?= number_format($data['harga_beli'], 0, ',', '.'); ?></td>
                        <td style="text-align:right;">Rp. <?= number_format($data['harga_jual'], 0, ',', '.'); ?></td>
                        <td style="text-align:center;"><img style="width: 100px; height: 100px; object-fit:fill;" src="../images/barang/<?php echo $data['gambar']; ?>" style="width: 100px;" alt="..." class="img-thumbnail"></td>
                        <td style="text-align:right;"><?php echo $data['stok']; ?></td>
                        <td><?php echo $data['kategori']; ?></td>
                    </tr>
                <?php  } ?>
            </tbody>
        </table>
    <?php
    }

    ?>
    <br>
    <div class="ttd">
        <h4>KEPALA BENGKEL</h4>
        <br>
        <h5>SUTIKNA</h5>
    </div>
</body>

</html>