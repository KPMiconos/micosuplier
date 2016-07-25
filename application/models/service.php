<?php 
class Service extends CI_Model{
	
	 public function __construct(){
                // Call the CI_Model constructor
                parent::__construct();
	 }
	 public function addService($data){
		 $this->db->reconnect();		
		$query=$this->db->query("CALL sp_input_service('$data[petugas]','$data[customer]','$data[subjek]','$data[keluhan]','$data[tgl_open]','$data[status]')");
	
	 }
	  public function addSolving($data){
		 $this->db->reconnect();		
		$query=$this->db->query("CALL sp_input_solving('$data[id_service]','$data[tgl_solved]','$data[teknisi]','$data[penyelesaian]','$data[status]')");
	
	 }
	public function list_service(){
		$this->db->reconnect();
			$query = $this->db->query("CALL sp_list_service()");
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
	public function list_unsolved(){
		$this->db->reconnect();
			$query = $this->db->query("CALL sp_list_unsolvedService()");
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