  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            List Barang Rusak
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Gudang</a></li>
            <li class="active"> List Barang Rusak</li>
          </ol>
        </section>
      
        <!-- Main content -->
        <section class="content">
         
          <div class="row">
		  <section class="col-lg-10 connectedSortable">
            
              <div class="box">
                <div class="box-header">
                  <strong><h3 class="box-title"></h3></strong>
                 <div class="box-tools">
                   <form method="post" action="<?php echo base_url() ?>gudang/cariDefect" enctype="multipart/form-data">
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
                      <th>Id.Item</th>
					  <th>Nama Produk</th>
                      <th>Tipe</th>
                      <th>Satuan</th>
					  <th>Harga Satuan</th>
					  <th>Jumlah Rusak</th>
                      <th>Barang Pengganti</th>
					  <th>Action</th>
					 
                    </tr>
					<?php
							if(!empty($isi)){
							foreach($isi as $baris){ ?>
					<form method="POST" action="<?php echo base_url(),"gudang/returnDefect"?>" >
                    <tr>
                      <td><?php echo $baris->id_item ?></td>
                      <td><?php echo $baris->nama_item ?></td>
                      <td><?php echo $baris->tipe ?></a></td>
                      <td><span class="label label-success"> <?php echo $baris->satuan ?></span></td>
					  <td>@ Rp<?php echo $baris->hargaSatuan ?> </td>
					  <td><?php echo $baris->jumlah ?> item</td>
						
                      <td> 
					  <div>
					  <input name="harga" class="form-control pull-left" type="hidden" value="<?php echo $baris->hargaSatuan ?>" >
					  <input type="hidden" name="idItem" value="<?php echo $baris->id_item ?>" >
						<input type="hidden" name="idPurchasing" value="<?php echo $baris->id_purchasing ?>" >
						
						</div>
					  <div class="btn-group">
					  <?php if($baris->status=="1"){ ?>
					   <input name="jumlah" class="form-control pull-left" type="text"  style="width:50px" data-toggle="tooltip" data-placement="top" title="Jumlah barang return">
					   <input class="pull-right btn btn-primary" type="submit" value="Add" >
					  <?php }else{ echo "Returned";}?>
						</div>
					</td>
					<td>
					 <div class="btn-group btn-group-lg">
					   <a href="<?php echo base_url(),"gudang/deleteDefect/",$baris->id_purchasing?>"><li class="fa  fa-trash btn btn-primary pull-right" data-toggle="tooltip" data-placement="top" title="Delete"></li></a>
						
						</div>
					</td>
                    </tr>
                  </form>
                   
					<?php }}
						else{
							echo "Belum ada data Petugas";
							}
					?>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            
			 </section>
			   </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
     