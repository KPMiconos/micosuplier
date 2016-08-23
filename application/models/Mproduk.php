<?php 
class MProduk extends CI_Model{
	
	 public function __construct(){
                // Call the CI_Model constructor
                parent::__construct();
	 }
	
	 //add data
	 public function additem($data){
		 $this->db->reconnect();		
		$query=$this->db->query("CALL sp_input_item('$data[idItem]','$data[nama]','$data[tipe]','$data[satuan]','$data[deskripsi]','$data[nm_gbr]')");
	
	 }
	  public function addSatuan($data){
		 $this->db->reconnect();		
		$query=$this->db->query("CALL sp_input_satuan('$data[nama]','$data[kelas]','$data[deskripsi]')");
	
	 }
	 public function addTipeItem($data){
		 $this->db->reconnect();		
		$query=$this->db->query("CALL sp_input_tipe('$data[nama]','$data[deskripsi]')");
	
	 }
	//list data
	public function list_produk(){
		$this->db->reconnect();
			$query = $this->db->query("CALL sp_list_produk()");
			if ($query->num_rows() > 0){
				return $query->result();
			}else{
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
	
	public function rincianProduk($id){
		$this->db->reconnect();
			$query = $this->db->query("CALL sp_rincianListProduk('$id')");
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
	public function list_satuan(){
		$this->db->reconnect();
			$query = $this->db->query("CALL sp_list_satuan()");
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
	public function list_tipeItem(){
		$this->db->reconnect();
			$query = $this->db->query("CALL sp_list_tipeItem()");
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
	//view data
	public function viewItem($id){
		$this->db->reconnect();
			$query = $this->db->query("CALL sp_view_perItem('$id')");
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