<?php 
class Mproduksi extends CI_Model{
	
	 public function __construct(){
                // Call the CI_Model constructor
                parent::__construct();
	 }
	 //add data
	 public function addBom($data){
		 $this->db->reconnect();		
		foreach($this->cart->contents() as $item){
			$query=$this->db->query("CALL sp_input_bom('$data[id_produk]','$item[id]','$item[qty]')");
			$row=$query->row();
			return $row->cek;
				
		}	
		$this->cart->destroy();
	 }
	 public function addProduksiToGudang($data){
		$this->db->reconnect();		
		$query=$this->db->query("CALL sp_input_produksiToGudang('$data[idTransaksi]','$data[id_produksi]','$data[id_petugas]','$data[idSuplier]','$data[totalHarga]','$data[id_produk]','$data[jumlah]','$data[harga_jual]')");
	 }
	 public function addBahanProduksi($data){
		
		$this->db->reconnect();		
		$query=$this->db->query("CALL sp_input_produksi('$data[idTransaksi]','$data[email]','$data[jml_produk]','$data[tgl]','$data[total]','$data[id_produk]')");
		
		foreach($this->cart->contents() as $item){
			$id=$item['id'];
			$harga=$item['price'];
			$idSuplier=$item['options']['idSuplier'];
			$this->db->query("CALL sp_input_detailProduksi('$data[idTransaksi]','$item[id]','$item[qty]','$item[price]','$idSuplier')");
			
			
		}	
		
		$this->cart->destroy();
		unset($_SESSION['id_produk']);
	 }
	 //list data
	 public function list_bom(){
		$this->db->reconnect();
			$query = $this->db->query("CALL sp_list_bom()");
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
	 public function list_bahanProduksi($id){
		$this->db->reconnect();
			$query = $this->db->query("CALL sp_list_bahanProduksi('$id')");
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
	public function listProduksi(){
		 $this->db->reconnect();
			$query = $this->db->query("CALL sp_list_produksi()");
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
	//rincian bom
	public function rincianBom($id){
		$this->db->reconnect();
			$query = $this->db->query("CALL sp_rincian_bom('$id')");
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
	//update status
	 public function updateStatus($data){
		 $this->db->reconnect();
		 $query=$this->db->query("CALL sp_updateStatus_produksi('$data[idTransaksi]','$data[status]')");
	 }
	 //rincianProduksi
	  public function rincianProduksi($id){
		 $this->db->reconnect();
			$query = $this->db->query("CALL sp_rincianProduksi('$id')");
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
	 //delete data
	 public function deleteBom($id){
		 $this->db->reconnect();
		$query = $this->db->query("CALL sp_delete_bom('$id')");
		$row=$query->row();
		return $row->cek;
			
	 }
}
?>