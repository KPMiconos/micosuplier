  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            List BOM
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Produksi</a></li>
            <li class="active">List Produksi</li>
          </ol>
        </section>
      
        <!-- Main content -->
        <section class="content">
         
          <div class="row">
            <div class="col-xs-12 col-lg-12">
              <div class="box">
                <div class="box-header">
                  <a href="<?php echo base_url() ?>produk/additem"><i class="fa fa-plus"></i> <h3 class="box-title">Add</h3></a>
                  <div class="box-tools">
				  <form method="post" action="#" enctype="multipart/form-data">
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
				<?php if($this->session->flashdata('pesan')){
					  echo $this->session->flashdata('pesan');
				  } ?>
                  <table id="table" class="table table-hover">
				  <thead>
                    <tr>
                      <th>ID</th>
					   <th>Gambar</th>
                      <th>Nama Produk</th>
                      <th>Tipe</th>
					  <th>Satuan</th>
                      
                      <th>Supplier</th>
					  
					  <th>Jumlah</th>
					  <th>Action</th>
                    </tr>
				</thead>
				<?php
							if(!empty($isi)){
							foreach($isi as $baris){ ?>
                    <tr >
                      <td><?php echo $baris->id_item ?></td>
					  <td><img style="width:50px; hight:50px;" src="<?php echo base_url() ?>assets/images/produk/<?php echo $baris->link_photo ?>"></td>
                      <td><?php echo $baris->nama_item ?></td>
                      <td>
					  <?php
						echo $baris->nama_tipe_item;
						
						 
						?>
						</a></td>
					   <td>
					  <?php 
						echo $baris->nama_satuan;
						
					  ?></td>
                      
                      <td style="width:200px;"><?php echo word_limiter($baris->deskripsi,10),"..." ?></td>
					  
					  <td><?php 
						if (empty($baris->jumlah)){
							echo "<span class='label label-danger'>Stok kosong</span>";
						}else {
							echo $baris->jumlah," item";
						}?> </td>
					  <td>
					   <div class="btn-group">
							<a id="viewlist<?php echo $baris->id_item ?>" style="cursor: pointer;" data-toggle="collapse" data-target=".row1<?php echo $baris->id_item; ?>" >
								<button class="btn btn-info btn-sm">
									<li class="fa   fa-list" data-toggle="tooltip" data-placement="top" title="Lihat rincian">
									</li>
								</button>
							</a>
							
							<a  href="<?php echo base_url(),"produksi/deleteBom/",$baris->id_item; ?>">
								<button class="btn btn-info btn-sm" onclick="return confirm('Anda yakin ingin menghapus data ini?')"
								<?php if(!$this->session->userdata('produksi')){
								echo "disabled";
							} ?>
								>
									<li class="fa fa-trash  " data-toggle="tooltip" data-placement="top" title="Delete">
									</li>
								</button>
							</a>
								
						</div>
					  </td>
                    </tr>
					 <tr class="collapse row1<?php echo $baris->id_item; ?>">
						<td></td>
						<td colspan="6">
						<div class="box table-responsive">
						<table  class="table table-hover border">
							<thead>
								<tr>
									<th></th>
									<th>Nama Bahan</th>
									<th>Tipe</th>
									<th>Satuan</th>
									<th>Jumlah</th>
									
								</tr>
							</thead>
							<tbody id="showdata<?php echo $baris->id_item ?>">
							<script type="text/javascript">
								$("#viewlist<?php echo $baris->id_item ?>").click(function(){
									$("#showdata<?php echo $baris->id_item ?>").load("<?php echo base_url(),"produksi/rincianBom/",$baris->id_item; ?>")
								})
							</script>
							</tbody>
						</table>
						</div>
						</td>
						
					</tr>
                   
					<?php }}
						else{
							echo "Belum ada data Petugas";
							}
					?>
				
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->


<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Person Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">First Name</label>
                            <div class="col-md-9">
                                <input name="firstName" placeholder="First Name" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Last Name</label>
                            <div class="col-md-9">
                                <input name="lastName" placeholder="Last Name" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Gender</label>
                            <div class="col-md-9">
                                <select name="gender" class="form-control">
                                    <option value="">--Select Gender--</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Address</label>
                            <div class="col-md-9">
                                <textarea name="address" placeholder="Address" class="form-control"></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Date of Birth</label>
                            <div class="col-md-9">
                                <input name="dob" placeholder="yyyy-mm-dd" class="form-control datepicker" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
     