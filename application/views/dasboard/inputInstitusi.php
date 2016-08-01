  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Add Institusi
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Customer</a></li>
            <li class="active">Add Institusi</li>
          </ol>
        </section>
      
        <!-- Main content -->
        <section class="content">
         
          <div class="row">
			<div class="col-md-6">
				 <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Form Data Institusi</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="<?php echo base_url() ?>admin/addInstitusi_act" method="post" enctype="multipart/form-data">
                  <div class="box-body">
					 <div class="form-group">
                      <label for="exampleInputEmail1">ID Institusi</label>
                      <input name="id" type="text" class="form-control" id="exampleInput" placeholder="Nomor ID Institusi" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Institusi</label>
                      <input name="nama" type="text" class="form-control" id="exampleInput" placeholder="Nama Institusi" required>
                    </div>
					
                    <div class="form-group">
                      <label for="exampleInputPassword1">Alamat</label>
                      <input name="alamat" type="text" class="form-control" id="exampleInput" placeholder="Alamat" required>
                    </div>
					 <div class="form-group">
                      <label for="exampleInputEmail1">No.Telephone</label>
                      <input name="hp" type="text" class="form-control" id="exampleInput" placeholder="Nomor Telephone" required>
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
              </div><!-- /.box -->

			</div>
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
     