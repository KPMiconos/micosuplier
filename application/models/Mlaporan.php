<?php 
class Mlaporan extends CI_Model{
	
	 public function __construct(){
                // Call the CI_Model constructor
                parent::__construct();
	 }
	public function laporanPenjualan(){
		$this->db->reconnect();
			$query = $this->db->query("CALL sp_laporan_penjualan()");
			if ($query->num_rows() > 0)
			{
			foreach ($query->result() as $row)
			{
					$hasil[] = $row;
			}
			return $hasil;
			}
			else{
				return 0;
			}
	}
	public function laporanPembelian(){
		$this->db->reconnect();
			$query = $this->db->query("CALL sp_laporan_pembelian()");
			if ($query->num_rows() > 0)
			{
			foreach ($query->result() as $row)
			{
					$hasil[] = $row;
			}
			return $hasil;
			}
			else{
				return 0;
			}
	}
	public function filterLaporanMasuk($data){
		$this->db->reconnect();
			$query = $this->db->query("CALL sp_filter_laporanPembelian('$data[tgl_awal]','$data[tgl_akhir]')");
			if ($query->num_rows() > 0)
			{
			foreach ($query->result() as $row)
			{
					$hasil[] = $row;
			}
			return $hasil;
			}
			else{
				return 0;
			}
	}
	public function filterLaporanKeluar($data){
		$this->db->reconnect();
			$query = $this->db->query("CALL sp_filter_laporanPenjualan('$data[tgl_awal]','$data[tgl_akhir]')");
			if ($query->num_rows() > 0)
			{
			foreach ($query->result() as $row)
			{
					$hasil[] = $row;
			}
			return $hasil;
			}
			else{
				return 0;
			}
	}
}
?>