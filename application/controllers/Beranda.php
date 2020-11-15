<?php 
class Beranda extends CI_Controller{

//public $model = NULL;
	public function __construct(){
		parent::__construct();
		//$this->load->model('m_masuk');
		//$this->model = $this->m_masuk;

		$this->load->library('session');
        $this->load->helper('url');
	}
	public function index(){
		//$data = array( 'data' => $this->model->get_data());
		
		$this->load->view('LOGIN/beranda');
	
	}

}
?>