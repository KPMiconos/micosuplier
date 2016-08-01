<?php 
class Suplier extends CI_Model{
	
	 public function __construct(){
                // Call the CI_Model constructor
                parent::__construct();
	 }
	 public function addSuplier($data){
		 $this->db->reconnect();		
		$query=$this->db->query("CALL sp_input_suplier('$data[nama]','$data[alamat]','$data[hp]','$data[email]','$data[deskripsi]')");
	
	 }
	public function list_suplier(){
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
	public function view_suplier($id){
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
		
			
	}
	public function delete($id){
		$this->db->reconnect();		
		$query=$this->db->query("CALL sp_deleteSuplier('$id')");
	}
	public function uploadGmbrSuplier($data){
		$this->db->reconnect();		
		$query=$this->db->query("CALL sp_uploadGmbrSuplier('$data[idSuplier]','$data[nm_gbr]')");
	}
	public function list_cariSuplier($word){
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
}


?>