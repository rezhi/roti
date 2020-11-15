<section class="site-section bg-light">
      <div class="container">
        
        <div class="row">
          <div class="col-md-12">
           <form class="form-horizontal" action="<?php echo base_url('Keranjang/input').'/'.$item[0]->id_pesanan?>" method="post" enctype="multipart/form-data" role="form">
          <p style="color: black">
           <label>Nama Pemesan : </label>&nbsp;&nbsp;&nbsp;<input type="text" name="nama_lengkap" value="<?php echo $_SESSION["username"] ?>" readonly>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           Tanggal Ambil :&nbsp;&nbsp;&nbsp;<input type="date" name="tgl_ambil">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           Jam Ambil :&nbsp;&nbsp;&nbsp;<input type="time" name="jam_ambil"></p><br>

           <div class="column">
              <p>
                <a href="javascripts:;">
                <button data-toggle="modal" data-target="#tambah-data" class="btn btn-primary">
                  <i class="glyphicon glyphicon-pencil"></i>
                  Tambah Roti
                </button></a>
              </p>
          </div>

          <!-- modal tambah -->
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="tambah-data" class="modal fade">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                          <h4 class="modal-title">Tambah Data</h4>
                      </div>
                      
                        
                            <div class="form-group">
                                <label class="control-label col-md-3">Kategori</label>
                                <div class="col-md-8">
                                    <select name="kategori" id="kategori" class="form-control">
                                        <option value="0">-PILIH-</option>
                                        <?php foreach($data->result() as $row):?>
                                            <option value="<?php echo $row->id_kategori;?>"><?php echo $row->nama_kategori;?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Sub Kategori</label>
                                <div class="col-md-8">
                                    <select name="subkategori" class="subkategori form-control">
                                        <option value="0">-PILIH-</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-4 col-sm-2 control-label">Jumlah</label>
                                <div class="col-lg-10">
                                    <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Masukkan Jumlah">
                                </div>
                            </div>
            
                            <div class="modal-footer">
                                <button class="btn btn-info" type="submit"> Simpan&nbsp;</button>
                                <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
                            </div>
                          <!-- </form> -->
                      </div>
                  </div>
              </div>
          </div>

          <script type="text/javascript" src="<?php echo base_url().'assets/jss/jquery-2.2.3.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/jss/bootstrap.js'?>"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#kategori').change(function(){
            var id=$(this).val();
            $.ajax({
                url : "<?php echo base_url();?>Keranjang/get_subkategori",
                method : "POST",
                data : {id: id},
                async : false,
                dataType : 'json',
                success: function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<option>'+data[i].nama_roti+'</option>';
                    }
                    $('.subkategori').html(html);
                     
                }
            });
        });
    });
</script>


            <table class="table table-bordered table-condensed"  >
                <thead>
                    <tr>
                        <th>ID Roti</th>
                        <th>Nama Roti</th>
                        <th style="text-align:center;">Harga(Rp)</th>
                        <th style="text-align:center;">Jumlah</th>
                        <th style="text-align:center;">Sub Total</th>
                        <th style="width:100px;text-align:center;">Aksi</th>
                    </tr>
                </thead>
                 <tbody>
                  
                    <?php foreach ($item as $rows){ ?>
                    
                    <tr>
                         <td><?php echo $rows->id_roti; ?></td>
                         <td><?php echo $rows->nama_roti;?></td>
                         <td style="text-align:right;"><?php echo number_format($rows->harga);?></td>
                         <td style="text-align:center;"><?php echo number_format($rows->jumlah);?></td>
                         <td style="text-align:right;"><?php echo number_format($rows->total);?></td>
                         <td style="text-align:center;"><a href="<?php echo base_url().'Keranjang/remove/'.$rows->id_pesanan.'/'.$rows->id_roti;?>" class="btn btn-warning btn-xs"><span class="fa fa-close"></span> Batal</a></td>
                    </tr>
                    
                   
                    <?php } ?>
                </tbody>
                 
              </table>

          <!-- <form action="<?php echo base_url().'Keranjang/input/'.$item[0]->id_pesanan?>" method="post"> -->
            <table>
               <?php foreach ($total as $b){ ?>
                <tr>
                    <td style="width:760px;" rowspan="2"></td>
                    <td style="width:140px;"><b>TOTAL (Rp)</b></td>
                    <td style="text-align:right;width:140px;"><input type="text" name="total" value="<?php echo $b->subtotal;?>" class="form-control input-sm" style="text-align:center;margin-bottom:5px;" ></td>
                    
                </tr>
                <?php } ?>
                <tr>
                    <td></td>
                    <td><input type="hidden" class="form-control" id="id_pesan" name="id_pesan" placeholder="transaksi" style="width:200px;" value="" readonly></td>
                  </tr>
                    <tr>
                       <td></td>
                       <td></td>
                    <td><button  name="btnTambah" class="btn btn-success btn-md"> Simpan</button></td>
                </tr>
            </table>
            <!-- </form> -->
          </div>
        </div>
      </div><br><br>
    </form>


   
