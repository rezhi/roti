<?php
class Daftar extends CI_Controller{
	public function index(){
		$this->load->model('Daftarmodel');
		$model = $this->Daftarmodel;
		
		if (isset ($_POST ['register'])){
			$model->nama_lengkap = $_POST['nama_lengkap'];
			$model->username = $_POST['username'];
			$model->password = $_POST['password'];
			$model->hp = $_POST['hp'];
			$model->insert();
			$this->load->view('welcome_message/#login_form',['model'=>$model]);
		}else{
			$this->load->view('coba',['model'=>$model]);
		}
	}
}