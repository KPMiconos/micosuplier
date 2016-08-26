<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller {

	//add data
	public function addPetugas()
	{
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
			$this->load->view('dasboard/head');
			$this->load->view('dasboard/header',$user);
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/inputPetugas');
			$this->load->view('dasboard/footer');
		}else{
			
			redirect('home');
		}
	}
	public function privilege(){
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
			$this->load->model('mpetugas');
			$data['isi']=$this->mpetugas->list_petugas();
			$this->load->view('dasboard/head');
			$this->load->view('dasboard/header',$user);
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/privilege',$data);
			$this->load->view('dasboard/footer');
		}else{
			
			redirect('home');
		}
	}
	//update data
	public function updatePrivilege(){
		$cek=$this->session->userdata('username');
		if($cek){
			$data = array(
					'id_petugas' => $this->input->post('id_petugas'),
					'privilege' => $this->input->post('privilege')
				);
			//echo $data['id_petugas'],$data['privilege'];
			$this->load->model('mpetugas');
			$query=$this->mpetugas->updatePrivilege($data);
			redirect('petugas/privilege');
		}else{
			
			redirect('home');
		}
	}
	public function ubahPassword(){
		$cek=$this->session->userdata('username');
		if($cek){
			$data = array(
					'id_petugas' => $this->input->post('id_petugas'),
					'passwordLama' => $this->input->post('passwordLama'),
					'passwordBaru' => $this->input->post('passwordBaru')
				);
			//echo $data['id_petugas'],$data['privilege'];
			$id=$data['id_petugas'];
			$this->load->model('mpetugas');
			$query=$this->mpetugas->ubahPassword($data);
			
			redirect('petugas/viewPetugas/'.$id);
		}else{
			
			redirect('home');
		}
	}
	//list data
	public function listPetugas()
	{
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
			$this->load->model('mpetugas');
			$data['isi']=$this->mpetugas->list_petugas();
			$this->load->view('dasboard/head');
			$this->load->view('dasboard/header',$user);
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/listPetugas',$data);
			$this->load->view('dasboard/footer');
		}else{
			
			redirect('home');
		}
	}
	//view data
	public function viewPetugas($id){
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
			$this->load->model('mpetugas');
			//$this->load->model('produk');
			$data['isi']=$this->mpetugas->view_petugas($id);
			//$data['produk']=$this->produk->list_produk_perSuplier($id);
			$this->load->view('dasboard/head');
			$this->load->view('dasboard/header',$user);
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/viewPetugas',$data);
			$this->load->view('dasboard/footer');
		}else{
			
			redirect('home');
		}
	}
	//update data
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
			$this->load->model('mpetugas');
			$query=$this->mpetugas->update($data);
			if($query==1){
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable text-center">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p>	<i class="icon fa fa-check"></i> Update data berhasil</p></div>');
				redirect("petugas/listPetugas");
			}else{
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable text-center">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p>	<i class="icon fa fa-ban"></i>Password tidak cocok,Update data gagal!</p></div>');
				  
				redirect("petugas/listPetugas");
			}
		}else{
			
			redirect('home');
		}
		
	}
	//delete  data
	public function deletePetugas($id){
		$cek=$this->session->userdata('username');
		if($cek){
			$this->load->model('mpetugas');
			$query=$this->mpetugas->delete($id);
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable text-center">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p>	<i class="icon fa fa-check"></i> Delete data berhasil</p></div>');
			redirect("petugas/listPetugas");
		}else{
			
			redirect('home');
		}
	}
	//searching data
	public function cariPetugas(){
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
			$word=$this->input->post('cari');
			$this->load->model('mpetugas');
			$data['isi']=$this->mpetugas->list_cariPetugas($word);
			$this->load->view('dasboard/head');
			$this->load->view('dasboard/header',$user);
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/listPetugas',$data);
			$this->load->view('dasboard/footer');
		}else{
			
			redirect('home');
		}
		
	}
	
	//upload image
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
			$idPetugas=$this->input->post('id_petugas');
			$this->upload->initialize($config);
			
			 if($_FILES['filefoto']['name'])
			{
				if ($this->upload->do_upload('filefoto'))
				{
					$gbr = $this->upload->data();
					$data = array(
					  'nm_gbr' =>$gbr['file_name'],
					  'id_petugas' => $idPetugas
					  
					   
					);
					$this->load->model('mpetugas');
					$this->mpetugas->uploadGmbrPetugas($data); //akses model untuk menyimpan ke database
					$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable text-center">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p>	<i class="icon fa fa-check"></i> Upload photo berhasil</p></div>');
					
					redirect('petugas/viewPetugas/'.$idPetugas); //jika berhasil maka akan ditampilkan view vupload
				}else{
					//pesan yang muncul jika terdapat error dimasukkan pada session flashdata
					$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable text-center">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p>	<i class="icon fa fa-ban"></i>Uplaod photo gagal, silahkan coba lagi dengan ukuran dan resolusi yang lebih kecil atau format file berbeda!</p></div>');
					redirect('petugas/viewPetugas/'.$idPetugas); //jika gagal maka akan ditampilkan form upload
				}
			}else{
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable text-center">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p>	<i class="icon fa fa-ban"></i>File photo belum dipilih, silahkan pilih file photo terlebih dahulu</p></div>');
					redirect('petugas/viewPetugas/'.$idPetugas); //jika gagal maka akan ditampilkan form upload
			}
		}else{
			
			redirect('home');
		}
	}
	//action function
	public function addPetugas_act(){
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
			$this->load->model('mpetugas');
			$query=$this->mpetugas->daftar($data);
			if($query==0){
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p>	<i class="icon fa fa-check"></i> input data berhasil</p></div>');
				redirect("petugas/addPetugas");
			}else if($query==-1){
				$this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p>	<i class="icon fa fa-warning"></i>No.id sudah terpakai, silahkan gunakan No.id yang lain.</p></div>');
				redirect("petugas/addPetugas");
			}else{
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p>	<i class="icon fa fa-ban"></i>data gagal diinputkan</p></div>');
				redirect("petugas/addPetugas");
			}
		}else{
			
			redirect('home');
		}
	}
	

}
?>