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


    <link rel="stylesheet" href="<?php echo base_url('assets/admin/css/normalize.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/css/font-awesome.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/css/themify-icons.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/css/pe-icon-7-filled.css')?>">


    <link rel="apple-touch-icon" href="<?php echo base_url('assets/admin/images/6.png')?>">
    <link rel="shortcut icon" href="<?php echo base_url('assets/admin/images/6.png')?>">

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
                        <a href="<?php echo base_url()?>Beranda"><i class="app-menu__icon fa fa-laptop"></i>&nbsp;&nbsp;<b>BERANDA</b> </a>
                    </li>
                    <li ><a><b><i class="app-menu__icon fa fa-table"></i>&nbsp;&nbsp;DATA MASTER</b></a></li><!-- /.menu-title -->
                            <li ><i class="fa fa-circle">&nbsp;&nbsp;<a href="<?php echo base_url()?>Karyawan/index">Tabel Karyawan</a></i></li>
                            <li ><i class="fa fa-circle">&nbsp;&nbsp;<a href="<?php echo base_url()?>Pelanggan/index">Tabel Pelanggan</a></i></li>
                            <li ><i class="fa fa-circle">&nbsp;&nbsp;<a href="<?php echo base_url()?>Roti/index/1">Tabel Roti</a></i></li>
                            <li ><i class="fa fa-circle">&nbsp;&nbsp;<a href="<?php echo base_url()?>Kategori/index">Tabel Kategori</a></i></li>
                    <li ><a><b><i class="app-menu__icon fa fa-credit-card"></i>&nbsp;&nbsp;TRANSAKSI</b></a></li>
                            
                            <li ><i class="fa fa-circle">&nbsp;&nbsp;<a href="<?php echo base_url()?>Pesanan/index">Tabel Transaksi</a></i></li>
                    <li ><a href="<?php echo base_url()?>Laporan/index"><b><i class="app-menu__icon fa fa-bar-chart"></i>&nbsp;&nbsp;LAPORAN</b></a></li>
                    <li ><a href="<?php echo base_url()?>Komentar/index"><b><i class="app-menu__icon fa fa-comment-o"></i>&nbsp;&nbsp;KOMENTAR</b></a></li> 
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
                  <a style="color: #d35400;">CAKE & BAKERY </a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
                            <p> <?php echo $_SESSION['user'];  ?></p>
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="<?php echo base_url ();?>Login"><i class="fa fa-power-off"></i>Logout</a>
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
          <li class="breadcrumb-item"><a href="#">Data Kategori</a></li>
          <li class="breadcrumb-item"><a href="#">Ubah Data Kategori</a></li>
        </ul>
      </div>
 <center>
            <center>
<b><h2 >Data Kategori</h2></b><hr>
            <table border="0" width="600px">
            <form action="create" method="POST">
                <tr>
                    <td><b><?php echo $model->labels['id_kategori']; ?></b></td>
                    <td>:</td>
                    <td><b><input readonly type="text" name="id_kategori" size="30" maxlength="30" value="<?php echo $model->id_kategori; ?>" /></b></td>
                </tr>
                <tr>
                    <td><?php echo $model->labels['nama_kategori']; ?></td>
                    <td>:</td>
                    <td><input type="text" name="nama_kategori" size="30" maxlength="30" value="<?php echo $model->nama_kategori; ?>" /></td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr><tr>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr><tr>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr><tr>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><b><input style="color: white;" type="submit" class="btn btn-primary" name="btnSubmit" value="SIMPAN"/>&nbsp;&nbsp;&nbsp;
                    <input style="color: white;" type="button" class="btn btn-danger" name="Batal" value="BATAL" onclick="javascript:history.go(-1);"/></b></td>
                </tr>
            </form>
        </table>
    </main>

        <div class="clearfix"></div>
        <center>
        <footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-12">
                        Copyright &copy; TimSAR
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
