
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
						<a href="<?php echo base_url('akses/login') ?>"><span class="fas fa-sign-in-alt mr-3"></span> Login</a>
					</li>
					<li>
						<a href="<?php echo base_url('akses/login/register') ?>"><span class="fa fa-edit mr-3"></span> Register</a>
					</li>
				</ul>
			</div>
		</nav>