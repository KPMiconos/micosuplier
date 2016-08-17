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
		$this->load->view('dasboard/filterMasuk',$data);
		$this->load->view('dasboard/footer');
	}
	public function exportMasuk(){
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
                $objset->setCellValue("B".$baris, $frow->id_po); //membaca data alamat
                $objset->setCellValue("C".$baris, date('d/m/Y',strtotime($frow->tanggal_receive))); //membaca data kontak
				$objset->setCellValue("D".$baris, $frow->nama_item);
				$objset->setCellValue("E".$baris, $frow->satuan);
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
		   
			$filename = urlencode("L_Masuk".date('_d-M-Y_H-i-s').".xlsx");
			header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition:inline;filename="'.$filename.'"');
			header('Cache-Control: max-age=0');
			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
			$objWriter->save('php://output');
			
        }else{
            redirect('Excel');
        }/*
				//load library PHPExcel
		$this->load->library('phpexcel');
		
 
		// merubah style border pada cell yang aktif (cell yang terisi)
		$styleArray = array( 'borders' => 
			array( 'allborders' => 
				array( 'style' => PHPExcel_Style_Border::BORDER_THIN, 'color' => array('argb' => '00000000'), 
					), 
				), 
			);
 
		// melakukan pengaturan pada header kolom
		$fontHeader = array( 
			'font' => array(
				'bold' => true
			),
			'alignment' => array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
             	'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
             	'rotation'   => 0,
			),
			'fill' => array(
            	'type' => PHPExcel_Style_Fill::FILL_SOLID,
            	'color' => array('rgb' => '6CCECB')
        	)
		);
 
		//membuat object baru bernama $objPHPExcel
		$objPHPExcel = new PHPExcel();
		$objPHPExcel->getProperties()->setTitle("Miconos")->setDescription("Pergudangan");
 
		// data dibuat pada sheet pertama
		$objPHPExcel->setActiveSheetIndex(0); 
 
		//set header kolom
		$objPHPExcel->getActiveSheet()->setCellValue('B2', 'No.'); 
		$objPHPExcel->getActiveSheet()->setCellValue('C2', 'Nama Lengkap'); 
		$objPHPExcel->getActiveSheet()->setCellValue('D2', 'Alamat');
		 $data = array(
				
				'tgl_awal' => $this->input->post('tgl_awal'),
				'tgl_akhir' => $this->input->post('tgl_akhir')
            );
			
        $this->load->model('mlaporan');
		$ambildata = $this->mlaporan->filterLaporanMasuk($data);
		
		// pendefinisian data
		$isi = array(
			array('B' => '1', 'C' => 'Budi Santoso', 'D' => 'Depok'),
			array('B' => '2', 'C' => 'Susi Liana', 'D' => 'Jakarta'),
			array('B' => '3', 'C' => 'Ari Agung', 'D' => 'Jakarta'),
			array('B' => '4', 'C' => 'Ira Mandala', 'D' => 'Surabaya'),
			array('B' => '5', 'C' => 'Joko Dolo', 'D' => 'Depok'),
			array('B' => '6', 'C' => 'Hasan Basri', 'D' => 'Bandung'),
		);
		
		// melakukan pengisian data
		foreach($isi as $k => $v)
		{
			$col = $k + 3;
			foreach($v as $k1 => $v1)
			{
				$column = $k1.$col;
				$objPHPExcel->getActiveSheet()->setCellValue($column, $v1); 
			}
		}
 
		$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
 
		$objWorksheet = $objPHPExcel->getActiveSheet();
		$objWorksheet->getStyle('B2:D2')->applyFromArray($fontHeader);
		$objWorksheet->getStyle('B2:'.$column)->applyFromArray($styleArray);
 
		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
		$filename = urlencode("L_Masuk".date('Y-m-d H-i-s').".xlsx");
		header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition:inline;filename="'.$filename.'"');
		$objWriter->save('php://output');		
		//$objWriter->save("test_".date('Y-m-d H-i-s').".xlsx");*/
	}
	
	
}
?>