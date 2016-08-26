  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            List Item
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Master Item</a></li>
            <li class="active">List Item</li>
          </ol>
        </section>
      
          <!-- Main content -->
        <section class="content">
         
          <div class="row">
            <div class="col-xs-12 col-lg-12">
              <div class="box">
                <div class="box-header">
                  <a href="<?php echo base_url() ?>produk/addItem"><i class="fa fa-plus"></i> <h3 class="box-title">Add</h3></a>
                  <div class="box-tools">
				  <form method="post" action="<?php echo base_url() ?>admin/cariProduk" enctype="multipart/form-data">
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
					   <th>Gambar</th>
                      <th>Nama Produk</th>
                      <th>Tipe</th>
					  <th>Satuan</th>
                      
                      <th>Deskripsi</th>
					  
					
					  <th>Action</th>
                    </tr>
					<?php
							if(!empty($isi)){
							foreach($isi as $baris){ ?>
                    <tr>
                      <td><?php echo $baris->id_item ?></td>
					  <td><img style="width:50px; hight:50px;" src="<?php echo base_url() ?>assets/images/produk/<?php echo $baris->link_photo ?>"></td>
                      <td><?php echo $baris->nama_item ?></td>
                      <td>
					  <?php
						if($baris->tipe=="1"){
							echo "Raw";
						}else if($baris->tipe=="2"){
							echo "Semi-finish";
						}else if($baris->tipe=="3"){
							echo "Finish";
						}
						 
						?>
						</a></td>
					   <td><span class="label label-success"> 
					  <?php 
						if($baris->satuan=="1"){
							echo "Pcs";
						} else if($baris->satuan=="2"){
							echo "Kg";
						}else if($baris->satuan=="3"){
							echo "m";
						}else if($baris->satuan=="4"){
							echo "m2";
						}else if($baris->satuan=="5"){
							echo "m3";
						}
					  ?></span></td>
                    
                      <td style="width:200px;"><?php echo word_limiter($baris->deskripsi,10),"..." ?></td>
					  
					 
					  <td>
					   <div class="btn-group">
							<a href="<?php echo base_url(),"produk/viewItem/",$baris->id_item?>">
								<button class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="View">
									<li class="fa fa-eye" >
									</li>
								</button>
							</a>
							<a style="cursor: pointer;" data-toggle="modal" data-target="#myModal<?php echo $baris->id_item ?>">
								<button class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Edit"
								<?php if($this->session->userdata('tamu')){
								echo "disabled";
							}?>
								>
									<li class="fa fa-pencil-square-o" >
									</li>
								</button>
							</a>
							<a disabled href="<?php echo base_url(),"produk/delete/",$baris->id_item?>" onclick="return confirm('Anda yakin ingin menghapus data ini?')">
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
					<div class="modal fade" id="myModal<?php echo $baris->id_item ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
								  <label for="exampleInputEmail1">ID</label>
								  <input name="ktp" type="text" class="form-control"  value="<?php echo $baris->id_item ?>" disabled>
								  <input name="idItem" type="hidden"  value="<?php echo $baris->id_item?>">
								</div>
								<div class="form-group">
								  <label for="exampleInputEmail1">Nama Item</label>
								  <input name="nama" type="text" class="form-control"  placeholder="Nama LItem" value="<?php echo $baris->nama_item ?>" required>
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
								  <label >Deskripsi</label>
								   <textarea name="deskripsi" class="form-control" rows="3"  required><?php echo $baris->deskripsi ?></textarea>
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
							echo "Belum ada data Item";
							}
					?>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
          </div>
        </section><!-- /.content -->
        
      </div><!-- /.content-wrapper -->
     