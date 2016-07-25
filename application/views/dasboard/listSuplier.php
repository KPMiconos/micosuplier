  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            List Suplier
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Suplier</a></li>
            <li class="active">List Suplier</li>
          </ol>
        </section>
      
        <!-- Main content -->
        <section class="content">
         
          <div class="row">
            <div class="col-xs-10 col-lg-10">
              <div class="box">
                <div class="box-header">
                  <a href="<?php echo base_url() ?>admin/addSuplier"><i class="fa fa-plus"></i> <h3 class="box-title">Add</h3></a>
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
                      <th>ID</th>
                      <th>Nama Suplier</th>
                      <th>Email</th>
                      <th>No.Telephone</th>
                      <th>Deskripsi</th>
                    </tr>
					<?php
							if(!empty($isi)){
							foreach($isi as $baris){ ?>
                    <tr>
                      <td><?php echo $baris->id_suplier ?></td>
                      <td><?php echo $baris->nama_suplier ?></td>
                      <td><?php echo $baris->email ?></td>
                      <td><span class="label label-success"><?php echo $baris->hp ?></span></td>
                      <td><?php echo word_limiter($baris->deskripsi,10),"..." ?></td>
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
     