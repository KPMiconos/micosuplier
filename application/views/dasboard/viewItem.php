 <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Detail Barang 
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Master Item</a></li>
            <li class="active">Detail Item</li>
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
                  <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url(),"assets/images/produk/",$baris->link_photo ?>" alt="item picture">
                  <h3 class="profile-username text-center"><?php echo $baris->nama_item ?></h3>
				  
                  

                  <ul class="list-group list-group-unbordered">
                   <li class="list-group-item">
                      <b>Jenis Barang</b> <a class="pull-right"><?php echo $baris->nama_tipe_item ?></a>
                    </li>
					
                  </ul>

                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->

             </div><!-- /.col -->
            <div class="col-md-9">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#activity" data-toggle="tab">Detail</a></li>

                </ul>
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
					 <div class="form-horizontal">
					 <div class="form-group">
                         <p class="col-sm-2 pull-left" style="margin-left:20px;"><strong>ID.Produk</strong></p>
                        <p class="col-sm-6 pull-left">: <?php echo $baris->id_item ?></p>
                      </div>
                      <div class="form-group">
                         <p class="col-sm-2 pull-left" style="margin-left:20px;"><strong>Jenis Barang</strong></p>
                        <p class="col-sm-6 pull-left">: <?php echo $baris->nama_tipe_item ?></p>
                      </div>
                      <div class="form-group">
                         <p class="col-sm-2 pull-left" style="margin-left:20px;"><strong>Satuan</strong></p>
                        <p class="col-sm-6 pull-left">: <?php echo $baris->nama_satuan ?></p>
                      </div>
                      <div class="form-group">
                         <p class="col-sm-2 pull-left" style="margin-left:20px;"><strong>Deskripsi</strong></p>
                        <p class="col-sm-6 pull-left">: <?php echo $baris->deskripsi ?></p>
                      </div>
					<div class="box-footer">
						<button data-toggle="modal" data-target="#myModal1" class="btn btn-primary"
						<?php if($this->session->userdata('tamu')){
								echo "disabled";
							}?>
						>Edit</button>
					</div> 
                    </div>
					<!-- Modal -->
					<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					  <div class="modal-dialog" role="document">
						<div class="modal-content">
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">Edit Data Item</h4>
						  </div>
						  <div class="modal-body">
						   <form role="form" action="<?php echo base_url() ?>produk/updateItem" method="post" enctype="multipart/form-data">
							  <div class="box-body">
							  
								<div class="form-group">
								  <label for="exampleInputEmail1">ID.Item</label>
								  <input name="ktp" type="text" class="form-control" id="exampleInput" placeholder="Nomor KTP" value="<?php echo $baris->id_item ?>" disabled>
								  <input name="idItem" type="hidden" value="<?php echo $baris->id_item ?>">
								</div>
								<div class="form-group">
								  <label for="exampleInputEmail1">Nama Item</label>
								  <input name="nama" type="text" class="form-control" id="exampleInput" placeholder="Nama Lengkap" value="<?php echo $baris->nama_item ?>" required>
								</div>
								
								<div class="form-group">
									<label>Satuan</label>
									<select name="satuan" class="form-control selecttree" style="width: 100%;" required>
									  <option>-Pilih</option>
									  <?php if(!empty($satuan)){
										  foreach($satuan as $baris1){s
										 ?>
									  <option <?php if($baris->satuan==$baris1->id_satuan){
										  echo "selected";
									  } ?> value="<?php echo $baris1->id_satuan; ?>"><?php echo $baris1->nama_satuan; ?></option>
										  <?php } }else{
											  echo "Data kosong";
										  }?>
									  
									</select>
								</div>
								<div class="form-group">
									<label>Tipe</label>
									<select name="tipe" class="form-control selecttree" style="width: 100%;" required>
									  <option>-Pilih</option>
									  <?php if(!empty($tipe)){
										  foreach($tipe as $baris2){s
										 ?>
									  <option <?php if($baris->tipe==$baris2->id_tipe_item){
										  echo "selected";
									  } ?> value="<?php echo $baris2->id_tipe_item; ?>"><?php echo $baris2->nama_tipe_item; ?></option>
										  <?php } }else{
											  echo "Data kosong";
										  }?>
									  
									</select>
								</div>
								 <div class="form-group">
								  <label for="exampleInputEmail1">Deskripsi</label>
								  <input name="deskripsi" type="text" class="form-control" id="exampleInput" placeholder="Email" value="<?php echo $baris->deskripsi ?>" required>
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
    