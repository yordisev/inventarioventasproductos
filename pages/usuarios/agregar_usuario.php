
  <form class="form-horizontal" name="crear-administrador" id="crear-administrador" method="POST" action="acciones/usuarios/modelo_usuario.php">
      <!-- Modal -->
      <div id="agregarusuarios" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header box box-success">
              <button type="button" class="close" data-dismiss="modal">x</button>
              <h4 class="modal-title">AÑADIR USUARIO</h4>
            </div>
            <div class="modal-body">

<!-- SELECT2 EXAMPLE -->
<div class="row">
  <div class="col-md-12">
  <div class="box-body">
        <div class="form-group">
        <div class="row">
                <div class="col-xs-4">
                <label>USUARIO</label>
                  <input type="text" class="form-control" name="usuario" placeholder="usuario">
         </div>
         <div class="col-xs-4">
                <label>NOMBRE</label>
                <input type="text" class="form-control" name="nombre" placeholder="nombre">
      </div>
      <div class="col-xs-4">
                <label>PASSWORD</label>
                  <input type="password" class="form-control" name="password" placeholder="password">
        </div>
</div>
       </div>
     
    <!-- /.row -->
  </div>

</div>
</div>
<!-- /.box -->

<div class="row">
  <div class="col-md-6">

   


  </div>
 
<input type="hidden" name="registro" value="nuevo">

    <button type="submit" id="save_data" class="btn btn-flat btn-success text-center"><i class="fa fa-floppy-o"></i> Agregar</button>

                          
  <!-- /.col (right) -->
</div>
            </div>
            
          </div>

        </div>
      </div>
    </form>
        <!------------------ Fin Modal -------------------------------------->
        
        