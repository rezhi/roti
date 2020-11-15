<?php 
class Profil extends CI_Controller{
	public function index(){
		$this->load->view('element/header');
		$this->load->view('v_profil');
		$this->load->view('element/footer');
	}
}
?>