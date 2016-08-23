  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Output Gudang
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Gudang</a></li>
            <li class="active">Output Gudang</li>
          </ol>
        </section>
      
        <!-- Main content -->
        <section class="content">
         
          <div class="row">
		  <section class="col-lg-8 connectedSortable">
            
              <div class="box">
                <div class="box-header">
                  <strong><h3 class="box-title" >#<?php echo $this->session->userdata('idSO'); ?></h3></strong>
                  <button class="btn btn-info btn-xs" data-toggle="collapse" data-target=".rinci"><li class="fa fa-list"></li>Rincian</button>
				  <div class="box-tools">
				 
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
					<tr class="collapse rinci" >
						<td></td>
						<td colspan="6">
						<table class="table" >
						
						<?php
							if(!empty($rincian)){
							foreach($rincian as $baris){ ?>
							<tr>
								<td>
									Creator
								</td>
								
								<td>
									<?php echo ": ",$baris->nama_petugas ?>
								</td>
							</tr>
							<tr>
								<td>
									Customer
								</td>
								
								<td>
									<?php echo ": ",$baris->nama_customer ?>
								</td>
							</tr>
							<tr>
								<td>
									Tanggal
								</td>
								
								<td>
									<?php echo ": ",date("d/M/Y",strtotime($baris->tanggal)) ?>
								</td>
							</tr>
							
							<tr>
								<td>
									Kurir
								</td>
								
								<td>
									<?php echo ": ",$baris->kurir ?>
								</td>
							</tr>
							<tr>
								<td>
									Total
								</td>
								
								<td>
									<?php echo ": Rp ",$baris->total ?>
								</td>
							</tr>
							<?php }}
						else{
							echo "Tidak ada data ";
							}
					?>
						</table>
						</td>
					</tr>
                    <tr>
						<th>Supplier</th>
						<th>Nama Produk</th>
						<th>Tipe</th>
						<th>Satuan</th>
						<th>Harga Satuan</th>
						<th>Jml Pesanan</th>
						<th style="width:220px">Barang Keluar</th>
					 
                    </tr>
					<?php
							if(!empty($isi)){
							foreach($isi as $baris){ ?>
					<form method="POST" action="<?php echo base_url(),"gudang/addCartKeluar"?>" >
                    <tr>
                      <td><?php echo $baris->nama_suplier ?></td>
                      <td><?php echo $baris->nama_item ?></td>
                      <td>
					  <?php echo $baris->nama_tipe_item ?>
						</a></td>
                      <td><span class="label label-success"> 
					  <?php 
						 echo $baris->nama_satuan ?></span></td>
					 
					  <td>@ Rp<?php echo $baris->harga ?> </td>
					  <td><?php echo $baris->jumlah ?> item</td>
						
                    <td> 
						<div>
						<input name="harga"  type="hidden" value="<?php echo $baris->harga ?>" >
						<input type="hidden" name="id" value="<?php echo $baris->id_item ?>" >
						<input type="hidden" name="idSuplier" value="<?php echo $baris->id_suplier ?>" >
						<input type="hidden" name="nama" value="<?php echo $baris->nama_item ?>" >	
						</div>
						<div class="btn-group pull-right">
						  <div class="btn-group">
						   <input name="jumlah" class="form-control" type="text"   style="width:70px" data-toggle="tooltip" data-placement="left" title="jml fix">
						   </div>
						   <div class="btn-group">
							   <input name="defect" class="form-control" type="text"   style="width:70px" data-toggle="tooltip" data-placement="left" title="jml rusak">
							   </div>
							   
							   <input class="btn btn-primary btn-group" type="submit" value="Add" >
							   
							
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
			 <section class="col-lg-4 connectedSortable">
			
				<div class="box">
					<div class="box-header">
					<H3></H3>
					</div>
					 <div class="box-body">
					  <form method="post" action="<?php echo base_url() ?>gudang/addDataKeluar">
					 <table class="table table-hover">
                    <tr>
                      
					  <th>Nama Produk</th>
                      <th>Jumlah</th>
					  <th>Rusak</th>
					   <th>Pilihan</th>
					   
                      <input type="hidden" name="idtransaksi" value="<?php echo $this->session->userdata('idSO')  ?>">
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
                            <?php echo $item['options']['defect']; ?>
						  <input type="hidden" name="harga" value="<?php echo $item['price'] ?>">
						   <input type="hidden" name="total" value="<?php echo $this->cart->total() ?>">
						    <input type="hidden" name="idSuplier" value="<?php echo $baris->id_suplier ?>">
                        </td>
						<td>
							<a href="<?php echo base_url(),"gudang/hapusKeluar/" ,$item['rowid']; ?>">Hapus</a>
						</td>
						<?php } ?>
					</tr>
					 <tr>
								<td>
									
								</td>
								<td>
									
								</td>
								<td>
									
								</td>
							  </tr>
							  
					</table>
					 <div class="form-group">
                      <label for="exampleInputEmail1">Tanggal</label>
                      <input name="tgl" type="text" class="form-control datepicker"  placeholder="Tanggal input " data-date-format="yyyy-mm-dd" >
                    </div>
					 <div class="box-footer">
					 
                    <button type="submit" class="btn btn-primary pull-right" onclick="return confirm('Pastikan kembali jumlah pengeluaran sesuai dengan permintaan!!!')">Submit</button>
                  </div>
					</form>
					 </div>
				</div>
				
			 
			</section>
		  </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
     