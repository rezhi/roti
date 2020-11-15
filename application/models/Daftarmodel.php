<?php
class Daftarmodel extends CI_Model{
	public $nama_lengkap;
	public $username;
	public $password;
	public $hp;
	
	public $labels = [];
	

	public function get_table_name(){
		return 'pelanggan';
	}
	public function insert($data = array()){
		$this->db->insert($this->get_table_name(),$data);
	}
	public function update (){
		$this->db->update($this->get_table_name(). $this, ['nama_lengkap'=>$this->nama_lengkap]);
	}
	public function attribut_labels(){
		return ['nama_lengkap'=>'Nama Lengkap : ','username' =>'Username : ','password'=>'Password : ','hp'=>'Hp : '];
	}
}
?>
		