<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistem Informasi Puskesmas Ambulu</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url("assets/") ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url("assets/") ?>bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url("assets/") ?>bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url("assets/") ?>dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo base_url("assets/") ?>dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?php echo base_url("assets/") ?>bower_components/morris.js/morris.css">
  <link rel="stylesheet" href="<?php echo base_url("assets/") ?>bower_components/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="<?php echo base_url("assets/") ?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url("assets/") ?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="<?php echo base_url("assets/") ?>bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="<?php echo base_url("assets/") ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="<?php echo base_url("assets/") ?>https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" href="<?php echo base_url("assets/src/") ?>jquery.inputpicker.css"/>
  
  
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <a href="#" class="logo">
      <span class="logo-mini"><b>P</b>A</span>
      <span class="logo-lg"><b>Puskesmas</b>Ambulu</span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url("assets/avatar.jpg") ?>" class="user-image" alt="User Image">
              <span class="hidden-xs">Admin</span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src="<?php echo base_url("assets/avatar.jpg") ?>" class="img-circle" alt="User Image">

                <p>
                  Nama Administrator
                  <small>Administrator</small>
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-right">
                  <a href="<?php echo base_url('c_admin/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url("assets/avatar.jpg") ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Admin</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Aktif</a>
        </div>
      </div>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU UTAMA</li>
        <li class="<?php if ($menuName=='dashboard'){echo 'active';} ?>" >
          <a href="<?php echo base_url() ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li  class="treeview <?php if ($menuName=='obat' || $menuName=='pemakaian'||$menuName=='permintaan'||$menuName=='penerimaan'){echo 'active';} ?>"  class="treeview active">
          <a href="#">
            <i class="fa fa-table"></i> <span>Input</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if ($menuName=='obat'){echo 'active';} ?>" ><a href="<?php echo base_url('obat') ?>"><i class="fa fa-circle-o"></i> Obat</a></li>
            <li class="<?php if ($menuName=='pemakaian'){echo 'active';} ?>" ><a href="<?php echo base_url('pemakaian') ?>"><i class="fa fa-circle-o"></i> Pemakaian</a></li>
            <li class="<?php if ($menuName=='permintaan'){echo 'active';} ?>" ><a href="<?php echo base_url('pemakaian') ?>"><a href="<?php echo base_url('permintaan') ?>"><i class="fa fa-circle-o"></i> Permintaan</a></li>
            <li class="<?php if ($menuName=='penerimaan'){echo 'active';} ?>" ><a href="<?php echo base_url('pemakaian') ?>"><a href="<?php echo base_url('penerimaan') ?>"><i class="fa fa-circle-o"></i> Penerimaan</a></li>
          </ul>
        </li>
        <li  class="treeview <?php if ($menuName=='laporanKeseluruhan'||$menuName=='laporanStok'||$menuName=='laporanPemakaian' || $menuName=='laporanPenerimaan'||$menuName=='laporanPermintaan'||$menuName=='laporan'){echo 'active';} ?>" >
          <a href="#">
            <i class="fa fa-table"></i> <span> Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if ($menuName=='laporanStok'){echo 'active';} ?>" ><br><a href="<?php echo base_url('laporanStok') ?>"><i class="fa fa-circle-o"></i> Stok</a></li>
            <li class="<?php if ($menuName=='laporanPemakaian'){echo 'active';} ?>" ><br><a href="<?php echo base_url('laporanPemakaian') ?>"><i class="fa fa-circle-o"></i> Pemakaian</a></li>
            <li class="<?php if ($menuName=='laporanPermintaan'){echo 'active';} ?>" ><br><a href="<?php echo base_url('laporanPermintaan') ?>"><i class="fa fa-circle-o"></i> Permintaan</a></li>
            <li class="<?php if ($menuName=='laporanPenerimaan'){echo 'active';} ?>" ><br><a href="<?php echo base_url('laporanPenerimaan') ?>"><i class="fa fa-circle-o"></i> Penerimaan</a></li>
            <li class="<?php if ($menuName=='laporanKeseluruhan'){echo 'active';} ?>" ><br><a href="<?php echo base_url('laporanKeseluruhan') ?>"><i class="fa fa-circle-o"></i> Laporan Keseluruhan</a></li>
          </ul>
        </li>
      </ul>
    </section>
  </aside>

