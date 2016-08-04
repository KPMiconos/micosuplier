      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Pilih
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Service</a></li>
            <li class="active">Pilih</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-md-8">
              <div class="box box-primary">
                <div class="box-header">
                  <i class="fa fa-edit"></i>
                  <h3 class="box-title">Pilih</h3>
                </div>
                <div class="box-body pad table-responsive">
                  <p>Apakah menggunakan produk dalam menangani permasalahan?</p>
				  
				</div>
				<div class="box-footer">
                    <div class="col-md-2"> <a href="<?php echo base_url() ?>service/addProdukSolving"><button  class="btn btn-primary"  style="width:70px;">Ya</button></a></div>
					<div class="col-md-1"> <a href="<?php echo base_url() ?>service/addSolving/<?php echo $this->session->userdata('idService');?>"><button style="width:70px;" class="btn btn-primary">Tidak</button></a></div>
                  </div>
				  
			 </div>
			 
			</div>
			
		  </div>
		</section>
	</div>