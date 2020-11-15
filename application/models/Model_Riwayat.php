<?php
class Model_Riwayat extends CI_Model {
    
    function get_table(){
        return $this->db->get("pesanan");
    }
    
    function read($id){
        $query = $this->db->query("SELECT * FROM transaksi JOIN pesanan  JOIN pelanggan WHERE  transaksi.id_transaksi=pesanan.id_transaksi  AND pesanan.id_pelanggan=pelanggan.id_pelanggan AND pelanggan.id_pelanggan='$id' ");
        return $query->result();
    }
    
     function home($id){
        $query = $this->db->query("SELECT * FROM transaksi JOIN pesanan JOIN detail_pesan JOIN pelanggan JOIN roti WHERE  transaksi.id_transaksi=pesanan.id_transaksi AND pesanan.id_pesanan=detail_pesan.id_pesanan AND pesanan.id_pelanggan=pelanggan.id_pelanggan AND roti.id_roti=detail_pesan.id_roti  AND pesanan.id_pesanan='$id' ");
        return $query->result();
    }

    function get_detail(){
    $query = $this->db->query("SELECT * FROM transaksi JOIN pesanan JOIN detail_pesan JOIN pelanggan JOIN roti WHERE  transaksi.id_transaksi=pesanan.id_transaksi AND pesanan.id_pesanan=detail_pesan.id_pesanan AND pesanan.id_pelanggan=pelanggan.id_pelanggan AND roti.id_roti=detail_pesan.id_roti ");
    return $query->result();
  }
    

    
}