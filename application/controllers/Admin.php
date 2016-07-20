<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	
	public function index()
	{
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('admin');
		$this->load->view('footer');
	}
	public function listPetugas()
	{
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('listPetugas');
		$this->load->view('footer');
	}
	public function listCustomer()
	{
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('listCustomer');
		$this->load->view('footer');
	}
	public function listSuplier()
	{
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('listSuplier');
		$this->load->view('footer');
	}
	public function addPetugas()
	{
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('inputPetugas');
		$this->load->view('footer');
	}
	
}
