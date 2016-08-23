 <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Suplier Profile
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Suplier</a></li>
            <li class="active">Suplier profile</li>
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
                  <img data-toggle="tooltip" data-placement="right" title="Edit Photo Profile"  class="profile-user-img img-responsive img-circle" 
				  src="
					 
					<?php
						if(empty($baris->photo_link)){
							echo base_url(),"assets/images/default/suplier.png";
						}else{
							echo base_url(),"assets/images/supplier/",$baris->photo_link;
						}
						?>"
					alt="User profile picture">
                 </a>
				  <h3 class="profile-username text-center"><?php echo $baris->nama_suplier ?></h3>
                  

                  <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                      <b>Produk</b> <a class="pull-right">1,322</a>
                    </li>
                    <li class="list-group-item">
                      <b>Penjualan</b> <a class="pull-right">543</a>
                    </li>
					<li class="list-group-item">
                      <b>Registered</b> <a class="pull-right">543</a>
                    </li>
                  </ul>

                 
                </div><!-- /.box-body -->
				
              </div><!-- /.box -->
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">Upload Photo Profile</h4>
					  </div>
					  <div class="modal-body">
						 <form action="<?php echo base_url() ?>supplier/uploadImgSuplier_act" method="post" enctype="multipart/form-data">
						 
						<div class="form-group">
							<label for="exampleInputFile">File input</label>
							
							<input name="filefoto" type="file" id="exampleInputFile">
							<p class="help-block">Besar file maksimal 1 MB, format jpg,png,gif </p>
						</div>
						<div class="box-footer">
							<button type="submit" class="btn btn-primary">Upload</button>
						</div>
						<input type="hidden" name="idSuplier" value="<?php echo $baris->id_suplier ?>">
					   </form>
					  </div>
						</div>
					</div>
				</div>
             </div><!-- /.col -->
            <div class="col-md-9">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#about" data-toggle="tab">About</a></li>
                  <li><a href="#produk" data-toggle="tab">Produk</a></li>
                  
                </ul>
                <div class="tab-content">
                  <div class="active tab-pane" id="about">
					 <div class="form-horizontal">
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
						  <div class="form-group">
							 <p class="col-sm-2 pull-left" style="margin-left:20px;"><strong>Deskripsi</strong></p>
							<p class="col-sm-6 pull-left">: <?php echo $baris->deskripsi ?></p>
						  </div>
						  <?php $idSuplier=$baris->id_suplier; ?>
						<div class="box-footer">
							<button data-toggle="modal" data-target="#myModal1" class="btn btn-primary">Edit</button>
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
                  
                 <?php }}else{
			echo "data tidak ada";
		} ?>

                 </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="produk">
                    <!-- The timeline -->
						 <div class="box">
                <div class="box-header" style="padding:20px;">
				  <div class="row">
					<div class="co-lg-12">
                   <form method="post" action="<?php echo base_url(),"supplier/tambahProduk" ?>" enctype="multipart/form-data">
				   
                     <div class="form-group">
						<label>Tambah Produk </label>
						<select name="idItem" class="form-control selecttree" style="width: 20%;" required>
							<option disabled selected value>-Pilih</option>
							
							<?php if(!empty($barang)){
							foreach($barang as $baris){ ?>
							<option value="<?php echo $baris->id_item  ?>"><?php echo $baris->nama_item; ?></option>
							<?php }} ?>
                      
						</select>
						<input type="hidden" value="<?php echo $idSuplier ?>" name="idSupplier" required>
						 <button type="submit" class="btn btn-primary">Add</button>
					</div>
					
					
					 </form>
					
					 </div>
                  </div>
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
					   <th>Gambar</th>
                      <th>Nama Produk</th>
                      <th>Satuan</th>
					  <th>Harga</th>
                      <th>Stok</th>
                      <th>Deskripsi</th>
                    </tr>
					<?php
							if(!empty($produk)){
							foreach($produk as $baris2){ ?>
                    <tr>
                      <td><?php echo $baris2->id_item ?></td>
					  <td><img style="width:50px; hight:50px;" src="<?php echo base_url() ?>assets/images/produk/<?php echo $baris2->link_photo ?>"></td>
                      <td><?php echo $baris2->nama_item ?></td>
                      <td><?php 
						echo $baris2->nama_satuan;
					  ?></td>
					  <td><?php if (empty($baris2->jumlah)){
							echo "-";
						}else {
							echo "Rp ",$baris2->hargaSatuan;
						} ?></td>
                      <td><?php 
						if (empty($baris2->jumlah)){
							echo "<span class='label label-danger'>Stok kosong</span>";
						}else {
							echo $baris2->jumlah," item";
						}?> </td>
                      <td><?php echo word_limiter($baris2->deskripsi,5),"..." ?></td>
                    </tr>
                  
                   
					<?php }}
						else{
							echo "Belum ada data Produk";
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
    
           