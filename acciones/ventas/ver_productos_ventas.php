<?php
require_once('../../config/database.php');
include_once '../sessiones.php';
$action = (isset($_REQUEST['action']));
if ($action == 'ajax') {


	$query = "SELECT * FROM venta_tmp_db WHERE usuario_venta = '$_SESSION[usuario]'";
	$resultado = mysqli_query($conn, $query);
	if (!$resultado) {
		die('La consulta fallo' . mysqli_error($conn));
	}

	$items = 1;
	$suma = 0;
	while ($row = mysqli_fetch_array($resultado)) {

		$total = $row['cantidad'] * $row['precio'];
		$total = number_format($total, 2, '.', '');
?>

		<tr>
			<th><?php echo $items; ?></th>
			<th class="text-center valores"><?php echo $row['codigo']; ?></th>
			<th class="text-center valores"><?php echo $row['cantidad']; ?></th>
			<th class="valores"><?php echo $row['producto']; ?></th>
			<th class="valores"><?php echo number_format($row['precio'],2); ?></th>
			<th class="valores"><?php echo number_format($row['precio'] * $row['cantidad'],2); ?></th>
			<td><button onclick="enableClicks(<?php echo $row['id_venta'];?>)" type="button" data-id_venta="<?php echo $row['id_venta'];?>" class="eliminar_producto_venta btn btn-danger btn-xs"><i class="fa  fa-trash-o"></i></button></td>


		</tr>
	<?php
		$items++;
		$suma += $total;
	}
	?>
	<tr>
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