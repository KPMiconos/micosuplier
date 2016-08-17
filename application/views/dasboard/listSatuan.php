  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            List Satuan
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Master item</a></li>
            <li class="active">List Satuan</li>
          </ol>
        </section>
      
        <!-- Main content -->
        <section class="content">
         
          <div class="row">
            <div class="col-xs-12 col-lg-12">
              <div class="box">
                <div class="box-header">
					<a style="cursor: pointer;" data-toggle="modal" data-target="#inputSatuan" ><i class="fa fa-plus"></i> <h3 class="box-title">Add</h3></a>
					
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
                      <th>Nama Satuan</th>
                      <th>Kelas Satuan</th>
                      <th>Deskripsi</th>
                      
					  <th>Action</th>
                    </tr>
					<?php
							if(!empty($isi)){
							foreach($isi as $baris){ ?>
                    <tr>
                      <td><a href="<?php echo base_url(),"customer/viewCustomer/",$baris->id_satuan  ?>"><?php echo $baris->id_satuan  ?></a></td>
                      <td><?php echo $baris->nama_satuan  ?></td>
                      <td><?php echo $baris->kelompok_satuan  ?></td>
                      <td><?php echo $baris->deskripsi_satuan  ?></td>
                      
					  <td style="width:150px">
					   <div class="btn-group btn-group-lg">
					   <a href="<?php echo base_url(),"gudang/deleteSatuan/",$baris->id_satuan?>" onclick="return confirm('Anda yakin ingin menghapus data ini?')"><li class="fa  fa-trash btn btn-primary pull-right" data-toggle="tooltip" data-placement="top" title="Delete"></li></a>
						<a style="cursor: pointer;" data-toggle="modal" data-target="#myModal<?php echo $baris->id_satuan ?>"><li class="fa fa-pencil-square-o btn btn-primary pull-right " data-toggle="tooltip" data-placement="top" title="Edit"></li></a>
						<a href="<?php echo base_url(),"gudang/viewCustomer/",$baris->id_satuan?>"><li class="fa fa-eye btn btn-primary pull-right" data-toggle="tooltip" data-placement="top" title="View"></li></a>
						
						</div>
					  </td>
                    </tr>
					
					<!-- Modal -->
					<div class="modal fade" id="myModal<?php echo $baris->id_satuan ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					  <div class="modal-dialog" role="document">
						<div class="modal-content">
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">Form Data Satuan</h4>
						  </div>
						  <div class="modal-body">
						   <!-- form start -->
							<form role="form" action="<?php echo base_url() ?>gudang/addSatuan" method="post" enctype="multipart/form-data">
                  <div class="box-body">
					
					<div class="form-group">
								  <label for="exampleInputEmail1">Nama Satuan</label>
								  <input name="nama" type="text" class="form-control" id="exampleInput" placeholder="Nama Satuan"  required>
					</div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Kelas</label>
                      <input name="kelas" type="text" class="form-control" id="exampleInput" placeholder="Kelas Satuan"  required>
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
                   
                  
					<?php }}
						else{
							echo '<div class="text-center alert-info"><strong>Belum ada data Satuan</strong></div>';
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
					<div class="modal fade" id="inputSatuan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					  <div class="modal-dialog" role="document">
						<div class="modal-content">
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">Form Data Satuan</h4>
						  </div>
						  <div class="modal-body">
						   <!-- form start -->
							<form role="form" action="<?php echo base_url() ?>gudang/addSatuan" method="post" enctype="multipart/form-data">
                  <div class="box-body">
					
					<div class="form-group">
								  <label for="exampleInputEmail1">Nama Satuan</label>
								  <input name="nama" type="text" class="form-control" id="exampleInput" placeholder="Nama Satuan"  required>
					</div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Kelas</label>
                      <input name="kelas" type="text" class="form-control" id="exampleInput" placeholder="Kelas Satuan"  required>
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
     