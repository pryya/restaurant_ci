<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Administrator-<?=$_SESSION['nama_user']?></title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url()?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <style type="text/css">
  @media print{
    #diprint{
      display:none;
    }
  }
  </style>
  
  <!-- Custom styles for this template-->
  <link href="<?php echo base_url()?>assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15" id="diprint">
          <i class="fas fa-store"></i>
        </div>
        <div class="sidebar-brand-text mx-3" id="diprint">Restoran</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0" id="diprint">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active" id="diprint">
        <a class="nav-link" href="<?php echo base_url('owner/welcome') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

     <!-- Divider -->
     <hr class="sidebar-divider my-0" id="diprint">
     <li class="nav-item dropdown" id="diprint">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-address-book"></i>
            <span>Laporan</span></a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Laporan Master:</h6>
            <a class="dropdown-item fa fa-user-circle" href="<?php echo base_url('owner/cari'); ?>">Laporan Pengguna</a>
            <a class="dropdown-item fa fa-fw fa-folder" href="<?php echo base_url('owner/cari_menu'); ?>">Laporan Makanan</a>
            <a class="dropdown-item fa fa-envelope" href="<?php echo base_url('owner/cari_pesanan'); ?>">Laporan Pesanan</a>
            <a class="dropdown-item fa fa-bell" href="<?php echo base_url('owner/cari_transaksi'); ?>">Laporan Transaksi</a>
            </div>
      </li>


  

      <li class="nav-item active" id="diprint">
        <a class="nav-link" href="<?php echo base_url('auth/logout'); ?>">
          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
          <span>Logout</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow" aria-haspopup="true" aria-expanded="false">
              <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?=$_SESSION['nama_user']?></span>
            </li>
          </ul>
        </nav>
        <!-- End of Topbar -->