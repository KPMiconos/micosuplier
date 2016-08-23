  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            List Supplier
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Supplier</a></li>
            <li class="active">List Supplier</li>
          </ol>
        </section>
      
        <!-- Main content -->
        <section class="content">
         
          <div class="row">
            <div class="col-xs-12 col-lg-12">
              <div class="box">
                <div class="box-header">
                  <a href="<?php echo base_url() ?>supplier/addSupplier"><i class="fa fa-plus"></i> <h3 class="box-title">Add</h3></a>
                  <div class="box-tools">
                    <form method="post" action="<?php echo base_url() ?>supplier/cariSupplier" enctype="multipart/form-data">
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
                      <th>Nama Supplier</th>
                      <th>Email</th>
                      <th>No.Telephone</th>
                      <th>Deskripsi</th>
					  <th>Action</th>
                    </tr>
					<?php
							if(!empty($isi)){
							foreach($isi as $baris){ ?>
                    <tr>
                      <td><?php echo "SM1607",$baris->id_suplier ?></td>
                      <td><?php echo $baris->nama_suplier ?></td>
                      <td><?php echo $baris->email ?></td>
                      <td><span class="label label-success"><?php echo $baris->hp ?></span></td>
                      <td style="width:200px;"><?php echo word_limiter($baris->deskripsi,5) ?></td>
					  <td style="width:150px;">
					   <div class="btn-group btn-group-lg">
					   <a href="<?php echo base_url(),"supplier/deleteSupplier/",$baris->id_suplier ?>"><li onclick="return confirm('Anda yakin ingin menghapus data ini?')" class="fa  fa-trash btn btn-primary pull-right" data-toggle="tooltip" data-placement="top" title="Delete"></li></a>
						<a style="cursor: pointer;" data-toggle="modal" data-target="#myModal<?php echo $baris->id_suplier ?>"><li class="fa fa-pencil-square-o btn btn-primary pull-right " data-toggle="tooltip" data-placement="top" title="Edit"></li></a>
						<a href="<?php echo base_url(),"supplier/viewSupplier/",$baris->id_suplier?>"><li class="fa fa-eye btn btn-primary pull-right" data-toggle="tooltip" data-placement="top" title="View"></li></a>
						
						</div>
					  </td>
                    </tr>
					
					<!-- Modal -->
					<div class="modal fade" id="myModal<?php echo $baris->id_suplier ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					  <div class="modal-dialog" role="document">
						<div class="modal-content">
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">Edit Data Suplier</h4>
						  </div>
						  <div class="modal-body">
						   <!-- form start -->
							<form role="form" action="<?php echo base_url() ?>supplier/updateSupplier" method="post" enctype="multipart/form-data">
							  <div class="box-body">
								<div class="form-group">
								  <label for="exampleInputEmail1">No.ID</label>
								  <input name="id" type="text" class="form-control" id="exampleInput" placeholder="No.Id Suplier" value="<?php echo "SM1607",$baris->id_suplier ?>" disabled>
								  <input name="idSuplier" type="hidden" value="<?php echo $baris->id_suplier ?>">
								</div>
								<div class="form-group">
								  <label for="exampleInputEmail1">Nama</label>
								  <input name="nama" type="text" class="form-control" id="exampleInput" placeholder="Nama Suplier" value="<?php echo $baris->nama_suplier ?>" required>
								</div>
								
								<div class="form-group">
								  <label for="exampleInputPassword1">Alamat</label>
								  <input name="alamat" type="text" class="form-control" id="exampleInput" placeholder="Alamat" value="<?php echo $baris->alamat ?>" required>
								</div>
								 <div class="form-group">
								  <label for="exampleInputEmail1">No.Telephone</label>
								  <input name="hp" type="text" class="form-control" id="exampleInput" placeholder="Nomor Handphone" value="<?php echo $baris->hp ?>" required>
								</div>
								 <div class="form-group">
								  <label for="exampleInputEmail1">Email</label>
								  <input name="email" type="email" class="form-control" id="exampleInput" placeholder="Email" value="<?php echo $baris->email ?>" required>
								</div>
								<div class="form-group">
								  <label for="exampleInputEmail1">Deskripsi</label>
								   <textarea name="deskripsi" class="form-control" rows="3" placeholder="Deskripsi Suplier"  ><?php echo $baris->deskripsi ?></textarea>
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
							echo "Belum ada data Supplier";
							}
					?>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
			   <div class="row">
					<div class="col-md-12 text-center">
						<?php echo $paging; ?>
					</div>
				</div>
            </div>
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
     