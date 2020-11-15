<?php
class Pelanggan extends CI_Controller{

	public $model = NULL;
	public function __construct(){
		parent::__construct();
		$this->load->model('Model_Pelanggan');
		$this->model = $this->Model_Pelanggan;

		$this->load->database();
		$this->load->library('session');
		$this->load->helper('url');

	}
	public function index(){
		$this->read();
	}

	
	public function read(){
		$rows=$this->model->read();
		$this->load->view('PELANGGAN/crud_read_view', ['rows'=>$rows]);
	}
	
	public function delete ($id_pelanggan_del){
		$this->model->id_pelanggan=$id_pelanggan_del;
		$this->model->delete();
		redirect('Pelanggan');
	}
}



?>