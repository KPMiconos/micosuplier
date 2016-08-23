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
								echo "Returning";
							}else if($baris->status=="3"){
								echo "Completed";
							}
					  ?></span></td>
                      
					  <td>
					   <div class="btn-group btn-group-lg">
					   <a href="<?php echo base_url(),"gudang/viewPO/",$baris->id_po?>"><button class="btn btn-primary"<?php
							if($baris->status==2){
								echo "disabled";
							}?> ><li class="fa  <?php if($baris->status==2){
								echo "fa-reply-all";
							}else{
								echo "fa-check-square-o";
							} ?>" data-toggle="tooltip" data-placement="top" title="Proses penerimaan"></li></button></a>
						
						</div>
					</td>
					 </tr>
						  
				
            
                   
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
     