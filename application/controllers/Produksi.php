<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produksi extends CI_Controller {
	//add data
	function addBom(){
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
				$data['produk']=$this->mproduk->list_item();
				$this->load->view('dasboard/head');
				$this->load->view('dasboard/header',$user);
				$this->load->view('dasboard/sidebar');
				$this->load->view('dasboard/inputBom',$data);
				$this->load->view('dasboard/footer');
			}else{
				redirect('home');
			}
	}
	public function addProduksi(){
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
				$this->load->model('mproduksi');
				$data['isi']=$this->mproduksi->list_bom();
				$this->load->view('dasboard/head');
				$this->load->view('dasboard/header',$user);
				$this->load->view('dasboard/sidebar');
				$this->load->view('dasboard/inputProduksi',$data);
				$this->load->view('dasboard/footer');
			}else{
				redirect('home');
			}
	}
	public function addBahanProduksi(){
		
		if($this->session->userdata('id_produk')){
			
			$idProduk=$this->session->userdata('id_produk');
		}else{
			$idProduk=$this->input->post('id_produk');
			$this->session->set_userdata('id_produk',$idProduk);
		}
		
		
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
				$this->load->model('mproduksi');
				$data['isi']=$this->mproduksi->list_bahanProduksi($idProduk);
				$this->load->view('dasboard/head');
				$this->load->view('dasboard/header',$user);
				$this->load->view('dasboard/sidebar');
				$this->load->view('dasboard/inputBahanProduksi',$data);
				$this->load->view('dasboard/footer');
			}else{
				redirect('home');
			}
	}
	//list data
	public function listBom(){
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
				
				$this->load->model('mproduksi');
				$data['isi']=$this->mproduksi->list_bom();
				$this->load->view('dasboard/head');
				$this->load->view('dasboard/header',$user);
				$this->load->view('dasboard/sidebar');
				$this->load->view('dasboard/listBom',$data);
				$this->load->view('dasboard/footer');
			}else{
				redirect('home');
			}
	}
	public function listProduksi(){
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
				$this->load->model('mproduksi');
				$data['isi']=$this->mproduksi->listProduksi();
				$this->load->model('msupplier');
				$data['suplier']=$this->msupplier->list_supplier();
				$this->load->view('dasboard/head');
				$this->load->view('dasboard/header',$user);
				$this->load->view('dasboard/sidebar');
				$this->load->view('dasboard/listProduksi',$data);
				$this->load->view('dasboard/footer');
			}else{
				redirect('home');
			}
	}
	//rincian data
	public function rincianBom($id){
		 
		 $this->load->model('mproduksi');
		 $query=$this->mproduksi->rincianBom($id);
		 
		 if(!empty($query)){
			 foreach ($query as $row)
			{
				if($row->jumlah>0){
					echo '<tr>
							<td>
							</td>
							<td><a href="',base_url(),'gudang/viewProduk/',$row->id_item,'">',$row->nama_item,'</a></td>
							<td>',$row->nama_tipe_item,'</td>
							<td>',$row->nama_satuan,'</td>
							<td>',$row->jumlah,' item</td>
						</tr>';
				}
					
			}
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
			$this->load->model('mproduksi');
			$this->mproduksi->updateStatus($data);
			redirect('produksi/listProduksi');
		}else{
			
			redirect('home');
		}
	}
	//keranjang belanja Bom
	public function addCart()
	{
		
		$data = array(
				'id' => $this->input->post('id'),
				'name' => $this->input->post('nama'),
				'qty' => $this->input->post('jumlah'),
				'price' => $this->input->post('harga'),
				'options' =>array('idSuplier'=>$this->input->post('idSuplier'))
            );
		
		$this->cart->insert($data);
		
		redirect("produksi/addBom");
	
	}
	public function hapus($id){
		
		$data=array(
			'rowid'=>$id,
			'qty' =>0
		
		);
		$this->cart->update($data);
		redirect("produksi/addBom");
	}
	public function addDataBom(){
		$data = array(
				'id_produk' => $this->input->post('id_produk'),
				'id' => $this->input->post('id'),
				'qty' => $this->input->post('jumlah'),
				'price' => $this->input->post('harga'),
				'total' => $this->input->post('total')
				
            );
		
		$this->load->model('mproduksi');
		$query=$this->mproduksi->addBom($data);
		if($query=="1"){
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<p>	<i class="icon fa fa-check"></i> Input data berhasil</p></div>');
			redirect("produksi/addBom");
		}else if($query=="-1"){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<p>	<i class="icon fa fa-ban"></i>Input data gagal,Bom Item sudah ada </p></div>');
			redirect("produksi/addBom");
		}
		
		
		
	}
	//keranjang bahan
	
	public function addCartbahan()
	{
		
		$data = array(
				'id' => $this->input->post('id'),
				'name' => $this->input->post('nama'),
				'qty' => $this->input->post('jumlah'),
				'price' => $this->input->post('harga'),
				'options' =>array('idSuplier'=>$this->input->post('idSuplier'))
				
            );
		
		$this->cart->insert($data);
		
		redirect("produksi/addBahanProduksi");
	
	}
	public function hapusbahan($id){
		
		$data=array(
			'rowid'=>$id,
			'qty' =>0
		
		);
		$this->cart->update($data);
		redirect("produksi/addBahanProduksi");
	}
	public function addDataBahan(){
		$data = array(
				'idTransaksi' => $this->input->post('idTransaksi'),
				'jml_produk' => $this->input->post('jml_produksi'),
				'id_produk'  => $this->input->post('id_produk'),
				'tgl' => $this->input->post('tgl'),
				'id' => $this->input->post('id'),
				'qty' => $this->input->post('jumlah'),
				'price' => $this->input->post('harga'),
				'total' => $this->input->post('total'),
				'email' => $this->session->userdata('username')
				
            );
		
		$this->load->model('mproduksi');
		$this->mproduksi->addBahanProduksi($data);
		redirect("produksi/listProduksi");
		
	}
	public function addProduksiToGudang(){
		$data = array(
				'idTransaksi' => $this->input->post('idTransaksi'),
				'jml_produk' => $this->input->post('jml_produksi'),
				'id_produksi' => $this->input->post('id_produksi'),
				'id_produk' => $this->input->post('id_produk'),
				'id_petugas' => $this->input->post('id_petugas'),
				'idSuplier' => $this->input->post('idSuplier'),
				'tgl' => $this->input->post('tgl'),
				'jumlah' => $this->input->post('jumlah'),
				'totalHarga' => $this->input->post('totalHarga'),
				'harga_jual' => $this->input->post('harga_jual')
				
            );
		
		$this->load->model('mproduksi');
		$this->mproduksi->addProduksiToGudang($data);
		redirect("produksi/addProduksi");
		
	}
	//rincian produksi
	 public function rincianProduksi($id){
		 
		 $this->load->model('mproduksi');
		 $query=$this->mproduksi->rincianProduksi($id);
		 
		 if(!empty($query)){
			 foreach ($query as $row)
			{
				
					echo '<tr>
							
							<td><a href="',base_url(),'produk/viewProduk/',$row->id_item,'">',$row->nama_item,'</a></td>
							<td>',$row->nama_tipe_item,'</td>
							<td>',$row->nama_satuan,'</td>
							<td>',$row->hargaSatuan,'</td>
							<td>',$row->jumlah,'</td>
							<td>',$row->keluar,'</td>
						</tr>';
				
					
			}
		 }
		 
	 }
	 //delete data
	 public function deleteBom($id){
		$cek=$this->session->userdata('username');
		if($cek){
			
			$this->load->model('mproduksi');
			$query=$this->mproduksi->deleteBom($id);
			if($query==1){
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<p>	<i class="icon fa fa-check"></i> Hapus data berhasil</p></div>');
				redirect('produksi/listBom');
			}else{
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<p>	<i class="icon fa fa-ban"></i>Hapus data gagal </p></div>');
				redirect('produksi/listBom');
			}
			
		}else{
			
			redirect('home');
		}
	}

}
?>