<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Customer extends CI_Controller{
	//add data
	public function addCustomer()
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
			
			$this->load->model('mcustomer');
			$data['isi']=$this->mcustomer->list_institusi();
			$this->load->view('dasboard/head');
			$this->load->view('dasboard/header',$user);
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/inputCustomer',$data);
			$this->load->view('dasboard/footer');
		}else{
			
			redirect('home');
		}
	}
	public function addInstitusi(){
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
			
			$this->load->view('dasboard/head');
			$this->load->view('dasboard/header',$user);
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/inputInstitusi');
			$this->load->view('dasboard/footer');
		}else{
			
			redirect('home');
		}
	}
	//list data
	public function listCustomer()
	{
		$cek=$this->session->userdata('username');
		if($cek){
			$this->load->library('pagination');
			$this->load->model('mcustomer');
			//$data['isi']=$this->mcustomer->list_customer();
			$data['institusi']=$this->mcustomer->list_institusi();
			$config['base_url']=base_url().'customer/listCustomer';
			$config['total_rows']=$this->mcustomer->countCustomer();
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
			
			$data['isi']=$this->mcustomer->pageList_customer($page,$per_page);
			
			
			//data header
			$email=$this->session->userdata('username');
			$this->load->model('mpetugas');
			$idPet=$this->mpetugas->getId($email);
			$user['user']=$this->mpetugas->view_petugas($idPet);
			$this->load->model('mgudang');
			$user['limit']=$this->mgudang->hitungAlertStok();
			$user['alert']=$this->mgudang->alertStok();
		
			$this->load->view('dasboard/head');
			$this->load->view('dasboard/header',$user);
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/listCustomer',$data);
			$this->load->view('dasboard/footer');
			
			
			
		}else{
			
			redirect('home');
		}
	}
	public function listInstitusi()
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
			
			$this->load->model('mcustomer');
			$data['isi']=$this->mcustomer->list_institusi();
			$this->load->view('dasboard/head');
			$this->load->view('dasboard/header',$user);
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/listInstitusi',$data);
			$this->load->view('dasboard/footer');
			}else{
			
			redirect('home');
		}
	}
	//view data
	public function viewCustomer($id){
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
			
			$this->load->model('mcustomer');
			//$this->load->model('produk');
			$data['isi']=$this->mcustomer->view_customer($id);
		
			$data['institusi']=$this->mcustomer->list_institusi();
			$data['transaksi']=$this->mcustomer->list_transaksi($id);
			$this->load->view('dasboard/head');
			$this->load->view('dasboard/header',$user);
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/viewCustomer',$data);
			$this->load->view('dasboard/footer');
		}else{
			
			redirect('home');
		}
	}
	public function viewInstitusi($id){
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
			
			$this->load->model('mcustomer');
			//$this->load->model('produk');
			$data['isi']=$this->mcustomer->view_institusi($id);
		
			
			$data['customer']=$this->mcustomer->list_customerPerInstitusi($id);
			$this->load->view('dasboard/head');
			$this->load->view('dasboard/header',$user);
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/viewInstitusi',$data);
			$this->load->view('dasboard/footer');
		}else{
			
			redirect('home');
		}
	}
	//update data
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
			$this->load->model('mcustomer');
			$query=$this->mcustomer->update($data);
			if($query==1){
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p>	<i class="icon fa fa-check"></i> Update data berhasil</p></div>');
				redirect("customer/listCustomer");
			}else{
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p>	<i class="icon fa fa-ban"></i>Update data gagal </p></div>');
				redirect("customer/listCustomer");
			}
		}else{
			
			redirect('home');
		}
		
	}
	//delete data
	public function deleteCustomer($id){
		$cek=$this->session->userdata('username');
		if($cek){
			$this->load->model('mcustomer');
			$query=$this->mcustomer->delete($id);
			redirect("customer/listCustomer");
		}else{
			
			redirect('home');
		}
	}
	public function deleteInstitusi($id){
		$cek=$this->session->userdata('username');
		if($cek){
			$this->load->model('mcustomer');
			$query=$this->mcustomer->deleteInstitusi($id);
			if($query==1){
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p>	<i class="icon fa fa-check"></i> Hapus data berhasil</p></div>');
				redirect("customer/listInstitusi");
			}else{
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p>	<i class="icon fa fa-ban"></i>data gagal dihapus,Data dipakai tabel lain</p></div>');
					redirect("customer/listInstitusi");
			}
			
			
		}else{
			
			redirect('home');
		}
	}
	//searching data
	public function cariCustomer(){
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
			
			$word=$this->input->post('cari');
			$this->load->model('mcustomer');
			$data['isi']=$this->mcustomer->list_cariCustomer($word);
			$this->load->view('dasboard/head');
			$this->load->view('dasboard/header',$user);
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/listCustomer',$data);
			$this->load->view('dasboard/footer');
		}else{
			
			redirect('home');
		}
		
	}
	//actian function
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
			$this->load->model('mcustomer');
			$query=$this->mcustomer->addCustomer($data);
			
			if($query==0){
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p>	<i class="icon fa fa-check"></i> input data berhasil</p></div>');
				redirect("customer/addCustomer");
			}else if($query==-1){
				$this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p>	<i class="icon fa fa-warning"></i>No.id sudah terpakai, silahkan gunakan No.id yang lain.</p></div>');
				redirect("customer/addCustomer");
			}else{
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p>	<i class="icon fa fa-ban"></i>data gagal diinputkan</p></div>');
				redirect("customer/addCustomer");
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
			$this->load->model('mcustomer');
			$query=$this->mcustomer->addInstitusi($data);
			
			if($query==0){
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p>	<i class="icon fa fa-check"></i> input data berhasil</p></div>');
				redirect("customer/addInstitusi");
			}else if ($query==-1){
				$this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p>	<i class="icon fa fa-warning"></i>No.id sudah terpakai, silahkan gunakan No.id yang lain.</p></div>');
				redirect("customer/addInstitusi");
			}else{
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p>	<i class="icon fa fa-ban"></i>data gagal diinputkan</p></div>');
					redirect("customer/addInstitusi");
			}
		}else{
			
			redirect('home');
		}
	}
	public function updateInstitusi(){
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
				
			$this->load->model('mcustomer');
			$query=$this->mcustomer->updateInstitusi($data);
			
			if($query==1){
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p>	<i class="icon fa fa-check"></i> Update data berhasil</p></div>');
				redirect("customer/listInstitusi");
			}else{
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p>	<i class="icon fa fa-ban"></i>Update data gagal </p></div>');
					redirect("customer/listInstitusi");
			}
		}else{
			
			redirect('home');
		}
	}

}


?>