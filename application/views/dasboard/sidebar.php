      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo base_url() ?>assets/images/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>MicoSuplier</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
         
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active treeview">
              <a href="home.html">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa pull-right"></i>
              </a>
              
            </li>
          
         
            <li class="treeview">
              <a href="#">
                <i class="fa fa-user-secret"></i>
                <span>Petugas</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url() ?>admin/listPetugas"><i class="fa fa-circle-o"></i> List Petugas</a></li>
                <li><a href="<?php echo base_url() ?>admin/addPetugas"><i class="fa fa-circle-o"></i> Add Petugas</a></li>
               
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa  fa-truck"></i>
                <span>Suplier</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url() ?>admin/listSuplier"><i class="fa fa-circle-o"></i> List Suplier</a></li>
                <li><a href="<?php echo base_url() ?>admin/addSuplier"><i class="fa fa-circle-o"></i> Add Suplier</a></li>
              
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-users"></i> <span>Customer</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url() ?>admin/listCustomer"><i class="fa fa-circle-o"></i> List Customer</a></li>
                <li><a href="<?php echo base_url() ?>admin/addCustomer"><i class="fa fa-circle-o"></i> Add Customer</a></li>
                
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa  fa-shield"></i> <span>Service</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url() ?>admin/listService"><i class="fa fa-circle-o"></i> View Service</a></li>
                <li><a href="<?php echo base_url() ?>admin/addService"><i class="fa fa-circle-o"></i> Add Service</a></li>
				<li><a href="<?php echo base_url() ?>admin/listUnsolved"><i class="fa fa-circle-o"></i> Solving</a></li>
              </ul>
            </li>
			<li class="treeview">
              <a href="#">
                <i class="fa fa-opencart"></i> <span>Produk</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url() ?>admin/listProduk"><i class="fa fa-circle-o"></i> List Produk</a></li>
                <li><a href="<?php echo base_url() ?>admin/addProduk"><i class="fa fa-circle-o"></i> Add Produk</a></li>
              </ul>
            </li>
           <li class="">
              <a href="#">
                <i class="fa fa-expeditedssl"></i> <span>Privilege</span>
              </a>
            </li>
             
           <li class="">
              <a href="<?php echo base_url() ?>admin/logout">
                <i class="fa fa-power-off"></i> <span>Logout</span>
               
              </a>
              
            </li>
          
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
