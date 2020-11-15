<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MULTIRASA ADMIN</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="<?php echo base_url('assets/admin/images/favicon.png')?>">
    <link rel="shortcut icon" href="<?php echo base_url('assets/admin/images/favicon.png')?>">

    <link rel="stylesheet" href="<?php echo base_url('assets/admin/css/normalize.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/css/font-awesome.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/css/themify-icons.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/css/pe-icon-7-filled.css')?>">


    <link href="<?php echo base_url('assets/admin/weather/css/weather-icons.css')?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/admin/calendar/fullcalendar.css')?>" rel="stylesheet" />

    <link rel="stylesheet" href="<?php echo base_url('assets/admin/css/style.css')?>">
    <link href="<?php echo base_url('assets/admin/css/charts/chartist.min.css')?>" rel="stylesheet"> 
    <link href="<?php echo base_url('assets/admin/css/lib/vector-map/jqvmap.min.css')?>" rel="stylesheet"> 


    <style>
    th {
      background-color: black;
      color: white;
    }
    th, td {
text-align: center;
    }
    #weatherWidget .currentDesc {
        color: #ffffff!important;
    }
        .traffic-chart { 
            min-height: 335px; 
        }
        #flotPie1  {
            height: 150px;
        } 
        #flotPie1 td {
            padding:3px;
        }
        #flotPie1 table {
            top: 20px!important;
            right: -10px!important;
        }
        .chart-container {
            display: table;
            min-width: 270px ;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        #flotLine5  {
             height: 105px;
        } 

        #flotBarChart {
            height: 150px;
        }
        #cellPaiChart{
            height: 160px;
        }

    </style>

</head>
<body>


    <!-- Left Panel --> 
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default"> 
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li >
                        <a href=""><i class="app-menu__icon fa fa-laptop"></i>&nbsp;&nbsp;<b>BERANDA</b> </a>
                    </li>
                    <li ><a><b><i class="app-menu__icon fa fa-table"></i>&nbsp;&nbsp;DATA MASTER</b></a></li><!-- /.menu-title -->
                            <li ><i class="fa fa-circle">&nbsp;&nbsp;<a href="<?php echo base_url()?>Karyawan/index">Tabel Karyawan</a></i></li>
                            <li ><i class="fa fa-circle">&nbsp;&nbsp;<a href="<?php echo base_url()?>Pelanggan/index">Tabel Pelanggan</a></i></li>
                            <li ><i class="fa fa-circle">&nbsp;&nbsp;<a href="<?php echo base_url()?>Roti/index">Tabel Roti</a></i></li>
                            <li ><i class="fa fa-circle">&nbsp;&nbsp;<a href="<?php echo base_url()?>Kategori/index">Tabel Kategori</a></i></li>
                    <li ><a><b><i class="app-menu__icon fa fa-credit-card"></i>&nbsp;&nbsp;TRANSAKSI</b></a></li>
                            
                            <li ><i class="fa fa-circle">&nbsp;&nbsp;<a href="<?php echo base_url()?>Pesanan/index">Tabel Transaksi</a></i></li>
                    <li ><a href="<?php echo base_url()?>Laporan/index"><b><i class="app-menu__icon fa fa-bar-chart"></i>&nbsp;&nbsp;LAPORAN</b></a></li>
                    <li ><a href="<?php echo base_url()?>Komentar/index"><b><i class="app-menu__icon fa fa-comment-o"></i>&nbsp;&nbsp;KOMENTAR</b></a></li>
                    <li ><a href="<?php echo base_url()?>Gambar/index"><b><i class="app-menu__icon fa fa-file-image-o"></i>&nbsp;&nbsp;GALERI</b></a></li>  
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel --> 
    <!-- Left Panel -->



    <!-- Right Panel --> 
    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">  
            <div class="top-left">
                <div class="navbar-header"> 
                    <a style="color: #d35400;">CAKE & BAKERY</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a> 
                </div> 
            </div>
            <div class="top-right"> 
                <div class="header-menu"> 
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>

                        

                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <p> Rezhi</p>
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="#"><i class="fa fa-power-off"></i>Logout</a>
                        </div>
                    </div> 
                </div>  
            </div>
        </header><!-- /header -->
        <!-- Header-->


        <div class="content pb-0">

           
           
 <main class="app-content">
      <div class="app-title">
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Beranda</a></li>
          <li class="breadcrumb-item"><a href="#">Laporan</a></li>
        </ul>
      </div>


