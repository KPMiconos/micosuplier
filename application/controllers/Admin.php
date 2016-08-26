<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	
	public function index()
	{
		$id=$this->input->post('idItem');
		if(empty($id)){
			$id=1;
		}
		$this->session->set_userdata('itemStok',$id);
		$cek=$this->session->userdata('username');
		if($cek){
			$email=$this->session->userdata('username');
			
			$this->load->model('mpetugas');
			$idPet=$this->mpetugas->getId($email);
			$user['user']=$this->mpetugas->view_petugas($idPet);
			$this->load->model('mgudang');
			$user['limit']=$this->mgudang->hitungAlertStok();
			$user['alert']=$this->mgudang->alertStok();
			
			$this->load->model('mcustomer');
			$data['customer']=$this->mcustomer->countCustomer();
			$data['alert']=$this->mgudang->alertStok();
			$data['stok']=$this->mgudang->stokGudang($id);
			$this->load->model('msupplier');
			$data['supplier']=$this->msupplier->countSupplier();
			$this->load->model('mproduk');
			$data['item']=$this->mproduk->list_item();
			$this->load->view('dasboard/head');
			$this->load->view('dasboard/header',$user);
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/admin',$data);
			$this->load->view('dasboard/footer');
		}else{
			
			redirect('home');
		}
	}
	//List data
	
	
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
					$hak = $this->mpetugas->cekAkses($data['email']);
					if($hak==1){
						$this->session->set_userdata('admin',$data['email']);
					}else if($hak==2){
						$this->session->set_userdata('purchasing',$data['email']);
					}
					else if($hak==3){
						$this->session->set_userdata('gudang',$data['email']);
					}else if($hak==4){
						$this->session->set_userdata('marketing',$data['email']);
					}else if($hak==5){
						$this->session->set_userdata('produksi',$data['email']);
					}else if($hak==0){
						$this->session->set_userdata('tamu',$data['email']);
					}
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
