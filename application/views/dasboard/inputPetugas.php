  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Add Petugas
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Petugas</a></li>
            <li class="active">Add Petugas</li>
          </ol>
        </section>
      
        <!-- Main content -->
        <section class="content">
         
          <div class="row">
			<div class="col-md-6">
				 <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Form Data Petugas</h3>
				  
				<?php if($this->session->flashdata('pesan')){
					  echo $this->session->flashdata('pesan');
				  } ?>
               
				
				<!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="<?php echo base_url() ?>petugas/addPetugas_act" method="post" enctype="multipart/form-data">
                  <div class="box-body">
					<div class="form-group">
                      <label for="exampleInputEmail1">No.KTP</label>
                      <input name="ktp" type="text" class="form-control" id="exampleInput" placeholder="Nomor KTP" required>
                    </div>
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
					<div class="form-group">
                      <label for="exampleInputEmail1">Bagian</label>
                      <input name="bagian" type="text" class="form-control" id="exampleInput" placeholder="Bagian Pekerjaan" required>
                    </div>
					<div class="form-group">
                      <label for="exampleInputEmail1">Password</label>
                      <input name="passwd" type="password" class="form-control" id="exampleInput" placeholder="Password" required>
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
     