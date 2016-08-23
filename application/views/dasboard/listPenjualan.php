  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            List Penjualan
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Penjualan</a></li>
            <li class="active">List Penjualan</li>
          </ol>
        </section>
      
        <!-- Main content -->
        <section class="content">
         
          <div class="row">
            <div class="col-xs-12 col-lg-12">
              <div class="box">
                <div class="box-header">
                <h2 class="box-title"></h2></strong>
                  <div class="box-tools">
                    <div class="input-group" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                      <th>No.Transaksi</th>
                      <th>Tanggal</th>
                      <th>Petugas</th>
                      <th>Customer</th>
					   <th>Kurir</th>
                      <th>Total</th>
					  <th>Status</th>
					  <th>Action</th>
                    </tr>
					
					<?php
							if(!empty($isi)){
							foreach($isi as $baris){ ?>
                    <tr>
                      <td><?php echo $baris->id_transaksi?></td>
                      <td><?php echo $baris->tanggal?></td>
                      <td><?php echo $baris->nama_petugas?></td>
                      <td><?php echo $baris->nama_customer?></td>
					  <td><?php echo $baris->kurir?></td>
                      <td><?php echo $baris->total?></td>
					  <td><span class="label label-success"><?php if($baris->status==0){
									echo "Draft";
								}else if($baris->status==1){
									echo "Ordered";
								}else if($baris->status==2){
									echo "Processing";
								}else if($baris->status==3){
									echo "Completed";
								}else if($baris->status==4){
									echo "Canceled";
								}
							?>	</span></td>
					   <td >
							<div class="btn-group">
							<form method="post" action="<?php echo base_url('penjualan/updateStatus'); ?>" enctype="multipart/form-data" >
								
								<input type="hidden" name="idTransaksi" value="<?php echo $baris->id_transaksi; ?>">
								<input type="hidden" name="status" value="1">
								<button <?php if($baris->status!=0){
									echo "disabled";
								} ?> type="submit" class="btn  btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Proses penjualan" onclick="return confirm('Anda yakin ingin akan memproses penjualan ini?')"><li class="fa fa-check-square-o"></li></button>
							</form>
							</div>
							<div class="btn-group">
								<div class="btn-group"><a data-toggle="tooltip" data-placement="top" title="Lihat rincian"><button id="viewlist<?php echo $baris->id_transaksi ?>"  class="btn btn-info btn-sm" data-toggle="collapse" data-target=".row1<?php echo $baris->id_transaksi; ?>"><li class="fa fa-eye" ></li></button></a></div>
								<div class="btn-group"><a href="<?php echo base_url('penjualan/') ?>"><button  class="btn  btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Ubah penjualan" ><li class="fa fa-pencil-square-o"   ></li></button></a></div>
							<div class="btn-group">
							<form method="post" action="<?php echo base_url('penjualan/updateStatus'); ?>" enctype="multipart/form-data" >
								
								<input type="hidden" name="idTransaksi" value="<?php echo $baris->id_transaksi; ?>">
								<input type="hidden" name="status" value="4">
								<button <?php if($baris->status!=1){
									echo "disabled";
								} ?> type="submit" class="btn  btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Batalkan penjualan" onclick="return confirm('Anda yakin ingin membatalkan penjualan ini, jika sudah dibatalkan tidak dapat diproses kembali?')"><li class="fa fa-trash"></li></button>
							</form>
							</div>
							
							</div>
						
					</td>
					
                    </tr>
					 <tr class="collapse row1<?php echo $baris->id_transaksi; ?>">
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
									<th>Jumlah</th>
									<th>Jumlah Keluar</th>
									
								</tr>
							</thead>
							<tbody id="showdata<?php echo $baris->id_transaksi ?>">
							<script type="text/javascript">
								$("#viewlist<?php echo $baris->id_transaksi ?>").click(function(){
									$("#showdata<?php echo $baris->id_transaksi ?>").load("<?php echo base_url(),"penjualan/rincianPenjualan/",$baris->id_transaksi; ?>")
									
								})
							</script>
							</tbody>
						</table>
						</div>
						</td>
						
					</tr>
                   
                  
					<?php }}
								else{
									echo "Belum ada data Penjualan";
								}

							?>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
     