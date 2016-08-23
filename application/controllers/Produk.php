<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {
	function index(){
		redirect('produk/listItem');
	}
	//add data
	public function addItem(){
		$this->load->model('mproduk');
		$data['satuan']=$this->mproduk->list_satuan();
		$this->load->view('dasboard/head');
		$this->load->view('dasboard/header');
		$this->load->view('dasboard/sidebar');
		$this->load->view('dasboard/inputItem',$data);
		$this->load->view('dasboard/footer');
	}
		
	public function addSatuan(){
		$data = array(
				'nama' => $this->input->post('nama'),
				'kelas' => $this->input->post('kelas'),
				'deskripsi' => $this->input->post('deskripsi')

            );
		
		$this->load->model('mproduk');
		$this->mproduk->addSatuan($data);
		redirect("produk/listSatuan");
	}
	public function addTipeItem(){
		$data = array(
				'nama' => $this->input->post('nama'),
				'deskripsi' => $this->input->post('deskripsi')

            );
		
		$this->load->model('mproduk');
		$this->mproduk->addTipeItem($data);
		redirect("produk/listTipeItem");
	}
	//list data
	public function listItem(){
		$this->load->model('mproduk');
		$data['isi']=$this->mproduk->list_item();
		$this->load->view('dasboard/head');
		$this->load->view('dasboard/header');
		$this->load->view('dasboard/sidebar');
		$this->load->view('dasboard/listItem',$data);
		$this->load->view('dasboard/footer');
	}
	public function listSatuan(){
		$this->load->model('mproduk');
		$data['isi']=$this->mproduk->list_satuan();
		$this->load->view('dasboard/head');
		$this->load->view('dasboard/header');
		$this->load->view('dasboard/sidebar');
		$this->load->view('dasboard/listSatuan',$data);
		$this->load->view('dasboard/footer');
	}
	public function listTipeItem(){
		$this->load->model('mproduk');
		$data['isi']=$this->mproduk->list_tipeItem();
		$this->load->view('dasboard/head');
		$this->load->view('dasboard/header');
		$this->load->view('dasboard/sidebar');
		$this->load->view('dasboard/listTipeItem',$data);
		$this->load->view('dasboard/footer');
	}
	//view data
	public function viewItem($id){
		$this->load->model('mproduk');
		$data['isi']=$this->mproduk->viewItem($id);
		$this->load->view('dasboard/head');
		$this->load->view('dasboard/header');
		$this->load->view('dasboard/sidebar');
		$this->load->view('dasboard/viewItem',$data);
		$this->load->view('dasboard/footer');
	}
	public function viewProduk($id){
		$this->load->model('mproduk');
		$data['isi']=$this->mproduk->viewItem($id);
		$data['rincian']=$this->mproduk->rincianProduk($id);
		$this->load->view('dasboard/head');
		$this->load->view('dasboard/header');
		$this->load->view('dasboard/sidebar');
		$this->load->view('dasboard/viewProduk',$data);
		$this->load->view('dasboard/footer');
	}
	//action function
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
				$this->load->model('mproduk');
                $this->mproduk->addItem($data); //akses model untuk menyimpan ke database
                //pesan yang muncul jika berhasil diupload pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Upload gambar berhasil !!</div></div>");
                redirect('gudang/addItem'); //jika berhasil maka akan ditampilkan view vupload
            }else{
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal upload gambar !!</div></div>");
                redirect('gudang/addItem'); //jika gagal maka akan ditampilkan form upload
            }
        }else{
			 $data = array(
                  'nm_gbr' => '',
				  'idItem' => $this->input->post('idItem'),
                  'nama' => $this->input->post('nama'),
				  'tipe' => $this->input->post('tipe'),
				  'satuan' => $this->input->post('satuan'),
				  'deskripsi' => $this->input->post('deskripsi')
                );
				$this->load->model('mproduk');
                $this->mproduk->addItem($data); 
			 redirect('produk/addItem');
		}
	}
}
?>