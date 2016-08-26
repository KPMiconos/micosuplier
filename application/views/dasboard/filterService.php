  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Laporan Barang Untuk Service
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Laporan</a></li>
            <li class="active">Keluar Service</li>
          </ol>
        </section>
      
        <!-- Main content -->
        <section class="content">
         
          <div class="row">
            <div class="col-xs-12 col-lg-10">
              <div class="box">
                <div class="box-header">
                   <div class="row">
					<div class="co-lg-12">
                   <form method="post" action="<?php echo base_url(),"laporan/filterService" ?>" enctype="multipart/form-data">
				   <div class="col-lg-1">
						<label for="exampleInputEmail1">Filter</label>                   
					</div>
                    <div class="col-lg-2">
						<input name="tgl_awal" type="text" class="form-control datepicker"  placeholder="Tanggal awal" data-date-format="yyyy-mm-dd" >
                    </div>
					<div class="col-lg-2">
						<input name="tgl_akhir" type="text" class="form-control datepicker"  placeholder="Tanggal akhir" data-date-format="yyyy-mm-dd" >
                    </div>
					<div class="col-lg-1">
						 <button type="submit" class="btn btn-primary">Filter</button>
					</div>
					 </form>
					 <div class="col-lg-1">
					 <form method="post" action="<?php echo base_url(),"laporan/exportService" ?>" enctype="multipart/form-data">
					 <input name="tgl_awal" type="hidden" value="<?php echo $tgl_awal; ?>">
					 <input name="tgl_akhir" type="hidden"  value="<?php echo $tgl_akhir; ?>"> 
						 <button type="submit" class="btn btn-info"><li class="fa fa-print"></li>Print</button>
					</form>
					 </div>
                  </div>
               </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                      <th>No</th>
					   <th>ID.Transaksi</th>
					   <th>Tanggal</th>
					   <th>Teknisi</th>
					   <th>customer</th>
                      <th>Nama Barang</th>
                      <th>Satuan</th>
                      <th>Jumalah</th>
                      
					   
                    </tr>
					<?php
						$i=0;
							if(!empty($isi)){
							foreach($isi as $baris){ $i++;?>
							
                    <tr>
						<td><?php echo $i; ?></td>
                      <td><?php echo $baris->id_produkService?></td>
					  <td><?php echo $baris->tanggal?></td>
					  <td><?php echo $baris->nama_petugas?></td>
					  <td><?php echo $baris->nama_customer?></td>
                      <td><?php echo $baris->nama_item?></td>
                      <td><?php 
						echo $baris->nama_satuan;
					  ?></td>
                      <td><?php echo $baris->jumlah," item"?></td>
					
                      
					  
					  <td>
					  
					</td>
					 </tr>
					<?php }}
								else{
									?>
									
										<td>Belum ada data masuk hari ini</td>
									
									<?php }?>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
     