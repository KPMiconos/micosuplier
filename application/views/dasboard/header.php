 <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="#" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>A</b>Mico</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Admin</b>Dasboard</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
           <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
             
              <!-- Notifications: style can be found in dropdown.less -->
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning"><?php echo $limit; ?></span>
                </a>
                <ul class="dropdown-menu" style="heigt:100px;">
                  <li class="header"><?php echo "Ada ",$limit," stok barang yang hampir habis"; ?></li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu" style="heigt:100px;">
                      <?php
						
							if(!empty($alert)){
							foreach($alert as $baris){?>
                      <li>
                        <a >
                          <i class="fa fa-warning text-yellow"></i><?php echo $baris->nama_item,"  Stok : ",$baris->jumlah," item";  ?>
                        </a>
                      </li>
							 <?php }}
								else{
									?>
									
										<td>Belum ada data</td>
									
									<?php }?>
                     
                    </ul>
                  </li>
                  <!--li class="footer"><a href="#">View all</a></li-->
                </ul>
              </li>
               <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
			  <?php
						
							if(!empty($user)){
							foreach($user as $baris){?>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php
						if(empty($baris->photo_link)){
							echo base_url(),"assets/images/default/users.png";
						}else{
							echo base_url(),"assets/images/petugas/",$baris->photo_link;
						}
					
					?>" class="user-image" alt="User Image">
                  <span class="hidden-xs"> <?php echo $baris->nama ?></span>
                </a>
                <ul class="dropdown-menu">
				
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php
						if(empty($baris->photo_link)){
							echo base_url(),"assets/images/default/users.png";
						}else{
							echo base_url(),"assets/images/petugas/",$baris->photo_link;
						}
					
					?>" class="img-circle" alt="User Image">
                    <p>
                      <?php echo $baris->nama ?>
                      <small><?php echo $baris->jabatan ?></small>
                    </p>
                  </li>
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?php echo base_url(),"petugas/viewPetugas/",$baris->id_petugas ?>" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo base_url(),"admin/logout" ?>" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
				 
                </ul>
				 <?php }}
								else{
									?>
									
										<td>Belum ada data</td>
									
									<?php }?>
              </li>
              <!-- Control Sidebar Toggle Button -->
            
            </ul>
          </div>
       
        </nav>
      </header>