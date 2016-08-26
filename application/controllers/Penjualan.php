<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {
	public function index(){
		
		redirect('penjualan/list/Penjualan');
	}
	//add data
	public function addPenjualan()
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
			$this->load->view('dasboard/head');
			$this->load->view('dasboard/header',$user);
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/penjualan',$data);
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
			$this->load->model('mpenjualan');
			$this->mpenjualan->updateStatus($data);
			redirect('penjualan/listPenjualan');
		}else{
			
			redirect('home');
		}
	}
	 public function rincianBarang($id){
		 
		 $this->load->model('mproduk');
		 $query=$this->mproduk->rincianProduk($id);
		 //print_r($query);
		
			
			foreach ($query as $person) {
		
			$row = array();
			$row['nama_suplier']=$person->nama_suplier;
			$row['id_suplier'] = $person->id_suplier;
			$row['nama_item'] = $person->nama_item;
			$row['id_item'] = $person->id_item;
			if($person->jumlah<1){
				$row['hargaSatuan'] ="-";
			}else{
				$row['hargaSatuan'] = $person->hargaSatuan;
			}
			$row['nama'] = $person->nama_item;
			if($person->jumlah<1){
				$row['jumlah'] = "<span class='label label-danger'>Stok kosong</span>";
			}else{
				$row['jumlah'] = $person->jumlah;
			}
			

			$data[] = $row;
		}
			$out=array(
						'isi'=>$data);
			 echo json_encode($out);
			
		
	 }
	//list data
	public function listPenjualan()
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
			$this->load->model('mpenjualan');
			$data['isi']=$this->mpenjualan->list_penjualan();
			$this->load->view('dasboard/head');
			$this->load->view('dasboard/header',$user);
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/listPenjualan',$data);
			$this->load->view('dasboard/footer');
		}else{
			
			redirect('home');
		}
	}
	//rincian penjualan
	 public function rincianPenjualan($id){
		 
		 $this->load->model('mpenjualan');
		 $query=$this->mpenjualan->rincianPenjualan($id);
		 
		 if(!empty($query)){
			 foreach ($query as $row)
			{
				
					echo '<tr>
							
							<td><a href="',base_url(),'produk/viewProduk/',$row->id_item,'">',$row->nama_item,'</a></td>
							<td>',$row->nama_tipe_item,'</td>
							<td>',$row->nama_satuan,'</td>
							<td>',$row->harga,'</td>
							<td>',$row->jumlah,'</td>
							<td>',$row->keluar,'</td>
						</tr>';
				
					
			}
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
					'price' => $this->input->post('harga'),
					'options' =>array('idSuplier'=>$this->input->post('idSuplier'),
									'idHarga'=>$this->input->post('harga'))
					
				);
			
			$this->cart->insert($data);
			echo $data['id'];
			redirect("penjualan/addPenjualan");
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
			redirect("penjualan/addPenjualan");
		}else{
			
			redirect('home');
		}
	}
	public function addDataBelanja()
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
			
			$this->load->model('mpenjualan');
			$this->mpenjualan->addPenjualan($data);
			redirect("penjualan/listPenjualan");
		}else{
			
			redirect('home');
		}
		
	}
}
?>
