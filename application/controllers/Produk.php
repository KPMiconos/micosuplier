<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {
	function index(){
		redirect('produk/listItem');
	}
	//add data
	public function addItem(){
		$cek=$this->session->userdata('username');
		if($cek){
			//data header
			$email=$this->session->userdata('username');
			$this->load->model('mpetugas');
			$idPet=$this->mpetugas->getId($email);
			$user['user']=$this->mpetugas->view_petugas($idPet);
			$this->load->model('mgudang');
			$user['limit']=$this->mgudang->hitungAlertStok();
			$user['alert']=$this->mgudang->alertStok();
			//
			$this->load->model('mproduk');
			$data['satuan']=$this->mproduk->list_satuan();
			$this->load->view('dasboard/head');
			$this->load->view('dasboard/header',$user);
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/inputItem',$data);
			$this->load->view('dasboard/footer');
		}else{
			
			redirect('home');
		}
	}
		
	public function addSatuan(){
		$cek=$this->session->userdata('username');
		if($cek){
			
			$data = array(
					'nama' => $this->input->post('nama'),
					'kelas' => $this->input->post('kelas'),
					'deskripsi' => $this->input->post('deskripsi')

				);
			
			$this->load->model('mproduk');
			$this->mproduk->addSatuan($data);
			redirect("produk/listSatuan");
		}else{
			
			redirect('home');
		}
	}
	public function addTipeItem(){
		$cek=$this->session->userdata('username');
		if($cek){
			$data = array(
					'nama' => $this->input->post('nama'),
					'deskripsi' => $this->input->post('deskripsi')

				);
			
			$this->load->model('mproduk');
			$this->mproduk->addTipeItem($data);
			redirect("produk/listTipeItem");
		}else{
			
			redirect('home');
		}
	}
	//list data
	public function listItem(){
		$cek=$this->session->userdata('username');
		if($cek){
			//data header
			$email=$this->session->userdata('username');
			$this->load->model('mpetugas');
			$idPet=$this->mpetugas->getId($email);
			$user['user']=$this->mpetugas->view_petugas($idPet);
			$this->load->model('mgudang');
			$user['limit']=$this->mgudang->hitungAlertStok();
			$user['alert']=$this->mgudang->alertStok();
			//
			$this->load->model('mproduk');
			$data['isi']=$this->mproduk->list_item();
			$data['satuan']=$this->mproduk->list_satuan();
			$data['tipe']=$this->mproduk->list_tipeItem();
			$this->load->view('dasboard/head');
			$this->load->view('dasboard/header',$user);
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/listItem',$data);
			$this->load->view('dasboard/footer');
		}else{
			
			redirect('home');
		}
	}
	public function listSatuan(){
		$cek=$this->session->userdata('username');
		if($cek){
			//data header
			$email=$this->session->userdata('username');
			$this->load->model('mpetugas');
			$idPet=$this->mpetugas->getId($email);
			$user['user']=$this->mpetugas->view_petugas($idPet);
			$this->load->model('mgudang');
			$user['limit']=$this->mgudang->hitungAlertStok();
			$user['alert']=$this->mgudang->alertStok();
			//
			$this->load->model('mproduk');
			$data['isi']=$this->mproduk->list_satuan();
			$this->load->view('dasboard/head',$user);
			$this->load->view('dasboard/header');
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/listSatuan',$data);
			$this->load->view('dasboard/footer');
		}else{
			
			redirect('home');
		}
	}
	public function listTipeItem(){
		$cek=$this->session->userdata('username');
		if($cek){
			//data header
			$email=$this->session->userdata('username');
			$this->load->model('mpetugas');
			$idPet=$this->mpetugas->getId($email);
			$user['user']=$this->mpetugas->view_petugas($idPet);
			$this->load->model('mgudang');
			$user['limit']=$this->mgudang->hitungAlertStok();
			$user['alert']=$this->mgudang->alertStok();
			//
			$this->load->model('mproduk');
			$data['isi']=$this->mproduk->list_tipeItem();
			$this->load->view('dasboard/head');
			$this->load->view('dasboard/header',$user);
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/listTipeItem',$data);
			$this->load->view('dasboard/footer');
		}else{
			
			redirect('home');
		}
	}
	//view data
	public function viewItem($id){
		$cek=$this->session->userdata('username');
		if($cek){
			//data header
			$email=$this->session->userdata('username');
			$this->load->model('mpetugas');
			$idPet=$this->mpetugas->getId($email);
			$user['user']=$this->mpetugas->view_petugas($idPet);
			$this->load->model('mgudang');
			$user['limit']=$this->mgudang->hitungAlertStok();
			$user['alert']=$this->mgudang->alertStok();
			//
			$this->load->model('mproduk');
			$data['isi']=$this->mproduk->viewItem($id);
			$data['satuan']=$this->mproduk->list_satuan();
			$data['tipe']=$this->mproduk->list_tipeItem();
			$this->load->view('dasboard/head');
			$this->load->view('dasboard/header',$user);
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/viewItem',$data);
			$this->load->view('dasboard/footer');
		}else{
			
			redirect('home');
		}
	}
	public function viewProduk($id){
		$cek=$this->session->userdata('username');
		if($cek){
			//data header
			$email=$this->session->userdata('username');
			$this->load->model('mpetugas');
			$idPet=$this->mpetugas->getId($email);
			$user['user']=$this->mpetugas->view_petugas($idPet);
			$this->load->model('mgudang');
			$user['limit']=$this->mgudang->hitungAlertStok();
			$user['alert']=$this->mgudang->alertStok();
			//
			$this->load->model('mproduk');
			$data['isi']=$this->mproduk->viewItem($id);
			$data['rincian']=$this->mproduk->rincianProduk($id);
			$data['satuan']=$this->mproduk->list_satuan();
			$data['tipe']=$this->mproduk->list_tipeItem();
			$this->load->view('dasboard/head');
			$this->load->view('dasboard/header',$user);
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/viewProduk',$data);
			$this->load->view('dasboard/footer');
		}else{
			
			redirect('home');
		}
	}
	//action function
	public function addItem_act(){
		$cek=$this->session->userdata('username');
		if($cek){	
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
					  'idItem' => $this->input->post('idItem'),
					  'nama' => $this->input->post('nama'),
					  'tipe' => $this->input->post('tipe'),
					  'satuan' => $this->input->post('satuan'),
					  'deskripsi' => $this->input->post('deskripsi')
					);
					$this->load->model('mproduk');
					$this->mproduk->addItem($data); //akses model untuk menyimpan ke database
					//pesan yang muncul jika berhasil diupload pada session flashdata
					$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Upload gambar berhasil !!</div></div>");
					redirect('produk/addItem'); //jika berhasil maka akan ditampilkan view vupload
				}else{
					//pesan yang muncul jika terdapat error dimasukkan pada session flashdata
					$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal upload gambar !!</div></div>");
					redirect('produk/addItem'); //jika gagal maka akan ditampilkan form upload
				}
			}else{
				 $data = array(
					  'nm_gbr' => '',
					  'idItem' => $this->input->post('idItem'),
					  'nama' => $this->input->post('nama'),
					  'tipe' => $this->input->post('tipe'),
					  'satuan' => $this->input->post('satuan'),
					  'deskripsi' => $this->input->post('deskripsi')
					);
					$this->load->model('mproduk');
					$this->mproduk->addItem($data); 
				 redirect('produk/addItem');
			}
		}else{
			
			redirect('home');
		}
	}
	//update item
	public function updateItem(){
		
		$cek=$this->session->userdata('username');
		if($cek){
			 $data = array(
					  
					  'idItem' => $this->input->post('idItem'),
					  'nama' => $this->input->post('nama'),
					  'tipe' => $this->input->post('tipe'),
					  'satuan' => $this->input->post('satuan'),
					  'deskripsi' => $this->input->post('deskripsi')
					);
					$this->load->model('mproduk');
					$query=$this->mproduk->updateItem($data); 
					if($query==1){
						$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<p>	<i class="icon fa fa-check"></i> Update data berhasil</p></div>');
						redirect("produk/listItem");
					}else{
						$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<p>	<i class="icon fa fa-ban"></i>Update data gagal </p></div>');
						redirect("produk/listItem");
					}
		}else{
			redirect('home');
		}
	}
	public function updateSatuan(){
		$cek=$this->session->userdata('username');
		if($cek){
			$data = array(
					'id' => $this->input->post('id'),
					'nama' => $this->input->post('nama'),
					'kelas' => $this->input->post('kelas'),
					'deskripsi' => $this->input->post('deskripsi')

				);
			
			$this->load->model('mproduk');
			$query=$this->mproduk->updateSatuan($data);
			if($query==1){
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<p>	<i class="icon fa fa-check"></i> Update data berhasil</p></div>');
				redirect("produk/listSatuan");
			}else{
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<p>	<i class="icon fa fa-ban"></i>Update data gagal </p></div>');
				redirect("produk/listSatuan");
			}
		}else{
			
			redirect('home');
		}
		
	}
	public function updateTipeItem(){
		$cek=$this->session->userdata('username');
		if($cek){
			$data = array(
					'id' => $this->input->post('id'),
					'nama' => $this->input->post('nama'),
					'deskripsi' => $this->input->post('deskripsi')

				);
			
			$this->load->model('mproduk');
			$query=$this->mproduk->updateTipeItem($data);
			
			if($query==1){
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<p>	<i class="icon fa fa-check"></i> Update data berhasil</p></div>');
				redirect("produk/listTipeItem");
			}else{
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<p>	<i class="icon fa fa-ban"></i>Update data gagal </p></div>');
				redirect("produk/listTipeItem");
			}
		}else{
			
			redirect('home');
		}
	}
	//delete item
	public function delete($id){
		$cek=$this->session->userdata('username');
		if($cek){
			$this->load->model('mproduk');
			$query=$this->mproduk->delete($id);
			if($query==1){
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<p>	<i class="icon fa fa-check"></i> Hapus data berhasil</p></div>');
				redirect("produk/listItem");
			}else{
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<p>	<i class="icon fa fa-ban"></i>Hapus data gagal </p></div>');
				redirect("produk/listItem");
			}
		}else{
			
			redirect('home');
		}
	}
	public function deleteSatuan($id){
		$cek=$this->session->userdata('username');
		if($cek){
			$this->load->model('mproduk');
			$query=$this->mproduk->deleteSatuan($id);
			if($query==1){
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<p>	<i class="icon fa fa-check"></i> Hapus data berhasil</p></div>');
				redirect("produk/listSatuan");
			}else{
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<p>	<i class="icon fa fa-ban"></i>Hapus data gagal </p></div>');
				redirect("produk/listSatuan");
			}
		}else{
			
			redirect('home');
		}
	}
	public function deleteTipe($id){
		$cek=$this->session->userdata('username');
		if($cek){
			$this->load->model('mproduk');
			$query=$this->mproduk->deleteTipe($id);
			if($query==1){
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<p>	<i class="icon fa fa-check"></i> Hapus data berhasil</p></div>');
				redirect("produk/listTipeItem");
			}else{
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<p>	<i class="icon fa fa-ban"></i>Hapus data gagal </p></div>');
				redirect("produk/listTipeItem");
			}
		}else{
			
			redirect('home');
		}
	}
}
?>