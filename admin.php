<?php include('includes/header.php');
include_once 'acciones/sessiones.php';
include 'config/database.php';

?>
<!-- DataTables -->

<section class="content-header">
  <h1>
    Afiliados
    <a class="btn btn-success btn-flat pull-right" href="" title="Agregar" data-toggle="modal" data-target="#agregarusuarios"><i class="fa fa-plus"></i> Agregar</a>
  </h1>
</section>
<?php include("pages/usuarios/agregar_usuario.php");?>
<section class="content">
  <div class="row">
    <div class="col-xs-12">

      <div class="box box-success">
        <div class="box-header">
          <h3 class="box-title">Datos de Usuarios</h3>
        </div>
        <div class="box-body">
        <div class="table-responsive">
        <table  class="table table-bordered table-striped">
            <thead>
              <tr>
              <th class="text-center">ID_ADMIN</th>
                <th class="text-center">NOMBRE</th>
                <th class="text-center">USUARIO</th>
                <th class="text-center">ACCIONES</th>
              </tr>
            </thead>
            <tbody id="lista_usuarios"></tbody>
          </table>
          <?php include("pages/usuarios/editar_usuario.php");?>
        </div>
</div>
        <!-- /.box-body -->
      </div>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>


<?php include('includes/footer.php'); ?>