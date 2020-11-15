<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class GambarModel extends CI_Model {

  public function __construct(){
    parent::__construct();
    $this->load->database();
  }
  // Fungsi untuk menampilkan semua data gambar
  public function view(){
    return $this->db->get('gambar')->result();
  }
  
  // Fungsi untuk melakukan proses upload file
  public function upload(){
    $config['upload_path'] = 'images/';
    $config['allowed_types'] = 'jpg|png|jpeg';
    $config['max_size']  = '2048';
    $config['remove_space'] = TRUE;
  
    $this->load->library('upload', $config); // Load konfigurasi uploadnya
    if($this->upload->do_upload('input_gambar')){ // Lakukan upload dan Cek jika proses upload berhasil
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
      'nama' => $upload['file']['file_name']
    );
    
    $this->db->insert('gambar', $data);
  }
}