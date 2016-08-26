  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Add Bahan Produksi
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Produksi</a></li>
            <li class="active">Add Bahan Produksi</li>
          </ol>
        </section>
      
        <!-- Main content -->
        <section class="content">
         
          <div class="row">
		  <section class="col-lg-8 connectedSortable">
            
              <div class="box">
                <div class="box-header">
                  <a href="<?php echo base_url() ?>pembelian/pemesanan"><i class="fa fa-plus"></i> <h3 class="box-title">Add</h3></a>
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
                  <table class="table table-hover">
                    <tr>
                      <th>ID</th>
					   <th>Gambar</th>
                      <th>Nama Produk</th>
                      <th>Satuan</th>
					  <th>Stok</th>
                      <th>Harga</th>
                      <th>Action</th>
                    </tr>
					<?php
							if(!empty($isi)){
							foreach($isi as $baris){ ?>
					
                    <tr>
                      <td><?php echo $baris->id_item ?></td>
					  <td><img style="width:50px; hight:50px;" src="<?php echo base_url() ?>assets/images/produk/<?php echo $baris->link_photo ?>"></td>
						 <td><?php echo $baris->nama_item ?></td>
                      <td><?php 
						if($baris->satuan=="1"){
							echo "Pcs";
						} else if($baris->satuan=="2"){
							echo "Kg";
						}else if($baris->satuan=="3"){
							echo "m";
						}else if($baris->satuan=="4"){
							echo "m2";
						}else if($baris->satuan=="5"){
							echo "m3";
						}
					  ?></td>
					    <td><?php 
						if (empty($baris->jumlah)){
							echo "<span class='label label-danger'>Stok kosong</span>";
						}else {
							echo $baris->jumlah," item";
						}?> </td>
                      <td><?php if (empty($baris->jumlah)){
							echo "-";
						}else {
							echo "Rp ",$baris->hargaSatuan;
						} ?></td>
                     <td>
					 <div class="group-btn text-center pull-left">
						<a id="viewlist<?php echo $baris->id_item; ?>" style="cursor: pointer;" data-toggle="collapse" data-target=".row1<?php echo $baris->id_item; ?>" >
						<li class="fa   fa-list btn btn-primary pull-right" data-toggle="tooltip" data-placement="top" title="Lihat rincian"></li></a>
					</div>
					</td>
                    </tr>
					<tr class="collapse row1<?php echo $baris->id_item; ?>">
						<td></td>
						<td colspan="8">
						<div class="box table-responsive">
						<table  class="table table-hover border">
							<thead>
								<tr>
									<th></th>
									<th>Suplier</th>
									<th>Harga</th>
									<th>Jumlah</th>
									<th style="width:200px;"></th>
									
								</tr>
							</thead>
							<tbody id="showdata<?php echo $baris->id_item ?>">
							<script type="text/javascript">
 
$(document).ready(function(){
	
	$(document).ajaxStart(function(){
    $("#modalloading").modal('show');
	});
	var url="<?php echo base_url(),"penjualan/rincianBarang/",$baris->id_item;?>" // PHP File
	//var url="getposts.json"; // JSON File

	$.getJSON(url,function(data){
		console.log(data);
		
		$.each(data.isi, function(i,post){
		if(post.jumlah > 0){
			var newRow =
		"<tr id='bagol' class='collapse row1<?php echo $baris->id_item; ?>'><td></td>"
		+"<td><a href='<?php echo base_url() ?>supplier/viewSupplier/"+post.id_suplier+"'>"+post.nama_suplier+"</a></td>"
		+"<td>"+post.hargaSatuan+"</td>"
		+"<td>"+post.jumlah+"</td>"
		+"<td>"
		+"<form method='POST'"+ "action='<?php echo base_url() ?>produksi/addCartbahan'>"
		+"<div class='btn-group'>"
		+"<input type='hidden' name='idSuplier' value='"+post.id_suplier+"'>"
		+"<input type='hidden' name='id' value='"+post.id_item+"'>"
		+"<input type='hidden' name='nama' value='"+post.nama_item+"'>"
		+"<input type='hidden' name='harga' value='"+post.hargaSatuan+"'>"
		+"<input name='jumlah' class='form-control pull-left' type='text'  style='width:100px' data-toggle='tooltip' data-placement='top' title='Jumlah'>"
		+"<input class='pull-right btn btn-primary' type='submit' value='Add'>"
		+"</div>"
		+"</form>"
		+"</td>"
		+"</tr>" ;
		}else{
			var newRow =
		"<tr id='bagol' class='collapse row1<?php echo $baris->id_item; ?>'><td></td>"
		+"<td><a href='<?php echo base_url() ?>supplier/viewSupplier/"+post.id_suplier+"'>"+post.nama_suplier+"</a></td>"
		+"<td>"+post.hargaSatuan+"</td>"
		+"<td>"+post.jumlah+"</td>";
		}
		
		
		$(newRow).appendTo("#showdata<?php echo $baris->id_item ?>");
		});
	});
	$(document).ajaxComplete(function(){
   $("#modalloading").modal('hide');
}); 
	
});

</script>
					</tbody>
						</table>
						</div>
						</td>
						
					</tr>
               
                   
					<?php }}
						else{
							echo "Belum ada data Produk";
							}
					?>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            
			 </section>
			 <section class="col-lg-4 connectedSortable">
			
				<div class="box">
					<div class="box-header">
					<H3>Produksi Item#<?php echo $this->session->userdata('id_produk'); ?></H3>
					</div>
					 <div class="box-body">
					  <form method="post" action="<?php echo base_url() ?>produksi/addDataBahan">
					 <table class="table table-hover">
                    <tr>
                      
					  <th>Nama Produk</th>
                      <th>jumlah</th>
					   <th>Harga</th>
					   
                      <input type="hidden" name="idTransaksi" value="<?php echo "PRO",time()  ?>">
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
							<input type="hidden" name="id_produk" value="<?php echo $this->session->userdata('id_produk'); ?>">
							<input type="hidden" name="idSuplier" value="<?php echo $item['options']['idSuplier'] ?>">
						  <input type="hidden" name="harga" value="<?php echo $item['price'] ?>">
						   <input type="hidden" name="total" value="<?php echo $this->cart->total() ?>">
                        </td>
						<td>
							<a href="<?php echo base_url(),"produksi/hapusbahan/" ,$item['rowid']; ?>">Hapus</a>
						</td>
						<?php } ?>
					</tr>
					 <tr>
								<td>
									
								</td>
								<td>
									Total:
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
                      <label for="exampleInputEmail1">Jumlah Produksi</label>
                      <input name="jml_produksi" type="text" class="form-control"  placeholder="Jumlah Barang yang akan diproduksi " >
					  <input name="id_produk" type="hidden" value="<?php echo $this->session->userdata('id_produk'); ?>">
                    </div>
					 <div class="form-group">
                      <label for="exampleInputEmail1">Tanggal</label>
                      <input name="tgl" type="text" class="form-control datepicker"  placeholder="Tanggal input " data-date-format="yyyy-mm-dd" required>
                    </div>
					
					 <div class="box-footer">
					 
                    <button type="submit" class="btn btn-primary pull-right">Submit</button>
                  </div>
					</form>
					 </div>
				</div>
				
			 
			</section>
		  </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
<div id="modalloading" style="display: none">
    <div class="center">
        <img alt="" src="<?php echo base_url() ?>assets/images/loadinglg.gif" />
    </div>
</div>