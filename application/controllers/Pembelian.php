<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian extends CI_Controller {
	public function index(){
		
		redirect('pembelian/listPemesanan');
	}
	//add data
	public function pemesanan()
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
			$data['isi']=$this->mproduk->list_item();
			$this->load->model('msupplier');
			$data['suplier']=$this->msupplier->list_supplier();
			$this->load->view('dasboard/head');
			$this->load->view('dasboard/header',$user);
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/pemesanan',$data);
			$this->load->view('dasboard/footer');
		}else{
			
			redirect('home');
		}
	}
	//list data
	public function listPemesanan()
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
			$this->load->model('mpembelian');
			$data['isi']=$this->mpembelian->listPemesanan();
			$this->load->view('dasboard/head');
			$this->load->view('dasboard/header',$user);
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/listPemesanan',$data);
			$this->load->view('dasboard/footer');
		}else{
			
			redirect('home');
		}
	}
	//update status
	public function updateStatus(){
		$cek=$this->session->userdata('username');
		if($cek){
			$data = array(
				'idTransaksi' => $this->input->post('idTransaksi'),
				'status' => $this->input->post('status')	
            );
			$this->load->model('mpembelian');
			$this->mpembelian->updateStatus($data);
			redirect('pembelian/listPemesanan');
		}else{
			
			redirect('home');
		}
	}
	//rincian pembelian
	 public function rincianPemesanan($id){
		$cek=$this->session->userdata('username');
		if($cek){
			 $this->load->model('mpembelian');
			 $query=$this->mpembelian->rincianPemesanan($id);
			 
			 if(!empty($query)){
				 foreach ($query as $row)
				{
					
						echo '<tr>
								
								<td><a href="',base_url(),'produk/viewProduk/',$row->id_item,'">',$row->nama_item,'</a></td>
								<td>',$row->nama_tipe_item,'</td>
								<td>',$row->nama_satuan,'</td>
								<td>',$row->hargaSatuan,'</td>
								<td>',$row->jumlah,'</td>
								<td>',$row->jml_keluar,'</td>
							</tr>';
					
						
				}
			 }
		 }else{
			
			redirect('home');
		}
		 
	 }
	
	//keranjang belanja
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
			
			redirect("pembelian/pemesanan");
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
			redirect("pembelian/pemesanan");
		}else{
			
			redirect('home');
		}
	}
	public function addDataPurchasing()
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
					'idSuplier' => $this->input->post('idSuplier'),
					'email' => $this->session->userdata('username')
					
				);
			
			$this->load->model('mpembelian');
			$this->mpembelian->addPurchasing($data);
			redirect("pembelian/listPemesanan");
		}else{
			
			redirect('home');
		}
		
	}

}
?>