<?php 
class Mgudang extends CI_Model{
	
	 public function __construct(){
                // Call the CI_Model constructor
                parent::__construct();
	 }
	 //add data
	 
	 public function addGudang($data){
		
		$this->db->reconnect();		
		$query=$this->db->query("CALL sp_input_penerimaan('$data[idTransaksi]','$data[idPO]','$data[idPenerima]','$data[tgl]','$data[idSuplier]','$data[total]','$data[kurir]')");
		foreach($this->cart->contents() as $item){
			$this->db->query("CALL sp_input_gudang('$data[idPO]','$item[id]','$item[qty]','$item[price]')");
				
		}	
		$this->cart->destroy();
		unset($_SESSION['idPO']);
	 }
	  public function keluarGudang($data){
		
		$this->db->reconnect();		
		$query=$this->db->query("CALL sp_input_keluarGudang('$data[idTransaksi]','$data[tgl]')");
		foreach($this->cart->contents() as $item){
			$id=$item['id'];
			$harga=$item['price'];
			$idSuplier=$item['options']['idSuplier'];
			$defect=$item['options']['defect'];
			
			
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
							$this->db->query("CALL sp_input_detailKeluarGudang('$data[idTransaksi]','$item[id]','$item[qty]','$idSuplier')");
							if($defect>0){
								$this->db->query("CALL sp_input_defect('$data[idTransaksi]','$item[id]','$defect','$item[price]','1')");
							}
							$butuh=$butuh-$stok;
							//echo $butuh;
							break;
						}else{
							
							$this->db->reconnect();	
							//echo "cek2";
							
							$this->db->query("CALL sp_pengurangan_stok('$po','$id_item','$item[qty]')");
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
	 
	 //list_item
	
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
	 public function listPengeluaran(){
		 $this->db->reconnect();
			$query = $this->db->query("CALL sp_list_pengeluaran()");
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
	public function viewSO($id){
		$this->db->reconnect();
			$query = $this->db->query("CALL sp_viewSO('$id')");
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
	public function rincianViewSO($id){
		$this->db->reconnect();
			$query = $this->db->query("CALL sp_rincian_viewSO('$id')");
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
	 public function deleteDefect($id){
		 $this->db->reconnect();
			$query = $this->db->query("CALL sp_delete_defect($id)");
	 }
	 //return produk
	 public function returnDefect($data){
		 $this->db->reconnect();		
		$query=$this->db->query("CALL sp_returning_defect('$data[idPurchasing]','$data[idItem]','$data[jumlah]','$data[hargaSatuan]')");
	
	 }
	 //update defet
	 public function updateDefect($data){
		  $this->db->reconnect();		
		$query=$this->db->query("CALL sp_update_defect('$data[idTransaksi]','$data[idItem]','$data[harga]')");
	 }
	 public function stokBarang($id){
		$this->db->reconnect();
			$query = $this->db->query("CALL sp_stok_gudang('$id')");
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