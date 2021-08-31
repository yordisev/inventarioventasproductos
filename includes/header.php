<?php
include_once 'acciones/sessiones.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Data Tables</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bootstrap/css/iconos.min.css">
  
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/select2.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/skin-green.min.css">

  <link rel="stylesheet" href="bootstrap/css/sweetalert2.min.css">

  <script src="bootstrap/js/sweetalert2.all.min.js"></script>
</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Y</b>Y</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Inventario</b>Y</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
      
       
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION['nombre'];?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                <?php echo $_SESSION['usuario'];?>
                  <small>Tecnologo</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="actualizar_password.php?usuario=<?php echo $_SESSION['usuario'];?>" class="btn btn-default btn-flat">Cambiar Clave</a>
                </div>
                <div class="pull-right">
                  <a href="index.php?cerrar_sesion=true" class="btn btn-default btn-flat">Cerrar Session</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Yordis</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->

      <ul class="sidebar-menu"  data-widget="treeview" role="menu" data-accordion="false">
        <li class="header">MENU NAVEGACION</li>
        <li class=" treeview">
          <a href="start.php">
            <i class="fa fa-home"></i> <span>Inicio</span>
          </a>
        </li>
        <?php if ($_SESSION['nivel'] == 1): ?>
        <li class=" treeview">
          <a href="#">
            <i class="fa  fa-users"></i>
            <span>Administradores</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="admin.php"><i class="fa fa-circle-o"></i>Usuarios</a></li>
            <li class=""><a href="siguiente.php"><i class="fa fa-circle-o"></i>Siguiente</a></li>
            <li class=""><a href="buscarafiliado.php"><i class="fa fa-circle-o"></i>Buscar</a></li>
          </ul>
        </li>
        <?php endif; ?>

        <li class=" treeview">
          <a href="#">
            <i class="fa fa-list-alt"></i>
            <span>Productos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="productos.php"><i class="fa fa-circle-o"></i>Productos</a></li>
            <li class=""><a href="ventas_realizadas.php"><i class="fa fa-circle-o text-green"></i>Ventas Realizadas</a></li>
            <li class=""><a href="ventas_pendientes.php"><i class="fa fa-circle-o text-red"></i>Recaudos Pendientes</a></li>
            <li class=""><a href="ventas.php"><i class="fa fa-credit-card"></i>Ventas</a></li>
          </ul>
        </li>

        <li class=" treeview">
          <a href="#">
            <i class="fa fa-black-tie"></i>
            <span>Proveedores</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="proveedor.php"><i class="fa fa-circle-o"></i>Proveedor</a></li>
            <li class=""><a href="buscar.php"><i class="fa fa-circle-o"></i>Productos</a></li>
            <li class=""><a href="buscarafiliado.php"><i class="fa fa-circle-o"></i>Buscar</a></li>
          </ul>
        </li>
      
        <li class="header">LABELS</li>
        <li class=""><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

  