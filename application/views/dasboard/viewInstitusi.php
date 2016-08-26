 <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Profile Customer 
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Customer</a></li>
            <li class="active">Profile Customer</li>
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
                  <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url(),"assets/images/default/institusi.png"?>" alt="profile picture">
                  <h3 class="profile-username text-center"><?php echo $baris->nama_institusi ?></h3>
				  
                  

                  <ul class="list-group list-group-unbordered">
                   	<li class="list-group-item">
                      <b>Registered</b> <a class="pull-right"><?php echo $baris->tgl_registrasi ?></a>
                    </li>
                  </ul>

                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->

             </div><!-- /.col -->
            <div class="col-md-9">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#activity" data-toggle="tab">About</a></li>
				  <li><a href="#riwayat" data-toggle="tab">Anggota</a></li>
                  
                  
                </ul>
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
					 <div class="form-horizontal">
					 <div class="form-group">
                         <p class="col-sm-2 pull-left" style="margin-left:20px;"><strong>No.ID</strong></p>
                        <p class="col-sm-6 pull-left">: <?php echo $baris->id_institusi ?></p>
                      </div>
					 
                      <div class="form-group">
                         <p class="col-sm-2 pull-left" style="margin-left:20px;"><strong>Alamat</strong></p>
                        <p class="col-sm-6 pull-left">: <?php echo $baris->alamat_institusi ?></p>
                      </div>
                      <div class="form-group">
                         <p class="col-sm-2 pull-left" style="margin-left:20px;"><strong>HP/Telepon</strong></p>
                        <p class="col-sm-6 pull-left">: <?php echo $baris->telephone_institusi ?></p>
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
					<!-- Modal -->
					<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					  <div class="modal-dialog" role="document">
						<div class="modal-content">
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">Edit Data Institusi</h4>
						  </div>
						  <div class="modal-body">
						   <form role="form" action="<?php echo base_url() ?>customer/updateInstitusi" method="post" enctype="multipart/form-data">
							  <div class="box-body">
							  
								<div class="form-group">
								  <label for="exampleInputEmail1">Id.Institusi</label>
								  <input name="id" type="text" class="form-control" id="exampleInput" placeholder="Id Institusi" value="<?php echo $baris->id_institusi ?>" disabled>
								  <input type="hidden" name="id" value="<?php echo $baris->id_institusi; ?>">
								</div>
								<div class="form-group">
								  <label for="exampleInputEmail1">Nama Institusi</label>
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
                
                 <?php }}else{
			echo "data tidak ada";
		} ?>
                 </div><!-- /.tab-pane -->
				 <div class="tab-pane" id="riwayat">
                    <!-- The timeline -->
						 <div class="box">
                <div class="box-header" style="padding:20px;">
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
                      <th>Nama</th>
                      <th>alamat</th>
					  <th>No.Telp</th>
                      <th>email</th>
					  <th>Jabatan</th>
                      
                    </tr>
					<?php
							if(!empty($customer)){
							foreach($customer as $baris){ ?>
                    <tr>
                      <td><?php echo $baris->id_customer ?></td>

                      <td><a href="<?php echo base_url()."customer/viewCustomer/",$baris->id_customer; ?>"><?php echo $baris->nama ?></a></td>
                     <td><?php echo $baris->alamat ?></td>
					 <td><?php echo $baris->hp ?></td>
                      <td><?php echo $baris->email?></td>
					   <td><?php echo $baris->jabatan?></td>
                      
                    </tr>
                  
                   
					<?php }}
						else{
							echo "Belum ada data";
							}
					?>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
          
					</div><!-- /.tab-pane -->
				
                </div><!-- /.tab-content -->
              </div><!-- /.nav-tabs-custom -->
            </div><!-- /.col -->
          </div><!-- /.row -->
				
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
    