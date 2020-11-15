<?php
class Model_Komentar extends CI_Model{
	public $id_komentar;
	public $nama_komentar;
	public $komentar;
	public $labels = [];

	public function __construct(){
		parent::__construct();
		$this->labels = $this->_attributeLabels();
		$this->load->database();
	}

	public function insert (){
	$sql = sprintf("INSERT INTO komentar VALUES ('%s','%s','%s')",
			$this->id_komentar,
			$this->nama_komentar,
			$this->komentar);
	$this->db->query($sql);
}

public function delete(){
	$sql=sprintf("DELETE FROM komentar WHERE id_komentar='%s'", $this->id_komentar);
	$this->db->query($sql);
}
public function read(){
	$sql= "SELECT * FROM komentar ORDER BY id_komentar";
	$query = $this->db->query($sql);
	return $query->result();
}
private function _attributeLabels(){
	return[
		'id_komentar'=>'ID Komentar ',
		'nama_komentar'=>'Nama Lengkap  ',
		'komentar'=>'Pesan  ',
		
	];
}

}


?>