<?php class Mcustomer extends CI_Model {

	 public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }
	public function addCustomer($data){
		$this->db->reconnect();		
		$query=$this->db->query("CALL sp_input_customer('$data[idCustomer]','$data[idInstitut]','$data[nama]','$data[jenkel]','$data[alamat]','$data[hp]','$data[email]','$data[jabatan]')");
		$row=$query->row();
		return $row->cek;
	}
	//list data
	public function list_customer(){
		$this->db->reconnect();
			$query = $this->db->query("CALL sp_list_customer()");
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
	public function pageList_customer($page,$per_page){
		$this->db->reconnect();
			$query = $this->db->query("CALL sp_pageList_customer('$page','$per_page')");
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
	public function list_pembelian($id){
		$this->db->reconnect();
			$query = $this->db->query("CALL sp_list_pembelian($id)");
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
	public function list_transaksi($id){
		$this->db->reconnect();
			$query = $this->db->query("CALL sp_list_transaksiPerCustomer($id)");
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
	public function view_customer($id){
		$this->db->reconnect();
			$query = $this->db->query("CALL sp_view_perCustomer('$id')");
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
	public function view_institusi($id){
		$this->db->reconnect();
			$query = $this->db->query("CALL sp_view_perInstitusi('$id')");
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
	public function list_cariCustomer($word){
		$this->db->reconnect();
			$query = $this->db->query("CALL sp_cariCustomer('$word')");
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
	
	public function list_customerPerInstitusi($id){
		$this->db->reconnect();
			$query = $this->db->query("CALL sp_viewCustomer_perInstitusi('$id')");
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
	//menambahkan data Institusi
	public function addInstitusi($data){
		$this->db->reconnect();		
		$query=$this->db->query("CALL sp_input_institusi('$data[id]','$data[nama]','$data[alamat]','$data[hp]','$data[email]')");
	}
	//list institut
	public function list_institusi(){
		$this->db->reconnect();
			$query = $this->db->query("CALL sp_list_institusi()");
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
	//update
	public function update($data){
		$this->db->reconnect();		
		//echo $data['idInstitut'],$data['ktp'],$data['nama'],$data['jenkel'],$data['alamat'],$data['hp'],$data['email'],$data['jabatan'];
		$query=$this->db->query("CALL sp_updateCustomer('$data[idInstitut]','$data[ktp]','$data[nama]','$data[jenkel]','$data[alamat]','$data[hp]','$data[email]','$data[jabatan]')");
		$row=$query->row();
		return $row->cek;
		
	}
	public function updateInstitusi($data){
		$this->db->reconnect();		
		$query=$this->db->query("CALL sp_updateInstitusi('$data[id]','$data[nama]','$data[alamat]','$data[hp]','$data[email]')");
		$row=$query->row();
		return $row->cek;
	}
	//delete
	public function delete($id){
		$this->db->reconnect();		
		$query=$this->db->query("CALL sp_deleteCustomer('$id')");
	}
	public function deleteInstitusi($id){
		$this->db->reconnect();		
		$query=$this->db->query("CALL sp_deleteInstitusi('$id')");
		$row=$query->row();
		return $row->cek;
	}
	public function countCustomer(){
		
		$this->db->reconnect();
			$query = $this->db->query("CALL sp_hitungCustomer()");
			if ($query->num_rows() > 0)
			{
				$row=$query->row();
				return $row->jumlah;
			}
			else{
				return 0;
			}
	
	}
}
?>