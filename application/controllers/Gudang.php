<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gudang extends CI_Controller {
	public function index(){
		
		
	}
	public function addItem(){
		$this->load->view('dasboard/head');
		$this->load->view('dasboard/header');
		$this->load->view('dasboard/sidebar');
		$this->load->view('dasboard/inputItem');
		$this->load->view('dasboard/footer');
	}
		public function addItem_act(){
		$this->load->library('upload');
        $nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = './assets/images/produk/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '2048'; //maksimum besar file 2M
        $config['max_width']  = '1288'; //lebar maksimum 1288 px
        $config['max_height']  = '768'; //tinggi maksimu 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya
 
        $this->upload->initialize($config);
		
		 if($_FILES['filefoto']['name'])
        {
            if ($this->upload->do_upload('filefoto'))
            {
                $gbr = $this->upload->data();
                $data = array(
                  'nm_gbr' =>$gbr['file_name'],
				  'idItem' => $this->input->post('idItem'),
                  'nama' => $this->input->post('nama'),
				  'tipe' => $this->input->post('tipe'),
				  'satuan' => $this->input->post('satuan'),
				  'deskripsi' => $this->input->post('deskripsi')
                );
				$this->load->model('mgudang');
                $this->mgudang->addItem($data); //akses model untuk menyimpan ke database
                //pesan yang muncul jika berhasil diupload pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Upload gambar berhasil !!</div></div>");
                redirect('gudang/addItem'); //jika berhasil maka akan ditampilkan view vupload
            }else{
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal upload gambar !!</div></div>");
                redirect('gudang/addItem'); //jika gagal maka akan ditampilkan form upload
            }
        }else{
			redirect('gudang/addItem');
		}
	}
	public function listPenerimaan(){
		$this->load->model('mgudang');
		$data['isi']=$this->mgudang->listPenerimaan();
		$this->load->view('dasboard/head');
		$this->load->view('dasboard/header');
		$this->load->view('dasboard/sidebar');
		$this->load->view('dasboard/listPenerimaan',$data);
		$this->load->view('dasboard/footer');
	}
	
	public function viewPO($id)
	{
		$this->session->set_userdata('idPO',$id);
		$this->load->model('mgudang');
		$data['isi']=$this->mgudang->viewPO($id);
		$this->load->model('petugas');
		$data['petugas']=$this->petugas->list_petugas();
		$this->load->view('dasboard/head');
		$this->load->view('dasboard/header');
		$this->load->view('dasboard/sidebar');
		$this->load->view('dasboard/inputGudang',$data);
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
	public function listBarang()
	{
		$this->load->model('produk');
		$data['isi']=$this->produk->list_produk();
		$this->load->view('dasboard/head');
		$this->load->view('dasboard/header');
		$this->load->view('dasboard/sidebar');
		$this->load->view('dasboard/listProduk',$data);
		$this->load->view('dasboard/footer');
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
	public function returnDefect(){
		$data = array(
				'idPurchasing' => $this->input->post('idPurchasing'),
				'idItem' => $this->input->post('idItem'),
				'jumlah' => $this->input->post('jumlah')
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
}
?>