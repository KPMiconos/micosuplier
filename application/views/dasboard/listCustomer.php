  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            List Customer
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Customer</a></li>
            <li class="active">List Customer</li>
          </ol>
        </section>
      
        <!-- Main content -->
        <section class="content">
         
          <div class="row">
            <div class="col-xs-12 col-lg-12">
              <div class="box">
                <div class="box-header">
					<a href="<?php echo base_url() ?>customer/addCustomer"><i class="fa fa-plus"></i> <h3 class="box-title">Add</h3></a>
                  <div class="box-tools">
                    <form method="post" action="<?php echo base_url() ?>customer/cariCustomer" enctype="multipart/form-data">
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
                      <th>Nama</th>
                      <th>Email</th>
                      <th>No.Hp</th>
                      <th>Jabatan</th>
					  <th>Action</th>
                    </tr>
					<?php
							if(!empty($isi)){
							foreach($isi as $baris){ ?>
                    <tr>
                      <td><a href="<?php echo base_url(),"customer/viewCustomer/",$baris->id_customer  ?>"><?php echo $baris->id_customer  ?></a></td>
                      <td><?php echo $baris->nama  ?></td>
                      <td><?php echo $baris->email  ?></td>
                      <td><?php echo $baris->hp  ?></td>
                      <td><?php echo $baris->jabatan  ?></td>
					  <td style="width:150px">
					   <div class="btn-group">
					   
					   <a href="<?php echo base_url(),"customer/viewCustomer/",$baris->id_customer?>">
							<button class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="View">
								<li class="fa fa-eye" >
								</li>
							</button>
						</a>
						<a style="cursor: pointer;" data-toggle="modal" data-target="#myModal<?php echo $baris->id_customer ?>">
							<button class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Edit"
							<?php if($this->session->userdata('tamu')){
								echo "disabled";
							}?>
							>
							
								<li class="fa fa-pencil-square-o" >
								</li>
							</button>
						</a>
						<a href="<?php echo base_url(),"customer/deleteCustomer/",$baris->id_customer?>" onclick="return confirm('Anda yakin ingin menghapus data ini?')">
							<button class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Delete"
							<?php if($this->session->userdata('tamu')){
								echo "disabled";
							}?>
							>
							
								<li class="fa  fa-trash" >
								</li>
							</button>
					   </a>
						
						</div>
					  </td>
                    </tr>
					
					<!-- Modal -->
					<div class="modal fade" id="myModal<?php echo $baris->id_customer ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					  <div class="modal-dialog" role="document">
						<div class="modal-content">
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">Edit List Customer</h4>
						  </div>
						  <div class="modal-body">
						   <!-- form start -->
							<form role="form" action="<?php echo base_url() ?>customer/updateCustomer" method="post" enctype="multipart/form-data">
                  <div class="box-body">
					 <div class="form-group">
									<label>Institusi</label>
									<select name="idInstitut" class="form-control selecttree" style="width: 100%;">
									  <option>-Pilih</option>
									  <?php  	if(!empty($institusi)){
									foreach($institusi as $baris2){  ?>
									  <option value="<?php echo $baris2->id_institusi ?>" <?php if($baris2->nama_institusi==$baris->nama_institusi) echo "selected" ?> ><?php echo $baris2->nama_institusi; ?></option>
									 
									  <?php }} ?>
									</select>
					</div>
					<div class="form-group">
								  <label for="exampleInputEmail1">No.KTP</label>
								  <input name="ktp" type="text" class="form-control" id="exampleInput" placeholder="Nomor KTP" value="<?php echo $baris->id_customer ?>" disabled>
								  <input name="ktp" type="hidden" value="<?php echo $baris->id_customer ?>">
								</div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama</label>
                      <input name="nama" type="text" class="form-control" id="exampleInput" placeholder="Nama Lengkap " value="<?php echo $baris->nama ?>" required>
                    </div>
					<div class="form-group">
									<label>Jenis Kelamin</label>
									<select name="jenkel" class="form-control select2" style="width: 100%;">
									  <option>-Pilih</option>
									  <option value="L" <?php if($baris->jenkel=="L") echo "selected" ?> >Laki-laki</option>
									  <option value="P" <?php if($baris->jenkel=="P") echo "selected" ?> >Perempuan</option>
									  
									</select>
								</div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Alamat</label>
                      <input name="alamat" type="text" class="form-control" id="exampleInput" placeholder="Alamat" value="<?php echo $baris->alamat ?>" required>
                    </div>
					 <div class="form-group">
                      <label for="exampleInputEmail1">No.Telephone</label>
                      <input name="hp" type="text" class="form-control" id="exampleInput" placeholder="Nomor HP/Telephone" value="<?php echo $baris->hp ?>" required>
                    </div>
					 <div class="form-group">
                      <label for="exampleInputEmail1">Email</label>
                      <input name="email" type="email" class="form-control" id="exampleInput" placeholder="Email" value="<?php echo $baris->email ?>" required>
                    </div>
					 <div class="form-group">
                      <label for="exampleInputEmail1">Jabatan</label>
                      <input name="jabatan" type="text" class="form-control" id="exampleInput" placeholder="Jabatan" value="<?php echo $baris->jabatan ?>" required>
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
							echo "Belum ada data Customer";
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
     