<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-violet sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('admin/dashboard') ?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-search-dollar"></i>
                </div>
                <div class="sidebar-brand-text mx-1">Lacak Rekening </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('admin/dashboard') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Kelola Data
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <!-- Kelola laporan masuk -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-inbox"></i>
                    <span>Laporan Masuk</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Kelola laporan masuk</h6>
                        <a class="collapse-item" href="<?php echo base_url('admin/laporan_masuk') ?>">Daftar Laporan Masuk</a>
                        <a class="collapse-item" href="<?php echo base_url('admin/laporan_masuk/laporan_menunggu_konfirmasi') ?>">Menunggu konfirmasi </a>
                        <a class="collapse-item" href="<?php echo base_url('admin/laporan_masuk/laporan_diterima') ?>">Laporan Diterima </a>
                        <a class="collapse-item" href="<?php echo base_url('admin/laporan_masuk/laporan_ditolak') ?>">Laporan Ditolak </a>
                    </div>
                </div>
            </li>
            <!-- Kelola nomor rekening -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseNoRek"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="far fa-credit-card"></i>
                    <span>Nomor Rekening</span>
                </a>
                <div id="collapseNoRek" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Kelola nomor rekening</h6>
                        <a class="collapse-item" href="<?php echo base_url('admin/norek') ?>">Daftar Nomor Rekening</a>
                        <a class="collapse-item"  href="<?php echo base_url('admin/norek/tambah_norek') ?>">Tambah Nomor Rekening</a>
                    </div>
                </div>
            </li>

            <!-- Kelola BANK -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBank"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-university"></i>
                    <span>Bank</span>
                </a>
                <div id="collapseBank" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Kelola data bank</h6>
                        <a class="collapse-item" href="<?php echo base_url('admin/bank') ?>">Daftar Bank</a>
                        <a class="collapse-item" href="<?php echo base_url('admin/bank/tambah_bank') ?>">Tambah Data Bank</a>
                    </div>
                </div>
            </li>

            <!-- Kelola data pengguna -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-users"></i>
                    <span>Pengguna</span>
                </a>
                <div id="collapseUser" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Kelola data pengguna</h6>
                        <a class="collapse-item" href="<?php echo base_url('admin/pengguna') ?>">Daftar Pengguna</a>
                    </div>
                </div>
            </li>

            <hr class="sidebar-divider">
           
            <!-- Logout -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('akses/login/logout') ?>">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Log Out</span></a>
            </li>

            

        </ul>
        <!-- End of Sidebar -->

  