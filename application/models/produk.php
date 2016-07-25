<?php 
class Produk extends CI_Model{
	
	 public function __construct(){
                // Call the CI_Model constructor
                parent::__construct();
	 }
	 public function addProduk($data){
		 $this->db->reconnect();		
		$query=$this->db->query("CALL sp_input_produk('$data[petugas]','$data[customer]','$data[subjek]','$data[keluhan]','$data[tgl_open]','$data[status]')");
	
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
	
	
	
}


?>