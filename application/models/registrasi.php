<?php class Registrasi extends CI_Model {

       

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }
		public function daftar($data){
			$this->db->reconnect();
			
			$query=$this->db->query("CALL sp_input_petugas('$data[ktp]','$data[nama]','$data[lahir]','$data[jenkel]','$data[hp]','$data[email]'
			,'$data[alamat]','$data[pekerjaan]','$data[passwd]')");
			
			
		}
}
?>