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
            <div class="col-md-10">
              <div class="box box-primary">
                <div class="box-header">
                  <i class="fa fa-edit"></i>
                  <h3 class="box-title">Pilih</h3>
                </div>
                <div class="box-body pad table-responsive">
                  <p>Apakah menggunakan produk dalam menangani permasalahan?</p>
				  
				</div>
				<div class="box-footer">
                    <button  class="btn btn-primary" data-toggle="collapse" data-target="#barang">Ya</button><button type="submit" class="btn btn-primary">Tidak</button>
                  </div>
				  
			 </div>
			  <section class="col-lg-4 connectedSortable collapse" id="barang" >
			
				<div class="box">
					<div class="box-header">
					<H3></H3>
					</div>
					 <div class="box-body">
					  <form method="post" action="<?php echo base_url() ?>admin/addDataBelanja">
					 <table class="table table-hover">
                    <tr>
                      
					  <th>Nama Produk</th>
                      <th>Harga</th>
					   <th>Pilihan</th>
					   
                      <input type="hidden" name="idtransaksi" value="<?php echo "TM",time()  ?>">
                    </tr>
					 <?php foreach($this->cart->contents() as $item){ ?>
					<tr>
						 <td><?php echo $item['name'] ?></td>
						<input type="hidden" name="id" value="<?php echo $item['id'] ?>">
						 <td>
                             <?php echo $item['qty'] ?>
							 <input type="hidden" name="jumlah" value="<?php echo $item['qty'] ?>">
                         </td>
						<td>
                            <?php echo "Rp ",$item['price'] ?>
						  <input type="hidden" name="harga" value="<?php echo $item['price'] ?>">
						   <input type="hidden" name="total" value="<?php echo $this->cart->total() ?>">
                        </td>
						<td>
							<a href="<?php echo base_url(),"admin/hapus/" ,$item['rowid']; ?>">Hapus</a>
						</td>
						<?php } ?>
					</tr>
					 <tr>
								<td>
									
								</td>
								<td>
									Total <?php echo "TM",time()  ?>
								</td>
								<td>
									<?php if($this->cart->total()>0){
										echo "Rp ", $this->cart->total();
									}else{
										echo "Rp ", $this->cart->total();
									}
									
									?>
								</td>
							  </tr>
							  
					</table>
					<div class="form-group">
						<label>Customer</label>
						<select name="id_customer" class="form-control select2" style="width: 100%;">
						  <option>-Pilih</option>
						  	<?php if(!empty($isi)){
							foreach($customer as $baris){ ?>
						  <option value="<?php echo $baris->id_customer ?>"><?php echo $baris->nama ?></option>
							<?php }} ?>
						  
						</select>
					</div>
					 <div class="form-group">
                      <label for="exampleInputEmail1">Tanggal</label>
                      <input name="tgl" type="text" class="form-control datepicker"  placeholder="Tanggal input " data-date-format="yyyy-mm-dd" >
                    </div>
					 <div class="box-footer">
					 
                    <button type="submit" class="btn btn-primary pull-right">Submit</button>
                  </div>
					</form>
					 </div>
				</div>
				
			 
			</section>
		 
			</div>
			
		  </div>
		</section>
	</div>