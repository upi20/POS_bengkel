<div class="panel panel-default">
    <div class="panel-heading">
        Cetak Laporan
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">

                <form method="post" action="laporan/laporan_kategori_barang.php">

                    <div class="form-group">
                        <label>Dari Tanggal </label>
                        <input class="form-control" name="tanggal1" type="date" />

                    </div>

                    <div class="form-group">
                        <label>Sampai Tanggal </label>
                        <input class="form-control" name="tanggal2" type="date" />

                    </div>


                    <div>

                        <input type="submit" name="cetak" value="Cetak" target="blank" class="btn btn-primary">
                        <a href="laporan/laporan_kategori_barang.php" class="btn btn-default" target="blank" style="margin-top: 8px; margin-left: 5px;"> Cetak Semua</a>
                    </div>
            </div>

            </form>
        </div>
    </div>
</div>
</div>