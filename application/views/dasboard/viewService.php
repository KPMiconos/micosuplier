 <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Read Service
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			 <li><a href="#"><i ></i> Service</a></li>
            <li class="active">Read Service</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-9">
			<?php  	if(!empty($isi)){
							foreach($isi as $baris){  ?>
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Read Service</h3>
                  <div class="box-tools pull-right">
                    <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Previous"><i class="fa fa-chevron-left"></i></a>
                    <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Next"><i class="fa fa-chevron-right"></i></a>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <div class="mailbox-read-info">
                    <h4><strong><?php echo $baris->subject?></strong></h4>
                    <h5>Dari: <?php echo $baris->nama_customer?> <span class="mailbox-read-time pull-right"><?php echo $baris->tgl_open?></span></h5>
                  </div><!-- /.mailbox-read-info -->
                  <div class="mailbox-controls with-border">
                   <h5><strong>Keluhan</strong></h5>
                  </div><!-- /.mailbox-controls -->
                  <div class="mailbox-read-message">
                    <p><?php echo $baris->keluhan?></p>
                    
                  </div><!-- /.mailbox-read-message -->
                </div><!-- /.box-body -->
                <div class="box-footer">
                  
                
                </div><!-- /.box-footer -->
                <div class="box-footer">
                  <div class="pull-right">
				  <?php if($baris->status<>3) {?>
                    <button onclick="<?php echo base_url(),"admin/addSolving/",$baris->id_service ?>" class="btn btn-default"><i class="fa fa-shield"></i> Solving</button>
				  <?php }else{?>
				  <button data-toggle="modal" data-target="#myModal" class="btn btn-default"><i class="fa fa-eye"></i> View Solving</button>
				  <?php }?>
                  </div>
                  <button class="btn btn-default"><i class="fa fa-trash-o"></i> Delete</button>
                  <button class="btn btn-default"><i class="fa fa-print"></i> Print</button>
                </div><!-- /.box-footer -->
              </div><!-- /. box -->
			  <!-- Modal -->
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Solving Problem#<?php echo $baris->id_service ?></h4>
					  </div>
					  <div class="modal-body">
					   <form >
						<div class="form-group">
							<label for="exampleInputFile">Tanggal</label>
							<input type="text" id="exampleInputFile" value="<?php $baris->tgl_solved ?>" disabled>
						</div>
						<div class="form-group">
							<label for="exampleInputFile">Teknisi</label>
							<input type="text" id="exampleInputFile" value="<?php $baris->nama_petugas ?>" disabled>
						</div>
						<div class="form-group">
							<label for="exampleInputFile">Solusi</label>
							<input type="text" id="exampleInputFile" value="<?php $baris->penyelesaian?>" disabled>
						</div>
					
					   </form>
					  </div>
					  
					</div>
				  </div>
				</div>
            
			   <?php }}else{
			echo "data tidak ada";
		} ?>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
     