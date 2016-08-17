<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian extends CI_Controller {
	public function index(){
		
		
	}
	
	public function pemesanan()
	{
		$this->load->model('mgudang');
		$data['isi']=$this->mgudang->list_item();
		$this->load->model('msupplier');
		$data['suplier']=$this->msupplier->list_supplier();
		$this->load->view('dasboard/head');
		$this->load->view('dasboard/header');
		$this->load->view('dasboard/sidebar');
		$this->load->view('dasboard/pemesanan',$data);
		$this->load->view('dasboard/footer');
	}
	public function listPemesanan()
	{
		$this->load->model('mpembelian');
		$data['isi']=$this->mpembelian->listPemesanan();
		$this->load->view('dasboard/head');
		$this->load->view('dasboard/header');
		$this->load->view('dasboard/sidebar');
		$this->load->view('dasboard/listPemesanan',$data);
		$this->load->view('dasboard/footer');
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
		
		redirect("pembelian/pemesanan");
	
	}
	public function hapus($id){
		
		$data=array(
			'rowid'=>$id,
			'qty' =>0
		
		);
		$this->cart->update($data);
		redirect("pembelian/pemesanan");
	}
	public function addDataPurchasing()
	{
		
		$idtrans=$this->input->post('idtransaksi');
		$data = array(
				'idTransaksi' => $this->input->post('idtransaksi'),
				'id' => $this->input->post('id'),
				'qty' => $this->input->post('jumlah'),
				'price' => $this->input->post('harga'),
				'total' => $this->input->post('total'),
				'tgl' => $this->input->post('tgl'),
				'idSuplier' => $this->input->post('idSuplier'),
				'email' => $this->session->userdata('username')
				
            );
		
		$this->load->model('mpembelian');
		$this->mpembelian->addPurchasing($data);
		redirect("pembelian/pemesanan");
		
	}

}
?>