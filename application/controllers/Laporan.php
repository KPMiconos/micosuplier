<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
	public function index(){
		
	}
	//laporan barang keluar
	public function laporanKeluar(){
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
			
			$this->load->model('mlaporan');
			$data['isi']=$this->mlaporan->laporanPenjualan();
			$this->load->view('dasboard/head');
			$this->load->view('dasboard/header',$user);
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/laporanPenjualan',$data);
			$this->load->view('dasboard/footer');
		}else{
			
			redirect('home');
		}
	}
	public function filterKeluar(){
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
			$this->db->reconnect();
			$data = array(
					
					'tgl_awal' => $this->input->post('tgl_awal'),
					'tgl_akhir' => $this->input->post('tgl_akhir')
				);
			$this->load->model('mlaporan');
			$data['isi']=$this->mlaporan->filterLaporanKeluar($data);
			$this->load->view('dasboard/head');
			$this->load->view('dasboard/header',$user);
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/filterKeluar',$data);
			$this->load->view('dasboard/footer');
		}else{
			
			redirect('home');
		}
	}
	public function exportKeluar(){
		$cek=$this->session->userdata('username');
		if($cek){
			 $this->load->library(array('PHPExcel'));
			 $data = array(
					
					'tgl_awal' => $this->input->post('tgl_awal'),
					'tgl_akhir' => $this->input->post('tgl_akhir')
				);
				
			$this->load->model('mlaporan');
			$ambildata = $this->mlaporan->filterLaporanKeluar($data);
			
			if(count($ambildata)>0){
				$objPHPExcel = new PHPExcel();
				// Set properties
				$objPHPExcel->getProperties()
					  ->setCreator("Miconos") //creator
						->setTitle("Programmer - ");  //file title
	 
				$objset = $objPHPExcel->setActiveSheetIndex(0); //inisiasi set object
				$objget = $objPHPExcel->getActiveSheet();  //inisiasi get object
	 
				$objget->setTitle('Sample Sheet'); //sheet title
				 
				$objget->getStyle("A5:H5")->applyFromArray(
					array(
						'fill' => array(
							'type' => PHPExcel_Style_Fill::FILL_SOLID,
							'color' => array('rgb' => '92d050')
						),
						'font' => array(
							'color' => array('rgb' => '000000')
						)
					)
				);
	 
				//table header
				$cols = array("A","B","C","D","E","F","G","H");
				 
				$val = array("No ","ID.Transaksi","Tanggal","Nama Barang","Satuan","Jumlah","Kurir","Pengirim");
				$objPHPExcel->getActiveSheet()->mergeCells('A2:H2');
				$objPHPExcel->getActiveSheet()->setCellValue('A2','Laporan Barang Penjualan PT.Miconos');
				$objPHPExcel->getActiveSheet()->mergeCells('A3:H3');
				$objPHPExcel->getActiveSheet()->setCellValue('A3',date('d/m/Y',strtotime($data['tgl_awal'])).' s/d '.date('d/m/Y',strtotime($data['tgl_akhir'])));
				 
				for ($a=0;$a<8; $a++) 
				{
					$objset->setCellValue($cols[$a].'5', $val[$a]);
					 
					//Setting lebar cell
					$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5); 
					$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(25); 
					$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(12);
					$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(25);
					$style = array(
						'alignment' => array(
							'horizontal' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
						)
					);
					$objPHPExcel->getActiveSheet()->getStyle($cols[$a].'5')->applyFromArray($style);
				}
				 
				$baris  = 6;
				foreach ($ambildata as $frow){
					 
					//pemanggilan sesuaikan dengan nama kolom tabel
					$objset->setCellValue("A".$baris, $baris-5); 
					$objset->setCellValue("B".$baris, $frow->id_so); 
					$objset->setCellValue("C".$baris, date('d/m/Y',strtotime($frow->tanggal))); //rubah format tanggal
					$objset->setCellValue("D".$baris, $frow->nama_item);
					$objset->setCellValue("E".$baris, $frow->nama_satuan);
					$objset->setCellValue("F".$baris, $frow->jumlah);
					$objset->setCellValue("G".$baris, $frow->kurir);
					$objset->setCellValue("H".$baris, $frow->nama_petugas);
					 //echo $frow->nama_petugas;
					//Set number value
					$objPHPExcel->getActiveSheet()->getStyle('C1:C'.$baris)->getNumberFormat()->setFormatCode('0');
					 
					$baris++;
				}
				 
				//$objPHPExcel->getActiveSheet()->setTitle('Data Export');
	 
				$objPHPExcel->setActiveSheetIndex(0);  
			   
				$filename = urlencode("L_Keluar".date('_d-M-Y_H-i-s').".xlsx");
				header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
				header('Content-Disposition:inline;filename="'.$filename.'"');
				header('Cache-Control: max-age=0');
				$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
				$objWriter->save('php://output');
				
			}else{
				redirect('Excel');
			}
		}else{
			
			redirect('home');
		}
	}
	
	
	//laporan barang masuk
	public function laporanMasuk(){
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
			$this->load->model('mlaporan');
			$data['isi']=$this->mlaporan->laporanPembelian();
			$this->load->view('dasboard/head');
			$this->load->view('dasboard/header',$user);
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/laporanPembelian',$data);
			$this->load->view('dasboard/footer');
		}else{
			
			redirect('home');
		}
	}
	public function filterMasuk(){
		
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
			$this->db->reconnect();
			$data = array(
					
					'tgl_awal' => $this->input->post('tgl_awal'),
					'tgl_akhir' => $this->input->post('tgl_akhir')
				);
			$this->load->model('mlaporan');
			$data['isi']=$this->mlaporan->filterLaporanMasuk($data);
			$this->load->view('dasboard/head');
			$this->load->view('dasboard/header',$user);
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/filterMasuk',$data);
			$this->load->view('dasboard/footer');
		}else{
			
			redirect('home');
		}
	}
	public function exportMasuk(){
		$cek=$this->session->userdata('username');
		if($cek){
			 $this->load->library(array('PHPExcel'));
			 $data = array(
					
					'tgl_awal' => $this->input->post('tgl_awal'),
					'tgl_akhir' => $this->input->post('tgl_akhir')
				);
				
			$this->load->model('mlaporan');
			$ambildata = $this->mlaporan->filterLaporanMasuk($data);
			
			if(count($ambildata)>0){
				$objPHPExcel = new PHPExcel();
				// Set properties
				$objPHPExcel->getProperties()
					  ->setCreator("Miconos") //creator
						->setTitle("Programmer - ");  //file title
	 
				$objset = $objPHPExcel->setActiveSheetIndex(0); //inisiasi set object
				$objget = $objPHPExcel->getActiveSheet();  //inisiasi get object
	 
				$objget->setTitle('Sample Sheet'); //sheet title
				 
				$objget->getStyle("A5:H5")->applyFromArray(
					array(
						'fill' => array(
							'type' => PHPExcel_Style_Fill::FILL_SOLID,
							'color' => array('rgb' => '92d050')
						),
						'font' => array(
							'color' => array('rgb' => '000000')
						)
					)
				);
	 
				//table header
				$cols = array("A","B","C","D","E","F","G","H");
				 
				$val = array("No ","ID.Transaksi","Tanggal","Nama Barang","Satuan","Jumlah","Kurir","Pengirim");
				$objPHPExcel->getActiveSheet()->mergeCells('A2:H2');
				$objPHPExcel->getActiveSheet()->setCellValue('A2','Laporan Barang Masuk PT.Miconos');
				$objPHPExcel->getActiveSheet()->mergeCells('A3:H3');
				$objPHPExcel->getActiveSheet()->setCellValue('A3',date('d/m/Y',strtotime($data['tgl_awal'])).' s/d '.date('d/m/Y',strtotime($data['tgl_akhir'])));
				 
				for ($a=0;$a<8; $a++) 
				{
					$objset->setCellValue($cols[$a].'5', $val[$a]);
					 
					//Setting lebar cell
					$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5); 
					$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(25); 
					$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(12);
					$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(25);
					$style = array(
						'alignment' => array(
							'horizontal' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
						)
					);
					$objPHPExcel->getActiveSheet()->getStyle($cols[$a].'5')->applyFromArray($style);
				}
				 
				$baris  = 6;
				foreach ($ambildata as $frow){
					 
					//pemanggilan sesuaikan dengan nama kolom tabel
					$objset->setCellValue("A".$baris, $baris-5); //membaca data nama
					$objset->setCellValue("B".$baris, $frow->id_rec); //membaca data alamat
					$objset->setCellValue("C".$baris, date('d/m/Y',strtotime($frow->tanggal_receive))); //membaca data kontak
					$objset->setCellValue("D".$baris, $frow->nama_item);
					$objset->setCellValue("E".$baris, $frow->nama_satuan);
					$objset->setCellValue("F".$baris, $frow->jumlah);
					$objset->setCellValue("G".$baris, $frow->kurir);
					$objset->setCellValue("H".$baris, $frow->nama_suplier);
					 //echo $frow->nama_petugas;
					//Set number value
					$objPHPExcel->getActiveSheet()->getStyle('C1:C'.$baris)->getNumberFormat()->setFormatCode('0');
					 
					$baris++;
				}
				 
				//$objPHPExcel->getActiveSheet()->setTitle('Data Export');
	 
				$objPHPExcel->setActiveSheetIndex(0);  
			   
				$filename = urlencode("L_Masuk".date('_d-M-Y_H-i-s').".xlsx");
				header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
				header('Content-Disposition:inline;filename="'.$filename.'"');
				header('Cache-Control: max-age=0');
				$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
				$objWriter->save('php://output');
				
			}else{
				redirect('Excel');
			}
		}else{
			
			redirect('home');
		}
	}
	public function laporanService(){
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
			$this->load->model('mlaporan');
			$data['isi']=$this->mlaporan->laporanService();
			$this->load->view('dasboard/head');
			$this->load->view('dasboard/header',$user);
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/laporanService',$data);
			$this->load->view('dasboard/footer');
		}else{
			
			redirect('home');
		}
	}
	public function filterService(){
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
					
					'tgl_awal' => $this->input->post('tgl_awal'),
					'tgl_akhir' => $this->input->post('tgl_akhir')
				);
				$this->load->model('mlaporan');
				$data['isi']=$this->mlaporan->filterLaporanService($data);
				
				$this->load->view('dasboard/head');
				$this->load->view('dasboard/header',$user);
				$this->load->view('dasboard/sidebar');
				$this->load->view('dasboard/filterService',$data);
				$this->load->view('dasboard/footer');
		}else{
			
			redirect('home');
		}
	}
	public function exportService(){
		$cek=$this->session->userdata('username');
		if($cek){
			 $this->load->library(array('PHPExcel'));
			 $data = array(
					
					'tgl_awal' => $this->input->post('tgl_awal'),
					'tgl_akhir' => $this->input->post('tgl_akhir')
				);
				
			$this->load->model('mlaporan');
			$ambildata = $this->mlaporan->filterLaporanService($data);
			
			if(count($ambildata)>0){
				$objPHPExcel = new PHPExcel();
				// Set properties
				$objPHPExcel->getProperties()
					  ->setCreator("Miconos") //creator
						->setTitle("Programmer - ");  //file title
	 
				$objset = $objPHPExcel->setActiveSheetIndex(0); //inisiasi set object
				$objget = $objPHPExcel->getActiveSheet();  //inisiasi get object
	 
				$objget->setTitle('Sample Sheet'); //sheet title
				 
				$objget->getStyle("A5:H5")->applyFromArray(
					array(
						'fill' => array(
							'type' => PHPExcel_Style_Fill::FILL_SOLID,
							'color' => array('rgb' => '92d050')
						),
						'font' => array(
							'color' => array('rgb' => '000000')
						)
					)
				);
	 
				//table header
				$cols = array("A","B","C","D","E","F","G","H");
				 
				$val = array("No ","ID.Transaksi","Tanggal","Teknisi","Customer","Nama Barang","Satuan","Jumlah");
				$objPHPExcel->getActiveSheet()->mergeCells('A2:H2');
				$objPHPExcel->getActiveSheet()->setCellValue('A2','Laporan Barang Untuk Service/Garansi PT.Miconos');
				$objPHPExcel->getActiveSheet()->mergeCells('A3:H3');
				$objPHPExcel->getActiveSheet()->setCellValue('A3',date('d/m/Y',strtotime($data['tgl_awal'])).' s/d '.date('d/m/Y',strtotime($data['tgl_akhir'])));
				 
				for ($a=0;$a<8; $a++) 
				{
					$objset->setCellValue($cols[$a].'5', $val[$a]);
					 
					//Setting lebar cell
					$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5); 
					$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(25); 
					$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(12);
					$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(25);
					$style = array(
						'alignment' => array(
							'horizontal' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
						)
					);
					$objPHPExcel->getActiveSheet()->getStyle($cols[$a].'5')->applyFromArray($style);
				}
				 
				$baris  = 6;
				foreach ($ambildata as $frow){
					 
					//pemanggilan sesuaikan dengan nama kolom tabel
					$objset->setCellValue("A".$baris, $baris-5);
					$objset->setCellValue("B".$baris, $frow->id_produkService);
					$objset->setCellValue("C".$baris, date('d/m/Y',strtotime($frow->tanggal))); 
					$objset->setCellValue("D".$baris, $frow->nama_petugas);
					$objset->setCellValue("E".$baris, $frow->nama_customer);
					$objset->setCellValue("F".$baris, $frow->nama_item);
					$objset->setCellValue("G".$baris, $frow->nama_satuan);
					$objset->setCellValue("H".$baris, $frow->jumlah);
					 //echo $frow->nama_petugas;
					//Set number value
					$objPHPExcel->getActiveSheet()->getStyle('C1:C'.$baris)->getNumberFormat()->setFormatCode('0');
					 
					$baris++;
				}
				 
				//$objPHPExcel->getActiveSheet()->setTitle('Data Export');
	 
				$objPHPExcel->setActiveSheetIndex(0);  
			   
				$filename = urlencode("L_Service".date('_d-M-Y_H-i-s').".xlsx");
				header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
				header('Content-Disposition:inline;filename="'.$filename.'"');
				header('Cache-Control: max-age=0');
				$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
				$objWriter->save('php://output');
				
			}else{
				redirect('Excel');
			}
		}else{
			
			redirect('home');
		}
	}
	
	public function laporanDefect(){
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
			$this->load->model('mlaporan');
			$data['isi']=$this->mlaporan->laporanDefect();
			$this->load->view('dasboard/head');
			$this->load->view('dasboard/header',$user);
			$this->load->view('dasboard/sidebar');
			$this->load->view('dasboard/laporanDefect',$data);
			$this->load->view('dasboard/footer');
		}else{
			
			redirect('home');
		}
	}
	public function filterDefect(){
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
					
					'tgl_awal' => $this->input->post('tgl_awal'),
					'tgl_akhir' => $this->input->post('tgl_akhir')
				);
				$this->load->model('mlaporan');
				$data['isi']=$this->mlaporan->filterLaporanDefect($data);
				
				$this->load->view('dasboard/head');
				$this->load->view('dasboard/header',$user);
				$this->load->view('dasboard/sidebar');
				$this->load->view('dasboard/filterDefect',$data);
				$this->load->view('dasboard/footer');
		}else{
			
			redirect('home');
		}
	}
	public function exportDefect(){
		$cek=$this->session->userdata('username');
		if($cek){
			 $this->load->library(array('PHPExcel'));
			 $data = array(
					
					'tgl_awal' => $this->input->post('tgl_awal'),
					'tgl_akhir' => $this->input->post('tgl_akhir')
				);
				
			$this->load->model('mlaporan');
			$ambildata = $this->mlaporan->filterLaporanDefect($data);
			
			if(count($ambildata)>0){
				$objPHPExcel = new PHPExcel();
				// Set properties
				$objPHPExcel->getProperties()
					  ->setCreator("Miconos") //creator
						->setTitle("Programmer - ");  //file title
	 
				$objset = $objPHPExcel->setActiveSheetIndex(0); //inisiasi set object
				$objget = $objPHPExcel->getActiveSheet();  //inisiasi get object
	 
				$objget->setTitle('Sample Sheet'); //sheet title
				 
				$objget->getStyle("A5:F5")->applyFromArray(
					array(
						'fill' => array(
							'type' => PHPExcel_Style_Fill::FILL_SOLID,
							'color' => array('rgb' => '92d050')
						),
						'font' => array(
							'color' => array('rgb' => '000000')
						)
					)
				);
	 
				//table header
				$cols = array("A","B","C","D","E","F");
				 
				$val = array("No ","ID.Transaksi","Tanggal","Nama Barang","Satuan","Jumlah");
				$objPHPExcel->getActiveSheet()->mergeCells('A2:F2');
				$objPHPExcel->getActiveSheet()->setCellValue('A2','Laporan Barang Rusak PT.Miconos');
				$objPHPExcel->getActiveSheet()->mergeCells('A3:F3');
				$objPHPExcel->getActiveSheet()->setCellValue('A3',date('d/m/Y',strtotime($data['tgl_awal'])).' s/d '.date('d/m/Y',strtotime($data['tgl_akhir'])));
				 
				for ($a=0;$a<6; $a++) 
				{
					$objset->setCellValue($cols[$a].'5', $val[$a]);
					 
					//Setting lebar cell
					$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5); 
					$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(25); 
					$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
					$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(12);
					$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(12);
					
					$style = array(
						'alignment' => array(
							'horizontal' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
						)
					);
					$objPHPExcel->getActiveSheet()->getStyle($cols[$a].'5')->applyFromArray($style);
				}
				 
				$baris  = 6;
				foreach ($ambildata as $frow){
					if($frow->id_rec){
						$idTran=$frow->id_rec;
					}else if($frow->id_issue){
						$idTran=$frow->id_issue;
					}
					//pemanggilan sesuaikan dengan nama kolom tabel
					$objset->setCellValue("A".$baris, $baris-5);
					$objset->setCellValue("B".$baris, $idTran );
					$objset->setCellValue("C".$baris, date('d/m/Y',strtotime($frow->tanggal))); 
					$objset->setCellValue("D".$baris, $frow->nama_item);
					$objset->setCellValue("E".$baris, $frow->nama_satuan);
					$objset->setCellValue("F".$baris, $frow->jumlah);
					 //echo $frow->nama_petugas;
					//Set number value
					$objPHPExcel->getActiveSheet()->getStyle('C1:C'.$baris)->getNumberFormat()->setFormatCode('0');
					 
					$baris++;
				}
				 
				//$objPHPExcel->getActiveSheet()->setTitle('Data Export');
	 
				$objPHPExcel->setActiveSheetIndex(0);  
			   
				$filename = urlencode("L_Barang_Rusak".date('_d-M-Y_H-i-s').".xlsx");
				header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
				header('Content-Disposition:inline;filename="'.$filename.'"');
				header('Cache-Control: max-age=0');
				$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
				$objWriter->save('php://output');
				
			}else{
				redirect('Excel');
			}
		}else{
			
			redirect('home');
		}
	}
	
	
	
}
?>