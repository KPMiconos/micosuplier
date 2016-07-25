  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Solving
            
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
			<div class="col-md-6">
				 <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
						<h3 class="box-title">Form Penanganan</h3>
					</div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="<?php echo base_url() ?>admin/addSolving_act" method="post" enctype="multipart/form-data">
                  <div class="box-body">
					<input name="id_service" type="hidden" value="<?php echo $id ?>">
					<div class="form-group">
                      <label for="exampleInputEmail1">Tanggal Penanganan</label>
                      <input name="tgl_solved" type="text" class="form-control datepicker"  placeholder="Tanggal input Keluhan" data-date-format="yyyy-mm-dd">
                    </div>
					 <div class="form-group">
                      <label for="exampleInputEmail1">Teknisi</label>
                      <input name="teknisi" type="text" class="form-control" id="exampleInput" placeholder="Nama Teknisi yang menangani">
                    </div>
					<div class="form-group">
                      <label for="exampleInputEmail1">Penyelesaian</label>
                       <textarea name="penyelesaian" class="form-control" rows="3" placeholder="Deskripsi penyelesaian..."></textarea>
                    </div>
					<div class="form-group">
						<label>Status</label>
						<select name="status" class="form-control selecttree" style="width: 100%;" >
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
              </div><!-- /.box -->

			</div>
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
     