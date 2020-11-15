<?php
class Daftar extends CI_Controller{

		public function __construct(){
		parent :: __construct();
		$this->load->database();
	}

	public function index(){
		$this->load->model('Daftarmodel');
		$model = $this->Daftarmodel;
		
		if (isset ($_POST ['register'])){
			$data = $model->insert (array( 'nama_lengkap' => $this->input->post('nama_lengkap'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'hp' => $this->input->post('hp')));
		redirect('Welcome');
		}else{
			$this->load->view('coba',['model'=>$model]);
		}
	}
}