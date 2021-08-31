<?php
require_once('../../config/database.php');
include_once '../sessiones.php';
$action = (isset($_REQUEST['action']));
if ($action == 'ajax') {
 $codigo_venta = $_REQUEST['codigo_venta'];

    $query = "SELECT c.codigo_venta, c.estado, v.tipo, v.cantidad, v.precio, v.producto, v.usuario_venta, v.id_venta
            FROM codigos_db c
            INNER JOIN ventas_realizadas v ON c.codigo_venta = v.codigo_venta
            WHERE c.codigo_venta = '$codigo_venta'";
	$resultado = mysqli_query($conn, $query);
	if (!$resultado) {
		die('La consulta fallo' . mysqli_error($conn));
	}

	
?>
<span id="codigo_venta_realizada"><?php echo $codigo_venta; ?></span>
<div class="table-responsive">
                        <table  class="table table-bordered table-striped">
                            <thead>
                                    <th class='text-center'>N°</th>
									<th class='text-center'>Cantidad</th>
									<th>Descripción</th>
									<th class='text-center'>Costo unitario</th>
                                    <th class='text-center'>Total</th>
                                    <th class='text-center'>Acciones</th>
                            </thead>
                            <?php 
                            $items = 1;
                            $suma = 0;
                            while ($row = mysqli_fetch_array($resultado)) {
                        
                                $total = $row['cantidad'] * $row['precio'];
                                $total = number_format($total, 2, '.', '');
                            ?>
<tr>
			<th><?php echo $items; ?></th>
			<th class="text-center valores"><?php echo $row['cantidad']; ?></th>
			<th class="valores"><?php echo $row['producto']; ?></th>
			<th class="valores"><?php echo number_format($row['precio'],2); ?></th>
			<th class="valores"><?php echo number_format($row['precio'] * $row['cantidad'],2); ?></th>
			<td><button onclick="enableClicks(<?php echo $row['id_venta'];?>)" type="button" data-id_venta="<?php echo $row['id_venta'];?>" class="borrar_registro btn btn-danger btn-xs"><i class="fa  fa-trash-o"></i></button></td>


		</tr>
	<?php
		$items++;
		$suma += $total;
	}
	?>
	<tr>
    </table>
                    </div>
		<td colspan='5' class='text-right'>
			<h4>TOTAL $</h4>
		</td>
		<th class='text-right'>
			<h4><?php echo number_format($suma, 2); ?></h4>
		</th>
		<td></td>
	</tr>

<?php
}
?>