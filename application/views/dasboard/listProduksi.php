  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            List Produksi
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Produksi</a></li>
            <li class="active">List Produksi</li>
          </ol>
        </section>
      
        <!-- Main content -->
        <section class="content">
         
          <div class="row">
            <div class="col-xs-12 col-lg-10">
              <div class="box">
                <div class="box-header">
                 <a href="<?php echo base_url() ?>produksi/addProduksi"><i class="fa fa-user-plus fa-lg"></i> <strong><h2 class="box-title">Add</h2></strong></a>
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
                      <th>No.Produksi</th>
					  <th>Tanggal</th>
                      <th>Creator</th>
					  <th>Produk</th>
					  <th>Jumlah</th>
					  <th>Biaya</th>
                      <th>Status</th>
					  <th>Action</th>
                    </tr>
					<?php
							if(!empty($isi)){
							foreach($isi as $baris){ ?>
                    <tr>
                      <td><a href="#"><?php echo $baris->id_produksi?></a></td>
					  <td><?php echo $baris->tanggal_po?></td>
                      <td><?php echo $baris->nama_petugas?></td>
					  <td><?php echo $baris->nama_item?></td>
					  <td><?php echo $baris->jumlah_item?></td>
					  <td>Rp <?php echo $baris->totalHarga?></td>
                      <td><span class="label label-success"><?php 
							if($baris->status=="1"){
								echo "Processing";
							}else if($baris->status=="2"){
								echo "Completed";
							}
					  ?></span></td>
                      
					  <td>
					   <div class="btn-group btn-group-lg">
					   <a href="<?php echo base_url(),"pembelian/deletePetugas/",$baris->id_produksi?>"><li class="fa  fa-trash btn btn-primary pull-right" data-toggle="tooltip" data-placement="top" title="Delete"></li></a>
						<a style="cursor: pointer;" data-toggle="modal" data-target="#myModal<?php echo $baris->id_produksi ?>"><li class="fa fa-pencil-square-o btn btn-primary pull-right " data-toggle="tooltip" data-placement="top" title="Edit"></li></a>
						<a href="<?php echo base_url(),"pembelian/viewPetugas/",$baris->id_produksi?>"><li class="fa fa-eye btn btn-primary pull-right" data-toggle="tooltip" data-placement="top" title="View"></li></a>
						
						</div>
					</td>
					</tr>
						  
				
            
                   
					<?php }}
								else{
									echo "Belum ada data";
								}

							?>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
     