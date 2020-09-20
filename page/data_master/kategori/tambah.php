<?php
if (isset($_POST['simpan_tambah'])) {
    $kategori = $_POST['kategori'];
    $sql = $koneksi->query("INSERT INTO `tb_barang_kategori` (`barang_kategori_nama`)VALUES('$kategori')");
    if ($sql) {
        echo '<script type = "text/javascript">setAlert("Berhasil..! ", "Data berhasil ditambahkan..", "success");</script>';
    } else {
        echo '<script type = "text/javascript">setAlert("Gagal..! ", "Data gagal ditambahkan.. Nama kategori mungkin sudah ada..", "danger");</script>';
    }
}
?>

<!-- Modal tambah -->
<!-- ================================================================================================ -->
<div class="modal fade" id="modalTambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal"><span>&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Tambah Kategori Barang</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <form method="POST">
                                <div class="form-group">
                                    <label>Nama Kategori</label>
                                    <input class="form-control" name="kategori" id="kategori" required="" />
                                    <span><i>Nama tidak boleh sama denga yang sudah ada</i></span>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="submit" name="simpan_tambah" value="Simpan" class="btn btn-primary">
                </form>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<!-- ================================================================================================ -->