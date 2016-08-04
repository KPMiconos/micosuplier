  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            List Service
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Service</a></li>
            <li class="active">List Service</li>
          </ol>
        </section>
      
        <!-- Main content -->
        <section class="content">
         
          <div class="row">
            <div class="col-xs-12 col-lg-10">
              <div class="box">
                <div class="box-header">
                 <a href="<?php echo base_url() ?>service/addService"><i class="fa fa-user-plus fa-lg"></i> <strong><h2 class="box-title">Add</h2></strong></a>
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
                      <td><?php echo $baris->keluhan?></td>
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
						<a href="<?php echo base_url(),"service/viewService/",$baris->id_service ?>"><li class="fa fa-eye btn btn-primary pull-right" data-toggle="tooltip" data-placement="top" title="View"></li></a>
						<a style="cursor: pointer;" data-toggle="modal" data-target="#myModal<?php echo $baris->id_service ?>"><li class="fa fa-pencil-square-o btn btn-primary pull-right " data-toggle="tooltip" data-placement="top" title="Edit"></li></a>
						<a href="<?php echo base_url(),"service/delete/",$baris->id_service ?>"><li class="fa  fa-trash btn btn-primary pull-right" data-toggle="tooltip" data-placement="top" title="Delete"></li></a>
					</div>
						
					  </th>
                    </tr>
                   <!-- Modal -->
					<div class="modal fade" id="myModal<?php echo $baris->id_service ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					  <div class="modal-dialog" role="document">
						<div class="modal-content">
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">Edit Data Service</h4>
						  </div>
						  <div class="modal-body" >
							<!-- form start -->
							<form role="form" action="<?php echo base_url() ?>service/addService_act" method="post" enctype="multipart/form-data">
							  <div class="box-body">
								 <div class="form-group">
								  <label for="exampleInputEmail1">Tanggal</label>
								  <input value="<?php echo $baris->tgl_open ?>" name="tgl_open" type="text" class="form-control datepicker"  placeholder="Tanggal input Keluhan" data-date-format="yyyy-mm-dd" >
								</div>
								
								<div class="form-group">
									<div>
									<label>Nama Customer</label>
									</div>
									<div class="pull-left">
									<select name="customer" class="form-control pull-left selecttree" >
									  <option>-Pilih</option>
									  <?php if(!empty($customer)){
										foreach($customer as $baris2){ ?>
									  <option value="<?php echo $baris2->id_customer ?>"><?php echo $baris2->nama ?></option>
									  <?php }}?>
									  
									</select>
									</div>
								</div>
								
								<div class="form-group">
								  <label for="exampleInputPassword1">Keluhan</label>
								  <input value="<?php echo $baris->subject ?>" name="subjek" type="text" class="form-control" id="exampleInput" placeholder="Subjek Keluhan" required>
								</div>
								<div class="form-group">
								  <label for="exampleInputEmail1">Detail Keluhan</label>
								   <textarea name="keluhan" class="form-control" rows="3" placeholder="Detail Keluhan..." required><?php echo $baris->keluhan ?>"</textarea>
								</div>
								<div class="form-group">
									<label>Status</label>
									<select name="status" class="form-control selecttree" >
									  <option>-Pilih</option>
									  <option value="1">Open</option>
									  <option value="2" >On going</option>
									  <option value="3" >Solved</option>
									</select>
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
     