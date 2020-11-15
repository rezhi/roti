<?php
class Model_Komen extends CI_Model{
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
	$sql = sprintf("INSERT INTO komentar VALUES (NULL,'%s','%s')",
			$this->nama_komentar,
			$this->komentar);
	$this->db->query($sql);
}


private function _attributeLabels(){
	return[
		'id_komentar'=>'ID Komentar ',
		'nama_komentar'=>'Nama   ',
		'komentar'=>'Pesan  ',
		
	];
}

}


?>