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
                  <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url() ?>assets/images/default/suplier.png" alt="User profile picture">
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

                  <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

             </div><!-- /.col -->
            <div class="col-md-9">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#activity" data-toggle="tab">About</a></li>
                  <li><a href="#timeline" data-toggle="tab">Produk</a></li>
                  
                </ul>
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
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
                    
                      
                    </div>
                 <?php }}else{
			echo "data tidak ada";
		} ?>

                 </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
						 <div class="box">
                <div class="box-header" style="padding:20px;">
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
                  <table class="table table-hover">
                    <tr>
                      <th>ID</th>
					   <th>Gambar</th>
                      <th>Nama Produk</th>
                      <th>Suplier</th>
                      <th>Harga</th>
                      <th>Deskripsi</th>
                    </tr>
					<?php
							if(!empty($isi)){
							foreach($produk as $baris){ ?>
                    <tr>
                      <td><?php echo $baris->id_produk ?></td>
					  <td><img src="<?php echo base_url() ?>assets/images/produk/<?php echo $baris->image_link ?>"></td>
                      <td><?php echo $baris->nama_produk ?></td>
                      <td><a href="<?php echo base_url(),"admin/viewSuplier/", $baris->id_suplier ?>"><?php echo $baris->nama_suplier ?></a></td>
                      <td><span class="label label-success">Rp <?php echo $baris->harga ?></span></td>
                      <td><?php echo word_limiter($baris->deskripsi,10),"..." ?></td>
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
    