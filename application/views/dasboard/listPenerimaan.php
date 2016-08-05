  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            List Penerimaan
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Penerimaan</a></li>
            <li class="active">List Penerimaan</li>
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
                      <th>No.PO</th>
                      <th>Creator</th>
                      <th>Supplier</th>
                      <th>Tanggal</th>
					  <th>Jumlah</th>
                      <th>Status</th>
					  <th>Action</th>
                    </tr>
					<?php
							if(!empty($isi)){
							foreach($isi as $baris){ ?>
                    <tr>
                      <td><a href="<?php echo base_url(),"admin/viewPetugas/",$baris->id_po?>"><?php echo $baris->id_po?></a></td>
                      <td><?php echo $baris->nama_petugas?></td>
                      <td><?php echo $baris->nama_suplier?></td>
					  <td><?php echo $baris->tanggal_po?></td>
					  <td>Rp <?php echo $baris->totalHarga?></td>
                      <td><span class="label label-success">
					  <?php 
							if($baris->status=="1"){
								echo "Ordered";
							}else if($baris->status=="2"){
								echo "Returning";
							}else if($baris->status=="3"){
								echo "Completed";
							}
					  ?></span></td>
                      
					  <td>
					   <div class="btn-group btn-group-lg">
					   <a href="<?php echo base_url(),"pembelian/deletePetugas/",$baris->id_po?>"><li class="fa  fa-trash btn btn-primary pull-right" data-toggle="tooltip" data-placement="top" title="Delete"></li></a>
						<a style="cursor: pointer;" data-toggle="modal" data-target="#myModal<?php echo $baris->nama_petugas ?>"><li class="fa fa-pencil-square-o btn btn-primary pull-right " data-toggle="tooltip" data-placement="top" title="Edit"></li></a>
						<a href="<?php echo base_url(),"gudang/viewPO/",$baris->id_po?>"><li class="fa fa-eye btn btn-primary pull-right" data-toggle="tooltip" data-placement="top" title="View"></li></a>
						
						</div>
					</td>
					<!-- Modal -->
					<div class="modal fade" id="myModal<?php echo $baris->id_po ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					  <div class="modal-dialog" role="document">
						<div class="modal-content">
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">Edit Data Petugas</h4>
						  </div>
						  <div class="modal-body">
						   <form role="form" action="<?php echo base_url() ?>admin/updatePetugas" method="post" enctype="multipart/form-data">
							  <div class="box-body">
								<div class="form-group">
								  <label for="exampleInputEmail1">No.KTP</label>
								  <input name="ktp" type="text" class="form-control" id="exampleInput" placeholder="Nomor KTP" value="<?php echo $baris->nama_petugas ?>" required>
								</div>
								<div class="form-group">
								  <label for="exampleInputEmail1">Nama</label>
								  <input name="nama" type="text" class="form-control" id="exampleInput" placeholder="Nama Lengkap" value="<?php echo $baris->nama_suplier?>" required>
								</div>
								
								<div class="form-group">
								  <label for="exampleInputPassword1">Alamat</label>
								  <input name="alamat" type="text" class="form-control" id="exampleInput" placeholder="Alamat" value="<?php echo $baris->status ?>" required>
								</div>
								 <div class="form-group">
								  <label for="exampleInputEmail1">No.Telephone</label>
								  <input name="hp" type="text" class="form-control" id="exampleInput" placeholder="Nomor HP/Telephone" value="<?php echo $baris->totalharga ?>" required>
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
     