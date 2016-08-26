 <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Profile Petugas 
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Petugas</a></li>
            <li class="active">Profile Petugas</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
		
          <div class="row">
            <div class="col-md-3">
			<?php  	if(!empty($isi)){
							foreach($isi as $baris){  ?>
              <!-- Profile Image -->
              <div class="box box-primary">
                <div class="box-body box-profile">
                 <a style="cursor: pointer;" data-toggle="modal" data-target="#myModal"  > 
					<img data-toggle="tooltip" data-placement="right" title="Edit Photo Profile" class="profile-user-img img-responsive img-circle" 
					src="<?php
						if(empty($baris->photo_link)){
							echo base_url(),"assets/images/default/users.png";
						}else{
							echo base_url(),"assets/images/petugas/",$baris->photo_link;
						}
					
					
					
					
					?>" alt="User profile picture">
				</a>
                  <h3 class="profile-username text-center"><?php echo $baris->nama ?></h3>
				   <p class="text-muted text-center"><?php echo $baris->jabatan ?></p>
                  

                  <ul class="list-group list-group-unbordered">
                   
					<li class="list-group-item">
                      <b>Registered</b> <a class="pull-right"><?php echo $baris->tgl ?></a>
                    </li>
					<li class="list-group-item text-center">
                      <button class="btn btn-info btn-sm text-center" data-toggle="modal" data-target="#ubahPasswd">Rubah Password</button>
                    </li>
                  </ul>

                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
			  <!-- Modal -->
				<div class="modal fade" id="ubahPasswd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Ubah Password</h4>
					  </div>
					  <div class="modal-body">
					   <form action="<?php echo base_url() ?>petugas/ubahPassword" method="post" enctype="multipart/form-data">
						
						<div class="form-group">
							<input type="hidden" name="id_petugas" value="<?php echo $baris->id_petugas ?>">
								  <label >Password Lama</label>
								  <input name="passwdLama" type="password" class="form-control"  placeholder="Password Lama" required>
								</div>
						<div class="form-group">
								  <label for="exampleInputEmail1">Password Baru</label>
								  <input name="passwdBaru" type="password" class="form-control"  placeholder="Password Baru" required>
						</div>
						<div class="box-footer">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					   </form>
					  </div>
					  
					</div>
				  </div>
				</div>
           
			<!-- Modal -->
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Upload Photo Profile</h4>
					  </div>
					  <div class="modal-body">
					   <form action="<?php echo base_url() ?>petugas/uploadImgPetugas_act" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label for="exampleInputFile">File input</label>
							<input type="hidden" name="id_petugas" value="<?php echo $baris->id_petugas ?>">
							<input name="filefoto" type="file" id="exampleInputFile">
							<p class="help-block">Besar file maksimal 1 MB, format jpg,png,gif <?php echo $baris->id_petugas ?></p>
						</div>
						<div class="box-footer">
							<button type="submit" class="btn btn-primary">Upload</button>
						</div>
					   </form>
					  </div>
					  
					</div>
				  </div>
				</div>
             </div><!-- /.col -->
            <div class="col-md-9">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#activity" data-toggle="tab">About</a></li>
                  
                  
                </ul>
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
					 <div class="form-horizontal">
					 <div class="form-group">
                         <p class="col-sm-2 pull-left" style="margin-left:20px;"><strong>No.ID</strong></p>
                        <p class="col-sm-6 pull-left">: <?php echo $baris->id_petugas ?></p>
                      </div>
					  <div class="form-group">
                         <p class="col-sm-2 pull-left" style="margin-left:20px;"><strong>Jenis Kelamin</strong></p>
                        <p class="col-sm-6 pull-left">: <?php
								if($baris->jenkel=="L"){
									echo "Laki-laki";
								} else if($baris->jenkel=="P"){
									echo "Perempuan";
								}
								
						?></p>
                      </div>
                      <div class="form-group">
                         <p class="col-sm-2 pull-left" style="margin-left:20px;"><strong>Alamat</strong></p>
                        <p class="col-sm-6 pull-left">: <?php echo $baris->alamat ?></p>
                      </div>
                      <div class="form-group">
                         <p class="col-sm-2 pull-left" style="margin-left:20px;"><strong>HP/Telepon</strong></p>
                        <p class="col-sm-6 pull-left">: <?php echo $baris->hp ?></p>
                      </div>
                      <div class="form-group">
                         <p class="col-sm-2 pull-left" style="margin-left:20px;"><strong>Email</strong></p>
                        <p class="col-sm-6 pull-left">: <?php echo $baris->email ?></p>
                      </div>
                    <div class="box-footer">
                    <button data-toggle="modal" data-target="#myModal1" class="btn btn-primary"
					<?php if($this->session->userdata('tamu')){
								echo "disabled";
							} ?>
					>Edit</button>
					
                  </div>
                  
                      
                    </div>
					 <?php if($this->session->flashdata('pesan')){
					  echo $this->session->flashdata('pesan');
				  } ?>
				<!-- Modal -->
					<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					  <div class="modal-dialog" role="document">
						<div class="modal-content">
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">Edit Data Petugas</h4>
						  </div>
						  <div class="modal-body">
						   <form role="form" action="<?php echo base_url() ?>petugas/updatePetugas" method="post" enctype="multipart/form-data">
							  <div class="box-body">
								<div class="form-group">
								  <label for="exampleInputEmail1">No.KTP</label>
								  <input name="ktp" type="text" class="form-control" id="exampleInput" placeholder="Nomor KTP" value="<?php echo $baris->id_petugas ?>" required>
								</div>
								<div class="form-group">
								  <label for="exampleInputEmail1">Nama</label>
								  <input name="nama" type="text" class="form-control" id="exampleInput" placeholder="Nama Lengkap" value="<?php echo $baris->nama ?>" required>
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
								  <label for="exampleInputEmail1">Bagian</label>
								  <input name="bagian" type="text" class="form-control" id="exampleInput" placeholder="Bagian Pekerjaan" value="<?php echo $baris->jabatan ?>" required>
								</div>
								<div class="form-group">
								  <label for="exampleInputEmail1">Password</label>
								  <input name="passwd" type="password" class="form-control" id="exampleInput" placeholder="Password" required>
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
                   
                 <?php }}else{
			echo "data tidak ada";
		} ?>

                 </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
              </div><!-- /.nav-tabs-custom -->
            </div><!-- /.col -->
          </div><!-- /.row -->
				
        </section><!-- /.content -->
			
      </div><!-- /.content-wrapper -->
 