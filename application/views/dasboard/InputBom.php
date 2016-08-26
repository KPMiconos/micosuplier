  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Tambah BOM
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Produksi</a></li>
            <li class="active">Tambah BOM</li>
          </ol>
        </section>
      
        <!-- Main content -->
        <section class="content">
         
          <div class="row">
		  <section class="col-lg-8 connectedSortable">
            
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"></h3>
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
                      <th>Barcode</th>
					   <th>Gambar</th>
                      <th>Nama Produk</th>
                      <th>Tipe</th>
                      <th>Satuan</th>
                      <th>Action</th>
                    </tr>
					<?php
							if(!empty($isi)){
							foreach($isi as $baris){ ?>
					<form method="POST" action="<?php echo base_url(),"produksi/addCart"?>" >
                    <tr>
                      <td><?php echo $baris->id_item ?></td>
					  <td><img style="width:50px; hight:50px;" src="<?php echo base_url() ?>assets/images/produk/<?php echo $baris->link_photo ?>"></td>
                      <td><?php echo $baris->nama_item ?></td>
                      <td>
					  <?php
						echo $baris->nama_tipe_item;
						
						 
						?>
						</a></td>
                      <td>
					  <?php 
						echo $baris->nama_satuan;
						
					  ?></td>
					  
						
                      <td> 
					  <div>
					  <input name="harga" class="form-control pull-left" type="hidden"  >
					  <input type="hidden" name="id" value="<?php echo $baris->id_item ?>" >
						<input type="hidden" name="nama" value="<?php echo $baris->nama_item ?>" >
						
						</div>
					  <div class="btn-group">
					   <input name="jumlah" class="form-control pull-left" type="text"  style="width:50px" data-toggle="tooltip" data-placement="top" title="Jumlah">
					   <input  class="pull-right btn btn-primary" type="submit" value="Add" 
					   <?php if(!$this->session->userdata('produksi')){
								echo "disabled";
							} ?>
					   >
						</div>
					</td>
                    </tr>
                  </form>
                   
					<?php }}
						else{ ?>
							<tr><td>Belum ada data Produk</td></tr>
							<?php }
					?>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            
			 </section>
			 <section class="col-lg-4 connectedSortable">
			
				<div class="box">
					<div class="box-header">
					<H3></H3>
					<?php if($this->session->flashdata('pesan')){
					  echo $this->session->flashdata('pesan');
				  } ?>
					</div>
					 <div class="box-body">
					  <form method="post" action="<?php echo base_url() ?>produksi/addDataBom">
					 <table class="table table-hover">
                    <tr>
                      
					  <th>Nama Bahan</th>
                      <th>Jumlah</th>
					   <th>Pilihan</th>
					   
                      <input type="hidden" name="idtransaksi" value="<?php echo "PO",time()  ?>">
                    </tr>
					 <?php foreach($this->cart->contents() as $item){ ?>
					<tr>
						 <td><?php echo $item['name'],$item['id']; ?></td>
						<input type="hidden" name="id" value="<?php echo $item['id'] ?>">
						 <td>
                             <?php echo $item['qty'] ?>
							 <input type="hidden" name="jumlah" value="<?php echo $item['qty'] ?>">
                         </td>
						
                            
						  <input type="hidden" name="harga" value="<?php echo $item['price'] ?>">
						   <input type="hidden" name="total" value="<?php echo $this->cart->total() ?>">
                        
						<td>
							<a href="<?php echo base_url(),"produksi/hapus/" ,$item['rowid']; ?>">Hapus</a>
						</td>
						<?php } ?>
					</tr>
					 <tr>
					 <td>
									<?php if(empty($this->cart->contents())){
										echo "Data kosong";
									}
									
									?>
								</td>
					</tr>
							  
					</table>
						<div class="form-group">
						<label>Nama Produk</label>
						<select name="id_produk" class="form-control selecttree" style="width: 100%;" required>
						  <option disabled selected value>-Pilih</option>
						  	<?php if(!empty($produk)){
							foreach($produk as $baris){ ?>
						  <option value="<?php echo $baris->id_item ?>"><?php echo $baris->nama_item ?></option>
							<?php }} ?>
						  
						</select>
					</div>
					 <div class="box-footer">
					 
                    <button type="submit" class="btn btn-primary pull-right"
					<?php if(!$this->session->userdata('produksi')){
								echo "disabled";
							} ?>
					>Submit</button>
                  </div>
					</form>
					 </div>
				</div>
				
			 
			</section>
		  </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
     