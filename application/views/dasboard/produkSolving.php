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
                  <h3 class="box-title"></h3>
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
                      <th>Satuan</th>
                      <th>Harga</th>
					  <th>Jumlah</th>
                      <th>Action</th>
                    </tr>
					<?php
							if(!empty($isi)){
							foreach($isi as $baris){ ?>
					<form method="POST" action="<?php echo base_url(),"service/addCart/"?>" >
                    <tr>
                      <td><?php echo $baris->id_item ?></td>
					  <td><img style="width:50px; hight:50px;" src="<?php echo base_url() ?>assets/images/produk/<?php echo $baris->link_photo ?>"></td>
                      <td><?php echo $baris->nama_item ?></td>
                      <td> <?php 
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
					  ?></td>
                      <td>Rp <?php echo $baris->hargaSatuan ?></td>
					  <td><?php 
						if (empty($baris->jumlah)){
							echo "<span class='label label-danger'>Stok kosong</span>";
						}else {
							echo $baris->jumlah," item";
						}?> </td>
                      <td> 
					  <div>
					  <input type="hidden" name="id" value="<?php echo $baris->id_item ?>" >
						<input type="hidden" name="nama" value="<?php echo $baris->nama_item ?>" >
						<input type="hidden" name="harga" value="<?php echo $baris->hargaSatuan ?>" >
						</div>
						<?php if(!empty($baris->jumlah)){?>
					  <div class="btn-group">
					   <input name="jumlah" class="form-control pull-left" type="text"  style="width:50px" data-toggle="tooltip" data-placement="top" title="Jumlah">
					   <input class="pull-right btn btn-primary" type="submit" value="Add" >
						</div>
						<?php } ?>
					</td>
                    </tr>
                  </form>
                   
					<?php }}
						else{
							echo "Belum ada data";
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
					
					<div class="form-group">
						<label>Customer</label>
						<select name="idCustomer" class="form-control select2" style="width: 100%;">
						  <option>-Pilih</option>
						  	<?php if(!empty($customer)){
							foreach($customer as $baris){ ?>
						  <option value="<?php echo $baris->id_customer ?>"><?php echo $baris->nama ?></option>
							<?php }} ?>
						  
						</select>
					</div>
					<div class="form-group">
						<label>Teknisi</label>
						<select name="teknisi" class="form-control select2" style="width: 100%;">
						  <option>-Pilih</option>
						  	<?php if(!empty($petugas)){
							foreach($petugas as $baris){ ?>
						  <option value="<?php echo $baris->id_petugas ?>"><?php echo $baris->nama ?></option>
							<?php }} ?>
						  
						</select>
					</div>
					
					 <div class="form-group">
                      <label for="exampleInputEmail1">Kendaraan/Kurir</label>
                      <input name="kurir" type="text" class="form-control"  placeholder="Kurir " >
                    </div>
					 <div class="form-group">
                      <label for="exampleInputEmail1">Tanggal</label>
                      <input name="tgl" type="text" class="form-control datepicker"  placeholder="Tanggal input " data-date-format="yyyy-mm-dd" >
                    </div>
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
     