<?php class Petugas extends CI_Model {

	 public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }
	public function daftar($data){
		$this->db->reconnect();		
		$query=$this->db->query("CALL sp_input_petugas('$data[ktp]','$data[nama]','$data[jenkel]','$data[alamat]','$data[hp]','$data[email]','$data[bagian]','$data[passwd]')");
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
}
?>