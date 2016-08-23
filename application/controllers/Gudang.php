<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gudang extends CI_Controller {
	public function index(){
		
		redirect('gudang/listBarang');
	}
	
	//list data
	public function listPenerimaan(){
		$this->load->model('mgudang');
		$data['isi']=$this->mgudang->listPenerimaan();
		$this->load->view('dasboard/head');
		$this->load->view('dasboard/header');
		$this->load->view('dasboard/sidebar');
		$this->load->view('dasboard/listPenerimaan',$data);
		$this->load->view('dasboard/footer');
	}
	public function listPengeluaran(){
		$this->load->model('mgudang');
		$data['isi']=$this->mgudang->listPengeluaran();
		$this->load->view('dasboard/head');
		$this->load->view('dasboard/header');
		$this->load->view('dasboard/sidebar');
		$this->load->view('dasboard/listPengeluaran',$data);
		$this->load->view('dasboard/footer');
	}
	public function listBarang()
	{
		$this->load->model('mproduk');
		$data['isi']=$this->mproduk->list_produk();
		$this->load->view('dasboard/head');
		$this->load->view('dasboard/header');
		$this->load->view('dasboard/sidebar');
		$this->load->view('dasboard/listProduk',$data);
		$this->load->view('dasboard/footer');
	}
	 public function rincianBarang($id){
		 
		 $this->load->model('mproduk');
		 $query=$this->mproduk->rincianProduk($id);
		 
		 if(!empty($query)){
			 foreach ($query as $row)
			{
				if($row->jumlah>0){
					echo '<tr>
							<td>
							</td>
							<td><a href="',base_url(),'supplier/viewSupplier/',$row->id_suplier,'">',$row->nama_suplier,'</a></td>
							<td>',$row->nama_item,'</td>
							<td>',$row->hargaSatuan,'</td>
							<td>',$row->jumlah,'</td>
						</tr>';
				}else{
					echo '<tr>
							<td>
							</td>
							<td><a href="',base_url(),'supplier/viewSupplier/',$row->id_suplier,'">',$row->nama_suplier,'</a></td>
							<td>',$row->nama_item,'</td>
							<td>',$row->hargaSatuan,'</td>
							<td><span class="label label-danger">Stok kosong</span></td>
						</tr>';
				}
					
			}
		 }
		 
	 }
	public function listDefect(){
		
		$this->load->model('mgudang');
		$data['isi']=$this->mgudang->listDefect();
		$this->load->view('dasboard/head');
		$this->load->view('dasboard/header');
		$this->load->view('dasboard/sidebar');
		$this->load->view('dasboard/listDefect',$data);
		$this->load->view('dasboard/footer');
	}
	//view data
	public function viewPO($id)
	{
		$this->session->set_userdata('idPO',$id);
		$this->load->model('mgudang');
		$data['isi']=$this->mgudang->viewPO($id);
		$this->load->model('mpetugas');
		$data['petugas']=$this->mpetugas->list_petugas();
		$this->load->view('dasboard/head');
		$this->load->view('dasboard/header');
		$this->load->view('dasboard/sidebar');
		$this->load->view('dasboard/inputGudang',$data);
		$this->load->view('dasboard/footer');
	}
	public function viewSO($id)
	{
		$data = array(
				'idTransaksi' => $id,
				'status' => "2"	
            );
		$this->session->set_userdata('idSO',$id);
		$this->load->model('mgudang');
		$data['isi']=$this->mgudang->viewSO($id);
		$data['rincian']=$this->mgudang->rincianViewSO($id);
		$this->load->model('mpetugas');
		$data['petugas']=$this->mpetugas->list_petugas();
		$this->load->model('mpenjualan');
		$this->mpenjualan->updateStatus($data);
		$this->load->view('dasboard/head');
		$this->load->view('dasboard/header');
		$this->load->view('dasboard/sidebar');
		$this->load->view('dasboard/outGudang',$data);
		$this->load->view('dasboard/footer');
	}
	
	
	//input gudang
	public function addCart()
	{
		
		$data = array(
				'id' => $this->input->post('id'),
				'name' => $this->input->post('nama'),
				'qty' => $this->input->post('jumlah'),
				'price' => $this->input->post('harga')
				
            );
		
		$this->cart->insert($data);
		$id=$this->session->userdata('idPO');
		redirect("gudang/viewPO/$id");
	
	}
	public function hapus($id){
		
		$data=array(
			'rowid'=>$id,
			'qty' =>0
		
		);
		$this->cart->update($data);
		$id=$this->session->userdata('idPO');
		redirect("gudang/viewPO/$id");
	}
	public function addDataGudang()
	{
		
		$idtrans=$this->input->post('idtransaksi');
		$data = array(
				'idTransaksi' => $this->input->post('idtransaksi'),
				'idSuplier' => $this->input->post('idSuplier'),
				'id' => $this->input->post('id'),
				'qty' => $this->input->post('jumlah'),
				'price' => $this->input->post('harga'),
				'total' => $this->input->post('total'),
				'tgl' => $this->input->post('tgl'),
				'idPenerima' => $this->input->post('idPenerima'),
				'kurir' => $this->input->post('kurir'),
				'idPO' => $this->session->userdata('idPO'),
				'email' => $this->session->userdata('username')
				
            );
		
		$this->load->model('mgudang');
		$this->mgudang->addGudang($data);
		redirect("gudang/listPenerimaan");
		
	}
	//keranjang keluar
	public function addCartKeluar()
	{
		$cek=$this->session->userdata('username');
		if($cek){
			$data = array(
					'id' => $this->input->post('id'),
					'name' => $this->input->post('nama'),
					'qty' => $this->input->post('jumlah'),
					'price' => $this->input->post('harga'),
					'options' =>array('idSuplier'=>$this->input->post('idSuplier'),
									'idHarga'=>$this->input->post('harga'),
									'defect'=>$this->input->post('defect'),)
					
				);
			
			$this->cart->insert($data);
			$id=$this->session->userdata('idSO');
			redirect("gudang/viewSO/".$id);
		}else{
			
			redirect('home');
		}
	
	}
	public function hapusKeluar($id){
		$cek=$this->session->userdata('username');
		if($cek){
			
			$data=array(
				'rowid'=>$id,
				'qty' =>0
			
			);
			$this->cart->update($data);
			$id=$this->session->userdata('idSO');
			redirect("gudang/viewSO/".$id);
		}else{
			
			redirect('home');
		}
	}
	public function addDataKeluar()
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
					'kurir' => $this->input->post('kurir'),
					'idCustomer' => $this->input->post('id_customer'),
					'email' => $this->session->userdata('username')
					
				);
			
			$this->load->model('mgudang');
			$this->mgudang->keluarGudang($data);
			redirect("gudang/listPengeluaran");
		}else{
			
			redirect('home');
		}
		
	}
	
	public function returnDefect(){
		$data = array(
				'idPurchasing' => $this->input->post('idPurchasing'),
				'idItem' => $this->input->post('idItem'),
				'jumlah' => $this->input->post('jumlah'),
				'hargaSatuan' => $this->input->post('hargaSatuan')
            );
		
		$this->load->model('mgudang');
		$this->mgudang->returnDefect($data);
		redirect("gudang/listDefect");
	}
	public function addReturn()
	{
		
		$idtrans=$this->input->post('idtransaksi');
		$data = array(
				'idPurchasing' => $this->input->post('idPurchasing'),
				'idItem' => $this->input->post('id'),
				'jumlah' => $this->input->post('jumlah'),
				'price' => $this->input->post('harga'),
				'total' => $this->input->post('total'),
				'tgl' => $this->input->post('tgl'),
				'idPO' => $this->session->userdata('idPO'),
				'email' => $this->session->userdata('username')
				
            );
		
		$this->load->model('mgudang');
		$this->mgudang->addGudang($data);
		redirect("gudang/listPenerimaan");
		
	}
	public function deleteDefect($id){
		$this->load->model('mgudang');
		$this->mgudang->deleteDefect($id);
	}
	//searching data
	public function cariProduk(){
		$cek=$this->session->userdata('username');
		if($cek){
			$word=$this->input->post('cari');
			$this->load->model('mproduk');
			$data['isi']=$this->mproduk->list_cariProduk($word);
			$this->load->view('dasboard/head');
			$this->load->view('dasboard/header');
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/listProduk',$data);
			$this->load->view('dasboard/footer');
		}else{
			
			redirect('home');
		}
		
	}
	function updateDefect(){
		$data=array(
					'idTransaksi'=>$this->input->post('idTransaksi'),
					'idItem'=>$this->input->post('idItem'),
					'harga'=>$this->input->post('harga'));
		//print_r($data);
		$this->load->model('mgudang');
		$this->mgudang->updateDefect($data);
		redirect('gudang/listDefect');
	}
	//action function
	 public function stokBarang($id){
		 
		 $this->load->model('mgudang');
		 $query=$this->mgudang->stokBarang($id);
		 //print_r($query);
		
			
			foreach ($query as $person) {
		
			$row = array();
			$row['jumlah']=$person->jumlah;
			$row['asal']=$person->asal;
			$data[] = $row;
		}
			$out=array(
						'isi'=>$data);
			 echo json_encode($out);
			
		
	 }
	
}
?>