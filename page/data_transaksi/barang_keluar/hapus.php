<!-- Modal hapus -->
<!-- ================================================================================================ -->
<div class="modal fade" id="modalHapus">
     <div class="modal-dialog">
          <div class="modal-content">
               <div class="modal-header">
                    <button class="close" data-dismiss="modal"><span>&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Hapus Penjualan Barang</h4>
               </div>
               <div class="modal-body">
                    <div class="container-fluid">
                         <div class="row">
                              <div class="col-md-12">
                                   <form method="POST">
                                        <div class="form-group">
                                             <div id="penjualan_hapus"></div>
                                             <input hidden="" name="id_barang_keluar_hapus" id="id_barang_keluar_hapus" />
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
          let penjualan_hapus = document.querySelector('#penjualan_hapus');
          let id_barang_keluar_hapus = document.querySelector('#id_barang_keluar_hapus');
          id_barang_keluar_hapus.value = data.dataset.id_barang_keluar;
          penjualan_hapus.innerHTML = `
                    <span>
                    Yakin akan menghapus data penjualan dari konsumen <strong>${data.dataset.barang_konsumen_nama}</strong> ..?<br>
                    <i>Menghapus penjualan ini akan mengurangi stok yang sudah ada</i>
                    </span>
               `;
     }
</script>