<?php 
class Mgudang extends CI_Model{
	
	 public function __construct(){
                // Call the CI_Model constructor
                parent::__construct();
	 }
	  public function additem($data){
		 $this->db->reconnect();		
		$query=$this->db->query("CALL sp_input_item('$data[nama]','$data[tipe]','$data[satuan]','$data[deskripsi]','$data[nm_gbr]')");
	
	 }
	 //list_item
	public function list_item(){
		$this->db->reconnect();
			$query = $this->db->query("CALL sp_list_item()");
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
	public function viewPO($id){
		$this->db->reconnect();
			$query = $this->db->query("CALL sp_viewPO('$id')");
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
	public function addGudang($data){
		
		$this->db->reconnect();		
		$query=$this->db->query("CALL sp_input_penerimaan('$data[idTransaksi]','$data[idPO]','$data[idPenerima]','$data[tgl]','$data[idSuplier]','$data[total]','$data[kurir]')");
		foreach($this->cart->contents() as $item){
			$this->db->query("CALL sp_input_gudang('$data[idPO]','$item[id]','$item[qty]','$item[price]')");
				
		}	
		$this->cart->destroy();
		unset($_SESSION['idPO']);
	 }
	 public function listDefect(){
		$this->db->reconnect();
			$query = $this->db->query("CALL sp_list_defect()");
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
	public function listPenerimaan(){
		 $this->db->reconnect();
			$query = $this->db->query("CALL sp_list_penerimaan()");
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
	 public function deleteDefect($id){
		 $this->db->reconnect();
			$query = $this->db->query("CALL sp_delete_defect($id)");
	 }
	 public function returnDefect($data){
		 $this->db->reconnect();		
		$query=$this->db->query("CALL sp_returning_defect('$data[idPurchasing]','$data[idItem]','$data[jumlah]')");
	
	 }
}
?>