<?php include('includes/header.php');
include_once 'acciones/sessiones.php';
include 'config/database.php';

// $id = $_GET['id'];
// if (!filter_var($id, FILTER_VALIDATE_INT)){
//   die ("Error");
// }
?>
<!-- DataTables -->

<section class="content-header">
  <h1>
    Afiliados
   </h1>
</section>
<section class="content">
  <div class="row">
    <div class="col-xs-12">

      <div class="box box-success">
        <div class="box-header">
          <h3 class="box-title">Datos de Usuarios</h3>
        </div>
        <div class="box-body">
<?php 

// $sql = "SELECT * FROM usuarios_db WHERE id_admin = $id";
// $resultado = $conn->query($sql);
// $admin = $resultado->fetch_assoc();

?>

          <form role="form" name="editar-password" id="editar-password" method="POST" action="acciones/password.php">


                    <div class="form-group">
                      <div class="row">
                        <div class="col-xs-6">
                          <label>Password</label>
                          <input type="password" class="form-control" name="password" id="password">
                        </div>
                        <div class="col-xs-6">
                          <label>Repetir Password</label>
                          <input type="password" class="form-control"  id="repetir_password">
                          <span id="resultado_password" class="help-block"></span>
                        </div>
                      </div>
                    </div>

            <input type="hidden" class="form-control" name="usuario" id="usuario" value="<?php echo $_SESSION['usuario']; ?>">
            <input type="hidden" name="registro" value="actualizar_pass">
            <center>
            <button type="submit" class="btn btn-flat btn-success text-center" id="actualizar_clave"><i class="fa fa-floppy-o"></i>Actualizar</button>
    <a style="margin-left: 20px;" class="btn btn-danger" href="javascript:history.back()"><i class="fa fa-arrow-left"></i> Regresar</a>   
  </center>
           

          </form>



        </div>
        <!-- /.box-body -->
      </div>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>


<?php include('includes/footer.php'); ?>