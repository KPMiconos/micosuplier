<?php 
class Penjualan extends CI_Model{
	
	 public function __construct(){
                // Call the CI_Model constructor
                parent::__construct();
	 }
	 public function addPenjualan($data){
		
		$this->db->reconnect();		
		$query=$this->db->query("CALL sp_input_penjualan('$data[idTransaksi]','$data[email]','$data[idCustomer]','$data[total]','$data[tgl]','$data[kurir]')");
		foreach($this->cart->contents() as $item){
			$id=$item['id'];
			
			$query = $this->db->query("CALL sp_cekStok('$id')");
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
							$this->db->query("CALL sp_input_detailPenjualan('$data[idTransaksi]','$item[id]','$item[qty]','$item[price]')");
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
	 
	public function list_penjualan(){
		$this->db->reconnect();
			$query = $this->db->query("CALL sp_list_penjualan()");
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
	public function list_cariProduk($word){
		$this->db->reconnect();
			$query = $this->db->query("CALL sp_cari_suplierProduk('$word')");
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
	
	
}


?>