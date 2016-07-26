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
                  </ul>

                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
			  
			<!-- Modal -->
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Upload Photo Profile</h4>
					  </div>
					  <div class="modal-body">
					   <form action="<?php echo base_url() ?>admin/uploadImgPetugas_act" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label for="exampleInputFile">File input</label>
							<input type="hidden" name="id_petugas" value="<?php echo $baris->id_petugas ?>">
							<input name="filefoto" type="file" id="exampleInputFile">
							<p class="help-block">Besar file maksimal 1 MB, format jpg,png,gif </p>
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
 