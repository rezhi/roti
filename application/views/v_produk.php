     <section class="site-section bg-light" id="section-offer">
      <div class="container">
        
        <div class="row">
          <div class="col-md-12 text-center mb-5 site-animate">
            <h2 class="display-4">PRODUK</h2>
            <div class="row justify-content-center">
              <div class="col-md-7">
                <p class="lead">Produk kami sajikan dengan kualitas terbaik dan harga terjangkau untuk melengkapi hari bahagia Anda.</p><hr>
              </div>
            </div>
          </div>
          
          <div class="col-md-12">
            <div class="owl-carousel site-owl">
            
            <?php foreach ($data as $data) { ?>
  
             <div class="item">
                <div class="media d-block mb-4 text-center site-media site-animate border-0">
                 <center><img src="assets/images/1.png" style="width: 150px;"></center>
                  <div class="media-body p-md-5 p-4">
                    <h5 class="mt-0 h4"><?php echo $data->nama_kategori; ?></h5>
                     <p class="mb-4"><?php echo $data->deskripsi; ?></p> 
                     <a href="<?php echo base_url(); ?>Produk/subkategori/<?php echo $data->id_kategori;?>" class="btn btn-secondary" style="color: black">Selengkapnya</a>
                    
                  </div>
                </div>
              </div>
<?php } ?>
             

              
            </div>
          </div>
          
        </div>
      </div>
    </section>      
    <!-- END section -->
   
