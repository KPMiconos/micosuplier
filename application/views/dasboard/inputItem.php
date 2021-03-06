  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Tambah Barang
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Gudang</a></li>
            <li class="active">Tambah Barang</li>
          </ol>
        </section>
      
        <!-- Main content -->
        <section class="content">
         
          <div class="row">
			<div class="col-md-6">
				 <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
						<h3 class="box-title">Form Tambah Barang</h3>
						<?php if($this->session->flashdata('pesan')){
					  echo $this->session->flashdata('pesan');
				  } ?>
					</div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="<?php echo base_url() ?>produk/addItem_act" method="post" enctype="multipart/form-data">
                  <div class="box-body">
					<div class="form-group">
                      <label for="exampleInputEmail1">Id.Item</label>
                      <input name="idItem" type="text" class="form-control" id="exampleInput" placeholder="ID item" required>
                    </div>
					 <div class="form-group">
                      <label for="exampleInputEmail1">Nama Barang</label>
                      <input name="nama" type="text" class="form-control" id="exampleInput" placeholder="Nama Barang" required>
                    </div>

					<div class="form-group">
						<label>Tipe</label>
						<select name="tipe" class="form-control selecttree" style="width: 100%;" required>
						  <option>-Pilih</option>
						  <option value="1">Raw</option>
						  <option value="2" >Semi-Finish</option>
						  <option value="3" >Finish</option>
						</select>
					</div>
					<div class="form-group">
						<label>Satuan</label>
						<select name="satuan" class="form-control selecttree" style="width: 100%;" required>
						  <option>-Pilih</option>
						  <?php if(!empty($satuan)){
							  foreach($satuan as $baris){s
							 ?>
						  <option value="<?php echo $baris->id_satuan; ?>"><?php echo $baris->nama_satuan; ?></option>
							  <?php } }else{
								  echo "Data kosong";
							  }?>
						  
						</select>
					</div>
					
					<div class="form-group">
                      <label for="exampleInputEmail1">Deskripsi</label>
                       <textarea name="deskripsi" class="form-control" rows="3" placeholder="Deskripsi barang..."></textarea required>
                    </div>
					<div class="form-group">
						<label for="exampleInputFile">Gmbar Barang</label>
						<input name="filefoto" type="file" id="exampleInputFile" required>
						<p class="help-block">Besar file maksimal 1 MB, format jpg,png,gif</p>
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
     