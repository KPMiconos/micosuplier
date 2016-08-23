<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produksi extends CI_Controller {
	//add data
	function addBom(){
			$cek=$this->session->userdata('username');
			if($cek){
				$this->load->model('mproduk');
				$data['isi']=$this->mproduk->list_item();
				$data['produk']=$this->mproduk->list_item();
				$this->load->view('dasboard/head');
				$this->load->view('dasboard/header');
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
				$this->load->model('mproduksi');
				$data['isi']=$this->mproduksi->list_bom();
				$this->load->view('dasboard/head');
				$this->load->view('dasboard/header');
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
				$this->load->model('mproduksi');
				$data['isi']=$this->mproduksi->list_bahanProduksi($idProduk);
				$this->load->view('dasboard/head');
				$this->load->view('dasboard/header');
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
				$this->load->model('mproduksi');
				$data['isi']=$this->mproduksi->list_bom();
				$this->load->view('dasboard/head');
				$this->load->view('dasboard/header');
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
				$this->load->model('mproduksi');
				$data['isi']=$this->mproduksi->listProduksi();
				$this->load->model('msupplier');
				$data['suplier']=$this->msupplier->list_supplier();
				$this->load->view('dasboard/head');
				$this->load->view('dasboard/header');
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
	//keranjang belanja Bom
	public function addCart()
	{
		
		$data = array(
				'id' => $this->input->post('id'),
				'name' => $this->input->post('nama'),
				'qty' => $this->input->post('jumlah'),
				'price' => $this->input->post('harga')
				
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
		$this->mproduksi->addBom($data);
		redirect("produksi/addBom");
		
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
				
				'tgl' => $this->input->post('tgl'),
				'id' => $this->input->post('id'),
				'qty' => $this->input->post('jumlah'),
				'price' => $this->input->post('harga'),
				'total' => $this->input->post('total'),
				'email' => $this->session->userdata('username')
				
            );
		
		$this->load->model('mproduksi');
		$this->mproduksi->addBahanProduksi($data);
		redirect("produksi/addProduksi");
		
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

}
?>