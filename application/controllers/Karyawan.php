<?php
class Karyawan extends CI_Controller{

	public $model = NULL;
	public function __construct(){
		parent::__construct();
		$this->load->model('Model_Karyawan');
		$this->model = $this->Model_Karyawan;

		$this->load->database();
		$this->load->library('session');
		$this->load->helper('url');

	}
	public function index(){
		$this->read();
	}

	public function create(){
		if(isset($_POST['btnSubmit'])){
			$this->model->id_karyawan = $_POST['id_karyawan'];
			$this->model->nama_karyawan = $_POST['nama_karyawan'];
			$this->model->username = $_POST['username'];
			$this->model->password = $_POST['password'];
			$this->model->alamat = $_POST['alamat'];
			$this->model->hp = $_POST['hp'];
			$this->model->jk = $_POST['jk'];
			$this->model->insert();
			redirect('Karyawan');
		}else{
			$this->load->view('KARYAWAN/crud_create_view', ['model'=>$this->model] );
		}
	}
	
	public function read(){
		$rows=$this->model->read();
		$this->load->view('KARYAWAN/crud_read_view', ['rows'=>$rows]);
	}
	public function update($id_karyawan_up){
		if(isset($_POST['btnSubmit'])){
			$this->model->id_karyawan = $_POST['id_karyawan'];
			$this->model->nama_karyawan = $_POST['nama_karyawan'];
			$this->model->username = $_POST['username'];
			$this->model->password = $_POST['password'];
			$this->model->alamat = $_POST['alamat'];
			$this->model->hp = $_POST['hp'];
			$this->model->jk = $_POST['jk'];
			$this->model->update();
			redirect('Karyawan');
		}else{
			$query=$this->db->query("SELECT * FROM karyawan WHERE id_karyawan='$id_karyawan_up'");
			$row=$query->row();
			$this->model->id_karyawan=$row->id_karyawan;
			$this->model->nama_karyawan=$row->nama_karyawan;
			$this->model->username=$row->username;
			$this->model->password=$row->password;
			$this->model->alamat=$row->alamat;
			$this->model->hp = $row->hp;
			$this->model->jk = $row->jk;
			$this->load->view('KARYAWAN/crud_update_view', ['model'=>$this->model]);
		}

	}
	public function delete ($id_karyawan_del){
		$this->model->id_karyawan=$id_karyawan_del;
		$this->model->delete();
		redirect('Karyawan');
	}
}



?>