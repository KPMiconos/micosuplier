  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            List Penerimaan
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Penerimaan</a></li>
            <li class="active">List Penerimaan</li>
          </ol>
        </section>
      
        <!-- Main content -->
        <section class="content">
         
          <div class="row">
            <div class="col-xs-12 col-lg-10">
              <div class="box">
                <div class="box-header">
                <strong><h2 class="box-title"></h2></strong>
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
                      <td><span class="label label-success">
					  <?php 
							if($baris->status=="1"){
								echo "Ordered";
							}else if($baris->status=="2"){
								echo "Pengembalian";
							}else if($baris->status=="3"){
								echo "Selesai";
							}else if($baris->status=="5"){
								echo "Kirim hasil";
							}else if($baris->status=="6"){
								echo "Selesai";
							}
					  ?></span></td>
                      <?php if($baris->kode==1){ ?>
					  <td>
					   <div class="btn-group">
					   <a href="<?php echo base_url(),"gudang/viewPO/",$baris->id_po?>"><button class="btn btn-info"<?php
							if($baris->status==2 or $baris->status==3 ){
								echo "disabled";
							}else if(!$this->session->userdata('gudang')){
									echo "disabled";
							}?> >
							<li class="fa  <?php if($baris->status==2){
								echo "fa-reply-all";
							}else{
								echo "fa-check-square-o";
							} ?>" data-toggle="tooltip" data-placement="top" title="Proses penerimaan"></li></button></a>
						
						</div>
						<div class="btn-group">
						<button id="viewlist<?php echo $baris->id_po ?>"  class="btn btn-info btn-sm" data-toggle="collapse" data-target=".row1<?php echo $baris->id_po; ?>"><li class="fa fa-list"></li></button>
						</div>
					</td>
					  <?php }else if($baris->kode==2){?>
					   <td>
					   <div class="btn-group">
					   <a href="<?php echo base_url(),"gudang/viewPROIN/",$baris->id_po?>"><button class="btn btn-info"<?php
							if($baris->status==2 or $baris->status==3 or $baris->status==6){
								echo "disabled";
							}?> ><li class="fa  <?php if($baris->status==2){
								echo "fa-reply-all";
							}else{
								echo "fa-check-square-o";
							} ?>" data-toggle="tooltip" data-placement="top" title="Proses penerimaan"></li></button></a>
						
						</div>
						<div class="btn-group">
						<button id="viewlist<?php echo $baris->id_po ?>"  class="btn btn-info btn-sm" data-toggle="collapse" data-target=".row1<?php echo $baris->id_po; ?>"><li class="fa fa-list"></li></button>

						</div>
					</td>
					  
					  <?php }?>
					 </tr>
					   <?php if($baris->kode==1){ ?>
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
									<th>Jumlah Masuk</th>
									
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
					<?php }else if($baris->kode==2){?>	  
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
									<th>Jumlah Masuk</th>
									
								</tr>
							</thead>
							<tbody id="showdata<?php echo $baris->id_po ?>">
							<script type="text/javascript">
								$("#viewlist<?php echo $baris->id_po ?>").click(function(){
									$("#showdata<?php echo $baris->id_po ?>").load("<?php echo base_url(),"produksi/rincianProduksi/",$baris->id_po; ?>")
									
								})
							</script>
							</tbody>
						</table>
						</div>
						</td>
						
					</tr>
            
                    <?php }?>
					<?php }}
								else{
									echo "Belum ada data Penerimaan";
								}

							?>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
     