<?php 
class Produk extends CI_Controller{

public $model = NULL;
	public function __construct(){
		parent::__construct();
		$this->load->model('m_produk');
		$this->model = $this->m_produk;
		$this->load->library('session');
	}
	public function index(){
		$data = array( 'data' => $this->model->get_data());
		$this->load->view('element/header');
		$this->load->view('v_produk', $data);
		$this->load->view('element/footer');
	}

	public function read(){
		$id = $this->uri->segment(3);
		$rows=$this->model->read($id);
		$this->load->view('v_produk', ['row'=>$row]);
	}

	

function inputdetail(){
		$jumlah =$_POST['jumlah'];
		$nama = $_SESSION['username'];
		$harga = $_POST['harga'];
		$id = $_POST['id_roti'];
		
		$idpesan = $this->m_produk->get_idpesan($nama);
		$cek = $this->db->query("SELECT * FROM detail_pesan JOIN pesanan WHERE id_roti='$id' AND detail_pesan.id_pesanan='$idpesan' AND pesanan.id_pesanan !='$idpesan'")->num_rows();
		if ($cek >= 1){
			$this->db->query("UPDATE `detail_pesan` SET `jumlah`=jumlah+'$jumlah', `total`=`jumlah`*`harga` WHERE id_roti='$id'	AND id_pesanan='$idpesan'");
			echo '<script>alert("Barang dimasukkan ke k");</script>';
			redirect('Produk', 'refresh');
		}elseif ($cek == 0) {
			$this->m_produk->insert_keranjang($nama, $jumlah,$harga,$id,$idpesan);
			$data['produk'] = $this->m_produk->tampil_barang($idpesan);
			//$this->load->view('element/header');
			echo '<script>alert("Barang dimasukkan ke keranjang");</script>';
			redirect('Produk');
		}
	}
    	

	public function subkategori($id){
		$data = array( 'data' => $this->model->get_subkategori($id));
		$this->load->view('element/header');
		$this->load->view('v_d_produk', $data);
		$this->load->view('element/footer');	
	}
}
?>