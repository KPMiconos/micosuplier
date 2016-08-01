  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            List Customer
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Customer</a></li>
            <li class="active">List Customer</li>
          </ol>
        </section>
      
        <!-- Main content -->
        <section class="content">
         
          <div class="row">
            <div class="col-xs-10 col-lg-10">
              <div class="box">
                <div class="box-header">
					<a href="<?php echo base_url() ?>admin/addCustomer"><i class="fa fa-plus"></i> <h3 class="box-title">Add</h3></a>
                  <div class="box-tools">
                    <form method="post" action="<?php echo base_url() ?>admin/cariCustomer" enctype="multipart/form-data">
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
                      <th>ID</th>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>No.Hp</th>
                      <th>Alamat</th>
					  <th>Action</th>
                    </tr>
					<?php
							if(!empty($isi)){
							foreach($isi as $baris){ ?>
                    <tr>
                      <td><a href="<?php echo base_url(),"admin/viewCustomer/",$baris->id_customer  ?>"><?php echo "M1607",$baris->id_customer  ?></a></td>
                      <td><?php echo $baris->nama  ?></td>
                      <td><?php echo $baris->email  ?></td>
                      <td><span class="label label-success"><?php echo $baris->hp  ?></span></td>
                      <td><?php echo $baris->alamat  ?></td>
					  <td>
					   <div class="btn-group btn-group-lg">
					   <a href="#"><li class="fa  fa-trash btn btn-primary pull-right" data-toggle="tooltip" data-placement="top" title="Delete"></li></a>
						<a style="cursor: pointer;" data-toggle="modal" data-target="#myModal"><li class="fa fa-pencil-square-o btn btn-primary pull-right " data-toggle="tooltip" data-placement="top" title="Edit"></li></a>
						<a href="<?php echo base_url(),"admin/viewCustomer/",$baris->id_customer?>"><li class="fa fa-eye btn btn-primary pull-right" data-toggle="tooltip" data-placement="top" title="View"></li></a>
						
						</div>
					  </td>
                    </tr>
					
					<!-- Modal -->
					<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					  <div class="modal-dialog" role="document">
						<div class="modal-content">
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">Edit List Suplier</h4>
						  </div>
						  <div class="modal-body">
						   <!-- form start -->
							<form role="form" action="<?php echo base_url() ?>admin/addCustomer_act" method="post" enctype="multipart/form-data">
                  <div class="box-body">
					
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama</label>
                      <input name="nama" type="text" class="form-control" id="exampleInput" placeholder="Nama Lengkap" required>
                    </div>
					 <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select name="jenkel" class="form-control select2" style="width: 100%;">
                      <option>-Pilih</option>
                      <option value="L">Laki-laki</option>
                      <option value="P" >Perempuan</option>
                      
                    </select>
                  </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Alamat</label>
                      <input name="alamat" type="text" class="form-control" id="exampleInput" placeholder="Alamat" required>
                    </div>
					 <div class="form-group">
                      <label for="exampleInputEmail1">No.Telephone</label>
                      <input name="hp" type="text" class="form-control" id="exampleInput" placeholder="Nomor HP/Telephone" required>
                    </div>
					 <div class="form-group">
                      <label for="exampleInputEmail1">Email</label>
                      <input name="email" type="email" class="form-control" id="exampleInput" placeholder="Email" required>
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
							echo "Belum ada data Customer";
						}
					?>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
     