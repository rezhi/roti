<?php
class Kategori extends CI_Controller{

	public $model = NULL;
	public function __construct(){
		parent::__construct();
		$this->load->model('Model_Kategori');
		$this->model = $this->Model_Kategori;

		$this->load->database();
		$this->load->library('session');
		$this->load->helper('url');

	}
	public function index(){
		$this->read();
	}

	public function create(){
		if(isset($_POST['btnSubmit'])){
			$this->model->id_kategori = $_POST['id_kategori'];
			$this->model->nama_kategori = $_POST['nama_kategori'];
			$this->model->insert();
			redirect('Kategori');
		}else{
			$this->load->view('KATEGORI/crud_create_view', ['model'=>$this->model] );
		}
	}
	
	public function read(){
		$rows=$this->model->read();
		$this->load->view('KATEGORI/crud_read_view', ['rows'=>$rows]);
	}
	public function update($id_kategori_up){
		if(isset($_POST['btnSubmit'])){
			$this->model->id_kategori = $_POST['id_kategori'];
			$this->model->nama_kategori = $_POST['nama_kategori'];
			$this->model->update();
			redirect('Kategori');
		}else{
			$query=$this->db->query("SELECT * FROM kategori WHERE id_kategori='$id_kategori_up'");
			$row=$query->row();
			$this->model->id_kategori=$row->id_kategori;
			$this->model->nama_kategori=$row->nama_kategori;
			$this->load->view('KATEGORI/crud_update_view', ['model'=>$this->model]);
		}

	}
	public function delete ($id_kategori_del){
		$this->model->id_kategori=$id_kategori_del;
		$this->model->delete();
		redirect('Kategori');
	}
}



?>