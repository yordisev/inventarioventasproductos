<?php include('includes/header.php');
include_once 'acciones/sessiones.php';
?>
<!-- DataTables -->

<section class="content-header">
  <h1>
    Ventas Realizadas
    <a class="btn btn-success btn-flat pull-right" href="" title="Agregar" data-toggle="modal" data-target="#agregarproveedor"><i class="fa fa-plus"></i> Agregar</a>
  </h1>
</section>
<div class="modal fade" id="cobrosModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Detalle de cobros</h4>
      </div>
      <div class="modal-body">
        <div id="loader2" class="text-center"></div>
		
		
		<div class="ver_modal_cobro"></div>
		<div id="loader_pago" class="row-fluid"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
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
                  <th class="text-center">N°</th>
                  <th class="text-center">USUARIO</th>
                  <th class="text-center">CODIGO_VENTA</th>
                  <th class="text-center">ESTADO</th>
                  <th class="text-center">ACCIONES</th>
                </tr>
                </thead>
                <tbody class="ventas_realizadas_tabla">
               
                </tbody>
              </table>
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
<script src="ajax/ventas/ventas_realizadas.js"></script>