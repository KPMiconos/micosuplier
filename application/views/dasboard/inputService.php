  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Add Service
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Service</a></li>
            <li class="active">Add Service</li>
          </ol>
        </section>
      
        <!-- Main content -->
        <section class="content">
         
          <div class="row">
			<div class="col-md-6">
				 <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Form Input Service</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="<?php echo base_url() ?>admin/addService_act" method="post" enctype="multipart/form-data">
                  <div class="box-body">
					 <div class="form-group">
                      <label for="exampleInputEmail1">Tanggal</label>
                      <input name="tgl_open" type="text" class="form-control datepicker"  placeholder="Tanggal input Keluhan" data-date-format="yyyy-mm-dd" >
                    </div>
					
                    
					<div class="form-group">
						<label>Nama Customer</label>
						<select name="customer" class="form-control selecttree" >
						  <option>-Pilih</option>
						  <?php if(!empty($isi)){
							foreach($isi as $baris){ ?>
						  <option value="<?php echo $baris->id_customer ?>"><?php echo $baris->nama ?></option>
						  <?php }}?>
						  
						</select>
					</div>
					
                    <div class="form-group">
                      <label for="exampleInputPassword1">Keluhan</label>
                      <input name="subjek" type="text" class="form-control" id="exampleInput" placeholder="Subjek Keluhan" required>
                    </div>
					<div class="form-group">
                      <label for="exampleInputEmail1">Detail Keluhan</label>
                       <textarea name="keluhan" class="form-control" rows="3" placeholder="Detail Keluhan..." required></textarea>
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
              </div><!-- /.box -->

			</div>
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
     