<?php class Customer extends CI_Model {

	 public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }
	public function addCustomer($data){
		$this->db->reconnect();		
		$query=$this->db->query("CALL sp_input_customer('$data[nama]','$data[jenkel]','$data[alamat]','$data[hp]','$data[email]')");
	}
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
}
?>