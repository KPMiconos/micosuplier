  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            List Produksi
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Produksi</a></li>
            <li class="active">List Produksi</li>
          </ol>
        </section>
      
        <!-- Main content -->
        <section class="content">
         
          <div class="row">
            <div class="col-xs-12 col-lg-12">
              <div class="box">
                <div class="box-header">
                 <a href="<?php echo base_url() ?>produksi/addProduksi"><i class="fa fa-user-plus fa-lg"></i> <strong><h2 class="box-title">Add</h2></strong></a>
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
                      <th>No.Produksi</th>
					  <th>Tanggal</th>
                      <th>Creator</th>
					  <th>Produk</th>
					  <th>Jumlah</th>
					  <th>Biaya</th>
                      <th>Status</th>
					  <th>Action</th>
                    </tr>
					<?php
							if(!empty($isi)){
							foreach($isi as $baris){ ?>
                    <tr>
                      <td><a href="#"><?php echo $baris->id_produksi?></a></td>
					  <td><?php echo $baris->tanggal_po?></td>
                      <td><?php echo $baris->nama_petugas?></td>
					  <td><?php echo $baris->nama_item?></td>
					  <td><?php echo $baris->jumlah_item," item"?></td>
					  <td>Rp <?php echo $baris->totalHarga?></td>
                      <td><span class="label label-success"><?php 
							if($baris->status=="0"){
								echo "Draf";
							}else if($baris->status=="1"){
								echo "Meminta Bahan";
							}else if($baris->status=="2"){
								echo "Proses ambil bahan";
							}else if($baris->status=="3"){
								echo "Bahan Siap";
							}else if($baris->status=="4"){
								echo "Proses Produksi";
							}else if($baris->status=="5"){
								echo "Kirim hasil";
							}else if($baris->status=="6"){
								echo "Selesai";
							}else if($baris->status=="7"){
								echo "Cenceled";
							}
					  ?></span></td>
                      
					 <td >
						<div class="btn-group">
							<?php if($baris->status!=3){?>
							<div class="btn-group">
							
							<form method="post" action="<?php echo base_url('produksi/updateStatus'); ?>" enctype="multipart/form-data" >
								
								<input type="hidden" name="idTransaksi" value="<?php echo $baris->id_produksi; ?>">
								<input type="hidden" name="status" value="1">
								<button <?php if($baris->status!=0){
									echo "disabled";
								}
								else if(!$this->session->userdata('produksi')){
									echo "disabled";
								} 
								?> type="submit" class="btn  btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Proses Req bahan" onclick="return confirm('Anda yakin ingin akan memproses ini?')"><li class="fa fa-check-square-o"></li></button>
							</form>
							</div>
							<?php }else if($baris->status=="3"){?>
								<div class="btn-group">
							
							<form method="post" action="<?php echo base_url('produksi/updateStatus'); ?>" enctype="multipart/form-data" >
								
								<input type="hidden" name="idTransaksi" value="<?php echo $baris->id_produksi; ?>">
								<input type="hidden" name="status" value="4">
								<button  type="submit" class="btn  btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Proses Req bahan" onclick="return confirm('Anda yakin ingin akan memproses Produksi ini?')"
								<?php if(!$this->session->userdata('produksi')){
								echo "disabled";
							} ?>
								>
								<li class="fa fa-industry"></li></button>
							</form>
							</div>
							<?php } ?>
							<div class="btn-group">
								<div class="btn-group"><a data-toggle="tooltip" data-placement="top" title="Lihat rincian"><button id="viewlist<?php echo $baris->id_produksi ?>"  class="btn btn-info btn-sm" data-toggle="collapse" data-target=".row1<?php echo $baris->id_produksi; ?>"><li class="fa fa-eye" ></li></button></a></div>
								<div class="btn-group">
									<form method="post" action="<?php echo base_url('produksi/updateStatus'); ?>" enctype="multipart/form-data" >
								
										<input type="hidden" name="idTransaksi" value="<?php echo $baris->id_produksi; ?>">
										<input type="hidden" name="status" value="5">
										<button <?php if($baris->status!=4){
											echo "disabled";
										}
										else if(!$this->session->userdata('produksi')){
											echo "disabled";
										}

										?> type="submit" class="btn  btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Kirim hasil" onclick="return confirm('Anda yakin ingin mengirim hasil produksi?')"><li class="fa fa-truck"></li></button>
									</form>
								</div>
							<div class="btn-group">
							<form method="post" action="<?php echo base_url('produksi/updateStatus'); ?>" enctype="multipart/form-data" >
								
								<input type="hidden" name="idTransaksi" value="<?php echo $baris->id_produksi; ?>">
								<input type="hidden" name="status" value="7">
								<button <?php if($baris->status!=1){
									echo "disabled";
								}
								else if(!$this->session->userdata('produksi')){
									echo "disabled";
								}

								?> type="submit" class="btn  btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Batalkan produksi" onclick="return confirm('Anda yakin ingin membatalkan penjualan ini, jika sudah dibatalkan tidak dapat diproses kembali?')"><li class="fa fa-trash"></li></button>
							</form>
							</div>
							
							</div>
						</div>
						
					</td>
					</tr>
					 <tr class="collapse row1<?php echo $baris->id_produksi; ?>">
						<td></td>
						<td colspan="5">
						<div class="box table-responsive">
						<table  class="table table-hover border">
							<thead>
								<tr>
			
									<th>Nama Produk</th>
									<th>Tipe</th>
									<th>Satuan</th>
									<th>Harga</th>
									<th>Req Bahan</th>
									<th>Bahan Masuk</th>
									
								</tr>
							</thead>
							<tbody id="showdata<?php echo $baris->id_produksi ?>">
							<script type="text/javascript">
								$("#viewlist<?php echo $baris->id_produksi ?>").click(function(){
									$("#showdata<?php echo $baris->id_produksi ?>").load("<?php echo base_url(),"produksi/rincianProduksi/",$baris->id_produksi; ?>")
									
								})
							</script>
							</tbody>
						</table>
						</div>
						</td>
						
					</tr>	  
				<!-- Modal -->
					<div class="modal fade" id="myModal<?php echo $baris->id_produksi ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					  <div class="modal-dialog" role="document">
						<div class="modal-content">
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">Kirim Hasil Produksi</h4>
						  </div>
						  <div class="modal-body">
						   <form role="form" action="<?php echo base_url() ?>petugas/updatePetugas" method="post" enctype="multipart/form-data">
							  <div class="box-body">
								<div class="form-group">
								  <label for="exampleInputEmail1">ID.Produksi</label>
								  <input name="id_produksi" type="text" class="form-control"  value="<?php echo $baris->id_produksi ?>" disabled>
								</div>
								<div class="form-group">
								  <label for="exampleInputEmail1">Nama Barang</label>
								  <input name="nama" type="text" class="form-control"  value="<?php echo $baris->nama_item ?>" required disabled>
								</div>
								
								<div class="form-group">
								  <label for="exampleInputPassword1">Jumlah</label>
								  <input name="jumlah" type="text" class="form-control"  value="<?php echo $baris->jumlah_item ?>" required disabled>
								</div>
								 <div class="form-group">
								  <label for="exampleInputEmail1">Biaya Produksi@</label>
								  <input name="harga_baku" type="text" class="form-control" value="<?php echo ($baris->totalHarga/$baris->jumlah_item); ?>" disabled>
								</div>
								 <div class="form-group">
								  <label for="exampleInputEmail1">Harga Jual</label>
								  <input name="harga_jual" type="text" class="form-control"  required>
								</div>
								 <div class="form-group">
								  <label for="exampleInputEmail1">Tanggal</label>
								  <input name="tgl" type="text" class="form-control datepicker"  placeholder="Tanggal input " data-date-format="yyyy-mm-dd" required>
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
									echo "Belum ada data";
								}

							?>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
     