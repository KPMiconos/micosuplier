<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
	public function index(){
		
	}
	//laporan barang keluar
	public function laporanKeluar(){
			$this->load->model('mlaporan');
			$data['isi']=$this->mlaporan->laporanPenjualan();
			$this->load->view('dasboard/head');
			$this->load->view('dasboard/header');
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/laporanPenjualan',$data);
			$this->load->view('dasboard/footer');
	}
	public function filterKeluar(){
		$this->db->reconnect();
		$data = array(
				
				'tgl_awal' => $this->input->post('tgl_awal'),
				'tgl_akhir' => $this->input->post('tgl_akhir')
            );
		$this->load->model('mlaporan');
		$data['isi']=$this->mlaporan->filterLaporanKeluar($data);
		$this->load->view('dasboard/head');
		$this->load->view('dasboard/header');
		$this->load->view('dasboard/sidebar');
		$this->load->view('dasboard/laporanPenjualan',$data);
		$this->load->view('dasboard/footer');
	}
	
	//laporan barang masuk
	public function laporanMasuk(){
			$this->load->model('mlaporan');
			$data['isi']=$this->mlaporan->laporanPembelian();
			$this->load->view('dasboard/head');
			$this->load->view('dasboard/header');
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/laporanPembelian',$data);
			$this->load->view('dasboard/footer');
	}
	public function filterMasuk(){
		$this->db->reconnect();
		$data = array(
				
				'tgl_awal' => $this->input->post('tgl_awal'),
				'tgl_akhir' => $this->input->post('tgl_akhir')
            );
		$this->load->model('mlaporan');
		$data['isi']=$this->mlaporan->filterLaporanMasuk($data);
		$this->load->view('dasboard/head');
		$this->load->view('dasboard/header');
		$this->load->view('dasboard/sidebar');
		$this->load->view('dasboard/laporanPembelian',$data);
		$this->load->view('dasboard/footer');
	}
	
	
}
?>