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
	public function delete($id){
		$this->db->reconnect();		
		$query=$this->db->query("CALL sp_deleteService('$id')");
	}
	 public function addServProduk($data){
		
		$this->db->reconnect();
		foreach($this->cart->contents() as $item){
			$id=$item['id'];
			$harga=$item['price'];
			$idSuplier=$item['options']['idSuplier'];
			
			$query = $this->db->query("CALL sp_cekStok('$id','$idSuplier','$harga')");
			if ($query->num_rows() > 0)
			{
				$butuh=$item['qty'];
				foreach ($query->result() as $row)
				{
						$stok = $row->jumlah;
						$po = $row->id_purchasing;
						$id_item = $row->id_item;
						if($stok>=$butuh){
							//echo "cek1";
							$this->db->reconnect();	
							$this->db->query("CALL sp_pengurangan_stok('$po','$id_item','$butuh')");
							$this->db->query("CALL sp_input_detailServProduk('$data[idService]','$item[id]','$item[qty]','$item[price]')");
								$butuh=$butuh-$stok;
							//echo $butuh;
							break;
						}else{
							
							$this->db->reconnect();	
							//echo "cek2";
							
							$this->db->query("CALL sp_pengurangan_stok('$po','$id_item','$butuh')");
							$butuh=$butuh-$stok;
							//echo $butuh;
						}
						if($butuh<=0){
							break;
						}
				}
			
			}
			else{
				return 0;
			}
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