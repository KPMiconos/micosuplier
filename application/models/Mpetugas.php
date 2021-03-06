<?php class Mpetugas extends CI_Model {

	 public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }
	public function daftar($data){
		$this->db->reconnect();		
		$query=$this->db->query("CALL sp_input_petugas('$data[ktp]','$data[nama]','$data[jenkel]','$data[alamat]','$data[hp]','$data[email]','$data[bagian]','$data[passwd]')");
		$row=$query->row();
		return $row->cek;
	}
	//update data
	public function updatePrivilege($data){
		$this->db->reconnect();		
		$query=$this->db->query("CALL sp_update_privilege('$data[id_petugas]','$data[privilege]')");
	}
	public function list_petugas(){
		$this->db->reconnect();
			$query = $this->db->query("CALL sp_list_petugas()");
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
	public function login($data)
        {
			$this->db->reconnect();
            		
            $query=$this->db->query("CALL sp_login('$data[email]','$data[passwd]')");
          
			$row=$query->row();
			$hasil=$row->A;
			if($hasil==1)
			{
				return 1;
			}else if($hasil==0){
				return 0;
			}
			
        }
	public function view_petugas($id){
		$this->db->reconnect();
			$query = $this->db->query("CALL sp_view_perPetugas('$id')");
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
	public function uploadGmbrPetugas($data){
		$this->db->reconnect();	
			echo $data['id_petugas'],$data['nm_gbr'];
		$query=$this->db->query("CALL sp_uploadGmbrPetugas('$data[id_petugas]','$data[nm_gbr]')");
	}
	public function update($data){
		$this->db->reconnect();		
		$query=$this->db->query("CALL sp_updatePetugas('$data[ktp]','$data[nama]','$data[jenkel]','$data[alamat]','$data[hp]','$data[email]','$data[bagian]','$data[passwd]')");
		$row=$query->row();
		return $row->cek;
	}
	public function delete($id){
		$this->db->reconnect();		
		$query=$this->db->query("CALL sp_deletPetugas('$id')");
	}
	public function list_cariPetugas($word){
		$this->db->reconnect();
			$query = $this->db->query("CALL sp_cariPetugas('$word')");
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
	public function cekAkses($id){
		$this->db->reconnect();		
		$query=$this->db->query("CALL sp_cek_akses('$id')");
		$row=$query->row();
		return $row->privilege;
	}
	public function getId($id){
		$this->db->reconnect();		
		$query=$this->db->query("CALL sp_get_userId('$id')");
		$row=$query->row();
		return $row->id_petugas;
	}
	public function ubahPassword($data){
		  $this->db->reconnect();		
		$query=$this->db->query("CALL sp_ubahPassword('$data[id_petugas]','$data[passwordLama]','$data[passwordBaru]')");
		$row=$query->row();
		return $row->id_petugas;
	 }
}
?>