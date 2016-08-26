  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Input Gudang
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Gudang</a></li>
            <li class="active">Input Gudang</li>
          </ol>
        </section>
      
        <!-- Main content -->
        <section class="content">
         
          <div class="row">
		  <section class="col-lg-8 connectedSortable">
            
              <div class="box">
                <div class="box-header">
                  <strong><h3 class="box-title">#<?php if($this->session->userdata('idPO')){
					  echo $this->session->userdata('idPO');
				  }else if($this->session->userdata('idPRO')){
					  echo $this->session->userdata('idPRO');
				  } ?></h3></strong>
                  <div class="box-tools">
				 
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
					  <th>Jumlah Pesanan</th>
                      <th>Barang Datang</th>
					 
                    </tr>
					<?php
							if(!empty($isi)){
							foreach($isi as $baris){ ?>
					<form method="POST" action="<?php echo base_url(),"gudang/addCart"?>" >
                    <tr>
                      <td><?php echo $baris->id_item ?></td>
                      <td><?php echo $baris->nama_item ?></td>
                      <td>
					  <?php echo $baris->nama_tipe_item?>
						</a></td>
                      <td><span class="label label-success"> 
					  <?php echo $baris->nama_satuan; ?></span></td>
					 
					  <td>@ Rp<?php echo $baris->hargaSatuan ?> </td>
					  <td><?php echo $baris->jumlah;$kode=$baris->kode; ?> item</td>
						
                      <td> 
					  <div>
					  <input name="harga" class="form-control pull-left" type="hidden" value="<?php echo $baris->hargaSatuan ?>" >
					  <input type="hidden" name="id" value="<?php echo $baris->id_item ?>" >
						<input type="hidden" name="nama" value="<?php echo $baris->nama_item ?>" >
						
						</div>
					  <div class="btn-group">
					   <input name="jumlah" class="form-control pull-left" type="text"  style="width:50px" data-toggle="tooltip" data-placement="top" title="Jumlah barang datang yg fix">
					   <input class="pull-right btn btn-primary" type="submit" value="Add" >
						</div>
					</td>
                    </tr>
                  </form>
                   
					<?php }}
						else{
							echo "Belum ada data produk";
							}
					?>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            
			 </section>
			 <?php if($kode==1){ ?>
			 <section class="col-lg-4 connectedSortable">
			
				<div class="box">
					<div class="box-header">
					<H3></H3>
					</div>
					 <div class="box-body">
					  <form method="post" action="<?php echo base_url() ?>gudang/addDataGudang">
					 <table class="table table-hover">
                    <tr>
                      
					  <th>Nama Produk</th>
                      <th>Harga</th>
					   <th>Pilihan</th>
					   
                      <input type="hidden" name="idtransaksi" value="<?php echo "REC",time()  ?>">
                    </tr>
					 <?php foreach($this->cart->contents() as $item){ ?>
					<tr>
						 <td><?php echo $item['name'],$item['id']; ?></td>
						<input type="hidden" name="id" value="<?php echo $item['id'] ?>">
						 <td>
                             <?php echo $item['qty'] ?>
							 <input type="hidden" name="jumlah" value="<?php echo $item['qty'] ?>">
                         </td>
						<td>
                            <?php echo "Rp ",$item['price'] ?>
							<input type="hidden" name="kode" value="<?php echo $kode ?>">
							<input type="hidden" name="idTran" value="<?php echo $this->session->userdata('idPO'); ?>">
						  <input type="hidden" name="harga" value="<?php echo $item['price'] ?>">
						   <input type="hidden" name="total" value="<?php echo $this->cart->total() ?>">
						    <input type="hidden" name="idSuplier" value="<?php echo $baris->id_suplier ?>">
                        </td>
						<td>
							<a href="<?php echo base_url(),"gudang/hapus/" ,$item['rowid']; ?>">Hapus</a>
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
						<label>Penerima</label>
						<select name="idPenerima" class="form-control selecttree" style="width: 100%;">
						  <option>-Pilih</option>
						  	<?php if(!empty($petugas)){
							foreach($petugas as $baris){ ?>
						  <option value="<?php echo $baris->id_petugas ?>"><?php echo $baris->nama ?></option>
							<?php }} ?>
						  
						</select>
					</div>
					
					 <div class="form-group">
                      <label for="exampleInputEmail1">Kurir</label>
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
			 <?php }else if($kode==2){?>
				 <section class="col-lg-4 connectedSortable">
			
				<div class="box">
					<div class="box-header">
					<H3></H3>
					</div>
					 <div class="box-body">
					  <form method="post" action="<?php echo base_url() ?>gudang/addDataGudang">
					 <table class="table table-hover">
                    <tr>
                      
					  <th>Nama Produk</th>
                      <th>Harga</th>
					   <th>Pilihan</th>
					   
                      <input type="hidden" name="idtransaksi" value="<?php echo "REC",time()  ?>">
                    </tr>
					 <?php foreach($this->cart->contents() as $item){ ?>
					<tr>
						 <td><?php echo $item['name'],$item['id']; ?></td>
						<input type="hidden" name="id" value="<?php echo $item['id'] ?>">
						 <td>
                             <?php echo $item['qty'] ?>
							 <input type="hidden" name="jumlah" value="<?php echo $item['qty'] ?>">
                         </td>
						<td>
                            <?php echo "Rp ",$item['price'] ?>
							<input type="hidden" name="kode" value="<?php echo $kode ?>">
							
						  <input type="hidden" name="harga" value="<?php echo $item['price'] ?>">
						   <input type="hidden" name="total" value="<?php echo $this->cart->total() ?>">
						    <input type="hidden" name="idSuplier" value="<?php echo $baris->id_suplier ?>">
                        </td>
						<td>
							<a href="<?php echo base_url(),"gudang/hapus/" ,$item['rowid']; ?>">Hapus</a>
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
						<label>Penerima</label>
						<select name="idPenerima" class="form-control selecttree" style="width: 100%;">
						  <option>-Pilih</option>
						  	<?php if(!empty($petugas)){
							foreach($petugas as $baris){ ?>
						  <option value="<?php echo $baris->id_petugas ?>"><?php echo $baris->nama ?></option>
							<?php }} ?>
						  
						</select>
					</div>
					
					<input type="hidden" name="idTran" value="<?php echo $this->session->userdata('idPRO'); ?>">
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
			 <?php }?>
		  </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
     