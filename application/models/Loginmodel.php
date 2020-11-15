<?php
class Loginmodel extends CI_Model{
	public $username;
	public $password;
	public $id_pelanggan;
	public $notif = "";


	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function cek_log(){
		$sql = sprintf("SELECT COUNT(*) AS username FROM pelanggan WHERE username = '%s' AND password='%s'",
			$this->username,
			$this->password);
		$sql1 = sprintf("SELECT * FROM pelanggan WHERE username = '%s' AND password='%s'", $this->username,
			$this->password);
			$query = $this->db->query($sql);
			$row = $query->row_array();
			$query1 = $this->db->query($sql1);
			$row1 = $query1->result();
			foreach ($row1 as $data){
				$this->id_pelanggan = $data->id_pelanggan;
			}
			return $row['username'] == 1;
	}

}
?>