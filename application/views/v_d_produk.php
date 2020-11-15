     
     <section class="site-section bg-light">
      <div class="container">
        
        <div class="row">
          <div class="col-md-12">
            <h3>Macam-macam Roti dan Kue</h3>
          
              <a class="btn btn-info" href="<?php echo base_url()?>Produk">Kembali</a>
              <form action="Riwayat" method="post">
                </form>
                  <p align="center">
                  <table class="table table-bordered" id="dataTable" cellspacing="0">
                    <tr>
                      
                      <th>Nama Roti</th>
                      <th>Gambar</th>
                      <th>Harga</th>
                      <th> <center> Aksi </center></th>
                    </tr>
                    <?php  
                    $no = 1;
                    foreach ($data as $row){ ?>
                    <tr>
                      
                      <td><?php echo $row->nama_roti;?></td>
                      <td><?php echo '<img src="'.base_url("images/".$row->gambar).'" width="100" height="100">'; ?></td>
                      <td><?php echo $row->harga;?></td>
                    <td>
                      <a href="javascript:;"
                            data-id_roti="<?php echo $row->id_roti ?>"
                           
                            data-nama_roti="<?php echo $row->nama_roti ?>"
                            data-harga="<?php echo $row->harga ?>"
                            data-toggle="modal" data-target="#edit-data">
                            <button  data-toggle="modal" data-target="#ubah-data" class="btn btn-warning">Tambah</button></a></td>
                      
                    </tr>
                    <?php $no++;
                  }?>
                  </table>
                </p>

                 <!-- Modal Edit -->
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data" class="modal fade">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                      <h4 class="modal-title">Keranjang</h4>
                  </div>
                  <form class="form-horizontal" action="<?php echo base_url('Produk/inputdetail')?>" method="post" enctype="multipart/form-data" role="form">
                    <div class="modal-body">
                      <!-- <div class="form-group">
                                <label class="col-lg-4 col-sm-2 control-label">ID Roti</label>
                                <div class="col-lg-10">
                                    <input class="form-control" id="id_roti" name="id_roti" placeholder="Masukkan Jumlah">
                                </div>
                            </div> -->
                            <div class="form-group">
                                <label class="col-lg-4 col-sm-2 control-label">Nama Roti</label>
                                <div class="col-lg-10">
                                  <input type="hidden" id="id_roti" name="id_roti">
                                  <input class="form-control" id="nama_roti" name="nama_roti" placeholder="Tuliskan Nama"></input>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-4 col-sm-2 control-label">Harga</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="harga" name="harga" placeholder="Tuliskan harga">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-4 col-sm-2 control-label">Jumlah</label>
                                <div class="col-lg-10">
                                    <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Masukkan Jumlah">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-success" type="submit"> Tambah&nbsp;</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal"> Batal</button>
                          </div></form></div></div></div>


              
            </div>
          </div>
          
          <script src="<?php echo base_url().'assets/js/jquery-3.3.1.js'?>" type="text/javascript"></script>
          <script src="<?php echo base_url().'assets/js/bootstrap.js'?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'assets/js/jquery-ui.js'?>" type="text/javascript"></script>
    <script>
      $(document).ready(function() {
          // Untuk sunting
          $('#edit-data').on('show.bs.modal', function (event) {
              var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
              var modal          = $(this)
 
              // Isi nilai pada field
              modal.find('#id_roti').attr("value",div.data('id_roti'));
              modal.find('#nama_roti').attr("value",div.data('nama_roti'));
              modal.find('#harga').attr("value",div.data('harga'));
          });
      });
      $(document).ready(function() {
          // Untuk sunting
          $('#tambah-data').on('show.bs.modal', function (event) {
              var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
              var modal          = $(this)
 
              // Isi nilai pada field
              modal.find('#id_roti').attr("value",div.data('id_roti'));
              modal.find('#nama_roti').attr("value",div.data('nama_roti'));
              modal.find('#harga').attr("value",div.data('harga'));
          });
      });
  </script>

        </div>
      </div>
    </section>      
    <!-- END section -->
   
