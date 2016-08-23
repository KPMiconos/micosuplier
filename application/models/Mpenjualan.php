<?php 
class Mpenjualan extends CI_Model{
	
	 public function __construct(){
                // Call the CI_Model constructor
                parent::__construct();
	 }
	 public function addPenjualan($data){
		$this->db->reconnect();		
		$query=$this->db->query("CALL sp_input_penjualan('$data[idTransaksi]','$data[email]','$data[idCustomer]','$data[total]','$data[tgl]','$data[kurir]')");
		foreach($this->cart->contents() as $item){
			$idSup=$item['options']['idSuplier'];
			$this->db->query("CALL sp_input_detailPenjualan('$data[idTransaksi]','$item[id]','$item[qty]','$item[price]','$idSup')");
			
			
		}
		$this->cart->destroy();
	 }
	
	public function list_penjualan(){
		$this->db->reconnect();
			$query = $this->db->query("CALL sp_list_penjualan()");
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
	 //deatil pemesanan
	 public function rincianPenjualan($id){
		 $this->db->reconnect();
			$query = $this->db->query("CALL sp_rincianPenjualan('$id')");
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
	public function list_cariProduk($word){
		$this->db->reconnect();
			$query = $this->db->query("CALL sp_cari_suplierProduk('$word')");
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
	public function list_produk_perSuplier($id){
		$this->db->reconnect();
			$query = $this->db->query("CALL sp_listProduk_perSuplier('$id')");
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
	//update status
	 public function updateStatus($data){
		 $this->db->reconnect();
		 $query=$this->db->query("CALL sp_updateStatus_penjualan('$data[idTransaksi]','$data[status]')");
	 }
	
}


?>