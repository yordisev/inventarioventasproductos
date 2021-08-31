<?php include('includes/header.php');
include_once 'acciones/sessiones.php';
include 'config/database.php';
require_once "config/funciones.php";
$productos = productos();
?>
<!-- DataTables -->

<section class="content-header">
  <h1>
    Afiliados
    <a class="btn btn-success btn-flat pull-right" href="" title="Agregar" data-toggle="modal" data-target="#agregarproductos"><i class="fa fa-plus"></i> Agregar</a>
  </h1>
</section>
<?php include("pages/productos/agregar_productos.php");?>
<section class="content">
  <div class="row">
    <div class="col-xs-12">

      <div class="box box-success">
        <div class="box-header">
          <h3 class="box-title">Datos de Usuarios</h3>
        </div>
        <div class="box-body">
            <div class="table-responsive">
              <table id="tabla_productos" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="text-center">ESTADO</th>
                  <th class="text-center">PRODUCTO</th>
                  <th class="text-center">TIPO</th>
                  <th class="text-center">DISTRIBUIDOR</th>
                  <th class="text-center">STOCK</th>
                  <th class="text-center">PRECIO VENTA</th>
                  <th class="text-center">ACCIONES</th>
                </tr>
                </thead>
                <thead>
                
                </thead>
              </table>
              
              <?php include("pages/productos/editar_productos.php");?>
              
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
<script src="ajax/productos/productos.js"></script>