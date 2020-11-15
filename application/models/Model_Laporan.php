<?php
class Model_Laporan extends CI_Model {
    
    function get_table(){
        return $this->db->get("transaksi");
    }
    
    function read(){
        $query = $this->db->query("SELECT * FROM transaksi JOIN pesanan  JOIN pelanggan WHERE  transaksi.id_transaksi=pesanan.id_transaksi AND pesanan.id_pelanggan=pelanggan.id_pelanggan AND transaksi.sisa_bayar='0'");
        return $query->result();
    }

    function readtotal(){
        $query = $this->db->query(" SELECT SUM(total_bayar) AS total FROM transaksi JOIN pesanan WHERE transaksi.id_transaksi=pesanan.id_transaksi AND transaksi.sisa_bayar='0'");
        return $query->result();
    }

   
    function total(){
    	$query = $this->db->query("SELECT SUM(total) AS total FROM transaksi"); 
    }

    public function view_by_date($date){
     //    $this->db->where('DATE(tgl_transaksi)', $date); // Tambahkan where tanggal nya 
        // return $this->db->get('tabel_transaksi_sip')->result();// Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter

        $this->db->select('*');
        $this->db->select_sum('total_bayar');
        $this->db->from('transaksi');
        $this->db->join('pesanan','transaksi.id_transaksi=pesanan.id_transaksi');
    $this->db->group_by('transaksi.id_transaksi');
        $this->db->where('DATE(tgl_pesan)', $date);
        $query = $this->db->get();
        return $query->result();
    

  }
    
    
  public function view_by_month($month, $year){
    $this->db->select('*');
    $this->db->select_sum('total_bayar');
        $this->db->from('transaksi');
        $this->db->join('pesanan','transaksi.id_transaksi=pesanan.id_transaksi');
    $this->db->group_by('transaksi.id_transaksi');
        $this->db->where('MONTH(tgl_pesan)', $month); // Tambahkan where bulan
    $this->db->where('YEAR(tgl_pesan)', $year); // Tambahkan where tahun
        $query = $this->db->get();
        return $query->result();
  }

  
    
  public function view_by_year($year){
    $this->db->select('*');
    $this->db->select_sum('total_bayar');
        $this->db->from('transaksi');
        $this->db->join('pesanan','transaksi.id_transaksi=pesanan.id_transaksi');
    $this->db->group_by('transaksi.id_transaksi');
        $this->db->where('YEAR(tgl_pesan)', $year);
        $query = $this->db->get();
        return $query->result();
  }
   


  public function view_all(){
    $this->db->select('*');
    $this->db->select_sum('total_bayar');
    $this->db->from('transaksi');
    $this->db->join('pesanan','transaksi.id_transaksi=pesanan.id_transaksi');
    $this->db->group_by('transaksi.id_transaksi');
    $query = $this->db->get();
    //$query = $this->db->query('SELECT * FROM tabel_transaksi_sip');
    return $query->result();
  }
    
    public function option_tahun(){
        $this->db->select('YEAR(tgl_pesan) AS tahun'); // Ambil Tahun dari field tgl
        $this->db->from('transaksi'); // select ke tabel transaksi
        $this->db->order_by('YEAR(tgl_pesan)'); // Urutkan berdasarkan tahun secara Ascending (ASC)
        $this->db->group_by('YEAR(tgl_pesan)'); // Group berdasarkan tahun pada field tgl
        return $this->db->get()->result(); // Ambil data pada tabel transaksi sesuai kondisi diatas
    }

 

  function view_pesanan(){
    $this->db->select('*');
    $this->db->select_sum('total_bayar');
    $this->db->from('transaksi');
    $this->db->join('pesanan','transaksi.id_transaksi=pesanan.id_transaksi');
    $this->db->group_by('transaksi.id_transaksi');
    $query = $this->db->get();
    //$query = $this->db->query('SELECT * FROM tabel_transaksi_sip');
    return $query->result();
  }
    

    
}