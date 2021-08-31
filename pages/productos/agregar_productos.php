<form class="form-horizontal" name="crear-productos" id="crear-productos" method="POST" action="acciones/productos/modelo_productos.php">
  <!-- Modal -->
  <div id="agregarproductos" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header box box-success">
          <button type="button" class="close" data-dismiss="modal">x</button>
          <h4 class="modal-title">AGREGAR PRODUCTO</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">

              <div class="box box-success">
                <div class="box-body">
                  <!-- Date dd/mm/yyyy -->
                  <div class="form-group">
                    <div class="row">
                      <div class="col-xs-6">
                        <label>PRODUCTO</label>
                        <input type="text" class="form-control" name="producto" id="producto" autocomplete="off" >
                      </div>
                      <div class="col-xs-6">
                        <label>TIPO</label>
                        <select class="form-control" id="tipo" name="tipo" data-placeholder="-- Seleccionar --" autocomplete="off" >
                                    <option value="">Seleccionar</option>
                                    <option value="UNIDAD">UNIDAD</option>
                                    <option value="DOCENA">DOCENA</option>
                                </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-xs-12">
                        <label>DISTRIBUIDOR</label>
                        <select class="form-control" name="distribuidor" id="distribuidor" >
                  <option value="">Seleccionar</option>
                  <?php
                  $query = mysqli_query($conn, "SELECT  proveedor FROM proveedor_db");
                  while ($db_distribuidor = mysqli_fetch_array($query)) {
                  ?>
                    <option value="<?php echo $db_distribuidor['proveedor'] ?>"> <?php echo $db_distribuidor['proveedor'] ?> </option>
                  <?php
                  }
                  ?>
                </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-xs-6">
                        <label>ESTADO</label>
                        <select class="form-control" id="estado" name="estado" autocomplete="off" >
                                    <option value="">Seleccionar</option>
                                    <option value="ACTIVO">ACTIVO</option>
                                    <option value="INACTIVO">INACTIVO</option>
                                </select>
                      </div>
                      <div class="col-xs-6">
                        <label>STOCK</label>
                        <input type="number" class="form-control" name="stock" id="stock" autocomplete="off" >
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-xs-6">
                        <label>PRECIO VENTA</label>
                        <input type="number" class="form-control" name="precio_venta" id="precio_venta" autocomplete="off" >
                      </div>
                      <div class="col-xs-6">
                        <label>PRECIO COMPRA</label>
                        <input type="number" class="form-control" name="precio_compra" id="precio_compra" autocomplete="off" >
                      </div>
                    </div>
                  </div>
                  <!-- <div class="form-group">
                    <div class="row">
                      <div class="col-xs-6">
                        <label>VENDIDO TOTAL</label>
                        <input type="number" class="form-control" name="vendido" id="vendido" autocomplete="off" required>
                      </div>
                      <div class="col-xs-6">
                        <label>GANANCIAS</label>
                        <input type="number" class="form-control" name="ganancias" id="ganancias" autocomplete="off" required>
                      </div>
                    </div>
                  </div> -->
                  <div class="form-group">
                    <div class="row">
                      <div class="col-xs-12">
                        <input type="file" id="imagen_p" name="imagen_p" >
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->


            </div>
            <input type="hidden" name="registro" value="nuevo">
            <center>
              <button type="submit" id="save_data" class="btn btn-flat btn-success"><i class="fa fa-floppy-o"></i> Agregar</button>
          
            </center>
          </div>
        </div>

      </div>

    </div>
  </div>
</form>
<!------------------ Fin Modal -------------------------------------->