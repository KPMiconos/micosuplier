  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Add Product
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Produk</a></li>
            <li class="active">Add Produk</li>
          </ol>
        </section>
      
        <!-- Main content -->
        <section class="content">
         
          <div class="row">
			<div class="col-md-6">
				 <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
						<h3 class="box-title">Form Add Produk</h3>
					</div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="<?php echo base_url() ?>admin/addProduk_act" method="post" enctype="multipart/form-data">
                  <div class="box-body">
					
					 <div class="form-group">
                      <label for="exampleInputEmail1">Nama Barang</label>
                      <input name="nama" type="text" class="form-control" id="exampleInput" placeholder="Nama Barang">
                    </div>
					<div class="form-group">
                      <label for="exampleInputEmail1">Harga Barang</label>
                      <input name="harga" type="text" class="form-control" id="exampleInput" placeholder="Harga Barang">
                    </div>
					<div class="form-group">
                      <label for="exampleInputEmail1">Jumlah</label>
                      <input name="jumlah" type="text" class="form-control" id="exampleInput" placeholder="Jumlah Barang">
                    </div>
					
					<div class="form-group">
						<label>Suplier</label>
						<select name="suplier" class="form-control select2" style="width: 100%;">
						  <option>-Pilih</option>
						  <option value="1">Express</option>
						  <option value="2" >Broadlink</option>
						  <option value="3" >Thunder</option>
						</select>
					</div>
					<div class="form-group">
                      <label for="exampleInputEmail1">Deskripsi</label>
                       <textarea name="deskripsi" class="form-control" rows="3" placeholder="Deskripsi barang..."></textarea>
                    </div>
					<div class="form-group">
						<label for="exampleInputFile">File input</label>
						<input name="filefoto" type="file" id="exampleInputFile">
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
     