<?php
include 'tambah.php';
include 'ubah.php';
include 'hapus.php';
$nomor   = 0;
$display = query("SELECT * FROM tb_barang_kategori");
?>
<div class="panel panel-default">
    <div class="panel-heading">
        Data Kategori
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="container-fluid">
                <button class="btn btn-success" data-toggle="modal" data-target="#modalTambah"><i class="fa fa-plus"></i> Tambah Data</button>
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
                                    <th style="text-align:center;">Data kategori barang</th>
                                    <th style="text-align:center;" width="230px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($display) {
                                    foreach ($display as $data) { ?>
                                        <tr>
                                            <td><?php echo ++$nomor; ?></td>
                                            <td><?php echo $data['barang_kategori_nama']; ?></td>
                                            <td style="white-space:nowrap">
                                                <button class="btn btn-warning" onclick="ubahData('<?php echo $data['barang_kategori_nama']; ?>', '<?php echo $data['id_barang_kategori']; ?>')" data-toggle="modal" data-target="#modalUbah"><i class="fa fa-edit"></i> Ubah</button>
                                                <button class="btn btn-danger" onclick="hapusData('<?php echo $data['barang_kategori_nama']; ?>', '<?php echo $data['id_barang_kategori']; ?>')" data-toggle="modal" data-target="#modalHapus"><i class="fa fa-trash"></i> Hapus</button>
                                            </td>
                                        </tr>
                                <?php  }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>