<?php
class Komentar extends CI_Controller{

	public $model = NULL;
	public function __construct(){
		parent::__construct();
		$this->load->model('Model_Komentar');
		$this->model = $this->Model_Komentar;

		$this->load->database();
		$this->load->library('session');
		$this->load->helper('url');

	}
	public function index(){
		$this->read();
	}

	
	
	public function read(){
		$rows=$this->model->read();
		$this->load->view('KOMENTAR/crud_read_view', ['rows'=>$rows]);
	}

	public function create(){
		if(isset($_POST['btnSubmit'])){
			$this->model->id_komentar = $_POST['id_komentar'];
			$this->model->nama_komentar = $_POST['nama_komentar'];
			$this->model->komentar = $_POST['komentar'];
			
			$this->model->insert();
			redirect('Komentar');
		}else{
			$this->load->view('v_admin', ['model'=>$this->model] );
		}
	}
	
	public function delete ($id_komentar_del){
		$this->model->id_komentar=$id_komentar_del;
		$this->model->delete();
		redirect('Komentar');
	}
}



?>