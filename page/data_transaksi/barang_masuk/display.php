<?php
// query data
// ==========================================================
$data['tambah']['barang']   = query("SELECT `id_barang_data`, `barang_data_nama`, `barang_data_kode`, `barang_data_harga_jual` FROM `tb_barang_data`");
if ($data['tambah']['barang']) {
    for ($i = 0; $i < count($data['tambah']['barang']); $i++) {
        $data['tambah']['barang'][$i]['barang_data_stok'] = getStokBarang($data['tambah']['barang'][$i]['id_barang_data']);
    }
}

$data['tambah']['suplier']  = query("SELECT `barang_suplier_nama`, `id_barang_suplier` FROM `tb_barang_suplier`");

// ==========================================================

// modal CRUD
// ==========================================================
include "tambah.php";
include "ubah.php";




// ==========================================================
$datas = query("SELECT * FROM tb_barang_masuk 
    JOIN
    tb_barang_data
    ON tb_barang_masuk.id_barang_data = tb_barang_data.id_barang_data
    JOIN
    tb_barang_suplier
    ON tb_barang_masuk.id_barang_suplier = tb_barang_suplier.id_barang_suplier");
$nomor = 0;
?>
<div class="panel panel-default">
    <div class="panel-heading">
        Data Transaksi Pengadaan Barang
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="container-fluid">
                <button class="btn btn-success" data-toggle="modal" data-target="#modaltambah"><i class="fa fa-plus"></i> Tambah Data</button>
                <br>
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="container-fluid">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th style="text-align:center;" width="25px">No</th>
                                    <th style="text-align:center;">Suplier</th>
                                    <th style="text-align:center;">Barang</th>
                                    <th style="text-align:center;">Qty</th>
                                    <th style="text-align:center;">Harga</th>
                                    <th style="text-align:center;">Total harga</th>
                                    <th style="text-align:center;">Tanggal</th>
                                    <th style="text-align:center;">Aksi</th>
                                </tr>
                            </thead>
                            <?php
                            if ($datas) {
                                foreach ($datas as $data) {
                            ?>
                                    <tr>
                                        <td><?php echo ++$nomor; ?></td>
                                        <td><?php echo $data['barang_suplier_nama']; ?></td>
                                        <td><?php echo $data['barang_data_nama']; ?></td>
                                        <td style="text-align:right"><?php echo $data['barang_masuk_jumlah']; ?></td>
                                        <td style="text-align:right"><?php echo 'Rp. ' . number_format($data['barang_masuk_harga'], 0, ',', '.'); ?></td>
                                        <td style="text-align:right"><?php echo 'Rp. ' . number_format($data['barang_masuk_harga'] * $data['barang_masuk_jumlah'], 0, ',', '.'); ?></td>
                                        <td><?php echo $data['barang_masuk_tanggal']; ?></td>
                                        <td style="white-space:nowrap">
                                            <button class="btn btn-warning" onclick="ubahData(this)" data-toggle="modal" data-target="#modalubah" data-id_barang_masuk="<?php echo $data['id_barang_masuk']; ?>" data-id_barang_data="<?php echo $data['id_barang_data']; ?>" data-id_barang_suplier="<?php echo $data['id_barang_suplier']; ?>" data-barang_masuk_kode="<?php echo $data['barang_masuk_kode']; ?>" data-barang_masuk_jumlah="<?php echo $data['barang_masuk_jumlah']; ?>" data-barang_masuk_harga="<?php echo $data['barang_masuk_harga']; ?>" data-barang_masuk_tanggal="<?php echo $data['barang_masuk_tanggal']; ?>">
                                                <i class="fa fa-edit"></i> Ubah
                                            </button>
                                            <button class="btn btn-danger" onclick="hapusData('<?php echo $data['barang_kategori_nama']; ?>', '<?php echo $data['id_barang_kategori']; ?>')" data-toggle="modal" data-target="#modalHapus"><i class="fa fa-trash"></i> Hapus</button>
                                        </td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>