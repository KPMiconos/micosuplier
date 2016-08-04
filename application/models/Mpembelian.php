<?php 
class Mpembelian extends CI_Model{
	
	 public function __construct(){
                // Call the CI_Model constructor
                parent::__construct();
	 }
	  public function addPurchasing($data){
		
		$this->db->reconnect();		
		$query=$this->db->query("CALL sp_input_purchasing('$data[idTransaksi]','$data[idSuplier]','$data[email]','$data[tgl]','$data[total]')");
		foreach($this->cart->contents() as $item){
			$this->db->query("CALL sp_input_detailPurchasing('$data[idTransaksi]','$item[id]','$item[qty]','$item[price]')");
				
		}	
		$this->cart->destroy();
	 }
	 public function listPemesanan(){
		 $this->db->reconnect();
			$query = $this->db->query("CALL sp_list_purchasing()");
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