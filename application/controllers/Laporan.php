<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
	public function index(){
		
	}
	public function laporanKeluar(){
			$this->load->model('mlaporan');
			$data['isi']=$this->mlaporan->laporanPenjualan();
			$this->load->view('dasboard/head');
			$this->load->view('dasboard/header');
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/laporanPenjualan',$data);
			$this->load->view('dasboard/footer');
	}
	public function laporanMasuk(){
			$this->load->model('mlaporan');
			$data['isi']=$this->mlaporan->laporanPembelian();
			$this->load->view('dasboard/head');
			$this->load->view('dasboard/header');
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/laporanPembelian',$data);
			$this->load->view('dasboard/footer');
	}
}
?>