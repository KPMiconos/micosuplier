  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            List Produk
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Produk</a></li>
            <li class="active">List Produk</li>
          </ol>
        </section>
      
        <!-- Main content -->
        <section class="content">
         
          <div class="row">
            <div class="col-xs-10 col-lg-10">
              <div class="box">
                <div class="box-header">
                  <a href="<?php echo base_url() ?>admin/addProduk"><i class="fa fa-plus"></i> <h3 class="box-title">Add</h3></a>
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
					  <th>Jumlah</th>
					  <th>Action</th>
                    </tr>
					<?php
							if(!empty($isi)){
							foreach($isi as $baris){ ?>
                    <tr>
                      <td><?php echo $baris->id_produk ?></td>
					  <td><img style="width:50px; hight:50px;" src="<?php echo base_url() ?>assets/images/produk/<?php echo $baris->image_link ?>"></td>
                      <td><?php echo $baris->nama_produk ?></td>
                      <td><a href="<?php echo base_url(),"admin/viewSuplier/", $baris->id_suplier ?>"><?php echo $baris->nama_suplier ?></a></td>
                      <td><span class="label label-success">Rp <?php echo $baris->harga ?></span></td>
                      <td><?php echo word_limiter($baris->deskripsi,10),"..." ?></td>
					  <td><?php echo $baris->jumlah ?></td>
					  <td>
					   <div class="btn-group btn-group-lg">
							<a href="#"><li class="fa  fa-trash btn btn-primary pull-right" data-toggle="tooltip" data-placement="top" title="Delete"></li></a>
							<a style="cursor: pointer;" data-toggle="modal" data-target="#myModal"><li class="fa fa-pencil-square-o btn btn-primary pull-right " data-toggle="tooltip" data-placement="top" title="Edit"></li></a>
							<a href="<?php echo base_url(),"admin/viewProduk/",$baris->id_produk?>"><li class="fa fa-eye btn btn-primary pull-right" data-toggle="tooltip" data-placement="top" title="View"></li></a>
						</div>
					  </td>
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
     