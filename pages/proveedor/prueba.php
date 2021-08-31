





<div class="modal fade" id="editarproveedor<?php echo $proveedor['codigo']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header box box-success">
        <h5 class="modal-title" id="exampleModalLabel"> Editar Proveedor </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form class="form-horizontal" name="editar-proveedor-imagen" id="editar-proveedor-imagen" method="POST" action="acciones/proveedor/modelo_proveedor.php" enctype="multipart/form-data" >
        <div class="modal-body">


<div class="row">

<div class="col-md-12">
<div class="box box-success">
  <div class="box-body">
    <!-- Date -->

    <div class="form-group">
      <div class="row">
        <div class="col-xs-12 text-center">
          <img src="imagenes/<?php echo $proveedor['imagen']; ?>" class="margin" style="width: 500px;height: 370px;">
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="row">
        <div class="col-xs-12 text-center">
          <input type="file" id="imagen_p" name="imagen_p" require>
        </div>
      </div>
    </div>
  </div>

</div>
<!-- /.box -->
</div>
  <input type="text" class="form-control" name="codigo" id="codigo" value="<?php echo $proveedor['codigo']; ?>">
  <input type="hidden" name="registro" value="actualizarimagen">
  <center>
    <button type="submit" id="save_data" class="btn btn-flat btn-success"><i class="fa fa-floppy-o"></i> Agregar</button>
    <a style="margin-left: 20px;" class="btn btn-flat btn-danger" href="javascript:history.back()"><i class="fa fa-arrow-left"></i> Regresar</a>
  </center>
  <!-- /.col (right) -->
</div>
</div>
        </form>

    </div>
  </div>
</div>