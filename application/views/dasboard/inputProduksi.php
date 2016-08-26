  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Add Produksi
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Produksi</a></li>
            <li class="active">Add Produksi</li>
          </ol>
        </section>
      
        <!-- Main content -->
        <section class="content">
         
          <div class="row">
            <div class="col-xs-12 col-lg-12">
              <div class="box">
                <div class="box-header">
                  <a href="<?php echo base_url() ?>produksi/addBom"><i class="fa fa-plus"></i> <h3 class="box-title">Add</h3></a>
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
                  <table id="table" class="table table-hover">
				  <thead>
                    <tr>
                      <th>ID</th>
					   <th>Gambar</th>
                      <th>Nama Produk</th>
                      <th>Tipe</th>
					  <th>Satuan</th>
                      
                      <th>Deskripsi</th>
					  
					  <th >Action</th>
					  
                    </tr>
				</thead>
				<?php
							if(!empty($isi)){
							foreach($isi as $baris){ ?>
                    <tr >
                      <td><?php echo $baris->id_item ?></td>
					  <td><img style="width:50px; hight:50px;" src="<?php echo base_url() ?>assets/images/produk/<?php echo $baris->link_photo ?>"></td>
                      <td><?php echo $baris->nama_item ?></td>
                      <td>
					  <?php
						echo $baris->nama_tipe_item
							
						?>
						</a></td>
					   <td>
					  <?php 
						echo $baris->nama_satuan;
						
					  ?></td>
                      
                      <td style="width:200px;"><?php echo word_limiter($baris->deskripsi,10),"..." ?></td>
					  
					  
					  <td>
					  <form method="post" action="<?php echo base_url(),"produksi/addBahanProduksi" ?>">
					   <div class="btn-group">
					   <input name="id_produk"  type="hidden" value="<?php echo $baris->id_item?>">
					   <input class="btn btn-primary" type="submit" value="Produksi" 
					   <?php if(!$this->session->userdata('produksi')){
								echo "disabled";
							} ?>
					   >
						</div>
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