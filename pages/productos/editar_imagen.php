
<div class="modal fade" id="editarimagen<?php echo $data_producto['id_producto']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header box box-success">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form class="form-horizontal" name="editar-imagen" id="editar-imagen" method="POST" action="acciones/productos/modelo_productos.php">
        <div class="modal-body">


<div class="row">
  <div class="col-md-12">
      <div class="box-body">
      <div class="row">
                        <img src="imagenes/<?php echo $data_producto['imagen'] ?>"  alt="..." class="margin" style="height: 386px;width: 521px;">
                    </div>
      </div>

  </div>
                    <div class="row">
                      <div class="col-md-12">
                      <div class="box-body">
                        <input type="file" id="imagen_p" name="imagen_p" required>
                        </div>
                      </div>
                    </div>
  <input type="hidden" name="id_producto" id="id_producto" value="<?php echo $data_producto['id_producto'];?>">
  <input type="hidden" name="registro" value="actualizarimagen">
  <center>
    <button type="submit" id="save_data" class="btn btn-flat btn-success"><i class="fa fa-floppy-o"></i> Actualizar</button>
  </center>
</div>
</div>
        </form>

    </div>
  </div>
</div>