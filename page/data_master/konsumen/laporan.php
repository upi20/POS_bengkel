<div class="panel panel-default">
    <div class="panel-heading">
        Cetak Laporan Data Konsumen
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <form action="./page/cetak/cetak.php?laporan=konsumen" target="blank" method="post">
                    <h4 style="padding:3px 0; margin:0; text-align:center;">Kostumisasi</h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <h4 style="padding:3px 0; margin:0; text-align:center;">Tabel</h4>
                            <table width="100%" onclick="tableCapture()" id="tabel_tabel">
                                <tr>
                                    <td style="white-space:nowrap"><label for="tabel_nama" class="form-check-label">Nama Konsumen</label></td>
                                    <td style="text-align:right;"><input type="checkbox" class="checkbox checkbox_tabel" id="tabel_nama" checked="" name="tabel_nama"></td>
                                </tr>
                                <tr>
                                    <td style="white-space:nowrap"><label for="tabel_nik" class="form-check-label">NIK</label></td>
                                    <td style="text-align:right;"><input type="checkbox" class="checkbox checkbox_tabel" id="tabel_nik" checked="" name="tabel_nik"></td>
                                </tr>
                                <tr>
                                    <td style="white-space:nowrap"><label for="tabel_no_telepon" class="form-check-label">No Telepon</label></td>
                                    <td style="text-align:right;"><input type="checkbox" class="checkbox checkbox_tabel" id="tabel_no_telepon" checked="" name="tabel_no_telepon"></td>
                                </tr>
                                <tr>
                                    <td style="white-space:nowrap"><label for="tabel_alamat" class="form-check-label">Alamat</label></td>
                                    <td style="text-align:right;"><input type="checkbox" class="checkbox checkbox_tabel" id="tabel_alamat" checked="" name="tabel_alamat"></td>
                                </tr>
                                <tr>
                                    <td style="white-space:nowrap"><label for="tabel_tanggal" class="form-check-label">Tanggal Daftar</label></td>
                                    <td style="text-align:right;"><input type="checkbox" class="checkbox checkbox_tabel" id="tabel_tanggal" checked="" name="tabel_tanggal"></td>
                                </tr>
                                <tr>
                                    <td style="white-space:nowrap"><label for="tabel_merk_mobil" class="form-check-label">Merk Mobil</label></td>
                                    <td style="text-align:right;"><input type="checkbox" class="checkbox checkbox_tabel" id="tabel_merk_mobil" name="tabel_merk_mobil"></td>
                                </tr>
                                <tr>
                                    <td style="white-space:nowrap"><label for="tabel_warna_mobil" class="form-check-label">Warna Mobil</label></td>
                                    <td style="text-align:right;"><input type="checkbox" class="checkbox checkbox_tabel" id="tabel_warna_mobil" name="tabel_warna_mobil"></td>
                                </tr>
                                <tr>
                                    <td style="white-space:nowrap"><label for="tabel_kode" class="form-check-label">Kode Konsumen</label></td>
                                    <td style="text-align:right;"><input type="checkbox" class="checkbox checkbox_tabel" id="tabel_kode" name="tabel_kode"></td>
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
                        <div class="col-md-6">
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
                    </div>
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-md-12">
                            <input type="submit" name="cetak" value="Cetak" class="btn btn-primary ">
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
</script>