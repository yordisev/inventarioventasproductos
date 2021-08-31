<?php include('includes/header.php');
include_once 'acciones/sessiones.php';
include 'config/database.php';
require_once "config/funciones.php";
$proveedor = proveedor();
?>
<!-- DataTables -->

<section class="content-header">
  <h1>
    Proveedores
    <a class="btn btn-success btn-flat pull-right" href="" title="Agregar" data-toggle="modal" data-target="#agregarproveedor"><i class="fa fa-plus"></i> Agregar</a>
  </h1>
</section>
<?php include("pages/proveedor/agregar_proveedor.php");?>
<section class="content">
  <div class="row">
    <div class="col-xs-12">

      <div class="box box-success">
        <div class="box-header">
          <h3 class="box-title">Datos de Usuarios</h3>
        </div>
        <div class="box-body">
            <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="text-center">ESTADO</th>
                  <th class="text-center">PROVEEDOR</th>
                  <th class="text-center">TIPO</th>
                  <th class="text-center">NOMBRE</th>
                  <th class="text-center">NIT</th>
                  <th class="text-center">IMAGEN</th>
                  <th class="text-center">ACCIONES</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                <?php
                foreach($proveedor as $x => $proveedor) {
                        ?>
                  <td class="text-center">
                  <?php 
      if ($proveedor['estado'] == 'ACTIVO') {
        echo '<span class="label label-success">Activo</span>';
      } else if ($proveedor['estado'] == 'INACTIVO') {
        echo '<span class="label label-danger">Inactivo</span>';
      } 
      ?>
                </td>
                  <td class="text-center"><?php echo $proveedor['proveedor'] ?></td>
                  <td class="text-center"><?php echo $proveedor['tipo'] ?></td>
                  <td class="text-center"><?php echo $proveedor['nombre'] ?></td>
                  <td class="text-center"><?php echo $proveedor['nit'] ?></td>
                  <td class="text-center"><img src="imagenes/<?php echo $proveedor['imagen'] ?>" class="margin" style="width: 100px;height: 70px;"></td>
                  <td class="text-center">
                  <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#editarproveedor"  
                  data-codigo="<?php echo $proveedor['codigo']?>" 
                  data-proveedor="<?php echo $proveedor['proveedor']?>" 
                  data-tipo="<?php echo $proveedor['tipo']?>" 
                  data-nombre="<?php echo $proveedor['nombre']?>" 
                  data-apellido="<?php echo $proveedor['apellido']?>" 
                  data-nit="<?php echo $proveedor['nit']?>" 
                  data-imagen="imagenes/<?php echo $proveedor['imagen'] ?>"
                  data-estado="<?php echo $proveedor['estado']?>"><i class="fa fa-edit"></i></button>
                 
                  <a data-codigo="<?php echo $proveedor['codigo']?>" 
                  data-proveedor="<?php echo $proveedor['proveedor']?>"
                  href="#" class="btn btn-danger btn-xs borrar_registro" 
                   ><i class="fa  fa-trash-o"></i></a>

                   <a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#editarproveedor<?php echo $proveedor['codigo']?>" ><i class="fa  fa-file-image-o"></i></a>
                  
                  </td>
                  <?php include("pages/proveedor/prueba.php");?>
                </tr>
                <?php
                        }
                        ?>
                </tbody>
              </table>
              
              <?php include("pages/proveedor/editar_proveedor.php");?>
              
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
<script src="ajax/proveedor/proveedor.js"></script>