<?php include('includes/header.php');
include_once 'acciones/sessiones.php';
include 'config/database.php';

$id = $_GET['id'];

$sql = "SELECT * FROM productos_db WHERE id_producto = $id";
$resultado = $conn->query($sql);
$data_producto = $resultado->fetch_assoc();

?>
<!-- DataTables -->

<section class="content-header">
    
        <div class="text-center">
        <a class="btn btn-primary btn-flat pull-center" href="" title="Agregar" data-toggle="modal" data-target="#editarproducto<?php echo $data_producto['id_producto'];?>"><i class="fa fa-pencil-square-o"></i> Editar</a>
        <a class="btn btn-success btn-flat" href="" title="Agregar" data-toggle="modal" data-target="#editarimagen<?php echo $data_producto['id_producto'];?>"><i class="fa fa-picture-o"></i> Cambiar imagen</a>
        <a class="btn btn-danger btn-flat pull-right" href="javascript:history.back()"><i class="fa fa-reply"></i> Atras</a>
        </div>
        <?php include("pages/productos/editar_productos.php"); ?>
        <?php include("pages/productos/editar_imagen.php"); ?>
    
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-6">
            <div class="box box-success">
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr class="text-center">
                                <td><h5 class="text-green"><dt>PRECIO VENTA:</dt></h5></td>
                                <td><span class="badge bg-red">$ <?php echo number_format($data_producto['precio_venta'], 2); ?></span></td>
                            </tr>
                            <tr class="text-center">
                                <td><h5 class="text-green"><dt>PRECIO COMPRA:</dt></h5></td>
                                <td><span class="badge bg-yellow">$ <?php echo number_format($data_producto['precio_compra'], 2); ?></span></td>
                            </tr>
                            <tr class="text-center">
                                <td><h5 class="text-green"><dt>STOCK:</dt></h5></td>
                                <td><span class="badge bg-light-blue"><?php echo $data_producto['stock']; ?></span></td>
                            </tr>
                            <tr class="text-center">
                                <td><h5 class="text-green"><dt>VENTAS REALIZADAS:</dt></h5></td>
                                <td><span class="badge bg-green"><?php echo $data_producto['vendido']; ?></span></td>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                    <table class="table table-bordered">
                        <tbody>
                            <tr class="text-center">
                                <td><h5 class="text-green"><dt>PRODUCTO:</dt></h5></td>
                                <td><span class="badge bg-red"><?php echo $data_producto['producto']; ?></span></td>
                            </tr>
                            <tr class="text-center">
                                <td><h5 class="text-green"><dt>TIPO:</dt></h5></td>
                                <td><span class="badge bg-yellow"><?php echo $data_producto['tipo']; ?></span></td>
                            </tr>
                            <tr class="text-center">
                                <td><h5 class="text-green"><dt>DISTRIBUIDOR:</dt></h5></td>
                                <td><span class="badge bg-light-blue"><?php echo $data_producto['distribuidor']; ?></span></td>
                            </tr>
                            <tr class="text-center">
                                <td><h5 class="text-green"><dt>ESTADO:</dt></h5></td>
                                <td><span class="badge bg-green"><?php echo $data_producto['estado']; ?></span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-xs-6">

            <div class="box box-success">
                <div class="box-body">
                    <div class="row">
                        <img src="imagenes/<?php echo $data_producto['imagen'] ?>"  alt="..." class="img-responsive pad" >
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
<script src="ajax/productos/productos.js"></script>