 <section class="site-section bg-light" >
      <div class="container">
        <div class="row">

          <div class="col-md-12 mb-5 site-animate">
            
        <h3 class="display-12">Detail Pembelanjaan</h3>
        <a class="btn btn-info" href="<?php echo base_url()?>Riwayat">Kembali</a><br><br>
        
<table  id="bootstrap-data-table" class="table table-striped table-bordered">
    <tr>
        
        <th >Nama Roti </th>
        <th >Jumlah</th>
        <th >Total</th>
    </tr>
    <?php
foreach($data as $row){
    ?>
    <tr>
       
        <td><?php echo $row->nama_roti; ?></td>
        <td><?php echo $row->jumlah; ?></td>
        <td><?php echo $row->total; ?></td>
    </tr>
    <?php
}
?>
</table>

</div>
</div>
</div>
</section>