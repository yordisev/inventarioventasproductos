<form class="form-horizontal" name="crear-proveedor" id="crear-proveedor" method="POST" action="acciones/proveedor/modelo_proveedor.php" enctype="multipart/form-data" >
  <!-- Modal -->
  <div id="agregarproveedor" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header box box-success">
          <button type="button" class="close" data-dismiss="modal">x</button>
          <h4 class="modal-title">AGREGAR PROVEEDOR</h4>
        </div>
        <div class="modal-body">


          <div class="row">
            <div class="col-md-6">

              <div class="box box-success">
                <div class="box-body">
                  <!-- Date dd/mm/yyyy -->
                  <div class="form-group">
                    <div class="row">
                      <div class="col-xs-6">
                        <label>CODIGO</label>
                        <input type="text" class="form-control" name="codigo" id="codigo">
                      </div>
                      <div class="col-xs-6">
                        <label>PROVEEDOR</label>
                        <input type="text" class="form-control" name="proveedor" id="proveedor">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-xs-12">
                        <label>TIPO</label>
                        <input type="text" class="form-control" name="tipo" id="tipo">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-xs-6">
                        <label>NOMBRE</label>
                        <input type="text" class="form-control" name="nombre" id="nombre">
                      </div>
                      <div class="col-xs-6">
                        <label>APELLIDO</label>
                        <input type="text" class="form-control" name="apellido" id="apellido">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-xs-6">
                        <label>NIT</label>
                        <input type="text" class="form-control" name="nit" id="nit">
                      </div>
                      <div class="col-xs-6">
                        <label>ESTADO</label>
                        <input type="text" class="form-control" name="estado" id="estado">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->


            </div>
            <!-- /.col (left) -->
            <div class="col-md-6">
              <div class="box box-success">
                <div class="box-body">
                  <!-- Date -->

                  <div class="form-group">
                    <div class="row">
                      <div class="col-xs-12">
                        <img src="http://placehold.it/150x100" alt="..." class="margin" style="width: 400px;height: 270px;">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-xs-12">
                        <input type="file" id="imagen_p" name="imagen_p">
                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <!-- /.box -->
            </div>

            <input type="hidden" name="registro" value="nuevo">
            <center>
              <button type="submit" id="save_data" class="btn btn-flat btn-success"><i class="fa fa-floppy-o"></i> Agregar</button>
              <a style="margin-left: 20px;" class="btn btn-flat btn-danger" href="javascript:history.back()"><i class="fa fa-arrow-left"></i> Regresar</a>
            </center>
            <!-- /.col (right) -->
          </div>
        </div>

      </div>

    </div>
  </div>
</form>
<!------------------ Fin Modal -------------------------------------->