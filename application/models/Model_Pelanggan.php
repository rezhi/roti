<?php
class Model_Pelanggan extends CI_Model{
	public $id_pelanggan;
	public $nama_lengkap;
	public $username;
	public $password;
	public $hp;
	public $keterangan;
	public $labels = [];

	public function __construct(){
		parent::__construct();
		$this->labels = $this->_attributeLabels();
		$this->load->database();
	}

public function delete(){
	$sql=sprintf("DELETE FROM pelanggan WHERE id_pelanggan='%s'", $this->id_pelanggan);
	$this->db->query($sql);
}
public function read(){
	$sql= "SELECT * FROM pelanggan ORDER BY id_pelanggan";
	$query = $this->db->query($sql);
	return $query->result();
}
private function _attributeLabels(){
	return[
		'id_pelanggan'=>'ID Pelanggan  ',
		'nama_lengkap'=>'Nama Lengkap  ',
		'username'=>'Username  ',
		'password'=>'Password  ',
		'hp'=>'No. Hp  ',
		'keterangan'=>'Keterangan  ',
	];
}

}


?>