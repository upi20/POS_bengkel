<!-- Modal hapus -->
<!-- ================================================================================================ -->
<div class="modal fade" id="modalHapus">
     <div class="modal-dialog">
          <div class="modal-content">
               <div class="modal-header">
                    <button class="close" data-dismiss="modal"><span>&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Hapus Pengadaan Barang</h4>
               </div>
               <div class="modal-body">
                    <div class="container-fluid">
                         <div class="row">
                              <div class="col-md-12">
                                   <form method="POST">
                                        <div class="form-group">
                                             <div id="pengadaan_hapus"></div>
                                             <input hidden="" name="id_barang_masuk_hapus" id="id_barang_masuk_hapus" />
                                        </div>
                              </div>
                         </div>
                    </div>
               </div>
               <div class="modal-footer">
                    <input type="submit" name="simpan_hapus" value="Hapus" class="btn btn-danger" id="btn_hapus">
                    </form>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
               </div>
          </div>
     </div>
</div>
<script>
     function hapusData(data) {
          let pengadaan_hapus = document.querySelector('#pengadaan_hapus');
          let id_barang_masuk_hapus = document.querySelector('#id_barang_masuk_hapus');
          let btnHapusVisible = (visible = true) => {
               let btn_hapus = document.querySelector('#btn_hapus');
               if (visible) btn_hapus.setAttribute('disabled', '');
               else btn_hapus.removeAttribute('disabled');
          }
          if (Number(data_barang[data.dataset.id_barang_data].barang_data_stok) - Number(data.dataset.barang_masuk_jumlah) < 0) {
               btnHapusVisible();
               pengadaan_hapus.innerHTML = `
                    <span>
                    Pengadaan barang dari suplier <strong>${data.dataset.barang_suplier_nama}</strong> Tidak bisa dihapus.. !<br>
                    <i class="text-danger">Karena stok akan menjadi minus</i>
                    </span>
               `;
          } else {
               btnHapusVisible(false);
               id_barang_masuk_hapus.value = data.dataset.id_barang_masuk;
               pengadaan_hapus.innerHTML = `
                    <span>
                    Yakin akan menghapus data pengadaan dari suplier <strong>${data.dataset.barang_suplier_nama}</strong> ..?<br>
                    <i>Menghapus pengadaan ini akan mengurangi stok yang sudah ada</i>
                    </span>
               `;
          }
     }
</script>