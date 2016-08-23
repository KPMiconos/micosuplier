  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            List Pemesanan
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Pemesanan</a></li>
            <li class="active">List Pemesanan</li>
          </ol>
        </section>
      
        <!-- Main content -->
        <section class="content">
         
          <div class="row">
            <div class="col-xs-12 col-lg-12">
              <div class="box">
                <div class="box-header">
                 <a href="<?php echo base_url() ?>admin/addPetugas"><i class="fa fa-user-plus fa-lg"></i> <strong><h2 class="box-title">Add</h2></strong></a>
                  <div class="box-tools">
                   <form method="post" action="<?php echo base_url() ?>admin/cariPetugas" enctype="multipart/form-data">
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
                      <th>No.PO</th>
                      <th>Tanggal</th>
                      <th>Creator</th>
                      <th>Supplier</th>
					  <th>Jumlah</th>
                      <th>Status</th>
					  <th>Action</th>
                    </tr>
					<?php
							if(!empty($isi)){
							foreach($isi as $baris){ ?>
                    <tr>
                      <td><?php echo $baris->id_po?></td>
					  <td><?php echo date('d/m/Y',strtotime($baris->tanggal_po))?></td>
                      <td><?php echo $baris->nama_petugas?></td>
                      <td><?php echo $baris->nama_suplier?></td>
					  <td>Rp <?php echo $baris->totalHarga?></td>
                      <td><span class="label label-success"><?php 
							if($baris->status=="0"){
								echo "Draft";
							}
							else if($baris->status=="1"){
								echo "Ordered";
							}else if($baris->status=="2"){
								echo "Returning";
							}else if($baris->status=="3"){
								echo "Completed";
							}else if($baris->status=="4"){
								echo "Canceled";
							}
					  ?></span></td>
                      
					  <td >
							<div class="btn-group">
							<form method="post" action="<?php echo base_url('pembelian/updateStatus'); ?>" enctype="multipart/form-data" >
								
								<input type="hidden" name="idTransaksi" value="<?php echo $baris->id_po; ?>">
								<input type="hidden" name="status" value="1">
								<button <?php if($baris->status!=0){
									echo "disabled";
								} ?> type="submit" class="btn  btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Proses pemesanan" onclick="return confirm('Anda yakin ingin akan memproses pemesanan ini?')"><li class="fa fa-check-square-o"></li></button>
							</form>
							</div>
							<div class="btn-group">
								<div class="btn-group"><a data-toggle="tooltip" data-placement="top" title="Lihat rincian"><button id="viewlist<?php echo $baris->id_po ?>"  class="btn btn-info btn-sm" data-toggle="collapse" data-target=".row1<?php echo $baris->id_po; ?>"><li class="fa fa-eye" ></li></button></a></div>
								<div class="btn-group"><a href="<?php echo base_url('pembelian/') ?>"><button  class="btn  btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Ubah pembelian" ><li class="fa fa-pencil-square-o"   ></li></button></a></div>
							<div class="btn-group">
							<form method="post" action="<?php echo base_url('pembelian/updateStatus'); ?>" enctype="multipart/form-data" >
								
								<input type="hidden" name="idTransaksi" value="<?php echo $baris->id_po; ?>">
								<input type="hidden" name="status" value="4">
								<button <?php if($baris->status!=1){
									echo "disabled";
								} ?> type="submit" class="btn  btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Batalkan pemesanan" onclick="return confirm('Anda yakin ingin membatalkan pemesanan ini, jika sudah dibatalkan tidak dapat diproses kembali?')"><li class="fa fa-trash"></li></button>
							</form>
							</div>
							
							</div>
						
					</td>
					</tr>
					 <tr class="collapse row1<?php echo $baris->id_po; ?>">
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
									
								</tr>
							</thead>
							<tbody id="showdata<?php echo $baris->id_po ?>">
							<script type="text/javascript">
								$("#viewlist<?php echo $baris->id_po ?>").click(function(){
									$("#showdata<?php echo $baris->id_po ?>").load("<?php echo base_url(),"pembelian/rincianPemesanan/",$baris->id_po; ?>")
									
								})
							</script>
							</tbody>
						</table>
						</div>
						</td>
						
					</tr>
                   
						  
				
            
                   
					<?php }}
								else{
									echo "Belum ada data Pemesanan";
								}

							?>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
     