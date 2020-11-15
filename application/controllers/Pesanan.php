<?php
class Pesanan extends CI_Controller{

	public $model = NULL;
	public function __construct(){
		parent::__construct();
		$this->load->model('Model_Pesanan');
		$this->model = $this->Model_Pesanan;

		$this->load->database();
		$this->load->library('session');
		$this->load->helper('url');

	}
	public function index(){
		$this->read();
	}
	
	
	
	public function read(){
		$rows=$this->model->read();
		$this->load->view('PESANAN/crud_read_view', ['rows'=>$rows]);
	}

	public function belum(){
		$rows=array('rows' => $this->model->belum(),
						'model' => $this->model );
		$this->load->view('PESANAN/belum', $rows);
	}

	public function update($id){
		if(isset($_POST['btnSubmit'])){
			$this->model->dp = $_POST['dp'];
			$this->model->id_transaksi = $_POST['id_transaksi'];
			
			
			$this->model->update($_POST['dp'] , $_POST['id_transaksi'] );
			redirect('Pesanan/belum');
		}else{
			$query=$this->db->query("SELECT * FROM transaksi WHERE id_transaksi='$id'");
			$row=$query->row();
			$this->model->dp=$row->dp;
			$this->model->id_transaksi=$row->id_transaksi;
			
			$this->load->view('PESANAN/coba', ['model'=>$this->model]);
		}

	}

	public function home(){
		$id = $this->uri->segment(3);
		$rows=$this->model->home($id);
		$this->load->view('PESANAN/detail', ['rows'=>$rows]);
	}
	
	public function homebelum(){
		$id = $this->uri->segment(3);
		$rows=$this->model->homebelum($id);
		$this->load->view('PESANAN/detailbelum', ['rows'=>$rows]);
	}
	public function delete ($id_transaksi_del){
		$this->model->id_transaksi=$id_transaksi_del;
		$this->model->delete();
		redirect('Pesanan');
	}

		function input(){
		 
		if (isset($_POST['btnTambah'])){
			$kode['kode'] = $this->Pesanan_model->get_notrans();
			$total = $this->input->post('total');
			$dp = $this->input->post('jml_uang');
			$pelunasan = $this->input->post('kembalian');
			/*$data = $this->Pesanan_model->input(array (
			'id_pesan' => $this->input->post('id_pesan'),
			'nama_pemesan' => $this->input->post('nama_pemesan'),
			'no_telp' => $this->input->post('no_telp'),
			'tgl_ambil' => $this->input->post('tgl_ambil'),
			'jam_ambil' => $this->input->post('jam_ambil')
			));*/
			$this->db->query("INSERT INTO tabel_pesanan (id_pesan,nama_pemesan,no_telp,tgl_ambil,jam_ambil,alamat_antar) SELECT id_pesan,nama_pemesan,no_telp,tgl_ambil,jam_ambil,alamat_antar FROM tabel_detail_pemesan WHERE id_pesan='".$kode['kode']."'");
			$this->db->query("UPDATE `tabel_pesanan` SET `grand_total`='".$total."',`dp`='".$dp."',`pelunasan`='".$pelunasan."' WHERE id_pesan='".$kode['kode']."'");


			
			redirect('Pesanan');
		}else{
			$x =$this->Pesanan_model->get_roti();
			$data = array(
				'roti'=>$this->Pesanan_model->get_roti()
				);
			$title=array(
		        'title'=>'Pesanan'
		    );
		    $kode['kode'] = $this->Pesanan_model->get_notrans();
			$this->load->view('element/header', $title);
			$tabel_detail_pesan['tabel_detail_pesan'] = $this->Pesanan_model->get_pesanan($kode['kode']);
			$cek = $this->db->query("SELECT * FROM `tabel_detail_pemesan` WHERE id_pesan='".$kode['kode']."'")->num_rows();
			if ($cek >=1 ){
				$pemesan['pemesan'] = $this->db->query("SELECT * FROM `tabel_detail_pemesan` WHERE id_pesan='".$kode['kode']."'")->result();
				$data['total'] = $this->db->query("SELECT SUM(total) as total FROM `tabel_detail_pesan` WHERE id_pesan='".$kode['kode']."'")->result();
			$this->load->view('CreatePesanan_view', $data+$kode+$pemesan+$tabel_detail_pesan);
			}
			elseif ($cek == 0){
				$data['total'] = $this->db->query("SELECT SUM(total) as total FROM `tabel_detail_pesan` WHERE id_pesan='".$kode['kode']."'")->result();
			$this->load->view('CreatePesanan_view', $data+$kode+$tabel_detail_pesan);

			}

			//$data['total'] = $this->db->query("SELECT SUM(total) as total FROM `tabel_detail_pesan` WHERE id_pesan='".$kode['kode']."'")->result();
			//$this->load->view('CreatePesanan_view', $data+$kode+$pemesan+$tabel_detail_pesan);
			// $this->load->view('element/footer');
		}
	}


}



?>