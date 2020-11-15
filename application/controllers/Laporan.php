<?php
class Laporan extends CI_Controller{

	public $model = NULL;
	public function __construct(){
		parent::__construct();
		$this->load->model('Model_Laporan');
		$this->model = $this->Model_Laporan;

		$this->load->database();
        $this->load->library('session');
		$this->load->helper('url');

	}
	public function index(){
		$this->read();
	}
	
	public function read(){
		$row1['data']=$this->model->read();
        $rows=$this->model->readtotal();
		$this->load->view('LAPORAN/crud_read_view', $row1+ ['rows'=>$rows]);
	}
		public function home(){
        if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user
            if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];
                
                $ket = 'Data Transaksi Tanggal '.date('d-m-y', strtotime($tgl));
                
                $transaksi = $this->Model_Laporan->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di TransaksiModel
                

            }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                
                $ket = 'Data Transaksi Bulan '.$nama_bulan[$bulan].' '.$tahun;
                
                $transaksi = $this->Model_Laporan->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel
               
            }else{ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];
                
                $ket = 'Data Transaksi Tahun '.$tahun;
                
                $transaksi = $this->Model_Laporan->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
                
            }
            
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Transaksi';
            
            $transaksi = $this->Model_Laporan->view_all();
            
            // Panggil fungsi view_all yang ada di TransaksiModel
        }
        
        $data['ket'] = $ket;
        $data['transaksi'] = $transaksi;
       
        $data['option_tahun'] = $this->LaporanSIP_Model->option_tahun();

        $title=array(
	        'title'=>'Laporan'
	    );
		$this->load->view('filter', $data);
  }
	
}



?>
