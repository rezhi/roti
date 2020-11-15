<?php
class m_produk extends CI_Model {
    
  function get_data(){
    $query = $this->db->query("SELECT * FROM kategori ");
    return $query->result();
  }

  public function read($id){
	$sql= "SELECT * FROM roti JOIN kategori WHERE roti.id_kategori=kategori.id_kategori AND roti.id_kategori
	='$id' ORDER BY id_roti";
	$query = $this->db->query($sql);
	return $query->result();
}
  
  function get_detail(){
    $query = $this->db->query("SELECT * FROM roti JOIN kategori WHERE roti.id_kategori=kategori.id_kategori");
    return $query->result();
  }

  function get_subkategori($id){
        $hasil=$this->db->query("SELECT * FROM roti WHERE id_kategori='$id'");
        return $hasil->result();
    }

  function get_roti($id_roti){
    $hsl=$this->db->query("SELECT * FROM roti where id_roti='$id_roti'");
    return $hsl;
  }

  function input_pesan($data,$table){
    $this->db->insert($table,$data);
  }

  function get_idpesan($nama){
          $this->db->select('RIGHT(pesanan.id_pesanan,4) as kode', FALSE);
      $this->db->order_by('id_pesanan','DESC');    
      $this->db->limit(1);    
      $query = $this->db->get('pesanan');     
      if($query->num_rows() <> 0){      
    
       $data = $query->row();      
       $kode = intval($data->kode) + 1;    
      }
      else {      
       //jika kode belum ada      
       $kode = 1;    
      }
      $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); 
      $kodejadi = "PS".$kodemax;

       $query1 = $this->db->query("SELECT * FROM detail_pesan WHERE id_pesanan='$kodejadi' AND nama = '$nama'");
       $query2 = $this->db->query("SELECT detail_pesan.id_pesanan FROM detail_pesan JOIN pesanan WHERE pesanan.id_pesanan !=detail_pesan.id_pesanan AND nama = '$nama' ");
       if ($query1->num_rows() > 0)
         {
            return $kodejadi;

         } else if($query2->num_rows() > 0){ 
            $hasil = $query2->result();
            $row = $hasil[0]->id_pesanan;
            return $row;
        } else {
            $this->db->select('RIGHT(detail_pesan.id_pesanan,4) as kode', FALSE);
            $this->db->order_by('id_pesanan','DESC');    
            $this->db->limit(1);    
            $query = $this->db->get('detail_pesan');     
             
          
             $data = $query->row();      
             $kode = intval($data->kode) + 1;    
            
            
            $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); 
            $kodejadi = "PS".$kodemax;
            return $kodejadi;
          }  
            
  }


  function insert_keranjang($nama,$jumlah,$harga,$id,$idpesan){
    $query = $this->db->query("INSERT INTO `detail_pesan`(`nama`,`jumlah`, `harga`, `total`, `id_roti`, `id_pesanan`) VALUES ('$nama', '$jumlah','$harga','$jumlah'*'$harga' , '$id','$idpesan')");
  }

  function tampil_barang($idpesan){
    $query = $this->db->query("SELECT * FROM transaksi JOIN pesanan JOIN detail_pesan JOIN roti ON detail_pesan.id_roti=roti.id_roti WHERE pesanan.id_pesanan='$idpesan'");
    return $query->result();
  }

  function get_pesanan($kode){
    $this->db->select('*');
    $this->db->from('detail_pesan');
    $this->db->join('roti','detail_pesan.id_roti=roti.id_roti');
    $this->db->where('id_pesanan', $kode);
    $query = $this->db->get();
    return $query->result();
  }

}

?>