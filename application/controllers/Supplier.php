<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {
	public function index(){
		redirect('supplier/listSupplier');
	}
	
	
	//add data
	public function addSupplier()
	{
		$cek=$this->session->userdata('username');
		if($cek){
			$this->load->view('dasboard/head');
			$this->load->view('dasboard/header');
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/inputSupplier');
			$this->load->view('dasboard/footer');
		}else{
			
			redirect('home');
		}
	}
	//list data
	public function listSupplier()
	{
		$cek=$this->session->userdata('username');
		if($cek){
			$this->load->model('msupplier');
			$this->load->library('pagination');
			//$data['isi']=$this->msupplier->list_supplier();
			
			$config['base_url']=base_url().'supplier/listSupplier';
			$config['total_rows']=$this->msupplier->countSupplier();
			$config["per_page"]=$per_page=25;
			$config["uri_segment"] = 3;
			
			
			//config for bootstrap pagination class integration
			$config['full_tag_open'] = '<ul class="pagination">';
			$config['full_tag_close'] = '</ul>';
			$config['first_link'] = 'First';
			$config['last_link'] = 'Last';
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['prev_link'] = '&laquo';
			$config['prev_tag_open'] = '<li class="prev">';
			$config['prev_tag_close'] = '</li>';
			$config['next_link'] = '&raquo';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="active"><a href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$this->pagination->initialize($config);
			
			$data['paging']=$this->pagination->create_links();
			$page=($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			
			$data['isi']=$this->msupplier->pageList_supplier($page,$per_page);
			
			$this->load->view('dasboard/head');
			$this->load->view('dasboard/header');
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/listSupplier',$data);
			$this->load->view('dasboard/footer');
		}else{
			
			redirect('home');
		}
	}
	//view data
	public function viewSupplier($id){
		$cek=$this->session->userdata('username');
		if($cek){
			$this->load->model('msupplier');
			$this->load->model('mproduk');
			$this->load->model('mproduk');
			$data['isi']=$this->msupplier->view_supplier($id);
			$data['produk']=$this->mproduk->list_produk_perSuplier($id);
			$data['barang']=$this->mproduk->list_item();
			$this->load->view('dasboard/head');
			$this->load->view('dasboard/header');
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/viewSupplier',$data);
			$this->load->view('dasboard/footer');
		}else{
			
			redirect('home');
		}
	}
	//update data
	public function updateSupplier(){
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
			$this->load->model('msupplier');
			$query=$this->msupplier->update($data);
			
			if($query==1){
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable text-center">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p>	<i class="icon fa fa-check"></i> Update data berhasil</p></div>');
				redirect("supplier/listSupplier");
			}else{
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable text-center">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p>	<i class="icon fa fa-ban"></i>Password tidak cocok,Update data gagal!</p></div>');
				redirect("supplier/addSupplier");
			}
		}else{
			
			redirect('home');
		}
	}
	//delete data
	public function deleteSupplier($id){
		$cek=$this->session->userdata('username');
		if($cek){
			$this->load->model('msupplier');
			$query=$this->msupplier->delete($id);
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable text-center">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p>	<i class="icon fa fa-check"></i> Delete data berhasil</p></div>');
			redirect("supplier/listSupplier");
		}else{
			
			redirect('home');
		}
	}
	//searching data
	public function cariSuplier(){
		$cek=$this->session->userdata('username');
		if($cek){
			$word=$this->input->post('cari');
			$this->load->model('msupplier');
			$data['isi']=$this->msupplier->list_cariSupplier($word);
			$this->load->view('dasboard/head');
			$this->load->view('dasboard/header');
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/listSupplier',$data);
			$this->load->view('dasboard/footer');
		}else{
			
			redirect('home');
		}
		
	}
	//upload image
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
			$idSuplier= $this->input->post('idSuplier');
			$this->upload->initialize($config);
			
			 if($_FILES['filefoto']['name'])
			{
				if ($this->upload->do_upload('filefoto'))
				{
					$gbr = $this->upload->data();
					$data = array(
					  'nm_gbr' =>$gbr['file_name'],
					  'idSuplier' => $idSuplier
					  
					   
					);
					$this->load->model('msupplier');
					$this->msupplier->uploadGmbrSuplier($data); //akses model untuk menyimpan ke database
					
					$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable text-center">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p>	<i class="icon fa fa-check"></i> Upload photo berhasil</p></div>');
					redirect('supplier/viewSupplier/'.$idSuplier); //jika berhasil maka akan ditampilkan view vupload
				}else{
					//pesan yang muncul jika terdapat error dimasukkan pada session flashdata
					
					$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable text-center">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p>	<i class="icon fa fa-ban"></i>Uplaod photo gagal, silahkan coba lagi dengan ukuran dan resolusi yang lebih kecil atau format file berbeda!</p></div>');
					redirect('supplier/viewSupplier/'.$idSuplier); //jika gagal maka akan ditampilkan form upload
				}
			}else{
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable text-center">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p>	<i class="icon fa fa-ban"></i>File photo belum dipilih, silahkan pilih file photo terlebih dahulu</p></div>');
				redirect('supplier/viewSupplier/'.$idSuplier);
			}
		}else{
			
			redirect('home');
		}
	}
	//action function
	public function addSupplier_act(){
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
			$this->load->model('msupplier');
			$query=$this->msupplier->addSupplier($data);
			
			if($query==1){
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable text-center">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p>	<i class="icon fa fa-check"></i> Input data berhasil</p></div>');
				redirect("supplier/addSupplier");
			}else if($query==-1){
				$this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissable text-center">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p>	<i class="icon fa fa-warning"></i> Nama supplier sudah ada, silahkan masukkan data yang lain!</p></div>');
				redirect("supplier/addSupplier");
				
			}else{
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable text-center">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p>	<i class="icon fa fa-ban"></i>Input data gagal, silahkan ulangi kembali!</p></div>');
				redirect("supplier/addSupplier");
			}
		}else{
			
			redirect('home');
		}
	}
	public function tambahProduk(){
		$this->load->model('msupplier');
		$data=array(
			'idSupplier' => $this->input->post('idSupplier'),
			'idItem' => $this->input->post('idItem')
		);
		$query=$this->msupplier->tambahProduk($data);
		if($query==1){
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable text-center">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p>	<i class="icon fa fa-check"></i> Input data berhasil</p></div>');
			redirect('supplier/viewSupplier/'.$data['idSupplier'].'/#produk');
		}else if($query==-1){
			$this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissable text-center">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p>	<i class="icon fa fa-warning"></i>Input data gagal,produk sudah ada di Supplier ini!</p></div>');
			redirect('supplier/viewSupplier/'.$data['idSupplier'].'/#produk');
		}
		
	}
	
}
?>