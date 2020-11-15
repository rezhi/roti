<?php
class Model_Karyawan extends CI_Model{
	public $id_karyawan;
	public $nama_karyawan;
	public $username;
	public $password;
	public $alamat;
	public $hp;
	public $jk;
	public $labels = [];

	public function __construct(){
		parent::__construct();
		$this->labels = $this->_attributeLabels();
		$this->load->database();
	}

public function insert (){
	$sql = sprintf("INSERT INTO karyawan VALUES ('%s','%s','%s','%s','%s','%s','%s')",
			$this->id_karyawan,
			$this->nama_karyawan,
			$this->username,
			$this->password,
			$this->alamat,
			$this->hp,
			$this->jk);
	$this->db->query($sql);
}
public function update(){
	$sql=sprintf("UPDATE karyawan SET  nama_karyawan='%s', username='%s', password='%s',alamat='%s',hp='%s', jk='%s' WHERE id_karyawan='%s'",
		$this->nama_karyawan,
		$this->username,
		$this->password,
		$this->alamat,
		$this->hp,
		$this->jk,
		$this->id_karyawan);
	
	$this->db->query($sql);
}
public function delete(){
	$sql=sprintf("DELETE FROM karyawan WHERE id_karyawan='%s'", $this->id_karyawan);
	$this->db->query($sql);
}
public function read(){
	$sql= "SELECT * FROM karyawan ORDER BY id_karyawan";
	$query = $this->db->query($sql);
	return $query->result();
}
private function _attributeLabels(){
	return[
		'id_karyawan'=>'ID Karyawan  ',
		'nama_karyawan'=>'Nama Karyawan  ',
		'username'=>'Username  ',
		'password'=>'Password  ',
		'alamat'=>'Alamat  ',
		'hp'=>'No. Hp  ',
		'jk'=>'Jenis Kelamin  ',
	];
}

}


?>