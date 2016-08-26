  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
			<?php if($this->session->flashdata('pesan')){
				echo $this->session->flashdata('pesan');
			} ?>
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>150</h3>
                  <p>New Orders</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>53<sup style="font-size: 20px">%</sup></h3>
                  <p>Bounce Rate</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?php echo $customer ?></h3>
                  <p>Customer Registrations</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="<?php echo base_url(),"customer/listCustomer" ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php echo $supplier ?></h3>
                  <p>Supplier Registrations</p>
                </div>
                <div class="icon">
                  <i class="fa fa-truck"></i>
                </div>
                <a href="<?php echo base_url(),"supplier/listSupplier" ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          </div><!-- /.row -->
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <section class="col-lg-6 connectedSortable">
               <!-- BAR CHART -->
			  <div class="box box-success">
				<div class="box-header with-border">
				  <h3 class="box-title">Aliran Barang</h3>
					
                   <form method="post" action="<?php echo base_url(),"admin/index" ?>" enctype="multipart/form-data">
				   
                     <div class="form-group">
						<label>Tambah Produk </label>
						<select name="idItem" class="form-control selecttree" style="width: 50%;" required>
							<option disabled selected value>-Pilih</option>
							
							<?php if(!empty($item)){
							foreach($item as $baris){ ?>
							<option <?php if($baris->id_item==$this->session->userdata('itemStok')){
								echo "selected";
							}  ?> value="<?php echo $baris->id_item  ?>"><?php echo $baris->nama_item; ?></option>
							<?php }} ?>
                      
						</select>
						
						 <button type="submit" class="btn btn-primary">Lihat</button>
					</div>
					
					
					 </form>
					
					
                  
				  <div class="box-tools pull-right">
					
				  </div>
				</div>
				<div class="box-body">
				  <div class="chart">
					<canvas id="barChart" style="height:230px"></canvas>
				  </div>
				</div>
				<!-- /.box-body -->
			  </div>
          <!-- /.box -->

            </section><!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-6 connectedSortable">
			<!-- AREA CHART -->
					  <div class="box box-primary">
						<div class="box-header with-border">
						  <h3 class="box-title">Limit Stok</h3>

						  <div class="box-tools pull-right">
							
						  </div>
						</div>
						<div class="box-body">
						  <div class="">
						  <table class="table">
							<?php if(!empty($alert)){
							foreach($alert as $baris){ ?>
							<tr>
								<td>
									<?php echo $baris->nama_item; ?>
								</td>
								<td>
									<span class="label label-warning"><?php echo $baris->jumlah; ?></span>
								</td>
							</tr>
							<?php }} ?>
							</table>
						  </div>
						</div>
						<!-- /.box-body -->
					  </div>
					  <!-- /.box -->
            </section><!-- right col -->
          </div><!-- /.row (main row) -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
	  <!-- ChartJS 1.0.1 -->
    <script src="<?php echo base_url() ?>assets/js/Chart.min.js"></script>
    <script>
$(document).ready(function(){
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */
	 
	//var url="getposts.json"; // JSON File
	/*
	$.getJSON(url,function(data){
		console.log(data);
		$.each(data.isi, function(i,post){
			alert(post.jumlah);
			
		
		});
		
	});
		*/
		var areaChartData = {
      labels: ["Stok Gudang"],
      datasets: [<?php $i=1; $fill=50;$fill2=50;
							if(!empty($stok)){
							foreach($stok as $baris){ ?>
        {
          label: "<?php echo $baris->asal; ?>",
          fillColor: "rgba(<?php echo $fill=$fill+60 ?>, <?php echo $fill2=$fill2+10 ?>, 222, 1)",
          strokeColor: "rgba(210, 214, 222, 1)",
          pointColor: "rgba(210, 214, 222, 1)",
          pointStrokeColor: "#c1c7d1",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(220,220,220,1)",
          data: [<?php echo $baris->jumlah; ?>]
        }
		<?php
			if($i!=4){
				echo ",";			
			}	
			$i++;
		}} ?>
      ]
    };
	
	
	
	  

 //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $("#barChart").get(0).getContext("2d");
    var barChart = new Chart(barChartCanvas);
    var barChartData = areaChartData;
    barChartData.datasets[1].fillColor = "#00a65a";
    barChartData.datasets[1].strokeColor = "#00a65a";
    barChartData.datasets[1].pointColor = "#00a65a";
    var barChartOptions = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero: true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines: true,
      //String - Colour of the grid lines
      scaleGridLineColor: "rgba(0,0,0,.05)",
      //Number - Width of the grid lines
      scaleGridLineWidth: 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines: true,
      //Boolean - If there is a stroke on each bar
      barShowStroke: true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth: 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing: 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing: 1,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
      //Boolean - whether to make the chart responsive
      responsive: true,
      maintainAspectRatio: true
    };

    barChartOptions.datasetFill = false;
    barChart.Bar(barChartData, barChartOptions);
   
  
   
  });
</script>

