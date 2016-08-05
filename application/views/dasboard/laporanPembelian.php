  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Laporan Barang Masuk
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Laporan</a></li>
            <li class="active">Barang Masuk</li>
          </ol>
        </section>
      
        <!-- Main content -->
        <section class="content">
         
          <div class="row">
            <div class="col-xs-12 col-lg-10">
              <div class="box">
                <div class="box-header">
                 <a href="<?php echo base_url() ?>admin/addPetugas"><i class="fa fa-user-plus fa-lg"></i> <strong><h2 class="box-title">Add</h2></strong></a>
                  <div class="box-tools">
                   <form method="post" action="<?php echo base_url() ?>admin/cariPetugas" enctype="multipart/form-data">
                    <div class="input-group" style="width: 150px;">
					
                      <input type="text" name="cari" class="form-control input-sm pull-right" placeholder="Search">
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                      </div>
					
                    </div>
					 </form>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                      <th>No</th>
					   <th>ID.Transaksi</th>
					   <th>Tanggal</th>
                      <th>Nama Barang</th>
                      <th>Satuan</th>
                      <th>Jumalh</th>
                      <th>Kurir</th>
					  <th>Pengirim</th>
					   
                    </tr>
					<?php
						$i=0;
							if(!empty($isi)){
							foreach($isi as $baris){ $i++;?>
							
                    <tr>
						<td><?php echo $i; ?></td>
                      <td><?php echo $baris->id_po?></td>
					  <td><?php echo $baris->tanggal_receive?></td>
                      <td><?php echo $baris->nama_item?></td>
                      <td><?php 
						if($baris->satuan=="1"){
							echo "Pcs";
						} else if($baris->satuan=="2"){
							echo "Kg";
						}else if($baris->satuan=="3"){
							echo "m";
						}else if($baris->satuan=="4"){
							echo "m2";
						}else if($baris->satuan=="5"){
							echo "m3";
						}
					  ?></td>
                      <td><?php echo $baris->jumlah?></td>
					  <td><?php echo $baris->kurir?></td>
                      <td><?php echo $baris->nama_suplier?></td>
					 
					  <td>
					  
					</td>
					 </tr>
						  
				
            
                   
					<?php }}
								else{
									echo "Belum ada data Petugas";
								}

							?>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
     