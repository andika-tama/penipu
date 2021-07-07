
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar" class="active">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	          <i class="fa fa-bars"></i>
	          <span class="sr-only">Toggle Menu</span>
	        </button>
        </div>
				<div class="p-4">
		  		<h1><a href="<?php echo base_url('Welcome') ?>" class="logo">CARING!</a></h1>
	        <ul class="list-unstyled components mb-5">
	          <li >
	            <a href="<?php echo base_url('Welcome') ?>"><span class="fa fa-home mr-3"></span> Home</a>
	          </li>
	          <li>
	              <a href="<?php echo base_url('cari') ?>"><span class="fa fa-search mr-3"></span> Cari Nomor Rekening</a>
	          </li>
	          <li>
              <a href="<?php echo base_url('pelapor/kelola_akun') ?>"><span class="fa fa-user mr-3"></span> Kelola akun</a>
	          </li>
	          <li>
              <a href="<?php echo base_url('laporan/buat_laporan') ?>"><span class="fa fa-edit mr-3"></span> Buat Laporan</a>
	          </li>
	          <li>
              <a href="<?php echo base_url('laporan/kelola_laporan') ?>"><span class="fas fa-pen-square mr-3"></span> Kelola Laporan</a>
	          </li>
	          <li>
              <a href="<?php echo base_url('pelapor/logout') ?>"><span class="fas fa-sign-out-alt mr-3"></span> Logout</a>
	          </li>
	        </ul>
	      </div>
    	</nav>