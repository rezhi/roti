<?php
class Roti extends CI_Controller{

	public $model = NULL;
	public function __construct(){
		parent::__construct();
		$this->load->model('Model_Roti');
		$this->model = $this->Model_Roti;

		$this->load->database();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('upload');

	}
	public function index(){
		$this->read();
	}

	public function create(){
		if(isset($_POST['btnSubmit'])){
			$this->model->id_roti = $this->model->get_id();
			$this->model->id_kategori = $_POST['id_kategori'];
			$this->model->nama_roti = $_POST['nama_roti'];
			
			$this->model->harga = $_POST['harga'];
    
    		
      $upload = $this->Model_Roti->upload();
      
      if($upload['result'] == "success"){ // Jika proses upload sukses
         // Panggil function save yang ada di GambarModel.php untuk menyimpan data ke database
        $this->Model_Roti->save($upload);
        
        redirect('Roti'); // Redirect kembali ke halaman awal / halaman view data
      }else{ // Jika proses upload gagal
        $this->model->data['message'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
        $this->load->view('ROTI/crud_create_view', ['model'=>$this->model]);
      }
		

		}else{
			$this->load->view('ROTI/crud_create_view', ['model'=>$this->model] );
		}
	}
	
	public function read(){
		$id = $this->uri->segment(3);
		$rows=$this->model->read($id);
		$kode=$this->model->get_id();
		$this->load->view('ROTI/crud_read_view', ['rows'=>$rows]);
	}
	public function update($id_roti_up){
		if(isset($_POST['btnSubmit'])){
			$this->model->id_roti = $_POST['id_roti'];
			$this->model->id_kategori = $_POST['id_kategori'];
			$this->model->nama_roti = $_POST['nama_roti'];
			$this->model->harga = $_POST['harga'];
			$this->model->update();
			redirect('Roti');
		}else{
			$query=$this->db->query("SELECT * FROM roti WHERE id_roti='$id_roti_up'");
			$row=$query->row();
			$this->model->id_roti=$row->id_roti;
			$this->model->id_kategori=$row->id_kategori;
			$this->model->nama_roti=$row->nama_roti;
			$this->model->harga=$row->harga;
			$this->load->view('ROTI/crud_update_view', ['model'=>$this->model]);
		}

	}
	public function delete ($id_roti_del){
		$this->model->id_roti=$id_roti_del;
		$this->model->delete();
		redirect('Roti');
	}
}



?>