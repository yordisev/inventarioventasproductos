
<div class="modal fade" id="editarproducto<?php echo $data_producto['id_producto']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header box box-success">
        <h5 class="modal-title" id="exampleModalLabel">Editar Producto: <?php echo $data_producto['producto']; ?> </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form class="form-horizontal" name="editar-productos" id="editar-productos" method="POST" action="acciones/productos/modelo_productos.php">
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
              <input type="text" class="form-control" name="producto" id="producto" value="<?php echo $data_producto['producto']; ?>">
            </div>
            <div class="col-xs-6">
              <label>TIPO</label>
              <input type="text" class="form-control" name="tipo" id="tipo" value="<?php echo $data_producto['tipo']; ?>">
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-xs-12">
              <label>DISTRIBUIDOR</label>
              <select class="form-control" name="distribuidor" id="distribuidor" required>
                  <option value="<?php echo $data_producto['distribuidor']; ?>"><?php echo $data_producto['distribuidor']; ?></option>
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
              <select class="form-control" id="estado" name="estado" data-placeholder="-- Seleccionar --" autocomplete="off" required>
                                    <option value="<?php echo $data_producto['estado']; ?>"><?php echo $data_producto['estado']; ?></option>
                                    <option value="ACTIVO">ACTIVO</option>
                                    <option value="INACTIVO">INACTIVO</option>
                                </select>
            </div>
            <div class="col-xs-6">
              <label>STOCK</label>
              <input type="text" class="form-control" name="stock" id="stock" value="<?php echo $data_producto['stock']; ?>">
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-xs-6">
              <label>PRECIO VENTA</label>
              <input type="text" class="form-control" name="precio_venta" id="precio_venta" value="<?php echo $data_producto['precio_venta']; ?>">
            </div>
            <div class="col-xs-6">
              <label>PRECIO COMPRA</label>
              <input type="text" class="form-control" name="precio_compra" id="precio_compra" value="<?php echo $data_producto['precio_compra']; ?>">
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-xs-6">
              <label>VENDIDO TOTAL</label>
              <input type="text" class="form-control" name="vendido" id="vendido" value="<?php echo $data_producto['vendido']; ?>">
            </div>
            <div class="col-xs-6">
              <label>GANANCIAS</label>
              <input type="text" class="form-control" name="ganancias" id="ganancias" value="<?php echo $data_producto['ganancias']; ?>">
            </div>
          </div>
        </div>
      </div>
      <!-- /.box-body -->
    </div>

  </div>
  <input type="hidden" name="id_producto" id="id_producto" value="<?php echo $data_producto['id_producto'];?>">
  <input type="hidden" name="registro" value="actualizar">
  <center>
    <button type="submit" id="save_data" class="btn btn-flat btn-success"><i class="fa fa-floppy-o"></i>Actualizar</button>
  </center>
  <!-- /.col (right) -->
</div>
</div>
        </form>

    </div>
  </div>
</div>