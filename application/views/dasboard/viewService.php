 <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Read Service
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			 <li><a href="#"><i ></i> Service</a></li>
            <li class="active">Read Service</li>
          </ol>
        </section>

         <!-- Main content -->
        <section class="content">
		
          <div class="row">
            
			<?php  	if(!empty($isi)){
							foreach($isi as $baris){  ?>
              
            <div class="col-md-9">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#about" data-toggle="tab">About</a></li>
                  <li><a href="#produk" data-toggle="tab">Penggunaan Produk</a></li>
				  <li><a href="#solving" data-toggle="tab">Penyelesaian</a></li>
                  
                </ul>
                <div class="tab-content">
                  <div class="active tab-pane" id="about">
					 <div class="form-horizontal">
						  <div class="form-group">
							 <p class="col-sm-2 pull-left" style="margin-left:20px;"><strong>Id.Service</strong></p>
							<p class="col-sm-6 pull-left">: <?php echo "Service#",$baris->id_service ?></p>
						  </div>
						   <div class="form-group">
							 <p class="col-sm-2 pull-left" style="margin-left:20px;"><strong>Creator</strong></p>
							<p class="col-sm-6 pull-left">: <?php echo $baris->nama_petugas ?></p>
						  </div>
						  <div class="form-group">
							 <p class="col-sm-2 pull-left" style="margin-left:20px;"><strong>Customer</strong></p>
							<p class="col-sm-6 pull-left">: <?php echo $baris->nama_customer ?></p>
						  </div>
						  <div class="form-group">
							 <p class="col-sm-2 pull-left" style="margin-left:20px;"><strong>Tanggal</strong></p>
							<p class="col-sm-6 pull-left">: <?php echo $baris->tgl_open ?></p>
						  </div>
						  <div class="form-group">
							 <p class="col-sm-2 pull-left" style="margin-left:20px;"><strong>Keluhan</strong></p>
							<p class="col-sm-6 pull-left">: <?php echo $baris->subject ?></p>
						  </div>
						  <div class="form-group">
							 <p class="col-sm-2 pull-left" style="margin-left:20px;"><strong>Detail</strong></p>
							<p class="col-sm-6 pull-left">: <?php echo $baris->keluhan ?></p>
						  </div>
						   <div class="form-group">
							 <p class="col-sm-2 pull-left" style="margin-left:20px;"><strong>Status</strong></p>
							<p class="col-sm-6 pull-left">: <?php if($baris->status==1){
								echo "Open";
							} ?></p>
						  </div>
						 
						<div class="box-footer">
							<button data-toggle="modal" data-target="#myModal1" class="btn btn-primary">Edit</button>
						</div>
                      
                    </div>
					 <?php if($this->session->flashdata('pesan')){
					  echo $this->session->flashdata('pesan');
				  } ?>
					
                 <?php }}else{
			echo "data tidak ada";
		} ?>

                 </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="produk">
                    <!-- The timeline -->
						 <div class="box">
                <div class="box-header" style="padding:20px;">
				  <div class="row">
					<div class="co-lg-12">
                   
					
					 </div>
                  </div>
                  <div class="box-tools">
				  <form method="post" action="#" enctype="multipart/form-data">
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
                      <th>ID</th>
					   <th>Gambar</th>
                      <th>Nama Produk</th>
                      <th>Satuan</th>
					  <th>Harga</th>
                      <th>Jumlah</th>
                    
                    </tr>
					<?php
							if(!empty($produk)){
							foreach($produk as $baris2){ ?>
                    <tr>
                      <td><?php echo $baris2->id_item ?></td>
					  <td><img style="width:50px; hight:50px;" src="<?php echo base_url() ?>assets/images/produk/<?php echo $baris2->link_photo ?>"></td>
                      <td><?php echo $baris2->nama_item ?></td>
                      <td><?php 
						echo $baris2->nama_satuan;
					  ?></td>
					  <td><?php if (empty($baris2->jumlah)){
							echo "-";
						}else {
							echo "Rp ",$baris2->harga;
						} ?></td>
                      <td><?php 
						if (empty($baris2->jumlah)){
							echo "<span class='label label-danger'>Stok kosong</span>";
						}else {
							echo $baris2->jumlah," item";
						}?> </td>
                     
                    </tr>
                  
                   
					<?php }}
						else{
							echo "Belum ada data Produk";
							}
					?>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
			  
          
					</div><!-- /.tab-pane -->
				 <div class="active tab-pane" id="solving">
					 <div class="form-horizontal">
					 <?php
							if(!empty($solving)){
							foreach($solving as $baris){ ?>
						 
						   <div class="form-group">
							 <p class="col-sm-2 pull-left" style="margin-left:20px;"><strong>Teknisi</strong></p>
							<p class="col-sm-6 pull-left">: <?php echo $baris->nama_petugas ?></p>
						  </div>
						  
						  <div class="form-group">
							 <p class="col-sm-2 pull-left" style="margin-left:20px;"><strong>Tanggal</strong></p>
							<p class="col-sm-6 pull-left">: <?php echo $baris->tgl_solved ?></p>
						  </div>
						 
						  <div class="form-group">
							 <p class="col-sm-2 pull-left" style="margin-left:20px;"><strong>Penyelesaian</strong></p>
							<p class="col-sm-6 pull-left">: <?php echo $baris->penyelesaian ?></p>
						  </div>
						   <div class="form-group">
							 <p class="col-sm-2 pull-left" style="margin-left:20px;"><strong>Status</strong></p>
							<p class="col-sm-6 pull-left">: <?php if($baris->status==1){
								echo "Open";
							}else if($baris->status==2){
								echo "On Going";
							}else if($baris->status==3){
								echo "Selesai";
							} ?></p>
						  </div>
						 
						<div class="box-footer">
							<button data-toggle="modal" data-target="#myModal1" class="btn btn-primary">Edit</button>
						</div>
						<?php }}
						else{
							echo "Belum ada data";
							}
					?>
                      
                    </div>
					 
					
                

                 </div><!-- /.tab-pane -->
				</div><!-- /.tab-content -->
              </div><!-- /.nav-tabs-custom -->
            </div><!-- /.col -->
          </div><!-- /.row -->
				
        </section><!-- /.content -->
     </div><!-- /.content-wrapper -->
     