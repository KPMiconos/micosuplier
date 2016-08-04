  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            List Unsolved Service
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Service</a></li>
            <li class="active">Solving</li>
          </ol>
        </section>
      
        <!-- Main content -->
        <section class="content">
         
          <div class="row">
            <div class="col-xs-12 col-lg-10">
              <div class="box">
                <div class="box-header">
               
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
                      <th>No</th>
                      <th>Subjek</th>
                      <th>Keluhan</th>
                      <th>Tanggal</th>
                      <th>Status</th>
					  <th>Action</th>
                    </tr>
					<?php
							if(!empty($isi)){
							foreach($isi as $baris){ ?>
                    <tr>
                      <td><?php echo $baris->id_service?></td>
                      <td><strong><?php echo $baris->subject?></strong></td>
                      <td><?php echo word_limiter($baris->keluhan,5);?></td>
                      <td><?php echo $baris->tgl_open?></td>
                      <td><span class="label label-success"><?php

						if($baris->status==1){
							echo "Open";
						}else if($baris->status==2){
							echo "On going";
						}else if($baris->status==3){
							echo "Solved";
						}
						
						
						?></span></td>
					  <th>
					  <div class="btn-group btn-group-lg">
						<?php if($baris->status<>3) {?>
							<a href="<?php echo base_url() ?>service/pilihSolving/<?php echo $baris->id_service ?>" ><li class="fa  fa-wrench btn btn-primary " data-toggle="tooltip" data-placement="top" title="Solving"></li></a>
						<?php }?>
						<a href="#"><li class="fa fa-eye btn btn-primary pull-right" data-toggle="tooltip" data-placement="top" title="View"></li></a>
						<a href="#"><li class="fa fa-pencil-square-o btn btn-primary pull-right " data-toggle="tooltip" data-placement="top" title="Edit"></li></a>
						<a href="#"><li class="fa  fa-trash btn btn-primary pull-right" data-toggle="tooltip" data-placement="top" title="Delete"></li></a>
					</div>
						
					  </th>
                    </tr>
                   
					<?php }}
								else{
									echo "Belum ada data Service";
								}

							?>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
     