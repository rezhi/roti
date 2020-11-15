<?php
class Model_Kategori extends CI_Model{
	public $id_kategori;
	public $nama_kategori;
	public $deskripsi;
	public $labels = [];

	public function __construct(){
		parent::__construct();
		$this->labels = $this->_attributeLabels();
		$this->load->database();
	}

public function insert (){
	$sql = sprintf("INSERT INTO kategori VALUES ('%s','%s','%s')",
			$this->id_kategori,
			$this->nama_kategori,
			$this->deskripsi);
	$this->db->query($sql);
}
public function update(){
	$sql=sprintf("UPDATE kategori SET  nama_kategori='%s' WHERE id_kategori='%s'",
		$this->nama_kategori,
		$this->id_kategori);
	
	$this->db->query($sql);
}
public function delete(){
	$sql=sprintf("DELETE FROM kategori WHERE id_kategori='%s'", $this->id_kategori);
	$this->db->query($sql);
}
public function read(){
	$sql= "SELECT * FROM kategori ORDER BY id_kategori";
	$query = $this->db->query($sql);
	return $query->result();
}
private function _attributeLabels(){
	return[
		'id_kategori'=>'ID Kategori  ',
		'nama_kategori'=>'Nama Kategori  ',
		'deskripsi'=>'Deskripsi  ',
	];
}

}


?>