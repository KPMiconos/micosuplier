<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller {
	
	public function index(){
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
			$this->load->model('mservice');
			$data['isi']=$this->mservice->list_service();
			$this->load->model('mcustomer');
			$data['customer']=$this->mcustomer->list_customer();
			$this->load->view('dasboard/head');
			$this->load->view('dasboard/header',$user);
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/listService',$data);
			$this->load->view('dasboard/footer');
		}else{
			
			redirect('home');
		}
	}
	//add data
	public function addService()
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
			$this->load->model('mcustomer');
			$data['isi']=$this->mcustomer->list_customer();
			$this->load->view('dasboard/head');
			$this->load->view('dasboard/header',$user);
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/inputService',$data);
			$this->load->view('dasboard/footer');
		}else{
			
			redirect('home');
		}
	}
	public function addSolving($id)
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
			$data['id']=$id;
			$this->load->model('mpetugas');
			$data['petugas']=$this->mpetugas->list_petugas();
			$this->load->view('dasboard/head');
			$this->load->view('dasboard/header',$user);
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/inputSolving',$data);
			$this->load->view('dasboard/footer');
		}else{
			
			redirect('home');
		}
	}
	public function addProdukSolving()
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
			$this->load->model('mproduk');
			$data['isi']=$this->mproduk->list_produk();
			$this->load->model('mcustomer');
			$data['customer']=$this->mcustomer->list_customer();
			$this->load->model('mpetugas');
			$data['petugas']=$this->mpetugas->list_petugas();
			
			$this->load->view('dasboard/head');
			$this->load->view('dasboard/header',$user);
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/produkSolving',$data);
			$this->load->view('dasboard/footer');
		}else{
			
			redirect('home');
		}
	}
	//list data
	public function listService()
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
			$this->load->model('mservice');
			$data['isi']=$this->mservice->list_service();
			$this->load->model('mcustomer');
			$data['customer']=$this->mcustomer->list_customer();
			$this->load->view('dasboard/head');
			$this->load->view('dasboard/header',$user);
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/listService',$data);
			$this->load->view('dasboard/footer');
		}else{
			
			redirect('home');
		}
	}
	public function listUnsolved()
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
			$this->load->model('mservice');
			$data['isi']=$this->mservice->list_unsolved();
			$this->load->view('dasboard/head');
			$this->load->view('dasboard/header',$user);
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/listUnsolvedService',$data);
			$this->load->view('dasboard/footer');
		}else{
			
			redirect('home');
		}
	}
	//view data
	public function viewService($id){
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
			$this->load->model('mservice');
			//$this->load->model('produk');
			$data['isi']=$this->mservice->view_service($id);
			$data['produk']=$this->mservice->view_produkService($id);
			$data['solving']=$this->mservice->view_solving($id);
			//$data['produk']=$this->produk->list_produk_perSuplier($id);
			$this->load->view('dasboard/head');
			$this->load->view('dasboard/header',$user);
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/viewService',$data);
			$this->load->view('dasboard/footer');
		}else{
			
			redirect('home');
		}
		
	}
	
	public function pilihSolving($id)
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
			$this->session->set_userdata('idService',$id);
			$this->load->model('mservice');
			$ser=$this->mservice->cekService($id);
			if($ser==1){
				redirect('service/addSolving/'.$this->session->userdata('idService'));
			}else{
				$this->load->view('dasboard/head');
				$this->load->view('dasboard/header',$user);
				$this->load->view('dasboard/sidebar');
				$this->load->view('dasboard/pilihSolving');
				$this->load->view('dasboard/footer');
			}
		}else{
			
			redirect('home');
		}
		
	}
	//acton funtion
	public function addService_act(){
		$cek=$this->session->userdata('username');
		if($cek){
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
			$this->load->model('mservice');
			$query=$this->mservice->addService($data);
			
			if($query==0){
				redirect("service/listService");
			}else{
			
				redirect("service/addService");
			}
		}else{
			
			redirect('home');
		}
	}
	//acton funtion
	public function updateService(){
		$cek=$this->session->userdata('username');
		if($cek){
			$this->db->reconnect();
			$data = array(
					'petugas' => $this->session->userdata('username'),
					'tgl_open' => $this->input->post('tgl_open'),
					'customer' => $this->input->post('customer'),
					'subjek' => $this->input->post('subjek'),
					'keluhan' => $this->input->post('keluhan'),
					'tgl_solved' => $this->input->post('tgl_solved'),
					'id_service' => $this->input->post('id_service'),
					'penyelesaian' => $this->input->post('penyelesaian'),
					'status' => $this->input->post('status')
					
				);
			$this->load->model('mservice');
			$query=$this->mservice->updateService($data);
			
			if($query==0){
				redirect("service/listService");
			}else{
			
				redirect("service/addService");
			}
		}else{
			
			redirect('home');
		}
	}
	public function addSolving_act(){
		$cek=$this->session->userdata('username');
		if($cek){
			$this->db->reconnect();
			$data = array(
					
					'id_service' => $this->input->post('id_service'),
					'tgl_solved' => $this->input->post('tgl_solved'),
					'teknisi' => $this->input->post('teknisi'),
					'penyelesaian' => $this->input->post('penyelesaian'),
					'status' => $this->input->post('status')
					
				);
			$this->load->model('mservice');
			//echo $data['id_service'];
			$query=$this->mservice->addSolving($data);
			unset($_SESSION['idService']);
			if($query==0){
				redirect("service/listService");
			}else{
			
				redirect("service/listUnsolved");
			}
		}else{
			
			redirect('home');
		}
	}
	//delete data
	public function delete($id){
		$cek=$this->session->userdata('username');
		if($cek){
			$this->load->model('mservice');
			$query=$this->mservice->delete($id);
			redirect("service/listService");
		}else{
			
			redirect('home');
		}
	}
	//menambahkan produk keranjang service
	public function addCart()
	{
		$cek=$this->session->userdata('username');
		if($cek){
			$data = array(
					'id' => $this->input->post('id'),
					'name' => $this->input->post('nama'),
					'qty' => $this->input->post('jumlah'),
					'price' => $this->input->post('harga'),
					'options' =>array('idSuplier'=>$this->input->post('idSuplier'))
					
				);
			
			$this->cart->insert($data);
			
			redirect("service/addProdukSolving");
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
			redirect("service/addProdukSolving");
		}else{
			
			redirect('home');
		}
	}
	public function addServProduk()
	{
		$cek=$this->session->userdata('username');
		if($cek){
			$idtrans=$this->input->post('idtransaksi');
			$data = array(
					'idService' => $this->input->post('idService'),
					'idTransaksi' => $this->input->post('idTransaksi'),
					'id' => $this->input->post('id'),
					'qty' => $this->input->post('jumlah'),
					'price' => $this->input->post('harga'),
					'total' => $this->input->post('total'),
					'teknisi' => $this->input->post('teknisi'),
					'kurir' => $this->input->post('kurir'),
					'idCustomer' => $this->input->post('idCustomer'),
					'tgl' => $this->input->post('tgl'),
					
					
					
				);
			
			$this->load->model('mservice');
			$this->mservice->addServProduk($data);
			$id=$data['idService'];
			redirect("service/addSolving/$id");
		}else{
			
			redirect('home');
		}
		
	}
	
}
?>