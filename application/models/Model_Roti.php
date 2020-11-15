<?php
class Model_Roti extends CI_Model{
	public $id_roti;
	public $id_kategori;
	public $nama_roti;
	public $nama;
	public $gambar;
	public $harga;
	public $data;
	public $labels = [];

	public function __construct(){
		parent::__construct();
		$this->labels = $this->_attributeLabels();
		$this->load->database();
	}

public function upload(){
	
    $config['upload_path'] = './images';
    $config['allowed_types'] = 'jpg|png|jpeg';
    $config['max_size']  = '2048';
    $config['remove_space'] = TRUE;
  	$this->upload->initialize($config);
    $this->load->library('upload', $config); // Load konfigurasi uploadnya
    if($this->upload->do_upload('image')){ // Lakukan upload dan Cek jika proses upload berhasil
      // Jika berhasil :
      $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
      return $return;
    }else{
      // Jika gagal :
      $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
      return $return;
    }
  }
  
  // Fungsi untuk menyimpan data ke database
  public function save($upload){
    $data = array(
    	'id_roti'=> $this->id_roti,
      'id_kategori' => $this->id_kategori,
      'nama_roti' => $this->nama_roti,
      'gambar' => $upload['file']['file_name'],
      'harga' => $this->harga,
    );
    
    $this->db->insert('roti', $data);
  }
public function update(){
	$sql=sprintf("UPDATE roti SET  harga='%d' WHERE id_roti='%s'",
		$this->harga,
		$this->id_roti);
	
	$this->db->query($sql);
}

public function delete(){
	$sql=sprintf("DELETE FROM roti WHERE id_roti='%s'", $this->id_roti);
	$this->db->query($sql);
}
public function read($id){
	$sql= "SELECT * FROM roti JOIN kategori WHERE roti.id_kategori=kategori.id_kategori AND roti.id_kategori='$id' ORDER BY id_roti";
	$query = $this->db->query($sql);
	return $query->result();
}




	function get_id(){
  $this->db->select('RIGHT(roti.id_roti,4) as kode', FALSE);
      $this->db->order_by('id_roti','DESC');    
      $this->db->limit(1);    
      $query = $this->db->get('roti');     
      if($query->num_rows() <> 0){      
    
       $data = $query->row();      
       $kode = intval($data->kode) + 1;    
      }
      else {      
       //jika kode belum ada      
       $kode = 1;    
      }
      $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); 
      $kodejadi = "RT".$kodemax;  
      return $kodejadi;
}

private function _attributeLabels(){
	return[
		'id_roti'=>'ID Roti  ',
		'id_kategori'=>'ID Kategori ',
		'nama_roti'=>'Nama ',
		'gambar'=>'Gambar ',
		'harga'=>'Harga  ',
	];
}

}


?>