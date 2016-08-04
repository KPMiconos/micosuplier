  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Add Produk Solving
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Service</a></li>
            <li class="active">Add Produk Solving</li>
          </ol>
        </section>
      
        <!-- Main content -->
        <section class="content">
         
          <div class="row">
		  <section class="col-lg-8 connectedSortable">
            
              <div class="box">
                <div class="box-header">
                  <a href="<?php echo base_url() ?>service/addProduk"><i class="fa fa-plus"></i> <h3 class="box-title">Add</h3></a>
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
                      <th>Action</th>
                    </tr>
					<?php
							if(!empty($isi)){
							foreach($isi as $baris){ ?>
					<form method="POST" action="<?php echo base_url(),"service/addCart/"?>" >
                    <tr>
                      <td><?php echo $baris->id_produk ?></td>
					  <td><img style="width:50px; hight:50px;" src="<?php echo base_url() ?>assets/images/produk/<?php echo $baris->image_link ?>"></td>
                      <td><?php echo $baris->nama_produk ?></td>
                      <td><a href="<?php echo base_url(),"admin/viewSuplier/", $baris->id_suplier ?>"><?php echo $baris->nama_suplier ?></a></td>
                      <td><span class="label label-success">Rp <?php echo $baris->harga ?></span></td>
                      <td> 
					  <div>
					  <input type="hidden" name="id" value="<?php echo $baris->id_produk ?>" >
						<input type="hidden" name="nama" value="<?php echo $baris->nama_produk ?>" >
						<input type="hidden" name="harga" value="<?php echo $baris->harga ?>" >
						</div>
					  <div class="btn-group">
					   <input name="jumlah" class="form-control pull-left" type="text"  style="width:50px" data-toggle="tooltip" data-placement="top" title="Jumlah">
					   <input class="pull-right btn btn-primary" type="submit" value="Add" >
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
			 <section class="col-lg-4 connectedSortable">
			
				<div class="box">
					<div class="box-header">
					<H3>Service#<?php echo $this->session->userdata('idService');  ?></H3>
					</div>
					 <div class="box-body">
					  <form method="post" action="<?php echo base_url() ?>service/addServProduk">
					 <table class="table table-hover">
                    <tr>
                      
					  <th>Nama Produk</th>
                      <th>Harga</th>
					   <th>Pilihan</th>
					   
                      <input type="hidden" name="idService" value="<?php echo $this->session->userdata('idService');  ?>">
                    </tr>
					 <?php foreach($this->cart->contents() as $item){ ?>
					<tr>
						 <td><?php echo $item['name'] ?></td>
						<input type="hidden" name="id" value="<?php echo $item['id'] ?>">
						 <td>
                             <?php echo $item['qty'] ?>
							 <input type="hidden" name="jumlah" value="<?php echo $item['qty'] ?>">
                         </td>
						<td>
                            <?php echo "Rp ",$item['price'] ?>
						  <input type="hidden" name="harga" value="<?php echo $item['price'] ?>">
						   <input type="hidden" name="total" value="<?php echo $this->cart->total() ?>">
                        </td>
						<td>
							<a href="<?php echo base_url(),"service/hapus/" ,$item['rowid']; ?>">Hapus</a>
						</td>
						<?php } ?>
					</tr>
					 <tr>
								<td>
									
								</td>
								<td>
									Total:
								</td>
								<td>
									<?php if($this->cart->total()>0){
										echo "Rp ", $this->cart->total();
									}else{
										echo "Rp ", $this->cart->total();
									}
									
									?>
								</td>
							  </tr>
							  
					</table>
					
					
					 <div class="box-footer">
					 
                    <button type="submit" class="btn btn-primary pull-right">Submit</button>
                  </div>
					</form>
					 </div>
				</div>
				
			 
			</section>
		  </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
     