<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
    <link rel="stylesheet" href="bootstrap/css/sweetalert2.min.css">

  <script src="bootstrap/js/sweetalert2.all.min.js"></script>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html"><b>Admin</b>LTE</a>
        </div>
<?php


session_start();
$cerrar_session = $_GET['cerrar_sesion'];
if($cerrar_session){
    session_destroy();
}
?>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Sign in to start your session</p>
            <form  name="logueo_admin" id="logueo_admin" method="POST" action="acciones/logue_admin.php">
            
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
               
                <div class="row">
                    <!-- /.col -->
                        <input type="hidden" name="logueo_admin" value="1">
                        <button type="submit"  class="btn btn-block btn-success btn-flat">Iniciar</button>
                  
                    <!-- /.col -->
                </div>
        </form>


        </div>
        <!-- /.login-box-body -->
    </div>
    <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="ajax/logue_ajax.js"></script>
</body>

</html>