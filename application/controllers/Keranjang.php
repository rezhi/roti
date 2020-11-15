<?php 
class Keranjang extends CI_Controller{
	public $model = NULL;
	public function __construct(){
		parent::__construct();
		$this->load->model('m_keranjang');
		$this->load->library('session');
	}
	/*public function index(){
		$data = array( 'data' => $this->m_keranjang->get_data());
		$this->load->view('element/header');
		$this->load->view('v_produk', $data);
		$this->load->view('element/footer');
	}*/

	function index(){

        $x['data']=$this->m_keranjang->get_kategori();
  //       $this->load->view('element/header');
  //       $this->load->view('v_keranjang', $x);
		// $this->load->view('element/footer');
		$nama=$_SESSION['username'];
    	$idpesan=$this->m_keranjang->get_idpesan($nama);
       $x['item']=$this->m_keranjang->read($idpesan,$nama);
        $x['total']=$this->m_keranjang->total($idpesan,$nama);
       $this->load->view('element/header');
		$this->load->view('v_keranjang', $x);
		$this->load->view('element/footer');
  }
 
    

    function get_subkategori(){
        $id=$this->input->post('id');
        $data=$this->m_keranjang->get_subkategori($id);
        echo json_encode($data);
    }

	function input(){
		 
		if (isset($_POST['btnTambah'])){
			$total =$_POST['total'];
			$idtrans = $this->m_keranjang->get_idtrans();
			$this->m_keranjang->masuk($total, $idtrans);
			$user=$_SESSION['id'];
			$tgl=$_POST['tgl_ambil'];
			$jam=$_POST['jam_ambil'];
			$data=$this->m_keranjang->simpan(array(
				'id_pesanan'=>$this->uri->segment(3),
				'id_transaksi'=>$idtrans,
				'id_pelanggan'=>$user,
				'tgl_ambil'=>$tgl,
				'jam_ambil'=>$jam,
			));
			redirect('Keranjang');
		}

			
		}
	
	function remove(){
		$id_pesanan = $this->uri->segment(3);
		$id_roti =	$this->uri->segment(4);

		$this->db->query("DELETE FROM `detail_pesan` WHERE id_pesanan='$id_pesanan' AND id_roti='$id_roti'");
		redirect('Keranjang');

	}
}
?>