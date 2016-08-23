<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	
	public function index()
	{
		$cek=$this->session->userdata('username');
		if($cek){
			$this->load->model('mcustomer');
			$data['customer']=$this->mcustomer->countCustomer();
			$this->load->view('dasboard/head');
			$this->load->view('dasboard/header');
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/admin',$data);
			$this->load->view('dasboard/footer');
		}else{
			
			redirect('home');
		}
	}
	//List data

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
					$this->load->model('mproduk');
					$this->mproduk->addProduk($data); //akses model untuk menyimpan ke database
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
	
	//Authentication
	
	public function login_act(){
	
		$cek=$this->session->userdata('username');
		if($cek){
			redirect('admin');
		}else{
			$this->load->model('mpetugas');
			
			
				$data = array(
					'email' => $this->input->post('email'),
					'passwd' => $this->input->post('passwd')	 
				);
				
				$query = $this->mpetugas->login($data);
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
