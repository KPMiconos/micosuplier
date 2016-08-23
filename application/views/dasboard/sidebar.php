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
              <a href="<?php echo base_url()?>admin">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa pull-right"></i>
              </a>
              
            </li>
          
         
            <li class="treeview">
              <a href="#">
                <i class="fa fa-user-secret"></i>
                <span>Karyawan</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
				<li><a href="<?php echo base_url() ?>petugas/addPetugas"><i class="fa fa-circle-o"></i> Add Karyawan</a></li>
                <li><a href="<?php echo base_url() ?>petugas/listPetugas"><i class="fa fa-circle-o"></i> List Karyawan</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa  fa-truck"></i>
                <span>Supplier</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
			   <li><a href="<?php echo base_url() ?>supplier/addSupplier"><i class="fa fa-circle-o"></i> Add Supplier</a></li>
               <li><a href="<?php echo base_url() ?>supplier/listSupplier"><i class="fa fa-circle-o"></i> List Supplier</a></li>
               
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-users"></i> <span>Customer</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
				<li><a href="<?php echo base_url() ?>customer/addInstitusi"><i class="fa fa-circle-o"></i> Add Institusi</a></li>
				<li><a href="<?php echo base_url() ?>customer/addCustomer"><i class="fa fa-circle-o"></i> Add Customer</a></li>
				<li><a href="<?php echo base_url() ?>customer/listInstitusi"><i class="fa fa-circle-o"></i> List Institusi</a></li>
                <li><a href="<?php echo base_url() ?>customer/listCustomer"><i class="fa fa-circle-o"></i> List Customer</a></li>
                
                
              </ul>
            </li>
			 <li class="treeview">
              <a href="#">
                <i class="fa fa-th"></i>
                <span>Master Item</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
				<li><a href="<?php echo base_url() ?>produk/addItem"><i class="fa fa-circle-o"></i> Tambah Item </a></li>
                <li><a href="<?php echo base_url() ?>produk/listItem"><i class="fa fa-circle-o"></i> List Item</a></li>
				<li><a href="<?php echo base_url() ?>produk/listSatuan"><i class="fa fa-circle-o"></i> Satuan</a></li>
				<li><a href="<?php echo base_url() ?>produk/listTipeItem"><i class="fa fa-circle-o"></i>Tipe Item</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa  fa-shield"></i> <span>Service</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
				<li><a href="<?php echo base_url() ?>service/addService"><i class="fa fa-circle-o"></i> Add Service</a></li>
                <li><a href="<?php echo base_url() ?>service/listService"><i class="fa fa-circle-o"></i> View Service</a></li>
				<li><a href="<?php echo base_url() ?>service/listUnsolved"><i class="fa fa-circle-o"></i> Solving</a></li>
              </ul>
            </li>
			<li class="treeview">
              <a href="#">
                <i class="ion ion-bag"></i> <span>Pembelian</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
				<li><a href="<?php echo base_url() ?>pembelian/pemesanan"><i class="fa fa-circle-o"></i> Pemesanan</a></li>
                <li><a href="<?php echo base_url() ?>pembelian/listPemesanan"><i class="fa fa-circle-o"></i> List Pemesanan</a></li>
				
                
              </ul>
            </li>
			<li class="treeview">
              <a href="#">
                <i class="fa fa-cubes"></i> <span>Gudang</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
				
				<li><a href="<?php echo base_url() ?>gudang/listPenerimaan"><i class="fa fa-circle-o"></i> Penerimaan Barang</a></li>
				<li><a href="<?php echo base_url() ?>gudang/listPengeluaran"><i class="fa fa-circle-o"></i> Pengeluaran Barang</a></li>
                <li><a href="<?php echo base_url() ?>gudang/listBarang"><i class="fa fa-circle-o"></i> Stok Barang</a></li>
				<li><a href="<?php echo base_url() ?>gudang/listDefect"><i class="fa fa-circle-o"></i> Barang Rusak</a></li>
               
              </ul>
            </li>
			<li class="treeview">
              <a href="#">
                <i class="fa fa-industry"></i> <span>Produksi</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
				<li><a href="<?php echo base_url() ?>produksi/addBom"><i class="fa fa-circle-o"></i> Add BOM</a></li>
				<li><a href="<?php echo base_url() ?>produksi/addProduksi"><i class="fa fa-circle-o"></i> Add Produksi</a></li>
				<li><a href="<?php echo base_url() ?>produksi/listBom"><i class="fa fa-circle-o"></i> List BOM</a></li>
                <li><a href="<?php echo base_url() ?>produksi/listProduksi"><i class="fa fa-circle-o"></i> List Produksi</a></li>
              </ul>
            </li>
			<li class="treeview">
              <a href="#">
                <i class="fa fa-opencart"></i> <span>Penjualan</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
				<li><a href="<?php echo base_url() ?>penjualan/addPenjualan"><i class="fa fa-circle-o"></i> Add Penjualan</a></li>
                <li><a href="<?php echo base_url() ?>penjualan/listPenjualan"><i class="fa fa-circle-o"></i> List Penjualan</a></li>
			
                
              </ul>
            </li>
			<li class="treeview">
              <a href="#">
                <i class="fa fa-line-chart"></i> <span>Laporan</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
				<li><a href="<?php echo base_url() ?>laporan/laporanMasuk"><i class="fa fa-circle-o"></i> Barang Masuk</a></li>
                <li><a href="<?php echo base_url() ?>laporan/laporanKeluar"><i class="fa fa-circle-o"></i>Barang Keluar</a></li>
				<li><a href="<?php echo base_url() ?>laporan/listPenjualan"><i class="fa fa-circle-o"></i>Barang Rusak</a></li>
				<li><a href="<?php echo base_url() ?>admin/Report"><i class="fa fa-circle-o"></i>Penggantian</a></li>
                
              </ul>
            </li>
           <li class="">
              <a href="<?php echo base_url() ?>petugas/privilege">
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
