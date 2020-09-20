<div class="panel panel-default">
    <div class="panel-heading">
        Cetak Laporan Data Konsumen
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <form method="GET" action="page/cetak.php" target="cetak">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Dari Tanggal Daftar</label>
                                    <input class="form-control" name="tgl_mulai" type="date" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Sampai Tanggal Daftar </label>
                                    <input class="form-control" name="tgl_selesai" type="date" />
                                    <input type="text" style="display:none" name="page" value="data_konsumen" />
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 20px;">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <input type="submit" name="cetak" value="Cetak" class="btn btn-primary btn-block">
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <a href="page/cetak.php?page=data_konsumen" class="btn btn-default btn-block" target="cetak"> Cetak Semua</a>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>