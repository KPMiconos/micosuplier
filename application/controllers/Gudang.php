<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gudang extends CI_Controller {
	public function index(){
		
		redirect('gudang/listBarang');
	}
	
	//list data
	public function listPenerimaan(){
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
			
			$this->load->model('mgudang');
			$data['isi']=$this->mgudang->listPenerimaan();
			$this->load->view('dasboard/head');
			$this->load->view('dasboard/header',$user);
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/listPenerimaan',$data);
			$this->load->view('dasboard/footer');
		}else{
			
			redirect('home');
		}
	}
	public function listPengeluaran(){
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
			
			$this->load->model('mgudang');
			$data['isi']=$this->mgudang->listPengeluaran();
			$this->load->view('dasboard/head');
			$this->load->view('dasboard/header',$user);
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/listPengeluaran',$data);
			$this->load->view('dasboard/footer');
		}else{
			
			redirect('home');
		}
	}
	public function listBarang()
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
			
			$this->load->model('mproduk');
			$data['isi']=$this->mproduk->list_produk();
			$this->load->view('dasboard/head');
			$this->load->view('dasboard/header',$user);
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/listProduk',$data);
			$this->load->view('dasboard/footer');
		}else{
			
			redirect('home');
		}
	}
	 public function rincianBarang($id){
		$cek=$this->session->userdata('username');
		if($cek){
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
		 }else{
			
			redirect('home');
		}
		 
	 }
	public function listDefect(){
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
			
			$this->load->model('mgudang');
			$data['isi']=$this->mgudang->listDefect();
			$this->load->view('dasboard/head');
			$this->load->view('dasboard/header',$user);
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/listDefect',$data);
			$this->load->view('dasboard/footer');
		}else{
			
			redirect('home');
		}
	}
	//view data
	public function viewPO($id)
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
			
			unset($_SESSION['idPRO']);
			$this->session->set_userdata('idPO',$id);
			$this->load->model('mgudang');
			$data['isi']=$this->mgudang->viewPO($id);
			$this->load->model('mpetugas');
			$data['petugas']=$this->mpetugas->list_petugas();
			$this->load->view('dasboard/head');
			$this->load->view('dasboard/header',$user);
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/inputGudang',$data);
			$this->load->view('dasboard/footer');
		}else{
			
			redirect('home');
		}
	}
	public function viewPROIN($id)
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
			
			unset($_SESSION['idPO']);
			$this->session->set_userdata('idPRO',$id);
			$this->load->model('mgudang');
			$data['isi']=$this->mgudang->viewPROIN($id);
			$this->load->model('mpetugas');
			$data['petugas']=$this->mpetugas->list_petugas();
			$this->load->view('dasboard/head');
			$this->load->view('dasboard/header',$user);
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/inputGudang',$data);
			$this->load->view('dasboard/footer');
		}else{
			
			redirect('home');
		}
	}
	public function viewSO($id)
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
			$data = array(
					'idTransaksi' => $id,
					'status' => "2"	
				);
			unset($_SESSION['idPRO']);
			$this->session->set_userdata('idSO',$id);
			$this->load->model('mgudang');
			$data['isi']=$this->mgudang->viewSO($id);
			$data['rincian']=$this->mgudang->rincianViewSO($id);
			$this->load->model('mpetugas');
			$data['petugas']=$this->mpetugas->list_petugas();
			$this->load->model('mpenjualan');
			$this->mpenjualan->updateStatus($data);
			$this->load->view('dasboard/head');
			$this->load->view('dasboard/header',$user);
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/outGudang',$data);
			$this->load->view('dasboard/footer');
		}else{
			
			redirect('home');
		}
	}
	public function viewPRO($id)
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
			$data = array(
					'idTransaksi' => $id,
					'status' => "2"	
				);
			unset($_SESSION['idSO']);
			$this->session->set_userdata('idPRO',$id);
			$this->load->model('mgudang');
			$data['isi']=$this->mgudang->viewPRO($id);
			//$data['rincian']=$this->mgudang->rincianViewPRO($id);
			$this->load->model('mpetugas');
			$data['petugas']=$this->mpetugas->list_petugas();
			$this->load->model('mproduksi');
			$this->mproduksi->updateStatus($data);
			$this->load->view('dasboard/head');
			$this->load->view('dasboard/header',$user);
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/outGudang',$data);
			$this->load->view('dasboard/footer');
		}else{
			
			redirect('home');
		}
	}
	public function viewSER($id)
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
			
			$data = array(
					'idTransaksi' => $id,
					'status' => "2"	
				);
			unset($_SESSION['idSO']);
			unset($_SESSION['idPRO']);
			$this->session->set_userdata('idSER',$id);
			$this->load->model('mgudang');
			$data['isi']=$this->mgudang->viewSER($id);
			
			$this->load->model('mpetugas');
			$data['petugas']=$this->mpetugas->list_petugas();
			$this->load->model('mproduksi');
			$this->mproduksi->updateStatus($data);
			$this->load->view('dasboard/head');
			$this->load->view('dasboard/header',$user);
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/outGudang',$data);
			$this->load->view('dasboard/footer');
		}else{
			
			redirect('home');
		}
	}
	
	
	//input gudang
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
			if($this->session->userdata('idPO')){
				$id=$this->session->userdata('idPO');
				redirect("gudang/viewPO/$id");
			}else if($this->session->userdata('idPRO')){
				$id=$this->session->userdata('idPRO');
				redirect("gudang/viewPROIN/$id");
			}
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
			if($this->session->userdata('idPO')){
				$id=$this->session->userdata('idPO');
				redirect("gudang/viewPO/$id");
			}else if($this->session->userdata('idPRO')){
				$id=$this->session->userdata('idPRO');
				redirect("gudang/viewPROIN/$id");
			}
		}else{
			
			redirect('home');
		}
	}
	public function addDataGudang()
	{
		$cek=$this->session->userdata('username');
		if($cek){
			$idtrans=$this->input->post('idtransaksi');
			$data = array(
					'idTransaksi' => $this->input->post('idtransaksi'),
					'idSuplier' => $this->input->post('idSuplier'),
					'total' => $this->input->post('total'),
					'tgl' => $this->input->post('tgl'),
					'idPenerima' => $this->input->post('idPenerima'),
					'kurir' => $this->input->post('kurir'),
					'idTran' => $this->input->post('idTran'),
					'email' => $this->session->userdata('username'),
					'kode' => $this->input->post('kode')
					
				);
			
			$this->load->model('mgudang');
			$this->mgudang->addGudang($data);
			redirect("gudang/listPenerimaan");
		}else{
			
			redirect('home');
		}
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
			if($this->session->userdata('idSO')){
				$id=$this->session->userdata('idSO');
				redirect("gudang/viewSO/".$id);
			}else if($this->session->userdata('idPRO')){
				$id=$this->session->userdata('idPRO');
				redirect("gudang/viewPRO/".$id);
			}else if($this->session->userdata('idSER')){
				$id=$this->session->userdata('idSER');
				redirect("gudang/viewSER/".$id);
			}
			
			
			
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
			if($this->session->userdata('idSO')){
				$id=$this->session->userdata('idSO');
				redirect("gudang/viewSO/".$id);
			}else if($this->session->userdata('idPRO')){
				$id=$this->session->userdata('idPRO');
				redirect("gudang/viewPRO/".$id);
			}else if($this->session->userdata('idSER')){
				$id=$this->session->userdata('idSER');
				redirect("gudang/viewSER/".$id);
			}
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
					'idSO' => $this->input->post('idSO'),
					'idTransaksi' => $this->input->post('idTransaksi'),
					'total' => $this->input->post('total'),
					'tgl' => $this->input->post('tgl'),
					'kurir' => $this->input->post('kurir'),
					'idCustomer' => $this->input->post('idCustomer'),
					'email' => $this->session->userdata('username'),
					'kode' => $this->input->post('kode')
					
					
				);
			echo $data['kode'];
			$this->load->model('mgudang');
			$this->mgudang->keluarGudang($data);
			redirect("gudang/listPengeluaran");
		}else{
			
			redirect('home');
		}
		
	}
	
	public function returnDefect(){
		$cek=$this->session->userdata('username');
		if($cek){
			$data = array(
					'idDef' => $this->input->post('idDef'),
					'idRec' => $this->input->post('idRec'),
					'idIssue' => $this->input->post('idIssue'),
					'idItem' => $this->input->post('idItem'),
					'jumlah' => $this->input->post('jumlah'),
					'hargaSatuan' => $this->input->post('hargaSatuan')
				);
			
			$this->load->model('mgudang');
			$this->mgudang->returnDefect($data);
			redirect("gudang/listDefect");
		}else{
			
			redirect('home');
		}
	}
	public function addReturn()
	{
		$cek=$this->session->userdata('username');
		if($cek){
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
		}else{
			
			redirect('home');
		}
		
	}
	public function deleteDefect($id){
		$cek=$this->session->userdata('username');
		if($cek){
			$this->load->model('mgudang');
			$this->mgudang->deleteDefect($id);
		}else{
			
			redirect('home');
		}
	}
	//searching data
	public function cariProduk(){
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
			$this->load->model('mproduk');
			$data['isi']=$this->mproduk->list_cariProduk($word);
			$this->load->view('dasboard/head');
			$this->load->view('dasboard/header',$user);
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/listProduk',$data);
			$this->load->view('dasboard/footer');
		}else{
			
			redirect('home');
		}
		
	}
	function updateDefect(){
		$cek=$this->session->userdata('username');
		if($cek){
			$data=array(
						'idTransaksi'=>$this->input->post('idTransaksi'),
						'idItem'=>$this->input->post('idItem'),
						'harga'=>$this->input->post('harga'));
			//print_r($data);
			$this->load->model('mgudang');
			$this->mgudang->updateDefect($data);
			redirect('gudang/listDefect');
		}else{
			
			redirect('home');
		}
	}
	//action function
	 public function stokBarang($id){
		 $cek=$this->session->userdata('username');
		if($cek){
		 
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
		}else{
			
			redirect('home');
		}	
		
	 }
	
}
?>