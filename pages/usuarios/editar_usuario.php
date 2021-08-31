
<form class="form-horizontal" name="editar-administrador" id="editar-administrador" method="POST" action="acciones/usuarios/modelo_usuario.php">
      <!-- Modal -->
      <div id="editarusuario" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header box box-success">
              <button type="button" class="close" data-dismiss="modal">x</button>
              <h4 class="modal-title">EDITAR USUARIO</h4>
            </div>
            <div class="modal-body">

<!-- SELECT2 EXAMPLE -->
<div class="row">
  <div class="col-md-12">
<div class="box box-success">
  <div class="box-body">
      
        <div class="form-group">
        <div class="row">
                <div class="col-xs-6">
                <label>1er Nombre</label>
                  <input type="text" class="form-control" name="nombre" id="nombre">
         </div>
         <div class="col-xs-6">
                <label>2do Nombre</label>
                <input type="text" class="form-control" name="usuario" id="usuario">
      </div>
</div>
       </div>
            
       
    <!-- /.row -->
  </div>
</div>
</div>
</div>
<!-- /.box -->
<input type="text" class="form-control" name="id_admin" id="id_admin">
<input type="hidden" name="registro" value="actualizar">

<button type="submit"  class="btn btn-flat btn-success text-center"><i class="fa fa-floppy-o"></i>Actualizar</button>

            </div>
            
          </div>

        </div>
      </div>
    </form>