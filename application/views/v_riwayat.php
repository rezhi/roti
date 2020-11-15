    <section class="site-section bg-light" >
      <div class="container">
        <div class="row">

          <div class="col-md-12 mb-5 site-animate">
            <h3 class="display-12">Riwayat Pembelanjaan</h3>
            

      <form action="Riwayat" method="post">
      </form>
      <p align="center">
      <table class="table table-bordered" id="dataTable" cellspacing="0">
        <tr>
          
          <th>Tgl Pesan</th>
          <th>Total Belanja</th>
          <th>DP</th>
          <th>Keterangan</th>
          <th> <center> Aksi </center></th>
        </tr>
         <?php  
        $no = 1;
        foreach ($data as $row){ ?>
        <tr>
          
          <td><?php echo $row->tgl_pesan;?></td>
          <td><?php echo $row->total_bayar;?></td>
          <td><?php echo $row->dp;?></td>
          <td><?php if ($row->dp == 0   ) {
                        echo "-";
                    }
                    elseif ($row->dp < $row->total_bayar) {
                        echo "Proses";
                    }
                    else {
                        echo "Selesai";
                    };?></td>
          <td><a href="Riwayat/detail/<?php echo $row->id_pesanan?>" class="btn btn-info">Detail</a></td>
          
        </tr>
        <?php $no++;
      }?>
      </table>
    </p>

          </div>
        </div>
      </div>

<!-- isi -->


      <!-- end -->
