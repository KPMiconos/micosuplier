<?php 
class Msupplier extends CI_Model{
	
	 public function __construct(){
                // Call the CI_Model constructor
                parent::__construct();
	 }
	 public function addSupplier($data){
		 $this->db->reconnect();		
		$query=$this->db->query("CALL sp_input_suplier('$data[nama]','$data[alamat]','$data[hp]','$data[email]','$data[deskripsi]')");
		$row=$query->row();
		return $row->cek;
	
	 }
	  public function tambahProduk($data){
		 $this->db->reconnect();		
		$query=$this->db->query("CALL sp_inputProduk_supplier('$data[idSupplier]','$data[idItem]')");
		$row=$query->row();
		return $row->cek;
	
	 }
	public function list_supplier(){
		$this->db->reconnect();
			$query = $this->db->query("CALL sp_list_suplier()");
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
	public function pageList_supplier($start,$limit){
		$this->db->reconnect();
			$query = $this->db->query("CALL sp_pageList_supplier($start,$limit)");
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
	public function view_supplier($id){
		$this->db->reconnect();
			$query = $this->db->query("CALL sp_view_perSuplier('$id')");
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
	public function update($data){
		$this->db->reconnect();		
		$query=$this->db->query("CALL sp_updateSuplier('$data[idSuplier]','$data[nama]','$data[alamat]','$data[hp]','$data[email]','$data[deskripsi]')");
		$row=$query->row();
		return $row->cek;
		
			
	}
	public function delete($id){
		$this->db->reconnect();		
		$query=$this->db->query("CALL sp_deleteSuplier('$id')");
	}
	public function uploadGmbrSupplier($data){
		$this->db->reconnect();		
		$query=$this->db->query("CALL sp_uploadGmbrSuplier('$data[idSuplier]','$data[nm_gbr]')");
	}
	public function list_cariSupplier($word){
		$this->db->reconnect();
			$query = $this->db->query("CALL sp_cariSuplier('$word')");
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
	public function countSupplier(){
		
		$this->db->reconnect();
			$query = $this->db->query("CALL sp_hitungSupplier()");
			if ($query->num_rows() > 0)
			{
				$row=$query->row();
				return $row->jumlah;
			}
			else{
				return 0;
			}
	
	}
}


?>