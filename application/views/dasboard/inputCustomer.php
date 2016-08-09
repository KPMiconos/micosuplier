  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Add Customer
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Customer</a></li>
            <li class="active">Add Customer</li>
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
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="<?php echo base_url() ?>admin/addCustomer_act" method="post" enctype="multipart/form-data">
                  <div class="box-body">
					 <div class="form-group">
						<label>Institusi</label>
						<select name="idInstitut" class="form-control selecttree" style="width: 100%;">
							<option>-Pilih</option>
							
							<?php if(!empty($isi)){
							foreach($isi as $baris){ ?>
							<option value="<?php echo $baris->id_institusi  ?>"><?php echo $baris->nama_institusi; ?></option>
							<?php }} ?>
                      
						</select>
					</div>
					   <div class="form-group">
                      <label for="exampleInputEmail1">No.ID</label>
                      <input name="idCustomer" type="text" class="form-control" id="exampleInput" placeholder="Nama Lengkap" required>
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
                      <label for="exampleInputPassword1">Jabatan</label>
                      <input name="jabatan" type="text" class="form-control" id="exampleInput" placeholder="Alamat" required>
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
              </div><!-- /.box -->

			</div>
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
     