<form method="get" action="<?php echo base_url('LaporanSIP/cetak')?>">
        <label>Filter Berdasarkan</label><br>
        <select name="filter" id="filter">
            <option value="">Pilih</option>
            <option value="1">Per Tanggal</option>
            <option value="2">Per Bulan</option>
            <option value="3">Per Tahun</option>
        </select>
        <br /><br />
        <div id="form-tanggal">
            <label>Tanggal</label><br>
            <input type="text" name="tanggal" class="input-tanggal" />
            <br /><br />
        </div>
        <div id="form-bulan">
            <label>Bulan</label><br>
            <select name="bulan">
                <option value="">Pilih</option>
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
            </select>
            <br /><br />
        </div>
        <div id="form-tahun">
            <label>Tahun</label><br>
            <select name="tahun">
                <option value="">Pilih</option>
                <?php
                foreach($option_tahun as $data){ // Ambil data tahun dari model yang dikirim dari controller
                    echo '<option value="'.$data->tahun.'">'.$data->tahun.'</option>';
                }
                ?>
            </select>
            <br /><br />
        </div>
        <button type="submit" class="btn btn-info">Tampilkan</button>
        <a href="<?php echo base_url('LaporanSIP'); ?>">Reset Filter</a>
    </form>
    <hr />
    
    <b><?php echo $ket; ?></b><br /><br />
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
   <tr>
        <th>Id Transaksi</th>
        <th>Nama Pelanggan</th>
        <th>Tanggal</th>
        <th>TOTAL</th>
        <th>AKSI</th>
    </tr>
    <tr>
        <?php
          if( ! empty($transaksi)){
          foreach($transaksi as $data){
          $tgl = date('d-m-Y', strtotime($data->tgl_transaksi)); 
        ?>
          <td style="text-align:left;"><?php echo $tgl ?></td>
          <td style="text-align:left;"><?php echo $data->no_transaksi ?></td>
          <td style="text-align:left;"><?php echo $data->jumlah ?></td>
          <td style="text-align:left;"><?php echo $data->total_jual ?></td>
          <td style="text-align:center;"> 
            <a class="btn btn-mini" href="<?php echo site_url('LaporanSIP/detail/'.$data->no_transaksi)?>">
                        <button class="btn btn-info">Detail</button></a>
                    </td>
        </tr>
        <?php   }} ?>
        
        <?php
          if( ! empty($transaksi)){
          foreach($pesanan as $data){
          $tgl = date('d-m-Y', strtotime($data->tgl_pesan)); 
        ?>
        <tr>
        <td><?php echo $row->id_transaksi; ?></td>
        <td><?php echo $row->nama_lengkap; ?></td>
        <td><?php echo $row->tgl_pesan; ?></td>
        <td><?php echo $row->total_bayar; ?></td>
        <td><a style="color: red" href="">HAPUS</a></td>
    </tr>
        <?php   }} ?>
      </table>
