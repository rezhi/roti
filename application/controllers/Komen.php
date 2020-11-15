<?php
class Komen extends CI_Controller{

	public $model = NULL;
	public function __construct(){
		parent::__construct();
		$this->load->model('Model_Komen');
		$this->model = $this->Model_Komen;

		$this->load->database();
		$this->load->library('session');
		$this->load->helper('url');

	}
	
public function index(){
		$this->load->view('v_admin');
	}
	public function create(){
		if(isset($_POST['btnSubmit'])){
			
			$this->model->nama_komentar = $_POST['nama_komentar'];
			$this->model->komentar = $_POST['komentar'];
			
			$this->model->insert();
			redirect('Komen');
		}else{
			$this->load->view('v_admin', ['model'=>$this->model] );
		}
	}
	
	
}



?>