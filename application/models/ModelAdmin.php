<?php
class ModelAdmin extends CI_Model{
	public $username;
	public $password;
	public $notif = "";


	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function cek_log(){
		$sql = sprintf("SELECT COUNT(*) AS username FROM karyawan WHERE username = '%s' AND password='%s'",
			$this->username,
			$this->password);
			$query = $this->db->query($sql);
			$row = $query->row_array();
			return $row['username'] == 1;
	}

}
?>