<?php
$kategori = query('SELECT * FROM tb_barang_kategori');
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Cetak Semua Data Barang
            </div>
            <div class="panel-body">
                <form action="./page/cetak/cetak.php?laporan=barang" target="blank" method="post">
                    <div class="row">
                        <h4 style="padding:3px 0; margin:0; text-align:center;">Kostumisasi</h4>
                        <hr>
                        <div class="col-md-4">
                            <div class="container-fluid">
                                <h4 style="padding:3px 0; margin:0; text-align:center;">Tabel</h4>
                                <table width="100%" onclick="tableCapture()" id="tabel_tabel">
                                    <tr>
                                        <td style="white-space:nowrap"><label for="tabel_nama" class="form-check-label">Nama Barang</label></td>
                                        <td style="text-align:right;"><input type="checkbox" class="checkbox checkbox_tabel" id="tabel_nama" checked="" name="tabel_nama"></td>
                                    </tr>
                                    <tr>
                                        <td style="white-space:nowrap"><label for="tabel_harga_beli" class="form-check-label">Harga Beli</label></td>
                                        <td style="text-align:right;"><input type="checkbox" class="checkbox checkbox_tabel" id="tabel_harga_beli" checked="" name="tabel_harga_beli"></td>
                                    </tr>
                                    <tr>
                                        <td style="white-space:nowrap"><label for="tabel_harga_jual" class="form-check-label">Harga Jual</label></td>
                                        <td style="text-align:right;"><input type="checkbox" class="checkbox checkbox_tabel" id="tabel_harga_jual" checked="" name="tabel_harga_jual"></td>
                                    </tr>
                                    <tr>
                                        <td style="white-space:nowrap"><label for="tabel_stok" class="form-check-label">Stok</label></td>
                                        <td style="text-align:right;"><input type="checkbox" class="checkbox checkbox_tabel" id="tabel_stok" checked="" name="tabel_stok"></td>
                                    </tr>
                                    <tr>
                                        <td style="white-space:nowrap"><label for="tabel_kategori" class="form-check-label">Kategori</label></td>
                                        <td style="text-align:right;"><input type="checkbox" class="checkbox checkbox_tabel" id="tabel_kategori" checked="" name="tabel_kategori"></td>
                                    </tr>
                                    <tr>
                                        <td style="white-space:nowrap"><label for="tabel_tanggal" class="form-check-label">Tanggal</label></td>
                                        <td style="text-align:right;"><input type="checkbox" class="checkbox checkbox_tabel" id="tabel_tanggal" checked="" name="tabel_tanggal"></td>
                                    </tr>
                                    <tr>
                                        <td style="white-space:nowrap"><label for="tabel_gambar" class="form-check-label">Gambar</label></td>
                                        <td style="text-align:right;"><input type="checkbox" class="checkbox checkbox_tabel" id="tabel_gambar" name="tabel_gambar"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <hr>
                                        </td>
                                    </tr>
                                </table>
                                <table width="100%" onclick="tableCapture()">
                                    <tr>
                                        <td style="white-space:nowrap"><label for="tabel_all" class="form-check-label">Pilih Semua</label></td>
                                        <td style="text-align:right;"><input type="checkbox" class="checkbox" id="tabel_all" name="tabel_all"></td>
                                    </tr>
                                </table>
                                <hr>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="container-fluid">
                                <h4 style="padding:3px 0; margin:0; text-align:center;">Tanggal Daftar</h4>
                                <div id="tanggal_tabel">
                                    <div class="form-group">
                                        <label>Dari Tanggal</label>
                                        <input class="form-control" type="date" name="tanggal_dari" id="tanggal_dari" value="<?= date("yy-m-d"); ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label>Sampai Tanggal</label>
                                        <input class="form-control" type="date" name="tanggal_sampai" id="tanggal_sampai" value="<?= date("yy-m-d"); ?>" />
                                    </div>
                                    <hr>
                                </div>
                                <table width="100%">
                                    <tr>
                                        <td style="white-space:nowrap"><label for="tanggal_all" class="form-check-label">Semua Tanggal</label></td>
                                        <td style="text-align:right;"><input type="checkbox" class="checkbox" id="tanggal_all" name="tanggal_all" checked="" onchange="cektanggal(this)"></td>
                                    </tr>
                                </table>
                                <hr>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="container-fluid">
                                <h4 style="padding:3px 0; margin:0; text-align:center;">Kategori</h4>
                                <table width="100%" onclick="kategoriCapture()" id="kategori_tabel">
                                    <?php if ($kategori) {
                                        foreach ($kategori as $k) { ?>
                                            <tr>
                                                <td style="white-space:nowrap"><label for="kategori_<?php echo $k['id_barang_kategori']; ?>" class="form-check-label"><?php echo $k['barang_kategori_nama']; ?></label></td>
                                                <td style="text-align:right;"><input type="checkbox" class="checkbox checkbox_kategori" id="kategori_<?php echo $k['id_barang_kategori']; ?>" name="kategori_<?php echo $k['id_barang_kategori']; ?>" checked=""></td>
                                            </tr>
                                    <?php }
                                    } ?>
                                    <tr>
                                        <td colspan="2">
                                            <hr>
                                        </td>
                                    </tr>
                                </table>
                                <table width="100%" onclick="kategoriCapture()">
                                    <tr>
                                        <td style="white-space:nowrap"><label for="kategori_all" class="form-check-label">Semua Kategori</label></td>
                                        <td style="text-align:right;"><input type="checkbox" class="checkbox" id="kategori_all" name="kategori_all" checked=""></td>
                                    </tr>
                                </table>
                                <hr>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-primary btn-block" type="submit" name="cetak"><i class="fa fa-print"></i> Cetak Laporan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function tableCapture() {
        const tabel_checkbox = document.querySelectorAll('.checkbox_tabel');
        let tabel_all_btn = document.querySelector('#tabel_all');

        const tabelVisib = (bool = true) => {
            const tabel_tabel = document.querySelector('#tabel_tabel');
            if (bool) tabel_tabel.removeAttribute('hidden');
            else tabel_tabel.setAttribute('hidden', '');
        }

        const tabel_checkedall = () => {
            tabel_checkbox.forEach(element => {
                element.checked = true;
            });
            tabelVisib(false);
        }

        const tabel_periksa = () => {
            let cek = true;
            tabel_checkbox.forEach(element => {
                if (!element.checked) cek = false;
            });
            if (cek) {
                tabelVisib(false);
                tabel_all_btn.checked = cek;
            }
        }

        tabel_checkbox.forEach(element => {
            element.addEventListener('change', function() {
                tabel_periksa();
            });
        });

        tabel_all_btn.addEventListener('change', function() {
            if (this.checked) tabel_checkedall();
            else tabelVisib();
        });
    }

    function kategoriCapture() {
        const kategori_checkbox = document.querySelectorAll('.checkbox_kategori');
        let kategori_all_btn = document.querySelector('#kategori_all');

        const tabelVisib = (bool = true) => {
            const kategori_tabel = document.querySelector('#kategori_tabel');
            if (bool) kategori_tabel.removeAttribute('hidden');
            else kategori_tabel.setAttribute('hidden', '');
        }

        const kategori_checkedall = () => {
            kategori_checkbox.forEach(element => {
                element.checked = true;
            });
            tabelVisib(false);
        }

        const kategori_periksa = () => {
            let cek = true;
            kategori_checkbox.forEach(element => {
                if (!element.checked) cek = false;
            });
            if (cek) {
                tabelVisib(false);
                kategori_all_btn.checked = cek;
            }
        }

        kategori_checkbox.forEach(element => {
            element.addEventListener('change', function() {
                kategori_periksa();
            });
        });

        kategori_all_btn.addEventListener('change', function() {
            if (this.checked) kategori_checkedall();
            else tabelVisib();
        });
    }


    function cektanggal(data = document.querySelector('#tanggal_all')) {
        let tanggal_dari = document.querySelector('#tanggal_dari');
        let tanggal_sampai = document.querySelector('#tanggal_sampai');
        const tanggal_tabel = document.querySelector('#tanggal_tabel');
        if (data.checked) {
            tanggal_dari.setAttribute('readonly', '');
            tanggal_sampai.setAttribute('readonly', '');
            tanggal_tabel.setAttribute('hidden', '');
        } else {
            tanggal_dari.removeAttribute('readonly');
            tanggal_sampai.removeAttribute('readonly');
            tanggal_tabel.removeAttribute('hidden');
        }
    }
    cektanggal();
    if (!document.querySelector('#kategori_all').checked) document.querySelector('#kategori_tabel').removeAttribute('hidden');
    else document.querySelector('#kategori_tabel').setAttribute('hidden', '');
</script>