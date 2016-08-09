<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	
	public function index()
	{
		$cek=$this->session->userdata('username');
		if($cek){
			$this->session->set_flashdata('pesan','selamat datang');
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
		$cek=$this->session->userdata('username');
		if($cek){
			$this->load->model('petugas');
			$data['isi']=$this->petugas->list_petugas();
			$this->load->view('dasboard/head');
			$this->load->view('dasboard/header');
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/listPetugas',$data);
			$this->load->view('dasboard/footer');
		}else{
			
			redirect('home');
		}
	}
	public function listCustomer()
	{
		$cek=$this->session->userdata('username');
		if($cek){
			$this->load->model('customer');
			$data['isi']=$this->customer->list_customer();
			$data['institusi']=$this->customer->list_institusi();
			$this->load->view('dasboard/head');
			$this->load->view('dasboard/header');
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/listCustomer',$data);
			$this->load->view('dasboard/footer');
		}else{
			
			redirect('home');
		}
	}
	public function listSuplier()
	{
		$cek=$this->session->userdata('username');
		if($cek){
			$this->load->model('suplier');
			$data['isi']=$this->suplier->list_suplier();
			$this->load->view('dasboard/head');
			$this->load->view('dasboard/header');
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/listSuplier',$data);
			$this->load->view('dasboard/footer');
		}else{
			
			redirect('home');
		}
	}
	
	
	
	public function listPenjualan()
	{
		$cek=$this->session->userdata('username');
		if($cek){
			$this->load->model('penjualan');
			$data['isi']=$this->penjualan->list_penjualan();
			$this->load->view('dasboard/head');
			$this->load->view('dasboard/header');
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/listPenjualan',$data);
			$this->load->view('dasboard/footer');
		}else{
			
			redirect('home');
		}
	}
	public function listInstitusi()
	{
		$cek=$this->session->userdata('username');
		if($cek){
			$this->load->model('customer');
			$data['isi']=$this->customer->list_institusi();
			$this->load->view('dasboard/head');
			$this->load->view('dasboard/header');
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/listInstitusi',$data);
			$this->load->view('dasboard/footer');
			}else{
			
			redirect('home');
		}
	}
	
	//Add Data
	public function addPetugas()
	{
		$cek=$this->session->userdata('username');
		if($cek){
			$this->load->view('dasboard/head');
			$this->load->view('dasboard/header');
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/inputPetugas');
			$this->load->view('dasboard/footer');
		}else{
			
			redirect('home');
		}
	}
	public function addSuplier()
	{
		$cek=$this->session->userdata('username');
		if($cek){
			$this->load->view('dasboard/head');
			$this->load->view('dasboard/header');
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/inputSuplier');
			$this->load->view('dasboard/footer');
		}else{
			
			redirect('home');
		}
	}
	public function addCustomer()
	{
		$cek=$this->session->userdata('username');
		if($cek){
			$this->load->model('customer');
			$data['isi']=$this->customer->list_institusi();
			$this->load->view('dasboard/head');
			$this->load->view('dasboard/header');
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/inputCustomer',$data);
			$this->load->view('dasboard/footer');
		}else{
			
			redirect('home');
		}
	}
	
	
	public function addProduk()
	{
		$cek=$this->session->userdata('username');
		if($cek){
			$this->load->view('dasboard/head');
			$this->load->view('dasboard/header');
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/inputProduk');
			$this->load->view('dasboard/footer');
		}else{
			
			redirect('home');
		}
	}
	public function addPenjualan()
	{
		$cek=$this->session->userdata('username');
		if($cek){
			$this->load->model('produk');
			$data['isi']=$this->produk->list_produk();
			$this->load->model('customer');
			$data['customer']=$this->customer->list_customer();
			$this->load->view('dasboard/head');
			$this->load->view('dasboard/header');
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/Produk',$data);
			$this->load->view('dasboard/footer');
		}else{
			
			redirect('home');
		}
	}
	public function addInstitusi(){
		$cek=$this->session->userdata('username');
		if($cek){
			$this->load->view('dasboard/head');
			$this->load->view('dasboard/header');
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/inputInstitusi');
			$this->load->view('dasboard/footer');
		}else{
			
			redirect('home');
		}
	}
	
	//View Data
	public function viewPetugas($id){
		$cek=$this->session->userdata('username');
		if($cek){
			$this->load->model('petugas');
			//$this->load->model('produk');
			$data['isi']=$this->petugas->view_petugas($id);
			//$data['produk']=$this->produk->list_produk_perSuplier($id);
			$this->load->view('dasboard/head');
			$this->load->view('dasboard/header');
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/viewPetugas',$data);
			$this->load->view('dasboard/footer');
		}else{
			
			redirect('home');
		}
	}
	public function viewSuplier($id){
		$cek=$this->session->userdata('username');
		if($cek){
			$this->load->model('suplier');
			$this->load->model('produk');
			$data['isi']=$this->suplier->view_suplier($id);
			$data['produk']=$this->produk->list_produk_perSuplier($id);
			$this->load->view('dasboard/head');
			$this->load->view('dasboard/header');
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/viewSuplier',$data);
			$this->load->view('dasboard/footer');
		}else{
			
			redirect('home');
		}
	}
	public function viewCustomer($id){
		$cek=$this->session->userdata('username');
		if($cek){
			$this->load->model('customer');
			//$this->load->model('produk');
			$data['isi']=$this->customer->view_customer($id);
		
			$data['institusi']=$this->customer->list_institusi();
			$data['transaksi']=$this->customer->list_transaksi($id);
			$this->load->view('dasboard/head');
			$this->load->view('dasboard/header');
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/viewCustomer',$data);
			$this->load->view('dasboard/footer');
		}else{
			
			redirect('home');
		}
	}
	
	//update or edit data
	public function uploadImgPetugas_act(){
		$cek=$this->session->userdata('username');
		if($cek){
			$this->load->library('upload');
			$nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
			$config['upload_path'] = './assets/images/petugas/'; //path folder
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
			$config['max_size'] = '1024'; //maksimum besar file 1M
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
					redirect('admin/viewPetugas/'.$data['id_petugas']); //jika berhasil maka akan ditampilkan view vupload
				}else{
					//pesan yang muncul jika terdapat error dimasukkan pada session flashdata
					$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal upload gambar !!</div></div>");
					redirect('admin/viewPetugas/'.$data['id_petugas']); //jika gagal maka akan ditampilkan form upload
				}
			}else{
				redirect('admin/listPetugas');
			}
		}else{
			
			redirect('home');
		}
	}
	public function uploadImgSuplier_act(){
		$cek=$this->session->userdata('username');
		if($cek){
			$this->load->library('upload');
			$nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
			$config['upload_path'] = './assets/images/supplier/'; //path folder
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
			$config['max_size'] = '1024'; //maksimum besar file 2M
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
					  'idSuplier' => $this->input->post('idSuplier')
					  
					   
					);
					$this->load->model('suplier');
					$this->suplier->uploadGmbrSuplier($data); //akses model untuk menyimpan ke database
					//pesan yang muncul jika berhasil diupload pada session flashdata
					$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Upload gambar berhasil !!</div></div>");
					redirect('admin/viewSuplier/'.$data['idSuplier']); //jika berhasil maka akan ditampilkan view vupload
				}else{
					//pesan yang muncul jika terdapat error dimasukkan pada session flashdata
					$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal upload gambar !!</div></div>");
					redirect('admin/viewSuplier/'.$data['idSuplier']); //jika gagal maka akan ditampilkan form upload
				}
			}else{
				redirect('admin/listPetugas');
			}
		}else{
			
			redirect('home');
		}
	}
	public function updatePetugas(){
		$cek=$this->session->userdata('username');
		if($cek){
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
				redirect("admin/listPetugas");
			}else{
				 $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal update data !!</div></div>");
				  
				redirect("admin/addPetugas");
			}
		}else{
			
			redirect('home');
		}
		
	}
	public function updateSuplier(){
		$cek=$this->session->userdata('username');
		if($cek){
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
		}else{
			
			redirect('home');
		}
	}
	public function updateCustomer(){
		$cek=$this->session->userdata('username');
		if($cek){
			$data = array(
					'idInstitut' => $this->input->post('idInstitut'),
					'ktp' => $this->input->post('ktp'),
					'nama' => $this->input->post('nama'),
					'jenkel' => $this->input->post('jenkel'),
					'alamat' => $this->input->post('alamat'),
					'hp' => $this->input->post('hp'),
					'email' => $this->input->post('email'),
					'hp' => $this->input->post('hp'),
					'jabatan' => $this->input->post('jabatan')
					
				);
			$this->load->model('customer');
			$query=$this->customer->update($data);
			if($query==0){
				redirect("admin/listCustomer");
			}else{
				 $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal update data !!</div></div>");
				  
				redirect("admin/listCustomer");
			}
		}else{
			
			redirect('home');
		}
		
	}
	//delete function
	public function deletePetugas($id){
		$cek=$this->session->userdata('username');
		if($cek){
			$this->load->model('petugas');
			$query=$this->petugas->delete($id);
			redirect("admin/listPetugas");
		}else{
			
			redirect('home');
		}
	}
	public function deleteSuplier($id){
		$cek=$this->session->userdata('username');
		if($cek){
			$this->load->model('suplier');
			$query=$this->suplier->delete($id);
			redirect("admin/listSuplier");
		}else{
			
			redirect('home');
		}
	}
	public function deleteCustomer($id){
		$cek=$this->session->userdata('username');
		if($cek){
			$this->load->model('customer');
			$query=$this->customer->delete($id);
			redirect("admin/listCustomer");
		}else{
			
			redirect('home');
		}
	}
	//Searching
	public function cariProduk(){
		$cek=$this->session->userdata('username');
		if($cek){
			$word=$this->input->post('cari');
			$this->load->model('produk');
			$data['isi']=$this->produk->list_cariProduk($word);
			$this->load->view('dasboard/head');
			$this->load->view('dasboard/header');
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/listProduk',$data);
			$this->load->view('dasboard/footer');
		}else{
			
			redirect('home');
		}
		
	}
	public function cariPetugas(){
		$cek=$this->session->userdata('username');
		if($cek){
			$word=$this->input->post('cari');
			$this->load->model('petugas');
			$data['isi']=$this->petugas->list_cariPetugas($word);
			$this->load->view('dasboard/head');
			$this->load->view('dasboard/header');
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/listPetugas',$data);
			$this->load->view('dasboard/footer');
		}else{
			
			redirect('home');
		}
		
	}
	public function cariSuplier(){
		$cek=$this->session->userdata('username');
		if($cek){
			$word=$this->input->post('cari');
			$this->load->model('suplier');
			$data['isi']=$this->suplier->list_cariSuplier($word);
			$this->load->view('dasboard/head');
			$this->load->view('dasboard/header');
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/listSuplier',$data);
			$this->load->view('dasboard/footer');
		}else{
			
			redirect('home');
		}
		
	}
	public function cariCustomer(){
		$cek=$this->session->userdata('username');
		if($cek){
			$word=$this->input->post('cari');
			$this->load->model('customer');
			$data['isi']=$this->customer->list_cariCustomer($word);
			$this->load->view('dasboard/head');
			$this->load->view('dasboard/header');
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/listCustomer',$data);
			$this->load->view('dasboard/footer');
		}else{
			
			redirect('home');
		}
		
	}
	/*input action function*/
	public function register_act(){
		$cek=$this->session->userdata('username');
		if($cek){
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
		}else{
			
			redirect('home');
		}
	}
	public function addSuplier_act(){
		$this->db->reconnect();
		
		$cek=$this->session->userdata('username');
		if($cek){
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
		}else{
			
			redirect('home');
		}
	}
	
	public function addCustomer_act(){
		$this->db->reconnect();
		
		$cek=$this->session->userdata('username');
		if($cek){
			$data = array(
					'idInstitut' => $this->input->post('idInstitut'),
					'idCustomer' => $this->input->post('idCustomer'),
					'nama' => $this->input->post('nama'),
					'jenkel' => $this->input->post('jenkel'),
					'alamat' => $this->input->post('alamat'),
					'hp' => $this->input->post('hp'),
					'email' => $this->input->post('email'),
					'jabatan' => $this->input->post('jabatan')
					
					
				);
			$this->load->model('customer');
			$query=$this->customer->addCustomer($data);
			
			if($query==0){
				redirect("admin/addCustomer");
			}else{
			
				redirect("admin/addCustomer");
			}
			}else{
			
			redirect('home');
		}
	}
	public function addInstitusi_act(){
			$this->db->reconnect();
		$cek=$this->session->userdata('username');
		if($cek){	
		
			$data = array(
					
					'id' => $this->input->post('id'),
					'nama' => $this->input->post('nama'),
					'alamat' => $this->input->post('alamat'),
					'hp' => $this->input->post('hp'),
					'email' => $this->input->post('email')
					
					
				);
			$this->load->model('customer');
			$query=$this->customer->addInstitusi($data);
			
			if($query==0){
				redirect("admin/listInstitusi");
			}else{
			
				redirect("admin/addSuplier");
			}
		}else{
			
			redirect('home');
		}
	}
	
	
	public function addProduk_act(){
		$cek=$this->session->userdata('username');
		if($cek){
			$this->load->library('upload');
			$nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
			$config['upload_path'] = './assets/images/produk/'; //path folder
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
			$config['max_size'] = '1024'; //maksimum besar file 2M
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
		}else{
			$this->session->set_flashdata("pesan","<div class=\"alert alert-danger\">
			<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
			<strong>Waktu session habis</strong> Silahkan login kembali.
			</div>");
			redirect('home');
		}
	}
	public function addCart()
	{
		$cek=$this->session->userdata('username');
		if($cek){
			$data = array(
					'id' => $this->input->post('id'),
					'name' => $this->input->post('nama'),
					'qty' => $this->input->post('jumlah'),
					'price' => $this->input->post('harga')
					
				);
			
			$this->cart->insert($data);
			echo $data['id'];
			redirect("admin/addPenjualan");
		}else{
			
			redirect('home');
		}
	
	}
	public function hapus($id){
		$cek=$this->session->userdata('username');
		if($cek){
			
			$data=array(
				'rowid'=>$id,
				'qty' =>0
			
			);
			$this->cart->update($data);
			redirect("admin/addPenjualan");
		}else{
			
			redirect('home');
		}
	}
	public function addDataBelanja()
	{
		$cek=$this->session->userdata('username');
		if($cek){
			$idtrans=$this->input->post('idtransaksi');
			$data = array(
					'idTransaksi' => $this->input->post('idtransaksi'),
					'id' => $this->input->post('id'),
					'qty' => $this->input->post('jumlah'),
					'price' => $this->input->post('harga'),
					'total' => $this->input->post('total'),
					'tgl' => $this->input->post('tgl'),
					'kurir' => $this->input->post('kurir'),
					
					'idCustomer' => $this->input->post('id_customer'),
					'email' => $this->session->userdata('username')
					
				);
			
			$this->load->model('penjualan');
			$this->penjualan->addPenjualan($data);
			redirect("admin/addPenjualan");
		}else{
			
			redirect('home');
		}
		
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
		
		$this->session->set_flashdata('pesan','<div class=\"alert alert-success\">
    <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
    <strong>Logout berhasil!!!</strong> </div>');
			redirect("home");
	}
	
	
}
