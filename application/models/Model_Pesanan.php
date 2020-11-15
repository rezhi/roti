<?php
class Model_Pesanan extends CI_Model {
    public $id_transaksi;
    public $dp;
     public $diskon;
    public $ket;
    public $status;
public $labels = [];

    public function __construct(){
        parent::__construct();
        $this->labels = $this->_attributeLabels();
        $this->load->database();
    }



    function get_table(){
        return $this->db->get("pesanan");
    }
    
    function read(){
        $query = $this->db->query("SELECT * FROM transaksi JOIN pesanan JOIN pelanggan WHERE transaksi.id_transaksi=pesanan.id_transaksi  AND   pesanan.id_pelanggan=pelanggan.id_pelanggan AND transaksi.sisa_bayar='0' ");
        return $query->result();
    }
     function belum(){
        $query = $this->db->query("SELECT * FROM transaksi JOIN pesanan JOIN pelanggan WHERE transaksi.id_transaksi=pesanan.id_transaksi  AND   pesanan.id_pelanggan=pelanggan.id_pelanggan AND transaksi.dp < transaksi.total_bayar ");
        return $query->result();
    }
    
    function homebelum($id){
        $query = $this->db->query("SELECT * FROM transaksi JOIN pesanan JOIN detail_pesan JOIN pelanggan JOIN roti WHERE  transaksi.id_transaksi=pesanan.id_transaksi AND pesanan.id_pesanan=detail_pesan.id_pesanan AND pesanan.id_pelanggan=pelanggan.id_pelanggan AND roti.id_roti=detail_pesan.id_roti AND transaksi.dp < transaksi.total_bayar AND transaksi.id_transaksi='$id' ");
        return $query->result();
    }

   

    public function update($dp, $id){
    $sql=sprintf("UPDATE transaksi SET  dp ='$dp' WHERE id_transaksi='$id'");
     $sql2=sprintf("UPDATE transaksi SET  sisa_bayar=total_bayar-dp WHERE id_transaksi='$id'");
    $this->db->query($sql);
    $this->db->query($sql2);
}

     function home($id){
        $query = $this->db->query("SELECT * FROM transaksi JOIN pesanan JOIN detail_pesan JOIN pelanggan JOIN roti WHERE  transaksi.id_transaksi=pesanan.id_transaksi AND pesanan.id_pesanan=detail_pesan.id_pesanan AND pesanan.id_pelanggan=pelanggan.id_pelanggan AND roti.id_roti=detail_pesan.id_roti AND transaksi.sisa_bayar='0' AND transaksi.id_transaksi='$id' ");
        return $query->result();
    }

    function cari($nama_pelanggan){
        $query = $this->db->query("SELECT * FROM pesanan JOIN pelanggan  WHERE pesanan.id_pelanggan=pelanggan.id_pelanggan AND pelanggan.nama_pelanggan='$nama_pelanggan'");
        return $query->result();
    }
  
    function delete(){
        $sql=sprintf("DELETE FROM transaksi WHERE id_transaksi='%s'", $this->id_transaksi);
        $this->db->query($sql);
    }
    
    function get_notrans(){
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
    $kodejadi = "TP".$kodemax;  
    return $kodejadi;
  }

    private function _attributeLabels(){
    return[
        'id_transaksi'=>'ID Transaksi  ',
        'dp'=>'dp  ',
         'diskon'=>'diskon  ',
          'ket'=>'keterangan  ',
           'status'=>'status  ',
        
    ];
}

    
}