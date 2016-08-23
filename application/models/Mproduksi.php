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
			$this->db->query("CALL sp_input_bom('$data[id_produk]','$item[id]','$item[qty]')");
				
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
							$this->db->query("CALL sp_input_detailProduksi('$data[idTransaksi]','$item[id]','$item[qty]','$item[price]')");
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
}
?>