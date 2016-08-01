<?php 
class Penjualan extends CI_Model{
	
	 public function __construct(){
                // Call the CI_Model constructor
                parent::__construct();
	 }
	 public function addPenjualan($data){
		 //echo $data['email'],">",$data['idTransaksi'],">",$data['idCustomer'],">",$data['total'],">",$data['tgl'],">",$data['id'],">",$data['qty'],">",$data['price'];
		$idTransaksi=$data['idTransaksi'];
		$this->db->reconnect();		
		$query=$this->db->query("CALL sp_pembelian('$data[idTransaksi]','$data[email]','$data[idCustomer]','$data[total]','$data[tgl]')");
		foreach($this->cart->contents() as $item){
			//echo $data['email'],">",$data['idTransaksi'],">",$data['idCustomer'],">",$data['total'],">",$data['tgl'],">",$item['id'],">",$item['qty'],">",$item['price'];
				$this->db->query("CALL sp_detail_pembelian('$data[idTransaksi]','$item[id]','$item[qty]','$item[price]')");
				 //echo $data['idTransaksi'],">",$data['idCustomer'],">",$data['total'],">",$data['tgl'],">",$data['id'],">",$data['qty'],">",$data['price'];
				
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