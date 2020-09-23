<div class="row">
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                Cetak Semua Data Barang
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12" onclick="cetak_semua_barang_capture()">
                        <h4>Kostumisasi</h4>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="cetak_semua_barang_nama" checked="">
                            <label for="cetak_semua_barang_nama" class="form-check-label">Nama Barang</label>
                            <input type="checkbox" class="form-check-input" id="cetak_semua_barang_harga_beli" checked="">
                            <label for="cetak_semua_barang_harga_beli" class="form-check-label">Harga Beli</label>
                            <input type="checkbox" class="form-check-input" id="cetak_semua_barang_harga_jual" checked="">
                            <label for="cetak_semua_barang_harga_jual" class="form-check-label">Harga Jual</label>
                            <input type="checkbox" class="form-check-input" id="cetak_semua_barang_stok" checked="">
                            <label for="cetak_semua_barang_stok" class="form-check-label">Stok</label>
                            <input type="checkbox" class="form-check-input" id="cetak_semua_barang_kategori" checked="">
                            <label for="cetak_semua_barang_kategori" class="form-check-label">Kategori</label>
                            <input type="checkbox" class="form-check-input" id="cetak_semua_barang_gambar">
                            <label for="cetak_semua_barang_gambar" class="form-check-label">Gambar</label>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="#" target="blank" id="cetak_semua_barang_link"><button class="btn btn-primary btn-block"><i class="fa fa-print"></i> Cetak Laporan</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">

    </div>
</div>


<script>
    // cetak semua barang
    // page/cetak/cetak.php?page=data_barang
    function cetak_semua_barang_capture() {
        let cetak = {
            link: document.querySelector('#cetak_semua_barang_link'),
            nama: document.querySelector('#cetak_semua_barang_nama'),
            harga_beli: document.querySelector('#cetak_semua_barang_harga_beli'),
            harga_jual: document.querySelector('#cetak_semua_barang_harga_jual'),
            stok: document.querySelector('#cetak_semua_barang_stok'),
            kategori: document.querySelector('#cetak_semua_barang_kategori'),
            gambar: document.querySelector('#cetak_semua_barang_gambar')
        }
        let q = {};

        if (cetak.nama.checked) q.nama = 1;
        else q.nama = 0;

        if (cetak.harga_beli.checked) q.harga_beli = 1;
        else q.harga_beli = 0;

        if (cetak.harga_jual.checked) q.harga_jual = 1;
        else q.harga_jual = 0;

        if (cetak.stok.checked) q.stok = 1;
        else q.stok = 0;

        if (cetak.kategori.checked) q.kategori = 1;
        else q.kategori = 0;

        if (cetak.gambar.checked) q.gambar = 1;
        else q.gambar = 0;

        const link = `page/cetak/cetak.php?page=data_master&submenu=barang&type=semua&nama=${q.nama}&beli=${q.harga_jual}&jual=${q.harga_jual}&stok=${q.stok}&kategori=${q.kategori}&gambar=${q.gambar}`;
        cetak.link.setAttribute('href', link);
    }
</script>