<!--       <a href="<?php echo base_url()?>LaporanSIP/cetak" target="_blank" ><button class="btn btn-info"> Cetak</button></a> -->

   
   <script src="<?php echo base_url().'assets/js/jquery-3.3.1.js'?>" type="text/javascript"></script>
    <!-- <script src="<?php echo base_url().'assets/js/bootstrap.js'?>" type="text/javascript"></script> -->
    <script src="<?php echo base_url().'assets/js/jquery-ui.js'?>" type="text/javascript"></script>

    <script>
    $(document).ready(function(){ // Ketika halaman selesai di load
        $('.input-tanggal').datepicker({
            dateFormat: 'yy-mm-dd' // Set format tanggalnya jadi yyyy-mm-dd
        });
        $('#form-tanggal, #form-bulan, #form-tahun').hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya
        $('#filter').change(function(){ // Ketika user memilih filter
            if($(this).val() == '1'){ // Jika filter nya 1 (per tanggal)
                $('#form-bulan, #form-tahun').hide(); // Sembunyikan form bulan dan tahun
                $('#form-tanggal').show(); // Tampilkan form tanggal
            }else if($(this).val() == '2'){ // Jika filter nya 2 (per bulan)
                $('#form-tanggal').hide(); // Sembunyikan form tanggal
                $('#form-bulan, #form-tahun').show(); // Tampilkan form bulan dan tahun
            }else{ // Jika filternya 3 (per tahun)
                $('#form-tanggal, #form-bulan').hide(); // Sembunyikan form tanggal dan bulan
                $('#form-tahun').show(); // Tampilkan form tahun
            }
            $('#form-tanggal input, #form-bulan select, #form-tahun select').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
        })
    })     
   </script>
    
</table>
    
<table  id="bootstrap-data-table" class="table table-striped table-bordered">
    <tr>
        <th>Id Transaksi</th>
        <th>Nama Pelanggan</th>
        <th>Tanggal</th>
        <th>TOTAL</th>
        <th>AKSI</th>
    </tr>
    <?php
foreach($rows as $row){
    ?>
    <tr>
        <td><?php echo $row->id_transaksi; ?></td>
        <td><?php echo $row->nama_lengkap; ?></td>
        <td><?php echo $row->tgl_pesan; ?></td>
        <td><?php echo $row->total_bayar; ?></td>
        <td><a style="color: red" href="">HAPUS</a></td>
    </tr>
    <?php
}
?>
<tr>
        <td colspan="3"><strong>Total</strong></td>
        <td></td>
    </tr>
</table></center>
    </main>   



        <div class="clearfix"></div>
        <center>
        <footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-12">
                        Copyright &copy;TimSAR
                    </div>
                </div>
            </div>
        </footer></center>

    </div><!-- /#right-panel -->


    <script src="<?php echo base_url('assets/admin/js/vendor/jquery-2.1.4.min.js')?>"></script>
    <script src="<?php echo base_url('assets/admin/js/popper.min.js')?>"></script>
    <script src="<?php echo base_url('assets/admin/js/plugins.js')?>"></script>
    <script src="<?php echo base_url('assets/admin/js/main.js')?>"></script>

    <script src="<?php echo base_url('assets/admin/js/lib/chart-js/Chart.bundle.js')?>"></script>


    <!--Chartist Chart-->
    <script src="<?php echo base_url('assets/admin/js/lib/chartist/chartist.min.js')?>"></script>
    <script src="<?php echo base_url('assets/admin/js/lib/chartist/chartist-plugin-legend.js')?>"></script> 

    
    <script src="<?php echo base_url('assets/admin/js/lib/flot-chart/jquery.flot.js')?>"></script>
    <script src="<?php echo base_url('assets/admin/js/lib/flot-chart/jquery.flot.pie.js')?>"></script>
    <script src="<?php echo base_url('assets/admin/js/lib/flot-chart/jquery.flot.spline.js')?>"></script>


    <script src="<?php echo base_url('assets/admin/weather/js/jquery.simpleWeather.min.js')?>"></script>
    <script src="<?php echo base_url('assets/admin/weather/js/weather-init.js')?>"></script>


    <script src="<?php echo base_url('assets/admin/js/lib/moment/moment.js')?>"></script>
    <script src="<?php echo base_url('assets/admin/calendar/fullcalendar.min.js')?>"></script>
    <script src="<?php echo base_url('assets/admin/calendar/fullcalendar-init.js')?>"></script>





<div id="container">
  
 
  
</div>



</body>
</html>