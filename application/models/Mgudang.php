<?php 
class Mgudang extends CI_Model{
	
	 public function __construct(){
                // Call the CI_Model constructor
                parent::__construct();
	 }
	 //add data
	 
	 public function addGudang($data){
		
		$this->db->reconnect();	
			//echo $data['idTran'];
		$query=$this->db->query("CALL sp_input_penerimaan('$data[idTransaksi]','$data[idTran]','$data[idPenerima]','$data[tgl]','$data[idSuplier]','$data[total]','$data[kurir]','$data[kode]')");
		foreach($this->cart->contents() as $item){
			$this->db->query("CALL sp_input_gudang('$data[idTransaksi]','$data[idTran]','$item[id]','$item[qty]','$item[price]','$data[kode]')");
				
		}	
		$this->cart->destroy();
		unset($_SESSION['idPO']);
	 }
	  public function keluarGudang($data){
		
		$this->db->reconnect();		
		$query=$this->db->query("CALL sp_input_keluarGudang('$data[idTransaksi]','$data[idSO]','$data[email]','$data[idCustomer]','$data[total]','$data[tgl]','$data[kurir]','$data[kode]')");
		foreach($this->cart->contents() as $item){
			$id=$item['id'];
			$harga=$item['price'];
			$idSuplier=$item['options']['idSuplier'];
			$defect=$item['options']['defect'];
			$kode=$data['kode'];
			$this->db->reconnect();	
			$query = $this->db->query("CALL sp_cekStok('$id','$idSuplier','$harga')");
			if ($query->num_rows() > 0)
			{
				$butuh=$item['qty']+$item['options']['defect'];
				foreach ($query->result() as $row)
				{
						$stok = $row->jumlah;
						$po = $row->id_rec;
						$id_item = $row->id_item;
						
						
						if($stok>=$butuh){
							//echo "cek1";
							$this->db->reconnect();	
							$this->db->query("CALL sp_pengurangan_stok('$po','$id_item','$butuh')");
							$query = $this->db->query("CALL sp_detail_pengeluaran('$data[idTransaksi]','$item[id]','$item[qty]','$item[price]','$idSuplier','$po','$kode')");
							
							if($defect>0){
								if($kode==1){
									$this->db->query("CALL sp_input_defect('$data[idTransaksi]','$item[id]','$defect','$item[price]','2')");
								}else if($kode==2){
									$this->db->query("CALL sp_input_defect('$data[idTransaksi]','$item[id]','$defect','$item[price]','3')");
								}else if($kode==3){
									$this->db->query("CALL sp_input_defect('$data[idTransaksi]','$item[id]','$defect','$item[price]','4')");
								}
									
								
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
	public function viewPRO($id){
		$this->db->reconnect();
			$query = $this->db->query("CALL sp_viewPRO('$id')");
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
	public function viewPROIN($id){
		$this->db->reconnect();
			$query = $this->db->query("CALL sp_viewPROIN('$id')");
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
	public function viewSER($id){
		$this->db->reconnect();
			$query = $this->db->query("CALL sp_viewSER('$id')");
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
		$query=$this->db->query("CALL sp_returning_defect('$data[idDef]','$data[idRec]','$data[idItem]','$data[jumlah]','$data[hargaSatuan]','$data[idIssue]')");
	
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
	public function alertStok(){
		$this->db->reconnect();
			$query = $this->db->query("CALL sp_alert_stok()");
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
	public function hitungAlertStok(){
		$this->db->reconnect();
			$query = $this->db->query("CALL sp_alert_stok()");
			return $query->num_rows();
			
		
	}
	public function stokGudang($id){
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
	public function ubahPassword($data){
		  $this->db->reconnect();		
		$query=$this->db->query("CALL sp_ubahPassword('$data[id_petugas]','$data[passwordLama]','$data[passwordBaru]')");
	 }
}
?>