<?php 
class Produk extends CI_Model{
	
	 public function __construct(){
                // Call the CI_Model constructor
                parent::__construct();
	 }
	
	 
	public function list_produk(){
		$this->db->reconnect();
			$query = $this->db->query("CALL sp_list_produk()");
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
			$query = $this->db->query("CALL sp_cariProduk('$word')");
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
	
	
}


?>