<?php include('includes/header.php');
include_once 'acciones/sessiones.php';
include 'config/database.php';

$sql = "SELECT codigo_venta FROM codigos_db WHERE usuario = '$_SESSION[usuario]' AND estado = 'ACTIVO'";
$resultado = $conn->query($sql);
$data_codigo = $resultado->fetch_assoc();
?>
<!-- DataTables -->

<section class="content-header">
  <h1>
    Ventas
    <a class="btn btn-success btn-flat pull-right" href="" title="Agregar" data-toggle="modal" data-target="#nuevaventa"><i class="fa fa-plus"></i> Agregar Productos</a>
  </h1>
</section>
<?php include("pages/ventas/nueva_venta.php");?>
<section class="content">
  <div class="row">
    <div class="col-xs-6">

      <div class="box box-success">
        <div class="box-header">
          <h3 class="box-title">Datos de Venta</h3>
        </div>
        <div class="box-body">
            <form action="" method="post">

            <div class="row pad-top font-big">
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <a href="https://obedalvarado.pw/" target="_blank">  <img src="imagenes/prueba.jpg" class="margin" style="width: 100px;height: 70px;" alt="Logo sistemas web" /></a>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <strong>E-mail : </strong> redes@redes.com <br/>
                    <strong>Teléfono :</strong> 315654554 <br />
					<strong>Sitio web :</strong> www.redes.com
                   
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <strong>Sitema de compras Y  </strong>
                    <br />
                    Dirección : Calle 50 # 34-34
                </div>

            </div>
            <hr />
                <!-- --------------------------------------------------------------------------- -->
        <div class="form-group">
                    <div class="row">
                      <div class="col-xs-6">
                        <label>USUARIO</label>
                        <input type="text" class="form-control" name="usuario" id="usuario" value="<?php echo $_SESSION['usuario'];?>" readonly> 
                      </div>
                      <div class="col-xs-6">
                        <label>CODIGO DE COMPRA</label>
                        <input type="text" class="form-control" name="codigo_compra" id="codigo_compra" value="<?php echo $data_codigo['codigo_venta'];?>" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-xs-6">
                        <label> NOMBRE DE CLIENTE</label>
                        <input type="text" class="form-control" name="nombre_cliente" id="nombre_cliente">
                      </div>
                      <div class="col-xs-6">
                        <label> CEDULA</label>
                        <input type="text" class="form-control" name="cedula" id="cedula">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                        <a id="generar_codigo_venta" class="btn btn-info btn-flat">Generar codigo</a>
                      </div>
               
                  </form>
</div>
        <!-- /.box-body -->
      </div>
    </div>

    <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
 <!-- ----------------------------------------------------------------------------------------- -->
 <div class="col-xs-6">
 <div class="box box-success">
        <div class="box-header">
          <h3 class="box-title">Datos de Venta</h3>
        </div>
        <div class="box-body">
                    <div class="table-responsive">
                        <table  class="table table-bordered table-striped">
                            <thead>
                                    <th class='text-center'>N°</th>
                                    <th class='text-center'>codigo</th>
									<th class='text-center'>Cantidad</th>
									<th>Descripción</th>
									<th class='text-center'>Costo unitario</th>
                                    <th class='text-center'>Total</th>
                            </thead>
                            <tbody class="items">
                         
                            </tbody>
                        </table>
                    </div>
                    <a class="btn btn-success btn-flat pull-right" id="finalizar_compra"><i class="fa fa-plus"></i> Finalizar Compra</a>
                </div>
                </div>
                </div>
               
<!-- ------------------------------------------------------------------------------------------------------------ -->
  </div>
  <!-- /.row -->
</section>


<?php include('includes/footer.php'); ?>
<script src="ajax/ventas/ventas_nuevas.js"></script>