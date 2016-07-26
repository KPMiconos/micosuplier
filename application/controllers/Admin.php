<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	
	public function index()
	{
		$cek=$this->session->userdata('username');
		if($cek){
			$this->load->view('dasboard/head');
			$this->load->view('dasboard/header');
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/admin');
			$this->load->view('dasboard/footer');
		}else{
			
			redirect('home');
		}
	}
	//List data
	public function listPetugas()
	{
		$this->load->model('petugas');
		$data['isi']=$this->petugas->list_petugas();
		$this->load->view('dasboard/head');
		$this->load->view('dasboard/header');
		$this->load->view('dasboard/sidebar');
		$this->load->view('dasboard/listPetugas',$data);
		$this->load->view('dasboard/footer');
	}
	public function listCustomer()
	{
		$this->load->model('customer');
		$data['isi']=$this->customer->list_customer();
		$this->load->view('dasboard/head');
		$this->load->view('dasboard/header');
		$this->load->view('dasboard/sidebar');
		$this->load->view('dasboard/listCustomer',$data);
		$this->load->view('dasboard/footer');
	}
	public function listSuplier()
	{
		$this->load->model('suplier');
		$data['isi']=$this->suplier->list_suplier();
		$this->load->view('dasboard/head');
		$this->load->view('dasboard/header');
		$this->load->view('dasboard/sidebar');
		$this->load->view('dasboard/listSuplier',$data);
		$this->load->view('dasboard/footer');
	}
	public function listService()
	{
		$this->load->model('service');
		$data['isi']=$this->service->list_service();
		$this->load->view('dasboard/head');
		$this->load->view('dasboard/header');
		$this->load->view('dasboard/sidebar');
		$this->load->view('dasboard/listService',$data);
		$this->load->view('dasboard/footer');
	}
	public function listUnsolved()
	{
		$this->load->model('service');
		$data['isi']=$this->service->list_unsolved();
		$this->load->view('dasboard/head');
		$this->load->view('dasboard/header');
		$this->load->view('dasboard/sidebar');
		$this->load->view('dasboard/listUnsolvedService',$data);
		$this->load->view('dasboard/footer');
	}
	public function listProduk()
	{
		$this->load->model('produk');
		$data['isi']=$this->produk->list_produk();
		$this->load->view('dasboard/head');
		$this->load->view('dasboard/header');
		$this->load->view('dasboard/sidebar');
		$this->load->view('dasboard/listProduk',$data);
		$this->load->view('dasboard/footer');
	}
	
	
	//Add Data
	public function addPetugas()
	{
		$this->load->view('dasboard/head');
		$this->load->view('dasboard/header');
		$this->load->view('dasboard/sidebar');
		$this->load->view('dasboard/inputPetugas');
		$this->load->view('dasboard/footer');
	}
	public function addSuplier()
	{
		$this->load->view('dasboard/head');
		$this->load->view('dasboard/header');
		$this->load->view('dasboard/sidebar');
		$this->load->view('dasboard/inputSuplier');
		$this->load->view('dasboard/footer');
	}
	public function addCustomer()
	{
		$this->load->view('dasboard/head');
		$this->load->view('dasboard/header');
		$this->load->view('dasboard/sidebar');
		$this->load->view('dasboard/inputCustomer');
		$this->load->view('dasboard/footer');
	}
	public function addService()
	{
		$this->load->view('dasboard/head');
		$this->load->view('dasboard/header');
		$this->load->view('dasboard/sidebar');
		$this->load->view('dasboard/inputService');
		$this->load->view('dasboard/footer');
	}
	public function addSolving($id)
	{
		$data['id']=$id;
		$this->load->view('dasboard/head');
		$this->load->view('dasboard/header');
		$this->load->view('dasboard/sidebar');
		$this->load->view('dasboard/inputSolving',$data);
		$this->load->view('dasboard/footer');
	}
	public function addProduk()
	{
		
		$this->load->view('dasboard/head');
		$this->load->view('dasboard/header');
		$this->load->view('dasboard/sidebar');
		$this->load->view('dasboard/inputProduk');
		$this->load->view('dasboard/footer');
	}
	public function addPenjualan()
	{
		$this->load->model('produk');
		$data['isi']=$this->produk->list_produk();
		$this->load->model('customer');
		$data['customer']=$this->customer->list_customer();
		$this->load->view('dasboard/head');
		$this->load->view('dasboard/header');
		$this->load->view('dasboard/sidebar');
		$this->load->view('dasboard/Produk',$data);
		$this->load->view('dasboard/footer');
	}
	
	//View Data
	public function viewPetugas($id){
		
		$this->load->model('petugas');
		//$this->load->model('produk');
		$data['isi']=$this->petugas->view_petugas($id);
		//$data['produk']=$this->produk->list_produk_perSuplier($id);
		$this->load->view('dasboard/head');
		$this->load->view('dasboard/header');
		$this->load->view('dasboard/sidebar');
		$this->load->view('dasboard/viewPetugas',$data);
		$this->load->view('dasboard/footer');
		
	}
	public function viewSuplier($id){
		
		$this->load->model('suplier');
		$this->load->model('produk');
		$data['isi']=$this->suplier->view_suplier($id);
		$data['produk']=$this->produk->list_produk_perSuplier($id);
		$this->load->view('dasboard/head');
		$this->load->view('dasboard/header');
		$this->load->view('dasboard/sidebar');
		$this->load->view('dasboard/viewSuplier',$data);
		$this->load->view('dasboard/footer');
	}
	public function viewCustomer($id){
		
		$this->load->model('customer');
		//$this->load->model('produk');
		$data['isi']=$this->customer->view_customer($id);
		$data['pembelian']=$this->customer->list_pembelian($id);
		//$data['produk']=$this->produk->list_produk_perSuplier($id);
		$this->load->view('dasboard/head');
		$this->load->view('dasboard/header');
		$this->load->view('dasboard/sidebar');
		$this->load->view('dasboard/viewCustomer',$data);
		$this->load->view('dasboard/footer');
		
	}
	//update or edit data
	public function uploadImgPetugas_act(){
		$this->load->library('upload');
        $nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = './assets/images/petugas/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '2048'; //maksimum besar file 2M
        $config['max_width']  = '1288'; //lebar maksimum 1288 px
        $config['max_height']  = '768'; //tinggi maksimu 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya
 
        $this->upload->initialize($config);
		
		 if($_FILES['filefoto']['name'])
        {
            if ($this->upload->do_upload('filefoto'))
            {
                $gbr = $this->upload->data();
                $data = array(
                  'nm_gbr' =>$gbr['file_name'],
                  'id_petugas' => $this->input->post('id_petugas'),
				  
                   
                );
				$this->load->model('petugas');
                $this->petugas->uploadGmbrPetugas($data); //akses model untuk menyimpan ke database
                //pesan yang muncul jika berhasil diupload pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Upload gambar berhasil !!</div></div>");
                redirect('admin/listPetugas'); //jika berhasil maka akan ditampilkan view vupload
            }else{
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal upload gambar !!</div></div>");
                redirect('admin/addPetugas'); //jika gagal maka akan ditampilkan form upload
            }
        }else{
			redirect('admin/addPetugas');
		}
	}
	public function updatePetugas(){
		$data = array(
				'ktp' => $this->input->post('ktp'),
				'nama' => $this->input->post('nama'),
				'jenkel' => $this->input->post('jenkel'),
				'alamat' => $this->input->post('alamat'),
				'hp' => $this->input->post('hp'),
				'email' => $this->input->post('email'),
				'hp' => $this->input->post('hp'),
				'bagian' => $this->input->post('bagian'),
				'passwd' => $this->input->post('passwd')
				
            );
		$this->load->model('petugas');
		$query=$this->petugas->update($data);
		if($query==0){
			redirect("/admin/listPetugas");
		}else{
			 $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal update data !!</div></div>");
              
			redirect("admin/addPetugas");
		}
		
	}
	public function updateSuplier(){
		$data = array(
				'idSuplier' => $this->input->post('idSuplier'),
				'nama' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'hp' => $this->input->post('hp'),
				'email' => $this->input->post('email'),
				'hp' => $this->input->post('hp'),
				'deskripsi' => $this->input->post('deskripsi')
				
            );
		$this->load->model('suplier');
		$query=$this->suplier->update($data);
		
		if($query==0){
			redirect("admin/listSuplier");
		}else{
		
			redirect("admin/addSuplier");
		}
	}
	//delete function
	public function deletePetugas($id){
		$this->load->model('petugas');
		$query=$this->petugas->delete($id);
		redirect("admin/listPetugas");
	}
	public function deleteSuplier($id){
		$this->load->model('suplier');
		$query=$this->suplier->delete($id);
		redirect("admin/listSuplier");
	}
	//Searching
	public function cariProduk(){
		$word=$this->input->post('cari');
		$this->load->model('produk');
		$data['isi']=$this->produk->list_cariProduk($word);
		$this->load->view('dasboard/head');
		$this->load->view('dasboard/header');
		$this->load->view('dasboard/sidebar');
		$this->load->view('dasboard/listProduk',$data);
		$this->load->view('dasboard/footer');
		
	}
	/*input action function*/
	public function register_act(){
		$data = array(
				'ktp' => $this->input->post('ktp'),
				'nama' => $this->input->post('nama'),
				'jenkel' => $this->input->post('jenkel'),
				'alamat' => $this->input->post('alamat'),
				'hp' => $this->input->post('hp'),
				'email' => $this->input->post('email'),
				'hp' => $this->input->post('hp'),
				'bagian' => $this->input->post('bagian'),
				'passwd' => $this->input->post('passwd')
				
            );
		$this->load->model('petugas');
		$query=$this->petugas->daftar($data);
		if($query==0){
			redirect("/admin/listPetugas");
		}else{
		
			redirect("admin/addPetugas");
		}
	}
	public function addSuplier_act(){
		$this->db->reconnect();
		
	
		$data = array(
				
				'nama' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'hp' => $this->input->post('hp'),
				'email' => $this->input->post('email'),
				'hp' => $this->input->post('hp'),
				'deskripsi' => $this->input->post('deskripsi')
				
            );
		$this->load->model('suplier');
		$query=$this->suplier->addSuplier($data);
		
		if($query==0){
			redirect("admin/listSuplier");
		}else{
		
			redirect("admin/addSuplier");
		}
	}
	
	public function addCustomer_act(){
		$this->db->reconnect();
		
	
		$data = array(
				
				'nama' => $this->input->post('nama'),
				'jenkel' => $this->input->post('jenkel'),
				'alamat' => $this->input->post('alamat'),
				'hp' => $this->input->post('hp'),
				'email' => $this->input->post('email'),
				'hp' => $this->input->post('hp')
				
				
            );
		$this->load->model('customer');
		$query=$this->customer->addCustomer($data);
		
		if($query==0){
			redirect("/");
		}else{
		
			redirect("admin/addSuplier");
		}
	}
	public function addService_act(){
		$this->db->reconnect();
		$data = array(
				'petugas' => $this->session->userdata('username'),
				'tgl_open' => $this->input->post('tgl_open'),
				'customer' => $this->input->post('customer'),
				'subjek' => $this->input->post('subjek'),
				'keluhan' => $this->input->post('keluhan'),
				'tgl_solved' => $this->input->post('tgl_solved'),
				'teknisi' => $this->input->post('teknisi'),
				'penyelesaian' => $this->input->post('penyelesaian'),
				'status' => $this->input->post('status')
				
            );
		$this->load->model('service');
		$query=$this->service->addService($data);
		
		if($query==0){
			redirect("admin/listService");
		}else{
		
			redirect("admin/addService");
		}
	}
	public function addSolving_act(){
		$this->db->reconnect();
		$data = array(
				
				'id_service' => $this->input->post('id_service'),
				'tgl_solved' => $this->input->post('tgl_solved'),
				'teknisi' => $this->input->post('teknisi'),
				'penyelesaian' => $this->input->post('penyelesaian'),
				'status' => $this->input->post('status')
				
            );
		$this->load->model('service');
		//echo $data['id_service'];
		$query=$this->service->addSolving($data);
		
		if($query==0){
			redirect("admin/listService");
		}else{
		
			redirect("admin/listUnsolved");
		}
	}
	public function addProduk_act(){
		$this->load->library('upload');
        $nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = './assets/images/produk/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '2048'; //maksimum besar file 2M
        $config['max_width']  = '1288'; //lebar maksimum 1288 px
        $config['max_height']  = '768'; //tinggi maksimu 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya
 
        $this->upload->initialize($config);
		
		 if($_FILES['filefoto']['name'])
        {
            if ($this->upload->do_upload('filefoto'))
            {
                $gbr = $this->upload->data();
                $data = array(
                  'nm_gbr' =>$gbr['file_name'],
                  'nama' => $this->input->post('nama'),
				  'harga' => $this->input->post('harga'),
				  'suplier' => $this->input->post('suplier'),
				  'deskripsi' => $this->input->post('deskripsi')
                   
                );
				$this->load->model('produk');
                $this->produk->addProduk($data); //akses model untuk menyimpan ke database
                //pesan yang muncul jika berhasil diupload pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Upload gambar berhasil !!</div></div>");
                redirect('admin/listProduk'); //jika berhasil maka akan ditampilkan view vupload
            }else{
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal upload gambar !!</div></div>");
                redirect('admin/addProduk'); //jika gagal maka akan ditampilkan form upload
            }
        }else{
			redirect('admin/addProduk');
		}
	}
	public function addCart()
	{
		
		$data = array(
				'id' => $this->input->post('id'),
				'name' => $this->input->post('nama'),
				'qty' => $this->input->post('jumlah'),
				'price' => $this->input->post('harga')
				
            );
		
		$this->cart->insert($data);
		echo $data['id'];
		redirect("admin/addPenjualan");
	
	}
	public function hapus($id){
		
		$data=array(
			'rowid'=>$id,
			'qty' =>0
		
		);
		$this->cart->update($data);
		redirect("admin/addPenjualan");
	}
	public function addDataBelanja()
	{
		
		$idtrans=$this->input->post('idtransaksi');
		$data = array(
				'idTransaksi' => $this->input->post('idtransaksi'),
				'id' => $this->input->post('id'),
				'qty' => $this->input->post('jumlah'),
				'price' => $this->input->post('harga'),
				'total' => $this->input->post('total'),
				'tgl' => $this->input->post('tgl'),
				'idCustomer' => $this->input->post('id_customer'),
				'email' => $this->session->userdata('username')
				
            );
		
		$this->load->model('penjualan');
		$this->penjualan->addPenjualan($data);
		redirect("admin/addPenjualan");
		
	}
	//Authentication
	
	public function login_act(){
	
		$cek=$this->session->userdata('username');
		if($cek){
			redirect('admin');
		}else{
			$this->load->model('petugas');
			
			
				$data = array(
					'email' => $this->input->post('email'),
					'passwd' => $this->input->post('passwd')	 
				);
				
				$query = $this->petugas->login($data);
			   if($query==1)
			   {	
					$this->session->set_userdata('username',$data['email']);
					redirect("admin");		   
				   
			   }
			   else if($query==0)
			   {
				   $this->index();
			   }
		}
	}
	public function logout(){
		$this->session->sess_destroy();
			redirect("home");
	}
	
}
