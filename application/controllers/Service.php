<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller {
	
	public function index(){
		$this->load->model('mservice');
		$data['isi']=$this->mservice->list_service();
		$this->load->model('mcustomer');
		$data['customer']=$this->mcustomer->list_customer();
		$this->load->view('dasboard/head');
		$this->load->view('dasboard/header');
		$this->load->view('dasboard/sidebar');
		$this->load->view('dasboard/listService',$data);
		$this->load->view('dasboard/footer');
	}
	public function listService()
	{
		$this->load->model('mservice');
		$data['isi']=$this->mservice->list_service();
		$this->load->model('mcustomer');
		$data['customer']=$this->mcustomer->list_customer();
		$this->load->view('dasboard/head');
		$this->load->view('dasboard/header');
		$this->load->view('dasboard/sidebar');
		$this->load->view('dasboard/listService',$data);
		$this->load->view('dasboard/footer');
	}
	public function listUnsolved()
	{
		$this->load->model('mservice');
		$data['isi']=$this->mservice->list_unsolved();
		$this->load->view('dasboard/head');
		$this->load->view('dasboard/header');
		$this->load->view('dasboard/sidebar');
		$this->load->view('dasboard/listUnsolvedService',$data);
		$this->load->view('dasboard/footer');
	}
	public function addService()
	{
		$this->load->model('mcustomer');
		$data['isi']=$this->mcustomer->list_customer();
		$this->load->view('dasboard/head');
		$this->load->view('dasboard/header');
		$this->load->view('dasboard/sidebar');
		$this->load->view('dasboard/inputService',$data);
		$this->load->view('dasboard/footer');
	}
	public function viewService($id){
		
		$this->load->model('mservice');
		//$this->load->model('produk');
		$data['isi']=$this->mservice->view_service($id);
		//$data['produk']=$this->produk->list_produk_perSuplier($id);
		$this->load->view('dasboard/head');
		$this->load->view('dasboard/header');
		$this->load->view('dasboard/sidebar');
		$this->load->view('dasboard/viewService',$data);
		$this->load->view('dasboard/footer');
		
	}
	public function addSolving($id)
	{
		$data['id']=$id;
		$this->load->model('mpetugas');
		$data['petugas']=$this->mpetugas->list_petugas();
		$this->load->view('dasboard/head');
		$this->load->view('dasboard/header');
		$this->load->view('dasboard/sidebar');
		$this->load->view('dasboard/inputSolving',$data);
		$this->load->view('dasboard/footer');
	}
	public function pilihSolving($id)
	{
		$this->session->set_userdata('idService',$id);
		
		$this->load->view('dasboard/head');
		$this->load->view('dasboard/header');
		$this->load->view('dasboard/sidebar');
		$this->load->view('dasboard/pilihSolving');
		$this->load->view('dasboard/footer');
	}
	public function addProdukSolving()
	{
		$this->load->model('produk');
		$data['isi']=$this->produk->list_produk();
		$this->load->model('mcustomer');
		$data['customer']=$this->mcustomer->list_customer();
		$this->load->model('mpetugas');
		$data['petugas']=$this->mpetugas->list_petugas();
		
		$this->load->view('dasboard/head');
		$this->load->view('dasboard/header');
		$this->load->view('dasboard/sidebar');
		$this->load->view('dasboard/produkSolving',$data);
		$this->load->view('dasboard/footer');
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
		$this->load->model('mservice');
		$query=$this->mservice->addService($data);
		/*
		if($query==0){
			redirect("service/listService");
		}else{
		
			redirect("service/addService");
		}*/
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
		$this->load->model('mservice');
		//echo $data['id_service'];
		$query=$this->mservice->addSolving($data);
		unset($_SESSION['idService']);
		if($query==0){
			redirect("service/listService");
		}else{
		
			redirect("service/listUnsolved");
		}
	}
	public function delete($id){
		$this->load->model('mservice');
		$query=$this->mservice->delete($id);
		redirect("service/listService");
	}
	//menambahkan produk untuk service
	public function addCart()
	{
		
		$data = array(
				'id' => $this->input->post('id'),
				'name' => $this->input->post('nama'),
				'qty' => $this->input->post('jumlah'),
				'price' => $this->input->post('harga')
				
            );
		
		$this->cart->insert($data);
		
		redirect("service/addProdukSolving");
	
	}
	public function hapus($id){
		
		$data=array(
			'rowid'=>$id,
			'qty' =>0
		
		);
		$this->cart->update($data);
		redirect("service/addProdukSolving");
	}
	public function addServProduk()
	{
		
		$idtrans=$this->input->post('idtransaksi');
		$data = array(
				'idService' => $this->input->post('idService'),
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
		
	}
	
}
?>