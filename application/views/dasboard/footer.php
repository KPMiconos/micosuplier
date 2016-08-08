<footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Edited By <a href="ahapedia.com">ahapedia</a></b>
        </div>
        <strong>Copyright &copy; 2016 <a href="#">Almsaeed Studio</a></strong> 
      </footer>

     
      
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url() ?>assets/js/jQuery-2.1.4.min.js"></script>
	<!-- ChartJS 1.0.1 -->
    <script src="<?php echo base_url() ?>assets/js/Chart.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <!--script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
	  
    </script>
	
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="<?php echo base_url() ?>assets/js/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="<?php echo base_url() ?>assets/js/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?php echo base_url() ?>assets/js/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="<?php echo base_url() ?>assets/js/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?php echo base_url() ?>assets/js/bootstrap3-wysihtml5.all.min.js"></script>
	
    <!-- Slimscroll -->
    <script src="<?php echo base_url() ?>assets/js/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url() ?>assets/js/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url() ?>assets/js/app.min.js"></script>
	<!-- AdminLTE for demo purposes -->
    <!--script src="<?php echo base_url() ?>assets/js/demo.js"></script>
	  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!--script src="<?php echo base_url() ?>assets/js/dashboard.js"></script>
    
	<!-- Bootstrap-select -->
    <script src="<?php echo base_url() ?>assets/js/select2.min.js"></script>
	<script type="text/javascript">
		 //Date picker
		$('.datepicker').datepicker({
		  autoclose: true
		 
		});
		
		$(document).ready(function(){
			$('[data-toggle="tooltip"]').tooltip();   
		});
		$.fn.modal.Constructor.prototype.enforceFocus = function() {};
		$(document).ready(function() {
		  $(".selecttree").select2();
		});
    </script>
  </body>
</html>
