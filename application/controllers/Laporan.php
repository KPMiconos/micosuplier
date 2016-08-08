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
	public function exportMasuk(){
		/* $this->load->library(array('PHPExcel'));
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
                  ->setCreator("SAMSUL ARIFIN") //creator
                    ->setTitle("Programmer - Regional Planning and Monitoring, XL AXIATA");  //file title
 
            $objset = $objPHPExcel->setActiveSheetIndex(0); //inisiasi set object
            $objget = $objPHPExcel->getActiveSheet();  //inisiasi get object
 
            $objget->setTitle('Sample Sheet'); //sheet title
             
            $objget->getStyle("A1:C1")->applyFromArray(
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
             
            for ($a=0;$a<8; $a++) 
            {
                $objset->setCellValue($cols[$a].'1', $val[$a]);
                 
                //Setting lebar cell
                $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(25); // NAMA
                $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(25); // ALAMAT
                $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Kontak
				$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
				$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(25);
				$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(25);
				$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(25);
				$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(25);
                $style = array(
                    'alignment' => array(
                        'horizontal' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                    )
                );
                $objPHPExcel->getActiveSheet()->getStyle($cols[$a].'1')->applyFromArray($style);
            }
             
            $baris  = 2;
            foreach ($ambildata as $frow){
                 
                //pemanggilan sesuaikan dengan nama kolom tabel
                $objset->setCellValue("A".$baris, $baris-1); //membaca data nama
                $objset->setCellValue("B".$baris, $frow->id_po); //membaca data alamat
                $objset->setCellValue("C".$baris, $frow->tanggal_receive); //membaca data kontak
				$objset->setCellValue("D".$baris, $frow->nama_item);
				$objset->setCellValue("E".$baris, $frow->satuan);
				$objset->setCellValue("F".$baris, $frow->jumlah);
				$objset->setCellValue("G".$baris, $frow->kurir);
				$objset->setCellValue("H".$baris, $frow->nama_petugas);
                 echo $frow->nama_petugas;
                //Set number value
                $objPHPExcel->getActiveSheet()->getStyle('C1:C'.$baris)->getNumberFormat()->setFormatCode('0');
                 
                $baris++;
            }
             
            //$objPHPExcel->getActiveSheet()->setTitle('Data Export');
 
            $objPHPExcel->setActiveSheetIndex(0);  
            $filename = urlencode("Data".date("Y-m-d H:i:s").".xls");
               
              header('Content-Type: application/vnd.ms-excel'); //mime type
              header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
              header('Cache-Control: max-age=0'); //no cache
 
            //$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5'); 			
           // $objWriter->save();
        }else{
            redirect('Excel');
        }
				//load library PHPExcel
		$this->load->library('phpexcel');//Panggil Library Excel
 
                $this->excel->setActiveSheetIndex(0)
                               ->setCellValue('A1', 'Hello')
                               ->setCellValue('B2', 'world!')
                               ->setCellValue('C1', 'Hello')
                               ->setCellValue('D2', 'world!');
                $this->excel->getActiveSheet()->setTitle('Simple');
 
                $this->excel->setActiveSheetIndex(0);
 
                $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');
 
                $objWriter->save(APPPATH."../assets/doc/apalah.xlsx");    //Simpan sebagai apalah.xlsx
		*/
	}
	
	
}
?>