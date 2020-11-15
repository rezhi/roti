<?php 
class Riwayat extends CI_Controller{
	public $model = NULL;
	public function __construct(){
		parent::__construct();
		$this->load->model('Model_Riwayat');
		$this->model = $this->Model_Riwayat;

		 $this->load->library('session');
		$this->load->database();
		$this->load->helper('url');

	}
	public function index (){
		//if($this->session->userdata('username')){
	//		$data['riwayat'] = $this->m_riwayat->data();
		$id= $_SESSION['id'];
		$data=$this->model->read($id);
				$this->load->view('element/header');
				$this->load->view('v_riwayat', ['data' => $data]);
				$this->load->view('element/footer');
			}//else{
		//		redirect('Login');
			//}
	//}

	public function detail(){
		$data = array( 'data' => $this->model->get_detail());
		$id = $this->uri->segment(3);
		$rows=$this->model->home($id);
		$this->load->view('element/header');
		$this->load->view('v_d_riwayat', ['data'=>$rows]);
		
		$this->load->view('element/footer');
	}

	public function home(){
		$id = $this->uri->segment(3);
		$rows=$this->model->home($id);
		$this->load->view('v_d_produk', ['rows'=>$rows]);
	}

}
?>