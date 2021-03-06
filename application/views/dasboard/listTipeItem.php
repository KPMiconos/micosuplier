  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            List Tipe Item
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Master item</a></li>
            <li class="active">List Tipe Item</li>
          </ol>
        </section>
      
        <!-- Main content -->
        <section class="content">
         
          <div class="row">
            <div class="col-xs-12 col-lg-12">
              <div class="box">
                <div class="box-header">
					<a style="cursor: pointer;" data-toggle="modal" data-target="#inputTipe" ><i class="fa fa-plus"></i> <h3 class="box-title">Add</h3></a>
					
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
				<?php if($this->session->flashdata('pesan')){
					  echo $this->session->flashdata('pesan');
				  } ?>
                  <table class="table table-hover">
                    <tr>
                      <th>ID</th>
                      <th>Nama Satuan</th>
                     
                      <th>Deskripsi</th>
                      
					  <th>Action</th>
                    </tr>
					<?php
							if(!empty($isi)){
							foreach($isi as $baris){ ?>
                    <tr>
                      <td><a href="<?php echo base_url(),"produk/viewTipe/",$baris->id_tipe_item  ?>"><?php echo $baris->id_tipe_item  ?></a></td>
                      <td><?php echo $baris->nama_tipe_item  ?></td>
                      <td><?php echo $baris->deskripsi  ?></td>
                      
					  <td style="width:150px">
					   <div class="btn-group btn-group-lg">
						<a style="cursor: pointer;" data-toggle="modal" data-target="#myModal<?php echo $baris->id_tipe_item ?>">
							<button class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Edit" >
								<li class="fa fa-pencil-square-o  " >
								</li>
							</button>
						</a>
					   <a href="<?php echo base_url(),"produk/deleteTipe/",$baris->id_tipe_item?>" onclick="return confirm('Anda yakin ingin menghapus data ini?')">
						<button class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Delete">
							<li class="fa  fa-trash " >
							</li>
						</button>
						</a>
						
						
						</div>
					  </td>
                    </tr>
					
					<!-- Modal -->
					<div class="modal fade" id="myModal<?php echo $baris->id_tipe_item ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					  <div class="modal-dialog" role="document">
						<div class="modal-content">
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">Form Edit Data Satuan</h4>
						  </div>
						  <div class="modal-body">
						   <!-- form start -->
							<form role="form" action="<?php echo base_url() ?>produk/updateTipeItem" method="post" enctype="multipart/form-data">
                  <div class="box-body">
					
					<div class="form-group">
						<label for="exampleInputEmail1">Nama Tipe</label>
						<input name="id" type="hidden" value="<?php echo $baris->id_tipe_item?>">
						<input name="nama" type="text" class="form-control" value="<?php echo $baris->nama_tipe_item ?>" placeholder="Nama Satuan"  required>
					</div>
					<div class="form-group">
                      <label for="exampleInputPassword1">Deskripsi</label>
                      <input name="deskripsi" type="text" class="form-control" value="<?php echo $baris->deskripsi ?>" placeholder="Deskripsi Satuan"  required>
                    </div>
					
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
						  </div>
						  
						</div>
					  </div>
					</div>
                   
                  
					<?php }}
						else{
							echo '<div class="text-center alert-info"><strong>Belum ada data tipe item</strong></div>';
						}
					?>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
			  <div class="row">
					<div class="col-md-12 text-center">
						<?php //echo $paging; ?>
					</div>
				</div>
			  
            </div>
          </div>
		  	<!-- Modal -->
					<div class="modal fade" id="inputTipe" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					  <div class="modal-dialog" role="document">
						<div class="modal-content">
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">Form Data Satuan</h4>
						  </div>
						  <div class="modal-body">
						   <!-- form start -->
				<form role="form" action="<?php echo base_url() ?>produk/addTipeItem" method="post" enctype="multipart/form-data">
                  <div class="box-body">
					
					<div class="form-group">
								  <label for="exampleInputEmail1">Nama Satuan</label>
								  <input name="nama" type="text" class="form-control" id="exampleInput" placeholder="Nama Satuan"  required>
					</div>
					<div class="form-group">
                      <label for="exampleInputPassword1">Deskripsi</label>
                      <input name="deskripsi" type="text" class="form-control" id="exampleInput" placeholder="Deskripsi Satuan"  required>
                    </div>
					
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
						  </div>
						  
						</div>
					  </div>
					</div>
                   
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
     