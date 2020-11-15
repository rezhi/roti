<?php
class m_keranjang extends CI_Model {
  
 
  function get_roti(){
    $query = $this->db->query("SELECT * FROM roti");
    return $query->result();
  }

  function get_kategori(){
        $hasil=$this->db->query("SELECT * FROM kategori");
        return $hasil;
    }
 
    function get_subkategori($id){
        $hasil=$this->db->query("SELECT * FROM roti WHERE id_kategori='$id'");
        return $hasil->result();
    }

  
  function read($idpesan,$nama){
    $query = $this->db->query("SELECT * FROM detail_pesan JOIN roti ON detail_pesan.id_roti=roti.id_roti  WHERE id_pesanan = '$idpesan' AND nama = '$nama' ");
    return $query->result();
  } 

 function total($idpesan,$nama){
      $query = $this->db->query("SELECT SUM(total) AS subtotal FROM detail_pesan WHERE id_pesanan = '$idpesan' AND nama = '$nama'  "); 
         return $query->result();
    }

    function get_idtrans(){
          $this->db->select('RIGHT(transaksi.id_transaksi,4) as kode', FALSE);
      $this->db->order_by('id_transaksi','DESC');    
      $this->db->limit(1);    
      $query = $this->db->get('transaksi');     
      if($query->num_rows() <> 0){      
    
       $data = $query->row();      
       $kode = intval($data->kode) + 1;    
      }
      else {      
       //jika kode belum ada      
       $kode = 1;    
      }
      $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); 
      $kodejadi = "TR".$kodemax;
      return $kodejadi;
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
  function inputdetail($data,$table) {
    $this->db->insert($table,$data);

  }

  function masuk($total, $idtrans){
     $query = $this->db->query("INSERT INTO transaksi VALUES ('$idtrans','0','$total','$total')");

  }

  function simpan($data=array()){
    return $this->db->insert('pesanan',$data);

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