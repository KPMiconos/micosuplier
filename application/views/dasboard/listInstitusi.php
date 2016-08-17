  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            List Institusi
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Customer</a></li>
            <li class="active">List Institusi</li>
          </ol>
        </section>
      
        <!-- Main content -->
        <section class="content">
         
          <div class="row">
            <div class="col-xs-12 col-lg-10">
              <div class="box">
                <div class="box-header">
                 <a href="<?php echo base_url() ?>customer/addInstitusi"><i class="fa fa-user-plus fa-lg"></i> <strong><h2 class="box-title">Add</h2></strong></a>
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
                      <th>No.ID</th>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>No.Telephone</th>
                      <th>Alamat</th>
					  <th>Action</th>
                    </tr>
					<?php
							if(!empty($isi)){
							foreach($isi as $baris){ ?>
                    <tr>
                      <td><a href="<?php echo base_url(),"admin/viewInstitusi/",$baris->id_institusi?>"><?php echo $baris->id_institusi?></a></td>
                      <td><?php echo $baris->nama_institusi?></td>
                      <td><?php echo $baris->email?></td>
                      <td><?php echo $baris->telephone_institusi?></td>
                      <td><?php echo $baris->alamat_institusi?></td>
					  <td>
					   <div class="btn-group btn-group-lg">
					   <a href="<?php echo base_url(),"admin/deleteInstitusi/",$baris->id_institusi?>"><li class="fa  fa-trash btn btn-primary pull-right" data-toggle="tooltip" data-placement="top" title="Delete"></li></a>
						<a style="cursor: pointer;" data-toggle="modal" data-target="#myModal<?php echo $baris->id_institusi ?>"><li class="fa fa-pencil-square-o btn btn-primary pull-right " data-toggle="tooltip" data-placement="top" title="Edit"></li></a>
						<a href="<?php echo base_url(),"admin/viewInstitusi/",$baris->id_institusi?>"><li class="fa fa-eye btn btn-primary pull-right" data-toggle="tooltip" data-placement="top" title="View"></li></a>
						
						</div>
					</td>
					<!-- Modal -->
					<div class="modal fade" id="myModal<?php echo $baris->id_institusi ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					  <div class="modal-dialog" role="document">
						<div class="modal-content">
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">Edit Data Institusi</h4>
						  </div>
						  <div class="modal-body">
						   <form role="form" action="<?php echo base_url() ?>admin/updatePetugas" method="post" enctype="multipart/form-data">
							  <div class="box-body">
								<div class="form-group">
								  <label for="exampleInputEmail1">No.ID</label>
								  <input name="ktp" type="text" class="form-control" id="exampleInput" placeholder="Nomor KTP" value="<?php echo $baris->id_institusi ?>" required>
								</div>
								<div class="form-group">
								  <label for="exampleInputEmail1">Nama</label>
								  <input name="nama" type="text" class="form-control" id="exampleInput" placeholder="Nama Lengkap" value="<?php echo $baris->nama_institusi ?>" required>
								</div>
								
								<div class="form-group">
								  <label for="exampleInputPassword1">Alamat</label>
								  <input name="alamat" type="text" class="form-control" id="exampleInput" placeholder="Alamat" value="<?php echo $baris->alamat_institusi ?>" required>
								</div>
								 <div class="form-group">
								  <label for="exampleInputEmail1">No.Telephone</label>
								  <input name="hp" type="text" class="form-control" id="exampleInput" placeholder="Nomor HP/Telephone" value="<?php echo $baris->telephone_institusi ?>" required>
								</div>
								 <div class="form-group">
								  <label for="exampleInputEmail1">Email</label>
								  <input name="email" type="email" class="form-control" id="exampleInput" placeholder="Email" value="<?php echo $baris->email ?>" required>
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
     