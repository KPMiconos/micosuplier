<?php 
class Mservice extends CI_Model{
	
	 public function __construct(){
                // Call the CI_Model constructor
                parent::__construct();
	 }
	 public function addService($data){
		 $this->db->reconnect();
			//echo $data['petugas'],$data['customer'],$data['subjek'],$data['keluhan'],$data['tgl_open'],$data['status'];
		$query=$this->db->query("CALL sp_input_service('$data[petugas]','$data[customer]','$data[subjek]','$data[keluhan]','$data[tgl_open]','$data[status]')");
	
	 }
	  public function addSolving($data){
		 $this->db->reconnect();		
		$query=$this->db->query("CALL sp_input_solving('$data[id_service]','$data[tgl_solved]','$data[teknisi]','$data[penyelesaian]','$data[status]')");
	
	 }
	 //update data
	 public function updateService($data){
		 $this->db->reconnect();
		
		$query=$this->db->query("CALL sp_updateService('$data[id_service]','$data[customer]','$data[subjek]','$data[keluhan]','$data[status]')");
	
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
	public function view_service($id){
		$this->db->reconnect();
			$query = $this->db->query("CALL sp_view_perService('$id')");
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
	public function view_produkService($id){
		$this->db->reconnect();
			$query = $this->db->query("CALL sp_view_perProdukServ('$id')");
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
	public function view_solving($id){
		$this->db->reconnect();
			$query = $this->db->query("CALL sp_view_perSolving('$id')");
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
	public function delete($id){
		$this->db->reconnect();		
		$query=$this->db->query("CALL sp_deleteService('$id')");
	}
	 public function addServProduk($data){
		
		$this->db->reconnect();
		$this->db->query("CALL sp_input_produkService('$data[idTransaksi]','$data[idService]','$data[total]','$data[teknisi]')");
		foreach($this->cart->contents() as $item){
			$id=$item['id'];
			$total=$this->cart->total();
			$idSuplier=$item['options']['idSuplier'];
			$this->db->query("CALL sp_input_detailServProduk('$data[idTransaksi]','$item[id]','$item[qty]','$item[price]','$idSuplier')");
			
		}	
		$this->cart->destroy();
	 }
	 public function cekService($id){
		 $query=$this->db->query("CALL sp_cekService('$id')");
		$row=$query->row();
		return $row->cek;
	 }
	
}


?>